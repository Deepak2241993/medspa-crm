<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	
	
		public function del_data($table,$params = array()) {
		// echo $table; die;

		foreach ($params as $key => $value) {
			$this->db->where($key, $value);
			return $this->db->delete($table);

		    //echo $this->db->last_query();exit;
		}

		
	}
	
	public function saveassigndata($data)
	{
		return $this->db->insert('provider_assign_services',$data);
		
		
	}


//  All Function Use in Software

public function savepatientdata($data)
	{
		return $this->db->insert('patient_registration',$data);
	}

public function getpatientbyID($id)

  {
    //echo $id;die;
     $this->db->where('prid',$id);
    $data = $this->db->get('patient_registration');
    return $data->result();
    

  }

	public function getallpatients($search=null)
	{   
	    if(isset($search) && $search !=null){
        $data = $this->db->like('patient_registration.pname',$search['pname']);
		}
		$data = $this->db->get('patient_registration');
		return $data->result();
	}

    public function getallprovider()
	{   
		$data = $this->db
        ->where('department','Provider')
        ->get('employees');
		return $data->result();
	}


// For Day Resister Code
    public function today_patient_visit()
	{   
        $todayDate = date('Y-m-d');
        $query = $this->db
        ->select('patient_registration.pname as name, patient_registration.email, patient_registration.prid, patient_registration.phone, patient_registration.gender, patient_registration.age, appointment_data.*')
        ->from('patient_registration')
        ->join('appointment_data', 'appointment_data.patient_id = patient_registration.prid', 'left')
        ->order_by('appointment_data.app_date', 'desc')
        ->get();
      
    
        if ($query) {
            // Fetch the results
            $data = $query->result();
        } else {
            // Handle the error (e.g., log the error, show an error message, etc.)
            // You might want to return an empty array or null instead of false here
            $data = array(); // Or $data = null;
        }
        return $data;
	}

    public function dayregister_filter($received_data=null)
	{   
	    if(isset($received_data) && $received_data !=null){
            $data = $this->db->group_start()
            ->or_like('patient_registration.pname', $received_data)
            ->or_like('patient_registration.phone', $received_data)
            ->group_end()
            ->get('patient_registration')
            ->result_array();
		}
		return $data;
	}

//  For Day Register Code

	
	 public function getpatient($search)

  {
    // echo "vinaymodel";die;
     $this->db->where('phone',$search);
    $data = $this->db->get('patient_registration');
    return $data->result();
    

  }
  
  	 public function getapointmentdata($id)

  {
    // echo $id; die;
     $this->db->where('apid',$id);
    $data = $this->db->get('appointment_data');
    return $data->result();
    

  }
  

  
  	 public function getproviderbyID($id)

    {
    //echo $id;die;
     $this->db->where('id',$id);
    $data = $this->db->get('employees');
    // print_r($data); die();
    return $data->result();
    
    }

  
 
public function getserivces()

  {
    // echo "vinaymodel";die;
    //  $this->db->where('phone',$search);
    $this->db->order_by("id", "desc");
    $data = $this->db->get('services');
    return $data->result();
    

  }

  public function getserivcesCagegory()

  {
    $this->db->order_by("id", "asc");
    $data = $this->db->get('service_category');
    return $data->result();
    

  }
	
	

    
    public function getprovider($user_id)
	{
	   // echo"vinay";die;
	    $today = date("Y-m-d");
	   $this->db->select('patient_registration.pname');
            $this->db->select('provider_register.name');
            $this->db->select('service_category.name as serviceCategoryName');
            $this->db->select('patient_notes.*');
            $this->db->from('patient_notes');
            $this->db->join('patient_registration', 'patient_notes.pid = patient_registration.prid','left');
             $this->db->join('provider_register', 'patient_notes.provider_id = provider_register.id','left');
            $this->db->join('service_category', 'patient_notes.sid = service_category.id','left');
           
            $this->db->where('patient_notes.provider_id', $user_id);
            $this->db->where('patient_notes.check_in_date', $today);
            $this->db->order_by("id", 'ASC');

            $data = $this->db->get();
            
            //echo $this->db->last_query();die;
            return $data->result();
	}

   


// 	public function getparticularpatients($id)
// 	{
// 		$data = $this->db->select('pname')->from('patient_registration')->where('prid',$id)->get()->result();
// 		return $data;
// 	}

    public function getparticularpatients($id)
	{
		$data = $this->db->get_where('patient_registration',['prid'=>$id]);
		return $data->result_array();
	}
	public function saveneurotoxin($datanurotoxin)
	{
		return $this->db->insert('neurotoxin_services_data',$datanurotoxin);
	}
	
	public function save_pvisit($data)
	{
		return $this->db->insert('patient_visit',$data);
		
 		echo $this->db->last_query();exit;
	}
	
	public function getallntpatient()
	{
		$data = $this->db->get('neurotoxin_services_data');
		return $data->result();
	}

	public function insert_patients_notes($insert_data)
	{
		$this->db->insert('patient_notes',$insert_data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
// Appoinment Filter Start
public function getallappoinmentByDate($data=null,$id=null){
    
    $this->db->select('patient_registration.*,service_category.name as serviceCagegoryName, patient_notes.*, appointment_data.*, patient_notes.id, patient_notes.pid, services.service_name, employees.*');
    $this->db->from('appointment_data');
    $this->db->join('patient_registration', 'patient_registration.prid = appointment_data.patient_id', 'left');
    $this->db->join('patient_notes', 'patient_notes.appt_id = appointment_data.apid', 'left');

    $this->db->join('services', 'services.id = appointment_data.service_category_id', 'left');
    $this->db->join('service_category', 'service_category.id = appointment_data.service_category_id', 'left');
    $this->db->join('employees', 'employees.id = appointment_data.provider_id', 'left');
    $this->db->where('employees.department', 'Provider');
    
    // Uncomment the following lines if needed
    
    if (isset($data) && !empty($data['min'])) {
        $this->db->where('DATE(appointment_data.app_date) >=',$data['min']);
        $this->db->where('DATE(appointment_data.app_date) <=',$data['max']);
    }
    
    if (isset($id) && !empty($id)) {
        $this->db->where('patient_notes.appt_id', $id);
    }
    
    $this->db->order_by("appointment_data.apid", "DESC");
   
    
    // Uncomment the following line if needed
    // $this->db->where('invoice.id', $id);
    
    $query = $this->db->get();
    $querym = $query->result_array();
    return $querym;
}

// Appoinment Filter end
    public function getallpatient_notes_list($data=null,$id=null){
		    
        $today = date('Y-m-d');

        $this->db->select('patient_registration.*,service_category.name as serviceCagegoryName, patient_notes.*, appointment_data.*, patient_notes.id, patient_notes.pid, services.service_name, employees.*');
        $this->db->from('appointment_data');
        $this->db->join('patient_registration', 'patient_registration.prid = appointment_data.patient_id', 'left');
        $this->db->join('patient_notes', 'patient_notes.appt_id = appointment_data.apid', 'left');

        $this->db->join('services', 'services.id = appointment_data.service_category_id', 'left');
        $this->db->join('service_category', 'service_category.id = appointment_data.service_category_id', 'left');
        $this->db->join('employees', 'employees.id = appointment_data.provider_id', 'left');
        $this->db->where('employees.department', 'Provider');
        $this->db->where('appointment_data.app_date >=', $today);
        
        
        // Uncomment the following lines if needed
        if (isset($data) && !empty($data['min'])) {
            $this->db->where('DATE(patient_notes.created_at) >=', date('Y-m-d', strtotime($data['min'])));
            $this->db->where('DATE(patient_notes.created_at) <=', date('Y-m-d', strtotime($data['max'])));
        }
        
        if (isset($id) && !empty($id)) {
            $this->db->where('patient_notes.appt_id', $id);
        }
        
        $this->db->order_by("appointment_data.apid", "DESC");
       
        
        // Uncomment the following line if needed
        // $this->db->where('invoice.id', $id);
        
        $query = $this->db->get();
        $querym = $query->result_array();
        return $querym;
          // echo'<pre>';print_r($querym);die;
	}
	
	public function getallpatient_notes_list1($userid){
		    $userid =$this->session->userdata('pid');
		   
		    $this->db->select('patient_registration.pname');
		    $this->db->select('patient_notes.*');//
		    $this->db->select('services.service_name');
		    $this->db->select('sub_services.sub_service_name');
            $this->db->from('patient_notes');
            $this->db->join('patient_registration', 'patient_registration.prid = patient_notes.pid','left');
            $this->db->join('services', 'services.id = patient_notes.sid','left');
            $this->db->join('sub_services', 'sub_services.ssid = patient_notes.ssid','left');
            $this->db->where('patient_registration.prid', $userid);
            // $this->db->where('DATE(patient_notes.created_at) >="'. date('Y-m-d', strtotime($data['min'])).'"');
            // $this->db->where('DATE(patient_notes.created_at) <="'. date('Y-m-d', strtotime($data['max'])).'"');
            // $this->db->order_by('patient_notes.createdat', 'DESC');
            $query = $this->db->get();
        
           $querym= $query->result_array();
          return $querym;
           //echo'<pre>';print_r($querym);die;
	}
	
	
	
	
    public function getpatient_data($id)
	{
		$data = $this->db->get_where('patient_notes',['id'=>$id]);
		return $data->result_array();
	}

	
	public function patient_note_data_by_id($id){
	    	$this->db->select('patient_registration.pname');
		    $this->db->select('patient_notes.*');//
		    $this->db->select('services.service_name');
		    $this->db->select('sub_services.sub_service_name');
            $this->db->from('patient_notes');
            $this->db->join('patient_registration', 'patient_registration.prid = patient_notes.pid','left');
            $this->db->join('services', 'services.id = patient_notes.sid','left');
            $this->db->join('sub_services', 'sub_services.ssid = patient_notes.ssid','left');
            $this->db->where('patient_notes.id', $id);
            $query = $this->db->get();
        
           $querym= $query->result_array();
          return $querym;
	}

	public function current_date_patient_note_data_by_patient_id($pid,$current_date,$vid){
	    	$this->db->select('patient_registration.pname');
		    $this->db->select('patient_notes.*');//
		    $this->db->select('services.service_name');
		    $this->db->select('sub_services.sub_service_name');
            $this->db->from('patient_notes');
            $this->db->join('patient_registration', 'patient_registration.prid = patient_notes.pid','left');
            $this->db->join('services', 'services.id = patient_notes.sid','left');
            $this->db->join('sub_services', 'sub_services.ssid = patient_notes.ssid','left');
            $this->db->where(['patient_notes.pid'=>$pid]);
            $this->db->like('patient_notes.created_at',$current_date );
            // if($current_date !=null){
            // $this->db->where('DATE(patient_notes.created_at) ="'. date('Y-m-d', strtotime($current_date)).'"');
            //  // $this->db->where('patient_notes.created_at', $current_date);
            // }

            // if($vid !=null){
            // $this->db->where('patient_notes.p_visit_id', $vid);
            // }
            $query = $this->db->get();   
            $querym= $query->result_array();
            return $querym;
	}
	
		public function current_date_patient_note_data_sumofamount($pid,$current_date,$vid){
	    
		  
		    $this->db->select('SUM(patient_notes1.bamount) as bamount,SUM(patient_notes1.tamount) as tamount,SUM(patient_notes1.damount) as damount');//
		   
            $this->db->from('patient_notes');
          
            $this->db->join('patient_notes1', 'patient_notes1.patient_notes_id = patient_notes.id','left');
          
         
            
            $this->db->where('patient_notes.pid',$pid);
          // $this->db->like('patient_notes.patient_appt_date',$current_date);
            // if($current_date !=null){
            //$this->db->where('DATE(patient_notes.created_at) ="'. date('Y-m-d', strtotime($current_date)).'"');
            //  // $this->db->where('patient_notes.created_at', $current_date);
            // }

            // if($vid !=null){
            // $this->db->where('patient_notes.p_visit_id', $vid);
            // }
            $query = $this->db->get();   
            $querym= $query->result_array();
            return $querym;
	}
    public function get_money_walite($pid){

            $this->db->select('patient_registration.wallet_amount');
            $this->db->where('patient_registration.prid', $pid);
            $result = $this->db->get('patient_registration')->row();  
            //echo'<pre>';print_r($result);die;
            return $result->wallet_amount;

        }

    public function get_money_walite_view($pid){
            $this->db->select('money_wallet.*');
		    $this->db->select('services.service_name');
            $this->db->select('patient_registration.pname');
		    $this->db->select('sub_services.sub_service_name');
            $this->db->from('money_wallet');
            $this->db->join('patient_registration', 'patient_registration.prid = money_wallet.pid');
            $this->db->join('services', 'services.id = money_wallet.sid');
            $this->db->join('sub_services','sub_services.sub_service_name =money_wallet.product_name');
            $this->db->where('money_wallet.pid', $pid);
            $query = $this->db->get();   
            $querym= $query->result_array();
        //    echo'<pre>';print_r($querym);die;
            return $querym;       
        }


    public function last_record($pid,$table_name){ 
    return $this->db->select('*')->from($table_name)->where('pid', $pid)->limit(1)->order_by('created_at','DESC')->get()->row();
    
   // echo $this->db->last_query();exit;
}  

   public function check_visit_current_date($pid,$current_date=null){


            $this->db->select('temp_visit.id as visit_id');
            $this->db->from('temp_visit');
            $this->db->where('temp_visit.pid', $pid);
            $this->db->where('temp_visit.status', 1);
            if($current_date !=null){
            $this->db->where('DATE(temp_visit.created_at) ="'.date('Y-m-d', strtotime($current_date)).'"');
            }
           $query1 = $this->db->get();
           $querym1= $query1->result_array();

        //    echo'<pre>';print_r($querym1[0]);die;
            if(isset($querym1[0]['visit_id']) && !empty($querym1[0]['visit_id'])){

            $this->db->select('invoice.*');
            $this->db->from('invoice');
            $this->db->where('invoice.pid', $pid);
            $this->db->where('invoice.p_visit_id', $querym1[0]['visit_id']);
            if($current_date !=null){
            $this->db->where('DATE(invoice.created_at) ="'.date('Y-m-d',strtotime($current_date)).'"');
            }
            $query = $this->db->get();
            $querym= $query->result_array();
           // echo'<pre>';print_r($querym);die;
            if(isset($querym) && !empty($querym)){
                 $data = array( 
                    'pid'  => $pid
                ); 
              $this->InventoryModel->insert('temp_visit', $data); 
            }else{

              
            }
           //echo'<pre>';print_r($querym);die;
            }else{
               $data = array( 
                    'pid'  => $pid
                ); 
              $this->InventoryModel->insert('temp_visit', $data); 
 
            }
            
           return true;

   }

    public function get_visit_list($pid){

    	$this->db->select('temp_visit.*');
    	$this->db->from('temp_visit');
    	$this->db->where('temp_visit.pid', $pid);
    	$this->db->where('temp_visit.status', 1);
    	$this->db->order_by('created_at','ASC');
    	$query = $this->db->get();   
        $querym= $query->result_array();
        //echo'<pre>';print_r($querym);die;
        return $querym;       
    }
    
    public function get_visit_list_v($pid,$current_date){

    	$this->db->select('patient_visit.*');
    	$this->db->from('patient_visit');
    	$this->db->where('patient_visit.pt_id', $pid);
    	$this->db->where('patient_visit.status', 1);
    	if($current_date !=null){
            $this->db->where('DATE(patient_visit.created_at) ="'.date('Y-m-d', strtotime($current_date)).'"');
            }
    	$this->db->order_by('created_at','ASC');
    	$query = $this->db->get();   
        $querym= $query->result_array();
        //echo'<pre>';print_r($querym);die;
        return $querym;       
    }
    
    public function get_ptid($id){

        $this->db->select('patient_notes.pid');
        $this->db->from('patient_notes');
        $this->db->where('pid',$id);
        
        $query = $this->db->get(); 
        $querym= $query->result_array();
        // print_r($querym); die();
         return $querym;  
    }
    
    public function get_visit_list_u($pid,$current_date){
        
        $this->db->select('patient_visit.*');
        $this->db->from('patient_visit');
        $this->db->where('pt_id',$pid);
        $this->db->where('patient_visit.status', 1);
        if($current_date !=null){
            $this->db->where('DATE(patient_visit.created_at) ="'.date('Y-m-d', strtotime($current_date)).'"');
            }
        $this->db->order_by('created_at','ASC');
        $query = $this->db->get();   
        $querym= $query->result_array();
        // print_r($querym); exit();
        // echo $this->db->last_query();die;
         //echo'<pre>';print_r($querym);die;
        return $querym;       
    }
    public function insertData($tableName,$postData)
    {
        // echo "ok";die;
       $this->db->insert($tableName, $postData);
        $insertId = $this->db->insert_id();
        return $insertId;
    }
    public function insertmultiple($tableName,$postData)
    {
        $this->db->insert_batch($tableName, $postData);
        $insertId = $this->db->insert_id();
        return $insertId;
    }
  	public function update_data($table,$data,$id) {
		$this->db->where('id', $id);
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0){
        return true;
		}else{
			return false;
		}
	}

	public function addAppointment($data){
	    $this->db->insert('appointment_data',$data);
        return $LastInsert_id = $this->db->insert_id();

	}
	public function getwallet_transiction($pid){
	      $this->db->select('wallet_transiction.*');
		    $this->db->select('services.service_name');
            $this->db->from('wallet_transiction');
            $this->db->join('services','services.id = wallet_transiction.service_id','left');
            $this->db->where('wallet_transiction.patent_id', $pid)->order_by('id','desc');
          return  $query = $this->db->get()->result();   
	}
	public function save_session_peckage($data){
	      $this->db->insert('wallet',$data);
	}
	public function update_wallet_amount($data,$id){
	    $this->db->where('prid', $id);
		$this->db->update('patient_registration', $data);
	}
	public function getall_session_package(){
 	 $query=$this->db->select('id,pname,service_name,amount,type,number_of_session_package,created_at')->from('wallet')->join('patient_registration','patient_registration.prid = wallet.pid','left')->join('services','services.id = wallet.id','left')->get()->result_Array();
 	 return $query;
	}
	public function getall_session_package_id($pid){
 	 $query=$this->db->select('*')->from('wallet')->where('pid',$pid)->get()->result();
 	 return $query;
	}

    public function updatepatientData($sid,$did){
        $this->db->select('pname,phone,email,gender,age');
        $this->db->where('prid', $sid);
        $query = $this->db->get('patient_registration');
        $sourceData = $query->row_array();
    
        // Update the target row with the source data
        $this->db->where('prid', $did);
        $result=$this->db->update('patient_registration', $sourceData);

        // for delete old data
        $this->db->where('prid =', $sid);
        $this->db->delete('patient_registration');
        return $result;
        
     }












}
?>