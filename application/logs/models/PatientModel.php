<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function savepatientdata($data)
	{
		return $this->db->insert('patient_registration',$data);
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
	
	 public function saveprovider($data)
    {
        return $this->db->insert('provider_register',$data);
    }

	public function getallpatients($search=null)
	{   
	    if(isset($search) && $search !=null){
        $data = $this->db->like('patient_registration.pname',$search['pname']);
		}
		$data = $this->db->get('patient_registration');
		
		
		return $data->result();
	}
	
	 public function getpatient($search)

  {
    // echo "vinaymodel";die;
     $this->db->where('phone',$search);
    $data = $this->db->get('patient_registration');
    return $data->result();
    

  }
  
  	 public function getapointmentdata($id)

  {
    // echo "vinaymodel";die;
     $this->db->where('apid',$id);
    $data = $this->db->get('Appointment_data');
    return $data->result();
    

  }
  
  	 public function getpatientbyID($id)

  {
    //echo $id;die;
     $this->db->where('prid',$id);
    $data = $this->db->get('patient_registration');
    return $data->result();
    

  }
  
  	 public function getproviderbyID($id)

  {
    //echo $id;die;
     $this->db->where('id',$id);
    $data = $this->db->get('provider_register');
    return $data->result();
    

  }
  
 
  	 public function getserivces()

  {
    // echo "vinaymodel";die;
    //  $this->db->where('phone',$search);
    $this->db->order_by("create_at", "desc");
    $data = $this->db->get('services');
    return $data->result();
    

  }
	
	
	 public function getallprovider($search=null)
    {   
        if(isset($search) && $search !=null){
        $data = $this->db->like('provider_register.pname',$search['pname']);
        }
        $data = $this->db->get('provider_register');
        
        
        return $data->result();
    }
    
    public function getprovider($user_id)
	{
	   // echo"vinay";die;
	    $today = date("Y-m-d");
	   $this->db->select('patient_registration.pname');
            $this->db->select('provider_register.name');
            $this->db->select('services.service_name');
            $this->db->select('patient_notes.*');
            $this->db->from('patient_notes');
            $this->db->join('patient_registration', 'patient_notes.pid = patient_registration.prid','left');
             $this->db->join('provider_register', 'patient_notes.provider_id = provider_register.id','left');
            $this->db->join('services', 'patient_notes.sid = services.id','left');
           
            $this->db->where('patient_notes.provider_id', $user_id);
            $this->db->where('patient_notes.check_in_date', $today);
            $this->db->order_by("id", 'ASC');

            $data = $this->db->get();
            
            //echo $this->db->last_query();die;
            return $data->result();
	}


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

	public function insert_patients_notes($data)
	{
		$this->db->insert('patient_notes',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}


    public function getallpatient_notes_list($data=null,$id=null){
		    
		    $today = date('Y-m-d');
		    $this->db->select('patient_registration.*');
		    $this->db->select('patient_notes.*');//
		    $this->db->select('services.service_name');
		    $this->db->select('sub_services.sub_service_name');
		    $this->db->select('Appointment_data.*');
            $this->db->from('patient_registration');
            $this->db->join('patient_notes', 'patient_registration.prid = patient_notes.pid','left');
          $this->db->join('Appointment_data', 'patient_registration.prid = Appointment_data.patient_id','left');
            $this->db->join('services', 'services.id = patient_notes.sid','left');
            $this->db->join('sub_services', 'sub_services.ssid = patient_notes.ssid','left');
            $this->db->where('Appointment_data.app_date >=',$today);
            //  $this->db->group_by("patient_notes.pid");
            $this->db->order_by("Appointment_data.app_date", "ASC");
            $this->db->order_by("Appointment_data.app_time", "ASC");
            // $this->db->order_by("created_at", "DESC");
            
            if(isset($data) && !empty($data['min'])){
            // 	echo'<pre>';print_r($data['max']);die;
            $this->db->where('DATE(patient_notes.created_at) >="'. date('Y-m-d', strtotime($data['min'])).'"');
            $this->db->where('DATE(patient_notes.created_at) <="'. date('Y-m-d', strtotime($data['max'])).'"');
            }
    
            if(isset($id) && !empty($id)){
            $this->db->where('patient_notes.id', $id);
            }
        //    $this->db->where('invoice.id', $id);
            $query = $this->db->get();
            //echo $this->db->last_query();die;
           $querym= $query->result_array();
          return $querym;
          // echo'<pre>';print_r($querym);die;
	}
	
	
	public function getallpatient_notes_list1($userid){
		
		    $this->db->select('patient_registration.pname');
		    $this->db->select('patient_notes.*');//
		    $this->db->select('services.service_name');
		    $this->db->select('sub_services.sub_service_name');
            $this->db->from('patient_notes');
            $this->db->join('patient_registration', 'patient_registration.pid = patient_notes.pid','left');
            $this->db->join('services', 'services.id = patient_notes.sid','left');
            $this->db->join('sub_services', 'sub_services.ssid = patient_notes.ssid','left');
            $this->db->where('patient_registration.pid', $userid);
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
            $this->db->join('patient_registration', 'patient_registration.pid = patient_notes.pid','left');
            $this->db->join('services', 'services.id = patient_notes.sid','left');
            $this->db->join('sub_services', 'sub_services.ssid = patient_notes.ssid','left');
            $this->db->where(['patient_notes.pid'=>$pid,'patient_notes.p_visit_id'=>$vid]);
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
    public function get_money_walite($pid){

            $this->db->select_sum('namount');
            $this->db->where('money_wallet.pid', $pid);
            $result = $this->db->get('money_wallet')->row();  
            //echo'<pre>';print_r($result);die;
            return $result->namount;

        }

    public function get_money_walite_view($pid){
            $this->db->select('money_wallet.*');
		    $this->db->select('services.service_name');
            $this->db->select('patient_registration.pname');
		    $this->db->select('sub_services.sub_service_name');
            $this->db->from('money_wallet');
            $this->db->join('patient_registration', 'patient_registration.pid = money_wallet.pid');
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
        $this->db->where('id',$id);
        
        $query = $this->db->get();  
        $querym= $query->result_array();
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
	
}
?>