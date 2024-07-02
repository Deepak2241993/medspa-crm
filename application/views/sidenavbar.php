<!-- Side Nav START -->
<?php
$panel_access=$this->session->userdata('panel_access');

?>
<div class="side-nav">
   <div class="side-nav-inner">
      <ul class="side-nav-menu scrollable" id="nav-accordion">
         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="
               <?php
               if($this->session->userdata('user_type')=='Admin')
               { 
               echo base_url('AdminDashboard');
               }
              
               if($this->session->userdata('user_type')=='Provider')
               { 
                  echo base_url('ProviderDashboard');
               }
               if($this->session->userdata('user_type')=='Front Desk Representative')
               {  
                  echo base_url('FrontDashboard');
               }
               if($this->session->userdata('user_type')=='patient')
               { 
                  echo base_url('PatientDashboard');
               } ?>">
               <span class="icon-holder"><i class="anticon anticon-dashboard"></i></span>
               <span class="title">Dashboard</span></span>
            </a>
         </li>

        
            
            <?php 
           
            if(in_array("Admin", $this->session->userdata('panel_access')) && $this->session->userdata('user_type')=='Admin')
            {?>
            
         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='Provider') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);">
               <span class="icon-holder"><i class="fa fa-heartbeat"></i></span>
               <span class="title">Manage Employee</span>
               <span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <!-- URL Sent in Route file -->
            <ul class="dropdown-menu"style="display:<?php if($this->uri->segment(1)=='Provider') echo "block"; ?>">
               <li><a href="<?=base_url()?>employee/create">Add Employee</a></li>
               <li><a href="<?=base_url()?>employee">View Employees</a></li>
               <li><a href="<?=base_url()?>employee/details_employees">Detailed of Employees</a></li>
               <!-- <li><a href="<?=base_url()?>employee/details_employees">For Employee Screen</a></li>
               <li><a href="<?=base_url()?>staff/all_calculation">Over All Calculation</a></li> -->
            </ul>
         </li>
         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='services') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);">
               <span class="icon-holder"><i class="fa fa-globe"></i></span><span class="title">Manage Services</span>
                <span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='services' ? 'block': 'none'; ?>">
             
               <li><a href="<?=base_url('services/viewcategory')?>">Services Categories</a></li>
               <li><a href="<?=base_url('services')?>">Services</a></li>
               <li><a href="<?=base_url('packages')?>">Pacakeges</a></li>
               <!-- <li><a href="<?=base_url('services/viewSubServiceList')?>">Sub Services</a></li>
               <li><a href="<?=base_url()?>services/neurotoxin">Neurotoxin</a></li> -->
            </ul>
         </li>
         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='invoice') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-form"></i></span><span class="title">Invoicing & Payment</span><span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='invoice' ? 'block': 'none'; ?>">
               <li><a href="<?=base_url('invoice')?>">Create Invoice</a></li>
               <li><a href="<?=base_url('invoice/invoice_list')?>">View Invoices</a></li>
            </ul>
         </li>
         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='inventory') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-hdd"></i></span><span class="title">Inventory</span><span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='inventory' ? 'block': 'none'; ?>">
               <li><a href="<?=base_url()?>inventory/">Introduce Product</a></li>
               <li><a href="<?=base_url('inventory/view_inventory')?>">View Inventory</a></li>

               <li><a href="<?=base_url('inventory/frontdesk')?>">Frontdesk Product</a></li>
            </ul>
         </li>

        
         <!-- <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='trevenu') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder">
               <i class="anticon anticon-build"></i></span>
               <span class="title">Total Revenue</span><span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='trevenu' ? 'block': 'none'; ?>">
               <li><a href="<?php echo base_url('revenue/DailyData'); ?>">Daily</a></li>
               <li><a href="<?php echo base_url('revenue/WeekData'); ?>">Week</a></li>
               <li><a href="<?php echo base_url('revenue/MonthData'); ?>">Month</a></li>
               <li><a href="<?php echo base_url('revenue/yearData'); ?>">Yearly</a></li>
            </ul>
         </li>

         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='srevenu') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder">
               <i class="anticon anticon-build"></i></span><span class="title">Services Revenue</span><span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='srevenu' ? 'block': 'none'; ?>">
               <li>
                  <a href="<?php echo base_url('revenue/DailyData'); ?>">Daily</a>
               </li>
               <li><a href="<?php echo base_url('revenue/weekservies'); ?>">Week</a></li>
               <li><a href="<?php echo base_url('revenue/monthservies'); ?>">Month</a></li>
               <li><a href="<?php echo base_url('revenue/yearservies'); ?>">Yearly</a></li>
            </ul>
         </li> -->
         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='patients') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="fa fa-heartbeat"></i></span><span class="title">Patients</span>
            <span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='patients' ? 'block': 'none'; ?>">
               <li><a href="<?=base_url()?>patients/allpatients">Patient List</a></li>
               <li><a href="<?=base_url()?>DayRegister/new_entry">Registration</a></li>
               <li><a href="<?=base_url()?>patients/patient_note_list/">Patient Notes List</a></li>
               <li><a href="<?=base_url()?>patients/patients_preparation_form/">Patient's Preparation</a></li>
            </ul>
         </li>

         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='invoice') echo "active"; ?>>
               <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-form"></i></span><span class="title">Day Register</span><span class="arrow"><i class="arrow-icon"></i></span>
               </a>
               <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='invoice' ? 'block': 'none'; ?>">
                  <li><a href="<?=base_url('DayRegister/new_entry')?>">Add New Entry</a></li>
                  <li><a href="<?=base_url('DayRegister')?>">View Entry</a></li>
                  <li><a href="<?=base_url('DayRegister/merge_duplicate')?>">Merge Duplicate</a></li>
               </ul>
            </li>

            <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='invoice') echo "active"; ?>>
               <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-form"></i></span><span class="title">All Appointment</span><span class="arrow"><i class="arrow-icon"></i></span>
               </a>
               <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='invoice' ? 'block': 'none'; ?>">
                  <li><a href="<?=base_url('FrontDashboard')?>">View Entry</a></li>
               </ul>
            </li>
            

         <?php } ?>

         <!--  User Type Admin End -->











         <!-- User Type Front Desk -->
         

         <?php 
         //  print_r($this->session->userdata('panel_access')); die();
          if(in_array("Front-Desk", $this->session->userdata('panel_access')) && $this->session->userdata('user_type')=='Front Desk Representative')
            {?>
            <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='invoice') echo "active"; ?>>
               <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-form"></i></span><span class="title">Day Register</span><span class="arrow"><i class="arrow-icon"></i></span>
               </a>
               <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='invoice' ? 'block': 'none'; ?>">
                  <li><a href="<?=base_url('DayRegister/new_entry')?>">Add New Entry</a></li>
                  <li><a href="<?=base_url('DayRegister')?>">View Entry</a></li>
                  <li><a href="<?=base_url('DayRegister/merge_duplicate')?>">Merge Duplicate</a></li>
               </ul>
            </li>
            
            <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='invoice') echo "active"; ?>>
               <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-form"></i></span><span class="title">All Appointment</span><span class="arrow"><i class="arrow-icon"></i></span>
               </a>
               <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='invoice' ? 'block': 'none'; ?>">
                  <li><a href="<?=base_url('FrontDashboard')?>">View Entry</a></li>
               </ul>
            </li> 
            <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='invoice') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-form"></i></span><span class="title">Invoicing & Payment</span><span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='invoice' ? 'block': 'none'; ?>">
               <li><a href="<?=base_url('invoice')?>">Create Invoice</a></li>
               <li><a href="<?=base_url('invoice/invoice_list')?>">View Invoices</a></li>
            </ul>
         </li>
            <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='inventory') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-hdd"></i></span><span class="title">Inventory</span><span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='inventory' ? 'block': 'none'; ?>">
               <li><a href="<?=base_url()?>inventory/">Introduce Product</a></li>
               <li><a href="<?=base_url('inventory/view_inventory')?>">View Inventory</a></li>
               <li><a href="<?=base_url('inventory/frontdesk')?>">Frontdesk Product</a></li>
            </ul>
         </li>

     
         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='patients') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="fa fa-heartbeat"></i></span><span class="title">Patients</span>
            <span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='patients' ? 'block': 'none'; ?>">
               <li><a href="<?=base_url()?>patients/allpatients">Patient List</a></li>
               <li><a href="<?=base_url()?>DayRegister/new_entry">Registration</a></li>
               <li><a href="<?=base_url()?>patients/patient_note_list/">Patient Notes List</a></li>
               <li><a href="<?=base_url()?>patients/patients_preparation_form/">Patient's Preparation</a></li>       
            </ul>
         </li>
         

         <?php } ?>
             <!-- User Type Front Desk END -->

        <!-- User Type Provider   -->
       <?php 
         if(in_array("Provider", $this->session->userdata('panel_access')) && $this->session->userdata('user_type')=='Provider')
         {?>

<li class="nav-item dropdown" <?php if($this->uri->segment(1)=='patients') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="fa fa-heartbeat"></i></span><span class="title">Patients</span>
            <span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='patients' ? 'block': 'none'; ?>">
               <li><a href="<?=base_url()?>patients/allpatients">Patient List</a></li>
               <li><a href="<?=base_url()?>DayRegister/new_entry">Registration</a></li>
               <li><a href="<?=base_url()?>patients/patient_note_list/">Patient Notes List</a></li>
               <li><a href="<?=base_url()?>patients/patients_preparation_form/">Patient's Preparation</a></li>     
            </ul>
         </li>
         <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='inventory') echo "active"; ?>>
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-hdd"></i></span><span class="title">Inventory</span><span class="arrow"><i class="arrow-icon"></i></span>
            </a>
            <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='inventory' ? 'block': 'none'; ?>">
               <li><a href="<?=base_url()?>inventory/">Introduce Product</a></li>
               <li><a href="<?=base_url('inventory/view_inventory')?>">View Inventory</a></li>

               <li><a href="<?=base_url('inventory/frontdesk')?>">Frontdesk Product</a></li>
            </ul>
         </li>

         <?php } ?>
        
        
        <!-- User Type Provider   -->

























      <!--PatientDashboard  --> 
         <?php   if($this->session->userdata('user_type')=='patient'){?>
            <li class="nav-item dropdown" <?php if($this->uri->segment(1)=='invoice') echo "active"; ?>>
               <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="anticon anticon-form"></i></span><span class="title">All Appointment</span><span class="arrow"><i class="arrow-icon"></i></span>
               </a>
               <ul class="dropdown-menu"style="display:<?php echo $this->uri->segment(1)=='invoice' ? 'block': 'none'; ?>">
                  <li><a href="<?=base_url('FrontDashboard')?>">View Entry</a></li>
               </ul>
            </li>
         <?php } ?>
        
         <!--  PatientDashboard End -->
         

         
      </ul>
   </div>
</div>

<!-- Side Nav END -->