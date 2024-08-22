<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php';

use Mpdf\Mpdf;

class Judges_scores extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

     var $data;
     var $categoryDivisor;
     var $judgeDivisor;


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model', 'config_model');
        $this->data['pageant_name']       = $this->config_model->get_pageant_name();
        $this->data['categories_divisor'] = $this->categoryDivisor = $this->config_model->categoryDivisor();
        $this->data['judge_divisor']      = $this->judgeDivisor    = $this->config_model->judgeDivisor();
        $this->data['isSemiFinals']       = $isSemiFinals          = $this->config_model->isSemiFinals();
        $this->data['isFinals']           = $isFinals              = $this->config_model->isFinals();
        $this->data['isAutoRefresh']      = $isAutoRefresh         = $this->config_model->isAutoRefresh();
        $this->data['showInterview']      = $showInterview         = $this->config_model->showInterview();
        $this->data['module_title']       = 'Judges Score';

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['current_module'] = 'judges_scores';

        if (!$this->session->userdata('logged_in')) {
            header("location: " . site_url());
        }

        if ($isFinals->value == 1) {
            header("location: " . site_url('finals'));
        }

        if ($isSemiFinals->value == 1) {
            header("location: " . site_url('semifinals'));
        }
        
    }

    public function index()
    {
        $this->judge("1");

    }

    public function judge($no){

        $data = $this->data;

        $data['record'] = $this->generate($no);
        $data['selected'] = "judge" . $no;
        $data['judge'] = $no;

        $this->load->view('header', $data);
        $this->load->view('modules/judges_scores/show');
        $this->load->view('footer');

    }

    public function generate($judgeNo)
    {

        $candidates = ['miss'];
        $categories = ['production', 'playsuit', 'gown', 'interview'];

        foreach ($candidates as $candidate) {
            foreach ($categories as $category) {
                $data["{$category}"] = $this->getRatings($candidate, $category, $judgeNo);
            }
        }

        return $data;
    }

    function getRatings($candidate, $category, $judgeNo)
    {
        $table = "{$candidate}_candidates";
        $ratingTable = "{$candidate}_{$category}_rating";

        $this->db->select("$table.canNo, $table.fullname, $ratingTable.*, $ratingTable.judgeID");
        $this->db->from($table);
        $this->db->join($ratingTable, "$table.canNo = $ratingTable.canNo", 'left');
        $this->db->where('judgeID', $judgeNo);
        $this->db->order_by('score', 'desc');
        $result = $this->db->get()->result();

        return $result;
    }

    public function consolidated(){

        $data = $this->data;

        $data['record'] = $this->generateConsolidated();

        $data['judges'] = $this->getJudges();
        $data['selected'] = "consolidated";

        // var_dump($data['record']);
        // die;

        $this->load->view('header', $data);
        $this->load->view('modules/judges_scores/show');
        $this->load->view('footer');

    }

    public function interview(){

        $data = $this->data;

        $data['record'] = $this->generateCat("interview");

        $data['judges'] = $this->getJudges();
        $data['selected'] = "interview";

        // var_dump($data['record']);
        // die;

        $this->load->view('header', $data);
        $this->load->view('modules/judges_scores/show');
        $this->load->view('footer');

    }

    public function generateCat($category){

        $this->data['category'] = $category;

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();
        $this->data['judges'] = $judges;

        $this->db->select('*');
        $this->db->from('miss_candidates');
        $miss = $this->db->get()->result();

        $data = array();
        foreach($miss as $ms){
            $data[$ms->canNo]['canNo']  =   $ms->canNo;
            $data[$ms->canNo]['fullname']  =   $ms->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('miss_'. $category .'_rating');
                $this->db->where('canNo', $ms->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $data[$ms->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $data[$ms->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $data[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }

        $data = array_values($data);
      
        $this->sortTotal($data);

        // Add rank based on total score
        $rank = 0;
        $prevTotal = null;
        foreach ($data as &$candidate) {
            if ($candidate['total'] !== $prevTotal) {
                $rank++;
            }
            $candidate['rank'] = $rank;
            $prevTotal = $candidate['total'];
        }

        return $data;
    }

    public function generateConsolidated(){

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();
        $this->data['judges'] = $judges;

        $this->db->select('*');
        $this->db->from('miss_candidates');
        $miss = $this->db->get()->result();

        //----------------------------------------------------------------------------------------------------
        // Get the top 10

        // ms summary
        $data_ms = array();
        foreach ($miss as $ms) {
            $data_ms[$ms->canNo]['canNo'] = $ms->canNo;
            $data_ms[$ms->canNo]['fullname'] = $ms->fullname;

            // Create an array to hold the total score for each judge
            $judgeTotals = [];

            foreach ($judges as $judge) {
                $judgeID = $judge->judgeID;
                $totalScore = 0;

                $categories = ['production', 'playsuit', 'gown', 'interview'];

                foreach ($categories as $category) {
                    $this->db->select('canNo, score');
                    $this->db->from('miss_' . $category . '_rating');
                    $this->db->where('canNo', $ms->canNo);
                    $this->db->where('judgeID', $judgeID);
                    $rec = $this->db->get()->row();

                    $score = ($rec) ? $rec->score : 0;
                    $totalScore += $score;
                }

                $judgeTotals[$judgeID] = $totalScore / $this->categoryDivisor->value;
            }
            // Assign the judge totals to 'judge_total' index
            $data_ms[$ms->canNo]['judgeSum'] = $judgeTotals;

            $data_ms[$ms->canNo]['overallTotal'] = array_sum($judgeTotals) / $this->judgeDivisor->value;
        }

        $data = array_values($data_ms);

        $this->sortOverAllTotal($data);

        // Add rank based on total score
        $rank = 0;
        $prevTotal = null;
        foreach ($data as &$candidate) {
            if ($candidate['overallTotal'] !== $prevTotal) {
                $rank++;
            }
            $candidate['rank'] = $rank;
            $prevTotal = $candidate['overallTotal'];
        }

        return $data;

    } 

    public function sortOverAllTotal(&$array) {
        
        $count = count($array);
        
        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = 0; $j < $count - $i - 1; $j++) {
                $totalA = isset($array[$j]['overallTotal']) ? (float) $array[$j]['overallTotal'] : 0;
                $totalB = isset($array[$j + 1]['overallTotal']) ? (float) $array[$j + 1]['overallTotal'] : 0;
    
                if ($totalA < $totalB) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
    }
    
    public function sortTotal(&$array) {
        
        $count = count($array);
        
        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = 0; $j < $count - $i - 1; $j++) {
                $totalA = isset($array[$j]['total']) ? (float) $array[$j]['total'] : 0;
                $totalB = isset($array[$j + 1]['total']) ? (float) $array[$j + 1]['total'] : 0;
    
                if ($totalA < $totalB) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
    }

    public function getJudges(){

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();

        return $judges;
    }

}
