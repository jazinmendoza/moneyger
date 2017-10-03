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
        $data['liabilities'] = $this->LiabilitiesModel->getData();
        $this->load->view('LiabilitiesView', $data);
    }

    public function getLiabilities()
    {
         json_encode($this->LiabilitiesModel->getData());
    }

    public function deleteLiability()
    {
        
    }
}


?>