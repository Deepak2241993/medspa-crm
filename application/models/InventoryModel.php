<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function get() {
       
        $this->db->select('products.product_name');
        $this->db->select('inventory.*');
        $this->db->from('inventory');
        $this->db->join('products', 'inventory.product_id = products.product_id','left');

        $this->db->where('(inventory.quantity_in)-(inventory.quantity_out) >', 0);
        $this->db->where('inventory.product_type IS NULL');
        $this->db->order_by("expiry_date", 'ASC');
        $data = $this->db->get();

        // $this->db->select_sum('remaning_qty');
        // $this->db->from('inventory');
        // $this->db->where('product_id', 34);
        // $this->db->where('expiry_date >', date('Y-m-d'));
        // $data2 = $this->db->get()->result_array();
        // print_r($data2);die();
        return $data->result_array();
    }

    
	public function getFrontProduct() {
       
        $this->db->select('products.product_name');
        $this->db->select('inventory.*');
        $this->db->from('inventory');
        $this->db->join('products', 'inventory.product_id = products.product_id','left');

        $this->db->where('inventory.product_type','front');
        $this->db->where('(inventory.quantity_in)-(inventory.quantity_out) >', 0);
        $this->db->order_by("expiry_date", 'ASC');
        $data = $this->db->get();


        return $data->result_array();
    }



    public function editInventory($inventory_id) {
     // for geting data from Inventory
     $query = $this->db->where('inventory_id', $inventory_id)->get('inventory');
     return $query->result_array();
   // for geting data from Inventory End
    }
	
	
    public function insert($table, $data) {
        $this->db->insert($table, $data);
        $LastInsert_id = $this->db->insert_id();
        return $LastInsert_id;
    }
	
	
    public function update($data,$id){
        $this->db->where('inventory_id ', $id);
      return $this->db->update('inventory',$data);
    }


	
	
    public function delete($table, $col1 = "", $id1 = "", $col2 = "", $id2 = "", $col3 = "", $id3 = "", $col4 = "", $id4 = "", $col5 = "", $id5 = "", $col6 = "", $id6 = "", $col7 = "", $id7 = "") {
        if (!empty($col1)) {
            $this->db->where($col1, $id1);
        }
        if (!empty($col2)) {
            $this->db->where($col2, $id2);
        }
        if (!empty($col3)) {
            $this->db->where($col3, $id3);
        }
        if (!empty($col4)) {
            $this->db->where($col4, $id4);
        }
        if (!empty($col5)) {
            $this->db->where($col5, $id5);
        }
        if (!empty($col6)) {
            $this->db->where($col6, $id6);
        }
        if (!empty($col7)) {
            $this->db->where($col7, $id7);
        }
        $query = $this->db->delete($table);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function update_inventry_service_product($sid,$product,$qty1){
        //if(isset($product)){
            $this->db->select('inventory_id,current_inventory');
            $this->db->from('inventory');
            //$this->db->where('service_category_id', $sid);
            $this->db->where('product_name', $product);
            $query = $this->db->get();
            $querym= $query->result_array();
            $invId = $querym[0]['inventory_id'];
            $invqty = $querym[0]['current_inventory'];
            $curQty = $invqty-$qty1;
            $postdata=[
                'current_inventory'=>$curQty
            ];
            $update =$this->db->update('inventory',$postdata,array('inventory_id' => $invId));
           // echo $this->db->last_query();die;
            return $update;

    }

    public function update_inv_by_service_product($sid,$product,$qty1){

        // foreach ($services as $key => $value) {
        //     echo'<pre>';print_r($services[0]);die;
        // }
    // print_r($sid);
    // print_r($product);
    // print_r($qty1);
    // exit();
        if(isset($product)){

            $this->db->select('inventory.*');
            $this->db->from('inventory');
            $this->db->where('inventory.service_category_id', $sid);
            $this->db->where('inventory.product_name', $product);
            $query = $this->db->get();
            $querym= $query->result_array();
         //echo'<pre>';print_r($querym);die;

        if(isset($querym[0]['inventory_id'])){
            $id=$querym[0]['inventory_id'];
            $qty=$querym[0]['current_inventory']-$qty1;
            $qty_data = array(
                'current_inventory' => $qty        
                );
            //print_r($id);
            //print_r($qty);
            //print_r($qty_data);
            //exit();
            $this->update('inventory',$qty_data,'inventory_id',$querym[0]['inventory_id']);
        }

    }

          if(isset($services[1])){
           // echo'<pre>';print_r($services[1]);die;
            $this->db->select('inventory.*');
            $this->db->from('inventory');
            $this->db->where('inventory.service_category_id', $services[1]);
            $this->db->where('inventory.product_name', $sub_serv_name2);
            $query = $this->db->get();
            $querym= $query->result_array();
        if(isset($querym[0]['inventory_id'])){
            $id=$querym[0]['inventory_id'];
            $qty=$querym[0]['current_inventory']-$qty2;
            $qty_data = array(
                'current_inventory' => $qty         
                );
            print_r($id);
            print_r($qty);
            print_r($qty_data);
            exit();
            $this->update('inventory',$qty_data,'inventory_id',$id);
        }

        }
    }



    public function update_inv_by_service_product1($services,$sub_serv_name1,$sub_serv_name2,$qty1,$qty2){

        // foreach ($services as $key => $value) {
        //     echo'<pre>';print_r($services[0]);die;
        // }

        if(isset($services[0])){

            $this->db->select('inventory.*');
            $this->db->from('inventory');
            $this->db->where('inventory.service_category_id', $services[0]);
            $this->db->where('inventory.product_name', $sub_serv_name1);
            $query = $this->db->get();
            $querym= $query->result_array();
        if(isset($querym[0]['inventory_id'])){
            $id=$querym[0]['inventory_id'];
            $qty=$querym[0]['current_inventory']-$qty1;
            $qty_data = array(
                'current_inventory' => $qty        
                );

            $this->update('inventory',$qty_data,'inventory_id',$querym[0]['inventory_id']);
        }

    }

          if(isset($services[1])){
           // echo'<pre>';print_r($services[1]);die;
            $this->db->select('inventory.*');
            $this->db->from('inventory');
            $this->db->where('inventory.service_category_id', $services[1]);
            $this->db->where('inventory.product_name', $sub_serv_name2);
            $query = $this->db->get();
            $querym= $query->result_array();
        if(isset($querym[0]['inventory_id'])){
            $id=$querym[0]['inventory_id'];
            $qty=$querym[0]['current_inventory']-$qty2;
            $qty_data = array(
                'current_inventory' => $qty         
                );
            $this->update('inventory',$qty_data,'inventory_id',$id);
        }

        }
    }


    public function get_inv_data_by_sid_and_pro_name($sid,$product_name){

            $this->db->select('inventory.*');
            $this->db->from('inventory');
            $this->db->where('inventory.service_category_id', $sid);
            $this->db->where('inventory.product_name', $product_name);
            $query = $this->db->get();
            $querym= $query->result_array();
        return $querym;
            //echo'<pre>';print_r($querym);die;

    }

    public function updateservices($data,$id){
        $this->db->where('sid', $id);
      return $this->db->update('services',$data);
    }

    public function deleteservices($id){
        $this->db->where('sid', $id);
      return $this->db->delete('services');
        
    }

}
