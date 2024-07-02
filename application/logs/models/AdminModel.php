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
	
	public function adminlogin2($email)
	{
		$data = $this->db->get_where('patient_registration',['email'=>$email]);
		return $data->row();
	}
	
	public function adminlogin_proivder($email)
	{
		$data = $this->db->get_where('provider_register',['email'=>$email]);
		return $data->row();
	}

}
?>