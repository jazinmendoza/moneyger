<?php

/**
* 
*/
class AddLiabilitiesController extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AddLiabilitiesModel');
	}

	public function index()
	{
		if(isset($_POST['userId']) && isset($_POST['description']) && isset($_POST['amount']) && isset($_POST['percentage'])) {
			$userId = $_POST['userId'];
			$description = $_POST['description'];
			$amount = $_POST['amount'];
			$percentage = $_POST['percentage'];

			$output = $this->AddLiabilitiesModel->insertData($userId, $description, $amount, $percentage);

			if($output == 1) {
				$this->load->view('LiabilitiesView');
			} else {
				$checker['error'] = false;
				$this->load->view('LiabilitiesView', $checker);
			}
		} else {
			$this->load->view('AddLiabilitiesView');
		}
	}
}

?>