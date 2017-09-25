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
		
		//function to delete selected record from database
		Public function delete_specific_budget() {		
			$data = $this->uri->segment(3);
			$this->DetailModel->deleteBudget($data);
			$this->index();			
		}

		//updated specific budget in the database
		Public function update_budget() {		
			$data = $this->uri->segment(3);
			$id = $this->input->post('did');
			$data = array(
				'amount_allocated' => $this->input->post('budgetamt'),
				'note' => $this->input->post('note'),
			);

			$this->db->set($data);
			$this->DetailModel->UpdateBudget($id,$data);
			$this->index();			
		}
	}



?>
