<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class FrontDashboard extends CI_Controller 

{

	function __construct()

	{

		parent::__construct();

		$this->load->model('AdminModel');

			$this->load->model('PatientModel');

		date_default_timezone_set('Asia/Kolkata');

		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}

	}



	public function index()

	{

		$result['patients_note_list'] = $this->PatientModel->getallpatient_notes_list($_POST);

		$result['services'] = $this->PatientModel->getserivces();

		// $result['provider'] = $this->PatientModel->getallprovider();

		$result['dates']= $_POST;  
		// echo "<pre>";
		// 	     print_r($result['patients_note_list']);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('FrontDashboard',$result);

		$this->load->view('footer');

	}

	public function createAppointment(){

	    $result['services_category'] = $this->PatientModel->getserivcesCagegory();

		$result['provider'] = $this->PatientModel->getallprovider();

	    $result['patients_list'] = $this->PatientModel->getallpatients();

		$this->load->view('header');
		$this->load->view('sidenavbar');

		$this->load->view('createAppointment',$result);

		$this->load->view('footer');

	}

	public function addAppointment(){

	    

	    $data=array('patient_id'=>$this->input->post('patientid'),

	                'provider_id'=>$this->input->post('providerid'),

	                'service_category_id'=>$this->input->post('servivceid'),

	                'app_date' =>$this->input->post('appdate'),

	                'app_time'=>$this->input->post('apptime'),

	                'created_on'=>date('Y-m-d H:i:s')

	                );

	                $this->session->set_flashdata('success','Appointment create successfully');

	                $this->PatientModel->addAppointment($data);

	               redirect(base_url().'FrontDashboard');

	}

		public function add_packeg_wallet_session($notid,$pid){

        	    $result['services'] = $this->PatientModel->getserivces();

        		$result['notid'] = $notid;

        	    $result['patients_list'] = $this->PatientModel->getpatientbyID($pid);

        	    $this->load->view('header');

        		$this->load->view('frontsidebar');

        		$this->load->view('add_packeg_seesionin_wallet',$result);

        		$this->load->view('footer');

	}

    	public function all_transication(){

    	         $result['all_transication'] = $this->PatientModel->getall_session_package();

    	    	 $this->load->view('header');

        		$this->load->view('frontsidebar');

        		$this->load->view('all_session_package_list',$result);

        		$this->load->view('footer');

    	}

		public function save_session_peckage($notesid){

	    

	    $data=array('pid'=>$this->input->post('patientid'),

	                'number_of_session_package'=>$this->input->post('number_of_session'),

	                'name_see_pack'=>$this->input->post('session_pack'),

	                'type' =>$this->input->post('type'),

	                'amount'=>$this->input->post('pay_amount'),

	               

	                );

	            

	                $this->session->set_flashdata('success','peckage/session  create successfully');

	                $this->PatientModel->save_session_peckage($data);

	               // }else{

	               //       $data=array(

	               // 'wallet_amount'=>$this->input->post('pay_amount'),

	               

	               // );

	               // $this->session->set_flashdata('success','you wallet recharge successfully');

	               // $this->PatientModel->update_wallet_amount($data,$this->input->post('patientid'));

	               // }

	               redirect(base_url().'patients/generic/'.$notesid.'/'.$this->input->post('patientid'));

	}



}







?>