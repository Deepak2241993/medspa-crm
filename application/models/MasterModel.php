<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class MasterModel extends CI_Model 

{

	function __construct()

	{

		parent::__construct();

	}

    //  for Updating Patient details
    public function update_any_table($table,$data,$id) {
        $this->db->where('prid', $id);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() > 0){
        return true;
        }else{
            return false;
        }
    }

    // get patient details
    public function get_patientdataby_id($id, $table)

    {
     $this->db->where('prid',$id);
    $data = $this->db->get($table);
    return $data->result();
    
    }



    public function getalldata($table)

	{

		$this->db->order_by("id", "desc");

		$data = $this->db->get($table);

		return $data->result();

	}

    public function insert($table,$data)
	{   
		return $this->db->insert($table,$data);
	}


    public function get_databy_id($id, $table)

    {
     $this->db->where('id',$id);
    $data = $this->db->get($table);
    return $data->result();
    
    }

    public function getServicesByCategory($id, $table)
    {
     $this->db->where('service_cat_id',$id);
    $data = $this->db->get($table);
    return $data->result();
    
    }

    public function update($table,$data,$id){
        $this->db->where('id', $id);
      return $this->db->update($table,$data);
    }



    public function deletedata($id,$table){
        $this->db->where('id', $id);
      return $this->db->delete($table);
        
    }

    //  for Creating Any Data
    public function active_data($table)

	{

		$this->db->order_by("id", "desc");
        $this->db->where('status', 1);
		$data = $this->db->get($table);

		return $data->result();

	}

//  For Wallet page 

public function viewwallet($id, $table)
{

    $this->db->select('money_wallet_new.*');
		    $this->db->select('employees.name');
            $this->db->from('money_wallet_new');
            $this->db->join('employees','employees.id = money_wallet_new.added_by','left');
            $this->db->where('money_wallet_new.status', 1); 
            $this->db->where('money_wallet_new.patient_id', $id); 
            $this->db->order_by("money_wallet_new.id", "desc");
          return  $query = $this->db->get()->result();

}

public function viewwalletservices($id)
{
            $this->db->select('service_wallet.*');
		    $this->db->select('employees.name');
            $this->db->from('service_wallet');
            $this->db->join('employees','employees.id = service_wallet.added_by','left');
            $this->db->where('service_wallet.status', 1); 
            $this->db->where('service_wallet.patient_id', $id); 
            $this->db->order_by("service_wallet.id", "ASC");
          return  $query = $this->db->get()->result();

}

public function wallet_items($id)
{

    $this->db->select('o.created,o.id as order_id,o.grand_total,o.transaction_id,p.id,p.package_name,p.service_id,p.service_session,order_items.product_id,order_items.quantity');
    $this->db->from('orders as o');
    $this->db->join('order_items', 'order_items.order_id = o.id', 'left');
    $this->db->join('package_list as p', 'p.id = order_items.product_id', 'left');
    $this->db->order_by("o.id", "desc");
    $this->db->where('o.customer_id', $id); 
    $this->db->where('o.grand_total !=', '0.00'); 
    $this->db->where('o.status', 1);
    $data = $this->db->get('orders');
    return $data->result();

}

public function getOrder($id){
    // Get order items
    $this->db->select('i.*, p.image, p.package_name, p.price');
    $this->db->from('order_items as i');
    $this->db->join('package_list as p', 'p.id = i.product_id', 'left');
    $this->db->where('i.order_id', $id);
    $query2 = $this->db->get();
    $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
    // Return fetched data
    return !empty($result)?$result:false;
}


public function insertOrder($data,$table){
    // Add created and modified date if not included
    if(!array_key_exists("created", $data)){
        $data['created'] = date("Y-m-d H:i:s");
    }
    if(!array_key_exists("modified", $data)){
        $data['modified'] = date("Y-m-d H:i:s");
    }
    
    // Insert order data
    $insert = $this->db->insert($table, $data);

    // Return the status
    return $insert?$this->db->insert_id():false;
}

/*
 * Insert order items data in the database
 * @param data array
 */
public function insertOrderItems($data = array()) {
    // Insert order items
    $this->db->insert_batch('order_items', $data);

    // Return the last inserted ID
    return $this->db->insert_id();
}




}
