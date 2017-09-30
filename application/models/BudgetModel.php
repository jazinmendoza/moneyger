<?php

class BudgetModel extends CI_Model {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    /*returns the result set for the budget table*/
    public function viewBudget($user_id){
       $query =  $this->db->query("SELECT budget_id,user_id,budget_name,amount_allocated,name,pic
                                 FROM budget 
                                 JOIN picture ON budget.picId = picture.picId
                                 WHERE user_id = '".$user_id."'");
        return $query->result();                    
    }

    public function viewImage(){
        $qiry = $this->db->get('picture');
        return $qiry->result();
    }
}

?>