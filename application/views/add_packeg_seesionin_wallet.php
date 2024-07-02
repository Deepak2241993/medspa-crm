<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Add service session and peckage</h4> 
    <?php if($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
         
         
           
     }?>
     
     <?=form_open('FrontDashboard/save_session_peckage/'.$notid)?>
    
    <div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-6">
            <!--<select class="form-control" id="afterup" name="sname" onchange="location = this.value;">-->
           
            <select class="form-control" id="" name="type" required onchange="hideshow(this)">
                <option  value="">Select type</option>
               
                <option value="session">session</option>
                 <option value="peckage">peckage</option>
                
            </select>
        </div>
    </div>
</div>
    <!-- Editing here in for loop -->
<div class="m-t-25" id="services">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label"> Name </label>
        <div class="col-sm-6">
           <input  name="session_pack" class="form-control" >
          
        </div>
    </div>
</div>



<div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Patient's Name</label>
        <div class="col-sm-6">
            <!--<select class="form-control" id="afterup" name="sname" onchange="location = this.value;">-->
           
            <select class="form-control" id="" name="patientid" required>
               
                <?php
                foreach($patients_list as $ser)
                {
                ?>
                <option  value="<?= $ser->prid?>" selected><?=$ser->pname?></option>
                <?php
                 }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="m-t-25" id="session_package">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Number of session/package</label>
        <div class="col-sm-6">
          <input type="number" name="number_of_session"  class="form-control datepicker">
          </div>
    </div>
</div>
<div class="m-t-25" id="visitServices">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Pay Amount</label>
        <div class="col-sm-6">
          <input type="number" name="pay_amount" class="form-control" required>
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
<script>
    function hideshow(val){
        var wall= val.value;
        if(wall=='wallet_amount'){
          $('#services').hide();
         $('#session_package').hide();
        }else{
            $('#services').show();
         $('#session_package').show();
        }
    }
</script>
