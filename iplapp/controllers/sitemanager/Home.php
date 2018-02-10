<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public $tmpl_path;
    public $sec_path;

    public function __construct() {
        parent::__construct();

        $this->load_modelslib();
        $this->init_vars();
        $this->load->helper('text');
    }

    /**
     * Initializing public variables
     */
    public function init_vars() {
        $this->tmpl_path = 'admin/layout/template'; // default template page
        $this->sec_path = '';
    }

    public function load_modelslib() {
        $this->load->model('M_admin');
        
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
    }

    public function index() {
        $this->has_access(); // Checking admin authentication -> core/MY_Controller.php
        
        $hrdata = array(
            'title' => 'Admin Dashboard',
        );
        $data = $this->template->set_template_admin($this->adm_name, $hrdata, '', ''); // Loading template using libraries/Template library
        
        $data_body = array();
        
        $data['content'] = $this->load->view('admin/home.php', $data_body, true);

        $this->load->view($this->tmpl_path, $data);
    }

    public function login() {
        if (isset($this->session->userdata['admin_log'])) {
            redirect('sitemanager');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        // 
        if ($this->form_validation->run() != false) {
            $username = $this->input->post('username');
            $password = secure_password($this->input->post('password')); // Using secure_password from helpers/infilter_helper
            $result = $this->M_admin->verifyAdmin($username, $password);

            if ($result == false) {
                $this->M_log->insert_log("invalid_admin_login", "Admin Login Error", 0);
                $this->M_notify->set_notification('Invalid Username or Password', 'error');
            } else {
                $this->M_session->set_session_admin($result);
                $this->M_log->insert_log("admin_login", "Admin Login ", $result->id);
                redirect('sitemanager');
            }
        }
        $this->load->view('admin/login');
    }

    public function logout() {
        $this->M_log->insert_log("admin_logot", "Admin Logot", $this->adm_id);

        //  $this->M_log->insertLogadmin('logged_out',$this->adm_name,'username');
        $this->M_session->clear_session_admin(); // clear admin session
        $this->M_notify->logout_notify();

        redirect('sitemanager/login');
    }

    
   
    public function change_password() {
        $this->has_access();
        $nav_links = '<li class="active">Change Password</li>
        ';
        $hrdata = array(
            'title' => 'Change Password',
            'sub_title' => 'Change Password',
            'plus_link' => '',
        );

        $this->form_validation->set_rules('old_psw', 'Current Password', 'required|min_length[6]');
        $this->form_validation->set_rules('new_psw', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('con_psw', 'Confirm Password ', 'required|matches[new_psw]');

        if ($this->form_validation->run() != FALSE) {

            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $postData['oldpsw'] = secure_password($cleanPost['old_psw']);
            $postData['password'] = secure_password($cleanPost['new_psw']);
            $postData['id'] = $this->adm_id;
            $change_pass = $this->M_admin->changePassword($postData);
            //die($change_pass);
            if ($change_pass != false) {
                $this->M_log->insert_log("admin_pwd_chg", "Admin Changed Password", $this->adm_id);
                $this->M_notify->set_notification('Your password has been changed', 'success');
                
                redirect('sitemanager');
            } else {
                $this->M_notify->set_notification('Incorrect Password. Please try again', 'error');
            }
        }
        $data = $this->template->set_template_admin($this->adm_name, $hrdata, $nav_links);

        $data['content'] = $this->load->view('admin/change_password.php', '', true);

        $this->load->view($this->tmpl_path, $data);
    }

    public function not_found() {
        $this->load->view('err_404');
    }

}
