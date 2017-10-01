<?php

class formExpenseModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

         public function insertSpecialDetail($data)
    {

        $this->db->insert('savings',$data);

        if($this->db->affected_rows()>0){
                return true;
        }                         
        
    }
   
}

?>