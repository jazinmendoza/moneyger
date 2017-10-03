<?php

class LiabilitiesModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getData()
    {
    	$query = $this->db->query("SELECT liabilities_name, liabilities_amount, liabilities_months, date_due
    							   FROM liabilities
    							   WHERE user_id = 1"); //Session here po

    	$output = $this->getLastId();

    	return $query->result();
    }

    public function getLastId()
    {
    	$query = $this->db->query("SELECT liabilities_id
    							   FROM liabilities
    							   JOIN income
    							   ON income.user_id = liabilities.user_id
    							   ORDER BY liabilities_id
    							   DESC LIMIT 1");

    	return $query->result();
    }

    public function updateDeleteLiability()
    {
    	$query = $this->db->query("UPDATE");
    }
}

?>