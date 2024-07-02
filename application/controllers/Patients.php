<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Patients extends CI_Controller 

{

	function __construct()

	{

		parent::__construct();

		$this->load->model('PatientModel');
		$this->load->model('ServiceModel');
		$this->load->model('InventoryModel');
		$this->load->model('InvoiceModel');
		$this->load->model('MasterModel');
		$this->load->model('WalletModel');
		$this->load->model('ProductModel');

				//session

		$this->load->library('session');

		date_default_timezone_set('Asia/Kolkata');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}

	}
	 public function view_wallet($id){

		$result['inamount']=$this->MasterModel->viewwallet($id,'money_wallet_new');
		$result['all_services'] = $this->MasterModel->active_data('services');
		$result['all_packages'] = $this->MasterModel->active_data('package_list');

		$result['service_wallet_history']=$this->MasterModel->viewwalletservices($id);
		$result['transaction_wallet_history']=$this->WalletModel->view_available_service_in_wallet($id);
		$result['wallet_items']=$this->MasterModel->wallet_items($id);

		// print_r($result['transaction_wallet_history']); die();

		$data = ['id' => $id, 'result' => $result];
		
		$this->load->view('header');		
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/view_wallet',$data);
		$this->load->view('footer');
	 }

	 public function store_wallet_amount($id){

		$this->form_validation->set_rules('in_amount','Amount','trim|required');
		$this->form_validation->set_rules('description','description','trim|required');
		if($this->form_validation->run() == TRUE)

		{

			$data=array(
				'patient_id' => $id,
				'in_amount' => $this->input->post('in_amount'),
				'description' => $this->input->post('description'),
				'transaction_id' => 'WAL-' . date('His') . '-' . date('M-d-Y'),
				'created_at' => date('Y-m-d H:i:s'),
				'added_by'=>$this->session->userdata('id'),
				'status'=>1,
			);
			$result=$this->MasterModel->insert('money_wallet_new',$data);
			if($result)
			{
				$this->session->set_flashdata('success', ' <div class="alert alert-success text-center msg">Amount Added Successfully</div>'); 
				redirect('patients/view_wallet/'.$id); 
			}
			else{
				$this->session->set_flashdata('error', ' <div class="alert alert-danger text-center msg">Something Went Wrong</div>'); 
				redirect('patients/view_wallet/'.$id); 
			}
		}
		else{
			$this->session->set_flashdata('error', ' <div class="alert alert-danger text-center msg">Validation Error</div>'); 
				redirect('patients/view_wallet/'.$id); 
		}
	 }

	 public function store_services_amount($id){

	   $this->form_validation->set_rules('description','Description','trim|required');
	   if($this->form_validation->run() == TRUE)

	   {
		$service = json_encode($this->input->post('service_id'));
		$service_session_number_cr = json_encode($this->input->post('service_session_number_cr'));

		// print_r($service_session_number_cr);die();
		   $data=array(
			   'patient_id' => $id,
			   'service_id' => $service,
			   'description' => $this->input->post('description'),
			   'transaction_id' => 'SER-' . date('His') . '-' . date('M-d-Y'),
			   'created_at' => date('Y-m-d H:i:s'),
			   'added_by'=>$this->session->userdata('id'),
			   'status'=>0,
			   'otp'=>rand(111111,999999),
			   'service_session_number_cr'=>$service_session_number_cr,
		   );
		    //   print_r($data); die();
		   $service_wallet_result_temp = $this->WalletModel->serviceinsert('service_wallet',$data);

		   $service_id= json_decode($service_wallet_result_temp[0]->service_id);
		   $final_session_purchase= json_decode($service_wallet_result_temp[0]->service_session_number_cr);

		// Code start for otp send on email
		   if($service_wallet_result_temp)
		   {
			$patient_details=$this->MasterModel->get_patientdataby_id($service_wallet_result_temp[0]->patient_id,'patient_registration');

			$select_service_result['temp_store_service']=$service_wallet_result_temp;

			$body = "Dear ".$patient_details[0]->pname.",

			<table border='1'>
			<thead>
				<tr>
					<th>Service Name</th>
					<th>Qty</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>";
			$netpay=0;
			$qty=1;
			foreach($service_id as $key=>$value)
			{
				$serviceresult=$this->MasterModel->get_databy_id($value,'services');

				$service_name=$serviceresult[0]->service_name;
				$service_charge=$serviceresult[0]->service_charge;
				$netpay=$netpay + $service_charge;
				
			
			$body .= "
				<tr>
					<td>".$service_name."</td>
					<td>".$final_session_purchase[$key]."</td>
					<td>".$service_charge."</td>
				</tr>
				";
			}
			$body .= "
			<tr>
				<td colspan='2'>Total Pay:</td><td>".$netpay."</td>
				</tr>
				<!-- Add more rows as needed -->
			</tbody>
		</table>

			<p>Thank you for choosing Forever MedSpa.</p>
			<p>Your OTP is: ".$service_wallet_result_temp[0]->otp." .</p>
			<p>Thanks & Regards <br>Medspa Team</p>";
			$mailArray["To"]        = $patient_details[0]->email;
			$mailArray["Body"]      = $body;
			$subject = 'Welcome to Forever MedSpa';
			$this->load->library('Mymail');
			$status = $this->mymail->send_mail($subject, $patient_details[0]->email, $body);
		//  Code end for opt send 

			if($status)
			
			   $this->session->set_flashdata('success', ' <div class="alert alert-success text-center msg">Please Get OTP From Patient</div>');

			   	$this->load->view('header');		
				$this->load->view('sidenavbar');
				$this->load->view('patientspages/service_wallet_payment',$select_service_result);
				$this->load->view('footer');

			//    redirect('patients/view_wallet/'.$id); 
		   }
		   else{
			   $this->session->set_flashdata('error', ' <div class="alert alert-danger text-center msg">Something Went Wrong</div>'); 
			   redirect('patients/view_wallet/'.$id); 
		   }
	   }
	   else{
		   $this->session->set_flashdata('error', ' <div class="alert alert-danger text-center msg">Validation Error</div>'); 
			   redirect('patients/view_wallet/'.$id); 
	   }
	}

	public function payment_of_service_wallet($temp_id){
		// echo $temp_id ."_".$pid."_".$tid; die();
		$pid=$this->input->post('patient_id');
		$tid=$this->input->post('transaction_id');
		$discount=$this->input->post('discount');
		$discountedPricePay=$this->input->post('discounted_price_pay');

		$data=array(
		
			'status' =>1,
			'discount' =>$discount,
			'discounted_price_pay' =>$discountedPricePay,
		);
		// print_r($data);die();
		$result = $this->WalletModel->wallet_service_active('service_wallet',$data,$temp_id,$pid,$tid);
		if($result)
		{
			// Insert data into money value table
			$moneyvalue=array(
				'transaction_id' =>$tid,
				'money_value' =>$discountedPricePay,
				'status' =>1,
				'created_at' =>date("Y-m-d H:i:s"),
			);
			$this->MasterModel->insert('moneyvalue',$moneyvalue);

			// Insert data into money value table End


			// Data entry in transaction_service_table
			$service_result=$this->WalletModel->service_wallet_view($tid);
			$service_ids=json_decode($service_result[0]->service_id);
			$service_session_number_cr=json_decode($service_result[0]->service_session_number_cr);
			// print_r($service_session_number_cr); die();
			foreach($service_ids as $key=>$value)
			{
				$data=array(
					'status' =>1,
					'patient_id' =>$pid,
					'transaction_id' =>$tid,
					'service_id' =>$value,
					'service_session_qty_in' =>$service_session_number_cr[$key],
					'balance_session' =>$service_session_number_cr[$key],
					'created_at' =>date("Y-m-d H:i:s"),
				);
				// print_r($data); die();
				$serviceresult=$this->WalletModel->transaction_service_wallet($data);
			}
			$this->session->set_flashdata('success', ' <div class="alert alert-success text-center msg">Service Successfully Added in Client Wallet</div>'); 
			redirect('patients/view_wallet/'.$pid); 
		}
		
		else{
			$this->session->set_flashdata('error', ' <div class="alert alert-danger text-center msg">Some Techniquel error occured please try again transaction not completed!</div>'); 
			
		}
		
	}


	public function saveregistration()
	{
		if($this->input->post('submit_data'))

		{

			

			$email = $this->input->post('email');

			$pname= $this->input->post('pname');

			$this->form_validation->set_rules('pname','patient name','trim|required');

			$this->form_validation->set_rules('phone','phone number','trim|required');

			$this->form_validation->set_rules('email','email','trim|required');

			if($this->form_validation->run() == TRUE)

			{

				

				$otp = rand(100000, 999999);

				$password = md5($otp);

				$data = array(

				'pname' => $this->input->post('pname'),

				'phone' => $this->input->post('phone'),

				'email' => $this->input->post('email'),

				'comment' => $this->input->post('comment'),

				'password' => $password,

				'gender' => $this->input->post('gender'),

				'user_type' => 'patient',

				);

// 			print_r($data);die;

			if($this->PatientModel->savepatientdata($data))

			{

				

				 $body = "Dear ".$pname.",

							<p>Thank you for choosing Forever MedSpa.</p>

							<p>Your password is: ".$email." .</p>

							<p>Your password is: ".$otp." .</p>";

							$mailArray["To"]        = $email;

							$mailArray["Body"]      = $body;

							$subject = 'Welcome to Forever MedSpa';

							$this->load->library('Mymail');

							$status = $this->mymail->send_mail($subject, $email, $body);

				

			   $this->session->set_flashdata('msg', ' <div class="alert alert-success text-center msg"> Sign UP Successfully Saved.</div>'); 

				//echo "saved Success";

				redirect('patients/allpatients');

			}

			else

			{

				echo "failed";

			}

			}

			else

			{

				echo "Techniqal Error";

				$this->load->view('header');

				$this->load->view('sidenavbar');

				$this->load->view('patientspages/registration');

				$this->load->view('footer');

			}



		}



	}

	public function search_patient()

{

	$search = $this->input->post('search');

	 $patient = $this->PatientModel->getpatient($search);

	 $serives = $this->PatientModel->getserivces();

	  $provider = $this->PatientModel->getallprovider();

	//  echo "<pre>";print_r($provider);die;

	   $this->load->view('header');

	   $this->load->view('patientspages/provider_assignservices',compact('patient','serives','provider'));

	   $this->load->view('footer');

}
	public function provider_services()

	{

		if($this->input->post('submit_data'))

		{



			 $pname = $this->input->post('id');

			//  echo "$pname ";

			 $sname = $this->input->post('ttype');

			//  echo "$sname";

			 $pppname = $this->input->post('ttypesub');

			//   echo "$pppname";die;



			$data = array(

				'provider_id' => $pppname,

				'pid' => $pname,

				'sid' =>  $sname, 

				// 'assign_date' => $this->input->post('assign'),

				'room_no' => $this->input->post('room_no'),

				// 'allergy' => $this->input->post('allergy'),

				// 'pmh' => $this->input->post('pmh'),

				// 'psh' => $this->input->post('psh'),

				// 'contact_source' => $this->input->post('sourcefrom'),

				'comment' => $this->input->post('comments'),

				'created_date'=>date('Y-m-d  H:i:s')

				);

				// print_r($data);die;

			if($this->PatientModel->saveassigndata($data))

			{

				// echo "saved Success";die;

				$this->session->set_flashdata('msg', ' <div class="alert alert-success text-center msg"> Service Assign Successfully.</div>'); 

				redirect('FrontDashboard');

			}

			else

			{

				echo "failed";

			}

// 			}

// 			else

// 			{

// 				$this->load->view('header');

// 				$this->load->view('sidenavbar');

// 				$this->load->view('patientspages/registration');

// 				$this->load->view('footer');

			}

	}
public function employeeDetails(){
echo "test";
}


	public function saveprovider1()

	{

		if($this->input->post('submit_data'))

		{

			$this->form_validation->set_rules('pname','patient name','trim|required');

			$this->form_validation->set_rules('phone','phone number','trim|required');

			$this->form_validation->set_rules('email','email','trim|required');

			$this->form_validation->set_rules('password','password','trim|required');

			// $this->form_validation->set_rules('allergy','allergy','trim');

			// $this->form_validation->set_rules('pmh','patient name','trim');

			// $this->form_validation->set_rules('psh','patient name','trim');

			// $this->form_validation->set_rules('sourcefrom','source of contact','trim|required');

			// $this->form_validation->set_rules('comment','comment','trim');

			if($this->form_validation->run() == TRUE)

			{

			$data = array(

				'pname' => $this->input->post('pname'),

				'phone' => $this->input->post('phone'),

				'email' => $this->input->post('email'),

				'password' => md5($this->input->post('password')),

				// 'gender' => $this->input->post('gender'),

				// 'age' => $this->input->post('age'),

				// 'allergy' => $this->input->post('allergy'),

				// 'pmh' => $this->input->post('pmh'),

				// 'psh' => $this->input->post('psh'),

				// 'contact_source' => $this->input->post('sourcefrom'),

				// 'comment' => $this->input->post('comment'),

				'user_type' => 'provider',

				);

		//	print_r($data);die;

			if($this->PatientModel->saveprovider($data))

			{

				//echo "saved Success";

				redirect('patients/allpatients');

			}

			else

			{

				echo "failed";

			}

			}

			else

			{

				$this->load->view('header');

				$this->load->view('sidenavbar');

				$this->load->view('patientspages/registration');

				$this->load->view('footer');

			}



		}



	}





/************** Get all patients list***************/



	public function allpatients()

	{

		 

		$result['data'] = $this->PatientModel->getallpatients($_POST);

		$result['dates']= $_POST;

		//echo'<pre>';print_r($result);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/patientlist',$result);

		$this->load->view('footer');

	}

	

	

	



	public function service($id)

	{  

	   // echo $id; die;
	   $p_id   =$this->PatientModel->get_ptid($id);

		 $patient_id = $p_id[0]['pid'];

	   $current_date = date('Y-m-d');

	  

// 		$p_visit_id=$this->PatientModel->last_record($id,'temp_visit');

		$p_visit   =$this->PatientModel->get_visit_list_u($patient_id,$current_date);

	//	print_r($p_visit);die;

	

	   $tmpArray = array();

	   foreach ($p_visit as $value) 

	   {      

			array_push($tmpArray,$value['vid']);

		}



	//	echo'<pre>';print_r($tmpArray);die;

		$patid  = array('id' => $id,'p_visit_id'=>$tmpArray);

		//$p_visit_id=$this->PatientModel->last_record($id,'temp_visit');

	//	echo'<pre>';print_r($p_visit_id);die;

		//$patid  = array('id' => $id,'p_visit_id'=>$p_visit_id->id);



		$sdata = $this->ServiceModel->getallservices();

 		$this->load->view('header');

 		$this->load->view('sidenavbar');

		$this->load->view('patientspages/service',compact('patid','sdata', 'p_id'));

		$this->load->view('footer');

	}

	

/******* For open services list on patients assign *****************/

   

   public function patient_visit_maps(){



   }

	public function serviceOnPatient($pid,$sid,$ptid)

	{   

		$vid=$this->input->get('vid', TRUE);

		//echo $ptid; die;

		// print_r($vid);die;

		// print_r($sid);die;

		

		switch($sid)



		{

			case 1:redirect(base_url().'patients/neurotoxin/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 2:redirect(base_url().'patients/fillerservice/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 3:redirect(base_url().'patients/miradry/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 4:redirect(base_url().'patients/rfal/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 5:redirect(base_url().'patients/rfservice/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 6:redirect(base_url().'patients/rfmn/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 7:redirect(base_url().'patients/lasertreatment/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 8:redirect(base_url().'patients/coolsculpting/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 9:redirect(base_url().'patients/contoura/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 10:redirect(base_url().'patients/threadlifts/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 12:redirect(base_url().'patients/sculptra_butt/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 13:redirect(base_url().'patients/sculptra_face/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 14:redirect(base_url().'patients/vi_peel/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 15:redirect(base_url().'patients/asthetic_service/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

			case 16:redirect(base_url().'patients/tattoo_service/'.$ptid.'/'.$pid.'/'.$sid.'?vid='.$vid);

				break;

		}

	}

	public function neurotoxin($ptid,$pid,$sid)

	{

			$allservices = $this->ServiceModel->getallservices();

			//filter service and sub service 

			$sdata = $this->ServiceModel->getparticularser($sid);

			$ssdata = $this->ServiceModel->getallsubservices($sid);

			//echo'<pre>';print_r($ssdata);die;

			$pdata = $this->PatientModel->getparticularpatients($ptid);

			// particular service on patient

			$ntxpatdata = $this->ServiceModel->ntxserpatient($ptid);

			

			$this->load->view('header');

			$this->load->view('sidenavbar');

			$this->load->view('patientspages/neurotoxin_form',compact('pdata','sdata','ssdata','ntxpatdata','allservices'));

			$this->load->view('footer');

	}







	public function fillerservice($ptid,$pid,$sid) 

	{      

			$allservices = $this->ServiceModel->getallservices(); 

			$sdata = $this->ServiceModel->getparticularser($sid);

			$ssdata = $this->ServiceModel->getallsubservices($sid);

			$product_inv = $this->ServiceModel->get_product_inv($sid);

			//echo'<pre>';print_r($get_product_inv);die;

			$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/filler_form',compact('allservices','sdata','ssdata','pdata','product_inv'));

		$this->load->view('footer');



	}

	public function getsuservices()

	

	{ 

		$sid = $this->input->post('sid');



// 			$allservices = $this->ServiceModel->getallservices(); 

// 			$sdata = $this->ServiceModel->getparticularser($sid);

			$sddata = $this->ServiceModel->getallsubservices($sid);

		echo json_encode($sddata);

			//$product_inv = $this->ServiceModel->get_product_inv($sid);

			//echo'<pre>';print_r($get_product_inv);die;

			//$pdata = $this->PatientModel->getparticularpatients($pid);

	// 		$this->load->view('header');

	// 		$this->load->view('sidenavbar');

	// 		$this->load->view('patientspages/neurotoxin_form',compact('allservices','sdata','sddata','pdata','product_inv'));

	// 		$this->load->view('footer');



	}



	public function fillerservice1($pid,$sid)

	{      

			$allservices = $this->ServiceModel->getallservices(); 

			$sdata = $this->ServiceModel->getparticularser($sid);

			$ssdata = $this->ServiceModel->getallsubservices($sid);

			$pdata = $this->PatientModel->getparticularpatients($pid);

		//$this->load->view('header');

	//	$this->load->view('sidenavbar');

	$viewS=	$this->load->view('patientspages/filler_form',compact('allservices','sdata','ssdata','pdata'),TRUE);

	//	$this->load->view('footer');

	 echo $viewS;





	}







	public function miradry($ptid,$pid,$sid)

	{

		// echo "ok";die;

			$allservices = $this->ServiceModel->getallservices(); 

			$sdata = $this->ServiceModel->getparticularser($sid);

			$ssdata = $this->ServiceModel->getallsubservices($sid);

			$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/miradry_form',compact('allservices','sdata','pdata'));

		$this->load->view('footer');

	}



	public function rfal($ptid,$pid,$sid)

	{

		// echo"ok";die;

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/rfal_form',compact('allservices','sdata','pdata','ssdata'));

		$this->load->view('footer');

	}



	public function tattoo_service1($pid,$sid)

	{



// 		echo"ok";die;

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($pid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/tattoo_service_form',compact('allservices','sdata','pdata','ssdata'));

		$this->load->view('footer');

	}



	public function rfservice($ptid,$pid,$sid)

	{

		// echo"ok111";die;

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/rfservice_form',compact('allservices','sdata','pdata','ssdata'));

		$this->load->view('footer');

	}



	public function rfmn($ptid,$pid,$sid)

	{

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/rfmn_form',compact('allservices','sdata','pdata'));

		$this->load->view('footer');

	}



	public function saveneurotoxin()

	{

	  if(isset($this->session->userdata['admin'])){

			//echo 'hello';die;

		//$userid = $this->session->userdata['admin']['id'];

		$userid = $this->input->post('pcid');

		

	   }

		if($this->input->post('nurotaxin'))

		{	

			//user visit

			$visit_id=$this->input->post('p_visit');

			//for forehead

			if(!empty($this->input->post('forehead')))

			{

				$forehead = $this->input->post('forehead');

			}

			elseif (!empty($this->input->post('forehead2')))

			{

				$forehead = $this->input->post('forehead2');

			}

			else

			{

				$forehead = 0;

			}

			//for glabella

			if(!empty($this->input->post('glabella')))

			{

				$glabella = $this->input->post('glabella');

			}

			elseif (!empty($this->input->post('glabella2')))

			{

				$glabella = $this->input->post('glabella2');

			}

			else

			{

				$glabella = 0;

			}

			//for crfeet

			if(!empty($this->input->post('crowfeet')))

			{

				$crfeet = $this->input->post('crowfeet');

			}

			elseif (!empty($this->input->post('crowfeet2')))

			{

				$crfeet = $this->input->post('crowfeet2');

			}

			else

			{

				$crfeet = 0;

			}

			//for eyebro

			if(!empty($this->input->post('eyebrow')))

			{

				$eyebro = $this->input->post('eyebrow');

			}

			elseif (!empty($this->input->post('eyebrow2')))

			{

				$eyebro = $this->input->post('eyebrow2');

			}

			else

			{

				$eyebro = 0;

			}

			//for bunnyline

			if(!empty($this->input->post('bunnylines')))

			{

				$bunnyline = $this->input->post('bunnylines');

			}

			elseif (!empty($this->input->post('bunnylines2')))

			{

				$bunnyline = $this->input->post('bunnylines2');

			}

			else

			{

				$bunnyline = 0;

			}

			//for upperlip

			if(!empty($this->input->post('uperlip')))

			{

				$upperlip = $this->input->post('uperlip');

			}

			elseif (!empty($this->input->post('uperlip2')))

			{

				$upperlip = $this->input->post('uperlip2');

			}

			else

			{

				$upperlip = 0;

			}

			//for lowerlip

			if(!empty($this->input->post('lowerlip')))

			{

				$lowerlip = $this->input->post('lowerlip');

			}

			elseif (!empty($this->input->post('lowerlip2')))

			{

				$lowerlip = $this->input->post('lowerlip2');

			}

			else

			{

				$lowerlip = 0;

			}

			//for depressor

			if(!empty($this->input->post('depressor')))

			{

				$depressor = $this->input->post('depressor');

			}

			elseif (!empty($this->input->post('depressor2')))

			{

				$depressor = $this->input->post('depressor2');

			}

			else

			{

				$depressor = 0;

			}

			//for dao

			if(!empty($this->input->post('dao')))

			{

				$dao = $this->input->post('dao');

			}

			elseif (!empty($this->input->post('dao2')))

			{

				$dao = $this->input->post('dao2');

			}

			else

			{

				$dao = 0;

			}

			//for mentalis

			if(!empty($this->input->post('mentalis')))

			{

				$mentalis = $this->input->post('mentalis');

			}

			elseif (!empty($this->input->post('mentalis2')))

			{

				$mentalis = $this->input->post('mentalis2');

			}

			else

			{

				$mentalis = 0;

			}

			//for dao

			if(!empty($this->input->post('masseter')))

			{

				$masseter = $this->input->post('masseter');

			}

			elseif (!empty($this->input->post('masseter2')))

			{

				$masseter = $this->input->post('masseter2');

			}

			else

			{

				$masseter = 0;

			}



		   /*$p_visit=$this->PatientModel->last_record($this->input->post('pid'),'temp_visit');

		  // echo'<pre>';print_r($p_visit);die;

		   if(isset($p_visit)){

			$visit_id = $p_visit->id;

		   }else{

		   	$visit_id='';

		   }*/

			$datanurotoxin = array(

			'ssid' => $this->input->post('ssid'),

			'pid' => $this->input->post('pid'),

			'forehead' => $forehead,

			'glabella' => $glabella,

			'crows_feet' => $crfeet,

			'eye_bro' => $eyebro,

			'bunny_line' => $bunnyline,

			'upper_lip' => $upperlip,

			'lower_lip' => $lowerlip,

			'depressor_nasai' => $depressor,

			'dao' => $dao,

			'mentalis' => $mentalis,

			'masseter' => $masseter,

			'any_area' => $this->input->post('any_area'),

			'bamount' => $this->input->post('bamount'),

			'tamount' => $this->input->post('namount'),

			'qty'  =>$this->input->post('qty'),

			'damount' => $this->input->post('damount'),

			'promo' => $this->input->post('promo'),

			'comments' => $this->input->post('comments'),

			'p_visit_id' => $visit_id,

			'admin_id' => $userid

		);

	   //patient data 

	   $date = date('Y-m-d H:i:s');

	   $pdata= array('vid' => $visit_id,'user_id' => $userid,'created_at' =>$date );

		if($this->PatientModel->saveneurotoxin($datanurotoxin))

			{  

	//visit data update

	$this->PatientModel->save_pvisit($pdata);

	//$this->InventoryModel->update_inv_by_service_product($_POST['ttype'],$sub_service_name1,$sub_service_name2,$_POST['mquantity1'],$mquantity2);

	 $qty=$forehead+$glabella+$crfeet+$eyebro+$bunnyline+$upperlip+$lowerlip+$depressor+$dao+$mentalis+$masseter;

   

	$update_inv = $this->InventoryModel->update_inv_by_service_product($this->input->post('sid'),$this->input->post('product_name'),$qty);

		  			 //   $result['data'] = $this->ServiceModel->invoicebyid($id);

 	//redirect('patients/allpatients');

				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg"> Service Successfully Saved.</div>');

				redirect('patients/service/'.$this->input->post('pcid'));

			}

			else

			{

				echo "Failed";

			}

			

		}

		else

		{   

			redirect('patients/allpatients');

		}

	}





	public function saverfal1()

	{

	  if(isset($this->session->userdata['admin'])){

			//echo 'hello';die;

		//$userid = $this->session->userdata['admin']['id'];

		$userid = $this->input->post('pcid');

		

	   }

		if($this->input->post('rfal'))

		{	

			//user visit

			$visit_id=$this->input->post('p_visit');



			$any_area =$this->input->post('any_area');

			$amt =$this->input->post('amt');

			$additional_comments =$this->input->post('additional_comments');

			$net_amt =$this->input->post('net_amt');

			  $discount =$this->input->post('discount');

				$promo_code =$this->input->post('promo_code');





				$datanurotoxin = array(

			'ssid' => $this->input->post('ssid'),

			'pid' => $this->input->post('pid'),

			'any_area' => $any_area,

			'additional_comments' => $additional_comments,

			'net_amt' => $net_amt,

			'discount' => $discount,

			'promo_code' => $promo_code,

			// 'upper_lip' => $upperlip,

			// 'lower_lip' => $lowerlip,

			// 'depressor_nasai' => $depressor,

			// 'dao' => $dao,

			// 'mentalis' => $mentalis,

			// 'masseter' => $masseter,

			// 'any_area' => $this->input->post('any_area'),

			// 'bamount' => $this->input->post('bamount'),

			// 'tamount' => $this->input->post('namount'),

			// 'qty'  =>$this->input->post('qty'),

			// 'damount' => $this->input->post('damount'),

			// 'promo' => $this->input->post('promo'),

			// 'comments' => $this->input->post('comments'),

			'p_visit_id' => $visit_id,

			'admin_id' => $userid



			//for forehead

			// if(!empty($this->input->post('forehead')))

			// {

			// 	$forehead = $this->input->post('forehead');

			// }

			// elseif (!empty($this->input->post('forehead2')))

			// {

			// 	$forehead = $this->input->post('forehead2');

			// }

			// else

			// {

			// 	$forehead = 0;

			// }

			// //for glabella

			// if(!empty($this->input->post('glabella')))

			// {

			// 	$glabella = $this->input->post('glabella');

			// }

			// elseif (!empty($this->input->post('glabella2')))

			// {

			// 	$glabella = $this->input->post('glabella2');

			// }

			// else

			// {

			// 	$glabella = 0;

			// }

			// //for crfeet

			// if(!empty($this->input->post('crowfeet')))

			// {

			// 	$crfeet = $this->input->post('crowfeet');

			// }

			// elseif (!empty($this->input->post('crowfeet2')))

			// {

			// 	$crfeet = $this->input->post('crowfeet2');

			// }

			// else

			// {

			// 	$crfeet = 0;

			// }

			// //for eyebro

			// if(!empty($this->input->post('eyebrow')))

			// {

			// 	$eyebro = $this->input->post('eyebrow');

			// }

			// elseif (!empty($this->input->post('eyebrow2')))

			// {

			// 	$eyebro = $this->input->post('eyebrow2');

			// }

			// else

			// {

			// 	$eyebro = 0;

			// }

			// //for bunnyline

			// if(!empty($this->input->post('bunnylines')))

			// {

			// 	$bunnyline = $this->input->post('bunnylines');

			// }

			// elseif (!empty($this->input->post('bunnylines2')))

			// {

			// 	$bunnyline = $this->input->post('bunnylines2');

			// }

			// else

			// {

			// 	$bunnyline = 0;

			// }

			// //for upperlip

			// if(!empty($this->input->post('uperlip')))

			// {

			// 	$upperlip = $this->input->post('uperlip');

			// }

			// elseif (!empty($this->input->post('uperlip2')))

			// {

			// 	$upperlip = $this->input->post('uperlip2');

			// }

			// else

			// {

			// 	$upperlip = 0;

			// }

			// //for lowerlip

			// if(!empty($this->input->post('lowerlip')))

			// {

			// 	$lowerlip = $this->input->post('lowerlip');

			// }

			// elseif (!empty($this->input->post('lowerlip2')))

			// {

			// 	$lowerlip = $this->input->post('lowerlip2');

			// }

			// else

			// {

			// 	$lowerlip = 0;

			// }

			// //for depressor

			// if(!empty($this->input->post('depressor')))

			// {

			// 	$depressor = $this->input->post('depressor');

			// }

			// elseif (!empty($this->input->post('depressor2')))

			// {

			// 	$depressor = $this->input->post('depressor2');

			// }

			// else

			// {

			// 	$depressor = 0;

			// }

			// //for dao

			// if(!empty($this->input->post('dao')))

			// {

			// 	$dao = $this->input->post('dao');

			// }

			// elseif (!empty($this->input->post('dao2')))

			// {

			// 	$dao = $this->input->post('dao2');

			// }

			// else

			// {

			// 	$dao = 0;

			// }

			// //for mentalis

			// if(!empty($this->input->post('mentalis')))

			// {

			// 	$mentalis = $this->input->post('mentalis');

			// }

			// elseif (!empty($this->input->post('mentalis2')))

			// {

			// 	$mentalis = $this->input->post('mentalis2');

			// }

			// else

			// {

			// 	$mentalis = 0;

			// }

			// //for dao

			// if(!empty($this->input->post('masseter')))

			// {

			// 	$masseter = $this->input->post('masseter');

			// }

			// elseif (!empty($this->input->post('masseter2')))

			// {

			// 	$masseter = $this->input->post('masseter2');

			// }

			// else

			// {

			// 	$masseter = 0;

			// }



		   /*$p_visit=$this->PatientModel->last_record($this->input->post('pid'),'temp_visit');

		  // echo'<pre>';print_r($p_visit);die;

		   if(isset($p_visit)){

			$visit_id = $p_visit->id;

		   }else{

		   	$visit_id='';

		   }*/

			// $datanurotoxin = array(

			// 'ssid' => $this->input->post('ssid'),

			// 'pid' => $this->input->post('pid'),

			// 'forehead' => $forehead,

			// 'glabella' => $glabella,

			// 'crows_feet' => $crfeet,

			// 'eye_bro' => $eyebro,

			// 'bunny_line' => $bunnyline,

			// 'upper_lip' => $upperlip,

			// 'lower_lip' => $lowerlip,

			// 'depressor_nasai' => $depressor,

			// 'dao' => $dao,

			// 'mentalis' => $mentalis,

			// 'masseter' => $masseter,

			// 'any_area' => $this->input->post('any_area'),

			// 'bamount' => $this->input->post('bamount'),

			// 'tamount' => $this->input->post('namount'),

			// 'qty'  =>$this->input->post('qty'),

			// 'damount' => $this->input->post('damount'),

			// 'promo' => $this->input->post('promo'),

			// 'comments' => $this->input->post('comments'),

			// 'p_visit_id' => $visit_id,

			// 'admin_id' => $userid

		);

	   //patient data 

// print_r($datanurotoxin);die;

	   $date = date('Y-m-d H:i:s');

	   $pdata= array('vid' => $visit_id,'user_id' => $userid,'created_at' =>$date );

		if($this->PatientModel->saveneurotoxin($datanurotoxin))

			{  

	//visit data update

	$this->PatientModel->save_pvisit($pdata);

	//$this->InventoryModel->update_inv_by_service_product($_POST['ttype'],$sub_service_name1,$sub_service_name2,$_POST['mquantity1'],$mquantity2);

	 $qty=$forehead+$glabella+$crfeet+$eyebro+$bunnyline+$upperlip+$lowerlip+$depressor+$dao+$mentalis+$masseter;

   

	$update_inv = $this->InventoryModel->update_inv_by_service_product($this->input->post('sid'),$this->input->post('product_name'),$qty);

		  			 //   $result['data'] = $this->ServiceModel->invoicebyid($id);

 	//redirect('patients/allpatients');

				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg"> Service Successfully Saved.</div>');

				redirect('patients/service/'.$this->input->post('pcid'));

			}

			else

			{

				echo "Failed";

			}

			

		}

		else

		{   

			redirect('patients/allpatients');

		}

	}







	public function saveServices()

	{



	 

	

	  $qtyarray=array();

	   $serviceId =array();

	   

		$userid = $this->input->post('pcid');

	   

		$nurotoxis = $this->input->post('nurotoxis');

		$visit_id=$this->input->post('p_visit');



	  

	   if($nurotoxis)

		{	

			

			if(!empty($this->input->post('forehead')))

			{

				$forehead = $this->input->post('forehead');

			}

			elseif (!empty($this->input->post('forehead2')))

			{

				$forehead = $this->input->post('forehead2');

			}

			else

			{

				$forehead = 0;

			}

			//for glabella

			if(!empty($this->input->post('glabella')))

			{

				$glabella = $this->input->post('glabella');

			}

			elseif (!empty($this->input->post('glabella2')))

			{

				$glabella = $this->input->post('glabella2');

			}

			else

			{

				$glabella = 0;

			}

			//for crfeet

			if(!empty($this->input->post('crowfeet')))

			{

				$crfeet = $this->input->post('crowfeet');

			}

			elseif (!empty($this->input->post('crowfeet2')))

			{

				$crfeet = $this->input->post('crowfeet2');

			}

			else

			{

				$crfeet = 0;

			}

			//for eyebro

			if(!empty($this->input->post('eyebrow')))

			{

				$eyebro = $this->input->post('eyebrow');

			}

			elseif (!empty($this->input->post('eyebrow2')))

			{

				$eyebro = $this->input->post('eyebrow2');

			}

			else

			{

				$eyebro = 0;

			}

			//for bunnyline

			if(!empty($this->input->post('bunnylines')))

			{

				$bunnyline = $this->input->post('bunnylines');

			}

			elseif (!empty($this->input->post('bunnylines2')))

			{

				$bunnyline = $this->input->post('bunnylines2');

			}

			else

			{

				$bunnyline = 0;

			}

			//for upperlip

			if(!empty($this->input->post('uperlip')))

			{

				$upperlip = $this->input->post('uperlip');

			}

			elseif (!empty($this->input->post('uperlip2')))

			{

				$upperlip = $this->input->post('uperlip2');

			}

			else

			{

				$upperlip = 0;

			}

			//for lowerlip

			if(!empty($this->input->post('lowerlip')))

			{

				$lowerlip = $this->input->post('lowerlip');

			}

			elseif (!empty($this->input->post('lowerlip2')))

			{

				$lowerlip = $this->input->post('lowerlip2');

			}

			else

			{

				$lowerlip = 0;

			}

			//for depressor

			if(!empty($this->input->post('depressor')))

			{

				$depressor = $this->input->post('depressor');

			}

			elseif (!empty($this->input->post('depressor2')))

			{

				$depressor = $this->input->post('depressor2');

			}

			else

			{

				$depressor = 0;

			}

			//for dao

			if(!empty($this->input->post('dao')))

			{

				$dao = $this->input->post('dao');

			}

			elseif (!empty($this->input->post('dao2')))

			{

				$dao = $this->input->post('dao2');

			}

			else

			{

				$dao = 0;

			}

			//for mentalis

			if(!empty($this->input->post('mentalis')))

			{

				$mentalis = $this->input->post('mentalis');

			}

			elseif (!empty($this->input->post('mentalis2')))

			{

				$mentalis = $this->input->post('mentalis2');

			}

			else

			{

				$mentalis = 0;

			}

			//for dao

			if(!empty($this->input->post('masseter')))

			{

				$masseter = $this->input->post('masseter');

			}

			elseif (!empty($this->input->post('masseter2')))

			{

				$masseter = $this->input->post('masseter2');

			}

			else

			{

				$masseter = 0;

			}

			  

		   $datanurotoxin = array(

			'ssid' => $this->input->post('ssid'),

			'pid' => $this->input->post('pid'),

			'forehead' => $forehead,

			'glabella' => $glabella,

			'crows_feet' => $crfeet,

			'eye_bro' => $eyebro,

			'bunny_line' => $bunnyline,

			'upper_lip' => $upperlip,

			'lower_lip' => $lowerlip,

			'depressor_nasai' => $depressor,

			'dao' => $dao,

			'mentalis' => $mentalis,

			'masseter' => $masseter,

			'any_area' => $this->input->post('any_area'),

			'bamount' => $this->input->post('bamount'),

			'tamount' => $this->input->post('namount'),

			'qty' => $forehead+$glabella+$crfeet+$eyebro+$bunnyline+$upperlip+$lowerlip+$depressor+$dao+$mentalis+$masseter,

			//'qty'  =>$this->input->post('qty'),

			'damount' => $this->input->post('damount'),

			'promo' => $this->input->post('promo'),

			'comments' => $this->input->post('comments'),

			'p_visit_id' => $visit_id,

			'admin_id' => $userid,

			'patient_notes_id'=>$this->input->post('p_notes_id')

		);

		$qty=$forehead+$glabella+$crfeet+$eyebro+$bunnyline+$upperlip+$lowerlip+$depressor+$dao+$mentalis+$masseter;

		array_push($qtyarray,$qty);

		array_push($serviceId,'1');

// 		print_r($datanurotoxin);die;

		//neurotoxin data update

		$updatenuro = $this->PatientModel->saveneurotoxin($datanurotoxin);

		

		$pataint_note_nurotoxic = array(

			'ssid' => $this->input->post('ssid'),

			'sid' => '1',

			'bamount' => $this->input->post('bamount'),

			'tamount' => $this->input->post('namount'),

			'qty'  =>$qty,

			'damount' => $this->input->post('damount'),

			'commint' => $this->input->post('comments'),

			'p_visit_id' => $visit_id,

			"patient_notes_id"=>$this->input->post('p_notes_id')

			

		);

		//visit data update

		// print_r($updatenuro);

		

		if($updatenuro)

		{

			

		   

		//inventory data update

		$qty1=$forehead+$glabella+$crfeet+$eyebro+$bunnyline+$upperlip+$lowerlip+$depressor+$dao+$mentalis+$masseter;

		$update_inv = $this->InventoryModel->update_inventry_service_product($this->input->post('sid'),$this->input->post('product_name'),$qty1);

		

		 //$nuro_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_nurotoxic); 

			  			 //   $result['data'] = $this->ServiceModel->invoicebyid($id);

		// print_r($update_inv);

		// print_r('$update_inv');

		// exit();

		}

	 	}

		 $filler = $this->input->post('filler');

		 // print_r($filler);die;

		if($filler)

		{

			//echo'<pre>';print_r($this->input->post());die;

			$product=$this->input->post('product');

			

			//$visit_id=$this->input->post('p_visit');

			if(isset($product) && !empty($product)){

			$i=0;

			foreach ($product as $value) {

				

			if(!empty($value)){

				$userid = $this->input->post('pid');

				$pid=$this->input->post('pid');

				$sid=$this->input->post('sid');

				$bamount=$this->input->post('bamount');

				$qty=$this->input->post('qty');

				$namount=$this->input->post('namount');

		

				$product=ucfirst($value);

				$applied_side=$this->input->post('applied_side')[$i];

				$filler_type=$this->input->post('filler_type')[$i];

				$amt=$this->input->post('amt')[$i];

				$type=$this->input->post('type')[$i];

				$qtyfill=$this->input->post('amt')[$i];

				$ssid=$this->input->post('f_ssid')[$i];

				//$ssidfill = $this->input->post('ssid')[$i];

			   // $visit_id=$this->input->post('p_visit');

				// $cannula_chk=$this->input->post('cannula');

				// if(isset($cannula_chk) && !empty($cannula_chk)){

				//  foreach ($cannula_chk as $value) {

				//  	if($cannula_chk == $product){

				//   $cannula='on';

				// }else{

				// 	$cannula='';

				// }

		

				//  }

				// }

				

				// $needle_chk=$this->input->post('needle')[$i];

		

				// if($needle_chk == $product){

				//   $needle='on';

				// }else{

				// 	$needle='';

				// }

				$cannula=$this->input->post('cannula');

				$needle=$this->input->post('needle');

				$p_notes_id=$this->input->post('p_notes_id');

				$fillerdata=array('pid'=>$pid,'patient_notes_id'=>$p_notes_id,'sid'=>$sid,'p_visit_id'=>$visit_id,'product'=>$product,'applied_side'=>$applied_side,'filler_type'=>$filler_type,'bamount'=>$bamount,'qty'=>$amt,'tamount'=>$namount,'type'=>$type,'cannula'=>$cannula,'needle'=>$needle);

				

				

				$insertdb = $this->InventoryModel->insert('filler_services', $fillerdata);

			

				// print_r($insertdb);die;

				

			   $pataint_note_filler = array(

						'sid' => '2',

						'bamount' => $bamount,

						'tamount' => $namount,

						'qty'  =>$amt,

						'ssid'  =>$ssid,

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

						'created_at' =>date('Y-m-d H:i:s')

					);

			// $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_filler); 

				

				$this->InventoryModel->update_inventry_service_product($sid,$product,$amt);

				

			}

				  

						

			$i++;

		

			}

				array_push($qtyarray,$amt);

				   array_push($serviceId,'2');

			}

			

		 //patient data 

			   $date = date('Y-m-d H:i:s');

			   $pdata= array('vid' => $visit_id,'user_id' => $userid,'created_at' =>$date );

				// echo'<pre>';print_r($this->input->post());die;

				// print_r($insertdb);

				// exit(); 

			// if($insertdb){

							

			// 			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">'.$this->input->post('sid_name').' Service Successfully Save.</div>');

			// 			redirect('patients/service/'.$this->input->post('pid'));//sid_name

			// 	} 

		

			 

		}



		$miradry = $this->input->post('miradry');

	//print_r($miradry);die;

		if($miradry)

		{

			// echo "ok";die;

			// echo "<pre>";

			// print_r($_POST);

			// die;

			$visit_id=$this->input->post('p_visit');

			$datamiradry = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'sweat' => $this->input->post('sweat'),

				'odar' => $this->input->post('odar'),

				'hair' => $this->input->post('hair'),

				'left_Hollow' => $this->input->post('left_Hollow'),

				'right_Hollow' => $this->input->post('right_Hollow'),

				'left_Creaser' => $this->input->post('left_Creaser'),

				'rigjt_Creaser' => $this->input->post('rigjt_Creaser'),

				'left_ane' => $this->input->post('left_ane'),

				'right_ane' => $this->input->post('right_ane'),

				'left_size' => $this->input->post('left_size'),

				'right_siz' => $this->input->post('right_siz'),

				'Emp' => $this->input->post('Emp'),

				'Emp1' => $this->input->post('Emp1'),

				'Emp2' => $this->input->post('Emp2'),

				'Emp3'  =>$this->input->post('Emp3'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

				array_push($qtyarray,1);

				   array_push($serviceId,'3');

			// print_r($datamiradry);die;

			//neurotoxin data update

			//$updatenuro = $this->PatientModel->saveneurotoxin($datanurotoxin);

			$miradryInsert = $this->PatientModel->insertData('miradry_services_data',$datamiradry);



			$pataint_note_miradry = array(

						'sid' => '3',

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

							"patient_notes_id"=>$this->input->post('p_notes_id'),

								'created_at' =>date('Y-m-d H:i:s')

					);

			 //$rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_miradry); 

		   

		}

		$rf = $this->input->post('rf');

		// print_r($rf);die;

		if($rf)

		{

			// echo'<pre>';

			// print_r($_POST);

			// die;

			//$visit_id=$this->input->post('p_visit');

			$datarf = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'area1' => $this->input->post('area1'),

				'area2' => $this->input->post('area2'),

				'area3' => $this->input->post('area3'),

				'part_Coolsculpting' => $this->input->post('part_Coolsculpting'),

				'independent_treatment' => $this->input->post('independent_treatment'),

				'forma_v' => $this->input->post('forma_v'),

				'plus' => $this->input->post('plus'),

				'mini_fx' => $this->input->post('mini_fx'),

				'body_fx' => $this->input->post('body_fx'),

				'lose_skin' => $this->input->post('lose_skin'),

				'fat' => $this->input->post('fat'),

				'lose_skin_fat' => $this->input->post('lose_skin_fat'),

				'treatment_no' => $this->input->post('treatment_no'),

				'temperature' => $this->input->post('temperature'),

				'energy' => $this->input->post('energy'),

				'duration' => $this->input->post('duration'),

				'Emp4' => $this->input->post('Emp4'),

				'Emp1' => $this->input->post('Emp1'),

				'Emp2' => $this->input->post('Emp2'),

				'Emp3'  =>$this->input->post('Emp3'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

			

			$rfInsert = $this->PatientModel->insertData('rf_services_data',$datarf);

				array_push($qtyarray,1);

				   array_push($serviceId,'4');

				$pataint_note_rf = array(

						'sid' => '4',

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

						'created_at' =>date('Y-m-d H:i:s')

					);

			 //$rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_rf); 

		}



		$rfal = $this->input->post('rfal');

		// echo $rfal;die;

		// print_r($rfal);die;

		if($rfal)

		{	



			// echo "ok";s

			// die;

			//$visit_id=$this->input->post('p_visit');

			$datarfal = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				// 'rfmn_area' => $this->input->post('rfmn_area'),

				// 'rfmn_treatment_number' => $this->input->post('rfmn_treatment_number'),

				// 'purpose' => implode(",",$this->input->post('purpose')),

				// 'type' => implode(",",$this->input->post('rfmn_type')),

				// 'skin_type' => implode(",",$this->input->post('skin_type')),

				'treatment_details' => implode(",",$this->input->post('treatment_details')),

				'performed_area_1' => $this->input->post('performed_area_1'),

				'performed_area_2' => $this->input->post('performed_area_2'),

				'passage_1_1'  =>$this->input->post('passage_1_1'),

				'passage_2_1' => $this->input->post('passage_2_1'),

				'passage_3_1' => $this->input->post('passage_3_1'),

				'passage_4_1'  =>$this->input->post('passage_4_1'),

				'passage_1_2'  =>$this->input->post('passage_1_2'),

				'passage_2_2' => $this->input->post('passage_2_2'),

				'passage_3_2' => $this->input->post('passage_3_2'),

				'passage_4_2'  =>$this->input->post('passage_4_2'),

				'amt' => $this->input->post('amt'),

				'net_amt' => $this->input->post('net_amt'),

				'promo_code' => $this->input->post('promo_code'),

				'additional_comments' => $this->input->post('additional_comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

				

			);

			

			// print_r($datarfal);die;

			$rfmnInsert = $this->PatientModel->insertData('rfal_services_data',$datarfal);

				array_push($qtyarray,1);

				   array_push($serviceId,'5');

			// print_r($rfmnInsert);die;

			// echo $rfmnInsert;die;

			$pataint_note_rfal = array(

						'sid' => '5',

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

							'created_at' =>date('Y-m-d H:i:s')

					);

			// $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_rfal); 

			 // print_r($rfal_p_note);die;

		}



		$rfmn = $this->input->post('rfmn');

		// print_r($rfmn);die;

		if($rfmn)

		{	

			//$visit_id=$this->input->post('p_visit');

			$datarfmn = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'rfmn_area' => $this->input->post('rfmn_area'),

				'rfmn_treatment_number' => $this->input->post('rfmn_treatment_number'),

				'purpose' => implode(",",$this->input->post('purpose')),

				'type' => implode(",",$this->input->post('rfmn_type')),

				'skin_type' => implode(",",$this->input->post('skin_type')),

				'treatment_details' => implode(",",$this->input->post('treatment_details')),

				'performed_area_1' => $this->input->post('performed_area_1'),

				'performed_area_2' => $this->input->post('performed_area_2'),

				'passage_1_1'  =>$this->input->post('passage_1_1'),

				'passage_2_1' => $this->input->post('passage_2_1'),

				'passage_3_1' => $this->input->post('passage_3_1'),

				'passage_4_1'  =>$this->input->post('passage_4_1'),

				'passage_1_2'  =>$this->input->post('passage_1_2'),

				'passage_2_2' => $this->input->post('passage_2_2'),

				'passage_3_2' => $this->input->post('passage_3_2'),

				'passage_4_2'  =>$this->input->post('passage_4_2'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

				array_push($qtyarray,1);

				   array_push($serviceId,'6');

			$rfmnInsert = $this->PatientModel->insertData('rfmn_services_data',$datarfmn);

			$pataint_note_rfmn = array(

						'sid' => '6',

					//	'pid' => $this->input->post('pid'),

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

							"patient_notes_id"=>$this->input->post('p_notes_id'),

								'created_at' =>date('Y-m-d H:i:s')

					);

			// $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_rfmn); 

		}

		$leaser_treat = $this->input->post('laser-treatment');

		//print_r($leaser_treat);die;

		if($leaser_treat){

			//echo'<pre>';print_r($this->input->post());die;

			//$visit_id=$this->input->post('p_visit');

			$datalaser = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'leaser_type' => $this->input->post('laser_type'),

				'leaser_purpose' => implode(",",$this->input->post('leaser_purpose')),

				'laser_area' => $this->input->post('laser_area'),

				'passage_1'  =>$this->input->post('passage_1'),

				'passage_2' => $this->input->post('passage_2'),

				'passage_3' => $this->input->post('passage_3'),

				'passage_4'  =>$this->input->post('passage_4'),

				'passage_5'  =>$this->input->post('passage_5'),

				'passage_6' => $this->input->post('passage_6'),

				'passage_7' => $this->input->post('passage_7'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

				array_push($qtyarray,1);

				   array_push($serviceId,'7');

			$laserInsert = $this->PatientModel->insertData('leaser_treat_services_data',$datalaser);

			$pataint_note_laser = array(

						'sid' => '7',

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

							"patient_notes_id"=>$this->input->post('p_notes_id'),

								'created_at' =>date('Y-m-d H:i:s')

					);

			// $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_laser); 

		}

		$Coolsculpting = $this->input->post('coolsculpting');

		// echo "ok";die;

		// print_r($Coolsculpting);die;

	if($Coolsculpting){

			// echo"ok111";die;

			//echo'<pre>';print_r($this->input->post());die;

			//$visit_id=$this->input->post('p_visit');

			$dataCoolsculpting = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'area_rec_probe1' => $this->input->post('area_rec_probe1'),

				'area_rec_probe1_date' => $this->input->post('area_rec_probe1_date'),

				'area_rec_probe1_doneby'  =>$this->input->post('area_rec_probe1_doneby'),

				'area_rec_probe2' => $this->input->post('area_rec_probe2'),

				'area_rec_probe2_date' => $this->input->post('area_rec_probe2_date'),

				'area_rec_probe2_doneby'  =>$this->input->post('area_rec_probe2_doneby'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

			

			$CoolsculptingerInsert = $this->PatientModel->insertData('coolsculpting_services_data',$dataCoolsculpting);

			$pataint_note_oolsculpting = array(

						'sid' => '8',

						//'pid' => $this->input->post('pid'),

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

							"patient_notes_id"=>$this->input->post('p_notes_id'),

							'created_at' =>date('Y-m-d H:i:s')

					);

			 //$rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_oolsculpting);  ;

			 	array_push($qtyarray,1);

			   array_push($serviceId,'8');

		}

		$contoura = $this->input->post('contoura');

		// print_r($contoura);die;

		

		if($contoura)

		{

			//echo'<pre>';print_r($this->input->post());die;

			//$visit_id=$this->input->post('p_visit');

			$datacontoura = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'contoura_area' => $this->input->post('contoura_area'),

				'contoura_timeIn_minut1' => $this->input->post('contoura_timeIn_minut1'),

				'contoura_rec_prob1'  =>$this->input->post('contoura_rec_prob1'),

				'contoura_performer_name1' => $this->input->post('contoura_performer_name1'),

				'contoura_date1' => $this->input->post('contoura_date1'),

				'contoura_total_time1'  =>$this->input->post('contoura_total_time1'),



				'contoura_timeIn_minut2' => $this->input->post('contoura_performer_name1'),

				'contoura_rec_prob2' => $this->input->post('contoura_date1'),

				'contoura_date2'  =>$this->input->post('contoura_date2'),

				'contoura_total_time2'  =>$this->input->post('contoura_total_time2'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

				array_push($qtyarray,1);

			   array_push($serviceId,'9');

			$contouraInsert = $this->PatientModel->insertData('contoura_services_data',$datacontoura);

			$pataint_note_contoura = array(

						'sid' => '9',

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

							"patient_notes_id"=>$this->input->post('p_notes_id'),

								'created_at' =>date('Y-m-d H:i:s')

					);

			 //$rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_contoura); 

		}

		$thread_lifts = $this->input->post('Thread-Lifts');

		// print_r($thread_lifts);die;

		

		if($thread_lifts)

		{

			//echo'<pre>';print_r($this->input->post());die;

			//$visit_id=$this->input->post('p_visit');

			$datathread = array(

				'sid' => $this->input->post('sid'),

				'pid' => $this->input->post('pid'),

				'thread_lifts_area1' => $this->input->post('thread_lifts_area1'),

				'thread_lifts_type1' => $this->input->post('thread_lifts_type1'),

				'thread_lifts_numberthread1'  =>$this->input->post('thread_lifts_numberthread1'),

				'thread_lifts_performedby1' => $this->input->post('thread_lifts_performedby1'),

				'thread_lifts_area2' => $this->input->post('thread_lifts_area2'),

				'thread_lifts_type2'  =>$this->input->post('thread_lifts_type2'),

				'thread_lifts_numberthread2' => $this->input->post('thread_lifts_numberthread2'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

				array_push($qtyarray,1);

				   array_push($serviceId,'10');

			$thread_lifts_insert = $this->PatientModel->insertData('thread_lifts_services_data',$datathread);

			$pataint_note_thread_lifts = array(

						'sid' => '10',

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

							'created_at' =>date('Y-m-d H:i:s')

					);

		   //  $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_thread_lifts);  

		}

		$Sculptra_Butt = $this->input->post('sculptra-butt');

		// print_r($Sculptra_Butt);die;

		// echo $Sculptra_Butt;die;

		if($Sculptra_Butt){

			//echo'<pre>';print_r($this->input->post());die;

			//$visit_id=$this->input->post('p_visit');

			$dataSculptra_Butt = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'dialution' => $this->input->post('dialution'),

				'area_left1' => $this->input->post('sculptra_butt_area_left1'),

				'vials_left1' => $this->input->post('sculptra_butt_vials_left1'),

				'area_left2'  =>$this->input->post('sculptra_butt_area_left2'),

				'vials_left2' => $this->input->post('sculptra_butt_vials_left2'),

				'area_right1' => $this->input->post('sculptra_butt_area_right1'),

				'vials_right1'  =>$this->input->post('sculptra_butt_vials_right1'),

				'vials_right2' => $this->input->post('sculptra_butt_vials_right2'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);



			// print_r($dataSculptra_Butt);die;

				array_push($qtyarray,1);

				array_push($serviceId,'12');

			$Sculptra_Butt_insert = $this->PatientModel->insertData('sculptra_butt_services_data',$dataSculptra_Butt);

			$pataint_note_Sculptra_Butt = array(

						'sid' => '12',

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

							'created_at' =>date('Y-m-d H:i:s')

					);

			// $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_Sculptra_Butt);  

		}





		$Sculptra_face = $this->input->post('sculptra-face');

		 //echo "ok";die;

		// print_r($Sculptra_face);die;





		if($Sculptra_face)

		{

			array_push($qtyarray,1);

			array_push($serviceId,'13');

		

			$dataSculptra_face = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'dialution' => $this->input->post('sculptra_face_dialution'),

				'area_left1' => $this->input->post('sculptra_face_area_left1'),

				'vials_left1' => $this->input->post('sculptra_face_vials_left1'),

				'area_left2'  =>$this->input->post('sculptra_face_area_left2'),

				'vials_left2' => $this->input->post('sculptra_face_vials_left2'),

				'area_right1' => $this->input->post('sculptra_face_area_right1'),

				'vials_right1'  =>$this->input->post('sculptra_face_vials_right1'),

				'vials_right2' => $this->input->post('sculptra_face_vials_right2'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

			

			$Sculptra_face_insert = $this->PatientModel->insertData('sculptra_face_services_data',$dataSculptra_face);

			$pataint_note_Sculptra_face = array(

						'sid' => '13',

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

						'created_at' =>date('Y-m-d H:i:s')

					);

			// $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_Sculptra_face); 

		}

		$asthetic = $this->input->post('Asthetic-Services');

		// print_r($asthetic);die;

		if($asthetic)

		{

			array_push($qtyarray,1);

			array_push($serviceId,'14');

			//echo'<pre>';print_r($this->input->post());die;

			///$visit_id=$this->input->post('p_visit');

			$data_asthetic = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'astheti_purpose' => implode(",",$this->input->post('astheti_purpose')),

				'astheti_skin_condition' => implode(",",$this->input->post('astheti_skin_condition')),

				'astheti_product_and_service' => implode(",",$this->input->post('astheti_product_and_service')),

				'skin_care_botax' => $this->input->post('skin_care_botax'),

				'skin_care_type' => $this->input->post('skin_care_type'),

				'skin_care_microneedling' => $this->input->post('skin_care_microneedling'),

				'skin_care_rf'  =>$this->input->post('skin_care_rf'),

				'service_mini_facial' => $this->input->post('service_mini_facial'),

				'service_detailed_facial' => $this->input->post('service_detailed_facial'),

				'service_buckle_facial'  =>$this->input->post('service_buckle_facial'),

				'service_micro_derma' => $this->input->post('service_micro_derma'),

				'service_derma_planning' => $this->input->post('service_derma_planning'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

			

			$asthetic_insert = $this->PatientModel->insertData('asthetic_services_services_data',$data_asthetic);

			$pataint_note_asthetic = array(

						'sid' => '14',

						'pid' => $this->input->post('pid'),

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

							'created_at' =>date('Y-m-d H:i:s')

					);

			// $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_asthetic); 

		}

		$vi_pool = $this->input->post('Vi-Peel');

		// print_r($vi_pool);die;

		if($vi_pool)

		{

			array_push($qtyarray,1);

			array_push($serviceId,'15');

			//echo'<pre>';print_r($this->input->post());die;

			//$visit_id=$this->input->post('p_visit');

			$data_vi_pool = array(

				'sid' => $this->input->post('ssid'),

				'pid' => $this->input->post('pid'),

				'purpose' => implode(",",$this->input->post('vi-peel-purpose')),

				'vi_peel_skn_type' => $this->input->post('vi-peel_skn_type'),

				'vi_peel_primed_retnol' => $this->input->post('vi-peel_primed_retnol'),

				'vi_peel_primed_hq' => $this->input->post('vi-peel_primed_hq'),

				'vi_peel_skin_care' => $this->input->post('vi-peel_skin_care'),

				'vi_peel_prior_history' => $this->input->post('vi-peel_prior_history'),

				'vi_peel_prior_complications'  =>$this->input->post('vi-peel_prior_complications'),

				'vi_peel_laser' => $this->input->post('vi-peel_laser'),

				'vi_peel_recent_peet' => $this->input->post('vi-peel_recent_peet'),

				'vi_peel-details'  => implode(",",$this->input->post('vi-peel-details')),

				'vi_peel_no_face_layer' => $this->input->post('vi-peel_no_face_layer'),

				'vi_peel_no_Neck_layer' => $this->input->post('vi-peel_no_Neck_layer'),



				'vi_peel_no_anyarea_layer' => $this->input->post('vi-peel_no_anyarea_layer'),

				'vi_peel_Discuss_Post' => $this->input->post('vi-peel_Discuss_Post'),

				'vi_peel_Discuss_Priming'  =>$this->input->post('vi-peel_Discuss_Priming'),

				'vi_peel_Retnol' => $this->input->post('vi-peel_Retnol'),

				'vi_peel_HQ' => $this->input->post('vi-peel_HQ'),

				'vi_peel_VI+E' => $this->input->post('vi-peel_VI+E'),

				'damount' => $this->input->post('damount'),

				'tamount' => $this->input->post('namount'),

				'promo' => $this->input->post('promo'),

				'comments' => $this->input->post('comments'),

				'p_visit_id' => $visit_id,

				'patient_notes_id'=>$this->input->post('p_notes_id')

			);

			

			$vi_pool_insert = $this->PatientModel->insertData('vi_peel_services_data',$data_vi_pool);

			$pataint_note_vi_pool = array(

						'sid' => '15',

						

					//	'pid' => $this->input->post('pid'),

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  =>'1',

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

							'created_at' =>date('Y-m-d H:i:s')

					);

			// $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_vi_pool); 

		}

		$tatoo = $this->input->post('tattoo_service');

		

		

			if($tatoo)

		{

			

				$tatoo_insert=array

				(

				"sid" => $this->input->post('ssid'),

				"pid" => $this->input->post('pid'),

				"size" => $this->input->post('tatoo_size'),

				"area" => $this->input->post('tatoo_area'),

				"type" => $this->input->post('tattoo_type'),

				"color" => implode(",",$this->input->post('tattoo_color')),

				"skin_type" => $this->input->post('tattoo_skin_type'),

				"treat_no" => $this->input->post('tattoo_treat_no'),

				"patch" => $this->input->post('patch'),

				"perform_area1" => $this->input->post('tattoo_perform_area1'),

				"passage_1_1" => $this->input->post('tattoo_passage_1_1'),

				"passage_1_2" => $this->input->post('tattoo_passage_1_2'),

				"passage_1_3" => $this->input->post('tattoo_passage_1_3'),

				"passage_1_4" => $this->input->post('tattoo_passage_1_4'),

				"passage_2_1" => $this->input->post('tattoo_passage_2_1'),

				"passage_2_2" => $this->input->post('tattoo_passage_2_2'),

				"passage_2_3" => $this->input->post('tattoo_passage_2_3'),

				"passage_2_4" => $this->input->post('tattoo_passage_2_4'),

				"damount" => $this->input->post('damount'),

				"tamount" => $this->input->post('namount'),

				"promo" => $this->input->post('promo'),

				"comments" => $this->input->post('comments'),

				"p_visit_id" => $visit_id,

				"patient_notes_id"=>$this->input->post('p_notes_id')

					

				);

				

			 //   var_dump($stuff);

			

 	//print_r($tatoo_insert);die;

	  array_push($qtyarray,1);

	  array_push($serviceId,'16');

			$tatoo_insert = $this->PatientModel->insertData('tatoo_services_data',$tatoo_insert);

		//	print_r($tatoo_insert);die;

			$pataint_note_tatoo = array(

						"sid" => '16',

						'ssid'=> $this->input->post('ssid'),

						"bamount" => $this->input->post('bamount'),

						"tamount" => $this->input->post('namount'),

						"qty"  =>'1',

						"damount" => $this->input->post('damount'),

						"p_visit_id" => $visit_id,

						"patient_notes_id"=>$this->input->post('p_notes_id'),

							'created_at' =>date('Y-m-d H:i:s')

					);

			// 		print_r($pataint_note_tatoo);die;

			

			//  $rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note_tatoo); 

			 

			//  $this->InventoryModel->update_inventry_service_product($sid,$product,$amt);

// 		}

// 		$i++;

// 			}

		

			

			

			   

		}

		if(!empty($updatenuro)||!empty($fillerdata)||!empty($miradryInsert)||!empty($rfInsert)||!empty($rfmnInsert)||!empty($laserInsert)||!empty($CoolsculptingerInsert)||!empty($contouraInsert)||!empty($thread_lifts_insert)||!empty($Sculptra_Butt_insert)||!empty($Sculptra_face_insert)||!empty($asthetic_insert)||!empty($vi_pool_insert)||!empty($tatoo_insert))

		{

			//patient data 

// 			$date = date('Y-m-d H:i:s');

		

// 			$pdata= array('vid' => $visit_id,'user_id' => $userid,'pnid' => $this->input->post('p_notes_id'),'created_at' =>$date );

// 			$p_insertId = $this->PatientModel->insertData('patient_visit',$pdata);

// 			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Your assined service successfully saved !</div>');



			$date = date('Y-m-d H:i:s');

// 			$pdata= array('vid' => $visit_id,'pt_id' => $this->input->post('pid'),'created_at' =>$date );

// 			$p_insertId = $this->PatientModel->insertData('patient_visit',$pdata);

			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Your assined service successfully saved !</div>');

			

				  $pataint_note1 = array(

						'sid' => implode(",",$serviceId),

						'bamount' => $this->input->post('bamount'),

						'tamount' => $this->input->post('namount'),

						'qty'  => implode(",",$qtyarray),

						//'ssid'  =>$ssid,

						'damount' => $this->input->post('damount'),

						'commint' => $this->input->post('comments'),

						'p_visit_id' => '',

						"patient_notes_id"=>$this->input->post('p_notes_id'),

						'created_at' =>date('Y-m-d H:i:s')

					);

		$rfmn_p_note = $this->PatientModel->insertData('patient_notes1',$pataint_note1); 

		

			if(isset($this->session->userdata['user_type'])=='provider')

			{

				redirect('ProviderDashboard');

			}

			

			else if(isset($this->session->userdata['user_type'])=='super admin')

			{

				redirect('patients/allpatients');

			}

			

		}

		

	}



	public function lasertreatment($ptid,$pid,$sid)

	{

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

	

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/lasertreatment_form',compact('allservices','sdata','pdata'));

		$this->load->view('footer');

	}



	public function coolsculpting($ptid,$pid,$sid)

	{

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		//$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/Coolsculpting_form',compact('allservices','sdata','pdata'));

		$this->load->view('footer');

	}



	public function contoura($ptid,$pid,$sid)

	{

		// echo "ok";die;

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		// print_r($sdata);die;

		$ssdata = $this->ServiceModel->getallsubservices($sid);

		// print_r($ssdata);die;

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/contoura_form',compact('allservices','sdata','pdata','ssdata'));

		$this->load->view('footer');

	}



	public function threadlifts($ptid,$pid,$sid)

	{

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		//$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/threadlifts_form',compact('allservices','sdata','pdata'));

		$this->load->view('footer');

	}



	public function sculptra_face($ptid,$pid,$sid)

	{



		// echo "ok";die;

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		$ssdata = $this->ServiceModel->getallsubservices($sid);

		// print_r($sdata);die;

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		// print_r($pdata);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/sculptraface_form',compact('allservices','sdata','pdata','ssdata'));

		$this->load->view('footer');

	}

	public function sculptra_butt($ptid,$pid,$sid)

	{

		// echo"ok";die;

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		// print_r($sdata);die;

		//$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		// print_r($pdata);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/sculptrabutt_form',compact('allservices','sdata','pdata'));

		$this->load->view('footer');

	}



	public function vi_peel($ptid,$pid,$sid)

	{

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		//$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/vi_peel_form',compact('allservices','sdata','pdata'));

		$this->load->view('footer');

	}



	public function asthetic_service($ptid,$pid,$sid)

	{

		$allservices = $this->ServiceModel->getallservices(); 

		$sdata = $this->ServiceModel->getparticularser($sid);

		//$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/asthetic_service_form',compact('allservices','sdata','pdata'));

		$this->load->view('footer');

	}



	public function tattoo_service($ptid,$pid,$sid)

	{

		$provider_Data = $this->session->userdata('id');

		//echo "ok";die;

		$allservices = $this->ServiceModel->getallservices(); 

		// print_r($allservices);die;

		$sdata = $this->ServiceModel->getparticularser($sid);



		// print_r($sdata);die;

		$ssdata = $this->ServiceModel->getallsubservices($sid);

		$pdata = $this->PatientModel->getparticularpatients($ptid);

		// print_r($pdata);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/tattoo_service_form',compact('allservices','sdata','pdata','provider_Data','ssdata'));

		$this->load->view('footer');

	}



	public function patient_note($id=null)

	{   

		//echo'<pre>';print_r($id);die;

		$result['payment_method'] = $this->ServiceModel->getallpaymentmethod();

		$result['patients_list'] = $this->PatientModel->getallpatients();

		$result['treatment_type'] = $this->ServiceModel->getallservices();



		



		if($id !=null){

		$result['patients_note_data'] = $this->PatientModel->patient_note_data_by_id($id);

		$result['product_list'] = $this->ServiceModel->getsubservicebysid($result['patients_note_data'][0]['sid']);

	   // echo'<pre>';print_r($result['patients_note_data']);die;

		}

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('servicepages/add');

		$this->load->view('servicepages/add_sub_services');

		$this->load->view('patientspages/patient_note',$result);

		$this->load->view('footer');

	}

	

	

		public function patient_check_in($id=null)

	{   

		// echo'<pre>';print_r($id);die;

		$result['appointment_Data'] = $this->PatientModel->getapointmentdata($id);
		$ptid = $result['appointment_Data'][0]->patient_id;
		// print_r($result['appointment_Data'][0]->patient_id); die();

		$prvid = $result['appointment_Data'][0]->provider_id;

		$result['provider'] = $this->PatientModel->getproviderbyID($prvid);
		$result['patients_list'] = $this->PatientModel->getpatientbyID($ptid);

		$result['payment_method'] = $this->ServiceModel->getallpaymentmethod();
		$result['treatment_type'] = $this->ServiceModel->getallservices();
		
		// $result['service_data'] = $this->ServiceModel->getparticularser($serid);

		

//  echo'<pre>';print_r($result['patients_list']);die;

		if($id !=null){

		$result['patients_note_data'] = $this->PatientModel->patient_note_data_by_id($id);

		// $result['product_list'] = $this->ServiceModel->getsubservicebysid($result['patients_note_data'][0]['sid']);
		}

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('servicepages/add');

		$this->load->view('servicepages/add_sub_services');
		$this->load->view('patientspages/patient_check_in',$result);

		$this->load->view('footer');

	}

	

public function patient_check_in_edit($id=null)

	{   

		// echo'<pre>';print_r($id);die;
		// $result['patients_notes'] = $this->PatientModel->getpatientdata($id);
		$result['provider'] = $this->PatientModel->getallprovider();       
		
		$result['payment_method'] = $this->ServiceModel->getallpaymentmethod();
		$result['treatment_type'] = $this->ServiceModel->getallservices();
		if($id !=null){

		$result['patients_note_data'] = $this->PatientModel->patient_note_data_by_id($id);

		// echo'<pre>';print_r($result['patients_note_data']);die;

		$result['patients_list'] = $this->PatientModel->getpatientbyID($id);


		}

		$this->load->view('header');

		$this->load->view('sidenavbar');

		// $this->load->view('servicepages/add');

		// $this->load->view('servicepages/add_sub_services');

		$this->load->view('patientspages/patient_check_in_edit',$result);

		$this->load->view('footer');

	}

	

	

		public function patient_check_Out($id=null)

	{   

		//echo'<pre>';print_r($id);die;

		$result['payment_method'] = $this->ServiceModel->getallpaymentmethod();

		$result['patients_list'] = $this->PatientModel->getallpatients();

		$result['treatment_type'] = $this->ServiceModel->getallservices();



		



		if($id !=null){

		$result['patients_note_data'] = $this->PatientModel->patient_note_data_by_id($id);

		$result['product_list'] = $this->ServiceModel->getsubservicebysid($result['patients_note_data'][0]['sid']);

	   // echo'<pre>';print_r($result['patients_note_data']);die;

		}

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('servicepages/add');

		$this->load->view('servicepages/add_sub_services');

		$this->load->view('patientspages/patient_check_out',$result);

		$this->load->view('footer');

	}





	public function all_services(){ //die('fff');



	   $allservices = $this->ServiceModel->getallservices(); 

	   echo json_encode($allservices);

	  // echo'<pre>';print_r($allservices);die;



	}



	public function all_subservices(){ //die('fff');

	   $id=$_GET['sid'];

	   $allsubservices = $this->ServiceModel->getallsubservices($id); 

	   echo json_encode($allsubservices);

	  // echo'<pre>';print_r($allservices);die;



	}





	public function save_patients_notes(){ //die('fff');



	//  pid,sid,ssid,commint,dmount,payment_status



	   $temp_visit=$this->temp_visit($this->input->post("pname"));



	   $p_visit=$this->PatientModel->last_record($this->input->post('pname'),'temp_visit');

		  // echo'<pre>';print_r($p_visit);die;

		   if(isset($p_visit)){

			$visit_id = $p_visit->id;

		   }else{

		   	$visit_id='';

		   }



	   $insert_data = array( 

					//'pid'   => $this->input->post("pname"),

					'p_visit_id' => $visit_id,

					'patient_notes_id' => $_POST['patient_note_id'],

					'sid'  => $this->input->post("ttype"),  

					'ssid'  => $this->input->post("ttypesub"),

					'commint'   => $this->input->post("comments"),

					'damount'  => $this->input->post("damount"),

					'bamount'  => $this->input->post("bamount"),

					'tamount'  => $this->input->post("tamount"),

					'payment_status'   => $this->input->post("p_text2"),

						'created_at' =>date('Y-m-d H:i:s')

				);

	   // echo'<pre>';print_r($insert_data);die;

	// if(isset($_POST['patient_note_id']) && !empty($_POST['patient_note_id'])){

	// $result = $this->InventoryModel->update('patient_notes1',$insert_data,'id',$_POST['patient_note_id']);

	// $this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Updated.</div>');

	// }else{

	  $insertdb = $this->PatientModel->insert_patients_notes($insert_data);  

	  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Add.</div>');  	

	//}

	redirect('patients/patient_note_list');

	  // echo'<pre>';print_r($allservices);die;



	}

	

	 public function save_patients_checkin(){ 

	   $insert_data = array( 

					'pid'   => $this->input->post("pname"),

					'sid'   => $this->input->post("service_category_id"),

					'provider_id'   => $this->input->post("provider"),

					'commint'   => $this->input->post("comments"),

					'room_no'  => $this->input->post("room_no"),

					'patient_appt_date'  => $this->input->post("patient_app_date"),

					'appt_id'=> $this->input->post("patient_app_id"),

					'patient_appt_time'  => $this->input->post("patient_app_time"),

					'check_in_time'=>date("H:i:s"),

					'check_in_date'=>date("Y-m-d")

				);

		//  echo'<pre>';print_r($insert_data);die;

	if(isset($_POST['patient_note_id']) && !empty($_POST['patient_note_id'])){

	$result = $this->InventoryModel->update('patient_notes',$insert_data,'id',$_POST['patient_note_id']);

	$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Updated.</div>');

	}

	

	else{

	  $insertdb = $this->PatientModel->insert_patients_notes($insert_data);  

	  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Add.</div>');  

	  

	// echo $insertdb; die;

	  

	  if($insertdb)

	  { 

			$insert_data1 = array( 

					'pid'   => $this->input->post("pname"),

					'provider_id'   => $this->input->post("provider"),

					'commint'   => $this->input->post("comments"),

					'room_no'  => $this->input->post("room_no"),

					'patient_notes_id' => $insertdb,

					'assign_date'=>date("Y-m-d")

				);

				

				// print_r($insert_data1); die;

				

		   $insertdb1 = $this->PatientModel->saveassigndata($insert_data1); 

		//  print_r($insertdb1); die;

	  }

	}

	redirect('FrontDashboard/');

	  // echo'<pre>';print_r($allservices);die;



	}

	

		public function check_out($id)

	{

		

				 $data = array(

						// 'check_in' => time(),

					  'check_out_time' =>  date("H:i:s")

					);

					//print_r($data);die;



		$checkout= $this->db->where('id',$id)->update('patient_notes',$data);

	   // echo $this->db->last_query();exit;

	   // print_r($checkout);die;

			if ($checkout==1)

		 {

			 

		  //   echo "okvinay";die;

			redirect('FrontDashboard','refresh');

		}

	   

// 		$this->load->view('header');

// 		$this->load->view('sidenavbar');

		$this->load->view('FrontDashboard');

		$this->load->view('footer');

	}

	

			public function check_in_timeupdate($id)

	{

		

				 $data = array(

						// 'check_in' => time(),

					  'check_in' =>  date("H:i:s")

					);

					//print_r($data);die;



		$checkintime= $this->db->where('id',$id)->update('patient_notes',$data);

	   // echo $this->db->last_query();exit;

	   // print_r($checkout);die;

			if ($checkintime==1)

		 {

			 

		  //   echo "okvinay";die;

			redirect('FrontDashboard','refresh');

		}

	   

// 		$this->load->view('header');

// 		$this->load->view('sidenavbar');

		$this->load->view('FrontDashboard');

		$this->load->view('footer');

	}

	

		public function not_visited($id)

	{

	   // $this->PatientModel->del_data('patient_notes',array("id"=>$id));

		

	   // $message    = array("1","Successfully Delete");

		

		 $result = $this->InventoryModel->delete('patient_notes','id',$id);

			if ($result==1)

		 {

			 

		  //   echo "okvinay";die;

			redirect('FrontDashboard','refresh');

		}

	   

// 		$this->load->view('header');

// 		$this->load->view('sidenavbar');

		$this->load->view('FrontDashboard');

		$this->load->view('footer');

	}

	

	public function update_patients_checkin()

	{

		   $patientnoteid = $this->input->post("patient_note_id");
		   $patientappid = $this->input->post("patient_app_id");

		   

			 $insert_data = array( 

				

					'provider_id'   => $this->input->post("provider"),

					'commint'   => $this->input->post("comments"),

					'room_no'  => $this->input->post("room_no"),

				);

				

				 $insert_appt = array( 

				

					'provider_id'   => $this->input->post("provider"),

				

				);

				

		 $udatenotes= $this->db->where('id',$patientnoteid)->update('patient_notes',$insert_data);

		 //echo $this->db->last_query();exit;

		  if($udatenotes)

	  { 

		   $udateappoitment= $this->db->where('apid',$patientappid)->update('Appointment_data',$insert_appt);

		  

		   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Updated.</div>');

		   redirect('FrontDashboard/'); 

		  

	  }

	  else

	  {

		  echo"<script>alert('Something went wrong.Please Try Again')</script>";

	  }

	}

	

	

	

	public function save_patients_checkout(){ //die('fff');



	//  pid,sid,ssid,commint,dmount,payment_status

	// echo "ok";die;



	   $temp_visit=$this->temp_visit($this->input->post("pname"));



	   $p_visit=$this->PatientModel->last_record($this->input->post('pname'),'temp_visit');

		  // echo'<pre>';print_r($p_visit);die;

		   if(isset($p_visit)){

			$visit_id = $p_visit->id;

		   }else{

		   	$visit_id='';

		   }



	   $insert_data = array( 

					'pid'   => $this->input->post("pname"),

				// 	'p_visit_id' => $visit_id,

				// 	'sid'  => $this->input->post("ttype"),  

				// 	'ssid'  => $this->input->post("ttypesub"),

					'feedback'   => $this->input->post("feedback"),

				// 	'room_no'  => $this->input->post("room_no"),

					//'bamount'  => $this->input->post("bamount"),

				// 	'tamount'  => $this->input->post("tamount"),

				// 	'payment_status'   => $this->input->post("p_text2")

				'check_out'=>date('Y-m-d H:i:s')

				);

		// echo'<pre>';print_r($insert_data);die;

	if(isset($_POST['patient_note_id']) && !empty($_POST['patient_note_id'])){

	$result = $this->InventoryModel->update('patient_notes',$insert_data,'id',$_POST['patient_note_id']);

	$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Updated.</div>');

	}else{

	  $insertdb = $this->PatientModel->insert_patients_notes($insert_data);  

	  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Add.</div>');  	

	}

	redirect('FrontDashboard/');

	  // echo'<pre>';print_r($allservices);die;



	}

// for appoinment search
public function appointmentfileter()

	{  
		 
		$result['patients_note_list'] = $this->PatientModel->getallappoinmentByDate($_POST);  

		$result['dates']= $_POST;   
		$result['services'] = $this->PatientModel->getserivces();

		

	//    echo'<pre>';print_r($result['patients_note_list']);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		// $this->load->view('servicepages/add');

		// $this->load->view('servicepages/add_sub_services');

		$this->load->view('FrontDashboard',$result);

		$this->load->view('footer');

	}
	//  end appoinment search



	public function patient_note_list()

	{   
		$result['patients_note_list'] = $this->PatientModel->getallpatient_notes_list($_POST);  

		$result['dates']= $_POST;   

		

	   // echo'<pre>';print_r($result['dates']);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		// $this->load->view('servicepages/add');

		// $this->load->view('servicepages/add_sub_services');

		$this->load->view('patientspages/patient_note_list',$result);

		$this->load->view('footer');

	}

	

		public function patient_note_list_patient()

	{   

	   // echo"ok2222";die;

		

		$result['patients_note_list'] = $this->PatientModel->getallpatient_notes_list($_POST);  

		$result['dates']= $_POST;    

	   // echo'<pre>';print_r($result['dates']);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		// $this->load->view('servicepages/add');

		// $this->load->view('servicepages/add_sub_services');

		$this->load->view('PatientDashboard',$result);

		$this->load->view('footer');

	}

	

	public function patient_note_list_front()

	{   

	   // echo"ok";die;

		

		$result['patients_note_list_front'] = $this->PatientModel->getallpatient_notes_list($_POST);  

		$result['dates']= $_POST;    

		// echo'<pre>';print_r($result['dates']);die;

		$this->load->view('header');

		$this->load->view('Frontsidenavbar');

		// $this->load->view('servicepages/add');

		// $this->load->view('servicepages/add_sub_services');

		$this->load->view('FrontDashboard/',$result);

		$this->load->view('footer');

	}

	

		public function patient_note_list1()

	{   

		

		$result['patients_note_list1'] = $this->PatientModel->getallpatient_notes_list1($_POST);  

		

	   

		$result['dates']= $_POST;    

	   // echo'<pre>';print_r($result['dates']);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		// $this->load->view('servicepages/add');

		// $this->load->view('servicepages/add_sub_services');

		$this->load->view('PatientNoteList',$result);

		$this->load->view('footer');

	}



	public function payment_status_update(){   

	//	echo'<pre>';print_r($_POST);die; 

	   $id=$_POST['id'];

	   $result = $this->PatientModel->getpatient_data($id);

	   //echo'<pre>';print_r($result[0]['payment_status']);die;

	   if($result[0]['payment_status']=='no'){

		$status='yes';

	   }else{

	   	$status='no';

	   }



	   $updated_data = array(

					'payment_status'     => $status,

					'p_flag'     => '1'

				);



				$result = $this->InventoryModel->update('patient_notes',$updated_data,'id',$id);

				// echo'<pre>';print_r($result);die; 

				if($result===TRUE)    { 

					echo json_encode(array('div_id'=>$id,'data'=>$status,'success'=>'Payment Status updated successfully')); 

					die;

				} 

				else {

					echo json_encode(array('error'=>'Fail to update Details'));

				} 



	//   $result = $this->PatientModel->update_payment_status($id);  

	//echo'<pre>';print_r($result);die;  	

	   echo json_encode($result);

	}

	

   

	public function delete_patient_note($id){



	  $result = $this->InventoryModel->delete('patient_notes','id',$id);

		   

			if($result){

				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Deleted.</div>');

				

				redirect('patients/patient_note_list');

			}

		   

		   else{

			   $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center msg">Failed to delete</div>');

			   redirect('patients/patient_note_list');

		   }



	}





	public function get_inventory_data_by_service_and_product(){



		if(isset($_GET)){

		 

		 $get_subserv_data=$this->ServiceModel->filterbyssid_sid($_GET['ssid']);

		// echo'<pre>';print_r($get_subserv_data);die;

		 $ss_name=$get_subserv_data[0]['sub_service_name'];

		 

		 $get_subserv_data=$this->InventoryModel->get_inv_data_by_sid_and_pro_name($_GET['sid'],$ss_name);

		// echo'<pre>';print_r($get_subserv_data);die;

		  echo json_encode($get_subserv_data[0]); 

		}

	}





	public function patients_preparation_form()

	{

		$result['patients_list'] = $this->PatientModel->getallpatients();

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/patient_preparation',$result);

		$this->load->view('footer');

	}



	public function dashboard($id){

		$result['patient_data'] = $this->ServiceModel->get_all_patients_info($id);



		$result['treatment_type'] = $this->ServiceModel->getallservices();



		$result['invoices_list'] = $this->InvoiceModel->getall_invoice_list($_POST,$id);

	//   echo'<pre>'; print_r($result['invoices_list']);die;

		$result['money_walite_cost'] = $this->PatientModel->get_money_walite($id);

		// echo'<pre>'; print_r($result['patient_data']);die;

		

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/money_wallet',$result);

		$this->load->view('patientspages/patients_dashboard',$result);

		$this->load->view('footer');

	}



	public function walite_view(){



	   if(isset($_GET['pid'])){

	   	$id=$_GET['pid'];

	   	$result['money_walite_list'] = $this->PatientModel->get_money_walite_view($id);

	   // echo'<pre>'; print_r(count($result['money_walite_list']));die('mmmmjjj');

	   	if(isset($result['money_walite_list']) && count($result['money_walite_list'])>0){ 

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/money_wallet_list',$result);

		$this->load->view('footer');

	   	}else{

			   

			   redirect('patients/dashboard/'.$id);

	   	}

	   	

	}

}





	public function get_patient_data_by_id(){



		if(isset($_GET['pid'])){

		//  echo'<pre>';print_r($_GET['pid']);die;

		 $get_data=$this->PatientModel->getparticularpatients($_GET['pid']);

		  echo json_encode($get_data[0]); 

		}

	}





	public function view(){ //die('ggg');



		if(isset($_GET['pn_id']) && !empty($_GET['pn_id'])){

		$id=$_GET['pn_id'];



		$result['data'] = $this->ServiceModel->get_neurotoxin_services_data_by_id($id);

		//echo'<pre>'; print_r($result['data']);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/patients_view_form',$result);

		$this->load->view('footer');

		}



		if(isset($_GET['nsd_id']) && !empty($_GET['nsd_id'])){

		 $id=$_GET['nsd_id'];

		 $result['patients_note_list'] = $this->PatientModel->getallpatient_notes_list($_POST,$id);

	   //  echo'<pre>'; print_r($result['patients_note_list']);die;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/patients_view_form',$result);

		$this->load->view('footer');

		}

		

	   

	}













	public function savepatient_preparation(){



	if($this->input->post('submit_data'))

		{  

// 			echo'<pre>';print_r($this->input->post());die;

			$this->form_validation->set_rules('pname','patient name','trim|required');

			$this->form_validation->set_rules('phone','phone number','trim|required');

			$this->form_validation->set_rules('email','email','trim|required');

			

			if($this->form_validation->run() == TRUE)

			{

			$data = array(

				'pname' => $this->input->post('pname'),

				'phone' => $this->input->post('phone'),

				'email' => $this->input->post('email'),

				'gender' => $this->input->post('gender'),

				'age' => $this->input->post('age'),

				'allergy' => $this->input->post('allergy'),

				'pmh' => $this->input->post('pmh'),

				'psh' => $this->input->post('psh'),

				'contact_source' => $this->input->post('sourcefrom'),

				'comment' => $this->input->post('comment')

				);

			if($this->PatientModel->savepatientdata($data))

			{

				//echo "saved Success";

				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully inserted.</div>');



				redirect('patients/patients_preparation_form');

			}

			else

			{  



				echo "failed";

			}

			}

			else

			{

				$this->load->view('header');

				$this->load->view('sidenavbar');

				$this->load->view('patients/patients_preparation_form');

				$this->load->view('footer');

			}





	}



}



 public function get_product_cost_data(){ 

	 

	   $sid=$_GET['sid'];

	   $product_name=$_GET['ssid'];

	   $subservices = $this->InventoryModel->get_inv_data_by_sid_and_pro_name($sid,$product_name); 

	  // echo'<pre>';print_r($subservices);die;

	   echo json_encode($subservices);

 	//$result['data'] = $this->ServiceModel->filterbyssid_sid($id);

 }





 public function insert_money_wallet_data(){

		$pids= $this->input->post("pids");

		if(isset($pids) && !empty($pids)){

   

		 $insert_data = array( 

					'pid'  => $this->input->post("pids"),

					'sid'  => $this->input->post("ttype"),

					'product_name'  => $this->input->post("ttypesub"),

					'sell_cost'  => $this->input->post("current_sell_cost"),

					'qty'  => $this->input->post("mquantity1"),

					'bamount'  => $this->input->post("bamount"),

					'namount'  => $this->input->post("namount"),

					'discount_per'  => $this->input->post("discount")

				); 



				//echo'<pre>';print_r($insert_data);die;



				$insertdb = $this->InventoryModel->insert('money_wallet', $insert_data);   

				if($insertdb){

					echo json_encode(array('success'=>'Data Added successfully','namount'=>$this->input->post("namount")));

				} else {

					echo json_encode(array('error'=>'Fail to Add Data'));

				}



		}

 				

 }





 public function temp_visit($pid){

  if(isset($pid) && !empty($pid)){

  $current_date=date('Y-m-d');

  $check_current_date =$this->PatientModel->check_visit_current_date($pid,$current_date);

 // echo'<pre>';print_r($check_current_date);die;

  // if(isset($check_current_date[0]) && !empty($check_current_date[0])){

  

  //   $data = array( 

		// 			'pid'  => $pid

		// 		); 

  //  $this->InventoryModel->insert('temp_visit', $data); 

  // }

  }

 }



 public function get_visit_list($pid){

  $current_date=date('Y-m-d');

  $p_visit=$this->PatientModel->get_visit_list_v($pid,$current_date); 

  echo json_encode($p_visit);

  

 }



 public function savefiller(){



 	//echo'<pre>';print_r($this->input->post());die; 

	if($this->input->post('submit_data'))

	{

	$product=$this->input->post('product');

	$visit_id=$this->input->post('p_visit');



	if(isset($product) && !empty($product))

	{

	$i=0;

	foreach ($product as $value) 

	{

	if(!empty($value))

	{

		if($i==0)

		{

			$bamount=$this->input->post('bamount');

   			$namount=$this->input->post('namount');

		}

		else

		{

			$bamount = 0;

			$namount = 0;

		}



		$userid = $this->input->post('pid');

		$pid=$this->input->post('pid');

		$sid=$this->input->post('sid');

		$qty=$this->input->post('qty');



		$product=ucfirst($value);

		$applied_side=$this->input->post('applied_side')[$i];

		$filler_type=$this->input->post('filler_type')[$i];

		$amt=$this->input->post('amt')[$i];

		$type=$this->input->post('type')[$i];

	   // $visit_id=$this->input->post('p_visit');

		// $cannula_chk=$this->input->post('cannula');

		// if(isset($cannula_chk) && !empty($cannula_chk)){

		//  foreach ($cannula_chk as $value) {

		//  	if($cannula_chk == $product){

		//   $cannula='on';

		// }else{

		// 	$cannula='';

		// }



		//  }

		// }

		

		// $needle_chk=$this->input->post('needle')[$i];



		// if($needle_chk == $product){

		//   $needle='on';

		// }else{

		// 	$needle='';

		// }

		$cannula=$this->input->post('cannula');

		$needle=$this->input->post('needle');

		// print_r($needle);

		// exit();

		$data=array('pid'=>$pid,'sid'=>$sid,'p_visit_id'=>$visit_id,'product'=>$product,'applied_side'=>$applied_side,'filler_type'=>$filler_type,'bamount'=>$bamount,'qty'=>$amt,'tamount'=>$namount,'type'=>$type,'cannula'=>$cannula,'needle'=>$needle);



		$insertdb = $this->InventoryModel->insert('filler_services', $data); 



		

		$this->InventoryModel->update_inv_by_service_product($sid,$product,$amt);

		

	}

		  

				

	$i++;



	}

	//  print_r($insertdb);

	//             exit(); 

 //patient data 

	   $date = date('Y-m-d H:i:s');

	   $pdata= array('vid' => $visit_id,'user_id' => $userid,'pnid' => $this->input->post('p_notes_id'),'created_at' =>$date );

		// echo'<pre>';print_r($this->input->post());die; 

					if($insertdb)

					{  

			//visit data update

			$this->PatientModel->save_pvisit($pdata);

			}

	 if($insertdb)

	 {

		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg"> Service Successfully Saved.</div>');

				redirect('patients/service/'.$this->input->post('pid'));

				//sid_name

	} 

	}

	 

}

}



   public function generic($noteid,$pid)

	{
		$result['patient']=$this->MasterModel->get_patientdataby_id($pid,'patient_registration');
		$result['services'] = $this->ServiceModel->getallservices();
		$result['products'] = $this->ProductModel->getallProduct();
		$service['all_services'] = $this->MasterModel->active_data('services');		
		$result['service_wallet_history']=$this->MasterModel->viewwalletservices($pid);
		$result['packages_in_wallet']=$this->MasterModel->wallet_items($pid);
		$result['patient_notes_id']=$noteid;
	


		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/generic_service_new',$result,$noteid);
		$this->load->view('footer');

	}

	public function get_service_by_provider($noteid,$pid){

	 

		$result['servicesdata'] = $this->ServiceModel->getallservices();
		// echo "<pre>";
		// print_r($result['servicesdata']); die();

		$result['notesid']= $noteid;

		$result['pid']= $pid;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/get_services',$result);

		$this->load->view('footer');

	}

		public function add_product_usein_service($noteid,$pid){

		$result['productsdata'] = $this->ServiceModel->getallproducts();

		$result['notesid']= $noteid;

		$result['pid']= $pid;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('patientspages/get_products',$result);

		$this->load->view('footer');

	}

	public function save_services_byprovide($notsid){

		 $sid =$this->input->post('sid');

		 $service_pay= $this->input->post('service_pay');

		 $pid =$this->input->post('pid');

		 $ssidarry=array();

		 $sssid=$this->input->post('subServiceId');

		 if($sssid){

		foreach($sssid as $val){

		 $ssid=explode("_",$val);  

		   array_push($ssidarry,$ssid[0]);

		}

		 }

		$ssidID=implode(",",$ssidarry);

		

				 $saveservice=array('patient_id'=>$pid,

							 'service_category_id' => $sid,

							 'ssid' => $ssidID,

							  'notes_id' =>$notsid,

							 'service_pay'=>$service_pay,

							  's_amount' => $this->input->post('service_amount'),

							  'created_at' =>date('Y-m-d'));

			 $this->db->insert('service_add',$saveservice); 

			 $id=$this->db->insert_id();

			 redirect(base_url().'patients/generic/'.$notsid.'/'.$this->input->post('pid'));

	}

	

		public function save_used_product($notsid){

		 

		 $produnct= $this->input->post('produnct_name');

		 $qty=$this->input->post('qty');

		 $produnctarray=explode("_",$produnct); 

		 $pid =$this->input->post('pid');

		 $product_id= $produnctarray[0];

		 $product_cost= $produnctarray[1];

		 $saveproduct=array('patient_id'=>$pid,

							 'product_id' => $product_id,

							 'notes_id' =>$notsid,

							  'qty' =>$qty,

							  'p_amount' => $product_cost * $qty);

							

			 $this->db->insert('used_product',$saveproduct); 

			 $id=$this->db->insert_id();

			 redirect(base_url().'patients/generic/'.$notsid.'/'.$this->input->post('pid'));

	}

	

	

	public function genericServices(){

	   $sid =$this->input->post('sid');

	   $service_pay= $this->input->post('service_pay');

	   $pid =$this->input->post('pid');

	   $p_notes_id =$this->input->post('p_notes_id');

	   $prov_id =$this->input->post('prov_id');

	   $productArray=$this->input->post('product');

	   $pqntyArray=$this->input->post('pqty');

	   $ssidarry=array();

	   $sssid=$this->input->post('subServiceId');

	  

		$ssidID=implode(",",$sssid);

		$i=0;

	   $productidarray=array();

	   $productID='';

	   $pqtyID='';

	   if(!empty($productArray)){

		 foreach($productArray as $product_id){

		 

		   

			 array_push($productidarray,$product_id);

			 $productdata=$this->db->select('product_name,item_quantity')->from('inventory')->where('inventory_id',$product_id)->get()->row();

			 $invetyupdate=array('item_quantity'=>$productdata->item_quantity - $pqntyArray[$i]);

			$update= $this->db->where('inventory_id',$product_id)->update('inventory',$invetyupdate);

			$i++;

		 }

		 

		$productID=implode(",",$productidarray);

		 $pqtyID=implode(",",$pqntyArray);

	   }

	   //  print_r($sid);die;

		 $pataintdata=array('patient_notes_id'=>$p_notes_id,

							'sid' => implode(",",$sid),

							 'ssid' => $ssidID,

							'sqty' =>$this->input->post('sqty'),

							'service_pay'=>$service_pay,

							'commint' =>$this->input->post('commint'),

							'qty'=>$pqtyID?$pqtyID:$this->input->post('sqty'),

							'product_id' =>$productID?$productID:'',

							'bamount' => $this->input->post('bamount'),

							'damount' => $this->input->post('damount'),

							'tamount' => $this->input->post('namount'),

							'charge_by' =>$this->input->post('group_on'),

							'created_at' =>date('Y-m-d H:i:s'));

			   $noteinset= $this->db->insert('patient_notes1',$pataintdata); 

			   

		   if(isset($this->session->userdata['user_type'])=='provider' || isset($noteinset))

			{

				$data = array(

						// 'check_in' => time(),

					  'provide_check_out' =>  date("H:i:s")

					);

					// print_r($data);die;

				  $checkout= $this->db->where('id',$p_notes_id)->update('patient_notes',$data);

		

				redirect('ProviderDashboard');

			}

			

			else if(isset($this->session->userdata['user_type'])=='super admin')

			{

				redirect('patients/allpatients');

			}

		

		 

	}

	 

	 public function getsubsuservices(){

		 

			$sid=$this->input->post('sid');

			$subservic= $this->ServiceModel->getallsubservices($sid);

			$output='';

		if(!empty($subservic)){

			$output .= '<div class="col-sm-12">

			<div class="radio CourseMenu"> <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Sub Service Name</b></label>  

			';

			foreach($subservic as $subservice){

			$output .='<input type="checkbox" class="check-plus" id="subservice_'.$subservice->ssid.'" name="subServiceId[]"  class="more_s" onclick="chkcontrol('.$subservice->sub_service_charge.','.$subservice->ssid.','.$subservice->service_pay.')" value="'.$subservice->ssid.'_'.$subservice->sub_service_charge.'_'.$subservice->service_pay.'" style="width: 15px;height: 15px;">

			<label for="gridRadios5" style="padding-right: 10px; font-size:15px;">

			   '.$subservice->sub_service_name.'

			</label>';

			}

			$output .='</div>

			</div>';

		}

		 echo $output;

		}

		 

	 

	public function getproduct(){

		

	   $sid = $this->input->post('sid');

	   $productsdata = $this->ServiceModel->getallproducts();

	   $html='';

		$html .='<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">

<select class="form-control selUser" data-live-search="true" name="product[]" onchange="selectProduct(this)">

<option value="">Select product</option>';

 foreach($productsdata as $productsdatas){

  

 $html .='<option value="<?=$productsdatas->inventory_id?>_<?=$productsdatas->current_sell_cost ?>" ><?=$productsdatas->product_name ;?></option>';

 

 } 

	$html .='</select>

	</td><td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="pqty[]" id="Cheek_t1" class="form-control Cheek_t" onchange="Amount_cal(this)" placeholder="Enter Qty" ></td>';

  

		echo $html;

	}

	 public function delete_addservice($id){

		 $this->db->where('id',$id);

		 $this->db->delete('service_add');

		 redirect($_SERVER["HTTP_REFERER"]);

	 }

	 public function delete_addproduct($id){

		 $this->db->where('id',$id);

		 $this->db->delete('used_product');

		 redirect($_SERVER["HTTP_REFERER"]);

	 }

	  public function delete_sesspackage($id){

		 $this->db->where('id',$id);

		 $this->db->delete('wallet');

		 redirect($_SERVER["HTTP_REFERER"]);

	 }

	 public function useservices(){
		$session_use=$this->input->post("session_use");
		$service_id=$this->input->post("service_id");
		$transaction_id=$this->input->post("transaction_id");
		$used_money_value=$this->input->post("used_money_value");

		$session_use_arr=array();
		$service_id_arr=array();
		$transaction_id_arr=array();
		$used_money_value_arr=array();
		foreach($session_use as $key=>$value)
		{
			if($value!=null && $value!=0)
			{
				array_push($session_use_arr,$value);
				array_push($service_id_arr,$service_id[$key]);
				array_push($transaction_id_arr,$transaction_id[$key]);
				array_push($used_money_value_arr,$used_money_value[$key]);
			}
		}

		
		// print_r($used_money_value_arr); die();
		$url=$this->input->post("url");

		if(isset($_SESSION['service_use']))
		{
			
				unset($_SESSION['service_use']);

				$data=array(
					'service_id'=>$service_id_arr,
					'session_use'=>$session_use_arr,
					'transaction_id'=>$transaction_id_arr,
					'used_money_value'=>$used_money_value_arr,
				);
				$_SESSION['service_use']=$data;
				redirect($_SERVER["HTTP_REFERER"]);
		}
		else{

			$data=array(
				'service_id'=>$service_id_arr,
				'session_use'=>$session_use_arr,
				'transaction_id'=>$transaction_id_arr,
				'used_money_value'=>$used_money_value_arr,
			);
			$_SESSION['service_use']=$data;
			redirect($_SERVER["HTTP_REFERER"]);
		}
		
	 }


	 public function usePackages(){
		$session_use=$this->input->post("session_use");
		$service_id=$this->input->post("service_id");
		$transaction_id=$this->input->post("transaction_id");
		$used_money_value=$this->input->post("used_money_value");

		$session_use_arr=array();
		$service_id_arr=array();
		$transaction_id_arr=array();
		$used_money_value_arr=array();
		foreach($session_use as $key=>$value)
		{
			if($value!=null && $value!=0)
			{
				array_push($session_use_arr,$value);
				array_push($service_id_arr,$service_id[$key]);
				array_push($transaction_id_arr,$transaction_id[$key]);
				array_push($used_money_value_arr,$used_money_value[$key]);
			}
		}

		
		// print_r($used_money_value_arr); die();
		$url=$this->input->post("url");

		if(isset($_SESSION['service_use']))
		{
			
				unset($_SESSION['service_use']);

				$data=array(
					'service_id'=>$service_id_arr,
					'session_use'=>$session_use_arr,
					'transaction_id'=>$transaction_id_arr,
					'used_money_value'=>$used_money_value_arr,
				);
				$_SESSION['service_use']=$data;
				redirect($_SERVER["HTTP_REFERER"]);
		}
		else{

			$data=array(
				'service_id'=>$service_id_arr,
				'session_use'=>$session_use_arr,
				'transaction_id'=>$transaction_id_arr,
				'used_money_value'=>$used_money_value_arr,
			);
			$_SESSION['service_use']=$data;
			redirect($_SERVER["HTTP_REFERER"]);
		}
		
	 }
public function getProduct_details(){
	$id=$this->input->post('id');
	$data = $this->ProductModel->getProductById($id);
	echo json_encode($data);
}
public function calculation(){
	$id=$this->input->post('id');
	$data = $this->ServiceModel->servicebyid($id);
	echo json_encode($data);
}
	 public function caculation_of_patient_note(){
		$prid=$this->input->post('prid');
		// For Walllet Service Use product
		$wallet_service_id=$this->input->post('wallet_service_id');
		$wallet_service_product_use_id=$this->input->post('wallet_service_product_use_id');
		$wallet_service_product_qty_use=$this->input->post('wallet_service_product_qty_use');

		// For Service Sale Product
		$service_sale=$this->input->post('service_sale');
		$service_session_qty_use=$this->input->post('service_session_qty_use');
		$service_sale_product_id=$this->input->post('service_sale_product_id');
		$service_sale_product_qty=$this->input->post('service_sale_product_qty');

		// Extra Product Sale Without Service
		$extra_sale_product_id=$this->input->post('extra_sale_product_id');
		$extra_sale_product_qty=$this->input->post('extra_sale_product_qty');
		$extra_sale_product_price=$this->input->post('extra_sale_product_price');
		$extra_sale_product_amount=$this->input->post('extra_sale_product_amount');

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
		 else{
			$image = NULL;
		 }
		 
		$description=$this->input->post('description');
		$bill_amount=$this->input->post('bill_amount');
		$discount_amount=$this->input->post('discount_amount');
		$rate_of_tex=$this->input->post('rate_of_tex');
		$new_paybale_amount=$this->input->post('new_paybale_amount');
		$status=$this->input->post('status');
		$created_at=$this->input->post('created_at');
		$patient_notes_id=$this->input->post('patient_notes_id');

		$patient_note = array(
			'create_invoice'=>$new_paybale_amount,
		);

		$patient_invoice_create=$this->PatientModel->update_data('patient_notes',$patient_note,$patient_notes_id);

		$invoicedata = array(
			'servie_id'=>json_encode($service_sale),
			'product_id_used_in_service'=>json_encode($service_sale_product_id),
			'product_id'=>json_encode($extra_sale_product_id),
			'product_qty'=>json_encode($extra_sale_product_qty),
			'description'=>$description,
			'bill_amount'=>$bill_amount,
			'discount_amount'=>$discount_amount,
			'new_paybale_amount'=>$new_paybale_amount,
			'status'=>$status,
			'created_at'=>date('Y-m-d H:i:s'),
			'patient_id'=>$prid,
			'image'=>$image,
			'wallet_service_id' =>json_encode($wallet_service_id),
			'wallet_service_product_use_id'=>json_encode($wallet_service_product_use_id),
			'wallet_service_product_qty_use'=>json_encode($wallet_service_product_qty_use),
			'service_session_qty_use'=>json_encode($service_session_qty_use),
			'wallet_service_session_qty_use'=>json_encode($_SESSION['service_use']['session_use']),
		);
		$invoiceResult = $this->InvoiceModel->saveinvoicedata($invoicedata);
			
				// print_r($invoicedata); die();

				$service_use_transaction_id='SERUSE-'.date('M-d-Y');
				if(!empty($_SESSION['service_use']))
				{
						foreach($_SESSION['service_use']['session_use'] as $key=>$value)
						{
							// Inserting  update money value
							$moneyvalueresult=$this->WalletModel->moneyvalueByTransactionId($_SESSION['service_use']['transaction_id'][$key],'moneyvalue');
							$remainingvalue=($moneyvalueresult[0]->money_value)-($_SESSION['service_use']['used_money_value'][$key]);
							if($remainingvalue<=0)
							{
								$status=0;
							}
							else{
								$status=1;
							}
							$moneyvaluedata=array(
								'money_value'=>$remainingvalue,
								'transaction_id'=>$_SESSION['service_use']['transaction_id'][$key],
								'use_transaction_id'=>$service_use_transaction_id,
								'status'=>$status,
							);
							// print_r($moneyvaluedata); die();
							$this->MasterModel->insert('moneyvalue',$moneyvaluedata);

							// Inserting  update money value END

							// Session value shoud be not equal 0
							if($value!=0)
							{
								$this->db->select_sum('service_session_qty_in', 'total_qty_in');
								$this->db->select_sum('service_session_qty_out', 'total_qty_out');
								$this->db->where('service_id', $_SESSION['service_use']['service_id'][$key]);
								$this->db->where('transaction_id',$_SESSION['service_use']['transaction_id'][$key]);
								
								$data = $this->db->get('transaction_service_wallet');
								$totalqty = $data->result();

								$balance_session=($totalqty[0]->total_qty_in)-($totalqty[0]->total_qty_out)-($_SESSION['service_use']['session_use'][$key]);
								$data=array(
									'service_id'=>$_SESSION['service_use']['service_id'][$key],
									'transaction_id'=>$_SESSION['service_use']['transaction_id'][$key],
									'service_session_qty_out'=>$value,
									'session_use_trn_id'=>$service_use_transaction_id,
									'services_used_by'=>$this->session->userdata('id'),
									'patient_id'=>$prid,
									'balance_session'=>$balance_session,
								);
								$serviceresult=$this->WalletModel->service_take_out($data,'transaction_service_wallet');
							}
						}
						//  after loop conpleted session is unset
						unset($_SESSION['service_use']);
					}
						//  after loop conpleted session is unset

						
					
						$this->session->set_flashdata('success', ' <div class="alert alert-success text-center msg">Service are used Successfully</div>'); 
						redirect('ProviderDashboard');
					
				
		
		// redirect($_SERVER["HTTP_REFERER"]);
	 }

}

?>