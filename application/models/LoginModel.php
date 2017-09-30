<?php

class LoginModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //  This function checks the data if it is in the database   
    public function getData($email, $password)
    {
        $query = $this->db->query("SELECT * 
                                   FROM user 
                                   WHERE email_address = '".$email."'
                                   AND password = '".$password."'");
        return $query->result();
    }
}

?>