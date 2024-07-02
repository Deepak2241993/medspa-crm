<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class DayRegister extends CI_Controller 



{



	function __construct()

	{

		parent::__construct();

		$this->load->model('ServiceModel');

		$this->load->model('PatientModel');

		$this->load->model('InventoryModel');

		date_default_timezone_set('Asia/Kolkata');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}


	}



    //  Show All List of Entry

    public function index(){

		$result['data'] = $this->PatientModel->today_patient_visit();
		
		$result['dates']= $_POST;

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('day_register/entry_list',$result);

		$this->load->view('footer');

    }



	public function filter_date()
{

    $result['services'] = $this->PatientModel->getserivces();
    $result['provider'] = $this->PatientModel->getallprovider();

    if (isset($_POST['input'])) {
        $received_data = $_POST['input'];

        $result['data'] = $this->PatientModel->dayregister_filter($received_data);

        if (count($result['data']) > 0) {
            echo "<thead>
                <tr>
                    <th>SR No.</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Appointment</th>
                </tr>
            </thead>
            <tbody>";

            foreach ($result['data'] as $key => $value) {
                echo "<tr>
                    <td>" . ($key + 1) . "</td>
                    <td>" . htmlspecialchars($value['pname']) . "</td>
                    <td>" . htmlspecialchars($value['phone']) . "</td>
                    <td>" . htmlspecialchars($value['email']) . "</td>
                    <td>" . htmlspecialchars($value['gender']) . "</td>
                    <td>" . htmlspecialchars($value['age']) . "</td>
                    <td>
                        <a href='" . base_url() . "FrontDashboard/createAppointment/" . $value['prid'] . "' id='patients_visit' class='btn btn-primary'>Create Appointment</a>
                       
                    </td>
                </tr>";
            }

            echo "</tbody>";
        } else {
            echo "No Data Found";
        }
    }
}





	function appointment_book_advance(){

		$data=array('patient_id'=>$this->input->post('patient_id'),
		'provider_id'=>$this->input->post('providerid'),
		'service_category_id'=>$this->input->post('servivceid'),
		'app_date' =>$this->input->post('appointment_date'),
		'app_time'=>$this->input->post('appointment_time'),
		'created_on'=>date('Y-m-d H:i:s')
		
		);
		// print_r($data); die();
		$this->PatientModel->addAppointment($data);
		
       	$LastInsert_id = $this->db->insert_id();

		   redirect('DayRegister');

	}



	function new_entry(){
		$result['servicesCategory'] = $this->PatientModel->getserivcesCagegory();
		$result['provider'] = $this->PatientModel->getallprovider();

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('day_register/new_entry',$result);

		$this->load->view('footer');

	}



	function saveNewEntry(){



		$name=$this->input->post('name'); 

		$email=$this->input->post('email'); 

		$phone=$this->input->post('phone'); 

		$age=$this->input->post('age'); 

		$gender=$this->input->post('gender'); 

		$appointment_time=$this->input->post('appointment_time'); 

		$user_type='patient';
		$password=md5($phone);


		$visit_date=$this->input->post('appointment_date'); 



		$fillerdata=array('pname'=>$name, 'phone'=>$phone, 'email'=>$email, 'gender'=>$gender, 'age'=>$age,'user_type'=>$user_type,'password'=>$password,'status'=>1);

		$this->db->insert('patient_registration', $fillerdata);

       	$LastInsert_id = $this->db->insert_id();

// Appoinment Create
			$service_cat_id=$this->input->post('service_category_id');
			$appointment_date=$this->input->post('appointment_date');
			$providerid=$this->input->post('providerid');
			if(!empty($appointment_date) && !empty($appointment_time) && !empty($providerid))
			{
			$data=array('patient_id'=>$LastInsert_id,
			'provider_id'=>$providerid,
			'service_category_id'=>$service_cat_id,
			'app_date' =>$appointment_date,
			'app_time'=>$appointment_time,
			'created_on'=>date('Y-m-d H:i:s')

			);

		   $this->PatientModel->addAppointment($data);
			}
		//   Daily Register Entry
		
		$daily_register_record=array('patient_id'=>$LastInsert_id, 'appointment_date'=>$appointment_date,'appointment_time'=>$appointment_time,'service_category_id'=>$service_cat_id);

		$this->db->insert('daily_register', $daily_register_record);
		
		if(!empty($appointment_date) && !empty($appointment_time) && !empty($providerid))
		{
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Day Register Entry and Appoinment Created Successfully</div>');  
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center msg">Day Register Entry Created Successfully</div>');  
		}	
		redirect('DayRegister');



	}



	function merge_duplicate()

	{

		$this->load->view('header');

		$this->load->view('sidenavbar');

		$this->load->view('day_register/merge_duplicate');

		$this->load->view('footer');

	}



//  Duplicate data ploat on view 



	public function duplicate_date(){



			$received_data=$this->input->post('input'); 

			$result['data'] = $this->PatientModel->dayregister_filter($received_data);

			if(count($result['data'])>0)

			{

			

				$this->load->view('header');

				$this->load->view('sidenavbar');

				$this->load->view('day_register/merge_duplicate',$result);

				$this->load->view('footer');

			

			}

			else{

				$result['msg']='<h3 class="text-danger">Data Not Found</h3>';

				$this->load->view('header');

				$this->load->view('sidenavbar');

				$this->load->view('day_register/merge_duplicate',$result);

				$this->load->view('footer');

			}



    

}



// For data merge process

 public function datamerge(){

	if (isset($_POST['source_id']) && isset($_POST['destination_id'])) {

		$sid = $_POST['source_id'];

		$did = $_POST['destination_id'];



		if($sid!=$did){

		

        $result=$this->PatientModel->updatepatientData($sid, $did);

		if($result)

		{

			echo "<h1 class='text-primary mt-5'>Data Updated</h1>";

		}

		else{

			echo "<h1 class='text-primary mt-5'>Fail</h1>";

		}

	}

	else{

		echo "<h1 class='text-danger mt-5'>Source and Destination data are Same</h1>";

	}

		

	}



 }





























     

    



}

?>