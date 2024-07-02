<?php //echo'<pre>';print_r($payment_method);die;?>
<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Bill Invoice</h4> 
    <?php $ptent_notsid=$this->uri->segment(3); ?>
<div class="m-t-25">
  <?php if($this->session->flashdata('msg'))
    {
      ?><div class="col-md-6">
          <div class="alert alert-danger"><?= $this->session->flashdata('msg')?></div>
        </div>
          <?php
     }?>
<?=form_open('invoice/saveinvoice')?>
   <!--  <h5> </h5>  -->
    <input type="hidden" name="nsd_id" id="nsd_id" value="">
    <input type="hidden" name="patianid" value="<?=$patient_notes[0]['pid'];?>">
    <input type="hidden" name="ptent_notsid" id="" value="<?php echo $ptent_notsid ;?>">
     <input type="hidden" name="survice_pay"  value="<?=$patient_notes1->service_pay ;?>">
     <input type="hidden" name="ssid" id="" value="<?=$patient_notes1->ssid;?>">
    <?php $patianid= $patient_notes[0]['pid'];
   $wlletaray= $this->db->select('wallet_amount')->from('patient_registration')->where('prid',$patianid)->get()->row();?>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name of the Patient</label>
        <div class="col-sm-6">
            <select name="pname" class="form-control"  id="pname" required="">
              <option value=""> SELECTED </option>
              <?php if(!empty($patients_list)){
                    foreach($patients_list as $patients){?>
                        <option value="<?= $patients->prid?>" <?php if(isset($patient_notes[0]['pid'])) echo ($patients->prid ==  $patient_notes[0]['pid']) ? ' selected="selected"' : '';?>><?= $patients->pname?></option>
                    <?php }} ?>
            </select>
        </div>
        <?=form_error('pname','<div class="text-danger">','</div>')?>
    </div>



<br>
    
    <h5>Payment Method :</h5> 
    <h5>Remaining-amount : <span id="result">0</span></h5>
    <div class="text-danger" id="pm_error">Entered payment method amount not equal to Net amount.</div>
        <div class="text-danger" id="pm_error2">Please enter amount on payment methods.</div>
       <input type="hidden" id="wallet_reduce" name="wallet_reduce" value="0">
        <input type="hidden" id="credit_card" name="credit_card" value="0">
       
       <input type="hidden" id="care_credit" name="care_credit" value="0">
         <input type="hidden" id="stippayment" name="stippayment" value="0">
        <input type="hidden" name="total_wallet" value="<?=$wlletaray->wallet_amount ?>">
        
        
         <?php if(!empty($payment_method))
         {
                foreach($payment_method as $payment)
                {
                    ?>
                  <div class="form-group row">
                      
                    <label for="inputEmail3" class="col-sm-2 col-form-label"><?= $payment->method_name?> </label>
                  <div class="col-sm-3">
                  <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
                  <input type="number" class="form-control payment_mathd" id="<?= $payment->pid?>" name="pay_amt[]" value="" placeholder="<?= $payment->method_name?>" onkeyup="calculate(this,'mathod')" >
                    </div>
                    <?=form_error('pmethod','<div class="text-danger">','</div>')?>
                    </div>
         <?php 
        }
        }
         
         ?>
         
         <h5>Treatment Details :</h5>
     
        <div class="row_type">
        <div class="form-group row s_cls">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Treatment Type</label>
        <!-- <button type="button" id="addServ" class="btn btn-add"><i class="fas fa-plus"></i></button> -->
        <?php $ssid=explode(",",$patient_notes1->sid); $treatment_type =  $this->db->select('sid,service_name')->from('services')->where_in('sid',$ssid)->get()->result();
       ?>
        <div class="col-sm-5">
          
          <?php  foreach($treatment_type as $treatment)
                    { ?>
                    <input type="hidden" value="<?=$treatment->sid ?>" name="ttype[]" id="ttype" >
                    <span><?=$treatment->service_name ?> , </span>
                    <?php } ?>
           
            
        </div>
        
        
      
    </div>
    <?php if(!empty($sabserviname)){ ?>
   <div class="col-md-5">
            <lable><b>Sub services</b></lable>
            <?php foreach($sabserviname as $subsrvic){ ?>
            <p><b><?=$subsrvic->sub_service_name ?> : </b> $<?=$subsrvic->sub_service_charge ?></p>
            <?php  } ?>
        </div>
        <?php } ?>
 <div class="col-lg-12">
     <div class="row">
      
       
       <input type="hidden" value="<?=$patient_notes1->product_id ?>" name="product">
         <input type="hidden" value="<?=$patient_notes1->qty ?>" name="mquantity">
        
        <label for="inputEmail3" class="col-sm-2 col-form-label">Product:</label>
         
         <?php $product_id=explode(",",$patient_notes1->product_id);
         $qty=explode(",",$patient_notes1->qty); $i=0;
         foreach($product_id as $productid){
         $productname=$this->db->select('product_name','inventory_id')->from('inventory')->where('inventory_id',$productid)->get()->row();  if(!empty($productname)){
         ?>
        
            <div class="form-group">
       
            <input type="text" class="form-control" id="" value="<?=$productname->product_name ?>"  placeholder="" readonly>
      
         </div>
         
     <?php } }  ?>
     
       <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity:</label>
     <?php foreach($qty as $pqty){ ?>
      <div class="form-group">
       
            <input type="text" class="form-control" id="" value="<?=$pqty ?>"   placeholder="Material Quantity" readonly>
      
        </div>
        <?php  } ?>
        <?=form_error('mquantity','<div class="text-danger">','</div>')?>
    </div>
    <hr style="background-color:grey;height: 1px;">
    </div>

      <div class="form-group row" id="b_div" >
        <label for="inputEmail3" class="col-sm-2 col-form-label">Bill Amount</label>
        <div class="col-sm-3">
          <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" class="form-control" id="bamount" name="bamount" value="<?=$patient_notes1->bamount?>" placeholder="Bill Amount" readonly>
        </div>
        <?=form_error('bamount','<div class="text-danger">','</div>')?>
    </div>

  <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Discount Amount</label>
        <div class="col-sm-3">
          <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" class="form-control" id="damount" name="damount" value="<?=$patient_notes1->damount ?>" placeholder="Discount Amount" readonly>
        </div>
        <?=form_error('damount','<div class="text-danger">','</div>')?>
    </div>

    <div class="form-group row" id="t_div" style="">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Net Amount</label>
        <div class="col-sm-3">
          <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" class="form-control" id="namount" name="namount" value="<?=$patient_notes1->tamount?>" placeholder="Net Amount" readonly>
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
</div>
<script>
    function calculate(val,type) {
        var sess_reduce_amount = 0;
       
      
  var p9=$("#9").val();
  var p8=$("#8").val();
  var p10=$("#10").val();
  var p11=$("#11").val();
  var p1=$("#1").val();
  var p2=$("#2").val();
  var p3=$("#3").val();
  var p4=$("#4").val();
  var p5=$("#5").val();
  var p6=$("#6").val();
  var p7=$("#7").val();
  var net_amount = "<?=$patient_notes1->tamount?>";
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
  

  var myResult =parseInt(p1)+parseInt(p2)+parseInt(p3)+parseInt(p4)+parseInt(p5)+parseInt(p6)+parseInt(p7)+parseInt(p8)+parseInt(p9)+parseInt(p10)+parseInt(p11);
   // var nammoudt= $('#namount).val();  
 
    $('#result').html('$'+(net_amount-myResult));
    var checkamt=net_amount-myResult;
    if(checkamt>0)
        { 
          $('#pm_error').show();
          $("#btn_submit").attr('disabled',true);
         
        }else{
            $('#pm_error').hide(); 
             $('#wallet_reduce').val(0);
             $('#stippayment').val(p2);
              $('#care_credit').val(p7);
              $('#credit_card').val(p1);
            $("#btn_submit").attr('disabled',false);
        }
}
</script>
<script>
$("#btn_submit").click(function()
{ 
  var paymathd =  $('.payment_mathd').val();
   
   var check= confirm("Are you sure want to submit !");
   if(check){
       return true;
      
   }else{
       return false;
   }

});

</script>
<script>
     $(document).ready(function(){
  $('#pm_error').hide();
 $('#pm_error2').hide();
  // Initialize select2
  
});
</script>