<?php
class M_common extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    function getDatas($config) {
        if(isset($config['condition'])){
            $this->db->where($config['condition']);
        }
        if(isset($config['limit'])){
            $start=(isset($config['start']))?$config['start']:0;
            $this->db->limit($config['limit'], $start);
        }
        if(isset($config['order'])){
            $this->db->order_by($config['order']['key'],$config['order']['value']);
        }
        
        if(isset($config['table'])){
            $query = $this->db->get($config['table']);
        }
        return $query->result_array();
    }
    public function recordCount($tblname) {
        $this->db->from($tblname);
        $count = $this->db->count_all_results();
        return $count;

    }
    public function read($tblname,$limit = NULL, $offset = NULL) {

        $fields = '*';
        $this->db->select($fields);
        $this->db->from($tblname);
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();

    }
    function getRow($table,$config='') {
        if(!empty($config)){
            $this->db->where($config);
        }
        $query = $this->db->get($table);
        return $query->row();
        
    }
    function putDate($table,$fields){
        $this->db->insert($table,$fields);
        // echo $this->db->last_query();
        return $this->db->insert_id();
    }
            
    function getMax($table,$field){
        $maxid = 0;
        $row = $this->db->query("SELECT MAX($field) AS `maxid` FROM `$table`")->row();
        if ($row) {
            $maxid = $row->maxid; 
        }
        return $maxid;
    }
    function updateDate($table,$fields,$condition=''){
        if(isset($condition)){
            $this->db->where($condition);
        }
        return $this->db->update($table,$fields);
    }
    function deleteDate($table,$condition=''){
        if(isset($condition)){
            $this->db->where($condition);
            return $this->db->delete($table);
        }
    }
    
}

