<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php';

use Mpdf\Mpdf;

class ViewByJudges extends CI_Controller
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
         $this->data['current_module'] = 'judge';

         if ($this->session->judgeID != 3) {
            header("location: " . site_url('production'));
        }

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['current_module'] = 'viewbyjudges';
         
     }

     public function index()
    {
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

        // mr production
        $prod_mr = array();
        foreach($mister as $mr){
            $prod_mr[$mr->canNo]['canNo']  =   $mr->canNo;
            $prod_mr[$mr->canNo]['fullname']  =   $mr->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('mister_production_rating');
                $this->db->where('canNo', $mr->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $prod_mr[$mr->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $prod_mr[$mr->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $prod_mr[$mr->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }

        // ms production
        $prod_ms = array();
        foreach($miss as $ms){
            $prod_ms[$ms->canNo]['canNo']  =   $ms->canNo;
            $prod_ms[$ms->canNo]['fullname']  =   $ms->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('miss_production_rating');
                $this->db->where('canNo', $ms->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $prod_ms[$ms->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $prod_ms[$ms->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $prod_ms[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }

        // mr uniform
        $uniform_mr = array();
        foreach($mister as $mr){
            $uniform_mr[$mr->canNo]['canNo']  =   $mr->canNo;
            $uniform_mr[$mr->canNo]['fullname']  =   $mr->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('mister_uniform_rating');
                $this->db->where('canNo', $mr->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $uniform_mr[$mr->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $uniform_mr[$mr->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $uniform_mr[$mr->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }

        // ms uniform
        $uniform_ms = array();
        foreach($miss as $ms){
            $uniform_ms[$ms->canNo]['canNo']  =   $ms->canNo;
            $uniform_ms[$ms->canNo]['fullname']  =   $ms->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('miss_uniform_rating');
                $this->db->where('canNo', $ms->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $uniform_ms[$ms->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $uniform_ms[$ms->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $uniform_ms[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }
      
        // mr sportswear
        $sportswear_mr = array();
        foreach($mister as $mr){
            $sportswear_mr[$mr->canNo]['canNo']  =   $mr->canNo;
            $sportswear_mr[$mr->canNo]['fullname']  =   $mr->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('mister_sportsware_rating');
                $this->db->where('canNo', $mr->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $sportswear_mr[$mr->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $sportswear_mr[$mr->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $sportswear_mr[$mr->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }
        // ms sportswear
        $sportswear_ms = array();
        foreach($miss as $ms){
            $sportswear_ms[$ms->canNo]['canNo']  =   $ms->canNo;
            $sportswear_ms[$ms->canNo]['fullname']  =   $ms->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('miss_sportsware_rating');
                $this->db->where('canNo', $ms->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $sportswear_ms[$ms->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $sportswear_ms[$ms->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $sportswear_ms[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }

        // mr formal
        $formal_mr = array();
        foreach($mister as $mr){
            $formal_mr[$mr->canNo]['canNo']  =   $mr->canNo;
            $formal_mr[$mr->canNo]['fullname']  =   $mr->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('mister_formal_rating');
                $this->db->where('canNo', $mr->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $formal_mr[$mr->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $formal_mr[$mr->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $formal_mr[$mr->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }
 
        // ms formal
        $formal_ms = array();
        foreach($miss as $ms){
            $formal_ms[$ms->canNo]['canNo']  =   $ms->canNo;
            $formal_ms[$ms->canNo]['fullname']  =   $ms->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('miss_formal_rating');
                $this->db->where('canNo', $ms->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $formal_ms[$ms->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $formal_ms[$ms->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $formal_ms[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }

        // mr interview
        $interview_mr = array();
        foreach($mister as $mr){
            $interview_mr[$mr->canNo]['canNo']  =   $mr->canNo;
            $interview_mr[$mr->canNo]['fullname']  =   $mr->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('mister_interview_rating');
                $this->db->where('canNo', $mr->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $interview_mr[$mr->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $interview_mr[$mr->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $interview_mr[$mr->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }

        // ms interview
        $interview_ms = array();
        foreach($miss as $ms){
            $interview_ms[$ms->canNo]['canNo']  =   $ms->canNo;
            $interview_ms[$ms->canNo]['fullname']  =   $ms->fullname;
            $total = 0;
            foreach( $judges as $judge){
                $this->db->select('canNo, score, judgeID');
                $this->db->from('miss_interview_rating');
                $this->db->where('canNo', $ms->canNo);
                $this->db->where('judgeID',  $judge->judgeID);
                $rec = $this->db->get()->row(); 
                if($rec){
                    $interview_ms[$ms->canNo]['rating'][] = $rec->score;
                $total += $rec->score;
                }else{
                    $interview_ms[$ms->canNo]['rating'][] = 0;
                $total += 0;
                }
            }
            $interview_ms[$ms->canNo]['total'] = number_format($total / $this->judgeDivisor->value, 1);            
        }

        function bubbleSort(&$array) {
            $count = count($array);
        
            for ($i = 1; $i < $count; $i++) {
                for ($j = 1; $j < $count; $j++) {
                    $totalA = (float) $array[$j]['total'];
                    $totalB = (float) $array[$j + 1]['total'];
        
                    if ($totalA < $totalB) {
     
                        $temp = $array[$j];
                        $array[$j] = $array[$j + 1];
                        $array[$j + 1] = $temp;
                    }
                }
            }
        }
        
        bubbleSort($prod_mr);
        bubbleSort($prod_ms);
        bubbleSort($uniform_mr);
        bubbleSort($uniform_ms);
        bubbleSort($sportswear_mr);
        bubbleSort($sportswear_ms);
        bubbleSort($formal_mr);
        bubbleSort($formal_ms);
        bubbleSort($interview_mr);
        bubbleSort($interview_ms);
        
        $this->data['production_mr'] = $prod_mr;
        $this->data['production_ms'] = $prod_ms;
        $this->data['uniform_mr'] = $uniform_mr;
        $this->data['uniform_ms'] = $uniform_ms;
        $this->data['sportswear_mr'] = $sportswear_mr;
        $this->data['sportswear_ms'] = $sportswear_ms;
        $this->data['formal_mr'] = $formal_mr;
        $this->data['formal_ms'] = $formal_ms;
        $this->data['interview_mr'] = $interview_mr;
        $this->data['interview_ms'] = $interview_ms;

        $data = $this->data;

        $this->load->view('header', $data);
        $this->load->view('modules/viewbyjudges/show');
        $this->load->view('footer');

    }

        
}
