<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php';

use Mpdf\Mpdf;

class ConsolidatedPrint extends CI_Controller
{

    var $data;
    var $categoryDivisor;
    var $judgeDivisor;


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model', 'config_model');
        $this->data['pageant_name']             = $this->config_model->get_pageant_name();
        $this->data['categories_divisor']       = $this->categoryDivisor = $this->config_model->categoryDivisor();
        $this->data['judge_divisor']            = $this->judgeDivisor = $this->config_model->judgeDivisor();
        $this->data['isFinals']                 = $isFinals     = $this->config_model->isFinals();
        $this->data['module_title']             = 'Production Number';

        $this->data['judgeDivisor']             = $this->judgeDivisor->value;
        $this->data['current_module']           = 'result';

        if (!$this->session->userdata('admin_loggedIn')) {
            header("location: " . site_url('login_config'));
        }
    }

    public function generate(){

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();
        $this->data['judges'] = $judges;

        $this->db->select('*');
        $this->db->from('miss_candidates');
        $miss = $this->db->get()->result();

        $categories = ['production', 'uniform', 'sportsware', 'formal', 'interview'];

        // Initialize arrays for each category
        $miss_scores = array();

        foreach ($categories as $category) {
            // Initialize arrays for 'mister' and 'miss' candidates for the current category
            ${$category . '_ms'} = array();

            foreach ($miss as $ms) {
                ${$category . '_ms'}[$ms->canNo]['canNo'] = $ms->canNo;
                ${$category . '_ms'}[$ms->canNo]['fullname'] = $ms->fullname;
                $total = 0;

                foreach ($judges as $judge) {
                    $this->db->select('canNo, score, judgeID');
                    $this->db->from("miss_${category}_rating");
                    $this->db->where('canNo', $ms->canNo);
                    $this->db->where('judgeID', $judge->judgeID);
                    $rec = $this->db->get()->row();

                    if ($rec) {
                        ${$category . '_ms'}[$ms->canNo]['rating'][] = $rec->score;
                        $total += $rec->score;
                    } else {
                        ${$category . '_ms'}[$ms->canNo]['rating'][] = 0;
                        $total += 0;
                    }
                }

                ${$category . '_ms'}[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);
            }

            // Store the results in the main arrays
            $miss_scores[$category] = ${$category . '_ms'};
        }

        // Define the Bubble Sort function for sorting based on 'total' field of each category
        function bubbleSort(&$array) {
            $length = count($array);

            for ($i = 0; $i < $length; $i++) {
                for ($j = 1; $j < $length; $j++) {
                    if ($array[$j]['total'] < $array[$j + 1]['total']) {
                        // Swap the elements in each category
                        foreach ($array[$j] as $category => $data) {
                            $temp = $array[$j][$category];
                            $array[$j][$category] = $array[$j + 1][$category];
                            $array[$j + 1][$category] = $temp;
                        }
                    }
                }
            }
        }

        // Call the Bubble Sort function for each category in mister_scores and miss_scores
        foreach ($categories as $category) {
            bubbleSort($miss_scores[$category]);
        }

        $this->data['best_ms_list']  =   $miss_scores;

        //----------------------------------------------------------------------------------------------------
        // Get the top 3

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

                $categories = ['production', 'uniform', 'sportsware', 'formal', 'interview'];

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

        $msCount = count($data_ms);
        for ($i = 1; $i < $msCount; $i++) {
            for ($j = 1; $j < $msCount; $j++) {
                if ($data_ms[$j]['overallTotal'] < $data_ms[$j + 1]['overallTotal']) {
                    $temp = $data_ms[$j];
                    $data_ms[$j] = $data_ms[$j + 1];
                    $data_ms[$j + 1] = $temp;
                }
            }
        }

        $ms_top3 = array_slice($data_ms, 0, 10);

        $this->data['ms_top'] = $ms_top3;

        return $this->data;

    }

    public function generateBestResult(){

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();
        $this->data['judges'] = $judges;

        $this->db->select('*');
        $this->db->from('miss_candidates');
        $miss = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('mister_candidates');
        $mister = $this->db->get()->result();

        $categories = ['production', 'uniform', 'sportsware', 'formal', 'interview'];

        // Initialize arrays for each category
        $mister_scores = array();
        $miss_scores = array();

        foreach ($categories as $category) {
            // Initialize arrays for 'mister' and 'miss' candidates for the current category
            ${$category . '_mr'} = array();
            ${$category . '_ms'} = array();

            foreach ($mister as $mr) {
                ${$category . '_mr'}[$mr->canNo]['canNo'] = $mr->canNo;
                ${$category . '_mr'}[$mr->canNo]['fullname'] = $mr->fullname;
                $total = 0;

                foreach ($judges as $judge) {
                    $this->db->select('canNo, score, judgeID');
                    $this->db->from("mister_${category}_rating");
                    $this->db->where('canNo', $mr->canNo);
                    $this->db->where('judgeID', $judge->judgeID);
                    $rec = $this->db->get()->row();

                    if ($rec) {
                        ${$category . '_mr'}[$mr->canNo]['rating'][] = $rec->score;
                        $total += $rec->score;
                    } else {
                        ${$category . '_mr'}[$mr->canNo]['rating'][] = 0;
                        $total += 0;
                    }
                }

                ${$category . '_mr'}[$mr->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);
            }

            // Similar calculations for 'miss' candidates in the current category
            foreach ($miss as $ms) {
                ${$category . '_ms'}[$ms->canNo]['canNo'] = $ms->canNo;
                ${$category . '_ms'}[$ms->canNo]['fullname'] = $ms->fullname;
                $total = 0;

                foreach ($judges as $judge) {
                    $this->db->select('canNo, score, judgeID');
                    $this->db->from("miss_${category}_rating");
                    $this->db->where('canNo', $ms->canNo);
                    $this->db->where('judgeID', $judge->judgeID);
                    $rec = $this->db->get()->row();

                    if ($rec) {
                        ${$category . '_ms'}[$ms->canNo]['rating'][] = $rec->score;
                        $total += $rec->score;
                    } else {
                        ${$category . '_ms'}[$ms->canNo]['rating'][] = 0;
                        $total += 0;
                    }
                }

                ${$category . '_ms'}[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);
            }

            // Store the results in the main arrays
            $mister_scores[$category] = ${$category . '_mr'};
            $miss_scores[$category] = ${$category . '_ms'};
        }

        // Define the Bubble Sort function for sorting based on 'total' field of each category
        function bubbleSort(&$array) {
            $length = count($array);

            for ($i = 0; $i < $length; $i++) {
                for ($j = 1; $j < $length; $j++) {
                    if ($array[$j]['total'] < $array[$j + 1]['total']) {
                        // Swap the elements in each category
                        foreach ($array[$j] as $category => $data) {
                            $temp = $array[$j][$category];
                            $array[$j][$category] = $array[$j + 1][$category];
                            $array[$j + 1][$category] = $temp;
                        }
                    }
                }
            }
        }

        // Call the Bubble Sort function for each category in mister_scores and miss_scores
        foreach ($categories as $category) {
            bubbleSort($mister_scores[$category]);
            bubbleSort($miss_scores[$category]);
        }

        // die;

        $this->data['best_mr_list']  =   $mister_scores;
        $this->data['best_ms_list']  =   $miss_scores;

        return $this->data;

    }

    public function generateTop10(){
        // Get the top 3

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();
        $this->data['judges'] = $judges;

        $this->db->select('*');
        $this->db->from('miss_candidates');
        $miss = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('mister_candidates');
        $mister = $this->db->get()->result();

        $categories = ['production', 'uniform', 'sportsware', 'formal', 'interview'];
        // mr summary
        $data_mr = array();
        foreach ($mister as $mr) {
            $data_mr[$mr->canNo]['canNo'] = $mr->canNo;
            $data_mr[$mr->canNo]['fullname'] = $mr->fullname;

            // Create an array to hold the total score for each judge
            $judgeTotals = [];

            foreach ($judges as $judge) {
                $judgeID = $judge->judgeID;
                $totalScore = 0;

                $categories = ['production', 'uniform', 'sportsware', 'formal', 'interview'];

                foreach ($categories as $category) {
                    $this->db->select('canNo, score');
                    $this->db->from('mister_' . $category . '_rating');
                    $this->db->where('canNo', $mr->canNo);
                    $this->db->where('judgeID', $judgeID);
                    $rec = $this->db->get()->row();

                    $score = ($rec) ? $rec->score : 0;
                    $totalScore += $score;
                }

                $judgeTotals[$judgeID] = $totalScore / $this->categoryDivisor->value;
            }
            // Assign the judge totals to 'judge_total' index
            $data_mr[$mr->canNo]['judgeSum'] = $judgeTotals;

            $data_mr[$mr->canNo]['overallTotal'] = array_sum($judgeTotals) / $this->judgeDivisor->value;
        }

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

                $categories = ['production', 'uniform', 'sportsware', 'formal', 'interview'];

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

        // sort total score function
        $mrCount = count($data_mr);
        for ($i = 1; $i < $mrCount; $i++) {
            for ($j = 1; $j < $mrCount; $j++) {
                if ($data_mr[$j]['overallTotal'] < $data_mr[$j + 1]['overallTotal']) {
                    $temp = $data_mr[$j];
                    $data_mr[$j] = $data_mr[$j + 1];
                    $data_mr[$j + 1] = $temp;
                }
            }
        }

        $msCount = count($data_mr);
        for ($i = 1; $i < $msCount; $i++) {
            for ($j = 1; $j < $msCount; $j++) {
                if ($data_ms[$j]['overallTotal'] < $data_ms[$j + 1]['overallTotal']) {
                    $temp = $data_ms[$j];
                    $data_ms[$j] = $data_ms[$j + 1];
                    $data_ms[$j + 1] = $temp;
                }
            }
        }

        $mr_top3 = array_slice($data_mr, 0, 10);
        $ms_top3 = array_slice($data_ms, 0, 10);

        $this->data['mr_top'] = $mr_top3;
        $this->data['ms_top'] = $ms_top3;

        return $this->data;

    }

    public function generateTopCategory($category){

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();
        $this->data['judges'] = $judges;

        $this->db->select('*');
        $this->db->from('miss_candidates');
        $miss = $this->db->get()->result();

        $this->db->select('*');
        $this->db->from('mister_candidates');
        $mister = $this->db->get()->result();

        // $categories = ['production', 'uniform', 'sportsware', 'formal', 'interview'];
        $categories = [$category];

        // Initialize arrays for each category
        $mister_scores = array();
        $miss_scores = array();

        foreach ($categories as $category) {
            // Initialize arrays for 'mister' and 'miss' candidates for the current category
            ${$category . '_mr'} = array();
            ${$category . '_ms'} = array();

            foreach ($mister as $mr) {
                ${$category . '_mr'}[$mr->canNo]['canNo'] = $mr->canNo;
                ${$category . '_mr'}[$mr->canNo]['fullname'] = $mr->fullname;
                $total = 0;

                foreach ($judges as $judge) {
                    $this->db->select('canNo, score, judgeID');
                    $this->db->from("mister_${category}_rating");
                    $this->db->where('canNo', $mr->canNo);
                    $this->db->where('judgeID', $judge->judgeID);
                    $rec = $this->db->get()->row();

                    if ($rec) {
                        ${$category . '_mr'}[$mr->canNo]['judge'][] = $rec->score;
                        $total += $rec->score;
                    } else {
                        ${$category . '_mr'}[$mr->canNo]['judge'][] = 0;
                        $total += 0;
                    }
                }

                ${$category . '_mr'}[$mr->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);
            }

            // Similar calculations for 'miss' candidates in the current category
            foreach ($miss as $ms) {
                ${$category . '_ms'}[$ms->canNo]['canNo'] = $ms->canNo;
                ${$category . '_ms'}[$ms->canNo]['fullname'] = $ms->fullname;
                $total = 0;

                foreach ($judges as $judge) {
                    $this->db->select('canNo, score, judgeID');
                    $this->db->from("miss_${category}_rating");
                    $this->db->where('canNo', $ms->canNo);
                    $this->db->where('judgeID', $judge->judgeID);
                    $rec = $this->db->get()->row();

                    if ($rec) {
                        ${$category . '_ms'}[$ms->canNo]['rating'][] = $rec->score;
                        $total += $rec->score;
                    } else {
                        ${$category . '_ms'}[$ms->canNo]['rating'][] = 0;
                        $total += 0;
                    }
                }

                ${$category . '_ms'}[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);
            }

            // Store the results in the main arrays
            $mister_scores[$category] = ${$category . '_mr'};
            $miss_scores[$category] = ${$category . '_ms'};
        }

        // Define the Bubble Sort function for sorting based on 'total' field of each category
        function bubbleSort(&$array) {
            $length = count($array);

            for ($i = 0; $i < $length; $i++) {
                for ($j = 1; $j < $length; $j++) {
                    if ($array[$j]['total'] < $array[$j + 1]['total']) {
                        // Swap the elements in each category
                        foreach ($array[$j] as $category => $data) {
                            $temp = $array[$j][$category];
                            $array[$j][$category] = $array[$j + 1][$category];
                            $array[$j + 1][$category] = $temp;
                        }
                    }
                }
            }
        }

        // Call the Bubble Sort function for each category in mister_scores and miss_scores
        foreach ($categories as $category) {
            bubbleSort($mister_scores[$category]);
            bubbleSort($miss_scores[$category]);
        }

        // die;

        $this->data['best_mr_list']  =   $mister_scores;
        $this->data['best_ms_list']  =   $miss_scores;

        return $this->data;

    }

    public function index()
    {
        $data = $this->generate();

        $this->load->view('header_config', $data);
        $this->load->view('modules/consolidatedresult/show');
        $this->load->view('footer_config');
    }

    public function print_best_result()
    {
        $config = [
            'mode'          => 'c',
            'format'        => [210, 297],
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 5,
            'margin_bottom' => 5,
        ];

        $data = $this->generateBestResult();

        $mpdf = new Mpdf($config);

        $html = $this->load->view('print/print_best_result', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printCategory($category)
    {
        $config = [
            'mode'          => 'c',
            'format'        => [210, 297],
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 5,
            'margin_bottom' => 5,
        ];

        $data = $this->generateTopCategory($category);

        $mpdf = new Mpdf($config);

        $html = $this->load->view('print/print_best_category', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function print_top3_result()
    {

        $config = [
            'mode'          => 'c',
            'format'        => [210, 297],
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 5,
            'margin_bottom' => 5,
        ];

        $data = $this->generateTop10();

        $mpdf = new Mpdf($config);

        $html = $this->load->view('print/print_top3_result', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function printLandscape($category)
    {
        $config = [
            'mode'          => 'c',
            'format'        => [215.9, 330.2], // Custom size for 8.5 x 13 inches in landscape
            'margin_left'   => 10,
            'margin_right'  => 10,
            'margin_top'    => 5,
            'margin_bottom' => 5,
        ];
    
        $data = $this->generateTopCategory($category);

        $mpdf = new Mpdf($config);
    
        // Set the page orientation to landscape
        $mpdf->AddPage('L');
    
        $html = $this->load->view('print/print_best_category_landscape', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    
}
