<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_log extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insert_log($operation, $description = '', $user_id='',$user=0) {
        $data['tm'] = time();
        $data['ip'] = $this->input->ip_address();
        $data['user_id'] = $user_id;
        $data['user'] = $user;
        $data['operation'] = $operation;
        $data['description'] = $description;
        $this->db->insert('logs', $data);
        $this->db->last_query();
    }

    function get_mail_attempts_count() {

        $this->db->where(('tm > unix_timestamp(
CURRENT_TIMESTAMP - INTERVAL 15
MINUTE ) AND ip ="' . $_SERVER['REMOTE_ADDR'] . '"'));
        $this->db->where('operation', 'mail');
        $this->db->select('*');
        $query = $this->db->get('logs');
//        echo $this->db->last_query();exit;
        return $query->num_rows();


//        
//        SELECT count( * )
//FROM p_acc_log
//WHERE tm > unix_timestamp(
//CURRENT_TIMESTAMP - INTERVAL 15
//MINUTE ) 
    }

}
