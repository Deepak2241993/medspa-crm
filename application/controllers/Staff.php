<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends CI_Controller 

{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->load->model('InventoryModel');
		date_default_timezone_set('Asia/Kolkata');
    $user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}

	}
 
    public function index(){
		$result['staff'] = $this->ServiceModel->getstaff();
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('staff/staffList',$result);
		$this->load->view('footer');
    }
     
     public function staffDashboard(){
         $todaydata = $this->ServiceModel->total_today_pay_sum();
         $sumtoday=0;
             foreach($todaydata as $todaydatas) {
               $sumtoday += $todaydatas->work_time * $todaydatas->pay_per_hour;
              }
          $weekdata = $this->ServiceModel->total_week_pay_sum();
          $sumweek=0;
             foreach($weekdata as $weekdatas ) {
               $sumweek += $weekdatas->work_time * $weekdatas->pay_per_hour;
              }
        $monthdata = $this->ServiceModel->total_month_pay_sum();
          $summonth=0;
             foreach($monthdata as $monthdatas ) {
               $summonth += $monthdatas->work_time * $monthdatas->pay_per_hour;
              }  
            $yeardata = $this->ServiceModel->total_year_pay_sum();  
             $sumyear=0;
             foreach($yeardata as $yeardatas ) {
               $sumyear += $yeardatas->work_time * $yeardatas->pay_per_hour;
              }  
         
         $result['today_total_pay']=$sumtoday;
         $result['week_total_pay']=$sumweek;
         $result['month_total_pay']=$summonth;
         $result['year_total_pay']=$sumyear;
        $this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('staff/staffDashboard',$result);
		$this->load->view('footer');
     }
     
    public function addStaff(){
    // for geting data from services
      $query = $this->db->where('status', 1)->get('services');
      $services = $query->result();
      $data['services']=$services;
    // for geting data from services End
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('staff/addstaff',$data);
		$this->load->view('footer');
    }
     public function editStaff($id){
       // for geting data from services
       $query = $this->db->where('status', 1)->get('services');
       $services = $query->result();
       $result['services']=$services;
     // for geting data from services End
	    $result['editstaff'] = $this->ServiceModel->getstaffbyid($id);
      $this->load->view('header');
      $this->load->view('sidenavbar');
      $this->load->view('staff/editstaff',$result);
      $this->load->view('footer');
    }
    public function saveStaff(){

    if($this->input->post('submit_data'))
		{
			$this->form_validation->set_rules('name','patient name','trim|required');
			$this->form_validation->set_rules('pay_per_hour','pay per hour','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('phone','Phone','trim|required');
			$this->form_validation->set_rules('address','Address','trim|required');
			$this->form_validation->set_rules('designation','Designation','trim|required');
			$this->form_validation->set_rules('pay_per_service','Pay Per Services','trim|required');
			
			if($this->form_validation->run() == TRUE)
			{

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        // $config['max_width']            = 768;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('image'))
         {
          $image = $this->upload->data('file_name');
         }
       
			  $insert=array(
			      'name'=>$this->input->post('name'),
			      'pay_per_hour'=>$this->input->post('pay_per_hour'),
			      'gender'=>$this->input->post('gender'),
			      'email'=>$this->input->post('email'),
			      'phone'=>$this->input->post('phone'),
			      'designation'=>$this->input->post('designation'),
			      'address'=>$this->input->post('address'),
			      'doj'=>$this->input->post('doj'),
			      'status'=>1,
            'assign_service'=>$this->input->post('assign_service'),
            'update_by'=>$this->session->userdata('id'),
            'pay_per_service'=>$this->input->post('pay_per_service'),
			      'delete_status'=>0,
			      'image'=>$image,
			      );
			      $this->ServiceModel->savestaff($insert);

			     // echo 'success';
			      $this->session->set_flashdata('success','Add Staff Sucessfully');
			      redirect(base_url().'staff');
    }
    else{
			    redirect(base_url().'staff/addStaff');
			}
        }
    }
    
    public function updateStaff($id){
        	if($this->input->post('submit_data'))
	    	{

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        // $config['max_width']            = 768;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('image'))
         {
          $image = $this->upload->data('file_name');
          if(!empty($image))
          {
              $update=array(
                'image'=>$image,
              );
              $this->ServiceModel->updatestaff($update,$id);
          }
         }
			
         $update=array(
          'name'=>$this->input->post('sname'),
          'pay_per_hour'=>$this->input->post('pay_per_hour'),
          'gender'=>$this->input->post('gender'),
          'email'=>$this->input->post('email'),
          'phone'=>$this->input->post('phone'),
          'designation'=>$this->input->post('designation'),
          'address'=>$this->input->post('address'),
          'doj'=>$this->input->post('doj'),
          'pay_per_service'=>$this->input->post('pay_per_service'),
          'assign_service'=>$this->input->post('assign_service'),
          'update_by'=>$this->session->userdata('id'),
          'status'=>$this->input->post('status'),
         
         // 'created_at'=>date('Y-m-d H:i:s')
          
          );
			 
          
			      $this->ServiceModel->updatestaff($update,$id);
			        $this->session->set_flashdata('success','Update Staff Sucessfully');
			      redirect(base_url().'staff');
			
        
      }
    }
    public function deletestaff($id){
           $this->ServiceModel->deleteStaf($id);
           $this->session->set_flashdata('success','Delete sucessfully');
          redirect(base_url().'staff');
    }
    
    
     public function listofhourwork($id){
         $fileterdata = $this->input->post('date_filter');
          $result['filtername'] =$fileterdata;
         $result['id'] =$id;
		$result['staff'] = $this->ServiceModel->getstaffwork($id,$fileterdata);
	//	$result['staffs'] = $this->ServiceModel->getUserTotalByWeek();
		
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('staff/listofhourwork',$result);
		$this->load->view('footer');
    }
    
    public function addhourwork(){
	
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('staff/addhourwork');
		$this->load->view('footer');
    }
    public function saveWorkTime(){
        	if($this->input->post('submit_data'))
		{
			$this->form_validation->set_rules('staff_id','staf id','trim|required');
			$this->form_validation->set_rules('work_time','work time','trim|required');
			$this->form_validation->set_rules('work_date','work date ','trim|required');
			
			if($this->form_validation->run() == TRUE)
			{
			  $check=  $this->ServiceModel->checkworkdata($this->input->post('staff_id'),$this->input->post('work_date'));
			  if(empty($check)){
			$day= date('l', strtotime($this->input->post('work_date')));      
			   $hourrate=  $this->ServiceModel->getpay_per_hour($this->input->post('staff_id'));
			  $insert=array(
			      'staff_id'=>$this->input->post('staff_id'),
			       'work_day'=>$day,
			       'hour_rate'=>$hourrate->pay_per_hour,
			        'work_date'=>$this->input->post('work_date'),
			        'work_time'=>$this->input->post('work_time'),
			        );
			      $this->ServiceModel->saveWorktimeofstaff($insert);
			     // echo 'success';
			     $this->session->set_flashdata('success','Add sucessfully');
			      redirect(base_url().'staff/listofhourwork/'.$this->input->post('staff_id'));
			  }else{
			       $this->session->set_flashdata('error','Already added data');
			       redirect(base_url().'staff/addhourwork');
			  }
			}else{
			     $this->session->set_flashdata('error','All field required');
			    redirect(base_url().'staff/addhourwork');
			}
        }
    }
     public function deletestaffwork($id){
           $this->db->where('id',$id);
           $this->db->delete('staff_work_time');
            $this->session->set_flashdata('success','Delete sucessfully');
			redirect(base_url().'staff/listofhourwork/'.$id);
        
    }
    
    public function update_hourrate_bydate($stid){
        $todate=$this->input->post('todate');
        $fromdate= date('Y-mm-dd');
        $hourrate=$this->input->post('hour_rate');
         if($todate!='' && $fromdate !='' && $hourrate !=''){
             $this->ServiceModel->update_hourrate_by_date($todate,$fromdate,$hourrate,$stid);
            	redirect(base_url().'staff/listofhourwork/'.$stid); 
         }
        
    }
    
    public function all_calculation(){
	    $result['allcalution'] = $this->ServiceModel->getAllcalulation();
	
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('staff/overallList',$result);
		$this->load->view('footer');
    }
    
             public function exportCSV(){ 
           // file name 
               $filename = 'users_'.date('Ymd').'.csv'; 
               header("Content-Description: File Transfer"); 
               header("Content-Disposition: attachment; filename=$filename"); 
               header("Content-Type: application/csv; ");
               
               // get data 
               $usersData = $this->ServiceModel->getAllcalulation();
            
               // file creation 
               $file = fopen('php://output', 'w');
             
               $header = array("SR","Name","Service Name","Room no","bill amount","Service pay","Expens","Net"); 
               fputcsv($file, $header);
               $inputcsv=array();
                 $inputcsv1=array();
                $i=1; foreach ($usersData as $datas){
                    $inputcsv['id'] =$i;
                    $inputcsv['name'] =$datas->pname;
                    $inputcsv['service_name'] =$datas->service_name;
                   $inputcsv['room'] =$datas->room_no;
                   $inputcsv['bamount'] =$datas->bamount;
                   $inputcsv['service_pay'] =$datas->service_pay;
                   $inputcsv['total_expens'] =$datas->total_expens;
                    $inputcsv['tamount'] =$datas->tamount;
                  
                   
              array_push($inputcsv1,$inputcsv);
             $i++;  }
          
                 foreach ($inputcsv1 as $key=>$line){
                      fputcsv($file,$line); 
                 }
               fclose($file); 
             exit; 
          }

}
?>