<?php 
	class specialexpenseController extends CI_Controller{
		Public function __construct() {
			parent::__construct();
			$this->load->model('SpecialExpenseModel');
			$this->load->model('formExpenseModel');
			$this->load->helper('url');
			$this->load->database();
		}

		Public function index() {
			$query = $this->db->get("savings"); 
			$data['savings'] = $query->result();
			$this->load->view('specialexpense',$data); 
			
		}
		//loads the add form_expense view
		Public function addSpecial(){
			$this->load->view('form_expense');
		}

		public function savings_delete()
		{
			$data = $this->uri->segment(3);
			$this->SpecialExpenseModel->delete_by_id($data);
			$this->index();
		}
	}
?>