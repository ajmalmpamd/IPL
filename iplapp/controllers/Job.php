<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Job extends CI_Controller {

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
    public function apply($slug) {
        
       
        $hrdata = array(
            'title' => 'Jobs',
        );
        $data = $this->template->set_template_admin('', $hrdata, '', ''); 
        $str=explode('-', $slug);
        $sid=(int) substr(end($str),8,10);
        
        $data_body['job']=$this->M_soogle->getJob($sid);
        $userid=$this->M_session->get_session_user('usr_id');
        if(empty($userid)){
            $ret['login']=0;
        }else{
            $ret['login']=1;
            $jobuser['user']=$userid;
            $jobuser['job']=$sid;
            $aa= $this->M_common->getRow('user_job',$jobuser);
            if(!empty($aa)){
               $ret['success']=0;
               $ret['already']=1;
            }else{
                $ret['already']=0;
                $jobuser['date_added']=time();
                $jobuser['status']=1;
                $a= $this->M_common->putDate('user_job',$jobuser);
                $this->M_log->insert_log("usr_app_job", "User ($userid) applied for job ($sid)", $userid, $a);
                if($a>0){
                    $ret['success']=1;
                }else{
                    $ret['success']=0;
                }
            }
        }
        
        echo json_encode($ret);
    }
    
    public function view($slug) {
        
       
        $hrdata = array(
            'title' => 'Jobs',
        );
        $data = $this->template->set_template_admin('', $hrdata, '', ''); 
        $str=explode('-', $slug);
        $sid=(int) substr(end($str),8,10);
        $userid=$this->M_session->get_session_user('usr_id');
        $data_body['job']=$this->M_soogle->getJob($sid,$userid);
        $data_body['skills']=$this->M_soogle->getSkillbyJob($sid);
        $jobs=$this->M_soogle->getRelatedJobs($sid);
        $data_body['reljobs']=array();
        foreach ($jobs as $job){
            if(isset($job['company_image'])&&$job['company_image']!=''&& is_file('./assets/images/company/' . $job['company_image'])){
                $image=$this->img->rimg('./assets/images/company/' . $job['company_image'], array('height' => 74, 'width' => 146, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
            }else{
                $image=$this->img->rimg('./assets/images/placeholder.jpg' , array('height' => 74, 'width' => 146, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
               
            }
            $data_body['reljobs'][]=array(
                    'href'=> 'job/'.slugify($job['title']).'-'.date('mdY', strtotime($job['date'])).$job['id'],
                    'ahref'=> 'apply/'.slugify($job['title']).'-'.date('mdY', strtotime($job['date'])).$job['id'],
                    'title'=>$job['title'],
                    'company'=>$job['company_name'],
                    'image'=>$image,
                    'location'=>$job['location_title'],
                    'experience'=>$job['experience_title'],
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
        
      
       
        $data['content'] = $this->load->view('soogle/job_view.php', $data_body, true);

        $this->load->view($this->tmpl_path, $data);
    }
    

}
