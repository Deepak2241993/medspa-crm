<?php //echo'<pre>';print_r($payment_method);die;?>
<!-- Page Container START -->
<div class="page-container">
<!-- Content Wrapper START -->
<div class="main-content">
   <div class="card">
      <div class="card-body">
         <h4>Bill Invoice</h4>
         <div class="m-t-25">
            <div class="form-group row">
               <div class="col-md-12">
                  <label for="patient_name" class="col-sm-2 col-form-label">Name of the Patient</label> 
                  <input type="text"class="form-control"name="pname" id="patient_name" value="<?=$patient_registration[0]['pname']?>">  
               </div>
               <div class="col-md-12">
                  <label for="patient_number" class="col-sm-2 col-form-label">Contact number the Patient</label> 
                  <input type="patient_number" id="patient_number"class="form-control"name="pname" max="10" value="<?=$patient_registration[0]['phone']?>">  
               </div>
               <?=form_error('visit','<div class="text-danger">','</div>')?>
            </div>
            <h5>Payment Method :</h5>
            <div class="text-danger" id="pm_error">Entered payment method amount not equal to Net amount.</div>
            <div class="text-danger" id="pm_error2">Please enter amount on payment methods.</div>
            <div class="text-danger" id="pm_error3">Pay Amount is <b> <?=$invoice_amount[0]->new_paybale_amount?> </b></div>
            <?php if(!empty($payment_method))
               {
                      foreach($payment_method as $payment)
                      {
                          ?>
            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label"><?= $payment->method_name?></label>
               <div class="col-sm-3">
                  <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
                  <input type="number" class="form-control" id="<?= $payment->pid?>" name="pay_amt[]" value="" placeholder="<?= $payment->method_name?>" onkeyup="paymentCalculation()">
               </div>
               <?=form_error('pmethod','<div class="text-danger">','</div>')?>
            </div>
            <?php 
               }
               }
                ?>
            <div class="form-group row" id="b_div" >
               <label for="inputEmail3" class="col-sm-2 col-form-label">Bill Amount</label>
               <div class="col-sm-3">
                  <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
                  <input type="number" class="form-control" id="bamount" name="bamount" value="<?=$invoice_amount[0]->bill_amount?>" placeholder="Bill Amount" readonly>
               </div>
               <?=form_error('bamount','<div class="text-danger">','</div>')?>
            </div>
            <div class="form-group row">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Discount Amount</label>
               <div class="col-sm-3">
                  <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
                  <input type="number" class="form-control" id="damount" name="damount" value="<?=$invoice_amount[0]->discount_amount?>" placeholder="Discount Amount" readonly>
               </div>
               <?=form_error('damount','<div class="text-danger">','</div>')?>
            </div>
            <div class="form-group row" id="t_div" style="">
               <label for="inputEmail3" class="col-sm-2 col-form-label">Net Amount</label>
               <div class="col-sm-3">
                  <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
                  <input type="number" class="form-control" id="namount" name="namount" value="<?=$invoice_amount[0]->new_paybale_amount?>" placeholder="Net Amount" readonly>
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
   
      
    function paymentCalculation(){
      $('#pm_error').hide();
      $('#pm_error2').hide();
      var html='';      
      var p1=$("#1").val();
      var p2=$("#2").val();
      var p3=$("#3").val();
      var p4=$("#4").val();
      var p5=$("#5").val();
      var p6=$("#6").val();
      var p7=$("#7").val();
      var p8=$("#8").val();
      var p9=$("#9").val();
      var p10=$("#10").val();
      var p11=$("#11").val();
     
      if(p1 =="")
      {
      p1 = 0;
      }
      if(p2 =="")
      {
      p2 = 0;
      }
      if(p3 =="")
      {
      p3 = 0;
      }
      if(p4 =="")
      {
      p4 = 0;
      }
      if(p5 =="")
      {
      p5 = 0;
      }
      if(p6 =="")
      {
      p6 = 0;
      }
      if(p7 =="")
      {
      p7 = 0;
      }
      if(p8 =="")
      {
      p8 = 0;
      }
      if(p9 =="")
      {
      p9 = 0;
      }
      if(p10 =="")
      {
      p10 = 0;
      }
      if(p11 =="")
      {
      p11 = 0;
      }

      var pmethod_amount = parseInt(p1)+parseInt(p2)+parseInt(p3)+parseInt(p4)+parseInt(p5)+parseInt(p6)+parseInt(p7)+parseInt(p8)+parseInt(p9)+parseInt(p10)+parseInt(p11);
      var net_amount = $("#namount").val();
      if(parseInt(pmethod_amount) == 0)
      {
      $('#pm_error2').show();
      return false;
      } 
      
      if(parseInt(pmethod_amount) != parseInt(net_amount))
      { 
      $('#pm_error').show();
      var balanceamount=net_amount-pmethod_amount;
      $('#pm_error3').html('Pay Amount is <b>'+balanceamount+'</b>');
      return false;
      }
      else{
         $('#pm_error3').hide();
         $('#pm_error').hide();
            return false;
      }

      }
   </script>
</div>