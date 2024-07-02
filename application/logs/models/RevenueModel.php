<?php  
defined('BASEPATH') OR exit('No direct script access allowed'); 
  
class RevenueModel extends CI_Model {  
  
    function __construct()
    {   
        /*call model constructor */
        parent::__construct();   
    }     
          
        function fetchtable() 
        {  
            $query = $this->db->query('select year(created_at) as year, month(created_at) as month, sum(tamount) as tamount from patient_notes group by year(created_at), month(created_at)');   

            return $query->result();  
        }   
}   
?>