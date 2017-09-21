<?php
	class AddExpenseController extends CI_Controller{
		public function __construct()
		{
	   		parent::__construct();
	   		$this->load->model('ExpenseModel');
		}
		
		//gets uri variable $user
		//calls getBudgetTypes from ExpenseModel which returns the array $budget
		// and passes an array to AddExpenseView
		public function index(){
			if ( isset($_GET['user']) ) {
        		$user = $_GET['user'];
        	}
        	
			$budget['list'] = $this->ExpenseModel->getBudgetTypes($user);
			$this->load->view('AddExpenseView', $budget);
		}

		
	}
?>