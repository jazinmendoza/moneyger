<?php
	class ExpenseModel extends CI_Model{
		public function __construct()  
    	{  
       		parent::__construct();
       		$this->load->database();
    	} 

    	public function getBudgetTypes($user_id){
			$query = $this->db->query("SELECT * 
                                   	   FROM budget 
                                       WHERE user_id = '".$user_id."'");
			return $query->result();
		}
	}
?>