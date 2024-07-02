<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function get($table, $col1 = "", $id1 = "", $col2 = "", $id2 = "", $col3 = "", $id3 = "", $col4 = "", $id4 = "", $col5 = "", $id5 = "", $col6 = "", $id6 = "", $col7 = "", $id7 = "") {
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
        $query = $this->db->get($table);
        if ($query) {
            /*echo $this->db->last_query();
             die;*/
            return $query->result_array();
        } else {
            return false;
        }
    }
	
	
    public function insert($table, $data) {
        $this->db->insert($table, $data);
        $LastInsert_id = $this->db->insert_id();
        return $LastInsert_id;
    }
	
	
    public function update($table, $data, $col1 = "", $id1 = "", $col2 = "", $id2 = "", $col3 = "", $id3 = "", $col4 = "", $id4 = "", $col5 = "", $id5 = "", $col6 = "", $id6 = "", $col7 = "", $id7 = "") {
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
        $query = $this->db->update($table, $data);
        if ($query) {
            /*echo $this->db->last_query();
             die;*/
            return true;
        } else {
            return false;
        }
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
    public function update_inventry_service_product($id,$product,$qty1){
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

    public function update_inv_by_service_product($id,$product,$qty1){

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
            $this->db->where('inventory.service_category_id', $id);
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


    public function get_inv_data_by_sid_and_pro_name($id,$product_name){

            $this->db->select('inventory.*');
            $this->db->from('inventory');
            $this->db->where('inventory.service_category_id', $id);
            $this->db->where('inventory.product_name', $product_name);
            $query = $this->db->get();
            $querym= $query->result_array();
        return $querym;
            //echo'<pre>';print_r($querym);die;

    }

}
