<?php //echo'<pre>';print_r($payment_method);die;?>
<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Bill Invoice</h4> 
<div class="m-t-25">
<?=form_open('invoice/saveinvoice')?>
   <!--  <h5> </h5>  -->
    <input type="hidden" name="nsd_id" id="nsd_id" value="">
    <input type="hidden" name="pn_id" id="pn_id" value="">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name of the Patient</label>
        <div class="col-sm-6">
            <select name="pname" class="form-control"  id="pname" required>
              <option value=""> SELECTED </option>
              <?php if(!empty($patients_list)){
                    foreach($patients_list as $patients){?>
                        <option value="<?= $patients->pid?>"><?= $patients->pname?></option>
                    <?php }} ?>
            </select>
        </div>
        <?=form_error('pname','<div class="text-danger">','</div>')?>
    </div>


  <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Patient Visit</label>
        <div class="col-sm-6">
            <select name="visit" class="form-control"  id="visit" >
              <option value=""> SELECTED </option>
              
            </select>
        </div>
        <?=form_error('visit','<div class="text-danger">','</div>')?>
    </div>









    <h5>Payment Method :</h5>
         <?php if(!empty($payment_method)){
                    foreach($payment_method as $payment){?>
     <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label"><?= $payment->method_name?></label>
        <div class="col-sm-3">
             <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
                <input type="number" class="form-control" id="<?= $payment->pid?>" name="pay_amt[]" value="" placeholder="<?= $payment->method_name?>">
                      
                   
            
        </div>
        <?=form_error('pmethod','<div class="text-danger">','</div>')?>
    </div>

 <?php }} ?>


    <div class="row_type">
    <div class="form-group row s_cls">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Treatment Type</label>
        <!-- <button type="button" id="addServ" class="btn btn-add"><i class="fas fa-plus"></i></button> -->
        <div class="col-sm-5">
            <select name="ttype[]" class="form-control" id="ttype" required>
              <option value="">Select Treatment Type</option>
              <?php if(!empty($treatment_type)){
                    foreach($treatment_type as $treatment){?>
                        <option value="<?= $treatment->sid?>"><?= $treatment->service_name?></option>
                    <?php }} ?>
            </select>
        </div>
        <?=form_error('ttype','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row" id="typesub" style="display: none;">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-6">
            <select name="ttypesub[]" class="form-control" id="ttypesub" >
            </select>
        </div>
        <?=form_error('ttypesub','<div class="text-danger">','</div>')?>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Material Quantity</label>
        <div class="col-sm-3">
            <input type="number" class="form-control" id="mquantity" name="mquantity[]"  placeholder="Material Quantity" required>
        </div>
        <?=form_error('mquantity','<div class="text-danger">','</div>')?>
    </div>


    </div>


  

  <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Discount Amount</label>
        <div class="col-sm-3">
          <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" class="form-control" id="damount" name="damount" placeholder="Discount Amount">
        </div>
        <?=form_error('damount','<div class="text-danger">','</div>')?>
    </div>


    <div class="form-group row" id="b_div" style="display: none">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Bill Amount</label>
        <div class="col-sm-6">
          <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" class="form-control" id="bamount" name="bamount" placeholder="Bill Amount">
        </div>
        <?=form_error('bamount','<div class="text-danger">','</div>')?>
    </div>

    <div class="form-group row" id="t_div" style="">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Net Amount</label>
        <div class="col-sm-3">
          <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" class="form-control" id="namount" name="namount" placeholder="Net Amount">
        </div>
        <?=form_error('namount','<div class="text-danger">','</div>')?>
    </div>


    



    <div class="form-group row">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-3">
            <input type="submit" name="submit_data" id="btn_submit" class="btn btn-primary" value="Submit">
        </div>
        <div class="col-sm-4">
        </div>
    </div>
<?=form_close()?>
</div>
</div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
  <script src="<?=base_url()?>assets/js/ajax.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
 
  // Initialize select2
  $("#pname").select2();

 
  });


$(document).ready(function(){
 
 $('#pname').change(function(){
   var pid = $('#pname').val();
   var str=document.URL;
   var urls = str.split("invoice");
   $.ajax({
     url:urls[0]+'/patients/get_visit_list/'+pid,//baseURL+'index.php/user/userDetails',
     method: 'get',
     success: function(response){ //debugger
   var obj = JSON.parse(response);
       if(obj.length >0){
         var i=1;
         $("#visit").empty();
         $("#visit").append('<option> SELECTED </option>');
         $.each(obj,function(key,value){
         $("#visit").append('<option value="'+value.id+'_'+value.pid+'">'+'Visit '+i+'</option>');
             i++;    
          });
 
       } 
     }
  });
  });


 $('#visit').change(function(){
  // debugger

   var str = $('#visit').val();
   var data = str.split("_");
    var vid = data[0];
    var pid = data[1];
   //$('#typesub').empty('');
   var urls=document.URL;
   //console.log(urls);
   $.ajax({
     url:urls+'/get_visit_wise_data',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {vid: vid,pid: pid},
     dataType: 'json',
     success: function(response){ 
       var len = response.data.length;
       if(response.visit_type=='service'){
         $("#ttype").empty();
         $(".servbody_remove").empty();
          var namt=0;
          var bamt=0;
        for(var i=0;i<response.data.length;i++){ //debugger
         
          var bamt1=response.data[i].bamount;
              bamt=parseInt(bamt)+parseInt(bamt1);

          var namt=response.data[0].tamount;
            //namt= parseInt(namt)+parseInt(namt1);
          var qty=response.data[i].qty;
          
           if(i==0){
          
          $("#mquantity").val(qty);
         $("#ttype").append('<option> SELECTED </option>');
         $.each(response.treatment_type,function(key,value){
                 if(response.data[i].sid==value.sid){
                   $("#ttype").append('<option value="'+value.sid+'" selected>'+value.service_name+'</option>');
                 }else{
                 $("#ttype").append('<option value="'+value.sid+'">'+value.service_name+'</option>');
                 }
              });
          $('#typesub').show();
          $.each(response.product,function(key,value){
                if(response.data[i].ssid==value.ssid){
                 $("#ttypesub").append('<option value="'+value.ssid+'" selected>'+value.sub_service_name+'</option>');
              }else{
                $("#ttypesub").append('<option value="'+value.ssid+'">'+value.sub_service_name+'</option>');
              }
              });  
           }else{

var service=$(".row_type");
$(service).append('<div class="servbody_remove" id="serv_remove"><div class="form-group row s_cls" id="" style="position:relative;"><label for="inputEmail3" class="col-sm-2 col-form-label" style="padding-block: 20px;">Treatment Type</label><div class="col-sm-5"><div><select name="ttype[]" class="form-control" onchange="myFunction()" id="ttype'+i+'"></select></div></div></div><div class="form-group row" id="typesub'+i+'" style=""><label for="inputEmail3" class="col-sm-2 col-form-label">Type</label><div class="col-sm-6"><select name="ttypesub[]" class="form-control"  id="ttypesub'+i+'"></select></div></div><div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Material Quantity</label><div class="col-sm-3"><input type="number" class="form-control" id="mquantity'+i+'" name="mquantity[]" placeholder="Material Quantity"></div><?=form_error('mquantity','<div class="text-danger">','</div>')?></div></div></div>');

  $("#mquantity"+i).val(qty);

  $.each(response.treatment_type,function(key,value){
                 if(response.data[i].sid==value.sid){
                   $("#ttype"+i).append('<option value="'+value.sid+'" selected>'+value.service_name+'</option>');
      }else{
                 $("#ttype"+i).append('<option value="'+value.sid+'">'+value.service_name+'</option>');
                 }

  });

  $.each(response.product,function(key,value){  
                if(response.data[i].ssid==value.ssid){
  $("#ttypesub"+i).append('<option value="'+value.ssid+'" selected>'+value.sub_service_name+'</option>');
  }else{ 
    $("#ttypesub"+i).append('<option value="'+value.ssid+'" >'+value.sub_service_name+'</option>');
  }
  });

}

}

var discount=parseInt(bamt) - parseInt(namt);
 $("#damount").val(discount);
 $("#namount").val(namt);


if (typeof response.data2 != "undefined") {  //debugger;
          var namt=0;
          var bamt=0;
          var qty2=0;
          qty=0;
   for(var i=0;i<response.data2.length;i++){ //debugger
         
          var bamt1=response.data2[i].bamount;
              bamt=parseInt(bamt)+parseInt(bamt1); //edit  

          var namt=response.data2[i].tamount;
           qty=response.data2[i].qty;
        //   var qty=parseInt(qty)+parseInt(qty2);
            // namt= parseInt(namt)+parseInt(namt1);
        

var service=$(".row_type");
$(service).append('<div class="servbody_remove" id="serv_remove"><div class="form-group row s_cls" id="" style="position:relative;"><label for="inputEmail3" class="col-sm-2 col-form-label" style="padding-block: 20px;">Treatment Type</label><div class="col-sm-5"><div><select name="ttype[]" class="form-control" onchange="myFunction()" id="ttype1'+i+'"></select></div></div></div><div class="form-group row" id="typesub1'+i+'" style=""><label for="inputEmail3" class="col-sm-2 col-form-label">Type</label><div class="col-sm-6"><select name="ttypesub[]" class="form-control"  id="ttypesub1'+i+'"></select></div></div><div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Material Quantity</label><div class="col-sm-3"><input type="number" class="form-control" id="mquantity'+i+'" name="mquantity[]" placeholder="Material Quantity"></div><?=form_error('mquantity','<div class="text-danger">','</div>')?></div></div></div>');
  
  $("#mquantity"+i).val(qty);

  $.each(response.treatment_type,function(key,value){
                 if(response.data2[i].sid==value.sid){
                   $("#ttype1"+i).append('<option value="'+value.sid+'" selected>'+value.service_name+'</option>');
      }else{
                 $("#ttype1"+i).append('<option value="'+value.sid+'">'+value.service_name+'</option>');
                 }

  });

  $.each(response.product1,function(key,value){  
                if(response.data2[i].ssid==value.ssid){
  $("#ttypesub1"+i).append('<option value="'+value.ssid+'" selected>'+value.sub_service_name+'</option>');
  }else{ 
    $("#ttypesub1"+i).append('<option value="'+value.ssid+'" >'+value.sub_service_name+'</option>');
  }
  });



}



 }////

if (typeof response.data2 != "undefined"){

   var discount=parseInt(bamt) - parseInt(namt);
   var dis_d=$("#damount").val();
  $("#damount").val(parseInt(dis_d) + parseInt(discount));

   var net_amts=$("#namount").val();
 $("#namount").val(parseInt(net_amts) + parseInt(namt));
}





// var Qtys=$("#mquantity").val();
//    $("#mquantity").val(parseInt(Qtys) + parseInt(qty));
  

}else{

         $("#nsd_id").val(response.data[0].id);
         $("#ttype").empty();
         $(".servbody_remove").empty();
          var namt=0;
          var bamt=0;
          var damt=0;
        for(var i=0;i<response.data.length;i++){ //debugger
         
          var bamt1=response.data[i].bamount;
              bamt=parseInt(bamt)+parseInt(bamt1);

          var namt=response.data[i].tamount;

          var damt1=response.data[i].damount;
              damt=parseInt(damt)+parseInt(damt1);
            //namt= parseInt(namt)+parseInt(namt1);
           if(i==0){
          
          var qty=response.data[i].qty;
          // $("#mquantity").val(qty);
         $("#ttype").append('<option> SELECTED </option>');
         $.each(response.treatment_type,function(key,value){
                 if(response.data[i].sid==value.sid){
                   $("#ttype").append('<option value="'+value.sid+'" selected>'+value.service_name+'</option>');
                 }else{
                 $("#ttype").append('<option value="'+value.sid+'">'+value.service_name+'</option>');
                 }
              });
          $('#typesub').show();
          $.each(response.product,function(key,value){
                if(response.data[i].ssid==value.ssid){
                 $("#ttypesub").append('<option value="'+value.ssid+'" selected>'+value.sub_service_name+'</option>');
              }else{
                $("#ttypesub").append('<option value="'+value.ssid+'">'+value.sub_service_name+'</option>');
              }
              });  
           }else{

var service=$(".row_type");
$(service).append('<div class="servbody_remove" id="serv_remove"><div class="form-group row s_cls" id="" style="position:relative;"><label for="inputEmail3" class="col-sm-2 col-form-label" style="padding-block: 20px;">Treatment Type</label><div class="col-sm-5"><div><select name="ttype[]" class="form-control" onchange="myFunction()" id="ttype'+i+'"></select></div></div></div><div class="form-group row" id="typesub'+i+'" style=""><label for="inputEmail3" class="col-sm-2 col-form-label">Type</label><div class="col-sm-6"><select name="ttypesub'+i+'" class="form-control"  id="ttypesub'+i+'"></select></div></div></div></div>');

  $.each(response.treatment_type,function(key,value){
                 if(response.data[i].sid==value.sid){
                   $("#ttype"+i).append('<option value="'+value.sid+'" selected>'+value.service_name+'</option>');
      }else{
                 $("#ttype"+i).append('<option value="'+value.sid+'">'+value.service_name+'</option>');
                 }

  });

  $.each(response.product,function(key,value){  
                if(response.data[i].ssid==value.ssid){
  $("#ttypesub"+i).append('<option value="'+value.ssid+'" selected>'+value.sub_service_name+'</option>');
  }else{ 
    $("#ttypesub"+i).append('<option value="'+value.ssid+'" >'+value.sub_service_name+'</option>');
  }
  });

}

}

//var discount=parseInt(bamt) - parseInt(namt);
 $("#damount").val(damt);
 $("#namount").val(namt);

}
      
 
  }
  });
  });




 $('#ttype').change(function(){ 
   var sid = $(this).val();
   //$('#typesub').empty('');
   var url=document.URL;
   $.ajax({
     url:url+'/allsubservices',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {sid: sid},
     dataType: 'json',
     success: function(response){ //debugger
       var len = response.length;
    
       if(len > 0){
          // Read values
          $('#typesub').show();
          $.each(response,function(key,value){

                 $("#ttypesub").append('<option value="'+value.ssid+'">'+value.sub_service_name+'</option>');

              });
          
 
       }else{
         $('#typesub').hide();
        // $('#typesub').empty('');
       }
 
     }
  });
 });

var service=$(".row_type");

$("#addServ").click(function(e){  
 //debugger;
var check=$(".servbody_remove");//|| check[0].innerHTML==""
console.log(check);
if(check.length == 0  || check[check.length-1].innerHTML==""){

$(service).append('<div class="servbody_remove" id="serv_remove"><div class="form-group row s_cls" id="" style="position:relative;"><label for="inputEmail3" class="col-sm-2 col-form-label" style="padding-block: 20px;">Treatment Type</label><div class="col-sm-5"><div><a href="javascript:void(0)" onclick="myFunction2(this)" class="close-primary-section"><i class="fas fa-times"></i></a><select name="ttype[]" class="form-control" onchange="myFunction()" id="ttype2"></select></div></div></div><div class="form-group row" id="typesub2" style="display: none;"><label for="inputEmail3" class="col-sm-2 col-form-label">Type</label><div class="col-sm-6"><select name="ttypesub[]" class="form-control"  id="ttypesub2"></select></div></div><div class="form-group row"><label for="inputEmail3" class="col-sm-2 col-form-label">Material Quantity</label><div class="col-sm-3"><input type="number" class="form-control" id="mquantity" name="mquantity2" placeholder="Material Quantity"></div><?=form_error('mquantity','<div class="text-danger">','</div>')?></div></div>');
//debugger;
 var url=document.URL;
   $.ajax({
     url:url+'/allservices',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {},
     dataType: 'json',
     success: function(response){ //debugger;
     var len = response.length;
    
       if(len > 0){
          // Read values
          $('#ttype2').show();
          $.each(response,function(key,value){

                 $("#ttype2").append('<option value="'+value.sid+'">'+value.service_name+'</option>');

              });
          
 
       }

     }
  });

}else{

}



});


});

function myFunction2(e){  //debugger;
$(".servbody_remove").html('');
//$("#serv_remove").html('');
 };

function myFunction(){
  //debugger;
  var sid = $("#ttype2").val();
   //$('#typesub2').empty('');
   var url=document.URL;
   $.ajax({
     url:url+'/allsubservices',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {sid: sid},
     dataType: 'json',
     success: function(response){ //debugger
       var len = response.length;
    
       if(len > 0){
          // Read values
          $('#typesub2').show();
          $.each(response,function(key,value){

                 $("#ttypesub2").append('<option value="'+value.ssid+'">'+value.sub_service_name+'</option>');

              });          
 
       }else{
         $('#typesub2').hide();
        // $('#typesub').empty('');
       }
 
     }
  });

}


$("#btn_submit").click(function(e){  //debugger;
  var html='';

  var p9=$("#9").val();
  if(p9 !=""){
    document.getElementById('9').type = 'text';
   html ='9_'+p9;
   $("#9").val(html);
  }

  var p10=$("#10").val();
  if(p10 !=""){
    document.getElementById('10').type = 'text';
   html ='10_'+p10;
   $("#10").val(html);
  }

   var p11=$("#11").val();
  if(p11 !=""){
    document.getElementById('11').type = 'text';
   html ='11_'+p11;
   $("#11").val(html);
  }

  var p1=$("#1").val();
  if(p1 !=""){
    document.getElementById('1').type = 'text';
   html ='1_'+p1.toString();
   $("#1").val(html);
  }

  var p2=$("#2").val();
  if(p2 !=""){
    document.getElementById('2').type = 'text';
   html ='2_'+p2.toString();
   $("#2").val(html);
  }

  var p3=$("#3").val();
  if(p3 !=""){
    document.getElementById('3').type = 'text';
   html ='3_'+p3.toString();
   $("#3").val(html);
  }

  var p4=$("#4").val();
  if(p4 !=""){
    document.getElementById('4').type = 'text';
   html ='4_'+p4.toString();
   $("#4").val(html);
  }

  var p5=$("#5").val();
  if(p5 !=""){
    document.getElementById('5').type = 'text';
   html ='5_'+p5.toString();
   $("#5").val(html);
  }

  var p6=$("#6").val();
  if(p6 !=""){
    document.getElementById('6').type = 'text';
   html ='6_'+p6.toString();
   $("#6").val(html);
  }

   var p7=$("#7").val();
  if(p7 !=""){
    document.getElementById('7').type = 'text';
   html ='7_'+p7.toString();
   $("#7").val(html);
  }

  var p8=$("#8").val();
  if(p8 !=""){
    document.getElementById('8').type = 'text';
   html ='8_'+p8.toString();
   $("#8").val(html);
  }



});
</script>
</div>