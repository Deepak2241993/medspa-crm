<?php  
defined('BASEPATH') OR exit('No direct script access allowed'); 
  
class RevenueModel extends CI_Model {  
  
    function __construct()
    {   
        /*call model constructor */
        parent::__construct();   
    }     
          
        function fetchtableyear() 
        {  
            $query = $this->db->query('select year(created_at) as year, sum(tamount) as tamount ,sum(total_expens)  as servivepay from invoice group by year(created_at)');   

            return $query->result();  
        }  
        function fetchtabledaley() 
        {  
            $y=date('Y');
             $m=date('m');
              $d=date('d');
           
            $query = $this->db->query('select day(created_at) as day, sum(tamount) as tamount ,sum(total_expens)  as servivepay from invoice  WHERE year(created_at) = '.$y.' AND month(created_at)='.$m.' AND day(created_at)='.$d.' group by day(created_at)');   
      // print_r( $this->db->last_query());die;
           return $query->result();  
        } 
        
         function fetchtIDabledaleyID() 
        {  
            $y=date('Y');
             $m=date('m');
              $d=date('d');
           
            $query = $this->db->query('select id from invoice  WHERE year(created_at) = '.$y.' AND month(created_at)='.$m.' AND day(created_at)='.$d);   
      // print_r( $this->db->last_query());die;
           return $query->result();  
        } 
        
        function fetchmonthbyis() 
        {  
          
            $nowdate=date('Y');
            $query = $this->db->query('select month(created_at) as month, sum(tamount) as tamount ,sum(total_expens)  as servivepay from invoice WHERE year(created_at) = '.$nowdate.' group by month(created_at)' );   
        //print_r( $this->db->last_query());die;
           return $query->result();  
        }
        
        public function getallinvoicidBymonth(){
             $nowdate=date('Y');
            $query = $this->db->query('select id from invoice WHERE year(created_at) = '.$nowdate);   
        //print_r( $this->db->last_query());die;
           return $query->result();  
        }
         function fetchweekly() 
        {  
          
            $nowdate=date('Y');
            $query = $this->db->query('select WEEK(created_at) as week, sum(tamount) as tamount,sum(total_expens)  as servivepay from invoice  WHERE year(created_at) = '.$nowdate.' group by WEEK(created_at)' );   
        //print_r( $this->db->last_query());die;
           return $query->result();  
        } 
}   
?>