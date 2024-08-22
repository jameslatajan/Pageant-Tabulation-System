<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_config extends CI_Controller
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

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model', 'config_model');
        $this->data['pageant_name'] = $this->config_model->get_pageant_name();
        $this->data['isFinals']     = $isFinals     = $this->config_model->isFinals();
        $this->data['module_title'] = 'Login';
        $this->data['current_module'] = 'login';
    }

    public function index()
    {
        $data = $this->data;
        $this->load->view('login_config', $data);
    }

    public function save()
    {
        $pass = $this->input->post('pass');

        $this->db->select('*');
        $this->db->from('config');
        $this->db->where('configName', 'Set Initial Data');
        $rec = $this->db->get()->row();

        $newdata = array(
            'admin_loggedIn' => TRUE
        );
          
        $this->session->set_userdata($newdata);

        if (md5($pass)  == $rec->value) {
            header("location: " . site_url('/consolidatedbycategories/production'));
        } else {
            header("location: " . site_url('login_config'));
        }
    }
}
