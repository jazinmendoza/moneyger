<?php 		
	session_start();
	class detailController extends CI_Controller{
		public function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->database();
			$this->load->model('DetailModel');			
			$this->load->model('BudgetModel');
		}
		public function viewDetails(){
			$data = $this->uri->segment(2);
			$result['details'] = $this->DetailModel->getBudgetDetails($_SESSION['user'], $data);
			$this->load->view('details',$result);			
		}

	}



?>