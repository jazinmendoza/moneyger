<?php 
	session_start();
	class MonthlyBudgetController extends CI_Controller{
		public function __construct() {
			parent::__construct();
			$this->load->model('BudgetModel');
			$this->load->model('DetailModel');
			$this->load->model('IncomeModel');
			$this->load->database();
		}
		//calls the model and sends the data to the view

		public function index(){
			$data['budget'] = $this->BudgetModel->viewBudget($_SESSION['user']);
			$this->load->view('MonthlyBudget', $data); 

		}
		//loads the newBudget view
		public function addBudget(){
			$res['pic'] = $this->BudgetModel->viewImage();
			$this->load->view('newBudget',$res);
		}

		//function to delete selected record from database
		public function delete_specific_budget() {		
			$data = $this->uri->segment(2);
			$this->DetailModel->deleteBudget($data);
			redirect('monthly_budget');		
		}
		//updated specific budget in the database
		public function update_budget() {		
			$data = $this->uri->segment(2);
			$id = $this->input->post('did');
			//-----validation-----
			$total_income = $this->IncomeModel->getIncome($_SESSION['user']); 
			//gets income from income model
			$total_budget = $this->IncomeModel->getTotalBudget($_SESSION['user']);
			//gets total budget
			$current_amount = $this->input->post("budgetamt");
			//gets post variable budgetamt from view which is now
			// the current amount to be compared from the previous amount
			$total_income=$total_income[0]->total_income;
			//gets total income from $total_income result set
			$total_budget=$total_budget[0]->total_budget;
			//gets total budget from $total_budget result set
			$detail = $this->DetailModel->getBudgetDetails($_SESSION['user'], $data);
			//gets budget details 
			$previous_amount = $detail[0]->amount_allocated;
			//gets the unupdated amount of the selected budget
			// which is the previous amount
			$additional = $current_amount-$previous_amount; 
			//difference of current and previous amount to determine if 
			//the update is to increase or decrease
			if($current_amount>=1){//if amount inputted is positive
				if(($additional + $total_budget) > $total_income){ 
				//if total budget exceeds the total income on update 
					redirect('details/'.$detail[0]->budget_id.'/-3');
					//returns to details with error
				}else{
				//else data can be passed to model to be updated
					$data = array (
						'amount_allocated' => $this->input->post('budgetamt')
						 );
					$this->db->set($data);
					$this->DetailModel->UpdateBudget($id,$data);
					redirect('monthly_budget');
				}
			}else{ 
				//redirect if not positive amount
				redirect('details/'.$detail[0]->budget_id.'/-1');
			}		
		}


	}



?>