<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}

	public function getallProduct()
    {
    $data = $this->db->get('products');
    return $data->result();
    }

    public function getProductById($id)
    {
        $this->db->where('product_id', $id);
        return $this->db->get('products')->result();
    }


    public function frontProductList()
    {
    $this->db->where('(products.product_type)','front');
    $data = $this->db->get('products');
    return $data->result();
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

}
