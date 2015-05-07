<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament extends CI_Controller {

	/**
	 * Constructor - TournamentController
	 *
	 * Loads the helpers, models and libraries needed for this controller
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		//$this->load->library('form_validation');
	}

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
	 * Create Method - TournamentController - Creation page tournaments
	 *
	 * Maps to: 
	 * 	- domain/tournament/create
	 */
	public function create()
	{
		// Check if the user is logged in, if not show login form
	 	if(!isset($_SESSION['username']))
		{
			$_SESSION['login_first'] = 'TRUE';
			$this->session->mark_as_flash('login_first');
			redirect('account/login_form');
		}
		
		$data = array (
			'title' => 'Create a tournament' 
		);
		
		$this->load->view('header', $data);
		$this->_generate_user_nav();
		$this->_generate_main_nav();		
		$this->load->view('tournament/tournament_create');
		$this->load->view('footer');
	}
	
	/**
	 * Create_confirm Method - TournamentController - Confirm a creation of a tournament
	 */
	public function create_confirm()
	{
		// Check if the user is logged in, if not show login form
	 	if(!isset($_SESSION['username']))
		{
			$_SESSION['login_first'] = 'TRUE';
			$this->session->mark_as_flash('login_first');
			redirect('account/login_form');
		}
		
		// Take user input out of the fields
		$tournament_name = $this->input->post('tname');
		$max_participants = $this->input->post('tmaxplayers');
		$teams = $this->input->post('teams');
		$rules = $this->input->post('trules');
		$prices = $this->input->post('tprices');
		
		// Create tournament in database -> tournament_model
		
		// Redirect to index page tournament controller
		redirect('tournament/index');
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
