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
	 * Login Method - AccountController - Method for verifying a login 
	 */	
	 public function login()
	 {
	 	$email = $this->input->post('email');
		$password = $this->input->post('password');
		
	 	$login = $this->user_model->confirm_master_login($email, $password);
		
		if ($login != FALSE)
		{
			$_SESSION['username'] = $login;
			redirect('home');
		}
	 }
	
	
	/**
	 * Login_form Method - AccountController - Loginpage Site
	 *
	 * Maps to: 
	 * 	- domain/account/login_form
	 */
	public function login_form()
	{
		if(isset($_SESSION['username']))
		{
			redirect('home');
		}
		else
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
	}
	
	/**
	 * Logout Method - AccountController - Log a user out
	 */	
	 public function logout()
	 {
	 	session_destroy();
		redirect('home');
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
					'rules' => 'required|min_length[5]|max_length[25]|alpha_dash|is_unique[tmt_master_user.master_user_name]',
					'errors' => array(
						'alpha_dash' => 'A %s may only contain letters, numbers and underscores.',
						'is_unique' => 'Unfortunately this username is already taken. Please choose another.'
					)
				),
				array (
					'field' => 'email',
					'label' => 'email',
					'rules' => 'required|valid_email|max_length[100]|is_unique[tmt_master_user.master_user_email]',
					'errors' => array (
						'is_unique' => 'Unfortunately this email is already taken. Please choose another.'
					)
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
			
			redirect('home');	
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
		if(isset($_SESSION['username']))
		{
			redirect('home');
		}
		else
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
}
