<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Select2 CSS --> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

<!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<!-- Select2 JS --> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Add service session and peckage</h4> 
    <?php if($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
         
         
           
     }?>
     
     <?=form_open('Patients/save_services_byprovide/'.$notesid)?>
    
    <div class="m-t-25" id="visitServices">
    <div class="form-group">
       
       <input type="hidden" name="pid" id="pid" value="<?=$pid?>">
        <input type="hidden" name="id" id="id" value="">
       <div class="container mt-5">
        <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Service Name</b></label>
          <select class="col-sm-6 form-control" aria-label="size 3 select example" id='selUser' onchange="getservicedata(this)" required>
              <option value="" >Select a Service</option>
              <?php foreach($servicesdata as $serdata){ ?>
                
            <option value="<?=$serdata->id ?>_<?=$serdata->service_charge ?>"><?=$serdata->service_name ?></option>
         
            <?php  } ?>
           
          </select>
        </div>
        
        
    </div>
</div>
    <!-- Editing here in for loop -->
<div class="m-t-25" id="services">
   <div id="divSubService" class="container mt-5">
            
        </div>
</div>




 <div class="form-group row">
    <label class="col-sm-3 col-form-label"><b>Amt</b></label>
    <div class="col-sm-4">
    <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
    <input type="number" name="service_amount" id="bamount" class="form-control" placeholder="Amount" readonly required>  
    </div>
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
  <input type="hidden" name="service_pay" id="service_pay" >
   <?=form_close()?>
    <!-- Editing here in for loop -->
    
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
<script>
    function hideshow(val){
        var wall= val.value;
        if(wall=='wallet_amount'){
          $('#services').hide();
         $('#session_package').hide();
        }else{
            $('#services').show();
         $('#session_package').show();
        }
    }
  function getservicedata(va){
          $('#addservicecharge').val(0);
           $('#bamount').val(0);
           
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
      $('#bamount').val(samount);
       }
</script>
