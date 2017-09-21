<?php
   // require_once('connection.php'); 
   // include_once('controller/LoginController.php');
   session_start();

    class UserModel extends CI_Model{
 
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function getLogin($email, $password)
        {
            $query = $this->db->query("SELECT * FROM user WHERE email_address = '".$email."' AND password = '".$password."'");
            $count=0;
            $row= $query->row();
            foreach ($query->result() as $row){
                $count++;
            }
            if($count==1){
                $_SESSION['user'] = $row->user_id;
            }
            // $rows = mysqli_num_rows($result);
            // if($rows == 1) {
            //     while($row = mysqli_fetch_array($result)){
            //         $_SESSION['user'] = $row['user_id'];
            //     }
            //     $this->getMainView();
            // } else {
            //     echo 'wrong!';
            // }
        }
        
        public function getMainView(){
            if(isset($_SESSION['user'])){
                //open main view
                include 'view/Mainview.php';
            }
        }
    }
?>