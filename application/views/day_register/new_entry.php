<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Patient's Registration</h4> 
<div class="m-t-25">
<?=form_open('DayRegister/saveNewEntry')?>
   

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Patient's Name<span class="text-danger">*</span></label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Patient's Name" required>
        </div>
        <?=form_error('name','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail4" class="col-sm-2 col-form-label">Phone Number<span class="text-danger">*</span></label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="phone" id="inputEmail4" placeholder="Phone Number" required>
        </div>
        <?=form_error('phone','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail5" class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" id="inputEmail5" placeholder="Email" required>
        </div>
        <?=form_error('email','<div class="text-danger">','</div>')?>
    </div>
     <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Age<span class="text-danger">*</span></label>
        <div class="col-sm-6">
            <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Age" name="age" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
    <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">In Years</span>
    </div>
        </div>
        </div>
        <?=form_error('age','<div class="text-danger">','</div>')?>
    </div>
       <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-2 pt-0">Gender<span class="text-danger">*</span></label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="gender" id="gridRadios1" value="male" checked>
                    <label for="gridRadios1">
                        Male
                    </label>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="gender" id="gridRadios2" value="female">
                    <label for="gridRadios2">
                        Female
                    </label>
                </div>
            </div>
        </div>

    </fieldset>
    <div class="form-group row">
        <label for="inputEmail4" class="col-sm-2 col-form-label">Select Service Category<span class="text-danger">*</span></label>
        <div class="col-sm-6">
        <select class="form-control" id="afterup" name="service_category_id" required>
                <option  value="">Select Service Category</option>
                <?php
                foreach($servicesCategory as $ser)
                {
                ?>
                <option value="<?=$ser->id?>"><?=$ser->name?></option>
                <?php
                 }
                ?>
            </select>
        </div>
        <?=form_error('appointment_date','<div class="text-danger">','</div>')?>
    </div> 
    <h4>Appointment Section</h4>
    <hr/>
    <div class="form-group row">
        <label for="inputEmail4" class="col-sm-2 col-form-label">Select Provider</label>
        <div class="col-sm-6">
        <select class="form-control" id="" name="providerid">
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
        <?=form_error('appointment_date','<div class="text-danger">','</div>')?>
    </div> 

    <div class="form-group row">
        <label for="inputEmail4" class="col-sm-2 col-form-label">Appointment Date</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="appointment_date" id="inputEmail4" placeholder="Appointment Date">
        </div>
        <?=form_error('appointment_date','<div class="text-danger">','</div>')?>
    </div>   
    <div class="form-group row">
        <label for="inputEmail4" class="col-sm-2 col-form-label">Appointment Time</label>
        <div class="col-sm-6">
            <input type="time" class="form-control" name="appointment_time" id="inputEmail4" placeholder="Appointment Time">
        </div>
        <?=form_error('appointment_time','<div class="text-danger">','</div>')?>
    </div> 
    </div> 
 
    <div class="form-group row">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-3">
            <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
        </div>
        <div class="col-sm-4">
        </div>
    </div>
<?=form_close()?>
</div>
</div>
</div>
</div>