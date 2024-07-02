<?php

defined("BASEPATH") or exit("No direct script access allowed");

class AdminLogin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("AdminModel");

        $this->load->model("PatientModel");

        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {
        $this->load->view("login");
    }

    public function checklogin()
    {
        if ($this->input->post("login")) {
            $this->form_validation->set_rules(
                "email",
                "email",
                "required|trim"
            );

            $this->form_validation->set_rules(
                "password",
                "password",
                "required|trim"
            );

            $this->form_validation->set_rules(
                "usertype",
                "user type",
                "required|trim"
            );

            if ($this->form_validation->run() == true) {
                $email = $this->input->post("email");
                $upass = md5($this->input->post("password"));
                $utype = $this->input->post("usertype");
                
                if($utype!='patient')
                {
                    $admindata = $this->AdminModel->employeeLogin($email,$utype,$upass);
                    // print_r($admindata); die();
                    if (!empty($admindata)) {
                        $panel_access = explode(",", $admindata->panel_access);
                      
                            $session_data = [
                                "id" => $admindata->id,

                                "email" => $admindata->email,

                                "name" => $admindata->name,

                                "user_type" => $admindata->department,
                                "panel_access" => $panel_access,

                                "login" => true,
                            ];

                            $this->session->set_userdata($session_data);
							if ($utype == "Provider")
							{
                            	redirect("ProviderDashboard/");
							} 
							if ($utype == "Front Desk Representative")
							{
                            	redirect("FrontDashboard/");
							}
							if ($utype == "Admin")
							{
                            	redirect("AdminDashboard/");
							}
							
								
                        }
                         else {
                           
                            $this->session->set_flashdata(
								"status",
                                "Password or User Type are incorrect !"
                            );
                            redirect("AdminLogin/");
                        }
                    
                    //  for patent
                     }
                     else {
                        $admindata = $this->AdminModel->patientlogin($email,$utype,$upass);

                        if ($admindata != "0") {
                            if (
                                $admindata->password == $upass &&
                                $admindata->user_type == $utype
                            ) {
                                $session_data = [
                                    "pid" => $admindata->prid,

                                    "email" => $admindata->email,

                                    "name" => $admindata->pname,

                                    "user_type" => $admindata->user_type,

                                    "login" => true,
                                ];

                                $this->session->set_userdata($session_data);

                                redirect("PatientDashboard/");
                            } else {
                                $this->session->set_flashdata(
                                    "status",
                                    "Password or User Type are incorrect !"
                                );

                                redirect("AdminLogin/");
                            }
                        } else {
                            $this->session->set_flashdata(
                                "status",
                                "Password or User Type are incorrect !"
                            );

                            redirect("AdminLogin/");
                        }
                    }                    
                     

            } else {
                $this->session->set_flashdata(
                    "status",
                    "Password or User Type are incorrect !"
                );

                redirect("AdminLogin/");
            }
    }
}

    public function logout()
    {
        $this->session->sess_destroy();

        $this->session->unset_userdata("__ci_last_regenerate");

        redirect("AdminLogin/");
    }
}

?>
