<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament extends CI_Controller {

	/**
	 * Index Method - TournamentController - Overviewpage tournaments
	 *
	 * Maps to: 
	 * 	- domain/tournament
	 * 	- domain/tournament/index
	 */
	public function index()
	{
		$data = array (
			'title' => 'Tournaments' 
		);
		
		$this->load->view('header', $data);
		$this->_generate_user_nav();
		$this->_generate_main_nav();		
		$this->load->view('tournament/tournament_overview');
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
