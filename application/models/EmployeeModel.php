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

    public function employee_be_dept($table,$dept)
    {   
        $this->db->where('department',$dept);
        $data = $this->db->get($table);
        return $data->result();
    }

    public function employeestore($data,$pay_amount)
    {
        $this->db->insert('employees', $data);
        $last_id=$this->db->insert_id();
        $created_at=date('Y-m-d H:i:s', time());
        // process of salary_inc table add salary
        $this->db->insert('salary_inc',['emp_id'=>$last_id,'pay_amount'=>$pay_amount,'created_at'=>$created_at]);
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

    public function employeeServiceAssign($services_id)
    {
       
        $empid=$services_id['emp_id'];

        $this->db->insert('services_assign',['emp_id'=>$empid,'service_category_id'=>$services_id['service_category_id'],'pay_amount'=>$services_id['pay_amount']]);

    }
    
   

    public function assign_service($id)
    {
    $this->db->where('emp_id',$id);
    $data = $this->db->get('services_assign');
    return $data->result();
    
    }

     public function salaryreport($id)
    {
    $this->db->where('emp_id',$id);
    $data = $this->db->get('salary_inc');
    return $data->result();
    
    }

    public function newSalayupdate($data,$old_data)
    {
        $this->db->insert('salary_inc', $data);

        // Update Previous Salary Last Date

        $this->db->where('id', $old_data['last_id']);
        $this->db->update('salary_inc',['end_date'=> $old_data['end_date']]);
    }

    public function running_salary_find($id){
        $this->db->select('*');
        $this->db->from('salary_inc');
        $this->db->where('emp_id', $id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }


}