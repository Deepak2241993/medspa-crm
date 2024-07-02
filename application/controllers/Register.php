<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('PatientModel');
		$this->load->model('ServiceModel');
		$this->load->model('InventoryModel');
		$this->load->model('InvoiceModel');
		
		$this->load->library('Mymail');
		$this->load->library('SMTP');
				//session
		// $this->load->library('session');
		date_default_timezone_set('Asia/Kolkata');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}
	}


	
		public function patient_register()
	{
	   // echo "okvinay";die;
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/patient_register');
		$this->load->view('footer');
	}
	
		public function save_patient_registration()
	{


// 		echo "vinay";die;
		if($this->input->post('submit_data'))
		{
		    
		    $email = $this->input->post('email');
		    $pname= $this->input->post('pname');
		  //  echo $email;die;
			$this->form_validation->set_rules('pname','patient name','trim|required');
			$this->form_validation->set_rules('phone','phone number','trim|required');
			$this->form_validation->set_rules('email','email','trim|required');
// 			$this->form_validation->set_rules('password','password','trim|required');
// 			$this->form_validation->set_rules('allergy','allergy','trim');
// 			$this->form_validation->set_rules('pmh','patient name','trim');
// 			$this->form_validation->set_rules('psh','patient name','trim');
// 			$this->form_validation->set_rules('sourcefrom','source of contact','trim|required');
// 			$this->form_validation->set_rules('comment','comment','trim');
			if($this->form_validation->run() == TRUE)
			{
			    
			    $otp = rand(100000, 999999);
				// echo $otp;
				 $password = md5($otp);
				//   echo $password; 
			$data = array(
				'pname' => $this->input->post('pname'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'password' => $password,
				// 'gender' => $this->input->post('gender'),
				// 'age' => $this->input->post('age'),
				// 'allergy' => $this->input->post('allergy'),
				// 'pmh' => $this->input->post('pmh'),
				// 'psh' => $this->input->post('psh'),
				// 'prefer_method' => $this->input->post('perferfrom'),
				// 'contact_source' => $this->input->post('sourcefrom'),
				// 'comment' => $this->input->post('comment'),
				'user_type' => 'patient',
				);
// 			print_r($data);die;
			if($this->PatientModel->savepatientdata($data))
			{
			    
			     $body = "Dear ".$pname.",
                            <p>Thank you for choosing Forever MedSpa.</p>
                            <p>Your Id is: ".$email." .</p>
                            <p>Your password is: ".$otp." .</p>";
                            $mailArray["To"]        = $email;
                            $mailArray["Body"]      = $body;
                            $subject = 'Welcome to Forever MedSpa';
                            $this->load->library('Mymail');
                            $status = $this->mymail->send_mail($subject, $email, $body);
			    
			   $this->session->set_flashdata('msg', ' <div class="alert alert-success text-center msg"> Sign UP Successfully Saved.</div>'); 
				//echo "saved Success";
				redirect('FrontDashboard');
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
	
	

	
	
	
public function saveprovider()
	{

		
		if($this->input->post('submit_data'))
		{
		  //  echo "okvvvv";die;
		    
		    $email = $this->input->post('email');
		    $name= $this->input->post('name');
			$this->form_validation->set_rules('pname','patient name','trim|required');
			$this->form_validation->set_rules('phone','phone number','trim|required');
			$this->form_validation->set_rules('email','email','trim|required');
// 			if($this->form_validation->run() == TRUE)
// 			{
			    
			    $otp = rand(100000, 999999);
				// echo $otp;die;
				 $password = md5($otp);
				//  echo $password; die;
			$data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'view_password' => $otp,
				'password'=>$password,
				'user_type' => 'provider',
				);
// 			print_r($data);die;
			if($this->PatientModel->saveprovider($data))
			{
			    
			      $body = "Dear ".$name.",
			               
					<p>Thank you for choosing Forever MedSpa.</p>
					<p> Your id is :".$email.".</p>
					<p>Your password is: ".$otp." .</p>";
					$mailArray["To"]        = $email;
					$mailArray["Body"]      = $body;
					$subject = 'Welcome to Forever MedSpa';
					$this->load->library('Mymail');
					$status = $this->mymail->send_mail($subject, $email, $body);
			    
			   $this->session->set_flashdata('success','Provider Added Sucessfully');	
			   redirect(base_url().'providers');
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
// 			}

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
	   
// 		if(isset($this->session->userdata['admin'])){
//         $userid = $this->session->userdata['admin']['id'];         
//       }
      //$current_date=date();
       $current_date = date('d-m-Y');
      //$current_date = new DateTime(date('Y-m-d H:i:s'), new DateTimeZone('Asia/Calcutta'));
      //echo $date->date;
		$p_visit_id=$this->PatientModel->last_record($id,'temp_visit');
		$p_visit   =$this->PatientModel->get_visit_list_u($id,$current_date);
     //print_r($p_visit);die;
	   $tmpArray = array();
       foreach ($p_visit as $value) 
       {      
            array_push($tmpArray,$value['vid']);
        }

		//echo'<pre>';print_r($tmpArray);die;
		$patid  = array('id' => $id,'p_visit_id'=>$tmpArray);
		//$p_visit_id=$this->PatientModel->last_record($id,'temp_visit');
		//echo'<pre>';print_r($p_visit_id);die;
		//$patid  = array('id' => $id,'p_visit_id'=>$p_visit_id->id);

		$sdata = $this->ServiceModel->getallservices();
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/service',compact('patid','sdata'));
		$this->load->view('footer');
	}
	
/******* For open services list on patients assign *****************/
   
   public function patient_visit_maps(){

   }
	public function serviceOnPatient($pid,$sid)
	{   
	    $vid=$this->input->get('vid', TRUE);
	    // print_r($vid);die;
	    // print_r($sid);die;
        
		switch($sid)

		{
			case 1:redirect(base_url().'patients/neurotoxin/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 2:redirect(base_url().'patients/fillerservice/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 3:redirect(base_url().'patients/miradry/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 4:redirect(base_url().'patients/rfal/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 5:redirect(base_url().'patients/rfservice/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 6:redirect(base_url().'patients/rfmn/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 7:redirect(base_url().'patients/lasertreatment/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 8:redirect(base_url().'patients/coolsculpting/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 9:redirect(base_url().'patients/contoura/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 10:redirect(base_url().'patients/threadlifts/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 12:redirect(base_url().'patients/sculptra_butt/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 13:redirect(base_url().'patients/sculptra_face/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 14:redirect(base_url().'patients/vi_peel/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 15:redirect(base_url().'patients/asthetic_service/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
			case 16:redirect(base_url().'patients/tattoo_service/'.$pid.'/'.$sid.'?vid='.$vid);
				break;
		}
	}
	public function neurotoxin($pid,$sid)
	{
			$allservices = $this->ServiceModel->getallservices();
			//filter service and sub service 
			$sdata = $this->ServiceModel->getparticularser($sid);
			$ssdata = $this->ServiceModel->getallsubservices($sid);
			//echo'<pre>';print_r($ssdata);die;
			$pdata = $this->PatientModel->getparticularpatients($pid);
			// particular service on patient
			$ntxpatdata = $this->ServiceModel->ntxserpatient($pid);
			
			$this->load->view('header');
			$this->load->view('sidenavbar');
			$this->load->view('patientspages/neurotoxin_form',compact('pdata','sdata','ssdata','ntxpatdata','allservices'));
			$this->load->view('footer');
	}



	public function fillerservice($pid,$sid) 
	{      
			$allservices = $this->ServiceModel->getallservices(); 
			$sdata = $this->ServiceModel->getparticularser($sid);
			$ssdata = $this->ServiceModel->getallsubservices($sid);
			$product_inv = $this->ServiceModel->get_product_inv($sid);
			//echo'<pre>';print_r($get_product_inv);die;
			$pdata = $this->PatientModel->getparticularpatients($pid);
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



	public function miradry($pid,$sid)
	{
		// echo "ok";die;
			$allservices = $this->ServiceModel->getallservices(); 
			$sdata = $this->ServiceModel->getparticularser($sid);
			$ssdata = $this->ServiceModel->getallsubservices($sid);
			$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/miradry_form',compact('allservices','sdata','pdata'));
		$this->load->view('footer');
	}

	public function rfal($pid,$sid)
	{
		// echo"ok";die;
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/rfal_form',compact('allservices','sdata','pdata','ssdata'));
		$this->load->view('footer');
	}

	public function tattoo_service1($pid,$sid)
	{

		echo"ok";die;
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/tattoo_service_form',compact('allservices','sdata','pdata','ssdata'));
		$this->load->view('footer');
	}

	public function rfservice($pid,$sid)
	{
		// echo"ok111";die;
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/rfservice_form',compact('allservices','sdata','pdata','ssdata'));
		$this->load->view('footer');
	}

	public function rfmn($pid,$sid)
	{
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
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


	public function saverfal()
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
print_r($datanurotoxin);die;
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
	  if(isset($this->session->userdata['admin']))
	  {
        //$userid = $this->session->userdata['admin']['id'];
        $userid = $this->input->post('pcid');
		$nurotoxis = $this->input->post('nurotoxis');
		$visit_id=$this->input->post('p_visit');
		// echo $nurotoxis;die;
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
			'qty'  =>$this->input->post('qty'),
			'damount' => $this->input->post('damount'),
			'promo' => $this->input->post('promo'),
			'comments' => $this->input->post('comments'),
			'p_visit_id' => $visit_id,
			'admin_id' => $userid
		);
		//neurotoxin data update
		$updatenuro = $this->PatientModel->saveneurotoxin($datanurotoxin);
		$qty=$forehead+$glabella+$crfeet+$eyebro+$bunnyline+$upperlip+$lowerlip+$depressor+$dao+$mentalis+$masseter;
    	$pataint_note_nurotoxic = array(
			'ssid' => $this->input->post('ssid'),
			'sid' => '1',
			'pid' => $this->input->post('pid'),
			'bamount' => $this->input->post('bamount'),
			'tamount' => $this->input->post('namount'),
			'qty'  =>$qty,
			'damount' => $this->input->post('damount'),
			'commint' => $this->input->post('comments'),
			'p_visit_id' => $visit_id,
		);
    	//visit data update
		// print_r($updatenuro);
		
		if($updatenuro)
		{
        //inventory data update
        $qty1=$forehead+$glabella+$crfeet+$eyebro+$bunnyline+$upperlip+$lowerlip+$depressor+$dao+$mentalis+$masseter;
    	$update_inv = $this->InventoryModel->update_inventry_service_product($this->input->post('sid'),$this->input->post('product_name'),$qty1);
    	$nuro_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_nurotoxic);
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
			if(isset($product) && !empty($product))
			{
			$i=0;
			foreach ($product as $value) 
			{
				
			if(!empty($value))
			{
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
				
				$fillerdata=array('pid'=>$pid,'sid'=>$sid,'p_visit_id'=>$visit_id,'product'=>$product,'applied_side'=>$applied_side,'filler_type'=>$filler_type,'bamount'=>$bamount,'qty'=>$amt,'tamount'=>$namount,'type'=>$type,'cannula'=>$cannula,'needle'=>$needle);
				
            	
				$insertdb = $this->InventoryModel->insert('filler_services', $fillerdata);
				// print_r($insertdb);die;
				
		       $pataint_note_filler = array(
		                'sid' => '2',
            			'pid' => $pid,
            			'bamount' => $bamount,
            			'tamount' => $namount,
            			'qty'  =>$amt,
            			'ssid'  =>$ssid,
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
            		$filler_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_filler);
				
				$this->InventoryModel->update_inventry_service_product($sid,$product,$amt);
				
			}
				  
						
			$i++;
		
			}
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
		// print_r($miradry);die;
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
			);
			// print_r($datamiradry);die;
			//neurotoxin data update
			//$updatenuro = $this->PatientModel->saveneurotoxin($datanurotoxin);
			$miradryInsert = $this->PatientModel->insertData('miradry_services_data',$datamiradry);

			$pataint_note_miradry = array(
		                'sid' => '3',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
			// print_r($pataint_note_miradry);die;
             $miradry_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_miradry);
             // print_r($miradry_p_note);die;
			// if($updatenuro){
			// //inventory data update
			// $update_inv = $this->InventoryModel->update_inventry_service_product($this->input->post('sid'),$this->input->post('product_name'),$qty);
			// }
		// 	print_r($miradryInsert);
		//    exit();
			// if($miradryInsert){
							
			// 	$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">'.$this->input->post('sid_name').' Service Successfully Save.</div>');
			// 	redirect('patients/service/'.$this->input->post('pid'));//sid_name

			// 	} 
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
			);
			
			$rfInsert = $this->PatientModel->insertData('rf_services_data',$datarf);
				$pataint_note_rf = array(
		                'sid' => '4',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rf_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_rf);
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
				
			);
			
			// print_r($datarfal);die;
			$rfmnInsert = $this->PatientModel->insertData('rfal_services_data',$datarfal);
			// print_r($rfmnInsert);die;
			// echo $rfmnInsert;die;
			$pataint_note_rfal = array(
		                'sid' => '5',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
			// print_r($pataint_note_rfal);die;
             $rfal_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_rfal);
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
			);
			
			$rfmnInsert = $this->PatientModel->insertData('rfmn_services_data',$datarfmn);
			$pataint_note_rfmn = array(
		                'sid' => '5',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_rfmn);
		}
		$leaser_treat = $this->input->post('laser-treatment');
		// print_r($leaser_treat);die;
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
			);
			
			$laserInsert = $this->PatientModel->insertData('leaser_treat_services_data',$datalaser);
			$pataint_note_laser = array(
		                'sid' => '7',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_laser);
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
			);
			
			$CoolsculptingerInsert = $this->PatientModel->insertData('coolsculpting_services_data',$dataCoolsculpting);
			$pataint_note_oolsculpting = array(
		                'sid' => '8',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_oolsculpting);
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
			);
			
			$contouraInsert = $this->PatientModel->insertData('contoura_services_data',$datacontoura);
			$pataint_note_contoura = array(
		                'sid' => '9',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_contoura); 
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
			);
			
			$thread_lifts_insert = $this->PatientModel->insertData('thread_lifts_services_data',$datathread);
			$pataint_note_thread_lifts = array(
		                'sid' => '10',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_thread_lifts); 
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
			);

			// print_r($dataSculptra_Butt);die;
			
			$Sculptra_Butt_insert = $this->PatientModel->insertData('sculptra_butt_services_data',$dataSculptra_Butt);
			$pataint_note_Sculptra_Butt = array(
		                'sid' => '12',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_Sculptra_Butt);
		}


		$Sculptra_face = $this->input->post('sculptra-face');
		// echo "ok";die;
		// print_r($Sculptra_face);die;


        if($Sculptra_face)
        {
        	// echo"ok1";die;
			//echo'<pre>';print_r($this->input->post());die;
			//$visit_id=$this->input->post('p_visit');
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
			);
			
			$Sculptra_face_insert = $this->PatientModel->insertData('sculptra_face_services_data',$dataSculptra_face);
			$pataint_note_Sculptra_face = array(
		                'sid' => '13',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_Sculptra_face); 
		}
		$asthetic = $this->input->post('Asthetic-Services');
		// print_r($asthetic);die;
        if($asthetic)
        {
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
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_asthetic);  
		}
		$vi_pool = $this->input->post('Vi-Peel');
		// print_r($vi_pool);die;
        if($vi_pool)
        {
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
			);
			
			$vi_pool_insert = $this->PatientModel->insertData('vi_peel_services_data',$data_vi_pool);
			$pataint_note_vi_pool = array(
		                'sid' => '15',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_vi_pool); 
		}
		$tatoo = $this->input->post('tattoo_service');
		// echo "ok";die;
		// print_r($tatoo);die;
        // if($tatoo)
        // {



        	if($tatoo)
        {
        // 	echo "ok111";die;
			//echo'<pre>';print_r($this->input->post());die;
			
			$product=$this->input->post('product');
			
			//$visit_id=$this->input->post('p_visit');
			if(isset($product) && !empty($product))
			{
			$i=0;
			foreach ($product as $value) 
			{
				
			if(!empty($value))
			{
			
			
				$sid = $this->input->post('ssid');
				$pid = $this->input->post('pid');
				$size = $this->input->post('tatoo_size');
				$area = $this->input->post('tatoo_area');
				$type = $this->input->post('tattoo_type');
				$color = implode(",",$this->input->post('tattoo_color'));
				$skin_type = $this->input->post('tattoo_skin_type');
				$treat_no = $this->input->post('tattoo_treat_no');
				$patch = $this->input->post('patch');
				$perform_area1  =$this->input->post('tattoo_perform_area1');
				$passage_1_1 = $this->input->post('tattoo_passage_1_1');
				$passage_1_2 = $this->input->post('tattoo_passage_1_2');
				$passage_1_3  =$this->input->post('tattoo_passage_1_3');
				$passage_1_4 = $this->input->post('tattoo_passage_1_4');
				$passage_2_1 = $this->input->post('tattoo_passage_2_1');
				$passage_2_2 = $this->input->post('tattoo_passage_2_2');
				$passage_2_3 = $this->input->post('tattoo_passage_2_3');
				$passage_2_4 = $this->input->post('tattoo_passage_2_4');
				$damount = $this->input->post('damount');
				$tamount = $this->input->post('namount');
				$promo = $this->input->post('promo');
				$comments = $this->input->post('comments');
				$p_visit_id = $visit_id;
			
// 			print_r($data_tatoo);die;


$tatoo_insert=array('pid'=>$pid,'ssid'=>$sid,'tatoo_size'=>$size,
'tatoo_area'=>$area,'tattoo_type'=>$type,'tattoo_color'=>$color,
'tattoo_skin_type'=>$skin_type,'tattoo_treat_no'=>$treat_no,'patch'=>$patch,'tattoo_perform_area1'=>$perform_area1,
'tattoo_passage_1_1'=>$passage_1_1,'tattoo_passage_1_2'=>$passage_1_2,'tattoo_passage_1_3'=>$passage_1_3,'tattoo_passage_1_4'=>$passage_1_4,'tattoo_passage_2_1'=>$passage_2_1, 'tattoo_passage_2_2'=>$passage_2_2,'tattoo_passage_2_3'=>$passage_2_3, 'tattoo_passage_2_4'=>$passage_2_4,'damount'=>$damount, 'namount'=>$namount,'promo'=>$promo, 'comments'=>$comments,'p_visit_id'=>$p_visit_id);



			
			
			// $tatoo_insert = $this->PatientModel->insertData('tatoo_services_data',$data_tatoo);
			// print_r($tatoo_insert);die;
			$pataint_note_tatoo = array(
		                'sid' => '16',
            			'pid' => $this->input->post('pid'),
            			'bamount' => $this->input->post('bamount'),
            			'tamount' => $this->input->post('namount'),
            			'qty'  =>'1',
            			'damount' => $this->input->post('damount'),
            			'commint' => $this->input->post('comments'),
            			'p_visit_id' => $visit_id,
            		);
             $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_tatoo); 
             $this->InventoryModel->update_inventry_service_product($sid,$product,$amt);
		}
		$i++;
			}
		
			}
			$date = date('Y-m-d H:i:s');
			   $pdata= array('vid' => $visit_id,'user_id' => $userid,'created_at' =>$date );
			   
        }
        	// echo "ok";die;
			//echo'<pre>';print_r($this->input->post());die;
			
			// $data_tatoo = array(
			// 	'sid' => $this->input->post('ssid'),
			// 	'pid' => $this->input->post('pid'),
			// 	'size' => $this->input->post('tatoo_size'),
			// 	'area' => $this->input->post('tatoo_area'),
			// 	'type' => $this->input->post('tattoo_type'),

			// 	'color' => implode(",",$this->input->post('tattoo_color')),
			// 	'skin_type' => $this->input->post('tattoo_skin_type'),
			// 	'treat_no' => $this->input->post('tattoo_treat_no'),
			// 	'patch' => $this->input->post('patch'),
			// 	'perform_area1'  =>$this->input->post('tattoo_perform_area1'),
			// 	'passage_1_1' => $this->input->post('tattoo_passage_1_1'),
			// 	'passage_1_2' => $this->input->post('tattoo_passage_1_2'),
			// 	'passage_1_3'  =>$this->input->post('tattoo_passage_1_3'),
			// 	'passage_1_4' => $this->input->post('tattoo_passage_1_4'),
			// 	'passage_2_1' => $this->input->post('tattoo_passage_2_1'),
			// 	'passage_2_2' => $this->input->post('tattoo_passage_2_2'),
			// 	'passage_2_3'  =>$this->input->post('tattoo_passage_2_3'),
			// 	'passage_2_4' => $this->input->post('tattoo_passage_2_4'),
			// 	'damount' => $this->input->post('damount'),
			// 	'tamount' => $this->input->post('namount'),
			// 	'promo' => $this->input->post('promo'),
			// 	'comments' => $this->input->post('comments'),
			// 	'p_visit_id' => $visit_id
			// );
			// // print_r($data_tatoo);die;
			// $tatoo_insert = $this->PatientModel->insertData('tatoo_services_data',$data_tatoo);
			// // print_r($tatoo_insert);die;
			// $pataint_note_tatoo = array(
		 //                'sid' => '16',
   //          			'pid' => $this->input->post('pid'),
   //          			'bamount' => $this->input->post('bamount'),
   //          			'tamount' => $this->input->post('namount'),
   //          			'qty'  =>'1',
   //          			'damount' => $this->input->post('damount'),
   //          			'commint' => $this->input->post('comments'),
   //          			'p_visit_id' => $visit_id,
   //          		);
   //           $rfmn_p_note = $this->PatientModel->insertData('patient_notes',$pataint_note_tatoo); 
		// }
		if(!empty($updatenuro)||!empty($fillerdata)||!empty($miradryInsert)||!empty($rfInsert)||!empty($rfmnInsert)||!empty($laserInsert)||!empty($CoolsculptingerInsert)||!empty($contouraInsert)||!empty($thread_lifts_insert)||!empty($Sculptra_Butt_insert)||!empty($Sculptra_face_insert)||!empty($asthetic_insert)||!empty($vi_pool_insert)||!empty($tatoo_insert))
		{
			//patient data 
			$date = date('Y-m-d H:i:s');
			$pdata= array('vid' => $visit_id,'user_id' => $userid,'created_at' =>$date );
			$p_insertId = $this->PatientModel->insertData('patient_visit',$pdata);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Your assined service successfully saved !</div>');
			redirect('patients/service/'.$this->input->post('pid'));//sid_name
		}
		
		//visit data update
		//$this->PatientModel->save_pvisit($pdata);
	}else
		{   
			redirect('patients/allpatients');
		}
	}
	public function ntxnpatientlist()
	{
		$data = $this->PatientModel->getallntpatient();
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/neurotoxinlist',compact('data'));
		$this->load->view('footer');
	}

	public function lasertreatment($pid,$sid)
	{
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/lasertreatment_form',compact('allservices','sdata','pdata'));
		$this->load->view('footer');
	}

	public function coolsculpting($pid,$sid)
	{
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		//$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/Coolsculpting_form',compact('allservices','sdata','pdata'));
		$this->load->view('footer');
	}

	public function contoura($pid,$sid)
	{
		// echo "ok";die;
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		// print_r($sdata);die;
		$ssdata = $this->ServiceModel->getallsubservices($sid);
		// print_r($ssdata);die;
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/contoura_form',compact('allservices','sdata','pdata','ssdata'));
		$this->load->view('footer');
	}

	public function threadlifts($pid,$sid)
	{
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		//$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/threadlifts_form',compact('allservices','sdata','pdata'));
		$this->load->view('footer');
	}

	public function sculptra_face($pid,$sid)
	{

		// echo "ok";die;
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		//$ssdata = $this->ServiceModel->getallsubservices($sid);
		// print_r($sdata);die;
		$pdata = $this->PatientModel->getparticularpatients($pid);
		// print_r($pdata);die;
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/sculptraface_form',compact('allservices','sdata','pdata'));
		$this->load->view('footer');
	}
	public function sculptra_butt($pid,$sid)
	{
		// echo"ok";die;
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		// print_r($sdata);die;
		//$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		// print_r($pdata);die;
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/sculptrabutt_form',compact('allservices','sdata','pdata'));
		$this->load->view('footer');
	}

	public function vi_peel($pid,$sid)
	{
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		//$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/vi_peel_form',compact('allservices','sdata','pdata'));
		$this->load->view('footer');
	}

	public function asthetic_service($pid,$sid)
	{
		$allservices = $this->ServiceModel->getallservices(); 
		$sdata = $this->ServiceModel->getparticularser($sid);
		//$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/asthetic_service_form',compact('allservices','sdata','pdata'));
		$this->load->view('footer');
	}

	public function tattoo_service($pid,$sid)
	{

		// echo "ok";die;
		$allservices = $this->ServiceModel->getallservices(); 
		// print_r($allservices);die;
		$sdata = $this->ServiceModel->getparticularser($sid);

		// print_r($sdata);die;
		//$ssdata = $this->ServiceModel->getallsubservices($sid);
		$pdata = $this->PatientModel->getparticularpatients($pid);
		// print_r($pdata);die;
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('patientspages/tattoo_service_form',compact('allservices','sdata','pdata'));
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
					'pid'   => $this->input->post("pname"),
					'p_visit_id' => $visit_id,
					'sid'  => $this->input->post("ttype"),  
					'ssid'  => $this->input->post("ttypesub"),
					'commint'   => $this->input->post("comments"),
					'damount'  => $this->input->post("damount"),
					//'bamount'  => $this->input->post("bamount"),
					'tamount'  => $this->input->post("tamount"),
					'payment_status'   => $this->input->post("p_text2")
				);
       // echo'<pre>';print_r($insert_data);die;
    if(isset($_POST['patient_note_id']) && !empty($_POST['patient_note_id'])){
    $result = $this->InventoryModel->update('patient_notes',$insert_data,'id',$_POST['patient_note_id']);
    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Updated.</div>');
    }else{
      $insertdb = $this->PatientModel->insert_patients_notes($insert_data);  
      $this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Successfully Add.</div>');  	
    }
    redirect('patients/patient_note_list');
      // echo'<pre>';print_r($allservices);die;

	}


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
      // echo'<pre>'; print_r($result['invoices_list']);die;
        $result['money_walite_cost'] = $this->PatientModel->get_money_walite($id);
		
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
			echo'<pre>';print_r($this->input->post());die;
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
       $pdata= array('vid' => $visit_id,'user_id' => $userid,'created_at' =>$date );
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
	
}
?>