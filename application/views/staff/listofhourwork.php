<!-- Page Container START -->


<!-- <?php


?> -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>All Work Report List</h4>

 <br/>
 <?=form_open('staff/listofhourwork/'.$id)?>
    <div class="row well input-daterange">

        <div class="col-sm-3">
          <label class="control-label">Filter List</label>
           <select name="date_filter" class="form-control">
                <option value="week" <?php if($filtername=='week'){ echo 'selected';};?>>Week</option>
                <option value="month" <?php if($filtername=='month'){ echo 'selected';};?>>Month</option>
                <option value="year" <?php if($filtername=='year'){ echo 'selected';};?>>Year</option>
                <option value="all" <?php if($filtername=='all'){ echo 'selected';};?>>All</option>
            </select>
        </div>

        <div class="col-sm-2">
          <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px">
            <i class="fa fa-filter"></i> Filter
          </button>
        </div>

        <div class="col-sm-12 text-danger" id="error_log"></div>

             </div>
         <?=form_close()?>
         </br>
         <?=form_open('staff/update_hourrate_bydate/'.$id)?>
    <div class="row well input-daterange">

        <div class="col-sm-3">
          <label class="control-label">To Date</label>
           <input type="date" name="todate" class="form-control" placeholder="To Date" required>
        </div>
        <!--<div class="col-sm-3">-->
        <!--  <label class="control-label">From Date</label>-->
        <!--   <input type="date" name="fromdate" class="form-control" placeholder="From Date" required>-->
        <!--</div>-->
         <div class="col-sm-3">
          <label class="control-label">Hour Rate</label>
           <input type="number" name="hour_rate" class="form-control" placeholder="Hour Rate" required>
        </div>
        <div class="col-sm-2">
          <button class="btn btn-success btn-block" type="submit" name="update" id="" style="margin-top: 30px">
            <i class="fa fa-file"></i>Update 
          </button>
        </div>

        <div class="col-sm-12 text-danger" id="error_log"></div>

             </div>
         <?=form_close()?>


<div class="m-t-25">
<div class="table-responsive">
       <?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success');?> </div>
  <?php   }?>
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Name</th>
            <th>Hours</th>
            <th>Hourly Rate</th>
             <th>Pay</th>
             <th>day</th><th>Action</th>
             
            <!-- <th>Assign a Service</th> -->
            <!-- <th>Patient Dashboard</th> -->
        </tr>
    </thead>
    <tbody>
    	<?php
    	$sr =1;
    	foreach($staff as $pt)
    	{
        // print_r($pt);die;
    		?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$pt->name?></td>
            <td><?=$pt->work_time?$pt->work_time:'Holiday'; ?></td>
            <td><?=$pt->pay_per_hour?></td>
            
              <td><?=$pt->work_time?$pt->pay_per_hour*$pt->work_time:'--'; ?></td>
               <td><?=$pt->work_day?><br><?=$pt->work_date?></td>
  
          
            
             <!--<td><a href="<?=base_url()?>staff/editStaff/<?= $pt->id?>"  class="btn btn-primary btn-xs">Edit</a> -->
            <td><a href="javascript:void(0);" onclick="deletedat('<?php echo $pt->id ;?>');" class="btn btn-danger btn-xs">Delete</a> </td> 
           
               
            <!-- <a href="<?=base_url()?>patients/dashboard/<?= $pt->id?>" class="btn btn-primary btn-xs">Patient Dashboard</a></td> -->
        </tr>
        <?php
        $sr++;
    }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th id="hour"></th>
            <th></th>
              <th id="val"></th>
              <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>
</div>
</div>
</div>
</div>
</div>

<script> 
updateSubTotal();
function updateSubTotal() {
   
 var table = document.getElementById("data-table"),
  sumVal = 0;
  
for (var i = 1; i < table.rows.length-1; i++) {
  sumVal = parseInt(sumVal) + parseInt(table.rows[i].cells[4].innerHTML);

}

  document.getElementById("val").innerHTML = "Total PAY = $ " + parseInt(sumVal);
  
  
     
 var table = document.getElementById("data-table"),
  sumVal = 0;
  
for (var i = 1; i < table.rows.length-1; i++) {
  sumVal = parseInt(sumVal) + parseInt(table.rows[i].cells[2].innerHTML);

}

  document.getElementById("hour").innerHTML = "Total Hour = " + parseInt(sumVal);
}

    function deletedat(id){
        var url="<?php echo base_url();?>";
       var r=confirm("Do you want to delete this?");
        if (r==true)
          window.location = url+"staff/deletestaffwork/"+id;
        else
          return false;
        } 
</script>