<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
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
    public $main_page;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model', 'config_model');
        $this->data['pageant_name']   = $this->config_model->get_pageant_name();
        $this->data['isFinals']       = $isFinals      = $this->config_model->isFinals();
        $this->data['isAutoRefresh']  = $isAutoRefresh = $this->config_model->isAutoRefresh();
        $this->data['module_title']   = 'Config';
        $this->data['current_module'] = 'config';

        $this->main_page = 'consolidatedbycategories';

        if (!$this->session->userdata('admin_loggedIn')) {
            header("location: " . site_url('login_config'));
        }
    }

    public function index()
    {
        header("location: " . site_url($this->main_page));
    }

    public function set_initial()
    {
        $data = $this->data;

        $this->load->view('header_config', $data);
        $this->load->view('/modules/config/show');
        $this->load->view('footer_config');
    }

    public function set_initial_data()
    {
        $password = $this->input->post('password');

        $this->db->select('*');
        $this->db->from('config');
        $this->db->where('configName', 'Set Initial Data');
        $rec = $this->db->get()->row();

        if (md5($password) == $rec->value) {
            $this->db->select('*');
            $this->db->from('judges');
            $this->db->where('status', 1);
            $judges = $this->db->get()->result();

            $this->db->select('*');
            $this->db->from('miss_candidates');
            $miss = $this->db->get()->result();

            $categories = array('production', 'playsuit', 'casual', 'sports', 'uniform', 'tourism', 'gown','finals');
            foreach ($categories as $category) {
                $this->db->truncate('miss_' . $category . '_rating');

                foreach ($judges as $judge) {
                    foreach ($miss as $ms) {
                        $data = array(
                            'judgeID' => $judge->judgeID,
                            'canNo'   => $ms->canNo,
                            'score'   => 0,
                        );

                        // Define additional dynamic columns based on category
                        $dynamicColumns = array();

                        switch ($category) {
                            case 'production':
                                $dynamicColumns = array(
                                    'beauty' => 0,
                                    'pose'   => 0
                                );
                                break;
                            case 'playsuit':
                                $dynamicColumns = array(
                                    'beauty' => 0,
                                    'pose'   => 0
                                );
                                break;
                            case 'gown':
                                $dynamicColumns = array(
                                    'beauty'   => 0,
                                    'pose'     => 0,
                                    'elegance' => 0
                                );
                                break;
                            case 'interview':
                                $dynamicColumns = array(
                                    'mastery'    => 0,
                                    'beauty'   => 0,
                                );
                                break;
                            case 'semifinals':
                                $dynamicColumns = array(
                                    'beauty'    => 0,
                                    'intelligence'   => 0,
                                );
                                break;
                            case 'finals':
                                $dynamicColumns = array(
                                    'beauty'    => 0,
                                    'intelligence'   => 0,
                                );
                                break;
                        }

                        // Merge dynamic columns with the main data
                        $data = array_merge($data, $dynamicColumns);

                        $this->db->insert('miss_' . $category . '_rating', $data);
                    }
                }
            }


            $this->db->set('isFinalist', 0);
            $this->db->update('miss_candidates');

            $this->db->set('isSemiFinalist', 0);
            $this->db->update('miss_candidates');

            $this->db->set('value', 0);
            $this->db->where('configName', 'Finals');
            $this->db->update('config');

            $this->db->set('value', 0);
            $this->db->where('configName', 'Semifinals');
            $this->db->update('config');

            $data['url'] = site_url($this->main_page);

            echo json_encode($data);
        } else {
            $json_result = array();
            return $this->output
                ->set_status_header('500')
                ->set_content_type('application/json')
                ->set_output($json_result);
        }
    }
}
