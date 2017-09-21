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
            $this->getIncome($user_id),
            $this->getTotalBudget($user_id),
            // $this->totalExpenses($user_id),
            // $this->totalSavings($user_id)
        );
    }
    
    //queries the total income from the database
    //returns an array of result set
    public function getIncome($user_id){
        $query = $this->db->query("SELECT amount_earned as total_income 
                                   FROM income 
                                   WHERE user_id = '".$user_id."'");
    	return $query->result();
    }

    //queries the total income from the database
    //returns an array of result set
    public function getTotalBudget($user_id){
        $query = $this->db->query("SELECT SUM(amount_allocated) as total_budget 
                                   FROM budget 
                                   WHERE user_id = '".$user_id."' 
                                        AND MONTH(budget_date) = MONTH(CURRENT_TIMESTAMP)");
        return $query->result();
    }

    //queries the total income from the database
    //returns an array of result set
    public function getTotalExpenses($user_id){
        $query = $this->db->query("SELECT SUM(amount_spent) as total_expenses 
                                   FROM transaction 
                                   WHERE user_id = '".$user_id."' 
                                        AND MONTH(budget_date) = MONTH(CURRENT_TIMESTAMP)");
        return $query->result();
    }

    public function setIncome($user_id, $amount){
        $query = $this->db->simple_query("UPDATE income
                                   SET amount_earned= '".$amount."' 
                                   WHERE user_id= '".$user_id."'");

        if($query){
            return TRUE;
        }

    }
}

?>