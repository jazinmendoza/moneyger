<?php
class HomeController extends CI_Controller
{
	public function __construct()
	{
	   parent::__construct();
	   	$this->load->model('IncomeModel');
	}


	//accepts POST variable passed from the Mainview 
	//returns a json array of arrays of the summary of totals
	public function showSummary(){
		$user_id=$_POST['user_id'];
		echo json_encode($this->IncomeModel->getSummaryTotal($user_id));
	}

	public function editIncome(){
		$amount= $_POST['income'];
		$user_id=$_POST['user_id'];
		if($this->IncomeModel->setIncome($user_id, $amount)){
			echo 'true';
		}
	}
}
?>