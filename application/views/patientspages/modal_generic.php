<!-- Page Container START -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous"
  referrerpolicy="no-referrer" />


<div class="page-container">
 <!-- Content Wrapper START -->
 <?php //echo'<pre>';print_r($sdata[0]);die;
 
  $patient_id = $this->uri->segment(4);
  $notes_id = $this->uri->segment(3);
 ?>
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Generic service</h4>
            
<div class="m-t-25" id="rdo">
<?=form_open('patients/genericServices')?>
<br>    
       <input type="hidden" name="service_pay" id="service_pay" >
       <input type="hidden" name="p_notes_id" id="p_notes_id" value="<?=$notes_id?>">
       <input type="hidden" name="sid" id="sid" value="">
       <input type="hidden" name="pid" id="pid" value="<?=$patient_id?>">
       
    <?php $provider_Data =$this->session->userdata('id'); ?>
         <input type="hidden" name="prov_id" id="prov_id" value="<?=$provider_Data?>">
        <!--<input type="hidden" name="qty" id="qty" value="">-->
        <div class="form-group row">
            <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Patient Name</b> : <?=$pname->pname ?></label>
          
            <div class="col-sm-3">
            </div>
            <div class="col-sm-3">
            <input type="hidden"   id="addservicecharge">
            <input type="hidden"   id="allproductamount">
         
            </div>
        </div>
        <a href="https://misfitamigos.com/forevermedspa_new/FrontDashboard/add_packeg_wallet_session/<?=$notesid ?>/<?=$pid ?>" class="btn btn-primary btn-xs float-right cst-btn">Add package/session</a></h4> 
        <?php if(!empty($session_package)){ ?>
       <div class="row">
           <?php  foreach($session_package as $sesspackage){  ?>
           <div class="col-lg-4">
             <label style="font-size: 16px;font-weight: 2px; padding-top: 41px;" class="col-sm-6 col-form-label"><b><?=$sesspackage->name_see_pack ?></b> :</label>
            </div>
             <div class="col-lg-4">
             <label style="font-size: 16px;font-weight: 2px; padding-top: 41px;" class="col-sm-6 col-form-label"><b>Available Quantity</b> : <?=$sesspackage->number_of_session_package ?></label>
            </div>
            <div class="col-lg-4">
                  <label style="font-size: 16px;font-weight: 2px;" class="col-sm-6 col-form-label"><b>Enter Use Quantity</b></label>
                  <input name="use_quanty_sess" class="form-control" value="">
            </div>
            <?php } ?>
       </div>
        <?php } ?>
<!-- Select2 CSS --> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

<!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<hr style="background-color:grey;height: 1px;">


        <div class="container mt-5">
        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Service Name</b></label>
          <select class="col-sm-6 form-control" aria-label="size 3 select example" id='selUser' onchange="getservicedata(this)" required>
              <option value="" >Select a Service</option>
              <?php foreach($servicesdata as $serdata){ ?>
                
            <option value="<?=$serdata->sid ?>_<?=$serdata->service_charge ?>"><?=$serdata->service_name ?></option>
         
            <?php  } ?>
           
          </select>
        </div>
         
        <div id="divSubService" class="container mt-5">
            
        </div>
        
        <div class="col-lg-6">
<table class="table" id="tbaleproduct" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h5>Use product</h5>
</th>
</tr>
<tr class="text-center">

<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Products</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>

</tr>
</thead>

<tbody id="tbodyid">
<tr class="tr_clone" id="tr_clone"> 
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control selUser"  data-live-search="true" name="product[]"  id='prow_1'>
<option value="">Select product</option>
 <?php foreach($productsdata as $productsdatas){ ?>
  
 <option value="<?=$productsdatas->inventory_id?>_<?=$productsdatas->current_sell_cost ?>" ><?=$productsdatas->product_name ;?></option>
 
 <?php  } ?>
</select>
</td>

<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="pqty[]" id='qty_1' class="form-control Cheek_t" onchange="Amount_cal(this,1)" placeholder="Enter Qty"></td>
</tr>

</tbody>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="javascript:void(0);" id="addrow"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success cal" href="javascript:void(0);" onclick="productaddsum()" style="margin-left: 231px;">Calculate</button></td>
</table>

              </div>



<div class="container">
 

    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Additional comments</b></label>
    <div class="col-sm-4">
    <textarea rows="3" cols="70" name="comments" class="form-control" placeholder="Enter text here...">
    </textarea>
    </div>
    </div>
    <br>

    <!---edit here/////////////////////////-->
    <!--data to comment-->
    <fieldset class="form-group">
    <div class="row">
    <label class="col-form-label col-sm-3 pt-0"><h5>Select Charge By:</h5></label>
    <div class="col-sm-2" >
    <div class="radio">
    <input type="radio" name="group_on" class="more_s" id="gridRadios5" value="service" >
    <label for="gridRadios5">
       Service
    </label>
    <input type="number" name="sqty" class="form-control" id="serveqty" style="display:none" value="1" placeholder="Service Quentity"  onchange="servicequnty();">
    
    </div>
    </div>
    <div class="col-sm-2">
    <div class="radio">
    <input type="radio" name="group_on" class="more_n" id="gridRadios6" value="products" >
    <label for="gridRadios6">
    Products
    </label>
    
    </div>
   
    </div>
    </div>
    </fieldset>
    
    <!--data to comment-->
    <!---edit here/////////////////////////-->

 <div class="form-group row">
    <label class="col-sm-3 col-form-label"><b>Amt</b></label>
    <div class="col-sm-4">
    <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
    <input type="number" name="bamount" id="bamount" class="form-control" placeholder="Amount" readonly required>  
    </div>
    </div>
    
    <!--total data edit-->
    <div id="dataDisplay" >
    <div class="form-group row"  class="form-group row"  >
    <label class="col-sm-3 col-form-label"><b>Net Amount</b></label>
    <div class="col-sm-4">
    <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
    <input type="number" name="namount" id="namount" onblur="Disc_cal()" class="form-control" placeholder="Net Amount" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-sm-3 col-form-label"><b>Discount Amount</b></label>
    <div class="col-sm-4">
    <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
    <input type="text" name="damount" id="damount" class="form-control" placeholder="Discount" readonly required>
    </div>
    

    </div>


    
    </div>

    <!--total data edit-->
    <br>
    <div class="" id="service_pages"></div>
    <br>
    <div class="form-group row" id="more_btn">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4" id="cansavebtn">
    <a href="<?=base_url()?>patients/allpatients" name="cancel" class="btn btn-danger">Cancel</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="sub_form" class="btn btn-primary" value="Submit" onclick="return confirm('Are you sure want to submit')">
    </div>
    <div class="col-sm-4"></div>
    </div>
    </div>
    <?=form_close()?>
</div>
</div>
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <script type="text/javascript"> 
        function chkcontrol(j,id,i) {
            $('#gridRadios5').attr('checked');
        var sum=$('#bamount').val()?$('#bamount').val():0 ;
        var subpay=$('#service_pay').val()?$('#service_pay').val():0 ;
      $("#subservice_"+id).each(function() {
        
        if ($(this).is(":checked")) {
          sum = parseInt(sum) + parseInt(j);
          subpay= parseInt(subpay) + parseInt(i);
         $('#bamount').val(sum);
         $('#service_pay').val(subpay);
          $('#addservicecharge').val(sum);
        }else{
           sum = parseInt($('#bamount').val()) - parseInt(j);  
           subpay = parseInt($('#service_pay').val()) - parseInt(i);  
          $('#bamount').val(sum);
          $('#addservicecharge').val(sum);
            $('#service_pay').val(subpay);
          
        }
     
        });
        }
</script>
 
  <script type="text/javascript">
       
  function Amount_cal(e,rowid) {
        var sum=0;
        for(var i=rowid ; i <= rowid; i++){
        var amountid=$('#prow_'+i).val();
        var raray=amountid.split("_");
        var proid=raray[0];
        var amount =raray[1];
        var qnty=$('#qty_'+i).val();
        var multypleam=qnty*amount ;
          sum=parseInt(sum)+parseInt(multypleam);  
        }
        //sum=parseInt(sum)-parseInt(multypleam);
         
          
          $('#allproductamount').val(sum);

      }
      
 function productaddsum(){
     $('.Cheek_t').attr('readonly',true);
       $('.cal').attr('disabled',true);
    var bamount=$("#bamount").val()?$("#bamount").val():0;
    var productsum=  $('#allproductamount').val();
        $("#bamount").val(parseInt(bamount)+parseInt(productsum))
 }
  function Disc_cal(){ 
       var namount=$("#namount").val();
       var bamount=$("#bamount").val();
      if(namount !='' && bamount !=''){
        var cal_dis=(parseInt(bamount) - parseInt(namount));
        $("#damount").val(parseInt(cal_dis));
       }
   }
   
  function servicequnty(){
    var qty= $('#serveqty').val();
    var samount= $('#addservicecharge').val();
      $("#bamount").val(samount*qty); 
   }

</script>
<script type="text/javascript">
 $("input[type='radio']").change(function() {
    var mm=$(this);
    var selected_data=mm[0].value;
    
    if(selected_data=='service'){
    var samount= $('#addservicecharge').val();
      $("#bamount").val(samount); 
      $('#serveqty').show();
       //vmedit
    }else{
     
     var productsamount=$('#allproductamount').val();
      
      $("#bamount").val(productsamount); 
      $('#serveqty').val('1');
      $('#serveqty').hide();
    }
   
 });


 jQuery(document).ready(function($){
                $(".getservice").on("change",function(){
                    var myId = $(this).val();
                        //alert( myId );
                        $.ajax({
                            url: "<?=base_url('patients/getsuservices')?>",
                            type: "POST",
                            data: { "sid": myId },
                            success: function(data){
                                debugger;
                                var returnedData = JSON.parse(data);
                                //alert(returnedData.success);
                                //console.log(returnedData);
                            if(returnedData.status == "success"){
                                $.each(returnedData, function (i, p) {
                                  $('#rfaldevice').append($('<option></option>').val(p.ssid).html(p.sub_service_name));
                                });
                                }else{
                                    toastr.error("Someone went wrong");
                                }
                                location.reload(true);  
                            },
                            error: function(){
                                //do action
                            }
                        });
                
                });
            });
// jQuery(document).ready(function($){
//                 $(".getservice").on("change",function(){
//                     var myId = $(this).val();
//                      alert( myId );
//                      $.ajax({
//                          url: "<?=base_url('patients/getsuservices')?>",
//                          type: "POST",
//                          data: { "sid": myId },
//                          success: function(data){
//                              var returnedData = JSON.parse(data);
//                              alert(returnedData.success);
//                              console.log(returnedData);
//                          if(returnedData.status == "success"){
//                              alert('fffff');
//                              $.each(returnedData, function (i, p) {
//                                   $('#selectSkill').append($('<option></option>').val(p.ssid).html(p.sub_service_name));
//                                 });
//                          //  location.reload(true);  
//                          },
//                          error: function(){
//                              //do action
//                          }
//                      });
                
//                 });
//             });


$('#location_html').on('change', function() {
   // alert( this.value ); // or $(this).val()
     if(this.value == "2") {
       $('#filler').show();
     }
     if(this.value == "3"){
       $('#miradry').show();
     }
     if(this.value == "4") {
       $('#rfal').show();
      }
     if(this.value == "5"){
       $('#rf').show();
     }
     if(this.value == "6"){
       $('#rfmn').show();
     }
     if(this.value == "7") {
       $('#laser-treatment').show();
      }
     if(this.value == "8"){
       $('#Coolsculpting').show();
     }
     if(this.value == "9"){
       $('#Contoura').show();
     }
     if(this.value == "10") {
       $('#Thread-Lifts').show();
      }
     if(this.value == "12"){
       $('#Sculptra-Butt').show();
     }
     if(this.value == "13"){
       $('#Sculptra-Face').show();
     }
     if(this.value == "14"){
       $('#Vi-Peel').show();
     }
     if(this.value == "15"){
       $('#Asthetic-Services').show();
     }
     if(this.value == "16"){
       $('#Tattoo').show();
     }
     if(this.value == "17"){
       $('#Package').show();
     }
     if(this.value == "17"){
       $('#').show();
     }
   });
   
   
$(document).ready(function(){
 
  // Initialize select2
  $("#selUser").select2();

  // Read selected option
  $('#but_read').click(function(){
    var username = $('#selUser option:selected').text();
    var userid = $('#selUser').val();

   

  });
});

</script>
<input id="amountinout" type="hidden">
<?php

$p_to_json=json_encode((array)$productsdata);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
$(document).ready(function () {
           var lineNo = $('#tbaleproduct >tbody >tr').length+1;
            
           
            $("#addrow").click(function () {
                var productarray =<?php echo $p_to_json; ?>;
               
              markup = "<tr><td style='border-color:#b1b3b5;border-style: solid;border-width:1px'><select class='form-control selUser'  data-live-search='true' name='product[]' id='prow_"+lineNo+"'><option value=''>Select product</option><?php foreach($productsdata as $productsdatas){ echo "<option value='$productsdatas->inventory_id".'_'."$productsdatas->current_sell_cost'>$productsdatas->product_name</option>";} ?></select></td><td style='border-color:#b1b3b5;border-style: solid;border-width:1px'><input type='text' name='pqty[]' id='qty_"+lineNo+"' class='form-control Cheek_t' onchange='Amount_cal(this,"+lineNo+");' placeholder='Enter Qty'></td></tr>";
                
                $("#tbodyid").append(markup);
                lineNo++;
               
            });
        }); 

 </script>
<script>
//   function addrowintable(){
//         $('.Cheek_t').attr('readonly',false);
//     var $tr    = $('#tbaleproduct').find('#tr_clone');
//     var $clone = $tr.clone(); 
  
//      $('#addrow').append($clone);
   
    
//   }
  function selectProduct(a){
   //var qty=$('#Cheek_t1').val();
 
    var sum=0;
    var amountid=a.value;
    var raray=amountid.split("_");
    var proid=raray[0];
    var amount =raray[1];
    $('#amountinout').val(amount);
    }

    function getservicedata(va){
          $('#addservicecharge').val(0);
           $("#bamount").val(0);
            $('#service_pay').val(0);
      var idamount=va.value;
      var array= idamount.split("_")
      var sid=array[0];
      var samount =array[1];
      
       $.ajax({
                         url: "<?=base_url('patients/getsubsuservices')?>",
                         type: "POST",
                         data: { "sid": sid },
                         success: function(data){
                             
                            $('#divSubService').html(data); 
                         
                         },
                         error: function(){
                             //do action
                         }
                     });
      
      $('#sid').val(sid);
      $('#addservicecharge').val(samount);
       }
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
