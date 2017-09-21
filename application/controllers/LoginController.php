<?php
    // include_once('model/UserModel.php');
    

    class LoginController extends CI_Controller{

        public function index(){
            
            if(!isset($_REQUEST['email']) && !isset($_REQUEST['password'])) {
                $this->load->view('LoginView'); 
            } else {
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $this->load->model('UserModel'); 
                $this->UserModel->getLogin($email, $password);
                //if exists
                $this->load->view('Mainview');
            }
        }
        
        // public function __construct()
        // {
        //     $this->model = new UserModel();
            
        // }
        
        // public function invoke()
        // {
            
        
            
        // }
    }
?>