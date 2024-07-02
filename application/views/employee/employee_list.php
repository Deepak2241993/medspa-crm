
<div class="page-container">
 <!-- Content Wrapper START -->
<div class="card">
<div class="card-body">
    <h4>All Employee's List</h4>

<div class="m-t-25">
<div class="table-responsive">
<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success');?> </div>
  <?php }?>
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Join Date</th>          
            <th>Salary(Per Hour)</th>          
            <th>Action</th>
           
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
            <td><?php $result = $this->EmployeeModel->running_salary_find($pt->id);if(!empty($result[0]->pay_amount)) { echo $result[0]->pay_amount;} else { echo "Null";} ?></td>
            
            <td><a href="<?=base_url()?>employee/employee_edit/<?= $pt->id?>"  class="btn btn-primary btn-xs">Edit</a>
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
          window.location = url+"employee/employee_delete/"+id;
        else
          return false;
        } 
</script>