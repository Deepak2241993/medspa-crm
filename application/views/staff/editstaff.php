<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Edit Staff</h4> 
<div class="m-t-25">
<?=form_open('staff/updateStaff/'.$editstaff->id, array('enctype' => 'multipart/form-data'))?>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Staff Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="sname" placeholder="Name" required value="<?= $editstaff->name ?>">
        </div>
        <?=form_error('sname','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Join Date</label>
        <div class="col-sm-6">
            <div class="input-affix m-b-10">
                <i class="prefix-icon anticon anticon-calendar"></i>
                <input type="text" class="form-control datepicker-input" placeholder="Pick a date" name="doj" value="<?= $editstaff->doj ?>">
            </div>
            <?=form_error('sname','<div class="text-danger">','</div>')?>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Staff Email" required value="<?= $editstaff->email ?>">
        </div>
        <?=form_error('service_pay','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Contact Number</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Staff Contact Number" required value="<?= $editstaff->phone ?>">
        </div>
        <?=form_error('phone','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Designation</label>
        <div class="col-sm-6">
        <select class="form-control" name="designation">
            <option>Select Designation</option>
            <option>Designation 1</option>
            <option>Designation 2</option>
        </select>
        </div>
        <?=form_error('designation','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Assign Service</label>
        <div class="col-sm-6">
        <select class="form-control" name="assign_service">
            <option>Select Service</option>
            <?php foreach($services as $key=>$value)
            {?>
            <option value="<?= $value->sid ?>" <?= $value->sid == $editstaff->assign_service ? 'selected':''?>><?= $value->service_name?></option>
            <?php } ?>
            <option>Service 2</option>
        </select>
        </div>
        <?=form_error('designation','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-6">
            <textarea name="address" class="form-control"><?= $editstaff->address ?></textarea>
        </div>
        <?=form_error('address','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail5" class="col-sm-2 col-form-label">Pay per Hour(Salary)</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="pay_per_hour" id="inputEmail5" placeholder="Pay par Hour" required value="<?= $editstaff->pay_per_hour ?>">
        </div>
        <?=form_error('pay_per_hour','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail5" class="col-sm-2 col-form-label">Pay per service</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="pay_per_service" id="inputEmail5" placeholder="Pay per service" required value="<?= $editstaff->pay_per_service ?>">
        </div>
        <?=form_error('pay_per_hour','<div class="text-danger">','</div>')?>
    </div>

       <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-2 pt-0">Gender</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="gender" id="gridRadios1" value="male" <?php if($editstaff->gender=='male'){ echo 'checked';}  ?>>
                    <label for="gridRadios1">
                        Male
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="gender" id="gridRadios2" value="female" <?php if($editstaff->gender=='female'){ echo 'checked';}  ?>>
                    <label for="gridRadios2">
                        Female
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <label for="image" class="col-sm-2 col-form-label">Document upload</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="col-sm-2">
            <img src="<?= base_url().'uploads/'.$editstaff->image?>" style="width:50px; height:50px;">
        </div>
        <?=form_error('service_pay','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-6">
        <select class="form-control" name="status">
            <option value="1"<?php echo  ($editstaff->status==1) ? 'selected':''?>>Active</option>
            <option value="0"<?php echo  ($editstaff->status==0) ? 'selected':''?>>Inactive</option>
        </select>
        </div>
        <?=form_error('service_pay','<div class="text-danger">','</div>')?>
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