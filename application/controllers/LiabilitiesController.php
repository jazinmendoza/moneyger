<?php

class LiabilitiesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LiabilitiesModel');
        $this->load->database();
    }
    
    public function index()
    {
        $this->load->view('LiabilitiesView');
    }
}


?>