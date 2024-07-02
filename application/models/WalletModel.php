<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class WalletModel extends CI_Model 

{

	function __construct()

	{

		parent::__construct();

	}


    public function serviceinsert($table,$data)
	{   

        $insertResult = $this->db->insert($table, $data);

        if ($insertResult) {
             $last_id = $this->db->insert_id();

             $this->db->where('id',$last_id);
            $data = $this->db->get('service_wallet');
            return $data->result();
        } else {
            // Handle the case where the insert operation failed
        }
	}

        public function wallet_service_active($table,$data,$id,$patient_id,$transaction_id){
            $this->db->where('id', $id);
            $this->db->where('patient_id', $patient_id);
            $this->db->where('transaction_id', $transaction_id);
          return $this->db->update($table,$data);
        }
    

        public function service_wallet_view($transaction_id)
        {
            $this->db->where('transaction_id', $transaction_id); 
            $this->db->where('status', 1);
            $data = $this->db->get('service_wallet');
            return $data->result();

        }


        public function transaction_service_wallet($data) {
            $insert = $this->db->insert('transaction_service_wallet',$data);
        
            // Return the status
            return $insert?true:false;
        }
       
        public function view_available_service_in_wallet($pid){
           
            $this->db->select('transaction_service_wallet.*,added_serv.service_name as added_service,employees.name as emp_name,added_emp.name as added_person, services.service_name, services.service_charge, services.id as wallet_service_id,service_wallet.service_id as wallet_service,service_wallet.remaining_money_value,service_wallet.discount');
            $this->db->from('transaction_service_wallet');
            $this->db->join('services', 'services.id = transaction_service_wallet.service_id', 'left');
            $this->db->join('services as added_serv', 'added_serv.id = transaction_service_wallet.service_id', 'left');
            $this->db->join('service_wallet', 'service_wallet.transaction_id = transaction_service_wallet.transaction_id', 'left');
            $this->db->join('employees', 'employees.id = transaction_service_wallet.services_used_by', 'left');
            $this->db->join('employees as added_emp', 'added_emp.id = service_wallet.added_by', 'left');
            $this->db->where('transaction_service_wallet.status', 1);
            $this->db->where('transaction_service_wallet.patient_id', $pid);
            $this->db->order_by('id', 'asc');  // Order by balance_session
            
            return $this->db->get()->result();
        }

        
        public function calculation_of_wallet_services($pid,$service_id,$transaction_id){
           
            $this->db->select('transaction_service_wallet.*, services.service_name, services.service_charge, services.id as wallet_service_id,service_wallet.service_id as wallet_service,service_wallet.remaining_money_value,service_wallet.discount');
            $this->db->from('transaction_service_wallet');
            $this->db->join('services', 'services.id = transaction_service_wallet.service_id', 'left');
            $this->db->join('service_wallet', 'service_wallet.transaction_id = transaction_service_wallet.transaction_id', 'left');
            $this->db->where('transaction_service_wallet.status', 1);
            $this->db->where('transaction_service_wallet.patient_id', $pid);
            $this->db->where('transaction_service_wallet.service_id', $service_id);
            $this->db->where('transaction_service_wallet.transaction_id',$transaction_id);

            // $this->db->group_by('transaction_service_wallet.transaction_id'); 
            $this->db->group_by('transaction_service_wallet.service_id');
            
            $subquery = '(SELECT SUM(CASE WHEN service_session_qty_in IS NOT NULL AND service_session_qty_out IS NOT NULL THEN service_session_qty_in - service_session_qty_out ELSE 0 END) FROM transaction_service_wallet as sub WHERE sub.service_id = transaction_service_wallet.service_id AND sub.patient_id = ' . $pid . ') AS balance_session';
            
            $this->db->select($subquery, false); // Use false to prevent escaping
            $this->db->order_by('id', 'asc');  // Order by balance_session
            
            return $this->db->get()->result();
        }


        public function service_take_out($data,$table){
            // Add created and modified date if not included
            if(!array_key_exists("created_at", $data)){
                $data['created_at'] = date("Y-m-d H:i:s");
                $data['status'] = 1;
            }
           
            $insert = $this->db->insert($table, $data);
            // Return the status
            return $insert?$this->db->insert_id():false;
        }

        public function moneyvalueByTransactionId($tid, $table) {
            $this->db->where('transaction_id', $tid);
            $this->db->where('status', 1);
            $this->db->order_by("id", "desc");
            $this->db->limit(1); // Add a limit of 1
            $data = $this->db->get($table);
            return $data->result();
        }
        
        public function moneyvalueshow($tid,$table){
            $this->db->where('transaction_id',$tid);
            $this->db->order_by("id", "desc");
            $this->db->limit(1); // Add a limit of 1
            $data = $this->db->get($table);
            return $data->result();
        }


















}