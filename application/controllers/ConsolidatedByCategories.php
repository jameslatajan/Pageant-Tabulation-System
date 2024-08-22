<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php';

use Mpdf\Mpdf;

class ConsolidatedByCategories extends CI_Controller
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
        // $this->data['isSemiFinals']       = $isSemiFinals          = $this->config_model->isSemiFinals();
        $this->data['isFinals']           = $isFinals              = $this->config_model->isFinals();
        $this->data['isAutoRefresh']      = $isAutoRefresh         = $this->config_model->isAutoRefresh();
        $this->data['showInterview']      = $showInterview         = $this->config_model->showInterview();
        $this->data['module_title']       = 'Categories';

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['current_module'] = 'categories';
        $this->data['image_path'] = base_url('assets/custom/uploads/candidates/ms');

       
    }

    public function index()
    {
        $this->production();
    }

    public function production()
    {

        $data = $this->data;

        $data['record'] = $this->generate('production');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "production";
        $data['catTitle'] = "Production Number";

        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {

            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "summary";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedbycategories/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }
    }

    public function casual()
    {

        $data = $this->data;

        $data['record'] = $this->generate('casual');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "casual";
        $data['catTitle'] = "Casual Wear";

        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {
            
            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "summary";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedbycategories/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }

    }

    public function playsuit()
    {

        $data = $this->data;

        $data['record'] = $this->generate('playsuit');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "playsuit";
        $data['catTitle'] = "Playsuit";

        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {
            
            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "summary";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedbycategories/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }
    }

    public function sports()
    {
        $data = $this->data;

        $data['record'] = $this->generate('sports');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "sports";
        $data['catTitle'] = "Sports Wear";

        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {
            
            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "summary";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedbycategories/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }
    }

    public function uniform()
    {
        $data = $this->data;

        $data['record'] = $this->generate('uniform');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "uniform";
        $data['catTitle'] = "Uniform";

        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {
            
            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "summary";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedbycategories/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }
    }

    public function tourism()
    {
        $data = $this->data;

        $data['record'] = $this->generate('tourism');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "tourism";
        $data['catTitle'] = "Tourism Video";

        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {
            
            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "summary";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedbycategories/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }
    }

    public function gown()
    {

        $data = $this->data;

        $data['record'] = $this->generate('gown');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "gown";        
        $data['catTitle'] = "Gown";


        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {
            
            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "summary";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedbycategories/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }
    }

    public function finals()
    {
        $data = $this->data;
        
        $data['record'] = $this->generateFinal('finals');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "finals";
        $data['catTitle'] = "Gown";

        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {
            
            $data['current_module'] = "summary";
    
            $this->load->view('header', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer');
        }
    }

    public function consolidated()
    {

        $data = $this->data;

        $data['record'] = $this->generateConsolidated();
        $data['judges'] = $this->getJudges();
        $data['selected'] = "consolidated";        
        $data['catTitle'] = "Consolidated Result";

        // var_dump($data['record']);
        // die;

        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbycategories/show');
            $this->load->view('footer_config');
            
        } else {
            
            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "summary";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedbycategories/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }
    }

    public function generate($category)
    {

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
        foreach ($miss as $ms) {
            $data[$ms->canNo]['canNo']  =   $ms->canNo;
            $data[$ms->canNo]['fullname']  =   $ms->fullname;
            $total = 0;
            foreach ($judges as $judge) {
                $this->db->select('canNo, score, judgeID');
                $this->db->from('miss_' . $category . '_rating');
                $this->db->where('canNo', $ms->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row();
                if ($rec) {
                    $data[$ms->canNo]['rating'][] = $rec->score;
                    $total += $rec->score;
                } else {
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

                $categories = ['production', 'casual', 'playsuit', 'sports', 'uniform', 'tourism','gown'];

                foreach ($categories as $category) {
                    $this->db->select('canNo, score');
                    $this->db->from('miss_' . $category . '_rating');
                    $this->db->where('canNo', $ms->canNo);
                    $this->db->where('judgeID', $judgeID);
                    $rec = $this->db->get()->row();

                    $score = ($rec) ? $rec->score : 0;
                    $totalScore += $score;
                }

                $judgeTotals[$judgeID] = round($totalScore / $this->categoryDivisor->value,1);

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
        $ctr = 0;
        $prevHl = true;
        $prevTotal = null;
        foreach ($data as &$candidate) {
            $ctr++;
            if ($candidate['overallTotal'] !== $prevTotal) {
                $rank++;
            }
            $candidate['rank'] = $rank;
            
            $candidate['highlight'] = false;
            if($candidate['rank'] <= 5 && $prevHl && ($ctr <= 5 || $prevTotal == $candidate['overallTotal'])){
                $candidate['highlight'] = true;
            }
            $prevTotal = $candidate['overallTotal'];
            $prevHl = $candidate['highlight'];
        }
        
        // var_dump($data);
        // die;
        
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

    // Print Result
    public function printCategory($category)
    {
        $config = [
            'mode'          => 'c',
            'format'        => 'A4', // Landscape orientation
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 5,
            'margin_bottom' => 5,
        ];
    
        $data['records'] = $this->generate($category);

        switch ($category) {
            case 'production':
                $title = 'Production Number';
                break;
            case 'casual':
                $title = 'Casual Wear';
                break;
            case 'sports':
                $title = 'Sports Wear';
                break;
            case 'tourism':
                $title = 'Tourism Video';
                break;
            default:
                $title = $category;
                break;
        }

        $data['catTitle'] = $title;
    
        $mpdf = new \Mpdf\Mpdf($config);
    
        $html = $this->load->view('print/print_categoryResult', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    

    public function sortTotal(&$array)
    {

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

    public function getJudges()
    {

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();

        return $judges;
    }

}
