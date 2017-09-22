<?php 
	class chartController extends CI_Controller{
		Public function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model('chartModel');
		}
		//calls the model and sends the data to the view

		Public function index(){
			$data['budget'] = $this->chartModel->getAllBudget();
			$this->load->view('chartView',$data); 

		}
		
	}



?>