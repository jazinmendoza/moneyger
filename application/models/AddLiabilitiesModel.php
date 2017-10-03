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

	public function insertData($userId, $description, $amount, $percentage, $month) 
	{
		$query = $this->db->query("INSERT INTO liabilities (liabilities_id, user_id, liabilities_name, liabilities_amount, 											   liabilities_percentage, liabilities_months, date, date_due)
								   VALUES (NULL, ".$userId.", '".$description."', ".$amount.", ".$percentage.", ".$month.", CURRENT_DATE(),
								   DATE_ADD(CURRENT_DATE(), INTERVAL ".$month." MONTH))");

		return $query;
	}
}

?>