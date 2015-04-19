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
	 * Confirm_master_login Method - User_model
	 * 
	 * Confirm the login of a user
	 */
	public function confirm_master_login($email, $password)
	{
		$this->db->select('master_user_name, master_user_password');
		$this->db->from('tmt_master_user');
		$this->db->where('master_user_email', $email);
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$hashed_password = $row->master_user_password;
			
			if (password_verify($password, $hashed_password))
			{
				return $row->master_user_name;
			}
			else
			{
				return FALSE;	
			}
		}
		else
		{
			return FALSE;			
		}
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
