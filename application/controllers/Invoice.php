<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ServiceModel');
		$this->load->model('InvoiceModel');
		$this->load->model('PatientModel');
		$this->load->model('MasterModel');
		$this->load->model('ProductModel');
        $this->load->model('InventoryModel');
        date_default_timezone_set('Asia/Kolkata');
        $user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}
        
	}
	
	public function index(){
    if(isset($_GET)){

      $id=$_GET['id'];
      $prid=$_GET['prid']; 
        $current_date =date('Y-m-d');

        $data['notes_id'] =$id;
        $vid ='';
      // $this->load->view('invoice/bill');
      $data['invoice_amount'] = $this->MasterModel->get_databy_id($id,'invoice');
       
      // print_r($data['invoice_amount']);die;
      // $data['patient_notes1'] = $this->InvoiceModel->get_patient_notes1($id,$prid,$current_date);
      
        $data['patient_details']=$this->PatientModel->current_date_patient_note_data_sumofamount($prid,$current_date,$vid);
        
        
        // $sirvicearray= explode(",",$data['patient_notes1']['sid']);
        // $qtary= explode(",",$data['patient_notes1']['qty']);
       
       
        $data['patient_registration'] = $this->InvoiceModel->get_patient_data($prid);
        // print_r($data['patient_registration']); die;
         
      $data['payment_method'] = $this->ServiceModel->getallpaymentmethod();
		  $data['patients_list'] = $this->PatientModel->getallpatients();
		  $data['treatment_type'] = $this->ServiceModel->getallservices();
		  // $data['treatmentqty'] =array_combine($qtary,$sirvicearray);
		
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('invoice/create_invoice',$data);
		$this->load->view('footer');
    }
	}

	// public function index($id=null,$pid=null){
        
  //       $ptnotes_id = $id;
  //       $current_date =date('Y-m-d');
  //       $data['notes_id'] =$id;
  //       $vid ='';
  //       $data['patient_notes'] = $this->InvoiceModel->get_invoicedata($ptnotes_id,$pid);
  //       $data['patient_notes1'] = $this->InvoiceModel->get_patient_notes1($ptnotes_id,$pid,$current_date);
  //      // $data['patient_details']=$this->PatientModel->current_date_patient_note_data_sumofamount($pid,$current_date,$vid);
  //      $data['patients_list'] = $this->PatientModel->getallpatients();
  //      //$data['patient_details'] = $this->InvoiceModel->get_patient_data($patient_id);
     
  //       $data['payment_method'] = $this->ServiceModel->getallpaymentmethod();
	//    // $data['treatment_type'] = $this->ServiceModel->getallservices();
	//    $ssisd=explode(",",$data['patient_notes1']->ssid);
	//    $data['sabserviname']=$this->InvoiceModel->getsubservice($ssisd);
	// //print_r($data['sabserviname']);die;
		
	// 	$this->load->view('header');
	// 	$this->load->view('sidenavbar');
	// 	$this->load->view('invoice/creategenericinvoice',$data);
	// 	$this->load->view('footer');
	// }

	public function saveinvoice()
  {
    
    //echo'<pre>';print_r($this->input->post());die;
	   if($this->input->post('submit_data'))
		{
			$this->form_validation->set_rules('pname','patient name','trim');
			if($this->form_validation->run() == TRUE)
			{    
			
      
    // echo'<pre>';print_r($bamount);die;
    // calculate expense in invocie start


    $allexpens=0;
    $products=explode(",",$this->input->post('product'));
      $quantity=explode(",",$this->input->post('mquantity')); 
      
     if($products){         
            $i=0;
           //  echo'<pre>';print_r($products);die;
            foreach ($products as  $value) 
            {
                $expens=0;
                $cscost = $this->db->select('current_sell_cost')->from('inventory')->where('inventory_id',$value)->get()->row();
                $expens +=$cscost->current_sell_cost *$quantity[$i];
               
         
         
           $i++; }
          
           }
            $credit_expens=0;
           $stippayment_exp=0;
           $care_credit_exp=0;
           //cedit card expens
          
           if($this->input->post('credit_card') !=0){
              $credit_expens = $this->expensecaluclate($this->input->post('credit_card'),2);
             }
             
             //care_credit expens
             if($this->input->post('care_credit') !=0){
              $care_credit_exp = $this->expensecaluclate($this->input->post('care_credit'),5);
             }
             //strip expese
              if($this->input->post('stippayment') !=0){
              $stippayment_exp = $this->expensecaluclate($this->input->post('stippayment'),3);
             }
             
           
       $allexpens=$expens+$this->input->post('survice_pay')+$stippayment_exp+$care_credit_exp+$credit_expens;
       // calculate expense in invocie end
        $data = array(
        'pid' => $this->input->post('pname'),
        'p_visit_id' => $this->input->post('visit'),
        'damount' => $this->input->post('damount'),
        'tamount' => $this->input->post('namount'),
        'bamount' => $this->input->post('bamount'),
        'nsd_id' => $this->input->post('nsd_id'),
        'pn_id' => $this->input->post('pn_id')   ,
        'service_pay' =>$this->input->post('survice_pay'),
        'total_expens' =>$allexpens?$allexpens:$this->input->post('survice_pay'),
        'created_at' => date('Y-m-d h:i:s')
        );
    
      $this->InvoiceModel->saveinvoicedata($data);
     
      $id=$this->db->insert_id();
 
           $serviess=implode(",",$this->input->post('ttype'));
           $sub_serviess=$this->input->post('ttypesub'); 
         
           if($products){         
            $i=0;
           //  echo'<pre>';print_r($quantity[0]);die;
            foreach ($products as  $value) 
            {
             $invoice_product = array(
             'invoice_id' => $id,
             'sid' => $serviess,
             'ssid'=> $this->input->post('ssid'),
             'product_id' =>$value,
             'qty' => $quantity[$i]
             );
            $this->db->query("UPDATE `inventory` SET `item_quantity` = `item_quantity` - $quantity[$i] WHERE `inventory_id` = $value");
         
            $instt=  $this->InventoryModel->insert('invoice_product', $invoice_product); 
            $i++;
            }
           }
             
        if(isset($id))
        {
          $bill_amt=0;
               $pay_amt=$_POST['pay_amt'];
               if(isset($pay_amt) && count($pay_amt)>0)
               {
               foreach ($pay_amt as $key => $value) 
               {
                   
                if(!empty($value))
                { 
                $map = explode("_",$value);
                $pymetmethod=$this->db->where('pid',$map[0])->get('payment_method')->row();
                if(!empty($pymetmethod)){
                   $percent= $pymetmethod->per_deducted;
                   $reduceamount=$map[1]-$map[1]*$percent/100;
                }
                $map_data = array(
                'invoice_id' => $id,
                'payment_method_id' => $map[0],
                'amount' => $map[1],  
                'net_price'=>$reduceamount
                );

                $bill_amt=$bill_amt+$map[1];
                $bill_amts=$bill_amt;
                // echo'<pre>';print_r($bill_amts);die;
                 $this->InvoiceModel->save_invoice_payment_method_map_data($map_data);
                }
            }

            // echo "<pre>";
            // print_r($bill_amt);
            // die;
        }
    //     if($this->input->post('wallet_reduce') !=0){
    //     $updateamount = $this->input->post('total_wallet')-$this->input->post('wallet_reduce');
    //     $this->db->where('id',$this->input->post('ptent_notsid'))->update('patient_notes',['create_invoice' => 1]);
        
  
        
    //   $updatewallet= $this->db->where('prid',$this->input->post('patianid'))->update('patient_registration',['wallet_amount' =>$updateamount]);
    //       if($updatewallet){
    //         $wallet_trans=array('txn_id'=>'FEMSPA'.rand(123456,6),
    //                             'patent_id' => $this->input->post('patianid'),
    //                             'service_category_id' =>$this->input->post('ttype'),
    //                             'total_wallet_amt' =>$this->input->post('total_wallet'),
    //                             'left_wallet_amount' =>$updateamount,
    //                             );
    //                 $this->db->insert('wallet_transiction',$wallet_trans);            
    //       }
    //     }
          
          $result['data'] = $this->ServiceModel->invoicebillbyid($id);
         $result['data1'] =$this->ServiceModel->invoicebillbyid1($id);
          $results = $this->PatientModel->getparticularpatients($this->input->post('pname'));
       
          $patient_name=$results[0]['pname'];
          $result['patient_name']=$patient_name;
                // echo'<pre>';print_r($result);die;
          $this->load->view('invoice/bill',$result);

        }	else{
				echo "failed";
		}
	}
			else
			{
		$result['payment_method'] = $this->ServiceModel->getallpaymentmethod();
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('invoice/create_invoice',$result);
		$this->load->view('footer');
			}

		}
	}
     
     function expensecaluclate($amt,$percent){
        return $expens= $amt*$percent/100;
     }

    public function allsubservices(){
    
    $id=$_GET['sid'];
    $result = $this->ServiceModel->getallsubservices($id);  
    //echo'<pre>';print_r($result);die;  	
    echo json_encode($result);
    }

   public function allservices(){
   
   $result = $this->ServiceModel->getallservices();  	
   echo json_encode($result);
   }

   public function invoice_list()
    {   
        // $result['payment_method'] = $this->ServiceModel->getallpaymentmethod();
        // $result['patients_list'] = $this->PatientModel->getallpatients();
        $result['servicecategory'] = $this->ServiceModel->getallservice_category();
        $result['invoices_list'] = $this->InvoiceModel->getall_invoice_list($_POST); 
         $result['dates']= $_POST;       
       // echo'<pre>';print_r($result['invoices_list']);die;
        $this->load->view('header');
        $this->load->view('sidenavbar');
        // $this->load->view('servicepages/add');
        // $this->load->view('servicepages/add_sub_services');
        $this->load->view('invoice/invoices_list',$result);
        $this->load->view('footer');
    }
    
    public function invoice_list_patient($prid)
    {   
        // $result['payment_method'] = $this->ServiceModel->getallpaymentmethod();
        // $result['patients_list'] = $this->PatientModel->getallpatients();
         $result['treatment_type'] = $this->ServiceModel->getallservices();

        $result['invoices_list'] = $this->InvoiceModel->getall_invoice_list($_POST,$prid); 
//die('bbb');
         $result['dates']= $_POST;       
       // echo'<pre>';print_r($result['invoices_list']);die;
        $this->load->view('header');
        $this->load->view('patientspages/patent_sidebar');
      
        //$this->load->view('sidenavbar');
        // $this->load->view('servicepages/add');
        // $this->load->view('servicepages/add_sub_services');
        $this->load->view('invoice/invoices_list',$result);
        $this->load->view('footer');
    }
    
    //invoicebillbyid
    public function create_bill(){

        if(isset($_GET)){
        $id=$_GET['id'];
        $type=$_GET['type'];
      //  $result['data'] = $this->ServiceModel->invoicebyid($id);
        $result['data'] = $this->ServiceModel->invoicebillbyid($id);
      //  echo'<pre>';print_r($result['data'][0]);die;
        $results = $this->PatientModel->getparticularpatients($result['data'][0]['patient_id']);
        $result1=$this->InvoiceModel->get_paymont_method_by_invoice_id($id);
        $result['payment_type']=$result1;

        $patient_name=$results[0]['pname'];
        $result['patient_name']=$patient_name;
        if($type =='one'){

        $this->load->view('invoice/bill1',$result);
        }

        if($type =='two'){
        $this->load->view('invoice/bill2',$result);
        }

        if($type =='three'){
        $this->load->view('invoice/bill3',$result);
        }

        if($type =='four'){
        $this->load->view('invoice/bill4',$result);
        }
      // echo'<pre>';print_r($result);die;

        }

    }	

    public function get_patient_note_current_date(){ //die('dddd');
     $current_date=date('Y-m-d');
     if(isset($_GET['pid'])){
     $pid=$_GET['pid'];
     
     $patients_note_data =$this->PatientModel->current_date_patient_note_data_by_patient_id($pid,$current_date);
     $patients_neurotoxin_services_data = $this->ServiceModel->get_neurotoxin_services_data($pid,$current_date);
    if(isset($patients_note_data) && !empty($patients_note_data)){
    $chk_patients_note = date('H:i:s', strtotime($patients_note_data[0]['created_at']));
    }else{
      $chk_patients_note='';
    }
     
     if(isset($patients_neurotoxin_services_data) && !empty($patients_neurotoxin_services_data)){
     $chk_neurotoxin = date('H:i:s', strtotime($patients_neurotoxin_services_data[0]['create_at']));
     }else{
      $chk_neurotoxin='';
     }
     

     if(isset($chk_patients_note) && !empty($chk_patients_note) && isset($chk_neurotoxin) && !empty($chk_neurotoxin)){
       if($chk_patients_note<$chk_neurotoxin){
        $treatment_type = $this->ServiceModel->getallservices();
        $product = $this->ServiceModel->getallsubservices($patients_note_data[0]['sid']); 
        echo json_encode(array('data'=>$patients_note_data,'treatment_type'=>$treatment_type,'product'=>$product));
       }else{
             
      $patients_note_data = $this->ServiceModel->get_neurotoxin_services_data($pid,$current_date);
      $treatment_type = $this->ServiceModel->getallservices();
     // echo'<pre>';print_r($patients_note_data);die;
      $product = $this->ServiceModel->getallsubservices($patients_note_data[0]['sid']); 
      echo json_encode(array('data'=>$patients_note_data,'treatment_type'=>$treatment_type,'product'=>$product));
       }
     }


     if(!empty($chk_patients_note) && empty($patients_neurotoxin_services_data[0]) ){
        $treatment_type = $this->ServiceModel->getallservices();
        $product = $this->ServiceModel->getallsubservices($patients_note_data[0]['sid']); 
        echo json_encode(array('data'=>$patients_note_data,'treatment_type'=>$treatment_type,'product'=>$product));
     }

     if(empty($chk_patients_note) && !empty($patients_neurotoxin_services_data[0]) ){
      $patients_note_data = $this->ServiceModel->get_neurotoxin_services_data($pid,$current_date);
      $treatment_type = $this->ServiceModel->getallservices();
     // echo'<pre>';print_r($patients_note_data);die;
      $product = $this->ServiceModel->getallsubservices($patients_note_data[0]['sid']); 
      echo json_encode(array('data'=>$patients_note_data,'treatment_type'=>$treatment_type,'product'=>$product));
     }
     
   }

}

   public function get_visit_wise_data(){
      
        header('Access-Control-Allow-Origin: *');  
		header("Content-Type: application/json", true);
    //date_default_timezone_set('Asia/Kolkata');
    $c_date=date('Y-m-d');
    $current_date=date('Y-m-d');
     if(isset($_GET['pid'])){
     $pid=$_GET['pid'];
     $vid='';
      
     $patients_note_data =$this->PatientModel->current_date_patient_note_data_by_patient_id($pid,$current_date,$vid);

    if(isset($patients_note_data) && !empty($patients_note_data))
    {
     $treatment_type = $this->ServiceModel->getallservices();
     $product = $this->ServiceModel->getallsubservices($patients_note_data[0]['sid']);
     echo json_encode(array('data'=>$patients_note_data,'treatment_type'=>$treatment_type,'product'=>$product,'visit_type'=>'service'));
    
     }

    $neurotoxin_services = $this->ServiceModel->get_neurotoxin_services_data_u($pid,$c_date,$vid);
    $patient_filler_data=$this->ServiceModel->get_filler_services_data($pid,$current_date,$vid);
    
    //echo'<pre>';print_r($patient_filler_data);die;

   if(isset($neurotoxin_services) && !empty($neurotoxin_services) && isset($patient_filler_data) && !empty($patient_filler_data)){
      $treatment_type = $this->ServiceModel->getallservices();
     // echo'<pre>';print_r($patients_note_data);die;
      $product = $this->ServiceModel->getallsubservices($patient_filler_data[0]['sid']); 
      $product2 = $this->ServiceModel->getallsubservices($neurotoxin_services[0]['sid']);
      echo json_encode(array('data'=>$patient_filler_data,'data2'=>$neurotoxin_services,'treatment_type'=>$treatment_type,'product'=>$product,'product1'=>$product2,'visit_type'=>'service'));
    }


    if(isset($neurotoxin_services) && !empty($neurotoxin_services) && empty($patient_filler_data)){
      $treatment_type = $this->ServiceModel->getallservices();
     // echo'<pre>';print_r($patients_note_data);die;
      $product = $this->ServiceModel->getallsubservices($neurotoxin_services[0]['sid']); 
      echo json_encode(array('data'=>$neurotoxin_services,'treatment_type'=>$treatment_type,'product'=>$product,'visit_type'=>'service'));
    }

    if(isset($patient_filler_data) && !empty($patient_filler_data) && empty($neurotoxin_services)){
      $treatment_type = $this->ServiceModel->getallservices();
     // echo'<pre>';print_r($patients_note_data);die;
      $product = $this->ServiceModel->getallsubservices($patient_filler_data[0]['sid']); 
      echo json_encode(array('data'=>$patient_filler_data,'treatment_type'=>$treatment_type,'product'=>$product,'visit_type'=>'service'));
    }

//echo'<pre>';print_r($patients_note_data);die;
     
   }

   }
   
   
    public function get_visit_wise_data1(){
        header('Access-Control-Allow-Origin: *');  
		header("Content-Type: application/json", true);
    //date_default_timezone_set('Asia/Kolkata');
    $c_date=date('Y-m-d');
    $current_date=date('Y-m-d');
     if(isset($_POST['vid'])){
     $vid=$_POST['vid'];
     $pnid=$_POST['ntid'];
     
  print_r($_POST); die;
     
$patients_note_data =$this->InvoiceModel->get_patient_notes1_data($pnid,$vid);

print_r($patients_note_data); die;

    if(isset($patients_note_data) && !empty($patients_note_data))
    {
    //  $treatment_type = $this->ServiceModel->getallservices();
    //  $product = $this->ServiceModel->getallsubservices($patients_note_data[0]['sid']);
     echo json_encode(array('data'=>$patients_note_data));
     exit();
     }

    $neurotoxin_services = $this->ServiceModel->get_neurotoxin_services_data_u($pid,$c_date,$vid);
    $patient_filler_data=$this->ServiceModel->get_filler_services_data($pid,$current_date,$vid);
    
    //echo'<pre>';print_r($patient_filler_data);die;

   if(isset($neurotoxin_services) && !empty($neurotoxin_services) && isset($patient_filler_data) && !empty($patient_filler_data)){
      $treatment_type = $this->ServiceModel->getallservices();
     // echo'<pre>';print_r($patients_note_data);die;
      $product = $this->ServiceModel->getallsubservices($patient_filler_data[0]['sid']); 
      $product2 = $this->ServiceModel->getallsubservices($neurotoxin_services[0]['sid']);
      echo json_encode(array('data'=>$patient_filler_data,'data2'=>$neurotoxin_services,'treatment_type'=>$treatment_type,'product'=>$product,'product1'=>$product2,'visit_type'=>'service'));
    }


    if(isset($neurotoxin_services) && !empty($neurotoxin_services) && empty($patient_filler_data)){
      $treatment_type = $this->ServiceModel->getallservices();
     // echo'<pre>';print_r($patients_note_data);die;
      $product = $this->ServiceModel->getallsubservices($neurotoxin_services[0]['sid']); 
      echo json_encode(array('data'=>$neurotoxin_services,'treatment_type'=>$treatment_type,'product'=>$product,'visit_type'=>'service'));
    }

    if(isset($patient_filler_data) && !empty($patient_filler_data) && empty($neurotoxin_services)){
      $treatment_type = $this->ServiceModel->getallservices();
     // echo'<pre>';print_r($patients_note_data);die;
      $product = $this->ServiceModel->getallsubservices($patient_filler_data[0]['sid']); 
      echo json_encode(array('data'=>$patient_filler_data,'treatment_type'=>$treatment_type,'product'=>$product,'visit_type'=>'service'));
    }

// echo'<pre>';print_r($patients_note_data);die;
     
   }

   }

}


?>