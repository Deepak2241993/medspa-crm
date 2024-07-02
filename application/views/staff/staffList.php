<!-- Page Container START -->


<!-- <?php


?> -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>All Staff List</h4>

 <br/>
 <?=form_open('patients/allpatients')?>
    <!--<div class="row well input-daterange">-->

    <!--    <div class="col-sm-4">-->
    <!--      <label class="control-label">Provider Name</label>-->
    <!--      <input class="form-control" type="text" name="pname" value=" // if(isset($dates['pname'])){-->
    <!--       // echo $dates['pname'];-->
    <!--      //}?>" id="pname" placeholder="Provider Name" style="height: 40px;"/>-->
    <!--    </div>-->

    <!--    <div class="col-sm-2">-->
    <!--      <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px">-->
    <!--        <i class="fa fa-filter"></i> Filter-->
    <!--      </button>-->
    <!--    </div>-->

    <!--    <div class="col-sm-12 text-danger" id="error_log"></div>-->

    <!--         </div>-->
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
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
            <th> Salary Par Hour</th>            
            <th> Service Name</th>            
            <th> Pay Par Service</th>            
             <th>Gender</th> 
             <th>Work Report</th> 
             <th>Dashboard</th> 
             <th>Action</th> 
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
            <td><?=$pt->email?></td>
            <td><?=$pt->phone?></td>
            <td><img src="<?= base_url().'uploads/'.$pt->image?>" style="width:100px; height:100px"></td>
           
            <td>$ <?=$pt->pay_per_hour?></td>
            <td><?=$pt->service_name?></td>
            <td>$ <?=$pt->pay_per_service?></td>
           
             
           <td><?=$pt->gender ?></td> 
           <td><a href="<?=base_url()?>staff/listofhourwork/<?= $pt->id?>" class="btn btn-primary btn-xs">Work Report</a></td> 
           <td><a href="<?=base_url()?>staff/staffDashboard/<?= $pt->id?>" class="btn btn-primary btn-xs">Go To Dashboard</a></td> 
            
             <td><a href="<?=base_url()?>staff/editStaff/<?= $pt->id?>"  class="btn btn-primary btn-xs">Edit</a>
             <a href="javascript:void(0);" onclick="deletedat('<?php echo $pt->id ;?>');" class="btn btn-danger btn-xs">Delete</a> </td> 
           
               
            
        </tr>
        <?php
        $sr++;
    }
        ?>
    </tbody>
    <!--<tfoot>
        <tr>
            <th>...</th>
        </tr>
    </tfoot>-->
</table>
</div>
</div>
</div>
</div>
</div>

<script>
    function deletedat(id){
        var url="<?php echo base_url();?>";
       var r=confirm("Do you want to delete this?");
        if (r==true)
          window.location = url+"staff/deletestaff/"+id;
        else
          return false;
        } 
</script>