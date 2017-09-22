<?php

class chartModel extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    /*returns the result set for the budget table*/
    public function getAllBudget(){
       $query =  $this->db->get("budget");
        return  $query->result();                    
        
    }

   }

?>