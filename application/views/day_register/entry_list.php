<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">

    <h4><?=date('d.M.Y') ?> Day Register</h4>
    <?php if($this->session->flashdata('msg')){ ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('msg');?> </div>
  <?php   }?>
    <a href="<?=base_url()?>FrontDashboard/createAppointment" class="btn btn-primary btn-xs float-right cst-btn" style="margin-left: 7px;">Create Appointment</a> &nbsp; <a href="<?=base_url()?>DayRegister/new_entry" class="btn btn-primary btn-xs float-right cst-btn">Add Patient</a>
 <br/>
 <?=form_open('patients/patient_note_list')?>
    <div class="row well input-daterange">

        <div class="col-sm-3">
          <label class="control-label">Start date</label>
          <input class="form-control datepicker" type="date" name="min" value="<?php if(isset($dates['min'])){
            echo $dates['min'];
          }?>" id="min" placeholder="yyyy-mm-dd" style="height: 40px;" required/>
        </div>

        <div class="col-sm-3">
          <label class="control-label">End date</label>
          <input class="form-control datepicker" type="date" name="max" value="<?php if(isset($dates['max'])){
            echo $dates['max'];
          }?>" id="max" placeholder="yyyy-mm-dd" style="height: 40px;" required/>
        </div>

        <div class="col-sm-2 ">
          <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px">
            <i class="fa fa-filter"></i> Filter
          </button>
        </div>         
    </div>

<?=form_close()?>



      <div class="row well input-daterange">

        <div class="col-sm-12 mt-4">

          <label class="control-label">Search Patients Name/Phone</label>

          <input class="form-control" type="text" id="filter_search" onkeyup="sendData();" placeholder="----Patients Name / Phone----"  style="height: 40px;"/>

        </div>

        <div class="col-sm-2">

        <div id="add_new_record"></div>

        </div>

      </div>

<div class="m-t-25">

<div class="table-responsive">

<table id="data-table" class="table table-bordered">

    <thead>

        <tr>

            <th>SR No.</th>

            <th>Date</th>

            <th>Name</th>

            <th>Phone Number</th>

            <th>Email</th>
            

            <th>Gender</th>

            <th>Age</th>
            <th>Appointment Date(YYYY-MM-DD)</th>
            <th>Appointment Time</th>

            
        </tr>

    </thead>

    <tbody>

    	<?php

    	$sr =1;
// print_r($data); die();
    	foreach($data as $key=>$pt)

    	{

      if(date('Y-m-d')==$pt->app_date)
      {

    		?>

        <tr>

            <td><?=$sr?></td>

            <td><?php if(!empty($pt->app_date)){ echo $pt->app_date;}?></td>

            <td><?=$pt->name?></td>

            <td><?=$pt->phone?></td>

            <td><?=$pt->email?></td>
         

            <td><?=$pt->gender?></td>

            <td><?=$pt->age?></td>
            <td><?=$pt->app_date?></td>
            <td><?=$pt->app_time?></td>

            

        </tr>


        


        <?php $sr++;    } } ?>

    </tbody>


</table>

</div>

</div>

</div>

</div>

</div>



<!-- Modal Section -->

<!-- Button trigger modal -->








<script type="text/javascript">

//  for model open and set value

function modelopen(id){

  document.getElementById("advance_book_id").value =id;

}

//  model code end 



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



<script>

   function sendData(){

        var filter_input = $('#filter_search').val().trim();

        if (filter_input != '') {

            $.ajax({

                url: "DayRegister/filter_date",

                method: 'POST',

                data: {

                  input:filter_input

                },

                dataType: 'HTML',

                // beforeSend: function() {

                //     $("#filter_result").html('Please Wait...');

                // },

                success: function(data) {

                  if(data!='No Data Found')

                  {

                    $("table").html(data);

                    $('#add_new_record').hide();

                  }

                  else{

                    $("table").html('<p class="text-primary">No Data Found</p>');

                    $('#add_new_record').show();

                    $('#add_new_record').html('<label class="control-label">Action</label><a class="btn btn-primary" href="DayRegister/new_entry">Add New Data</a>');

                  }

                    

                  

                }

            });

            

        } 

  }

    </script>