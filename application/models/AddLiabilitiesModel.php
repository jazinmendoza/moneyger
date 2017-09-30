<?php

/**
* 
*/
class AddLiabilitiesModel extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insertData($userId, $description, $amount, $percentage) 
	{
		$query = $this->db->query("INSERT INTO liabilities 
								   (liabilities_id, user_id, liabilities_name, liabilities_amount, liabilities_duration, date)
								   VALUES (NULL, ".$userId.", '".$description."', ".$amount.", ".$percentage.", CURRENT_DATE())");

		return $query;
	}
}

?>