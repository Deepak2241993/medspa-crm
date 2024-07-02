<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function saveinvoicedata($data)
	{   
		//echo'<pre>';print_r($data);die;
		return $this->db->insert('invoice',$data);
	}

	    public function getall_invoice_list($data=null,$pid=null)
      {
		        $this->db->select('patient_registration.pname');
		        $this->db->select('invoice.*');//
		        
            $this->db->from('invoice');
            $this->db->join('patient_registration', 'patient_registration.pid = invoice.pid','left');
            
            if(isset($data) && !empty($data['min']))
            {
              //	echo'<pre>';print_r($data['max']);die;
              $this->db->where('DATE(invoice.created_at) >="'. date('Y-m-d', strtotime($data['min'])).'"');
              $this->db->where('DATE(invoice.created_at) <="'. date('Y-m-d', strtotime($data['max'])).'"');
            }

            if(isset($data) && !empty($data['p_name']))
            {
              $this->db->like('patient_registration.pname', $data['p_name']);
            }

            // if(isset($data) && !empty($data['ttype'])){
            // $this->db->where('services.sid', $data['ttype']);
            // }
            
            if($pid !=null){
             $this->db->where('patient_registration.pid', $pid);
            }

            $query = $this->db->get();
        
           $querym= $query->result_array();

          // echo "<pre>";
           //print_r( $querym);
           //die;
           
           $p_method='';
           $i=0;
           $querymdd=array();
           $pay_mehtod = array();
        // echo '<pre>';print_r($querym);die;

           foreach ($querym as $key => $value) 
           {
              $pay_mehtod = $this->get_paymont_method_by_invoice_id($value['id']);
                 if(count($pay_mehtod)==1)
                 { 
                    $querym[$i]['method_name'] = $pay_mehtod[0]['method_name'];
                 }
                 else
                 {
                      $p_method = '';
                 	 foreach ($pay_mehtod as $key => $mehtod) 
                   {
                 	      $p_method.=$mehtod['method_name'].',';
                    }
                        $p_method = rtrim($p_method, ", ");
                        $querym[$i]['method_name'] = $p_method;
                  }
                      $i++;
              }

           // echo'<pre>';
           // print_r($querym);
           // echo "<br><br>";
           // die;

            $i=0;
            $p_method='';
            $p_method1='';
            $qt=0;

           foreach ($querym as $key => $value) 
           {
               $product_data = $this->get_service_subservice_by_invoice_id($value['id']);
              // echo'<pre>';print_r($product_data);//die;
              
           if(count($product_data)==1)
           { 
              $querym[$i]['services'] = $product_data[0]['service_name'];
              $querym[$i]['products'] = $product_data[0]['sub_service_name'];
              $querym[$i]['Qty'] = $product_data[0]['qty'];
           }
           else
           {
                $p_method = '';
                $p_method1 = '';  
               foreach ($product_data as $key => $mehtod) 
               {
                $p_method.=$mehtod['service_name'].',';
                $p_method1.=$mehtod['sub_service_name'].',';
                $qt=$qt+$mehtod['qty'];
               }
                  $p_method = rtrim($p_method, ",");
                  $p_method1 = rtrim($p_method1, ",");
                  $querym[$i]['services'] = $p_method;
                  $querym[$i]['products'] = $p_method1;
                  $querym[$i]['Qty'] = $qt;
           }
                $i++;
           }

//die('fff');
      //     echo'<pre>';print_r($querym);die;
          return $querym;
          // echo'<pre>';print_r($querym);die;
	}
    

    public function getpaymont_method($id){  
     
		$data = $this->db->get_where('payment_method',['pid'=>$id]);
		return $data->result_array();
	}

    public function save_invoice_payment_method_map_data($data)
	{   
		//echo'<pre>';print_r($data);die;
		return $this->db->insert('invoice_payment_method_map',$data);
	}

	public function get_paymont_method_by_invoice_id($id){
		
		    $this->db->select('invoice_payment_method_map.*');
		    $this->db->select('payment_method.method_name');
            $this->db->from('invoice_payment_method_map');
            $this->db->join('payment_method', 'payment_method.pid = invoice_payment_method_map.payment_method_id','left');
            $this->db->where('invoice_payment_method_map.invoice_id', $id);
            $query = $this->db->get();
            $querym= $query->result_array();
            return $querym;

	}


  public function get_service_subservice_by_invoice_id($id)
  {
        $this->db->select('services.service_name');
        $this->db->select('sub_services.sub_service_name');
        $this->db->select('invoice_product.qty');
        $this->db->from('invoice');
        $this->db->join('invoice_product', 'invoice_product.invoice_id = invoice.id','left');
        $this->db->join('sub_services', 'sub_services.ssid = invoice_product.ssid','left');
        $this->db->join('services', 'services.id = invoice_product.sid','left');
        $this->db->where('invoice.id',$id);
        //$this->db->like('invoice.created_at',date('Y-m-d'));
      
        $query = $this->db->get();
        $querym= $query->result_array();
      //  echo'<pre>';print_r($querym);die;
        return $querym;

  }
   public function get_invoicedata($appt_id)
  {
    //   echo "ok";die;
      
      $this->db->select('*');
        $this->db->from('patient_notes');
        $this->db->where('appt_id',$appt_id);
        
      
        $query = $this->db->get();
        $querym= $query->result_array();
        // echo'<pre>';print_r($querym);die;
        return $querym;

  }
    public function get_patient_notes1($patient_id)
  {
    //   echo "ok";die;
      
      $this->db->select('*');
        $this->db->from(' patient_notes1');
        $this->db->where('patient_notes_id',$patient_id);
        
      
        $query = $this->db->get();
        $querym= $query->result_array();
        // echo'<pre>';print_r($querym);die;
        return $querym;

  }
  public function   get_patient_name($patient_name)
  {
    //   echo "ok";die;
      
      $this->db->select('*');
        $this->db->from(' patient_registration');
        $this->db->where('prid',$patient_name);
        
      
        $query = $this->db->get();
        $querym= $query->result_array();
        // echo'<pre>';print_r($querym);die;
        return $querym;

  }



}
?>