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

    
    public function init_vars() {
        $this->tmpl_path = 'layout/template'; // default template page
        $this->sec_path = '';
    }

    public function load_modelslib() {
        $this->load->model('M_common');
       

        $this->form_validation->set_error_delimiters('<div class="input-err">', '</div>');
    }

    public function index() {
        
        $hrdata = array(
            'title' => 'Home page',
        );
        $data = $this->template->set_template_admin($this->adm_name, $hrdata, '', ''); 
        $this->load->model('M_match');
        $data_body = array();
        $data_body['result'] = $this->M_match->read();
        
       
        $data['content'] = $this->load->view('ipl/home.php', $data_body, true);

        $this->load->view($this->tmpl_path, $data);
    }
    
    public function team($team) {
        
        
        $data_body = array();
        $str=explode('-', $team);
        $id=(int) end($str);
        $this->load->model('M_team');
        $data_body['data'] = $this->M_team->getRow($id);
        if (!$id > 0 || empty($data_body['data'] )) {
            redirect('home');
            die();
        }
        $player_config['table']='player';
        $player_config['condition']['status']='Y';
        $player_config['condition']['team']=$id;
        $data_body['players']=$this->M_common->getDatas($player_config);
        
        
        $hrdata = array(
            'title' => 'Team',
        );
        
        $data = $this->template->set_template_admin($this->adm_name, $hrdata, '', ''); 
       
        $data['content'] = $this->load->view('ipl/team.php', $data_body, true);

        $this->load->view($this->tmpl_path, $data);
    }

    
    public function not_found() {
        $this->load->view('err_404');
    }

}
