<?php

class SpecialExpenseModel extends CI_Model {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function viewExpense(){
       $this->db->from('savings');
        $query=$this->db->get();
        return $query->result();                  
    }

     public function delete_by_id($savings_id)
    {
        $query = $this->db->query("DELETE 
                                   FROM savings 
                                   WHERE savings_id = '".$savings_id."'");
    }




    
}

?>