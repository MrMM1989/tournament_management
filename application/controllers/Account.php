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
		$this->load->library('form_validation');
		$this->load->model('user_model');
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
	 * Register Method - AccountController - Method for validating and registering a user account
	 */	
	public function register()
	{
		$val_rules = array(
				array (
					'field' => 'username',
					'label' => 'username',
					'rules' => 'required|min_length[5]|max_length[25]|alpha_numeric',
					'errors' => array(
						'alpha_numeric' => 'A %s may only contain letters, numbers and underscores.',
					)
				),
				array (
					'field' => 'email',
					'label' => 'email',
					'rules' => 'required|valid_email|max_length[100]'
				),
				array (
					'field' => 'cemail',
					'label' => 'confirmed email',
					'rules' => 'required|matches[email]'
				),
				array (
					'field' => 'password',
					'label' => 'password',
					'rules' => 'required|min_length[5]|max_length[250]'
				),
				array (
					'field' => 'cpassword',
					'label' => 'confirmed password',
					'rules' => 'required|matches[password]'
				),
				array (
					'field' => 'accepttos',
					'label' => '',
					'rules' => 'required',
					'errors' => array (
						'required' => 'Please agree with our terms of service and privacy policy.'
					)
				) 
		);
		
		$this->form_validation->set_rules($val_rules);
		
		if($this->form_validation->run() == FALSE)
		{
			$data = array (
				'title' => 'Register an account' 
			);
			
			$this->load->view('header', $data);
			$this->load->view('navigation/user_visitor');
			$this->load->view('navigation/main_visitor');
			$this->load->view('account/register_form');
			$this->load->view('footer');
		}
		else
		{
			$username = $this->input->post('username', TRUE);
			$email = $this->input->post('email', TRUE);
			$password = $this->input->post('password');
			
			$this->user_model->insert_master_registration($username, $email, $password);	
		}
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
			'title' => 'Register an account' 
		);
		
		$this->load->view('header', $data);
		$this->load->view('navigation/user_visitor');
		$this->load->view('navigation/main_visitor');
		$this->load->view('account/register_form');
		$this->load->view('footer');
	}
}
