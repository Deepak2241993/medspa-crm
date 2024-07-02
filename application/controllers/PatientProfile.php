<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientProfile extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}
// 		$this->load->model('AdminModel');
		date_default_timezone_set('Asia/Kolkata');
	}

	public function index()
	{
// 		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('PatientProfile');
		$this->load->view('footer');
	}

}
?>