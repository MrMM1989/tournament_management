<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	/**
	 * Constructor - User_model
	 *
	 * Loads the helpers and libraries needed for this model
	 */
	public function __construct()
    {
    	parent::__construct();
    }
	
	/**
	 * Insert_master_registration Method - User_model
	 * 
	 * Handles the user registration and insert the values into the database
	 */
	public function insert_master_registration($username, $email, $password)
	{
		//First hash the password	
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		
		//Set the data for the database
		$data = array (
			'master_user_name' => $username,
			'master_user_email' => $email,
			'master_user_password' => $hashed_password,
			'master_user_registration_date' => date('Y-m-d H:i:s', time())
		);
		
		//Insert the data into the database
		$this->db->insert('tmt_master_user', $data);
	}
}
