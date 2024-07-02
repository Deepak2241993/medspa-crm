<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Services extends CI_Controller 

{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->load->model('InventoryModel');
		date_default_timezone_set('Asia/Kolkata');

	}

    public function index(){
		$result['services'] = $this->ServiceModel->getallservices();
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('servicepages/allservices',$result);
		$this->load->view('footer');
	}


	public function view(){
		$result['inventory'] = $this->InventoryModel->get('inventory');
			$this->load->view('header');
			$this->load->view('sidenavbar');
			$this->load->view('servicepages/viewservices',$result);
			$this->load->view('footer');

	}


	public function insert_service_data(){
		
		if($this->input->post('taction')=="update_product"){
			  $updated_data = array(
					'sid'   => $this->input->post("serviceid"),
					
					'service_name'     => $this->input->post("service_name"),
					'service_charge'   => $this->input->post("service_charge")
				);
				$result = $this->InventoryModel->update('service_name',$updated_data,'sid',$this->input->post('id'));
				if($result===TRUE)    { 
					echo json_encode(array('success'=>'Details updated successfully')); 
					die;
				} 
				else {
					echo json_encode(array('error'=>'Fail to update Details'));
				} 
	
			}
			else{
				$insert_data = array( 
					'service_name'  => $this->input->post("service_name"),
				'service_name'     => $this->input->post("service_name")
				); 
				$insertdb = $this->InventoryModel->insert('services', $insert_data);   
				if($insertdb){
					echo json_encode(array('success'=>'Data Added successfully'));
				} else {
					echo json_encode(array('error'=>'Fail to Add Data'));
				}
		  }
		}

	public function updateServiceData($id){
		$update=array(
			'service_name'=>$this->input->post('service_name'),
			'service_charge'=>$this->input->post('service_charge'),
			'status'=>$this->input->post('status'),
		   	// 'created_at'=>date('Y-m-d H:i:s')
			
			);			
		$this->InventoryModel->updateservices($update,$id);
		$this->session->set_flashdata('success','Update Services Sucessfully');
		redirect(base_url().'services');
		
	}

    public function deleteservices($id){
		$this->InventoryModel->deleteservices($id);
		$this->session->set_flashdata('success','Delete sucessfully');
	   redirect(base_url().'services');
 	}



	public function neurotoxin()

	{

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('servicepages/neurotoxin');

		$this->load->view('footer');

	}

//used for js API

	/*

	public function partcularsubservice()

	{

		$id = $this->input->post();

		if($data = $this->ServiceModel->getallsubservices($id))

		{

?>

	<div class="form-group row">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Sub Service Name</label>

        <div class="col-sm-6">

            <select class="form-control" id="" name="ssname">

                <option hidden value="">Select Sub Service</option>

                

            </select>

        </div>

        <?=form_error("ssname","<div class='text-danger'>","</div>")?>

    </div>

    <?php

		}

		else

		{

			echo "Error";

		}

	}*/



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
		
		
		 public function addsubService(){
		$result['services'] = $this->ServiceModel->getallservices();
		//print_r($result['services']);die;
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('servicepages/add_sub_service',$result);
		$this->load->view('footer');
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