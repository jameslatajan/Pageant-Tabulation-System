
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Casual extends CI_Controller
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
    public $module_path;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model', 'config_model');

        $controller = 'casual/';

        $this->data['controller_page']         = site_url();

        // miss routes
        $this->data['get_miss']         = site_url($controller . 'get_miss/');
        $this->data['get_miss_rating']  = site_url($controller . 'get_miss_rating/');
        $this->data['save_miss_rating'] = site_url($controller . 'save_miss_rating/');

        $this->data['module_title'] = 'Casual Wear';

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['current_module'] = 'casual';
        $this->canTable               = 'miss_candidates';
        $this->catTable               = 'miss_casual_rating';

        $this->module_path = '/modules/casual/show';

        $this->data['pageant_name'] = $this->config_model->get_pageant_name();
        $this->data['isFinals']     = $isFinals     = $this->config_model->isFinals();

        if (!$this->session->userdata('logged_in')) {
            header("location: " . site_url());
        }

        if ($isFinals->value == 1) {
            header("location: " . site_url('finals'));
        }
    }

    public function index()
    {
        $data = $this->data;

        $this->db->select('canNo');
        $this->db->from($this->canTable);
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
            $response = array(
                'record'  => '',
                'status'  => 'failed',
                'message' => 'failed fetching data',
            );
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
            $response = array(
                'record'  => '',
                'status'  => 'failed',
                'message' => 'failed fetching data',
            );
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
}
