<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Method - HomeController - Homepage Site
	 *
	 * Maps to: 
	 * 	- domain
	 * 	- domain/home
	 * 	- domain/home/index
	 */
	public function index()
	{
		$data = array (
			'title' => 'Home' 
		);
		
		$this->load->view('header', $data);		
		$this->_generate_user_nav();
		$this->_generate_main_nav();
		$this->load->view('home/home_visitor');
		$this->load->view('footer');
	}
	
	/**
	 * Private function for generating the main navigation based on user role
	 */
	 private function _generate_main_nav()
	 {
	 	if(isset($_SESSION['username']))
		{
			$this->load->view('navigation/main_user');
		}
		else 
		{
			$this->load->view('navigation/main_visitor');
		}
	 }
	
	/**
	 * Private function for generating the user navigation based on user role
	 */
	private function _generate_user_nav()
	{
		if(isset($_SESSION['username']))
		{
			$this->load->view('navigation/user_user');
		}
		else
		{
			$this->load->view('navigation/user_visitor');	
		}
	}
}
