<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php';

use Mpdf\Mpdf;

class Summary extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * http: //example.com/index.php/welcome
     *    - or -
     * http: //example.com/index.php/welcome/index
     *    - or -
     * http: //example.com/index.php/welcome
     *	- or -
     * http: //example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https: //codeigniter.com/userguide3/general/urls.html
     */

    protected $data;
    protected $categoryDivisor;
    protected $judgeDivisor;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model', 'config_model');
        $this->data['pageant_name']     = $this->config_model->get_pageant_name();
        $this->data['category_divisor'] = $this->categoryDivisor = $this->config_model->categoryDivisor();
        $this->data['judge_divisor']    = $this->judgeDivisor    = $this->config_model->judgeDivisor();
        $this->data['isFinals']         = $isFinals              = $this->config_model->isFinals();
        $this->data['module_title']     = 'SUMMARY OF ALL CATEGORIES';

        $this->data['pageant_name']       = $this->config_model->get_pageant_name();
        $this->data['categories_divisor'] = $this->categoryDivisor = $this->config_model->categoryDivisor();
        $this->data['judge_divisor']      = $this->judgeDivisor    = $this->config_model->judgeDivisor();
        $this->data['isSemiFinals']       = $isSemiFinals          = $this->config_model->isSemiFinals();
        $this->data['isFinals']           = $isFinals              = $this->config_model->isFinals();
        $this->data['isAutoRefresh']      = $isAutoRefresh         = $this->config_model->isAutoRefresh();
        $this->data['module_title']       = 'Summary';

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['current_module'] = 'summary';
        $this->data['image_path']     = base_url('assets/custom/uploads/candidates/ms');

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
        $this->interview();
    }

    public function production()
    {

        $data = $this->data;

        $data['record'] = $this->generate("production");

        $data['judges']   = $this->getJudges();
        $data['selected'] = "production";

        $this->load->view('header', $data);
        $this->load->view('modules/summary/show');
        $this->load->view('footer');
    }

    public function playsuit()
    {
        $data = $this->data;

        $data['record'] = $this->generate("playsuit");

        $data['judges']   = $this->getJudges();
        $data['selected'] = "playsuit";

        $this->load->view('header', $data);
        $this->load->view('modules/summary/show');
        $this->load->view('footer');
    }

    public function gown()
    {

        $data = $this->data;

        $data['record'] = $this->generate("gown");

        $data['judges']   = $this->getJudges();
        $data['selected'] = "gown";

        $this->load->view('header', $data);
        $this->load->view('modules/summary/show');
        $this->load->view('footer');
    }

    public function interview()
    {
        $data = $this->data;

        $data['record']   = $this->generate("interview");
        $data['judges']   = $this->getJudges();
        $data['selected'] = "interview";

        // var_dump($data);
        // die;

        $this->load->view('header', $data);
        $this->load->view('modules/summary/show');
        $this->load->view('footer');
    }

    public function consolidatedresults()
    {

        $data = $this->data;

        $data['record'] = $this->generateConsolidated();

        $data['judges']   = $this->getJudges();
        $data['selected'] = "consolidatedresults";

        $this->load->view('header', $data);
        $this->load->view('modules/summary/show');
        $this->load->view('footer');
    }

    public function consolidatedcategories()
    {

        $data = $this->data;

        $data['production'] = $this->generate('production');
        $data['playsuit']   = $this->generate('playsuit');
        $data['gown']       = $this->generate('gown');

        $data['judges']   = $this->getJudges();
        $data['selected'] = "consolidatedcategories";

        $this->load->view('header', $data);
        $this->load->view('modules/summary/show');
        $this->load->view('footer');
    }

    public function generate($category){

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
            $data[$ms->canNo]['total'] = round($total / $this->judgeDivisor->value, 1);            
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

    public function sortOverAllTotal(&$array)
    {

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

    public function sortTotal(&$array)
    {

        $count = count($array);

        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = 0; $j < $count - $i - 1; $j++) {
                $totalA = isset($array[$j]['total']) ? (float) $array[$j]['total'] : 0;
                $totalB = isset($array[$j + 1]['total']) ? (float) $array[$j + 1]['total'] : 0;

                if ($totalA < $totalB) {
                    $temp          = $array[$j];
                    $array[$j]     = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
    }

    public function getJudges()
    {

        // usort($result, 'sort_score');
        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();

        // $data['production_mr'] = $result;
        return $judges;
    }

    public function generateConsolidated()
    {

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

                $judgeTotals[$judgeID] = round($totalScore / $this->categoryDivisor->value, 1);
            }
            // Assign the judge totals to 'judge_total' index
            $data_ms[$ms->canNo]['judgeSum'] = $judgeTotals;

            $total = array_sum($judgeTotals) / $this->judgeDivisor->value;
            $data_ms[$ms->canNo]['overallTotal'] = round($total, 1);
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

        // var_dump($r)

        return $data;
    }
}
