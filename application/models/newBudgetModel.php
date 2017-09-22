<?php

class newBudgetModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    /*  This function checks the data if 
    it is in the database   */
    public function insertDetail($data)
    {
        

        $this->db->insert('budget',$data);

        if($this->db->affected_rows()>0){
                return true;
        }                         
        
    }
}

?>