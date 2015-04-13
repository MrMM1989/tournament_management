<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {


	/**
	 * Constructor - AccountController
	 *
	 * Loads the helpers, models and libraries needed for this controller
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}
	
	/**
	 * Login_form Method - AccountController - Loginpage Site
	 *
	 * Maps to: 
	 * 	- domain/account/login_form
	 */
	public function login_form()
	{
		$data = array (
			'title' => 'Login' 
		);
		
		$this->load->view('header', $data);
		$this->load->view('navigation/user_visitor');
		$this->load->view('navigation/main_visitor');
		$this->load->view('account/login_form');
		$this->load->view('footer');
	}
	
	/**
	 * Register_form Method - AccountController - Registerpage Site
	 *
	 * Maps to: 
	 * 	- domain/account/register_form
	 */
	public function register_form()
	{
		$data = array (
			'title' => 'Register' 
		);
		
		$this->load->view('header', $data);
		$this->load->view('navigation/user_visitor');
		$this->load->view('navigation/main_visitor');
		$this->load->view('account/register_form');
		$this->load->view('footer');
	}
}
