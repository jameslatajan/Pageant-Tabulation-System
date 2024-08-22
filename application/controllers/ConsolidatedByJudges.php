<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor\autoload.php';

use Mpdf\Mpdf;

class ConsolidatedByJudges extends CI_Controller
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
        $this->data['current_module'] = 'judge';
        $this->data['image_path'] = base_url('assets/custom/uploads/candidates/ms');

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
        
        if($this->session->userdata('admin_loggedIn')){
            
            $this->load->view('header_config', $data);
            $this->load->view('modules/consolidatedbyjudges/show');
            $this->load->view('footer_config');
            
        } else {
            
          

            $data['current_module'] = "judges_scores";
    
            $this->load->view('header', $data);
            $this->load->view('modules/consolidatedbyjudges/show');
            $this->load->view('footer');
        }

    }

    public function generate($judgeNo)
    {

        $candidates = ['miss'];
        $categories = ['production', 'casual', 'playsuit', 'sports', 'uniform', 'tourism','gown', 'finals'];

        foreach ($candidates as $candidate) {
            foreach ($categories as $category) {
                $data["{$category}"] = $this->getRatings($candidate, $category, $judgeNo);
            }
        }

        // var_dump($data);
        // die;

        return $data;


    }

    function getRatings($candidate, $category, $judgeNo)
    {
        $table = "{$candidate}_candidates";
        $ratingTable = "{$candidate}_{$category}_rating";

        $this->db->select("$table.canNo, $table.fullname, $ratingTable.score, $ratingTable.judgeID");
        $this->db->from($table);
        $this->db->join($ratingTable, "$table.canNo = $ratingTable.canNo", 'left');
        $this->db->where('judgeID', $judgeNo);
        $this->db->order_by('score', 'desc');
        $result = $this->db->get()->result();

        $this->sortCanNo($result);

        return $result;
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
    
    
    
}
