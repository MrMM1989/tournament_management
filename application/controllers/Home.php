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
		$this->load->view('header');
		$this->load->view('footer');
	}
}
