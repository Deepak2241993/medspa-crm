<?php

defined("BASEPATH") or exit("No direct script access allowed");

class PatientDashboard extends CI_Controller
{
    var $user_id;

    function __construct()
    {
        parent::__construct();

        $user_id = $this->session->userdata("pid");

        // 		print_r($user_id);die;

        if (!$user_id) {
            redirect("adminlogin", "refresh");
        }

        $this->load->model("AdminModel");

        $this->load->model("PatientModel");
        $this->load->model("MasterModel");

        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {
		if($this->session->userdata('login') && $this->session->userdata('user_type')=='patient'){
        $user_id = $this->session->userdata("pid");
        $result["money_walite"] = $this->PatientModel->get_money_walite($user_id);
        $result["patients_data"] = $this->PatientModel->getallpatient_notes_list1($user_id);
        $result["wallet_transiction"] = $this->PatientModel->getwallet_transiction($user_id);
        $result['patients_details'] = $this->PatientModel->getpatientbyID($user_id);

        $this->load->view("header");
		$this->load->view("patientsidebar");
		$this->load->view("PatientDashboard", $result);
		$this->load->view("footer");
		}
		else{
				redirect(base_url().'Admin'); 
		}
    }

    public function delete_document($id)
    {
        if($this->session->userdata('login') && $this->session->userdata('user_type')=='patient'){
        $id = $this->input->post("id");

        if ($this->input->get("id")) {
            $time = date("H:m");

            $data = [
                "check_in" => date("H:m"),
            ];

            $this->db - Where("id", $id);

            $this->db - update("provider_assign_services", $data);

            //  echo "check";die;
        }
        }
		else{
				redirect(base_url().'Admin'); 
		}
    }



    public function wallet(){
        if($this->session->userdata('login') && $this->session->userdata('user_type')=='patient'){
            $id = $this->session->userdata("pid");

            // $result["money_walite"] = $this->PatientModel->get_money_walite($user_id);
            // $result["patients_data"] = $this->PatientModel->getallpatient_notes_list1($user_id);
            // $result["wallet_transiction"] = $this->PatientModel->getwallet_transiction($user_id);
            // $result['money_walite_list'] = $this->PatientModel->get_money_walite_view($user_id);

        $result['inamount']=$this->MasterModel->viewwallet($id,'money_wallet_new');
		$service['all_services'] = $this->MasterModel->active_data('services');
		$service['all_packages'] = $this->MasterModel->active_data('package_list');
		$service_wallet['service_wallet_history']=$this->MasterModel->viewwalletservices($id);
		$patient_wallet['wallet_items']=$this->MasterModel->wallet_items($id);

		// print_r($patient_wallet); die();

		$data = ['id' => $id, 'result' => $result,'service'=> $service,'service_wallet'=>$service_wallet,'patient_wallet'=>$patient_wallet];
          
            $this->load->view("header");
            $this->load->view("patientsidebar");
            $this->load->view("patientspages/patient_wallet",$data);
            // $this->load->view("patientspages/money_wallet", $result);
            $this->load->view("footer");
        }
        else{
            redirect(base_url().'Admin'); 
            }
    }

    public function updateProfile($id){
     if($this->session->userdata('login') && $this->session->userdata('user_type')=='patient'){
        if($this->input->post('submit_data'))

        {
        $config['upload_path']          = './assets/images/uploads/patient/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        // $config['max_width']            = 768;
        // $config['max_height']           = 768;



        $this->load->library('upload', $config);

        if ($this->upload->do_upload('profile_image'))
         {
          $image = $this->upload->data('file_name');
          if(!empty($image))
          {

              $dataupdate=array(
                'profile_image'=>$image,
              );

              $result= $this->MasterModel->update_any_table($table='patient_registration',$dataupdate,$id);
                if($result)
                {
                    redirect(base_url().'PatientDashboard'); 
                }
          }

         }

        if(empty($this->input->post('password_u')))
         {
            $password=$this->input->post('password');
         }
         else{
            $password=md5($this->input->post('password_u'));
         }
        $dataupdate=array(

            'pname'=>$this->input->post('pname'),
            'email'=>$this->input->post('email'),
            'phone'=>$this->input->post('phone'),
            'full_address'=>$this->input->post('full_address'),
            'gender'=>$this->input->post('gender'),
            'age'=>$this->input->post('age'),
            'password'=>$password
        );
       $result= $this->MasterModel->update_any_table($table='patient_registration',$dataupdate,$id);
       if($result)
       {
        redirect(base_url().'PatientDashboard'); 
       }
    }
}
    else{
        redirect(base_url().'Admin'); 
        }
    }


    public function add_appointment(){
        $this->load->view("header");
        $this->load->view("patientsidebar");
        // $this->load->view("patientspages/patient_wallet", $result);
        $this->load->view("footer");
    }

    public function view_appointment(){
        $this->load->view("header");
        $this->load->view("patientsidebar");
        // $this->load->view("patientspages/patient_wallet", $result);
        $this->load->view("footer");
    }















































}

?>
