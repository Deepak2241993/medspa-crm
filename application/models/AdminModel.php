<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class AdminModel extends CI_Model 

{

	function __construct()

	{

		parent::__construct();

	}



	public function adminlogin($username)

	{

		$data = $this->db->get_where('admin',['username'=>$username]);

		return $data->row();

	}

	

	public function patientlogin($email,$utype,$upass)

	{

		$data = $this->db->get_where('patient_registration',['email'=>$email,'user_type'=>$utype,'password'=>$upass],1);

		return $data->row();

	}

	

	public function employeeLogin($email,$utype,$upass)

	{
		$data = $this->db->get_where('employees',['email'=>$email,'department' => $utype,'password'=>$upass],1);
		return $data->row();

	}



}

?>