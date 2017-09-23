<?php 
	class detailController extends CI_Controller{
		Public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('DetailModel');
		}
		Public function viewDetails(){
			$data = $this->uri->segment(3);
			$result = $this->DetailModel->getBudgetDetails($data);
			$this->load->view('details',$result[0]);			
		}

		

	}



?>