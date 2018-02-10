<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $adm_id;
    public $adm_session;
    public $adm_name;
    public $today;
    public $upl_path;
    public $usr_name;
    public $usr_id;
    public $usr_mail;

    public function __construct() {
        parent::__construct();
        $this->load->helper('cookie');

        if (isset($this->session->userdata['admin_log'])) {
            $this->adm_id = $this->M_session->get_session_admin('adm_id');
            $this->adm_session = $this->M_session->get_session_admin('adm_session');
            $this->adm_name = $this->M_session->get_session_admin('adm_name');
        }

        //$this->load_modelslib();
        $this->init_vars();
        $this->form_validation->set_error_delimiters('<div class="input-err">', '</div>');
    }

    public function load_modelslib() {
        //  $this->load->config('unity');
    }

    public function init_vars() {
        $this->today = date('Y-m-d');
    }

    public function has_access() {
        if (isset($this->session->userdata['admin_log'])) {

            $session_compare = $this->M_session->compareSession($this->adm_id, $this->adm_session);
            if ($session_compare == true) {
                return true;
            }
            return true;
        }
        redirect('sitemanager/login');
    }

}
