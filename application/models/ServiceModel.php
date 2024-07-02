<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class ServiceModel extends CI_Model 

{

	function __construct()

	{

		parent::__construct();

	}



	public function getallservices()

	{

		$this->db->order_by("create_at", "desc");

		$data = $this->db->get('services');

		return $data->result();

	}



	function getallservice_category()
	{
		$data = $this->db->get('service_category');
		return $data->result();

	}

	/*  FOR AJAX API

	function getallsubservices($postData=array()){

 

        $response = array();

     

        if(isset($postData['sid']) )

        {

          $this->db->select('*');

          $this->db->where('sid', $postData['sid']);

          $records = $this->db->get('sub_services');

          $response = $records->result();

        }

        return $response;

			}

*/





        /*

        *   find sub services using service id

        */

        

        public function getsubservicebysid($id)

        {

            $this->db->select('*');

            $this->db->from('sub_services');

            $this->db->join('services', 'services.id = sub_services.sid');

            $this->db->where('sub_services.sid', $id);

            $query = $this->db->get();

            

            return $query->result();

        }



        public function filterbyssid_sid($ssid)
        {
            $this->db->select('*');
            $this->db->from('sub_services');
            $this->db->join('services', 'services.id = sub_services.sid');
            $this->db->where('sub_services.ssid', $ssid);
            $query = $this->db->get();
            return $query->result_array();

        }

		public function getparticularsubser($id)
		{
			$data = $this->db->get_where('sub_services',['ssid'=>$id]);
			return $data->result_array();

		}



		public function getparticularser($id)

		{

			$data = $this->db->get_where('services',['id'=>$id]);

			return $data->result_array();

		}



		public function ntxserpatient($id)

		{

			$data = $this->db->get_where('neurotoxin_services_data',['pid'=>$id]);

			return $data->result();

		}

		public function getallpaymentmethod()

	   {

		$this->db->order_by("method_name", "asc");

		$data = $this->db->get('payment_method');

		return $data->result();

	   }


    public function servicebyid($id)
		{
			$data = $this->db->get_where('services',['id'=>$id]);
			return $data->result();

		}

	public function invoicebyid($id)
		{
			$data = $this->db->get_where('invoice',['id'=>$id]);
			return $data->result();

		}

  public function invoicebillbyid($id){

        $this->db->select('invoice.*');
        $this->db->select('services.service_name');
        $this->db->select('sub_services.sub_service_name');
        $this->db->select('invoice_product.qty');
        $this->db->from('invoice');
        $this->db->join('invoice_product', 'invoice_product.invoice_id = invoice.id','left');
        $this->db->join('sub_services', 'sub_services.ssid = invoice_product.ssid','left');
        $this->db->join('services', 'services.id = invoice_product.sid','left');
        $this->db->where('invoice.id', $id);
      
        $query = $this->db->get();
        $querym= $query->result_array();
      //  echo'<pre>';print_r($querym);die;
        return $querym;


  }

    public function invoicebillbyid1($id){

        $this->db->select('invoice_product.*');
        $this->db->select('services.service_name');
        $this->db->select('sub_services.sub_service_name');
        $this->db->select('invoice_product.qty');
        $this->db->from('invoice_product');
        $this->db->join('sub_services', 'sub_services.ssid = invoice_product.ssid','left');
        $this->db->join('services', 'services.id = invoice_product.sid','left');
        $this->db->where('invoice_product.invoice_id', $id);
      
        $query = $this->db->get();
        $querym= $query->result_array();
      //  echo'<pre>';print_r($querym);die;
        return $querym;


  }


public function insert_sub_service($data)
	{   
		//echo'<pre>';print_r($data);die;
		return $this->db->insert('sub_services',$data);
	}


public function get_neurotoxin_services_data($pid,$current_date=null,$vid=null){
	    	$this->db->select('patient_registration.pname');
		    $this->db->select('neurotoxin_services_data.*');//
		    $this->db->select('services.id','services.service_name');
		    $this->db->select('sub_services.sub_service_name');
            $this->db->from('neurotoxin_services_data');
            $this->db->join('patient_registration', 'patient_registration.prid = neurotoxin_services_data.pid','left');
            $this->db->join('sub_services', 'sub_services.ssid = neurotoxin_services_data.ssid','left');
            $this->db->join('services', 'services.id = sub_services.sid','left');
            $this->db->where('neurotoxin_services_data.pid', $pid);
            if($current_date !=null){
            $this->db->where('DATE(neurotoxin_services_data.create_at) ="'. date('Y-m-d', strtotime($current_date)).'"');
             // $this->db->where('patient_notes.created_at', $current_date);
            }
            if($vid !=null){
             $this->db->where('neurotoxin_services_data.p_visit_id', $vid);
            }
            $query = $this->db->get();
           //echo $this->db->last_query();die;
           $querym= $query->result_array();

          return $querym;
            
	}
	
	public function get_neurotoxin_services_data_u($pid,$current_date,$vid=null){
	    	$this->db->select('patient_registration.pname');
		    $this->db->select('neurotoxin_services_data.*');//
		    $this->db->select('services.id','services.service_name');
		    $this->db->select('sub_services.sub_service_name');
            $this->db->from('neurotoxin_services_data');
            $this->db->join('patient_registration', 'patient_registration.prid = neurotoxin_services_data.pid','left');
            $this->db->join('sub_services', 'sub_services.ssid = neurotoxin_services_data.ssid','left');
            $this->db->join('services', 'services.id = sub_services.sid','left');
            $this->db->where('neurotoxin_services_data.pid', $pid);
            if($current_date !=null){
            $this->db->where('DATE(neurotoxin_services_data.create_at) ="'. date('Y-m-d', strtotime($current_date)).'"');
             // $this->db->where('patient_notes.created_at', $current_date);
            }
            if($vid !=null){
             $this->db->where('neurotoxin_services_data.p_visit_id', $vid);
            }
            $query = $this->db->get();
           //echo $this->db->last_query();die;
           $querym= $query->result_array();

          return $querym;
            
	}


public function get_filler_services_data($pid,$current_date=null,$vid=null){
            $this->db->select('patient_registration.pname');
            $this->db->select('filler_services.*');//
            $this->db->select('services.service_name');
            $this->db->select('sub_services.ssid');
            $this->db->from('filler_services');
            $this->db->join('patient_registration', 'patient_registration.prid = filler_services.pid','left');
            $this->db->join('sub_services', 'sub_services.sub_service_name = filler_services.product','left');
            $this->db->join('services', 'services.id = filler_services.sid','left');
            $this->db->where('filler_services.pid', $pid);
            if($current_date !=null){
            $this->db->where('DATE(filler_services.created_at) ="'. date('Y-m-d', strtotime($current_date)).'"');
             // $this->db->where('patient_notes.created_at', $current_date);
            }
           
            $query = $this->db->get();
        
           $querym= $query->result_array();
           
          return $querym;
            
    }
    
    public function get_filler_services_data_u($pid,$current_date,$vid=null){
            $this->db->select('patient_registration.pname');
            $this->db->select('filler_services.*');//
            $this->db->select('services.service_name');
            $this->db->select('sub_services.ssid');
            $this->db->from('filler_services');
            $this->db->join('patient_registration', 'patient_registration.prid = filler_services.pid','left');
            $this->db->join('sub_services', 'sub_services.sub_service_name = filler_services.product','left');
            $this->db->join('services', 'services.id = filler_services.sid','left');
            $this->db->where('filler_services.pid', $pid);
            if($current_date !=null){
            $this->db->where('DATE(filler_services.create_at) ="'. date('Y-m-d', strtotime($current_date)).'"');
             // $this->db->where('patient_notes.created_at', $current_date);
            }
            // if($vid !=null){
            //  $this->db->where('filler_services.p_visit_id', $vid);
            // }
            $query = $this->db->get();
        
           $querym= $query->result_array();
           
          return $querym;
            
    }


    public function get_list($table){
      $this->db->where('status ',1);
      $data = $this->db->get($table);
      return $data->result();
  }


	public function get_all_patients_info($pid){
	    	$this->db->select('patient_registration.*');
		    $this->db->select('invoice.*');
            $this->db->from('invoice');
            $this->db->join('patient_registration', 'patient_registration.prid = invoice.pid','left');
            $this->db->where('invoice.pid', $pid);
            $query = $this->db->get();
            $querym= $query->result_array();

       
        $i=0;
        $cal=0;
        $revenue=array();
        foreach ($querym as $key => $value) {
        $cal=$value['bamount'] - $value['damount'];
        $querym[$i]['bamount'] = $cal;
        $revenue[]=$cal;
        $i++;
        }

        $treatment_type = $this->getallservices();
          return array('data'=>$querym,'total_rev'=>array_sum($revenue),'treatment_type'=>$treatment_type);
	}


	public function get_neurotoxin_services_data_by_id($nsd_id){
	    	$this->db->select('patient_registration.pname');
		    $this->db->select('neurotoxin_services_data.*');//
		    // $this->db->select('services.sid','services.service_name');
		    // $this->db->select('sub_services.sub_service_name');
            $this->db->from('neurotoxin_services_data');
            $this->db->join('patient_registration', 'patient_registration.prid = neurotoxin_services_data.pid','left');
            // $this->db->join('sub_services', 'sub_services.ssid = neurotoxin_services_data.ssid','left');
            // $this->db->join('services', 'services.sid = sub_services.sid','left');
            $this->db->where('neurotoxin_services_data.nsd_id', $nsd_id);
           
            $query = $this->db->get();
        
           $querym= $query->result_array();
          if(isset($querym[0])){
         return $querym[0];
          }else{
          	return $querym;
          }
          
	}


   public function get_product_inv($sid)
        {
            $this->db->select('service_category_id,product_name,current_sell_cost,current_inventory');
            $this->db->from('inventory');
            $this->db->where('inventory.service_category_id', $sid);
            $query = $this->db->get();
            return $query->result_array();

        }
        public function getallproducts(){
         
          $this->db->select('service_category_id,product_name,current_sell_cost,current_inventory,inventory_id');
          $this->db->from('inventory');
          //$this->db->where('inventory.service_category_id', $sid);
          $query = $this->db->get();
          return $query->result();
        }


 public function save_sub_service($data){
     return $this->db->insert('sub_services',$data);
 }
 
  public function getall_Subservices(){
             $this->db->select('sub_services.ssid,sub_services.sub_service_name,services.service_name,sub_services.sub_service_charge,sub_services.service_pay,sub_services.create_at');
             $this->db->from('sub_services');
             $this->db->join('services', 'services.id = sub_services.sid','left');
            return $query = $this->db->get()->result();
           // return $query->result();

        }

     public function savestaff($data){
            $this->db->insert('staff',$data);
           return $dat =  $this->db->insert_id();
            //echo $dat;die;
        
     }
   
     public function getstaff()
     {
         $this->db->select('*');
         $this->db->from('staff');
         $this->db->order_by('id', 'DESC');
         $this->db->join('services', 'services.id = staff.assign_service','left');
         $query = $this->db->get();
         return $query->result();
     }

    
    
      public function getstaffbyid($id){
             $this->db->select('*');
             $this->db->from('staff');
             $this->db->where('id', $id);
             //$this->db->join('services', 'services.sid = sub_services.sid','left');
            return $query = $this->db->get()->row();
           // return $query->result();

        }
        
        public function updatestaff($data,$id){
            $this->db->where('id', $id);
          return $this->db->update('staff',$data);
        }
        public function deleteStaf($id){
            $this->db->where('id', $id);
          return $this->db->delete('staff');
            
        }
        
          public function saveWorktimeofstaff($data){
           $this->db->insert('staff_work_time',$data);
           return $dat =  $this->db->insert_id();
         }
         public function checkworkdata($stffid,$date){
           return  $this->db->select('id')->from('staff_work_time')->where('staff_id',$stffid)->where('work_date',$date)->get()->result();
         }
        public function getpay_per_hour($stffid){
              return  $this->db->select('pay_per_hour')->from('staff')->where('id',$stffid)->get()->row();
        }
        
    
     public function getstaffwork($id,$fileterdata){
         
         $today = date("Y-m-d");
        $todayMinusSeven = date("Y-m-d",strtotime("-7 days"));
        if($fileterdata=='month'){
            $query="SELECT staff.id as staffid,staff_work_time.id,work_time,work_date,work_day,name,hour_rate as pay_per_hour
            FROM staff_work_time 
            LEFT JOIN staff ON staff.id = staff_work_time.staff_id
            WHERE MONTH(work_date) = MONTH(NOW()) AND staff_work_time.staff_id = $id ORDER BY `work_date` DESC";
        }else if($fileterdata=='year'){
            $query="SELECT staff.id as staffid,staff_work_time.id,work_time,work_date,work_day,name,hour_rate as pay_per_hour
            FROM staff_work_time 
            LEFT JOIN staff ON staff.id = staff_work_time.staff_id
            WHERE YEAR(work_date) = YEAR(NOW()) AND staff_work_time.staff_id = $id ORDER BY `work_date` DESC";
        }else if($fileterdata=='all'){
            $query="SELECT staff.id as staffid,staff_work_time.id,work_time,work_date,work_day,name,hour_rate as pay_per_hour
            FROM staff_work_time 
            LEFT JOIN staff ON staff.id = staff_work_time.staff_id
            WHERE staff_work_time.staff_id = $id ORDER BY `work_date` DESC"; 
        }else{
            $query="SELECT staff.id as staffid,staff_work_time.id,work_time,work_date,work_day,name,hour_rate as pay_per_hour
            FROM staff_work_time 
            LEFT JOIN staff ON staff.id = staff_work_time.staff_id
            WHERE YEARWEEK(work_date) = YEARWEEK(NOW()) AND staff_work_time.staff_id = $id ORDER BY `work_date` DESC"; 
        }
       // $query = "SELECT staff.id as staffid,staff_work_time.id,work_time,work_date,work_day,name,pay_per_hour FROM staff_work_time LEFT JOIN staff ON staff.id = staff_work_time.staff_id WHERE work_date BETWEEN '$todayMinusSeven' AND 
           // '$today'";
            //  $this->db->select('staff.id as staffid,staff_work_time.id,work_time,work_date,work_day,name,pay_per_hour');
            //  $this->db->from('staff_work_time');
            //  $this->db->join('staff', 'staff.id = staff_work_time.staff_id','left');
            // return $query = $this->db->get()->result();
          return  $this->db->query($query)->result();
       

        }
       
       public function total_today_pay_sum(){
            $query="SELECT work_time,hour_rate as pay_per_hour
            FROM staff_work_time 
            
            WHERE date(work_date) = CURDATE()"; 
         return  $this->db->query($query)->result();
       }
       
       public function total_week_pay_sum(){
            $query="SELECT work_time,hour_rate as pay_per_hour
            FROM staff_work_time 
           
            WHERE YEARWEEK(work_date) = YEARWEEK(NOW())"; 
         return  $this->db->query($query)->result();
       }
       public function total_month_pay_sum(){
            $query="SELECT work_time,hour_rate as pay_per_hour
            FROM staff_work_time 
            WHERE MONTH(work_date) = MONTH(NOW())"; 
         return  $this->db->query($query)->result();
       }
       public function total_year_pay_sum(){
            $query="SELECT work_time,hour_rate as pay_per_hour
            FROM staff_work_time 
           
            WHERE YEAR(work_date) = YEAR(NOW())"; 
         return  $this->db->query($query)->result();
       }
       public function update_hourrate_by_date($to,$from,$rate,$id){
           $this->db->where('id',$id);
           $this->db->update('staff',['pay_per_hour' =>$rate]);
           $query="Update staff_work_time SET hour_rate=$rate where work_date BETWEEN '$to' and '$from' and staff_id=$id";
          // $this->db->where('staff_id',$id);
           return $this->db->query($query);
         
           
       }
       public function getAllcalulation($data=null,$id=null){
            // $today = date('Y-m-d');
		    $this->db->select('patient_registration.pname,invoice.total_expens,patient_notes.room_no,patient_notes1.*,patient_notes.id,patient_notes.pid,services.service_name');
		    $this->db->from('patient_notes');
            $this->db->join('invoice', 'invoice.pid = patient_notes.pid','left');
           // $this->db->join('patient_notes', 'patient_notes.appt_id=Appointment_data.apid','left');
          $this->db->join('patient_notes1', 'patient_notes1.patient_notes_id = patient_notes.id','left');
          $this->db->join('services', 'services.id = patient_notes1.sid','left');
            $this->db->join('patient_registration', 'patient_registration.prid = patient_notes.pid','left');
           // $this->db->where('Appointment_data.app_date >=',$today);
          
            // $this->db->order_by("created_at", "DESC");
            
            if(isset($data) && !empty($data['min'])){
            // 	echo'<pre>';print_r($data['max']);die;
            $this->db->where('DATE(patient_notes.created_at) >="'. date('Y-m-d', strtotime($data['min'])).'"');
            $this->db->where('DATE(patient_notes.created_at) <="'. date('Y-m-d', strtotime($data['max'])).'"');
            }
    
            if(isset($id) && !empty($id)){
            $this->db->where('patient_notes.appt_id', $id);
            }
           
            $query = $this->db->get();
           
           $querym= $query->result();
          return $querym;
       }
       
       public function getprovideServices($notsid,$pid){
          $this->db->select('service_add.id,s_amount,service_pay ,service_category_id,service_add.ssid,services.service_name as name');
         return $this->db->from('service_add')->join('services','services.id = service_add.service_category_id')->where('patient_id',$pid)->where('notes_id',$notsid)->get()->result();
       }
       public function getusedproducts($notsid,$pid){
           $this->db->select('used_product.*,products.product_name');
           
         return $this->db->from('used_product')
         ->join('inventory','inventory.inventory_id = used_product.product_id')
         ->join('products','products.product_id =inventory.inventory_id')
         ->where('patient_id',$pid)->where('notes_id',$notsid)->get()->result();
       }
       
}
?>