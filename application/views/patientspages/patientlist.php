<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>All Patient's List</h4>

 <br/>
 <?=form_open('patients/allpatients')?>
    <div class="row well input-daterange">

        <div class="col-sm-4">
          <label class="control-label">Patients Name</label>
          <input class="form-control" type="text" name="pname" value="<?php if(isset($dates['pname'])){
            echo $dates['pname'];
          }?>" id="pname" placeholder="Patients Name" style="height: 40px;"/>
        </div>

        <div class="col-sm-2">
          <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px">
            <i class="fa fa-filter"></i> Filter
          </button>
        </div>

        <div class="col-sm-12 text-danger" id="error_log"></div>

             </div>
         <?=form_close()?>


<div class="m-t-25">
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Comment</th>
            <th>Assign a Service</th>
            <th>Patient Dashboard</th>
            <th>Patient Wallet</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$sr =1;
    	foreach($data as $pt)
    	{
    		?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$pt->pname?></td>
            <td><?=$pt->phone?></td>
            <td><?=$pt->email?></td>
            <td><?=$pt->gender?></td>
            <td><?=$pt->comment?></td>
            <td><a href="<?=base_url()?>patients/service/<?= $pt->prid?>" onclick="patients_visit(<?= $pt->prid?>)" id="patients_visit" class="btn btn-primary btn-xs">Assign Services</a></td>
            <td>
                <!-- <a href="<?=base_url()?>patients/view/<?= $pt->prid?>" class="btn btn-primary btn-xs">Patient Dashboard</a> -->
            <a href="<?=base_url()?>patients/dashboard/<?= $pt->prid?>" class="btn btn-primary btn-xs">Patient Dashboard</a></td>
            <td><a href="<?=base_url()?>patients/view_wallet/<?= $pt->prid?>" class="btn btn-dark">View Wallet</a></td>
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
<script type="text/javascript">
    //
function patients_visit(pid) {
    var str=document.URL;

var res = str.split("allpatients");
var urls=res[0];
 //debugger;
 $.ajax({
     url:urls+'/temp_visit/'+pid,//baseURL+'index.php/user/userDetails',
     method: 'get',
    // data: {cmp_id:cmp_id,"_token": "{{ csrf_token() }}"},
    // dataType: 'json',
     success: function(response){ //debugger
        //console.log(response);
     //  var len = response.data.length;
      return false;
       
 
     }
  });

}

 

</script>