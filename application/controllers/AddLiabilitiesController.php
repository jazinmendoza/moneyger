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
		if(isset($_POST['userId']) && isset($_POST['description']) && isset($_POST['amount']) && isset($_POST['percentage']) && isset($_POST['months'])) {
			$userId = $_POST['userId'];
			$description = $_POST['description'];
			$amount = $_POST['amount'];
			$percentage = $_POST['percentage'];
			$month = $_POST['months'];

			if($month < 0 || $amount < 0 || $percentage < 0) {
				$checker['error'] = false;
				$this->load->view('AddLiabilitiesView', $checker);
			} else {
				$output = $this->AddLiabilitiesModel->insertData($userId, $description, $amount, $percentage, $month);

				if($output == 1) {
					redirect('LiabilitiesController');
				} else {
					$checker['error'] = 'false';
					$this->load->view('AddLiabilitiesView', $checker);
				}
			}
		} else {
			$checker['error'] = true;
			$this->load->view('AddLiabilitiesView', $checker);
		}
	}
}

?>