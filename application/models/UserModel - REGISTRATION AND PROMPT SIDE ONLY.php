<?php
    if(!defined('BASEPATH')) {
        exit('No direct script access allowed');
    }

    class UserModel extends CI_Model{
        public $connection;
        
        public function __construct(){
            parent::__construct();
        }

        public function insertUser($userData){
            return $this->db->insert('user', $userData);
        }

        public function insertName($nameData){
            return $this->db->insert('name', $nameData);
        }

        public function insertIncome($incomeData){
            return $this->db->insert('income', $incomeData);
        }

        public function insertBudget($budgetData){
            return $this->db->insert('budget', $budgetData);
        }
    }
?>