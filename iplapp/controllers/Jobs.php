<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobs extends CI_Controller {

    public $tmpl_path;
    public $sec_path;

    public function __construct() {
        parent::__construct();

        $this->load_modelslib();
        $this->init_vars();
    }

    
    public function init_vars() {
        $this->tmpl_path = 'layout/template'; // default template page
        $this->sec_path = '';
    }

    public function load_modelslib() {
        $this->load->model('M_common');
        $this->load->model('M_soogle');
       

        $this->form_validation->set_error_delimiters('<div class="input-err">', '</div>');
    }

    public function index() {
        
       
        $hrdata = array(
            'title' => 'Home page',
        );
        $data = $this->template->set_template_admin($this->adm_name, $hrdata, '', ''); 

        $data_body = array();
        $data_body['jobbyrole']=$this->M_soogle->getJobbyRole();
        $data_body['jobbyskill']=$this->M_soogle->getJobbySkill();
        $data_body['jobbysector']=$this->M_soogle->getJobbySector();
        $data_body['jobbylocation']=$this->M_soogle->getJobbyLocation();
        $data_body['jobbytype']=$this->M_soogle->getJobbyType();
        $data_body['jobbycategory']=$this->M_soogle->getJobbyCategory();
      
       
        $data['content'] = $this->load->view('soogle/home.php', $data_body, true);

        $this->load->view($this->tmpl_path, $data);
    }
    
    public function lists($type='skill',$slug) {
        
        $hrdata = array(
            'title' => 'Jobs',
        );
        $data = $this->template->set_template_admin('', $hrdata, '', ''); 
        $str=explode('-', $slug);
        $sid=(int) substr(end($str),8,10);
        $condition=array();
        if($type=='skill'){
            $condition['job_skill.skill']=$sid;
        } else if(in_array($type,array('role','category','sector','type','location'))){
            $condition['job.'.$type]=$sid;
        }
        $userid=$this->M_session->get_session_user('usr_id');
        $jobs=$this->M_soogle->getJobs($condition,$userid);
        
        $count=$this->M_soogle->getJobsCount($condition);
        $data_body['count']=$count;
        $data_body['jobs']=array();
        foreach ($jobs as $job){
            if(isset($job['company_image'])&&$job['company_image']!=''&& is_file('./assets/images/company/' . $job['company_image'])){
                $image=$this->img->aimg('./assets/images/company/' . $job['company_image'], array('height' => '', 'width' => 156, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
            }else{
                $image=$this->img->aimg('./assets/images/placeholder.jpg' , array('height' => '', 'width' => 156, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
            }
            $data_body['jobs'][]=array(
                'href'=> 'job/'.slugify($job['title']).'-'.date('mdY', strtotime($job['date'])).$job['id'],
                'ahref'=> 'apply/'.slugify($job['title']).'-'.date('mdY', strtotime($job['date'])).$job['id'],
                'title'=>$job['title'],
                'company'=>$job['company_name'],
                'image'=>$image,
                'location'=>$job['location_title'],
                'experience'=>$job['experience_title'],
                'applied'=>$job['applied'],
                'featured'=>$job['featured'],
                'date'=>date('d M Y', strtotime($job['date'])),
                'skills'=>$this->M_soogle->getSkillbyJob($job['id'])
            );
        }
       
        $data_body['jobbyrole']=$this->M_soogle->getJobbyRole();
        $data_body['jobbyskill']=$this->M_soogle->getJobbySkill();
        $data_body['jobbysector']=$this->M_soogle->getJobbySector();
        $data_body['jobbylocation']=$this->M_soogle->getJobbyLocation();
        $data_body['jobbytype']=$this->M_soogle->getJobbyType();
        $data_body['jobbycategory']=$this->M_soogle->getJobbyCategory();
        
        if(!empty($data_body['jobs'])){
            $data['content'] = $this->load->view('soogle/job_list.php', $data_body, true);
        } else{
            $data['content'] = $this->load->view('soogle/no_result.php', $data_body, true);
        }

        $this->load->view($this->tmpl_path, $data);
    }
    
    public function search() {
        
        $hrdata = array(
            'title' => 'Jobs',
        );
        $data = $this->template->set_template_admin('', $hrdata, '', ''); 
        $search= addslashes( trim($this->input->get('Keywords')));
       
        $location=addslashes( trim($this->input->get('location')));
        $data_body['search']=$search;
        $data_body['location']=$location;
        $userid=$this->M_session->get_session_user('usr_id');
        $jobs=$this->M_soogle->getJobsbySearch($search,$location,$userid);
        $count=$this->M_soogle->getJobsbySearchCount($search,$location);
        $data_body['count']=$count;
        $data_body['jobs']=array();
        foreach ($jobs as $job){
            if(isset($job['company_image'])&&$job['company_image']!=''&& is_file('./assets/images/company/' . $job['company_image'])){
                $image=$this->img->aimg('./assets/images/company/' . $job['company_image'], array('height' => '', 'width' => 156, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
            }else{
                $image=$this->img->aimg('./assets/images/placeholder.jpg' , array('height' => '', 'width' => 156, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
               
            }
            $data_body['jobs'][]=array(
                'href'=> 'job/'.slugify($job['title']).'-'.date('mdY', strtotime($job['date'])).$job['id'],
                'ahref'=> 'apply/'.slugify($job['title']).'-'.date('mdY', strtotime($job['date'])).$job['id'],
                'title'=>$job['title'],
                'company'=>$job['company_name'],
                'image'=>$image,
                'location'=>$job['location_title'],
                'experience'=>$job['experience_title'],
                'featured'=>$job['featured'],
                'applied'=>$job['applied'],
                'date'=>date('d M Y', strtotime($job['date'])),
                'skills'=>$this->M_soogle->getSkillbyJob($job['id'])
            );
        }
       
        $data_body['jobbyrole']=$this->M_soogle->getJobbyRole();
        $data_body['jobbyskill']=$this->M_soogle->getJobbySkill();
        $data_body['jobbysector']=$this->M_soogle->getJobbySector();
        $data_body['jobbylocation']=$this->M_soogle->getJobbyLocation();
        $data_body['jobbytype']=$this->M_soogle->getJobbyType();
        $data_body['jobbycategory']=$this->M_soogle->getJobbyCategory();
        
        if(!empty($data_body['jobs'])){
            $data['content'] = $this->load->view('soogle/job_list.php', $data_body, true);
        } else{
            $data['content'] = $this->load->view('soogle/no_result.php', $data_body, true);
        }

        $this->load->view($this->tmpl_path, $data);
    }
    public function not_found() {
        $this->load->view('err_404');
    }

}
