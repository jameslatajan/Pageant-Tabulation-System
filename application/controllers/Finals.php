<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finals extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    public $data;
    public $catTable;
    public $canTable;
    var $judgeDivisor;

    public function __construct()
    {
        parent::__construct();

        // start configured
        $this->load->model('Config_model', 'config_model');

        $this->data['controller_page']         = site_url();

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['categories_divisor']  = $this->categoryDivisor = $this->config_model->categoryDivisor();
        $this->data['judge_divisor']       = $this->judgeDivisor = $this->config_model->judgeDivisor();
        // end configured

        // start modifications
        $this->data['module_title']   = 'FINALS';
        $this->data['current_module'] = 'finals';

        $controller = 'finals/'; // modify the controller here
        $this->data['get_miss']         = site_url($controller . 'get_miss/'); // miss routes
        $this->data['get_miss_rating']  = site_url($controller . 'get_miss_rating/'); // miss routes
        $this->data['save_miss_rating'] = site_url($controller . 'save_miss_rating/'); // miss routes

        $this->canTable               = 'miss_candidates';    //tables
        $this->catTable               = 'miss_finals_rating';    //tables
        $this->module_path            = '/modules/finals/show';    //tables
        // end modifications

        $this->data['pageant_name'] = $this->config_model->get_pageant_name();
        $this->data['isFinals']     = $this->config_model->isFinals();
        $this->data['isSemiFinals'] = $this->config_model->isSemiFinals();

        $this->data['image_path'] = base_url('assets/custom/uploads/candidates/ms');

        if (!$this->session->userdata('logged_in')) {
            header("location: " . site_url());
        }
    }

    public function index()
    {
        $data = $this->data;

        $this->db->select('miss_candidates.fullname');
        $this->db->select('miss_candidates.remarks');
        $this->db->select('miss_candidates.canNo');
        $this->db->from('miss_candidates');
        $this->db->where('miss_candidates.isFinalist', 1);
        $this->db->order_by('canNo', 'asc');
        $data['miss_can'] = $this->db->get()->result();

        $this->load->view('header', $data);
        $this->load->view($this->module_path);
        $this->load->view('footer');
    }

    public function get_miss($canNo)
    {
        $this->db->select('canNo');
        $this->db->from($this->canTable);
        $this->db->order_by('canNo', 'asc');
        $this->db->where('canNo', $canNo);
        $count = $this->db->count_all_results();

        $response = array();
        if ($count > 0) {
            $this->db->select('*');
            $this->db->from($this->canTable);
            $this->db->order_by('canNo', 'asc');
            $this->db->where('canNo', $canNo);
            $rec = $this->db->get()->row();

            $response = array(
                'record'  => $rec,
                'status'  => 'success',
                'message' => 'success getting data',
            );
        } else {
            $data = array(
                'canNo'        => $canNo,
                'judgeID'      => $this->session->judgeID,
            );

            if ($this->db->insert($this->catTable, $data)) {
                $response = array(
                    'record'  => $data,
                    'status'  => 'success',
                    'message' => 'success getting data',
                );
            }
        }

        echo json_encode($response);
    }

    public function get_miss_rating($judgeID, $canNo)
    {
        $this->db->select('id');
        $this->db->from($this->catTable);
        $this->db->where('canNo', $canNo);
        $this->db->where('judgeID', $judgeID);
        $count = $this->db->count_all_results();

        $response = array();
        if ($count > 0) {
            $this->db->select('*');
            $this->db->from($this->catTable);
            $this->db->where('canNo', $canNo);
            $this->db->where('judgeID', $judgeID);
            $rec = $this->db->get()->row();

            $response = array(
                'record'  => $rec,
                'status'  => 'success',
                'message' => 'success getting data',
            );
        } else {
            $data = array(
                'canNo'        => $canNo,
                'judgeID'      => $judgeID,
            );

            if ($this->db->insert($this->catTable, $data)) {
                $response = array(
                    'record'  => $data,
                    'status'  => 'success',
                    'message' => 'success getting data',
                );
            }
        }

        echo json_encode($response);
    }

    public function save_miss_rating()
    {
        $judgeID = $this->input->post('judgeID');
        $canNo   = $this->input->post('canNo');
        $score   = $this->input->post('score');

        $data = [
            'judgeID' => $judgeID,
            'canNo'   => $canNo,
            'score'   => $score,
        ];

        $this->db->select('id');
        $this->db->from($this->catTable);
        $this->db->where('judgeID', $judgeID);
        $this->db->where('canNo',  $canNo);
        $count = $this->db->count_all_results();

        $response = array();
        if ($count > 0) {
            // update data
            $this->db->set($data);
            $this->db->where('judgeID', $judgeID);
            $this->db->where('canNo',  $canNo);
            if ($this->db->update($this->catTable)) {
                $this->db->select('*');
                $this->db->from($this->catTable);
                $this->db->order_by('canNo', 'asc');
                $this->db->where('judgeID',  $judgeID);
                $this->db->where('canNo',  $canNo);
                $rec = $this->db->get()->row();

                $response = array(
                    'record'  => $rec,
                    'status'  => 'success',
                    'message' => 'success update in database',
                );
            } else {
                $response = array(
                    'record'  => '',
                    'status'  => 'failed',
                    'message' => 'failed update in database',
                );
            }
        } else {
            if ($this->db->insert('miss_production_rating', $data)) {
                $insert_id = $this->db->insert_id();
                // get inserted data
                $this->db->select('*');
                $this->db->from('miss_production_rating');
                $this->db->where('canNo', $insert_id);
                $rec = $this->db->get()->row();

                $response = array(
                    'record'  => $rec,
                    'status'  => 'success',
                    'message' => 'success insert in database',
                );
            } else {
                $response = array(
                    'record'  => '',
                    'status'  => 'failed',
                    'message' => 'failed insert in database',
                );
            }
        }

        echo json_encode($response);
    }

    public function viewFinal()
    {

        $data = $this->data;

        $data['record'] = $this->generateFinal("finals");
        $data['judges'] = $this->getJudges();
        $data['current_module'] = "viewConsolidated";

        // var_dump($data);
        // die;

        $this->load->view('header', $data);
        $this->load->view('/modules/finals/final');
        $this->load->view('footer');
    }

    public function generateFinal($category)
    {

        $this->data['category'] = $category;

        $this->db->select('*');
        $this->db->from('judges');
        $this->db->where('status', 1);
        $judges = $this->db->get()->result();
        $this->data['judges'] = $judges;

        $this->db->select('*');
        $this->db->from('miss_candidates');
        $this->db->where('isSemiFinalist', 1);
        $this->db->where('isFinalist', 1);
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

    // public function crun_job()
    // {
    //     $names = array(
    //         'Sudlon',
    //         'Sta. Cruz',
    //         '3 Salog',
    //         'Nueva Estrella',
    //         'Taruc',
    //         'Rizal',
    //         'Dona Helene',
    //         'DepEd',
    //         'Del Pilar',
    //         'Congressional Office',
    //         'Socorro Gasoline Stataions',
    //         'Sering',
    //         'Socorro Water District, Socorro District Hospital and SOFECO',
    //         'Honrado',
    //         'Pamosaingan',
    //         'Navarro',
    //         'Songkoy',
    //         'San Roque',
    //         'BGFC and SOEMCO',
    //         'Socorro Banking & Lending Institutions',
    //     );

    //     foreach ($names as $nam) {
    //         $data = array(
    //             'fullname' => $nam,
    //         );
    //         $this->db->insert('miss_candidates', $data);
    //     }
    // }
}
