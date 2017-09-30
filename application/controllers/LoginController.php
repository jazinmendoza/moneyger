<?php

class LoginController extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }
    
    // This method checks whether View passed email and password data
    public function index()
    {
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $output = $this->LoginModel->getData($email, $password);
            //echo json_encode($output);
            if(!empty($output)) {
                $this->load->view('Mainview'); // This redirects to the Main View if the statement is true
            } else {
                $checker['error'] = false;
                $this->load->view('LoginView', $checker); // This redirects to the Login view if the statement is false
            }
        } else {
            $checker['error'] = true; // default value
            $this->load->view('LoginView', $checker);
        }
    }
    
}
?>
