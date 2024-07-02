<!-- Side Nav START -->
<div class="side-nav">
   <div class="side-nav-inner">
      <ul class="side-nav-menu scrollable">
         <li class="nav-item dropdown open">
            <a class="dropdown-toggle" href="<?=base_url()?>PatientDashboard/">
            <span class="icon-holder">
            <i class="anticon anticon-dashboard"></i>
            </span>
            <span class="title">Dashboard</span>
            </a>
         </li>
         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="<?=base_url()?>PatientDashboard/wallet">
            <span class="icon-holder">
            <i class="anticon anticon-dollar"></i>
            </span>
            <span class="title">Wallet</span>
            </a>
         </li>
         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
            <i class="anticon anticon-calendar"></i>
            </span>
            <span class=" title">Appointment</span>
            <span class="arrow">
            <i class="arrow-icon"></i>
            </span>
            </a>
            <ul class="dropdown-menu">
               <li>
                  <a href="<?=base_url()?>PatientDashboard/add_appointment">Add Appointment</a>
               </li>
               <li>
                  <a href="<?=base_url()?>PatientDashboard/view_appointment">View All Appointment</a>
               </li>
            </ul>
         </li>
         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
            <i class="anticon anticon-file"></i>
            </span>
            <span class=" title">Patient Note</span>
            <span class="arrow">
            <i class="arrow-icon"></i>
            </span>
            </a>
            <ul class="dropdown-menu">
               <li>
                  <a href="<?php echo site_url('Patients/patient_note_list1') ?>">patient note list</a>
               </li>
            </ul>
         </li>
         <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
            <span class="icon-holder">
            <i class="anticon anticon-file"></i>
            </span>
            <span class="title">Invoices Building </span>
            <span class="arrow">
            <i class="arrow-icon"></i>
            </span>
            </a>
            <ul class="dropdown-menu">
               <li>
                  <a href="<?php echo site_url('invoice/invoice_list_patient') ?>">View Invoices</a>
               </li>
            </ul>
         </li>
      </ul>
   </div>
</div>
<!-- Side Nav END -->