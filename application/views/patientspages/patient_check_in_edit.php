<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">

    <h4>Patient Check In Edit </h4> 

<div class="m-t-25">

<?=form_open('patients/update_patients_checkin')?>
   <!--  <h5> </h5>  -->

   <input type="hidden" id="patient_app_id" name="patient_app_id" value="<?php echo $patients_note_data[0]['appt_id'];?>" readonly>
   
   <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >Name of the Patient</label>
        <div class="col-sm-6">
             <input type="hidden" id="patient_note_id" name="patient_note_id" value="<?php if(isset($patients_note_data[0]['id'])) echo $patients_note_data[0]['id'];?>" readonly>
            
             
            <select name="pname" class="form-control"  id="pname" >
                   
            <option value="<?php if(isset($patients_note_data[0]['id'])) echo $patients_note_data[0]['id'];?>"> <?php if(isset($patients_note_data[0]['id'])) echo $patients_note_data[0]['pname'];?></option>
                   
            </select>
        </div>

        <?=form_error('pname','<div class="text-danger">','</div>')?>
    </div>
  
    

       
     <div class="form-group row" id="typesub">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Provider Name</label>
        <div class="col-sm-5">
            
            <select name="provider" class="form-control" id="provider" required>
                 <?php 
               foreach($provider as $ppa)
               {
                //   echo"<pre>";print_r($sa);die;
                   ?>
                   
                     <option value="<?php  echo $ppa->id;?>"<?php if($patients_note_data[0]['provider_id'] == $ppa->id) { echo 'selected'; } ?>><?php echo $ppa->name;?></option>
                    
                   <?php } ?>
              
            </select>
        </div>
        <!--<button type="button"class="btn btn-primary btn-xs float-right cst-btn" id="productbtn" style="height: 39px;" data-toggle="modal" data-target="#successModal1">Add New</button>-->
        <?=form_error('ttypesub','<div class="text-danger">','</div>')?>
    </div>
   
   


<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Room No</label>
        <div class="col-sm-3">
            <span style="position: absolute; margin-left: 4px; margin-top: 9px;"></span>
            <input type="number" class="form-control" id="room_no" name="room_no" value="<?php if(isset($patients_note_data[0]['room_no'])) echo $patients_note_data[0]['room_no'];?>" placeholder="room_no ">
        </div>
        <?=form_error('damount','<div class="text-danger">','</div>')?>
    </div>
    
    
  <!--   <div class="form-group row">-->
  <!--      <label for="inputEmail3" class="col-sm-2 col-form-label">Check IN </label>-->
  <!--      <div class="col-sm-6">-->
  <!--          <div class="input-group mb-3">-->
  <!--  <input type="date" class="form-control" placeholder="Age" name="check_in" aria-label="Recipient's username" aria-describedby="basic-addon2">-->
  <!--  <div class="input-group-append">-->
  <!--      <span class="input-group-text" id="basic-addon2">Time</span>-->
        <!-- <label for="birthday">Birthday:</label> -->
  <!-- <input type="date" id="age" name="age"> -->
  <!--  </div>-->
  <!--      </div>-->
  <!--      </div>-->
  <!--      <?=form_error('age','<div class="text-danger">','</div>')?>-->
  <!--  </div>-->





<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Additional comments</label>
        <div class="col-sm-3">
            <!-- <input type="text" class="form-control" id="" name="comments" placeholder="Additional comments"> -->
            <textarea rows="3" cols="70" name="comments"  placeholder="Enter text here..."><?php if(isset($patients_note_data[0]['commint'])) echo $patients_note_data[0]['commint'];?>
</textarea>
        </div>
        <?=form_error('comments','<div class="text-danger">','</div>')?>
    </div>

    <div class="form-group row">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-3">
            <input type="submit" name="submit_data" class="btn btn-primary" value="Update">
        </div>
        <div class="col-sm-4">
        </div>
    </div>
<?=form_close()?>

</div>

</div>

</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript"> 

$(document).ready(function(){
 
  // Initialize select2
  $("#pname").select2();

  });  


   //INSERT NEW DATA
   $(document).on('submit', '#type_of_listing_frm', function(event) {
        event.preventDefault();
        var service = $('#service').val().trim();
        if (service != '') {
            $.ajax({
                url: "<?php echo base_url() .'services/insert_service_data'?>",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() { //debugger;
                    $("#type_of_listing_btn").html('Please Wait...');
                    $('input[type=text],button[type=submit]', 'textarea').prop('disabled', true);
                },
                success: function(data) { //debugger;
                    $("#type_of_listing_btn").html('Submit');
                    $('input[type=text],button[type=submit]', 'textarea').prop('disabled', false);
                    if (data['error']) {
                        alert(data.error);
                    } else { //debugger;
                        $('#type_of_listing_frm')[0].reset();
                       // alert(data.success);
                        $('#successModal').modal('hide');
                        service_list_fun();
                    }
                }
            });
            
        } else {
                 alert('Fields are Required');
        }
    });
    

function service_list_fun(){

   $('#ttype').empty('');
   var url=document.URL;
   $.ajax({
     url:url+'/all_services',//baseURL+'index.php/user/userDetails',
     method: 'get',
     dataType: 'json',
     success: function(response){ //debugger
       var len = response.length;
    
       if(len > 0){
          // Read values
          $.each(response,function(key,value){

                 $("#ttype").append('<option value="'+value.sid+'">'+value.service_name+'</option>');

              });
          
 
       }else{

       }
 
     }
  });

}


     $(document).on('submit', '#type_of_listing_frm_sub', function(event) {
        event.preventDefault();
        var service = $('#ttype').val().trim();
        if (service != '') {
            $.ajax({
                url: "<?php echo base_url() .'services/insert_sub_service_data'?>",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() { //debugger;
                    $("#type_of_listing_btn").html('Please Wait...');
                    $('input[type=text],button[type=submit]', 'textarea').prop('disabled', true);
                },
                success: function(data) { //debugger;
                    $("#type_of_listing_btn").html('Submit');
                    $('input[type=text],button[type=submit]', 'textarea').prop('disabled', false);
                    if (data['error']) {
                        alert(data.error);
                    } else { //debugger;
                        $('#type_of_listing_frm_sub')[0].reset();
                       // alert(data.success);
                        $('#successModal1').modal('hide');
                        service_list_fun();
                    }
                }
            });
            
        } else {
                 alert('Fields are Required');
        }
    });


     $('#ttype').change(function(){ debugger;
   var sid = $(this).val();
   $('#ttypesub').empty('');
   var url=document.URL;
   var setutls = url.split('/');
   console.log(setutls);
   if(setutls.length==6){
    url=document.URL;
   }

   if(setutls.length==7){
    url=setutls[0]+'/'+setutls[1]+'/'+setutls[2]+'/'+setutls[3]+'/'+setutls[4]+'/'+setutls[5];
   }
   $.ajax({
     url:url+'/allsubservices',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {sid: sid},
     dataType: 'json',
     success: function(response){ //debugger
       var len = response.length;
    
       if(len > 0){
          // Read values
        //  $('#typesub').show();
        $("#ttypesub").prop('disabled', false);
          $.each(response,function(key,value){

                 $("#ttypesub").append('<option value="'+value.ssid+'">'+value.sub_service_name+'</option>');

              });
          
 
       }else{
         //$('#typesub').hide();
         $("#ttypesub").prop('disabled', true);
        // $('#typesub').empty('');
       }
 
     }
  });
 });



$("#productbtn").click(function(e){ //debugger;
 var service = $('#ttype').val().trim();
        $("#s_id").val(service);
});

function setTotalAmount() { //debugger;
   
  var damount = $("#damount").val();
  var bamount = $("#bamount").val();
  var tamount = $("#tamount").val();
  


  if(bamount !=''){
   var total=(bamount-damount);
   $("#tamount").val(total);
   //console.log(total);
  }

}
//
        //EDIT DATA
    //   $(document).on('click', '.edit_advertisement', function(){  
    //      var id= $(this).attr("mainid");
    //      $(".modal-title").html("Update Details"); 
    //         $.ajax({
    //           url:"<?php echo base_url(); ?>admin/fetch_single_advertisement",  
    //           method:"POST",  
    //           data:{id:id,taction:'update_product'},  
    //           dataType:"json",  
    //           success:function(data) { 
    //             $('#successModal').modal('show');
    //             $('#adName').val(data.adName);
    //             $('#adImageold').val(data.adImageold);
    //             $('#adUrl').val(data.adUrl);
    //             $('#id').val(id);
    //             $('#action').val('update_product');
    //           }  
    //         })  
    //       });

    // $(document).on('click','.delete_advertisement',function(event){
    //     event.preventDefault();
    //     var id= $(this).attr("mainid");
    //     if(confirm("Are you sure you Delete this?")){
    //         $.ajax({
    //             url:"<?php echo base_url(); ?>admin/delete_advertisement",
    //             method: "POST",
    //             data:{id:id},
    //             dataType:"json",
    //             success:function(data){  
    //                 if(data['error']){
    //                     alert(data.error);
    //                 }else{
    //                     alert(data.success);
    //                 }  
    //                 dataTable.ajax.reload();  
    //             } 
    //         });
    //     }
    //     else {  
    //         return false;       
    //     }
    // });
</script>