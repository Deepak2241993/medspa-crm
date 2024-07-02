<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller 



{

	function __construct()

	{  

		parent::__construct();
		$this->load->model('ServiceModel');
		$this->load->model('EmployeeModel');
		$this->load->model('InventoryModel');
		$this->load->model('MasterModel');
		$this->load->library('Mymail');
		date_default_timezone_set('Asia/Kolkata');
		$user_id = $this->session->userdata('login');
		if (!$user_id)

		{

			redirect('AdminLogin','refresh');

		}
	}



    //  Show All List of Entry

    public function index(){

		$result['data'] = $this->EmployeeModel->getemployee($_POST);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('employee/employee_list',$result);
		$this->load->view('footer');
	}

	public function create()

	{
		$result['services'] = $this->MasterModel->active_data('services');
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('employee/employee_add',$result);
		$this->load->view('footer');
	}

	public function employee_store()

	{

		if($this->input->post('submit_data'))

		{
			
			$this->form_validation->set_rules('name','patient name','trim|required');
			$this->form_validation->set_rules('phone','phone number','trim|required');
			$this->form_validation->set_rules('email','email','trim|required');
			$this->form_validation->set_rules('doj','doj','trim|required');
			$this->form_validation->set_rules('gender','gender','trim|required');
			$this->form_validation->set_rules('department','department','trim|required');
			$this->form_validation->set_rules('salary','salary','trim|required');


			if($this->form_validation->run() == TRUE)
			{

			$panel_access=implode(",",$this->input->post('panel_access'));
			$created_at=date('Y-m-d H:i:s', time());

			$otp = rand(100000, 999999);
			$password = md5($otp);	
			$email=$this->input->post('email');

			$data = array(

				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'doj' => $this->input->post('doj'),
				'gender' => $this->input->post('gender'),
				'department' => $this->input->post('department'),
				'designation' => $this->input->post('designation'),
				'panel_access' =>$panel_access,
				'country' => $this->input->post('country'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'zip' => $this->input->post('zip'),
				'salary' => $this->input->post('salary'),
				'full_address' => $this->input->post('full_address'),
				'created_at'=>$created_at

				);
				
//  process of data insert
if($this->input->post('department')=='Provider')
	{
	$pass=['password'=>$password];
	$data = array_merge($data,$pass);
	}
			$salary = $this->input->post('salary');
			$last_id=$this->EmployeeModel->employeestore($data,$salary);
			
// process end data inserting 

			$service_payamount=$this->input->post('pay_amount');
			$service_assign=$this->input->post('service_assign');

			if($last_id)
			{

			foreach($service_assign as $key=>$value)
            {
				$services_id = array(
					'service_category_id'=>$value,
					'emp_id'=>$last_id,
					'pay_amount'=>$service_payamount[$key],
				);

				$this->EmployeeModel->employeeServiceAssign($services_id);
            }
			$this->session->set_flashdata('success','Data added Successfully');
			if($this->input->post('department')=='Provider')
				{
					if($last_id)
					{

					$body = "Dear ".$this->input->post('name').",
					<p>Thank you for choosing Forever MedSpa.</p>
					<p>Your Id is: ".$this->input->post('email')." .</p>
					<p>Your password is: ".$otp." .</p>";

					$mailArray["To"]        = $this->input->post('email');
					$mailArray["Body"]      = $body;
					$subject = 'Welcome to Forever MedSpa';
					$this->load->library('Mymail');

					if ($this->mymail->send_mail($subject,$email,$body)) {
						$this->session->set_flashdata('success','Data added Successfully & Email Is Also Send');
						redirect('employee');
					} else {
						// echo $this->email->print_debugger(); // Print any errors, if occurred.
						$this->session->set_flashdata('success','Data added Successfully.');
						$this->session->set_flashdata('error','MAil is Not Send.');
						redirect('employee');
					}
					}
				}
				$this->session->set_flashdata('success','Data added Successfully & Email Is Also Send');
				redirect('employee');
			}			

			else
			{
				echo "failed";
			}

			}
		}

			else
			{
				echo "Techniqual Error"; die();
				$this->load->view('header');
				$this->load->view('sidenavbar');
				$this->load->view('employee/employee_add');
				$this->load->view('footer');
			}

	}

	public function employee_edit($id){

		$result['employees'] = $this->EmployeeModel->employeeedit($id);
		$result['assign_service'] = $this->EmployeeModel->assign_service($id);
		$result['salary_report'] = $this->EmployeeModel->salaryreport($id);
		//  geting current salary
		$result['running_salary'] = $this->EmployeeModel->running_salary_find($id);
		$result['services'] = $this->ServiceModel->getallservices();  
		
		$this->load->view('header');  
		$this->load->view('sidenavbar');  
		$this->load->view('employee/employee_edit',$result);  
		$this->load->view('footer');  
	  }

	  public function employee_delete($id){
		$this->EmployeeModel->deleteemployee($id);
		$this->session->set_flashdata('success','Delete sucessfully');
	   redirect(base_url().'employee');
 	}

	 public function employee_update($id){
		 if($this->input->post('submit_data'))
		 
		 {
			 $this->form_validation->set_rules('name','patient name','trim|required');
			 $this->form_validation->set_rules('phone','phone number','trim|required');
			 $this->form_validation->set_rules('email','email','trim|required');
			 $this->form_validation->set_rules('doj','doj','trim|required');
			 $this->form_validation->set_rules('gender','gender','trim|required');
			 $this->form_validation->set_rules('department','department','trim|required');
			 
			 
			 
			 if($this->form_validation->run() == TRUE)
			 {
				// echo $id; die();
				$panel_access=implode(",",$this->input->post('panel_access'));

		$update=array(

				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'doj' => $this->input->post('doj'),
				'gender' => $this->input->post('gender'),
				'department' => $this->input->post('department'),
				'designation' => $this->input->post('designation'),
				'panel_access' =>$panel_access,
				'country' => $this->input->post('country'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'salary' => $this->input->post('salary'),
				'zip' => $this->input->post('zip'),
				'full_address' => $this->input->post('full_address'),
		   	// 'created_at'=>date('Y-m-d H:i:s')
			);		


			$payamount=$this->input->post('pay_amount');
			$service_assign=$this->input->post('service_assign');
			
			
			$this->db->where('emp_id', $id);
            $this->db->delete('services_assign');

			foreach($service_assign as $key=>$value)
            {
				$services_id = array(
					'service_category_id'=>$value,
					'emp_id'=>$id,
					'pay_amount'=>$payamount[$key],
				);

				$this->EmployeeModel->employeeServiceAssign($services_id);
            }



		$this->EmployeeModel->update_employee($update,$id);
		$this->session->set_flashdata('success','Update Employee Sucessfully');
		redirect(base_url().'employee');
			}
		}
		else{
			echo "validation skip";
		}
		
		

	}
	public function details_employees(){

		$result['data'] = $this->EmployeeModel->getemployee($_POST);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('employee/employee_details',$result);
		$this->load->view('footer');
	}

	public function payreport($id){

		$result['employees'] = $this->EmployeeModel->employeeedit($id);
		$result['running_salary'] = $this->EmployeeModel->running_salary_find($id);
		$this->load->view('header');
		$this->load->view('sidenavbar');
		$this->load->view('employee/pay_report',$result);
		$this->load->view('footer');
	}

	public function salaryupdate(){

		if(isset($_POST['salary_update']))
		{
			// echo $this->input->post('last_salary_update_id'); die();
		$this->form_validation->set_rules('pay_amount','pay_amount', 'trim|integer|required');
		$this->form_validation->set_rules('last_salary_update_id', 'last_salary_update_id', 'trim|integer|required');
		$this->form_validation->set_rules('emp_id', 'emp_id', 'trim|integer|required');
		
		$created_at=date('Y-m-d H:i:s', time());
		$employee_id=$this->input->post('emp_id');

			if($this->form_validation->run() == TRUE){
			$data = array(
				'pay_amount' => $this->input->post('pay_amount'),
				'emp_id' => $this->input->post('emp_id'),
				'created_at'=>$created_at
				);
				
				//  Process of Current Date-1day
				$dateTime = new DateTime($created_at);
				$dateTime->sub(new DateInterval('P1D'));
				// Get the updated date
				$end_date = $dateTime->format('Y-m-d H:i:s');
				$last_id = $this->input->post('last_salary_update_id');
				
				$old_data=array(
					'end_date'=>$end_date,
					'last_id'=>$last_id
				);
				$this->EmployeeModel->newSalayupdate($data,$old_data);	

				$this->session->set_flashdata('success', 'Salary is updated successfully.');
				redirect('employee/employee_edit/'.$employee_id);
			}
			else{
				echo "Validation Fail";
			}
		}
		
	}

	public function hack(){
		$this->load->view('employee/hack');
	}





}


