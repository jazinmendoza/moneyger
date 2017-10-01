<?php 
	class formExpenseController extends CI_Controller{
		Public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('formExpenseModel');
			$this->load->model('SpecialExpenseModel');
		}
		Public function insertSpecBudget(){

			if($this->input->post("amount_saved")>=1){
				$data = array (
					'income_id' =>'1',
					'savings_id' =>$this->input->post("savings_id"),
					'savings_name' =>$this->input->post("savings_name"),
					'amount_saved'=>$this->input->post("amount_saved")
					 );
				$this->formExpenseModel->insertSpecialDetail($data);


				$data['savings'] = $this->SpecialExpenseModel->viewExpense();
				$this->load->view('specialexpense',$data);

				
			}else{
				echo '<script language="javascript">';
				echo 'alert("Please Enter A Positive Budget")';
				echo '</script>';
				$this->load->view('form_expense');
			}
		
			// $icon = $this->input->post("icon");
			// $budget_name = $this->input->post("budget_name");
			// $amount_allocated = $this->input->post("amount_allocated");
			// $status = $this->newBudgetController->insertBudget($icon,$budget_name,$amount_allocated);

			// if($status == true){
			// 	echo "success!";
			// }else{
			// 	echo "yolo";
			// }

			// $this->load->view('sample');
		}

		
	}



?>