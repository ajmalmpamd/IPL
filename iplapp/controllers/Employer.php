<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employer extends CI_Controller {

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
       $this->load->model('M_company');

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
    
    public function view($slug) {
        
       
        $hrdata = array(
            'title' => 'Jobs',
        );
        $data = $this->template->set_template_admin('', $hrdata, '', ''); 
        $str=explode('-', $slug);
        $sid=(int) substr(end($str),8,10);
        
        $data_body['company']=$this->M_company->getRow($sid);
        
        if(!empty($data_body['company'])){
            if(isset($data_body['company']->image)&&$data_body['company']->image!=''&& is_file('./assets/images/company/' . $data_body['company']->image)){
                $image=$this->img->rimg('./assets/images/company/' . $data_body['company']->image, array('height' => 74, 'width' => 146, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
            }else{
                $image=$this->img->rimg('./assets/images/placeholder.jpg' , array('height' => 74, 'width' => 146, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);

            }
            if(isset($data_body['company']->banner)&&$data_body['company']->banner!=''&& is_file('./assets/images/company/' . $data_body['company']->banner)){
                $bimage=$this->img->rimg('./assets/images/company/' . $data_body['company']->banner, array('height' => 365, 'width' => 950, 'crop' => true, 'class' => 'img-responsive'), false);
            }else{
                $bimage=$this->img->rimg('./assets/images/placeholder.jpg' , array('height' => 365, 'width' => 950, 'crop' => true, 'class' => ' img-responsive'), false);

            }
            $data_body['company']->logo=$image;
            $data_body['company']->bannerimg=$bimage;
            $data_body['company']->slug= $slug;
        
        }
        
        // $data_body['skills']=$this->M_soogle->getSkillbyJob($sid);
        $jobs=$this->M_soogle->getLatestJobs(array('job.company'=>$sid));
        $data_body['reljobs']=array();
        foreach ($jobs as $job){
            if(isset($job['company_image'])&&$job['company_image']!=''&& is_file('./assets/images/company/' . $job['company_image'])){
                $image=$this->img->rimg('./assets/images/company/' . $job['company_image'], array('height' => 74, 'width' => 146, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
            }else{
                $image=$this->img->rimg('./assets/images/placeholder.jpg' , array('height' => 74, 'width' => 146, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
            }
            $data_body['reljobs'][]=array(
                    'href'=> 'job/'.slugify($job['title']).'-'.date('mdY', strtotime($job['date'])).$job['id'],
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
        
        if(!empty($data_body['company'])){
            $data['content'] = $this->load->view('soogle/company_view.php', $data_body, true);
        } else{
            $data['content'] = $this->load->view('soogle/no_result.php', $data_body, true);
        }
        
        $this->load->view($this->tmpl_path, $data);
    }
    public function jobs($slug) {
        
       
        $hrdata = array(
            'title' => 'Jobs',
        );
        $data = $this->template->set_template_admin('', $hrdata, '', ''); 
        $str=explode('-', $slug);
        $sid=(int) substr(end($str),8,10);
        
        $data_body['company']=$this->M_company->getRow($sid);
        
        if(!empty($data_body['company'])){
            if(isset($data_body['company']->image)&&$data_body['company']->image!=''&& is_file('./assets/images/company/' . $data_body['company']->image)){
                $image=$this->img->rimg('./assets/images/company/' . $data_body['company']->image, array('height' => 74, 'width' => 146, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);
            }else{
                $image=$this->img->rimg('./assets/images/placeholder.jpg' , array('height' => 74, 'width' => 146, 'crop' => true, 'class' => 'img-rounded img-responsive'), false);

            }
            if(isset($data_body['company']->banner)&&$data_body['company']->banner!=''&& is_file('./assets/images/company/' . $data_body['company']->banner)){
                $bimage=$this->img->rimg('./assets/images/company/' . $data_body['company']->banner, array('height' => 365, 'width' => 950, 'crop' => true, 'class' => 'img-responsive'), false);
            }else{
                $bimage=$this->img->rimg('./assets/images/placeholder.jpg' , array('height' => 365, 'width' => 950, 'crop' => true, 'class' => ' img-responsive'), false);

            }
            $data_body['company']->logo=$image;
            $data_body['company']->bannerimg=$bimage;
            $data_body['company']->slug= $slug;
        
        }
        $condition['job.company']=$sid;
        $count=$this->M_soogle->getJobsCount($condition);
        $data_body['count']=$count;
        $jobs=$this->M_soogle->getJobs($condition);
        $data_body['jobs']=array();
        if(!empty($jobs)):
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
        endif;
       
        $data_body['jobbyrole']=$this->M_soogle->getJobbyRole();
        $data_body['jobbyskill']=$this->M_soogle->getJobbySkill();
        $data_body['jobbysector']=$this->M_soogle->getJobbySector();
        $data_body['jobbylocation']=$this->M_soogle->getJobbyLocation();
        $data_body['jobbytype']=$this->M_soogle->getJobbyType();
        $data_body['jobbycategory']=$this->M_soogle->getJobbyCategory();
        
        if(!empty($data_body['company'])){
            $data['content'] = $this->load->view('soogle/job_list.php', $data_body, true);
        } else{
            $data['content'] = $this->load->view('soogle/no_result.php', $data_body, true);
        }
        
        $this->load->view($this->tmpl_path, $data);
    }
    

}
