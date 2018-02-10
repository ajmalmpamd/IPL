<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model {

   public $tblname;	

   public function __construct()
   {
   	parent::__construct();
   	$this->tblname = 'login';
   }



  public function verifyAdmin($username,$password)
     {
          
            $query = $this->db->get_where($this->tblname, array('username'=>$username, 'password'=>$password),1);
            if($query->num_rows()>0)
            {
              $row = $query->row();
              return $row;
             /*  echo '<pre>';
              print_r($row);
              echo '</pre>';*/
            }
         return false;
    }

   public function verifyMail($email)
   {
       $query = $this->db->get_where($this->tblname, array('email'=>$email));
            if($query->num_rows()>0)
            {
              $row = $query->row();
              return $row;
            }
         return false;
   }


   public function updatePassword($data)
   {
    $update = array(
        'password' => $data['password']
      );
     $this->db->where('id', $data['id']);
     $this->db->update($this->tblname, $update);
     $success = $this->db->affected_rows();
     if($success){
      return true;
     }

     return false;
   }

   public function changePassword($data)
   {
      
      $query = $this->db->get_where($this->tblname, array('id'=>$data['id'],'password'=>$data['oldpsw']));
      if($query->num_rows()>0)
            {
              $update = $this->updatePassword($data);
               if($update){
               return true;
                }
            }
      return false;

   }

  




}