<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_notify extends CI_Model {

       public $notify;

       public function __construct()
       {
           parent::__construct();
           $this->load_notification();
       }


        public function load_notification()
        {
            $link = site_url('resend_link');
            $this->notify = array(
                'blocked' => 'It looks like your account has been blocked',
                'notactive' => '<a href="'.$link.'">Your account is not yet activated! Click here to resend</a>',
                'invaliduser' => 'Invalid Username or Password',
                'invalidmail' => 'Invalid Email Id',
                'emailexists' => 'Email already exists! Please try another one',
                'regerror'    => "We could't register you this time.Please try again later",
                'regsuccess'  => 'Registration successful, please check mail to activate your account!',
                'mailerr' => 'Cannot send Confirmation link to your e-mail address',//not
                'activated'  => 'Your account has been activated. You may now login',
                'alreadyactive' => 'Already Activated',
                'activesend' => 'Activation mail sent',
                'reseterror' => 'There was a problem updating your password',
                'resetsuccess' => 'Your password has been updated. You may now login',
                'resetmail' => 'Please check your email to reset password',
                'tokeninvalid' => 'Token is invalid or expired',
                'access_denied' => 'Access Denied',
                'err_reg' => 'Registration was unsuccessfull. Please try again.',
                'act_not' => 'Your account is not yet activated',
                'login_req' => 'You need to be logged in to perform this action',
                'err_occ' => 'There was an error while performing this action',
                'entry_exists' => 'Entry already exists',
                'id_req' => 'Android Id missing',
                'no_record' => 'No records found',
                'user_invalid' => 'Invalid User',


            );
        }

        public function auth_notification($msg,$type)
        {
            if(isset($this->notify[$msg]))
            {
            $message = $this->notify[$msg];
            }
            $this->session->set_flashdata('message', $message);
            $this->session->set_flashdata('msg_class', $type);


        }

        public function get_notification($msg)
        {
            if(isset($this->notify[$msg]))
            {
                return $this->notify[$msg];
            }
            return false;
        }

        public function set_notification($msg,$type)
        {
        	   $this->session->set_flashdata('message', $msg);
        	   $this->session->set_flashdata('msg_class', $type);

        }

        public function logout_notify()
        {
        	 $this->session->set_flashdata("message", "You've been logged out successfully");
        	 $this->session->set_flashdata('msg_class', 'success');
        }

        public function invalid_login()
        {
        	 $this->session->set_flashdata('message', 'Invalid Username or Password');
        	 $this->session->set_flashdata('msg_class', 'error');
        }

        public function invalid_email()
        {
                $this->session->set_flashdata('message', 'Invalid Email Id');
                $this->session->set_flashdata('msg_class', 'error');
        }


}