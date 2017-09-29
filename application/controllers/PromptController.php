<?php
	class PromptController extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url'));
			$this->load->library(array('session', 'form_validation'));
			$this->load->database();
			$this->load->model('UserModel');
			
			$this->user_id = $this->session->flashdata('user_id'); // -- returns NULL on this end, try to fix.
		}

		public function index(){
			$this->form_validation->set_rules('income', 'Income', 'trim|required|decimal');
			$this->form_validation->set_rules('budget', 'Budget', 'trim|required|decimal');
			$data["user_id"] = $this->session->user_id;
			if($this->form_validation->run() == FALSE){
                $this->load->view('PromptView', $data); // -- possibly remove the data
            }else{
            	$incomeArray = array(
            		'user_id' => $this->session->user_id,
            		'amount_earned' => $this->input->post('income')
            	);
            	$budgetArray = array(
            		'user_id' => $this->session->user_id,
            		'icon' => "",	//replace this with a generic icon soon
            		'budget_name' => "Monthly Budget",
            		'amount_allocated' => $this->input->post('budget')
            	);
            	if($this->UserModel->insertIncome($incomeArray) && $this->UserModel->insertBudget($budgetArray)){
            		// -- redirect to MainView
            	}else{
            		// -- redirect back and show errors;
            	}
			}
		}
	}
?>