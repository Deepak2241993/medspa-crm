<div class="page-container">
   <!-- Content Wrapper START -->
   <?php //echo'<pre>';print_r($sdata[0]);die;
      $vid=$this->input->get('vid', TRUE);
      
      $notes_id = $this->uri->segment(3);
      
      ?>
   <div class="main-content">
      <div class="card">
         <div class="card-body">
            <section class="container py-4">
               <div class="row">
                  <div class="col-md-12">
                     <h2>Wallet</h2>
                     <ul id="tabs" class="nav nav-tabs">
                        <li class="nav-item"><a href="" data-target="#wallet" data-toggle="tab" class="nav-link small text-uppercase active">Wallet Amount</a></li>
                        <li class="nav-item"><a href="" data-target="#services" data-toggle="tab" class="nav-link small text-uppercase">Wallet Services</a></li>
                        <li class="nav-item"><a href="" data-target="#packages" data-toggle="tab" class="nav-link small text-uppercase">Wallet Package</a></li>
                        
                     </ul>
                     <br>
                     <div id="tabsContent" class="tab-content ">
                        <div id="wallet" class="tab-pane fade active show">
                           <div class="wallet">
                              <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#wallet_amount">Add Amount</button>
                              <!-- Button trigger modal -->
                              <?php if($this->session->flashdata('success')){
                                 echo $this->session->flashdata('success');
                                 }if($this->session->flashdata('error')){
                                 echo $this->session->flashdata('error');
                                 }?>
                              <!-- Modal -->
                              <div class="modal fade" id="wallet_amount" tabindex="-1" role="dialog" aria-labelledby="wallet_amountLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <form action="<?=base_url()?>patients/store_wallet_amount/<?php echo $id; ?>" method="post" id="amount_wallet">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="wallet_amountLabel">Add Amount</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <input type="number" name="in_amount" placeholder="$ Enter Amount" class="form-control mt-4" required>
                                             <input type="text" name="description" placeholder="Description" class="form-control mt-4" required>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                    </form>
                                    </div>
                                 </div>
                              </div>
                              <!-- wallet money modal code end -->

                              <div class="table-responsive">
                                    <table id="wallet_table" class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th>SR No.</th>
                                          <th>Date</th>
                                          <th>Transaction ID</th>
                                          <th>Added By</th>
                                          <th>Particulars</th>
                                          <th>Amount Cr</th>
                                          <th>Amount Dr</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $sr =1;
                                          $inAmountSum = 0;
                                          $outAmountSum = 0;
                                          $total=0;
                                          foreach($result['inamount'] as $pt)
                                          {
                                             $inAmountSum += $pt->in_amount;
                                             $outAmountSum += $pt->out_amount;
                                             $total=$inAmountSum-$outAmountSum;
                                          ?>
                                       <tr>
                                          <td><?=$sr?></td>
                                          <td><?=$pt->created_at?></td>
                                          <td><?=$pt->transaction_id?></td>
                                          <td><?=$pt->name?></td>
                                          <td><?=$pt->description?></td>
                                          <td style="color:green;"><?=$pt->in_amount?></td>
                                          <td style="color:red;"><?=$pt->out_amount?></td>
                                       </tr>
                                       <?php
                                          $sr++;
                                          
                                          }
                                          ?>
                                       <tr>
                                          <td><b> Available Amount:<b></td>
                                          <td colspan="7" style="<?php if(($total)>0){ echo 'color:green;';}else{echo 'color:red;';}?> "> <?= $total ?></td>
                                       </tr>
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




                        <div id="services" class="tab-pane fade">
                           <div class="services">
                              <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#services_amount">Add Services</button>
                              <!-- Button trigger modal -->
                              <?php if($this->session->flashdata('success')){
                                 echo $this->session->flashdata('success');
                                 }if($this->session->flashdata('error')){
                                 echo $this->session->flashdata('error');
                                 }?>
                              <!-- Modal -->
                              <div class="modal fade" id="services_amount" tabindex="-1" role="dialog" aria-labelledby="services_amountLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <form action="<?=base_url()?>patients/store_services_amount/<?php echo $id; ?>" method="post" id="amount_wallet">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="services_amountLabel">Add Services</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                          <div class="form-group col-md-12">
                                             <label for="service"> Service Name</label>
                                             <select class="form-control" name="service_category_id[]" id="service">
                                                <option value ="">Select Service</option>
                                                <?php
                                                   foreach($service['all_services'] as $value)
                                                   {?>
                                                <option value="<?=$value->id?>"><?=$value->service_name?></option>
                                                <?php }?>
                                             </select>
                                          </div>

                                         
                                          <div class="append-data"></div>
                                          <button type="button" class="btn btn-primary mb-4" onclick="serviceAssign()">Add More</button>
                                          <div class="form-group col-md-12">
                                             <label for="service">Description</label>
                                            <textarea class="form-control" name="description"></textarea>
                                          </div>
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                    </form>
                                    </div>
                                 </div>
                              </div>
                              <!-- wallet money modal code end -->
                              <div class="table-responsive">
                                 <table id="data-table" class="table table-bordered">
                                    <thead>
                                    
                                       <tr>
                                          <th>SR No.</th>
                                          <th>Date</th>
                                          <th>Transaction ID</th>
                                          <th>Added By</th>
                                          <th>Particulars</th>
                                          <th>Service Name Cr</th>
                                          <th>Service Name Dr</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $sr =1;
                                          $inAmountSum = 0;
                                          $outAmountSum = 0;
                                          $total=0;
                                          foreach($service_wallet['service_wallet_history'] as $value)
                                          {
                                             $inAmountSum += $value->in_amount;
                                             $outAmountSum += $value->out_amount;
                                             $total=$inAmountSum-$outAmountSum;
                                          ?>
                                       <tr>
                                          <td><?=$sr?></td>
                                          <td><?=$value->created_at?></td>
                                          <td><?=$value->transaction_id?></td>
                                          <td><?=$value->name?></td>
                                          <td><?=$value->description?></td>
                                          <td>
                                             <?php
                                          $service_category_id= json_decode($value->service_category_id); 
                                          if (is_array($service_category_id) || is_object($service_category_id))
                                          {

                                          foreach($service_category_id as $key=>$services_value)
                                          {
                                          
                                             $serviceresult=$this->MasterModel->get_databy_id($services_value,'services');
                                             $service_name=$serviceresult[0]->service_name;
                                          ?>
                                          <ul class="p-1 ml-2"> 
                                             <li ><?=$service_name?></li>
                                          </ul>
                                          <?php } }?>
                                          </td>
                                          <td style="color:red;"><?=$value->out_amount?></td>
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




                        <div id="packages" class="tab-pane fade">
                           <div class="packages">
                              <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#package_amount">Add Packages</button>
                              <!-- Button trigger modal -->
                              <?php if($this->session->flashdata('success')){
                                 echo $this->session->flashdata('success');
                                 }if($this->session->flashdata('error')){
                                 echo $this->session->flashdata('error');
                                 }?>
                              <!-- Modal -->
                              <div class="modal fade" id="package_amount" tabindex="-1" role="dialog" aria-labelledby="package_amountLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-xl" role="document">
                                    <form action="<?=base_url()?>patients/store_services_amount/<?php echo $id; ?>" method="post" id="amount_wallet">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="package_amountLabel">Add Package</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body">
                                             <div class="m-t-25">
                                                <div class="form-row">
                                                   
                                                   <div class="col-md-6 mb-4">
                                                      <label for="service"> Package Name</label>
                                                      <select class="form-control" name="service_category_id[]" id="service_0">
                                                         <option value ="">Select Package</option>
                                                         <?php
                                                            foreach($service['all_packages'] as $value)
                                                            {?>
                                                         <option value="<?=$value->id?>"><?=$value->package_name?></option>
                                                         <?php }?>
                                                      </select>
                                                   </div>
                                                   <div class="col-md-3 mb-4">
                                                      <label for="service">Qty</label>
                                                      <input type="text" name="in_qty" class="form-control">      
                                                   </div>
                                                   <div class="col-md-3 mb-4">
                                                      <label for="service">Amount</label>
                                                      <input type="text" id="amount_0" value="" name="amount" class="form-control" readonly>      
                                                   </div>

                                                   <div class="append-data col-md-12"></div>
                                                   <button type="button" class="btn btn-primary mt-2 mb-2" id="package_button_0" button_id="0" onclick="packageAssign()">Add More</button>
                                                   
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-primary">Submit</button>
                                                   </div>
                                                </div>
                                             </div>
                                    </form>
                                    </div>
                                 </div>
                              </div>
                              <!-- wallet money modal code end -->
                              <div class="table-responsive">
                                 <table id="wallet_package" class="table table-bordered">
                                    <thead>
                                       <tr>
                                          <th>SR No.</th>
                                          <th>Date</th>
                                          <th>Transaction ID</th>
                                          <th>Added By</th>
                                          <th>Particulars</th>
                                          <th>Amount Cr</th>
                                          <th>Amount Dr</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $sr =1;
                                          $inAmountSum = 0;
                                          $outAmountSum = 0;
                                          $total=0;
                                          foreach($result['inamount'] as $pt)
                                          {
                                             $inAmountSum += $pt->in_amount;
                                             $outAmountSum += $pt->out_amount;
                                             $total=$inAmountSum-$outAmountSum;
                                          ?>
                                       <tr>
                                          <td><?=$sr?></td>
                                          <td><?=$pt->created_at?></td>
                                          <td><?=$pt->transaction_id?></td>
                                          <td><?=$pt->name?></td>
                                          <td><?=$pt->description?></td>
                                          <td style="color:green;"><?=$pt->in_amount?></td>
                                          <td style="color:red;"><?=$pt->out_amount?></td>
                                       </tr>
                                       <?php
                                          $sr++;
                                          
                                          }
                                          ?>
                                       <tr>
                                          <td><b> Available Amount:<b></td>
                                          <td colspan="7" style="<?php if(($total)>0){ echo 'color:green;';}else{echo 'color:red;';}?> "> <?= $total ?></td>
                                       </tr>
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
               </div>
            </section>
         </div>
      </div>
   </div>
</div>
<script>
   function serviceAssign() {
     // Create a new HTML structure with the input values
     var newData = '<div class="form-row">'+
     '<div class="form-group col-md-6">'+   
                '<label for="name">Service Name</label>'+
     '<select class="form-control" name="service_category_id[]">'+
     <?php foreach($service['all_services'] as $value){?>   
     '<option value="<?=$value->id?>"><?=$value->service_name?></option>'+
    <?php }?>
     '</select>'+
     '</div>'+
  
     '<div class="form-group col-md-3 mt-4">'+
     '<button type="button" class="btn btn-danger remove-btn">Remove</button>'+ // Add the "Remove" butto
     '</div>'+
     '</div>';
   
     // Append the new HTML structure to the target element
     $(".append-data").append(newData);
   }

   function packageAssign() {
    var update_value;
    var customValue = $('#package').data('data-package_id'); // Use .attr() to retrieve the value of a data attribute
    update_value = parseInt(customValue) + 1;

    // Update the value of an input element with the incremented value
    $('#amount_0').val(update_value); // Use .val() to set the value of an input element
    $('#package').data('package_id', update_value); // Use .data() to set the value of a data attribute
    $('#package_button_0').data('button_id', update_value);
    $('#deepak').data('pvalue', update_value);
    

     // Create a new HTML structure with the input values
     var newData = '<div class="form-row">'+
     '<div class="form-group col-md-6">'+   
                '<label for="name">Service Name</label>'+
                <?php $n=0;?>
     '<select class="form-control" name="service_category_id[]" id="package" package_id="0">'+
     <?php foreach($service['all_packages'] as $value){?>   
     '<option value="<?=$value->id?>"><?=$value->package_name?></option>'+
    <?php $n=$value->id;} ?>
     '</select>'+
     '</div>'+
     '<div class="col-md-2">'+
      '<label for="service">Qty</label>'+
      '<input type="text" name="in_qty" class="form-control" value="1">'+
   '</div>'+
   '<div class="col-md-2">'+
      '<label for="service">Amount</label>'+
      '<input type="text" name="amount" class="form-control"readonly pvalue="0" id="deepak">      '+
   '</div>'+
  
     '<div class="form-group col-md-2 mt-4">'+
     '<button type="button" class="btn btn-danger remove-btn">Remove</button>'+ // Add the "Remove" butto
     '</div>'+
     '</div>';
   
     // Append the new HTML structure to the target element
     $(".append-data").append(newData);
   }

   $(document).on("click", ".remove-btn", function() {
     $(this).closest(".form-row").remove(); // Remove the closest parent div with class "form-row"
   });


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


   </script>