<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php';

use Mpdf\Mpdf;

class ConsolidatedSummary extends CI_Controller
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
         $this->data['showInterview']      = $showInterview         = $this->config_model->showInterview();
         $this->data['isAutoRefresh']      = $this->config_model->isAutoRefresh();
         $this->data['module_title']       = 'Summary';
 
         $this->data['judgeID']        = $this->session->judgeID;
         $this->data['judgeName']      = $this->session->judgeName;
         $this->data['current_module'] = 'summary';
         $this->data['image_path'] = base_url('assets/custom/uploads/candidates/ms');

     }

    public function index()
    { // Set to default view once the page is visited
         if($this->session->userdata('admin_loggedIn')){
             $this->best();        
        }else{
             $this->finals();        
         }

    }

    // View Pages

    public function best(){

        $data = $this->data;

        $data['production'] = $this->generate('production');
        $data['casual']     = $this->generate('casual');
        $data['playsuit']   = $this->generate('playsuit');
        $data['sports']     = $this->generate('sports');
        $data['uniform']    = $this->generate('uniform');
        $data['tourism']    = $this->generate('tourism');
        $data['gown']       = $this->generate('gown');

        $data['judges'] = $this->getJudges();
        $data['selected'] = "best";

        // var_dump($data);
        // die;

        $this->load->view('header_config', $data);
        $this->load->view('modules/consolidatedsummary/show');
        $this->load->view('footer_config');

    }

    public function consolidated(){

        $data = $this->data;

        $data['record']    = $this->generateConsolidated();
        $data['checkRank'] = $this->checkRank($data['record']);

        $data['judges'] = $this->getJudges();
        $data['selected'] = "consolidated";

        // var_dump($data);
        // die;

        $this->load->view('header_config', $data);
        $this->load->view('modules/consolidatedsummary/show');
        $this->load->view('footer_config');

    }

    public function checkRank($record) {
        $rank5Count = 0;
        foreach ($record as $rec) {
            if ($rec['rank'] == 5) {
                $rank5Count++;
                if ($rank5Count > 1) {
                    return true;
                }
            }
        }
        return false;
    }

    public function finals(){

        $data = $this->data;

        $data['records'] = $this->generateFinalist('finals');
        $data['judges'] = $this->getJudges();
        $data['selected'] = "finals";

        if($this->session->userdata('admin_loggedIn')){
            
            // var_dump($data);
            // die;

            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedsummary/show');
            $this->load->view('footer_config');

            
        } else {

            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "viewConsolidated";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedsummary/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }

    }

    public function finaljudgescores($id){

        $data = $this->data;

        $data['records'] = $this->getScores($id);
        $data['judges'] = $this->getJudges();
        $data['selected'] = "judge" . $id;
        $data['judge'] = $id;


        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedsummary/show');
            $this->load->view('footer_config');
            
        } else {

            if( $this->data['judgeID'] == "3"){
            
                $data['current_module'] = "finaljudgescores";
                
                $this->load->view('header', $data);
                $this->load->view('modules/consolidatedsummary/show');
                $this->load->view('footer');
            }else {
                redirect(site_url('production'));
            }
        }

    }

    // Generate Results
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

    public function getScores($judgeNo)
    {

        $candidates = ['miss'];
        $categories = ['finals'];

        foreach ($candidates as $candidate) {
            foreach ($categories as $category) {
                $data["{$category}"] = $this->getRatings($candidate, $category, $judgeNo);
            }
        }

        // var_dump($data);
        // die;

        return $data;


    }

    public function sortCanNo(&$array) {
        $count = count($array);
        
        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = 0; $j < $count - $i - 1; $j++) {
                $canNoA = isset($array[$j]->canNo) ? (float) $array[$j]->canNo : 0;
                $canNoB = isset($array[$j + 1]->canNo) ? (float) $array[$j + 1]->canNo : 0;
    
                if ($canNoA > $canNoB) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
    }

    public function getRatings($candidate, $category, $judgeNo)
    {
        $table = "{$candidate}_candidates";
        $ratingTable = "{$candidate}_{$category}_rating";

        $this->db->select("$table.canNo, $table.fullname, $ratingTable.*, $ratingTable.judgeID");
        $this->db->from($table);
        $this->db->join($ratingTable, "$table.canNo = $ratingTable.canNo", 'left');
        $this->db->where('judgeID', $judgeNo);
        $this->db->where('isFinalist', 1);
        $this->db->order_by('score', 'desc');
        $result = $this->db->get()->result();

        $this->sortCanNo($result);

        return $result;
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

    public function printFinalist(){

        $config = [
            'mode'          => 'c',
            'format'        => 'A4', // Landscape orientation
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 5,
            'margin_bottom' => 5,
        ];

        $data = $this->generateConsolidated();
        
        $data_ms = array();

        foreach ($data as &$d) {    
                $data_ms[] = $d;
        }
        //   foreach ($data as &$d) {
        //     if ($d['rank'] <= 5) {
        //         $data_ms[] = $d;
        //     }
        // }

        $data['records'] = $data_ms;

        // var_dump($data);
        // die;

        // $data['judges'] = $this->getJudges();

        $mpdf = new Mpdf($config);

        $html = $this->load->view('print/print_finalist', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    // public function printFinal5(){

    //     $config = [
    //         'mode'          => 'c',
    //         'format'        => 'A4-L', // Landscape orientation
    //         'margin_left'   => 10,
    //         'margin_right'  => 10,
    //         'margin_top'    => 5,
    //         'margin_bottom' => 5,
    //     ];

    //     $data = $this->generateConsolidated();
        
    //     $data_ms = array();

    //     foreach ($data as &$d) {
    //         if ($d['rank'] <= 5) {
    //             $data_ms[] = $d;
    //         }
    //     }

    //     $data['records'] = $data_ms;

    //     // var_dump($data);
    //     // die;

    //     // $data['judges'] = $this->getJudges();

    //     $mpdf = new Mpdf($config);

    //     $html = $this->load->view('print/print_finalist', $data, true);
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output();
    // }

    public function generateFinalist($category){

        $this->data['category'] = $category;

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();
        $this->data['judges'] = $judges;
        
        $this->db->select('*');
        $this->db->from('miss_candidates');
        $this->db->where('isFinalist', 1);
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

    public function printGrandResult(){

        $config = [
            'mode'          => 'c',
            'format'        => 'A4', // Landscape orientation
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 5,
            'margin_bottom' => 5,
        ];

        $data['record'] = $this->generateFinalist('finals');
        // var_dump($data);

        $mpdf = new Mpdf($config);

        $html = $this->load->view('print/print_grandresult', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    // Stage setting
    public function printCategory()
    {
        $config = [
            'mode'          => 'c',
            'format'        => [210, 297],
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 5,
            'margin_bottom' => 5,
        ];

        $data['production'] = $this->generate('production');
        $data['casual']     = $this->generate('casual');
        $data['playsuit']   = $this->generate('playsuit');
        $data['sports']     = $this->generate('sports');
        $data['uniform']    = $this->generate('uniform');
        $data['tourism']    = $this->generate('tourism');
        $data['gown']       = $this->generate('gown');

        // var_dump($data);
        // die;

        $mpdf = new Mpdf($config);

        $html = $this->load->view('print/print_best_category', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function setFinals(){

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('miss_candidates');
        $miss = $this->db->get()->result();

        foreach ($miss as $ms) {
            $this->db->set('isFinalist', 0);
            $this->db->where('canNo', $ms->canNo);
            $this->db->update('miss_candidates');
        }

        $data = $this->generateConsolidated();

        $data_ms = array();

        foreach ($data as &$d) {
            if ($d['highlight']) {
                $data_ms[] = $d;
            }
        }


        $this->data['summary_ms'] = $data_ms;
    
        // set candidates isFinalist field 
        foreach ($data_ms as $ms) {
            $this->db->set('isFinalist', 1);
            $this->db->where('canNo', $ms['canNo']);
            $this->db->update('miss_candidates');
        }
    
        // truncate data then add initial value to the table
        $this->db->truncate('miss_finals_rating');
        
        // insert data in semifinals_rating
        foreach ($judges as $judge) {
            foreach ($data_ms as $ms) {
                $category = 'finals';
                $finals = array(
                    'judgeID'    => $judge->judgeID,
                    'canNo'      => $ms['canNo'],
                    'beauty'    => 0,
                    'intelligence' => 0,
                    'score'      => 0,
                );
                
                $this->db->insert('miss_' . $category . '_rating', $finals);
            }
        }

        // set Finals to 1 in config
        $this->db->set('value', 1);
        $this->db->where('configName', "Finals");
        $this->db->update('config');

        // set Finals to 1 in config
        $this->db->set('value', 0);
        $this->db->where('configName', "SemiFinals");
        $this->db->update('config');

        header("location: " . site_url("consolidatedsummary/finals"));
        
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

        return $array;
    }
    
    public function getJudges(){

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();

        return $judges;
    }
    
}
