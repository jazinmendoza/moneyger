<?php 
	class newBudgetController extends CI_Controller{
		Public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('newBudgetModel');
			$this->load->model('sampleModel');
		}
		Public function insertBudget(){


			if($this->input->post("amount_allocated")>=1){
				$data = array (
					'user_id' =>'1',
					'picId' =>$this->input->post("picId"),
					'budget_name' =>$this->input->post("budget_name"),
					'amount_allocated'=>$this->input->post("amount_allocated")
					 );
				$this->newBudgetModel->insertDetail($data);


				$data['budget'] = $this->sampleModel->viewBudget();
				$this->load->view('sample',$data);

				
			}else{
				echo '<script language="javascript">';
				echo 'alert("Please Enter A Positive Budget")';
				echo '</script>';
				$this->load->view('newBudget');
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