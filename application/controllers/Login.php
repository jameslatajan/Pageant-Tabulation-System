<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
    }

    public function index()
    {
        $data = $this->data;

        $this->db->select('judgeID');
        $this->db->select('judgeName');
        $this->db->select('status');
        $this->db->from('judges');
        $data['records'] = $this->db->get()->result();
        $this->load->view('login', $data);
    }

    public function submit()
    {
        $userID = $this->input->post('userID');

        $this->db->select('judgeID');
        $this->db->select('judgeName');
        $this->db->select('status');
        $this->db->from('judges');
        $this->db->where('judgeID', $userID);
        $count = $this->db->count_all_results();

        if ($count > 0) {
            $this->db->select('judgeID');
            $this->db->select('judgeName');
            $this->db->select('status');
            $this->db->from('judges');
            $this->db->where('judgeID', $userID);
            $rec = $this->db->get()->row();
            $newdata = array(
                'judgeID'  => $rec->judgeID,
                'judgeName' => $rec->judgeName,
                'logged_in' => TRUE
            );
            
            $this->session->set_userdata($newdata);
            header("location: " . site_url('production'));
        } else {
            header("location: " . site_url());
        }
    }
}
