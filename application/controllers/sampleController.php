<?php 
	class sampleController extends CI_Controller{
		Public function __construct() {
			parent::__construct();
			$this->load->model('sampleModel');
			$this->load->database();
		}
		//calls the model and sends the data to the view

		Public function index(){
			$data['budget'] = $this->sampleModel->viewBudget();
			$this->load->view('sample',$data); 

		}
		//loads the newBudget view
		Public function addBudget(){
			$res['pic'] = $this->sampleModel->viewImage();
			$this->load->view('newBudget',$res);
		}
	}



?>