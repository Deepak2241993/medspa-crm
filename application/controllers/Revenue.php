<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Revenue extends CI_Controller 

{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
// 		$this->load->model("Data_fetch", "a"); 
		$this->load->model('RevenueModel');
        $user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}

	}


public function yearData(){
 $result=$this->RevenueModel->fetchtableyear();
  // print_r($result);die;
  $year=array();
  $revanu=array();
  $subservicepay=array();
  foreach($result as $value){
       
      array_push($year,$value->year);
      array_push($revanu,$value->tamount);
      array_push($subservicepay,$value->tamount-$value->servivepay);
  }

    $this->load->view('header');
	$this->load->view('sidenavbar');
	$this->load->view('revenue/yearly',compact('year','revanu','subservicepay'));
	$this->load->view('footer');

}
public function yearservies(){
    $this->load->view('header');
	$this->load->view('sidenavbar');
	$this->load->view('revenue/yearly');
	$this->load->view('footer');

}
public function weekservies(){
    $this->load->view('header');
	$this->load->view('sidenavbar');
	$this->load->view('revenue/yearly');
	$this->load->view('footer');

}
public function monthservies(){
    $this->load->view('header');
	$this->load->view('sidenavbar');
	$this->load->view('revenue/services_month');
	$this->load->view('footer');

}
public function MonthData(){
    
    $result=$this->RevenueModel->fetchmonthbyis();
    $getallinvoicid=$this->RevenueModel->getallinvoicidBymonth();
 // print_r($getallinvoicid);die;
  $month=array();
  $revanu=array();
    $subservicepay=array();
  foreach($result as $value){
     
      array_push($month,date("F", mktime(0, 0, 0, $value->month, 10)));
      array_push($revanu,$value->tamount);
       array_push($subservicepay,$value->tamount-$value->servivepay);
  }
    $this->load->view('header');
	$this->load->view('sidenavbar');
	$this->load->view('revenue/month',compact('month','revanu','subservicepay'));
	$this->load->view('footer');

}
public function WeekData(){
    
     $result=$this->RevenueModel->fetchweekly();
   //print_r($result);die;
  $month=array();
  $revanu=array();
  $subservicepay=array();
  foreach($result as $value){
     
      array_push($month,$value->week.' Weeks');
      array_push($revanu,$value->tamount);
       array_push($subservicepay,$value->tamount-$value->servivepay);
  }
    $this->load->view('header');
	$this->load->view('sidenavbar');
	$this->load->view('revenue/week',compact('month','revanu','subservicepay'));
	$this->load->view('footer');

}
public function DailyData(){
 
  $result=$this->RevenueModel->fetchtabledaley();
   $invoicid= $this->RevenueModel->fetchtIDabledaleyID();
  $year=array();
  $revanu=array();
   $subservicepay=array();
  foreach($result as $value){
       
      array_push($year,$value->day);
      array_push($revanu,$value->tamount);
      array_push($subservicepay,$value->tamount-$value->servivepay);
  }
//print_r($result);die;
    $this->load->view('header');
	$this->load->view('sidenavbar');
	$this->load->view('revenue/daily',compact('year','revanu','subservicepay'));
	$this->load->view('footer');

}



}

?>