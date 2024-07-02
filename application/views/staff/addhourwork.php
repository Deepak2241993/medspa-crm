<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Add Staff Work Time</h4> 
<div class="m-t-25">
<?=form_open('staff/saveWorkTime')?>
    <!-- Default Datepicker--
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-6">
    <div class="input-affix m-b-10">
        <i class="prefix-icon anticon anticon-calendar"></i>
        <input type="text" class="form-control datepicker-input" placeholder="Pick a date">
    </div>
    </div>
    </div>-->
    <?php if($this->session->flashdata('error')){  ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?> </div>
    <?php } ?>
<?php $staffname= $this->ServiceModel->getstaff(); ?>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Staff Name</label>
        <div class="col-sm-6">
            <select name="staff_id" class="form-control">
                <option value="">Select Staff name</option>
                <?php foreach($staffname as $staffname){ ?>
                <option value="<?=$staffname->id ?>"><?=$staffname->name ?></option>
               <?php } ?>
            </select>
        </div>
      
    </div>
   
     <div class="form-group row">
        <label for="inputEmail5" class="col-sm-2 col-form-label">Work Date</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="work_date" placeholder="dd/mm/yyyy" required>
        </div>
       
    </div>
    
      <div class="form-group row">
        <label for="inputEmail5" class="col-sm-2 col-form-label">Total Work Hour  </label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="work_time" id="inputEmail5" placeholder="Total work Hour (In hour)" required>
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