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
                     <?php if($this->session->flashdata('success')){
                                 echo $this->session->flashdata('success');
                                 }if($this->session->flashdata('error')){
                                 echo $this->session->flashdata('error');
                                 }?>
                     <ul id="tabs" class="nav nav-tabs">
                        <li class="nav-item"><a href="" data-target="#wallet" data-toggle="tab" class="nav-link small text-uppercase active">Wallet Amount</a></li>
                        <li class="nav-item"><a href="" data-target="#services" data-toggle="tab" class="nav-link small text-uppercase">Wallet Services</a></li>
                        <li class="nav-item"><a href="" data-target="#packages" data-toggle="tab" class="nav-link small text-uppercase">Wallet Package</a></li>
                        <li class="nav-item"><a href="" data-target="#history" data-toggle="tab" class="nav-link small text-uppercase">History</a></li>
                        
                        
                     </ul>
                     <br>
                     <div id="tabsContent" class="tab-content ">
                        <div id="wallet" class="tab-pane fade active show">
                           <div class="wallet">
                              <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#wallet_amount">Add Amount</button>
                              <!-- Button trigger modal -->
                              
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
                                             <input type="text" name="description" required placeholder="Description" class="form-control mt-4" required>
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
                           <div class="services ">
                              <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#services_amount">Add Services</button>
                              <!-- Button trigger modal -->
                            
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
                                          <div class="modal-body row">
                                          <div class="form-group col-md-6">
                                             <label for="service"> Service Name<span class="text-danger">*</span></label>
                                             <select class="form-control" name="service_id[]" required id="service">
                                                <option value ="">Select Service</option>
                                                <?php
                                                   foreach($result['all_services'] as $value)
                                                   {?>
                                                <option value="<?=$value->id?>"><?=$value->service_name?></option>
                                                <?php }?>
                                             </select>
                                          </div>
                                          <div class="form-group col-md-6">
                                             <label for="service_number">Session Number<span class="text-danger">*</span></label>
                                            <input type="number" id="service_number" class="form-control"  min="1" required name="service_session_number_cr[]" value="1">
                                          </div>

                                         
                                          <div class="append-data"></div>
                                          <button type="button" class="btn btn-primary mb-4" onclick="serviceAssign()">Add More</button>
                                          <div class="form-group col-md-12">
                                             <label for="description">Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="description" name="description" required></textarea>
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
                                 <table  class="table table-bordered  table-responsive">
                                    <thead>
                                    
                                       <tr>
                                          <th>SR No.</th>
                                          <th>Date</th>
                                          <th>Transaction ID</th>
                                          <th>Added By</th>
                                          <th>Particulars</th>
                                          <th class="text-success">Service & No.of Session</th>
                                          <th class="text-success">Money Value</th>
                                       </tr>
                                    </thead>
									<tbody>
                                       <?php
                                          $sr =1;
                                          foreach($result['service_wallet_history'] as $value)
                                          {
                                            
                                          ?>
												<tr>
													<td><?=$sr?></td>
													<td><?=$value->created_at?></td>
													<td>
														<?=$value->transaction_id?>
														
													</td>
													<td><?=$value->name?></td>
													<td><?=$value->description?></td>
													<td style="width:25%">
														<?php
														$service_id= json_decode($value->service_id); 
														$session_amount= json_decode($value->service_session_number_cr); 
														if (is_array($service_id) || is_object($service_id))
														{

														foreach($service_id as $key=>$services_value)
														{
														
															$serviceresult=$this->MasterModel->get_databy_id($services_value,'services');
															$service_name=$serviceresult[0]->service_name;
														?>
														<ul class="p-1 ml-2"> 
															<li >Service Name: <b><?=$service_name?></b></li>
															<li >Purchase Session: <b><?=$session_amount[$key]?></b></li>
															<?php 
															$this->db->select_sum('service_session_qty_in', 'total_qty_in');
															$this->db->select_sum('service_session_qty_out', 'total_qty_out');
															$this->db->select_sum('balance_session', 'total_balance_session'); // Add alias for balance_session
															$this->db->where('service_id', $serviceresult[0]->id);
															$this->db->where('transaction_id', $value->transaction_id);
															$this->db->where('session_use_trn_id IS NOT NULL'); // Use "IS NOT NULL" for session_use_trn_id
															$data = $this->db->get('transaction_service_wallet');
															$calculation = $data->result();

															$id_for_session = preg_replace("/[a-zA-Z]/", "",$value->transaction_id);
															$id_for_session = str_replace("-","",$id_for_session);
																//  print_r($calculation); die();
															?>
															<li>Balance Session: <b id="balance_<?=$id_for_session.$key?>"><?=($calculation[0]->total_qty_in)-($calculation[0]->total_qty_out)?></b></li>
														</ul>
														<?php } }?>
													</td>

														<!-- for money Value -->
														<?php
														$moneyvalueresult=$this->WalletModel->moneyvalueshow($value->transaction_id,'moneyvalue');
														if($moneyvalueresult && $moneyvalueresult[0]->money_value>0)
														{
														?>
														<td><?=$moneyvalueresult[0]->money_value?></td>
														<?php }
														else{ ?>
														<td>Null</td>
														<?php } ?>
												</tr>
												<?php
													$sr++;
                                          
                                          }
                                          ?>
                                       
                                    </tbody>

									</table>
                              </div>
                           </div>
                        </div>




                        <div id="packages" class="tab-pane fade">
                           <div class="packages">
                              <a href="<?=base_url()?>packages/package_list/<?=$id?>" class="btn btn-primary mb-4" >Add Packages</a>
                              <div class="cart-view">
                              
                           </div>
                              <!-- Button trigger modal -->
                             
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
                                                      <select class="form-control" name="service_id[]" required id="service_0">
                                                         <option value ="">Select Package</option>
                                                         <?php
                                                            foreach($result['all_packages'] as $value)
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
                                          <th>Amount Cr</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                          $sr =1;
                                          $inAmountSum = 0;
                                          $outAmountSum = 0;
                                          $total=0;
                                          foreach($result['wallet_items'] as $pt)
                                          // print_r($result['wallet_items']); die();
                                          {
                                             // $inAmountSum += $pt->in_amount;
                                             // $outAmountSum += $pt->out_amount;
                                             // $total=$inAmountSum-$outAmountSum;
                                          ?>
                                       <tr>
                                          <td><?=$sr?></td>
                                          <td><?=$pt->created?></td>
                                          <td><?=$pt->transaction_id?></td>
                                          
                                          <td style="color:green;"><?=$pt->grand_total?></td>
                                          <td><a href="<?=base_url()?>packages/orderSuccess/<?=$pt->order_id?>">View Details</a></td>
                                          
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



                        <div id="history" class="tab-pane fade">
                           <div class="history ">
                           <table id="data-table" class="table table-bordered ">
                                 <thead>
                                 
                                    <tr>
                                       <th>SR No.</th>
                                       <th>Date</th>
                                       <th>Transaction ID</th>
                                       <th>AddedBy/Used By</th>
                                       <th>Services Name</th>
                                       <th class="text-success">No.of Session IN</th>
                                       <th class="text-danger">No.of Session OUT</th>
                                       <th class="text-success">Balance Till Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $n=1;
                                    foreach($result['transaction_wallet_history'] as $value)
                                    {?>
                                    <tr>
                                    <th><?=$n?></th>
                                       <th><?=$value->created_at?></th><!-- For Date-->
                                       <th><?php if($value->session_use_trn_id=='NULL'){echo $value->transaction_id;} else{echo $value->session_use_trn_id;}?></th><!-- For Transaction Id-->
                                       <th><?php if($value->session_use_trn_id=='NULL'){echo $value->added_person;} else{echo $value->emp_name;}?></th><!-- For Geting Employee Name-->
                                       <th><?php if($value->session_use_trn_id=='NULL'){echo $value->added_service;} else{echo $value->service_name;}?></th><!-- For Geting Service Name-->
                                       <th class="text-success"><?php if($value->session_use_trn_id=='NULL'){echo ($value->service_session_qty_in)-($value->service_session_qty_out);} else echo 'Null';?></th> <!-- For Number of Session IN  Wallet-->
                                       <th class="text-danger"><?php if($value->session_use_trn_id!='NULL' && $value->session_use_trn_id!='NULL'){echo $value->service_session_qty_out;}else echo 'Null';?></th> <!-- For Number of Session Use from Wallet-->
                                       
                                       <th class="text-success">
                                       <?php 
															$this->db->select_sum('service_session_qty_in', 'total_qty_in');
															$this->db->select_sum('service_session_qty_out', 'total_qty_out');
															$this->db->select_sum('balance_session', 'total_balance_session'); // Add alias for balance_session
															$this->db->where('service_id', $value->service_id);
															$this->db->where('transaction_id', $value->transaction_id);
															$this->db->where('created_at <=',$value->created_at); // Use "IS NOT NULL" for session_use_trn_id
															$data = $this->db->get('transaction_service_wallet');
															$calculation = $data->result();
																//  print_r($calculation); die();
															?>
                                             <?=($calculation[0]->total_qty_in)-($calculation[0]->total_qty_out)?>
                                       </th>
                                       </tr>
                                       <?php $n++;} ?>            
                                 </tbody>

									</table>
                              
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
     '<div class="form-group col-md-5">'+   
                '<label for="name">Service Name<span class="text-danger">*</span></label>'+
     '<select class="form-control" name="service_id[]" required>'+
     <?php foreach($result['all_services'] as $value){?>   
     '<option value="<?=$value->id?>"><?=$value->service_name?></option>'+
    <?php }?>
     '</select>'+
     '</div>'+

     '<div class="form-group col-md-4">'+   
                '<label for="name">Session Number<span class="text-danger">*</span></label>'+
                '<input type="number" class="form-control" min="1" required name="service_session_number_cr[]" value="1">'+
    
     '</div>'+
  
     '<div class="form-group col-md-1 mt-4">'+
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
     '<select class="form-control" name="service_id[]" required id="package" package_id="0">'+
     <?php foreach($result['all_packages'] as $value){?>   
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