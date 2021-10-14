<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {
    public function fetch_contents($table,$data=array()){
        $this->db->select('*');
        $this->db->from($table);        
        $this->db->where($data);        
        //$this->db->where($data);
        
        $query = $this->db->get();
        if($query -> num_rows()){
            return $query->result_array();
        }
        else{            
            return false;
        }
    }
    public function insert_table($table,$data){
        $this->db->insert($table,$data);
        return $this->db->affected_rows() > 0;
    }

    public function fetch_qa($data){        
        $this->db->select('*');
        $this->db->from('question_table as a');        
        $this->db->join('answer_table as b','b.q_id=a.id');                                
        $this->db->where('a.id=',$data['current']);
        $this->db->limit('1');
        $query = $this->db->get();
        // var_dump($this->db->last_query());
        // die();
        if($query -> num_rows()){
            return $query->result_array();
        }
        else{            
            return false;
        }
    }

    public function skip($data){
       $this->db->insert('result_table',$data);
       return true;
    }

}
