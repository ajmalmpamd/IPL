<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_session extends CI_Model {

    public function set_session_timezone($zonearr)
    {
        $this->clear_session_timezone();
        $sessdata = array(
            'utc_offset' => $zonearr['offset'],
            'timezone'   => $zonearr['timezone'],
        );
        $session_data = $sessdata;
        $this->session->set_userdata('zone_log', $session_data);
        return true;
    }
      public function get_session_timezone()
    {
        if(isset($this->session->userdata['zone_log']))
        {
            return $this->session->userdata['zone_log'];
        }
        return false;
    }
    public function get_session_timezone_val($value)
    {
        $session_return='';
        if(isset($this->session->userdata['zone_log']))
        {
            $session_return = $this->session->userdata['zone_log'][$value];

        }
        return $session_return;
    }
      public function clear_session_timezone()
    {

        $this->session->unset_userdata('zone_log');
    }
    public function set_session_geo($result)
    {
        $this->clear_session_geo();
        $session_data = $result;
        $this->session->set_userdata('user_geo', $session_data);
        return $this->session->userdata['user_geo'];
    }
    public function add_session_to($session,$id,$value)
    {
        $session_data = $this->session->userdata($session);
        $session_data[$id] = $value;
        $this->session->set_userdata($session, $session_data);
    }
    public function get_session_geo()
    {
        if(isset($this->session->userdata['user_geo']))
        {
            return $this->session->userdata['user_geo'];
        }
        return false;
    }
    public function get_session_geo_val($value)
    {
        $session_return='';
        if(isset($this->session->userdata['user_geo']))
        {
            $session_return = $this->session->userdata['user_geo'][$value];

        }
        return $session_return;
    }


    public function clear_session_geo()
    {
        //$array_items = array('adm_name' => '', 'adm_id' => '', 'adm_session' => '');

        $this->session->unset_userdata('user_geo');
       // $this->session->unset_userdata('user_ip_addr');
    }

	public function set_session_admin($result)
	{
            $sessdata = array(
              'adm_name' => $result->username,
              'adm_id'   => $result->id,
              'adm_session' => $result->session_id
              );
       $session_data = $sessdata;
       $this->session->set_userdata('admin_log', $session_data);
       return true;
	}
        public function set_session_company($result)
	{
            $sessdata = array(
              'adm_name' => $result->name,
              'adm_id'   => $result->id,
              'adm_email'   => $result->email,
              'adm_session' => $result->id
              );
       $session_data = $sessdata;
       $this->session->set_userdata('cmp_log', $session_data);
       return true;
	}
        
    public function set_session_user($result)
    {
        $sessdata = array(
            'usr_name' => $result->name,
            'usr_id'   => $result->id,
//            'usr_city' => $result->city,
//            'usr_auth_type' => $result->auth_type,
            'usr_mail' => $result->email
            //   'adm_session' => $result->session_id
        );
        $session_data = $sessdata;
        $this->session->set_userdata('user_log', $session_data);
        return $sessdata;
    }


	public function get_session_admin($value)
	{
    $session_return='';
    if(isset($this->session->userdata['admin_log']))
    {
        $session_return = $this->session->userdata['admin_log'][$value];

    }
    return $session_return;
	}
        	public function get_session_company($value)
	{
    $session_return='';
    if(isset($this->session->userdata['cmp_log']))
    {
        $session_return = $this->session->userdata['cmp_log'][$value];

    }
    return $session_return;
	}
   
    public function get_session_user($value)
    {
        $session_return='';
        if(isset($this->session->userdata['user_log']))
        {
            $session_return = $this->session->userdata['user_log'][$value];

        }
        return $session_return;
    }
	public function clear_session_admin()
	{
	
       $this->session->unset_userdata('admin_log');
		
	}
        public function clear_session_company()
	{
		//$array_items = array('adm_name' => '', 'adm_id' => '', 'adm_session' => '');

       $this->session->unset_userdata('cmp_log');
		
	}
    public function clear_session_user()
    {
        //$array_items = array('adm_name' => '', 'adm_id' => '', 'adm_session' => '');

        $this->session->unset_userdata('user_log');

    }

    public function clear_session_google()
    {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('google_data');
    }
	 public function compareSession($adm_id,$adm_session)
   {
        $this->db->select('session_id');
        $this->db->from('login');
        $this->db->where(array('id' => $adm_id, 'session_id' => $adm_session));
        $query = $this->db->get();
        
         if ($query->num_rows() > 0) {
          return true;

         }  

   }

    public function clear_session_arr($name)
    {
        $this->session->unset_userdata($name);
    }

    public function set_session_arr($name,$array)
    {
        $this->clear_session_arr($name);
       return  $this->session->set_userdata($name, $array);

    }

    public function get_session_arr($name)
    {
        $session_return='';
        if(isset($this->session->userdata[$name]))
        {
            $session_return = $this->session->userdata[$name];

        }
        return $session_return;
    }



}