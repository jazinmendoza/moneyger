<?php

class DetailModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    /*  This function checks the data if 
    it is in the database   */
    public function getBudgetDetails($budget_id)
    {
        $query = $this->db->query("SELECT * 
                                   FROM budget 
                                   WHERE budget_id = '".$budget_id."'");
        return $query->result();
    }


    // This function deletes a specific budget 
    public function deleteBudget($budget_id)
    {
        $query = $this->db->query("DELETE 
                                   FROM budget 
                                   WHERE budget_id = '".$budget_id."'");

    }

    public function UpdateBudget($budget_id, $data)
    {
        $this->db->where('budget_id', $budget_id);
        $this->db->update('budget', $data);

    }



}

?>