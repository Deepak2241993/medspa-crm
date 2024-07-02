<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">

    <h4>Patient Note </h4> 

    

<div class="m-t-25">

<?=form_open('patients/save_patients_notes')?>
   <!--  <h5> </h5>  -->
  
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name of the Patient</label>
        <div class="col-sm-6">
             <input type="hidden" id="patient_note_id" name="patient_note_id" value="<?php if(isset($patients_note_data[0]['id'])) echo $patients_note_data[0]['id'];?>">
            <select name="pname" class="form-control"  id="pname">

              <?php if(!empty($patients_list)){
                    foreach($patients_list as $patients){?>
                        <option value="<?= $patients->prid?>" <?php if(isset($patients_note_data[0]['pid'])) echo ($patients->prid ==  $patients_note_data[0]['pid']) ? ' selected="selected"' : '';?>><?= $patients->pname?></option>
                    <?php }} ?>
            </select>
        </div>

        <?=form_error('pname','<div class="text-danger">','</div>')?>
    </div>

       
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Services Used/New Service</label>
        <div class="col-sm-5">
            <select name="ttype" class="form-control" id="ttype" required>
                 <option value="">Select</option>
              <?php if(!empty($treatment_type)){
                    foreach($treatment_type as $treatment){?>
                        <option value="<?= $treatment->sid?>" <?php if(isset($patients_note_data[0]['sid'])){
                        echo ($treatment->sid==  $patients_note_data[0]['sid']) ? ' selected="selected"' : '';
                        } ?>><?= $treatment->service_name?></option>
                    <?php }} ?>
            </select>
        </div>
         <button type="button"class="btn btn-primary btn-xs float-right cst-btn" style="height: 39px;" data-toggle="modal" data-target="#successModal">Add New</button>
        <?=form_error('ttype','<div class="text-danger">','</div>')?>
    </div>
   
     <div class="form-group row" id="typesub">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name/New Product</label>
        <div class="col-sm-5">
            <select name="ttypesub" class="form-control" id="ttypesub" required>
                <?php if(!empty($product_list)){
                    foreach($product_list as $product){?>
                        <option value="<?= $product->ssid?>" <?php if(isset($patients_note_data[0]['ssid'])){
                        echo ($product->ssid==  $patients_note_data[0]['ssid']) ? ' selected="selected"' : '';
                        } ?>><?= $product->sub_service_name?></option>
                    <?php }} ?>
            </select>
        </div>
        <button type="button"class="btn btn-primary btn-xs float-right cst-btn" id="productbtn" style="height: 39px;" data-toggle="modal" data-target="#successModal1">Add New</button>
        <?=form_error('ttypesub','<div class="text-danger">','</div>')?>
    </div>


<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Discount to be given</label>
        <div class="col-sm-3">
            <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" class="form-control" id="damount" name="damount" value="<?php if(isset($patients_note_data[0]['damount'])) echo $patients_note_data[0]['damount'];?>" placeholder="Discount Amount">
        </div>
        <?=form_error('damount','<div class="text-danger">','</div>')?>
    </div>

<fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-2 pt-0">Payment Recieved</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="p_text2" id="gridRadios3" value="yes" checked <?php if(isset($patients_note_data[0]['payment_status']) && $patients_note_data[0]['payment_status']=='yes') echo 'checked';?>>
                    <label for="gridRadios3">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="p_text2" id="gridRadios4" value="no" <?php if(isset($patients_note_data[0]['payment_status']) && $patients_note_data[0]['payment_status']=='no') echo 'checked';?>>
                    <label for="gridRadios4">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>


   <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Total amount to be Collected</label>
        <div class="col-sm-3">
            <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" class="form-control" id="tamount" name="tamount" value="<?php if(isset($patients_note_data[0]['tamount'])) echo $patients_note_data[0]['tamount'];?>" placeholder="Total Amount" required>
        </div>
        <?=form_error('tamount','<div class="text-danger">','</div>')?>
    </div>

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