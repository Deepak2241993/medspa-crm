
<div class="page-container">
 <!-- Content Wrapper START -->
<div class="card">
<div class="card-body">
    <h4>All Employee's Details</h4>
    
    <div class="row m-t-25">
        <div class="col-md-2">
            <a href="<?=base_url()?>employee/create"class="btn btn-primary mt-4">Add Employee</a>
        </div>
        <form>
            <div class="row">
            <div class="col-md-4">
            <label id="start_date">Start Period</lable>
                <input type="date" class="form-control" id="start_date">
            </div>
            <div class="col-md-4">
                <label id="last_date">End Period</lable>
                <input type="date" class="form-control" id="last_date">
            </div>
            <div class="col-md-2">
            <button type="button" class="btn btn-primary mt-4">Submit</button>
            </div>
            </div>
        </form>
    </div>
    


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
            <th>Pay Rate/Hour</th>
            <th>HR in Pay Period</th>
            <th>Salary in Pay Period</th>          
            <th>Service Pay</th>          
            <th>Software Access</th>          
            <th>Service Assign</th>          
            <th>Contact Details</th>          
            <th>Detail</th>          
           
           
        </tr>
    </thead>
    <tbody>
    	<?php
    	$sr =1;
    	foreach($data as $pt)
    	{
        // print_r($pt);die;
    		?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$pt->name?></td>
            <td><?=$pt->email?></td>
            <td><?=$pt->phone?></td>
            <td><?=$pt->doj?></td>
            <td><?=$pt->salary?></td>
            <td><?=$pt->salary?></td>
            <td><?=$pt->salary?></td>
            <td><?=$pt->salary?></td>
            <td><a href="<?=base_url()?>employee/payreport/<?= $pt->id?>"class="btn btn-primary mt-4">Detail View</a></td>
          
            
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
          window.location = url+"employee/employee_delete/"+id;
        else
          return false;
        } 
</script>