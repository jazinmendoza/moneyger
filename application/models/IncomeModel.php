<?php

class IncomeModel extends CI_Model{

	public function __construct()  
    {  
       parent::__construct();
       $this->load->database();
    } 

    //calls the functions that will query to the database
    //accepts an array of result set
    //returns an array of the total income, total budget, 
    //total expense, total savings
    public function getSummaryTotal($user_id){
        return $summary = array(
            $this->totalIncome($user_id),
            $this->totalBudget($user_id),
            // $this->totalExpenses($user_id),
            // $this->totalSavings($user_id)
        );
    }
    
    //queries the total income from the database
    //returns an array of result set
    public function totalIncome($user_id){
        $query = $this->db->query("SELECT SUM(amount_earned) as total_income 
                                   FROM income 
                                   WHERE user_id = '".$user_id."' 
                                        AND MONTH(income_date) = MONTH(CURRENT_TIMESTAMP)");
    	return $query->result();
    }

    //queries the total income from the database
    //returns an array of result set
    public function totalBudget($user_id){
        $query = $this->db->query("SELECT SUM(amount_allocated) as total_budget 
                                   FROM budget 
                                   WHERE user_id = '".$user_id."' 
                                        AND MONTH(budget_date) = MONTH(CURRENT_TIMESTAMP)");
        return $query->result();
    }

    //queries the total income from the database
    //returns an array of result set
    public function totalExpenses($user_id){
        $query = $this->db->query("SELECT SUM(amount_spent) as total_expenses 
                                   FROM transaction 
                                   WHERE user_id = '".$user_id."' 
                                        AND MONTH(budget_date) = MONTH(CURRENT_TIMESTAMP)");
        return $query->result();
    }
}
?>