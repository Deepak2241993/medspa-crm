<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class AdminDashboard extends CI_Controller 

{

	function __construct()

	{

		parent::__construct();

		$this->load->model('AdminModel');

		$this->load->model('PatientModel');

		$this->load->model('ServiceModel');

		$this->load->model('EmployeeModel');
		$this->load->model('InventoryModel');

		date_default_timezone_set('Asia/Kolkata');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}

	}

 

	public function index()

	{

		// count((array)

		$result['staf'] = $this->EmployeeModel->getemployee();
		$result['provider'] = $this->EmployeeModel->employee_be_dept('employees','Provider');


		$result['patient'] = $this->PatientModel->getallpatients();

		$result['services'] = $this->ServiceModel->getallservices();

		$result['inventory'] = $this->InventoryModel->get('inventory');


		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('admindashboard',$result);

		$this->load->view('footer');

	}



}







?>