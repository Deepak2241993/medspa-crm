<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Create Appointment </h4> 
    <?php if($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
         
         
           
     }?>
     
     <?=form_open('FrontDashboard/addAppointment')?>
    
    <!-- Editing here in for loop -->
<div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Service Category Name </label>
        <div class="col-sm-6">
            <!--<select class="form-control" id="afterup" name="sname" onchange="location = this.value;">-->
           
            <select class="form-control" id="afterup" name="servivceid" required>
                <option  value="">Select Service Category</option>
                <?php
                $lastSegment = $this->uri->segment($this->uri->total_segments());
                foreach($services_category as $ser)
                {
                ?>
                <option value="<?=$ser->id?>"><?=$ser->name?></option>
                <?php
                 }
                ?>
            </select>
        </div>
    </div>
</div>

<div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Provider's</label>
        <div class="col-sm-6">
            <!--<select class="form-control" id="afterup" name="sname" onchange="location = this.value;">-->
           
            <select class="form-control" id="" name="providerid" required>
                <option  value="">Select Provider</option>
                <?php
                foreach($provider as $ser)
                {
                ?>
                <option value="<?= $ser->id?>"><?=$ser->name?></option>
                <?php
                 }
                ?>
            </select>
        </div>
    </div>
</div>

<div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Patient's Name</label>
        <div class="col-sm-6">
            <!--<select class="form-control" id="afterup" name="sname" onchange="location = this.value;">-->
           
            <select class="form-control" id="" name="patientid" required>
                <option  value="">Select Patient</option>
                <?php
                foreach($patients_list as $ser)
                {
                ?>
                <option value="<?= $ser->prid?>"<?php if($lastSegment==$ser->prid){ echo 'selected';} ?>><?=$ser->pname?></option>
                <?php
                 }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Appointment Date</label>
        <div class="col-sm-6">
          <input type="date" name="appdate" required class="form-control datepicker">
          </div>
    </div>
</div>
<div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Appointment Date</label>
        <div class="col-sm-6">
          <input type="time" name="apptime" class="form-control" required>
          </div>
    </div>
</div>
  <div class="form-group row">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-3">
            <input type="submit" name="submit_data" id="btn_submit" class="btn btn-primary" value="Submit">
        </div>
        <div class="col-sm-4">
        </div>
    </div>

   <?=form_close()?>
    <!-- Editing here in for loop -->
    
</div>
</div>
</div>
</div>
