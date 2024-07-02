<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ProviderDashboard extends CI_Controller 

{

	function __construct()

	{

		parent::__construct();

		$user_id = $this->session->userdata('id');

	if (!$user_id)

		 {

			redirect('AdminLogin','refresh');

		}

		$this->load->model('AdminModel');

		$this->load->model('PatientModel');

		date_default_timezone_set('Asia/Kolkata');

		$this->load->library('session');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}
	}



	public function index()

	{
	    $user_id = $this->session->userdata('id');

        $provider = $this->PatientModel->getprovider($user_id);

        //  echo'<pre>';print_r($provider);die;

        $this->load->view('header');

        $this->load->view('sidenavbar');

		$this->load->view('ProviderDashboard', compact('provider'));

		$this->load->view('footer');

	}

	

		public function check_in($id)

	{

	   // echo $id; die;

                 $data = array(

                        // 'check_in' => time(),

                      'provide_check_in' =>  date("H:i:s")

                    );



	    $checkin= $this->db->where('id',$id)->update('patient_notes',$data);

	    

	    	if ($checkin==1)

		 {

		  //   echo "okvinay";die;

			redirect('ProviderDashboard','refresh');

		}

	   

 		$this->load->view('header');

// 		$this->load->view('sidenavbar');

		$this->load->view('ProviderDashboard');

		$this->load->view('footer');

	}

	

		public function check_out($id)

	{

	    

	   // echo "checkout";

// 	  $id=$this->input->post('id');

// 	  echo $id;die;

	    

	    

                 $data = array(

                        // 'check_in' => time(),

                      'provide_check_out' =>  date("H:i:s")

                    );

                    // print_r($data);die;



	    $checkout= $this->db->where('id',$id)->update('patient_notes',$data);

	    

	    	if ($checkout==1)

		 {

		     

		  //   echo "okvinay";die;

			redirect('ProviderDashboard','refresh');

		}

	   

// 		$this->load->view('header');

// 		$this->load->view('sidenavbar');

		$this->load->view('ProviderDashboard');

		$this->load->view('footer');

	}



}







?>