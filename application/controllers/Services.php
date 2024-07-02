<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Services extends CI_Controller 

{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->load->model('InventoryModel');
		$this->load->model('MasterModel');
		date_default_timezone_set('Asia/Kolkata');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}

	}

    public function index(){
		$result['services'] = $this->MasterModel->getalldata('services');
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('servicepages/viewservices',$result);
		$this->load->view('footer');
	}


	public function viewcategory(){
			$result['category'] = $this->MasterModel->getalldata('service_category');
			$this->load->view('header');
			$this->load->view('sidenavbar');
			$this->load->view('servicepages/service_category_list',$result);
			$this->load->view('footer');

	}


	public function insert_service_data(){
		
		if($this->input->post('taction')=="update_product"){
			  $updated_data = array(
					'name'     => $this->input->post("service_name"),
					'status'   => $this->input->post("status"),
					'created_at'  => date('Y-m-d H:i:s'),
				);
				$result = $this->MasterModel->update('service_category',$updated_data,$this->input->post('id'));
				if($result)    { 
					$this->session->set_flashdata('success','updated Category Sucessfully');
					redirect(base_url().'services/viewcategory');
				} 
				else {
					echo json_encode(array('error'=>'Fail to update Details'));
				} 
	
			}
			else{
				$insert_data = array( 
					'name'  => $this->input->post("service_name"),
					'created_at'  => date('Y-m-d H:i:s'),
					'status'  => 1
				); 
				$insertdb = $this->MasterModel->insert('service_category', $insert_data);   
				if($insertdb){
					echo json_encode(array('success'=>'Data Added successfully'));
				} else {
					echo json_encode(array('error'=>'Fail to Add Data'));
				}
		  }
		}

		public function deletecategory($id){
			$this->MasterModel->deletedata($id,'service_category');
			$this->session->set_flashdata('success','Delete sucessfully');
		   redirect(base_url().'services/viewcategory');
		 }

    public function deleteservices($id){
		$this->MasterModel->deletedata($id,'service_category');
		$this->session->set_flashdata('success','Delete sucessfully');
	   redirect(base_url().'services');
 	}

	 public function addService(){
		$result['category'] = $this->ServiceModel->get_list('service_category');
		$result['machine'] = $this->ServiceModel->get_list('service_category');
		//print_r($result['services']);die;
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('servicepages/add_service',$result);
		$this->load->view('footer');
	   }

public function storeservice(){
	$machine=implode(',',$this->input->post('machine_need'));
	$data=array(
		'service_name'=>$this->input->post('service_name'),
		'service_charge'=>$this->input->post('service_charge'),
		'create_at'=>$this->input->post('create_at'),
		'status'=>$this->input->post('status'),
		'service_cat_id'=>$this->input->post('service_cat_id'),
		'service_time'=>$this->input->post('service_time'),
		'machine_need'=>$machine,
		'service_booking_online'=>$this->input->post('service_booking_online'),
		'any_pre_condition'=>$this->input->post('any_pre_condition'),
		'procedure_info'=>$this->input->post('procedure_info'),
		'pre_post_info'=>$this->input->post('pre_post_info'),
		'info_for_front_desk'=>$this->input->post('info_for_front_desk'),
		'info_send_in_email'=>$this->input->post('info_send_in_email'),
		'conset'=>$this->input->post('conset')
	);
	$result = $this->MasterModel->insert('services',$data);
	if($result)
	{
			$this->session->set_flashdata('success','Add Services Sucessfully');
			redirect(base_url().'services');
	}
	else{
		$this->session->set_flashdata('error','Something Went Wrong');
		redirect(base_url().'services');
	}

}
public function service_edit($id)
{
	$result['category'] = $this->ServiceModel->get_list('service_category');
	$result['machine'] = $this->ServiceModel->get_list('service_category');
	$result['service'] = $this->MasterModel->get_databy_id($id,'services');
		//print_r($result['services']);die;
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('servicepages/add_service',$result);
		$this->load->view('footer');
}

public function updateservice($id){
	if(!empty($this->input->post('machine_need')))
	{

		$machine=implode(',',$this->input->post('machine_need'));
	}
	else{
		$machine=null;
	}
	$data=array(
		'service_name'=>$this->input->post('service_name'),
		'service_charge'=>$this->input->post('service_charge'),
		'create_at'=>$this->input->post('create_at'),
		'status'=>$this->input->post('status'),
		'service_cat_id'=>$this->input->post('service_cat_id'),
		'service_time'=>$this->input->post('service_time'),
		'machine_need'=>$machine,
		'service_booking_online'=>$this->input->post('service_booking_online'),
		'any_pre_condition'=>$this->input->post('any_pre_condition'),
		'procedure_info'=>$this->input->post('procedure_info'),
		'pre_post_info'=>$this->input->post('pre_post_info'),
		'info_for_front_desk'=>$this->input->post('info_for_front_desk'),
		'info_send_in_email'=>$this->input->post('info_send_in_email'),
		'conset'=>$this->input->post('conset')
	);
	$result = $this->MasterModel->update('services',$data,$id);
	if($result)
	{
			$this->session->set_flashdata('success','Service Updated Sucessfully');
			redirect(base_url().'services');
	}
	else{
		$this->session->set_flashdata('error','Something Went Wrong');
		redirect(base_url().'services');
	}

}

public function servicedelete($id){
	$result = $this->MasterModel->deletedata($id,'services');
	if($result)
	{
			$this->session->set_flashdata('success','Service Deleted Sucessfully');
			redirect(base_url().'services');
	}
	else{
		$this->session->set_flashdata('error','Something Went Wrong');
		redirect(base_url().'services');
	}
}


	public function neurotoxin()

	{

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('servicepages/neurotoxin');

		$this->load->view('footer');

	}


public function insert_sub_service_data(){
		
		if($this->input->post('taction')=="update_product"){
			  $updated_data = array(
					'sid'   => $this->input->post("s_id"),
					'sub_service_name'     => $this->input->post("sub_service")
				);
				$result = $this->InventoryModel->update('sub_service_name',$updated_data,'sid',$this->input->post('s_id'));
				if($result===TRUE)    { 
					echo json_encode(array('success'=>'Details updated successfully')); 
					die;
				} 
				else {
					echo json_encode(array('error'=>'Fail to update Details'));
				} 
	
			}
			else{ 

                $servicefnm = $this->ServiceModel->servicebyid($this->input->post("s_id"));//
            //    echo'<pre>';print_r($servicefnm[0]->service_name);die;
                $s_name=$servicefnm[0]->service_name;
				$insert_data = array( 
					'sid'   => $this->input->post("s_id"),
					'sub_service_name'  => $this->input->post("sub_service")
				);

                $insertdb1 = $this->ServiceModel->insert_sub_service($insert_data);

                $insert_data2 = array( 
					'service_category_id'   => $this->input->post("s_id"),
					'service_name'   => $s_name,
					'current_cost'  => $this->input->post("c_cost"),
					'item_quantity'   => $this->input->post("qty"),
					'product_name'  => $this->input->post("sub_service"),
					'product_units'   => $this->input->post("p_units"),
					'current_inventory'  => $this->input->post("qty"),
					'expiry_date'   => $this->input->post("exp_date"),
					'parent_cmpany'  => $this->input->post("parent_cmp"),
				);
//echo'<pre>';print_r($insert_data2);die;
				$insertdb2 = $this->InventoryModel->insert('inventory', $insert_data2);   
				if($insertdb2){
					echo json_encode(array('success'=>'Data Added successfully'));
				} else {
					echo json_encode(array('error'=>'Fail to Add Data'));
				}
		  }
		}
		
		
		
            
       public function save_sub_service(){
             $insert_data2 = array( 
					'sid'   => $this->input->post("services"),
					'sub_service_name'   => $this->input->post("sub_service_name"),
					'sub_service_charge'  => $this->input->post("sub_service_charge"),
					'service_pay'   => $this->input->post("service_pay"),
				    'status' => $this->input->post("status"),
				);
			
				$this->ServiceModel->save_sub_service($insert_data2);
			redirect(base_url().'services/viewSubServiceList');
       }
       

        public function viewSubServiceList(){
    		$result['services'] = $this->ServiceModel->getall_Subservices();
    	//	print_r($result['services']);die;
    		$this->load->view('header');
    		$this->load->view('sidenavbar');
    		$this->load->view('servicepages/subservicelist',$result);
    		$this->load->view('footer');
	   }
}





?>