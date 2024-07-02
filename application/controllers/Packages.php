<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Packages extends CI_Controller
{
    var $user_id;

    function __construct()
    {
        parent::__construct();

        $user_id = $this->session->userdata("id");
        $patient_id = $this->session->userdata("pid");

        		// print_r($user_id);die;

        if (!$user_id && !$patient_id) {
            redirect("adminlogin", "refresh");
        }

        $this->load->model("AdminModel");
        $this->load->model("PatientModel");
        $this->load->model('ServiceModel');
		$this->load->model('InventoryModel');
		$this->load->model('MasterModel');
		$this->load->model('WalletModel');
        // Load cart library
        $this->load->library('cart');

        date_default_timezone_set("Asia/Kolkata");
       
    }

    public function index(){
       $result['packages'] = $this->MasterModel->getalldata('package_list');
        $this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('packages/list',$result);
		$this->load->view('footer');
    }

    public function create(){
        $result['services'] = $this->MasterModel->active_data('services');
        $result['category'] = $this->MasterModel->active_data('service_category');
         $this->load->view('header');
         $this->load->view('sidenavbar');
         $this->load->view('packages/add',$result);
         $this->load->view('footer');
     }
     public function packagestore(){

        if($this->input->post('submit_data'))		 
        {
            $this->form_validation->set_rules('package_name','package_name','trim|required');
            $this->form_validation->set_rules('price','price','trim|required');
             
            if($this->form_validation->run() == TRUE)
            {
                // echo "dfa";die();
				$config['upload_path']          = './uploads/packages';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 1024;
				// $config['max_width']            = 768;
				// $config['max_height']           = 768;
                $image="";
                $this->load->library('upload', $config);
				
				if ($this->upload->do_upload('image'))
				 {
                 $image = $this->upload->data('file_name');
                  
				 }

               // echo $id; die();
               $service_id = $this->input->post('service_id'); // Assuming this is an array of service IDs
               $session_number = $this->input->post('service_session'); 
               $s_cat_id = $this->input->post('service_cat_id'); 

            //    Encode Process
                    $service_id = json_encode($service_id);
                    $session_number = json_encode($session_number);
                    $cat_id = json_encode($s_cat_id);

       $data=array(

               'package_name' => $this->input->post('package_name'),
               'price' => $this->input->post('price'),
               'status' => $this->input->post('status'),
               'description' => $this->input->post('description'),
               'exp_date' => $this->input->post('exp_date'),
               'service_session' => $session_number,
               'service_id'=>$service_id,
               'service_cat_id' => $cat_id,
               'image' => $image,
           );	
           
        $this->MasterModel->insert('package_list',$data);
        $this->session->set_flashdata('success','Packages Added Sucessfully');
        redirect(base_url().'packages');
           }
       }
       else{
           echo "validation skip";
       }
     }

     public function getService(){
        $id=$this->input->post('id');
        $services= $this->MasterModel->getServicesByCategory($id,'services');
        if ($services) {
            // Return services as JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['services' => $services]));
        } else {
            // Return a message if no data is found
            $this->output
                ->set_status_header(404)
                ->set_output('No Data Found');
        }
     }

    

     public function package_edit($id){
        $result['services'] = $this->MasterModel->active_data('services');
        $result['packages'] = $this->MasterModel->get_databy_id($id,'package_list');
        $result['category'] = $this->MasterModel->getalldata('service_category');
         $this->load->view('header');
         $this->load->view('sidenavbar');
         $this->load->view('packages/edit',$result);
         $this->load->view('footer');
     }

     public function packageupdate($id){
        if($this->input->post('submit_data'))
		 
        {
            $this->form_validation->set_rules('package_name','package_name','trim|required');
            $this->form_validation->set_rules('price','price','trim|required');
             
            if($this->form_validation->run() == TRUE)
            {
                 // echo "dfa";die();
				$config['upload_path']          = './uploads/packages';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 1024;
				// $config['max_width']            = 768;
				// $config['max_height']           = 768;
		
                $this->load->library('upload', $config);
				
				if ($this->upload->do_upload('image'))
				 {
                 $image = $this->upload->data('file_name');
                  
				 }
                 else{
                      $image = $this->input->post('old_image');
                 }

               // echo $id; die();
               $service_category_ids = $this->input->post('service_category_id'); // Assuming this is an array of service IDs
               $service_cat_id = $this->input->post('service_cat_id'); // Assuming this is an array of service IDs
               $service_session = $this->input->post('service_session'); // Assuming this is an array of service IDs

               $service_category_id = json_encode($service_category_ids);
               $service_cat_id = json_encode($service_cat_id);
               $session_number = json_encode($service_session);

       $data=array(

               'package_name' => $this->input->post('package_name'),
               'price' => $this->input->post('price'),
               'status' => $this->input->post('status'),
               'service_category_id' => $service_category_id,
               'service_cat_id' => $service_cat_id,
               'service_session' => $session_number,
               'image' => $image,
               'description' => $this->input->post('description'),
               'exp_date' => $this->input->post('exp_date'),
           );	

           $this->MasterModel->update('package_list',$data,$id);
       $this->session->set_flashdata('success','Update Package Sucessfully');
       redirect(base_url().'packages');
           }
       }
       else{
           echo "validation skip";
       }
     }

     public function delete($id){
        $this->MasterModel->deletedata($id,'package_list');
		$this->session->set_flashdata('success','Delete sucessfully');
	   redirect(base_url().'packages');
     }


     public function cart(){
        $data = array();
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        // Load the cart view
        $this->load->view('header');
        $this->load->view('sidenavbar');
        $this->load->view('wallet/package_preview', $data);
        $this->load->view('footer');
    }

     public function package_list($id){
        $result = array();
        // Fetch products from the database
        $_SESSION['wallet_patient_id'] = $id;
        $result['packages'] = $this->MasterModel->active_data('package_list');
         $this->load->view('header');
         $this->load->view('sidenavbar');
         $this->load->view('wallet/package_list',$result);
         $this->load->view('footer');
     }

     function addToCart($proID){

    // Fetch specific product by ID
    $product = $this->MasterModel->get_databy_id($proID,'package_list');
        
    // Add product to the cart
    
    $data = array(
        'id'    => $product[0]->id,
        'qty'    => 1,
        'price'    => $product[0]->price,
        'name'    => $product[0]->package_name,
        'image' =>$product[0]->image
    );
    $result=$this->cart->insert($data);
    // print_r($result); die();
    // Redirect to the cart page
    redirect('packages/cart');

     }


     function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
    
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('packages/cart');
    }

    
    function placeOrder($custID){
        // Insert order data
        $ordData = array(
            'customer_id' => $custID,
            'grand_total' => $this->cart->total(),
            'transaction_id' => 'PACK-'.time().'-'.date('m-d-Y')
        );
       
        $insertOrder =  $this->MasterModel->insertOrder($ordData,'orders');
        
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();
            
            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['order_id']     = $insertOrder;
                $ordItemData[$i]['product_id']     = $item['id'];
                $ordItemData[$i]['quantity']     = $item['qty'];
                $ordItemData[$i]['sub_total']     = $item["subtotal"];
                $i++;
            }
            
            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems = $this->MasterModel->insertOrderItems($ordItemData);// for get ordered_items id
                $insertOrderItems = $this->MasterModel->get_databy_id($insertOrderItems,'order_items'); //for get package id
                $ordered_package = $this->MasterModel->get_databy_id($insertOrderItems[0]->product_id,'package_list');
                $Orders_details = $this->MasterModel->get_databy_id($insertOrder,'orders');
               
                // print_r($insertOrder); die();

            $service_ids=json_decode($ordered_package[0]->service_id);
			$service_session_number_cr=json_decode($ordered_package[0]->service_session);
			
			foreach($service_ids as $key=>$value)
			{
				$data=array(
					'status' =>1,
					'patient_id' =>$Orders_details[0]->customer_id,
					'transaction_id' =>$Orders_details[0]->transaction_id,
					'service_id' =>$value,
					'service_session_qty_in' =>$service_session_number_cr[$key],
					'balance_session' =>$service_session_number_cr[$key],
					'created_at' =>$Orders_details[0]->created,
				);
				// print_r($data); die();
				$serviceresult=$this->WalletModel->transaction_service_wallet($data);
			}
                
                
                if($insertOrderItems){

                    // Remove items from the cart
                    $this->cart->destroy();
                    
                    // Return order ID
                    redirect("patients/view_wallet/".$_SESSION['wallet_patient_id'], "refresh");
                    
                    // return $insertOrder;
                }
            }
        }
        return false;
    }
    
    function orderSuccess($ordID){
        // Fetch order data from the database
       $data['order'] = $this->MasterModel->getOrder($ordID);
       $this->load->view('header');
       $this->load->view('sidenavbar');
       $this->load->view('wallet/package_transaction_details',$data);
       $this->load->view('footer');

    }

    public function getServiceprice() {
        $service_category_id = $this->input->post('service_category_id');
        $result['packages'] = $this->MasterModel->get_databy_id($service_category_id, 'services');
        
        if ($result['packages']) {
            // If data is found, return a JSON response
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['package' => $result['packages']]));
        } else {
            // If no data is found, return an error message
            echo "No Data Found";
        }
    }













}