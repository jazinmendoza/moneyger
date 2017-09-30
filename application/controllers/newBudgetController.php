<?php 
	class newBudgetController extends CI_Controller{
		public function __construct() {
			session_start();
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('newBudgetModel');	
			$this->load->model('BudgetModel');
			$this->load->model('IncomeModel');
		}

		public function insertBudget(){
			$total_income = $this->IncomeModel->getIncome($_SESSION['user']);
			$total_budget = $this->IncomeModel->getTotalBudget($_SESSION['user']);
			$total_income=$total_income[0]->total_income;
			$total_budget=$total_budget[0]->total_budget;	
			if($this->input->post("amount_allocated")>=1){

				if(($this->input->post("amount_allocated")+$total_budget) > $total_income){
					redirect('add_budget/-3');
				}else if($this->uri->segment(3,0)==0){
					redirect('add_budget/-2');
				}else{
					$data = array (
					'user_id' =>''.$_SESSION['user'].'',
					'picId' =>$this->uri->segment(3,0),
					'budget_name' =>$this->input->post("budget_name"),
					'amount_allocated'=>$this->input->post("amount_allocated")
					 );
				$this->newBudgetModel->insertDetail($data);
				redirect('monthly_budget');
				}

			}else{
				redirect('add_budget/-1');
			}
			
		}


		public function addIcon(){
			$data['pic']=$this->newBudgetModel->getIcons();
			$this->load->view('AddBudgetIcon', $data);
		}

		public function getIcon(){
			$pic_id = $_POST['pic_id'];
			echo json_encode($this->newBudgetModel->getChosenIcon($pic_id));
		}
}

	?>