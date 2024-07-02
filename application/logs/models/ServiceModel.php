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



	function getallsubservices($id)

	{

		$data = $this->db->get_where('sub_services',['sid'=>$id]);

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
            $this->db->join('patient_registration', 'patient_registration.pid = neurotoxin_services_data.pid','left');
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
            $this->db->join('patient_registration', 'patient_registration.pid = neurotoxin_services_data.pid','left');
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
            $this->db->join('patient_registration', 'patient_registration.pid = filler_services.pid','left');
            $this->db->join('sub_services', 'sub_services.sub_service_name = filler_services.product','left');
            $this->db->join('services', 'services.id = filler_services.sid','left');
            $this->db->where('filler_services.pid', $pid);
            if($current_date !=null){
            $this->db->where('DATE(filler_services.created_at) ="'. date('Y-m-d', strtotime($current_date)).'"');
             // $this->db->where('patient_notes.created_at', $current_date);
            }
            if($vid !=null){
             $this->db->where('filler_services.p_visit_id', $vid);
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
            $this->db->join('patient_registration', 'patient_registration.pid = filler_services.pid','left');
            $this->db->join('sub_services', 'sub_services.sub_service_name = filler_services.product','left');
            $this->db->join('services', 'services.id = filler_services.sid','left');
            $this->db->where('filler_services.pid', $pid);
            if($current_date !=null){
            $this->db->where('DATE(filler_services.create_at) ="'. date('Y-m-d', strtotime($current_date)).'"');
             // $this->db->where('patient_notes.created_at', $current_date);
            }
            if($vid !=null){
             $this->db->where('filler_services.p_visit_id', $vid);
            }
            $query = $this->db->get();
        
           $querym= $query->result_array();
           
          return $querym;
            
    }




	public function get_all_patients_info($pid){
	    	$this->db->select('patient_registration.*');
		    $this->db->select('invoice.*');
            $this->db->from('invoice');
            $this->db->join('patient_registration', 'patient_registration.pid = invoice.pid','left');
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
            $this->db->join('patient_registration', 'patient_registration.pid = neurotoxin_services_data.pid','left');
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




}





?>