<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		date_default_timezone_set('Asia/Kolkata');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

}



?>