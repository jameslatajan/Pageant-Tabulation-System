<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myscore extends CI_Controller
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

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model', 'config_model');
        $this->data['pageant_name'] = $this->config_model->get_pageant_name();
        $this->data['isFinals']     = $isFinals = $this->config_model->isFinals();
        $this->data['module_title'] = 'Production Number';

        if (!$this->session->userdata('logged_in')) {
            header("location: " . site_url());
        }

        $this->data['judgeID']        = $this->session->judgeID;
        $this->data['judgeName']      = $this->session->judgeName;
        $this->data['current_module'] = 'myscore';

        $this->data['image_path'] = base_url('assets/custom/uploads/candidates/ms');
    }

    public function index()
    {
        $data = $this->data;

        $candidates = ['miss'];
        $categories = [];
        if ($this->data['isFinals']->value) {
            $categories[] = 'finals';
        } else {
            $categories = array('production', 'playsuit', 'casual', 'sports', 'uniform', 'tourism', 'gown');
        }

        foreach ($candidates as $candidate) {
            foreach ($categories as $category) {
                $data["{$category}_{$candidate}"] = $this->getRatings($candidate, $category);
            }
        }

        $this->load->view('header', $data);
        $this->load->view('modules/myscore/show');
        $this->load->view('footer');
    }

    function getRatings($candidate, $category)
    {
        $table = "{$candidate}_candidates";
        $ratingTable = "{$candidate}_{$category}_rating";

        $this->db->select("$table.canNo, $table.fullname, $ratingTable.*, $ratingTable.judgeID");
        $this->db->from($table);
        $this->db->join($ratingTable, "$table.canNo = $ratingTable.canNo", 'left');
        $this->db->where('judgeID', $this->session->judgeID);

        if ($this->data['isFinals']->value) {
            $this->db->where("{$candidate}_candidates.isfinalist", 1);
        }

        $this->db->order_by('score', 'desc');
        $result = $this->db->get()->result();

        
        return $result;
    }
}
