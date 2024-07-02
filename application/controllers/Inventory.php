<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		 // load form and url helpers
        $this->load->helper(array('form', 'url'));
         
        // load form_validation library
        $this->load->library('form_validation');
		
		$this->load->model('ServiceModel');
		$this->load->model('InventoryModel');
		$this->load->model('ProductModel');
		date_default_timezone_set('Asia/Kolkata');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}
	}
	
	
	function index()
	{
	    $result['services'] = $this->ServiceModel->getallservices();
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('inventory/allservice_list',$result);
		$this->load->view('footer');
	}
	
	function create($id)
	{
	    $data = $this->ServiceModel->getsubservicebysid($id);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('inventory/subservice_list',compact('data'));
		$this->load->view('footer');
	}
	
	function create_inventory($sid,$ssid)
	{
	    $data = $this->ServiceModel->filterbyssid_sid($ssid);
	    $this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('inventory/inventory_form',compact('data'));
		$this->load->view('footer');
	}

 function frontdesk(){
		// $data = $this->ServiceModel->view_inventory();
		$data['inventory'] = $this->InventoryModel->getFrontProduct('inventory','products');
		$data['products'] = $this->ProductModel->frontProductList();
		// print_r($data['products'][0]); die();
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('inventory/frontdesk_list',$data);
		$this->load->view('footer');
 }


 function create_product_front(){
	 $result['services'] = $this->ServiceModel->getallservices();
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('inventory/add_product_frontdesk',compact('data'));
		$this->load->view('footer');
 }

 public function frontproductIntroduce(){
	if($this->input->post('submit_data')){
		
		//echo '<pre>';print_r($this->input->post());die;
		$this->form_validation->set_rules('product_name','Product Name','trim|required');
		$this->form_validation->set_rules('parent_company','Parent Company','trim|required');
		$this->form_validation->set_rules('product_units','product units','trim|required');
		if($this->form_validation->run() == TRUE)
		{
			// echo "dfa";die();
			$config['upload_path']          = './uploads/products';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1024;
			// $config['max_width']            = 768;
			// $config['max_height']           = 768;
	
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('image'))
			 {
			  $image = $this->upload->data('file_name');
			 }
			$data = array(
			'product_name'   		=> $this->input->post('product_name'),
			'parent_company' 		=> $this->input->post('parent_company'),
			'product_units' 		=> $this->input->post('product_units'),
			'product_type' 		=> $this->input->post('product_type'),
			'Image' 				=> $image,
			'status'				=> 1,
			'created_at' => date('Y-m-d H:i:s')
				);
			
				$result = $this->ProductModel->insert('products',$data);
			
			if($result)
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully inserted.</div>');
				redirect('inventory/frontdesk');
			}
			else
			{  
				
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center msg">Failed to insert data</div>');
				redirect('inventory/frontdesk');
			}
		}
		else{
			echo "fads";die();
				redirect('inventory/frontdesk');
		}
	}

}
	public function productIntroduce(){
		if($this->input->post('submit_data')){
			
			//echo '<pre>';print_r($this->input->post());die;
			$this->form_validation->set_rules('product_name','Product Name','trim|required');
			$this->form_validation->set_rules('parent_company','Parent Company','trim|required');
			$this->form_validation->set_rules('product_units','product units','trim|required');
			if($this->form_validation->run() == TRUE)
			{
				// echo "dfa";die();
				$config['upload_path']          = './uploads/products';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1024;
				// $config['max_width']            = 768;
				// $config['max_height']           = 768;
		
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('image'))
				 {
				  $image = $this->upload->data('file_name');
				 }
				$data = array(
				'product_name'   		=> $this->input->post('product_name'),
				'parent_company' 		=> $this->input->post('parent_company'),
				'product_units' 		=> $this->input->post('product_units'),
				'Image' 				=> $image,
				'status'				=> 1,
				'created_at' => date('Y-m-d H:i:s')
					);
				
					$result = $this->ProductModel->insert('products',$data);
				
				if($result)
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully inserted.</div>');
					redirect('inventory');
				}
				else
				{  
					
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center msg">Failed to insert data</div>');
					redirect('inventory');
				}
			}
			else{
				echo "fads";die();
					redirect('inventory');
			}
		}

	}
	
	
	public function save_inventory(){
		if($this->input->post('submit_data')){			
			// echo '<pre>';print_r($this->input->post());die;
			$this->form_validation->set_rules('product_id','Product Name','trim|required');
			$this->form_validation->set_rules('quantity_in','Product Qty','trim|required');
			$this->form_validation->set_rules('expiry_date','Expiry Date','trim|required');
			$this->form_validation->set_rules('paid_amount','Paid for Product','trim|required');
			$this->form_validation->set_rules('product_units','Product Units','trim|required');
			if($this->form_validation->run() == TRUE)
			{
			    

				$data = array(
					'product_id'   		=> $this->input->post('product_id'),
					'quantity_in' 		=> $this->input->post('quantity_in'),
					'expiry_date' 		=> $this->input->post('expiry_date'),
					'paid_amount' 		=> $this->input->post('paid_amount'),
					'product_units' 	=> $this->input->post('product_units'),
					'lot_number' 		=> "LOT-".date('Y-m-d'),
					'remaning_qty' 		=> $this->input->post('quantity_in'),
					'created_at' 		=> date('Y-m-d H:i:s'),
					
					);
					$result = $this->InventoryModel->insert('inventory',$data);
				
				if($result)
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully inserted.</div>');
					redirect('inventory/view_inventory');
				}
				else
				{  
					
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center msg">Failed to insert data</div>');
					redirect('inventory/view_inventory');
				}
			}
			else{
			    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center msg">Something technical ERROR!.</div>');
					redirect('inventory/view_inventory');
			}
		}

	}

	public function save_front_inventory(){
		if($this->input->post('submit_data')){			
			// echo '<pre>';print_r($this->input->post());die;
			$this->form_validation->set_rules('product_id','Product Name','trim|required');
			$this->form_validation->set_rules('quantity_in','Product Qty','trim|required');
			$this->form_validation->set_rules('expiry_date','Expiry Date','trim|required');
			$this->form_validation->set_rules('paid_amount','Paid for Product','trim|required');
			$this->form_validation->set_rules('product_units','Product Units','trim|required');
			if($this->form_validation->run() == TRUE)
			{
			    

				$data = array(
					'product_id'   		=> $this->input->post('product_id'),
					'quantity_in' 		=> $this->input->post('quantity_in'),
					'expiry_date' 		=> $this->input->post('expiry_date'),
					'paid_amount' 		=> $this->input->post('paid_amount'),
					'product_units' 	=> $this->input->post('product_units'),
					'lot_number' 		=> "LOT-".date('Y-m-d'),
					'remaning_qty' 		=> $this->input->post('quantity_in'),
					'created_at' 		=> date('Y-m-d H:i:s'),
					'product_type'		=>$this->input->post('product_type'),
					
					);
					$result = $this->InventoryModel->insert('inventory',$data);
				
				if($result)
				{
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully inserted.</div>');
					redirect('inventory/frontdesk');
				}
				else
				{  
					
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center msg">Failed to insert data</div>');
					redirect('inventory/frontdesk');
				}
			}
			else{
			    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center msg">Something technical ERROR!.</div>');
					redirect('inventory/frontdesk');
			}
		}

	}
	
	
		public function view_inventory(){
			$result['inventory'] = $this->InventoryModel->get('inventory','products');
			$result['products'] = $this->ProductModel->getallProduct();
			$this->load->view('header');
			$this->load->view('sidenavbar');
			$this->load->view('inventory/view_inventory',$result);
			$this->load->view('footer');
	    }
		public function fetch_single_inventory(){
			$output = array();  
			$data = $this->InventoryModel->get('inventory','inventory_id',$this->input->post("id")); 
			if($data){
			$output['inventory_id']  = $data['0']['inventory_id'];
			$output['product_name']  = $data['0']['product_name'];
			$output['current_inventory']  = $data['0']['current_inventory'];
			}  
			echo json_encode($output); 
	    }

		public function getCost()
		{
			$p_id = $this->input->post('product_id');
		
			$this->db->select('remaning_qty');
			$this->db->select('paid_amount');
			$this->db->select('quantity_in');
			$this->db->from('inventory');
			$this->db->where('product_id', $p_id);
			$this->db->where('(quantity_in - quantity_out) !=', 0);
			$rec_inventory = $this->db->get()->result_array();
		
			if (!empty($rec_inventory)) {

				// Product Cost as per per lot
				

				$cc=array();
				$reming_qty=array();
				foreach($rec_inventory as $key=>$value)
				{
					$cost=number_format($value['paid_amount']/$value['quantity_in'], 2, '.', '' );
					array_push($cc,$value['remaning_qty']*$cost);
					array_push($reming_qty,$value['quantity_in']);
				}

				
				$current_inventory_cost=array_sum($cc)/array_sum($reming_qty);
				$current_inventory_cost=  number_format($current_inventory_cost ,2,'.','');

				$output = array("current_cost"=>$current_inventory_cost);
				 echo json_encode($output);

			} else {
				echo 0;
			}
		}
	// $query = $this->db->where('inventory_id', $product_id)->get('inventory');
	
	
	  
	  public function update_inventory($inventory_id){
		
			$result['products'] = $this->ProductModel->getallProduct();
		    $result['inventory'] = $this->InventoryModel->editInventory($inventory_id);
			// echo "<pre>";
			// print_r($result['inventory']); die();
			$this->load->view('header');
			$this->load->view('sidenavbar');
			$this->load->view('inventory/updateinventory_form',$result);
			$this->load->view('footer');
	    }

		public function submit_updated_inventory($inventory_id){
			$url_id = $this->input->post('url_id');
			$updated_data = array(
				'product_id'   		=> $this->input->post('product_id'),
				'quantity_in' 		=> $this->input->post('quantity_in'),
				'expiry_date' 		=> $this->input->post('expiry_date'),
				'paid_amount' 		=> $this->input->post('paid_amount'),
				'product_units' 	=> $this->input->post('product_units'),
				'lot_number' 		=> $this->input->post('lot_number'),
				'updated_at' 		=> date('Y-m-d H:i:s'),


			);

			$this->InventoryModel->update($updated_data,$inventory_id);

			$this->session->set_flashdata('success','Update Inventory Sucessfully');
			redirect(base_url().'inventory/view_inventory');
			} 
		

		// public function update_inventory(){
		
		// 	if($this->input->post('taction')=="update_product"){
		// 		  $updated_data = array(
		// 				'item_cost'   => $this->input->post("item_cost"),
		// 				'item_quantity'  => $this->input->post("item_quantity")
		// 			);
		// 			$result = $this->InventoryModel->update('inventory',$updated_data,'inventory_id',$this->input->post('id'));
		// 			if($result===TRUE)    { 
		// 				echo json_encode(array('success'=>'Details updated successfully')); 
		// 				die;
		// 			} 
		// 			else {
		// 				echo json_encode(array('error'=>'Fail to update Details'));
		// 			} 
		
		// 		}
		// 		else{
		// 			$insert_data = array( 
		// 				'service_name'  => $this->input->post("service_name")
		// 			); 
		// 			$insertdb = $this->InventoryModel->insert('services', $insert_data);   
		// 			if($insertdb){
		// 				echo json_encode(array('success'=>'Data Added successfully'));
		// 			} else {
		// 				echo json_encode(array('error'=>'Fail to Add Data'));
		// 			}
		// 	  }
		// 	}

		// public function delete_inventory(){  
		// 	$result = $this->InventoryModel->delete('inventory','inventory_id',$this->input->post("id")); 
		// 	if($result){
		// 		echo json_encode(array('success'=>'Data updated successfully'));
		// 	}
		// 	else{
		// 		echo json_encode(array('error'=>'Fail to Update Data.'));
		// 		}
		// }
	
	   public function delete_inventory($inventory_id){
		    $result = $this->InventoryModel->delete('inventory','inventory_id',$inventory_id);
		   
		    if($result){
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Deleted.</div>');
				
				redirect('inventory/view_inventory');
			}
		   
		   else{
			   $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center msg">Failed to delete</div>');
			   redirect('inventory/view_inventory');
		   }
	    }
	
	
}


?>