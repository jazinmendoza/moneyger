<?php
	class RegistrationController extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->helper(array('form','url'));
			$this->load->library(array('session', 'form_validation'));
			$this->load->database();
			$this->load->model('UserModel');
		}

		public function index(){
			$this->form_validation->set_rules('firstName', 'First Name', 'trim|required|alpha|max_length[30]');
			$this->form_validation->set_rules('middleName', 'Middle Name', 'trim|required|alpha|max_length[25]');
			$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|alpha|max_length[25]');
			$this->form_validation->set_rules('suffix', 'Suffix', 'trim|alpha|max_length[10]');
			$this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[user.email_address]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[re-password]|min_length[6]|max_length[35]');
			$this->form_validation->set_rules('re-password', 'Retype Password', 'trim|required|min_length[6]|max_length[35]');
			
			if($this->form_validation->run() == FALSE){
				// -- if no form had been submitted yet
                $this->load->view('RegistrationView');
            }else{
            	// -- if the form had been submitted already
            	// -- populate the data array for user
            	$userData = array(
            		'email_address' => $this->input->post('email'),
            		'password' => $this->input->post('password'),
            		'currency' => $this->input->post('currency') == '1' ? 'PHP' : 'USD',
            		);
            	
            	if($this->UserModel->insertUser($userData)) {
            		// -- if the user data has successfully been added to the database
            		// -- set the session data'
            		$sessionData = array(
						'user_id' => $this->db->insert_id(),
						'email' => $this->input->post('email'),
						'logged_in' => TRUE
					);

					// -- populate the data array for name
					$nameData = array(
						'user_id' => $this->db->insert_id(),
	            		'first_name' => $this->input->post('firstName'),
	            		'middle_name' => $this->input->post('middleName'),
	            		'last_name' => $this->input->post('lastName'),
	            		'suffix' => $this->input->post('suffix'),
            		);
					if($this->UserModel->insertName($nameData)){
						// -- if the name data has successfully been added to the database
						// -- save details in a session
						$this->session->set_userdata($sessionData);
						// -- redirect to PropmtController
						redirect(base_url() . '/index.php/PromptController/index');
					}else{
						// -- set session for the error message
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured while trying to create user. Please try again later.</div>');
						// -- redirect to 
						redirect(base_url() . '/index.php/RegistrationController/index');
					}
				}else{
					// -- set session for the error message
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured while trying to create user. Please try again later.</div>');
					redirect(base_url() . '/index.php/RegistrationController/index');
				}
            }
		}
	}
?>