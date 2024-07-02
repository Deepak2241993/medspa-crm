<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class EmployeeModel extends CI_Model 

{

	function __construct()

	{

		parent::__construct();

	}

    public function getemployee($search=null)
    {   
        if(isset($search) && $search !=null){
        $data = $this->db->like('employees.name',$search['pname']);
        }
        $data = $this->db->get('employees');
        
        
        return $data->result();
    }

    public function employeestore($data)
    {
        $this->db->insert('employees', $data);
        return $this->db->insert_id();
    }

    public function employeeedit($id)

    {
     $this->db->where('id',$id);
    $data = $this->db->get('employees');
    return $data->result();
    
    }

    public function update_employee($data,$id){
	    $this->db->where('id', $id);
		$this->db->update('employees', $data);
	}

    public function deleteemployee($id){
        $this->db->where('id', $id);
      return $this->db->delete('employees');
        
    }

    public function employeeServiceAssign($data)
    {
        $empid=$data['emp_id'];
        // Delete Exsting Data
        $this->db->where('emp_id', $empid);
        $this->db->delete('services_assign');

        
        $this->db->insert('services_assign', $data);
       
        // delete blank data
        $this->db->where('emp_id', $empid);
        $this->db->where('service_category_id',0);
        $this->db->delete('services_assign');


        return $this->db->insert_id();
    }

    public function assign_service($id)
    {
    $this->db->where('emp_id',$id);
    $data = $this->db->get('services_assign');
    return $data->result();
    
    }


}