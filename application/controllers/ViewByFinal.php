<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php';

use Mpdf\Mpdf;

class ViewByFinal extends CI_Controller
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
        $this->data['isFinals']           = $isFinals              = $this->config_model->isFinals();
        $this->data['showInterview']      = $showInterview         = $this->config_model->showInterview();
        $this->data['module_title']       = 'Production Number';

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['judgeDivisor']   = $this->judgeDivisor->value;
        $this->data['current_module'] = 'final';


        if ($this->session->judgeID != 3) {
            header("location: " . site_url('production'));
        }

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['current_module'] = 'viewbyfinal';
    }

    public function index()
    {
        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();

        $this->db->select('*');
        $this->db->where('isFinalist', 1);
        $this->db->from('miss_candidates');
        $miss = $this->db->get()->result();

        $this->db->select('*');
        $this->db->where('isFinalist', 1);
        $this->db->from('mister_candidates');
        $mister = $this->db->get()->result();

        $data_mr = array();
        $index = 0; 
        foreach ($mister as $mr) {
            $data_mr[$index]['canNo'] = $mr->canNo;
            $data_mr[$index]['fullname'] = $mr->fullname;

            // Create an array to hold the total score for each judge
            $judgeTotals = [];

            foreach ($judges as $judge) {
                $judgeID = $judge->judgeID;
                $totalScore = 0;

                $this->db->select('canNo, score');
                $this->db->from('mister_finals_rating');
                $this->db->where('canNo', $mr->canNo);
                $this->db->where('judgeID', $judgeID);
                $rec = $this->db->get()->row();

                $score = ($rec) ? $rec->score : 0;
                $totalScore += $score;

                $judgeTotals[$judgeID] = $totalScore;
            }
            
            // Assign the judge totals to 'judge_total' index
            $data_mr[$index]['judgeSum'] = $judgeTotals;

            $data_mr[$index]['overallTotal'] = array_sum($judgeTotals) / $this->judgeDivisor->value;

            $index++;
        }

        $data_ms = array();
        $index = 0;
        foreach ($miss as $ms) {
            $data_ms[$index]['canNo'] = $ms->canNo;
            $data_ms[$index]['fullname'] = $ms->fullname;

            // Create an array to hold the total score for each judge
            $judgeTotals = [];

            foreach ($judges as $judge) {
                $judgeID = $judge->judgeID;
                $totalScore = 0;

                $this->db->select('canNo, score');
                $this->db->from('miss_finals_rating');
                $this->db->where('canNo', $ms->canNo);
                $this->db->where('judgeID', $judgeID);
                $rec = $this->db->get()->row();

                $score = ($rec) ? $rec->score : 0;
                $totalScore += $score;

                $judgeTotals[$judgeID] = $totalScore;
            }
            
            // Assign the judge totals to 'judge_total' index
            $data_ms[$index]['judgeSum'] = $judgeTotals;

            $data_ms[$index]['overallTotal'] = array_sum($judgeTotals) / $this->judgeDivisor->value;

            $index++;
        }

        $dataCount = count($data_mr);
        for ($i = 0; $i < $dataCount - 1; $i++) {
            for ($j = 0; $j < $dataCount - $i - 1; $j++) {
                $overallTotalA = $data_mr[$j]['overallTotal'];
                $overallTotalB = $data_mr[$j + 1]['overallTotal'];
        
                // Compare based on data type and sort in descending order
                if (gettype($overallTotalA) !== gettype($overallTotalB)) {
                    // If data types are different, convert to float and compare
                    $overallTotalA = (float) $overallTotalA;
                    $overallTotalB = (float) $overallTotalB;
                }
        
                if ($overallTotalA < $overallTotalB) {  // Changed to '<' for descending order
                    // Swap the elements
                    $temp = $data_mr[$j];
                    $data_mr[$j] = $data_mr[$j + 1];
                    $data_mr[$j + 1] = $temp;
                }
            }
        }

        $dataCount = count($data_ms);
        for ($i = 0; $i < $dataCount - 1; $i++) {
            for ($j = 0; $j < $dataCount - $i - 1; $j++) {
                $overallTotalA = $data_ms[$j]['overallTotal'];
                $overallTotalB = $data_ms[$j + 1]['overallTotal'];

                // Compare based on data type and sort in descending order
                if (gettype($overallTotalA) !== gettype($overallTotalB)) {
                    // If data types are different, convert to float and compare
                    $overallTotalA = (float) $overallTotalA;
                    $overallTotalB = (float) $overallTotalB;
                }

                if ($overallTotalA < $overallTotalB) {  // Changed to '<' for descending order
                    // Swap the elements
                    $temp = $data_ms[$j];
                    $data_ms[$j] = $data_ms[$j + 1];
                    $data_ms[$j + 1] = $temp;
                }
            }
        }

        // var_dump($data_mr);
        // var_dump($data_ms);
        // die;

        $this->data['mrtop3'] = $data_mr;
        $this->data['mstop3'] = $data_ms;

        $data = $this->data;
        
        $this->load->view('header', $data);
        $this->load->view('modules/viewbyfinal/show');
        $this->load->view('footer');
    
    }


}
