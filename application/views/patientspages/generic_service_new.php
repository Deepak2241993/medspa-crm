<!-- Page Container START -->
<div class="page-container">
   <!-- Content Wrapper START -->
   <div class="main-content">
      <div class="card">
         <div class="card-body">
            <h4>Patient Details</h4>
            <div class="m-t-25">
               <div class="form-row">
                  <div class="form-group col-md-4">
                     <label for="name">Patient Name <span class="text-danger">*</span></label>
                     <input type="text" readonly value="<?=$patient[0]->pname?>" class="form-control" id="name" placeholder="Patient Name" required="" autocomplete="off">
                  </div>
                  <?=form_error('name','<div class="text-danger">','</div>')?>
                  <div class="form-group col-md-4">
                     <label for="email">Patient Email <span class="text-danger">*</span></label>
                     <input type="text" readonly class="form-control" value="<?=$patient[0]->email?>" id="email" placeholder="Patient Email" required="" autocomplete="off">
                  </div>
                  <?=form_error('email','<div class="text-danger">','</div>')?>
                  <div class="form-group col-md-4">
                     <label for="phone">Patient Number <span class="text-danger">*</span></label>
                     <input type="text" readonly  value="<?=$patient[0]->phone?>" class="form-control" id="phone" placeholder="Patient Number" required="" autocomplete="off">
                  </div>
                  <?=form_error('phone','<div class="text-danger">','</div>')?>
                  <div class="form-group col-md-4">
                     <label for="gender">Patient Gender <span class="text-danger">*</span></label>
                     <input type="text" readonly  value="<?=ucfirst($patient[0]->gender)?>" class="form-control" id="gender" placeholder="Patient Gender" required="" autocomplete="off">
                  </div>
                  <?=form_error('gender','<div class="text-danger">','</div>')?>
                  <div class="form-group col-md-4">
                     <label for="age">Patient Age <span class="text-danger">*</span></label>
                     <input type="text" readonly  value="<?=$patient[0]->age?>" class="form-control" id="age" placeholder="Patient Age" required="" autocomplete="off">
                  </div>
                  <?=form_error('age','<div class="text-danger">','</div>')?>
               </div>
            </div>
         </div>
      </div>
      <?= form_open('patients/caculation_of_patient_note', array('enctype' => 'multipart/form-data')) ?>
      <div class="card patient_service_details">
         <div class="card-body">
            <div class="row">
               <input type="hidden" value="<?=$patient[0]->prid?>" name="prid">
               <input type="hidden" value="<?=$patient_notes_id[0]?>" name="patient_notes_id">
               <div class="col-md-5">
                  <h1>Service Assign to Patient</h1>
               </div>
               <div class="col-md-7">
                  <button type="button" class="btn btn-primary" onclick="addMoreServices()">Add More Services</button>
               </div>
            </div>
            <!-- Service Use From Wallet Process -->
            <?php 
               // print_r($_SESSION['service_use']['service_id']);
               if(isset($_SESSION['service_use']))
               {
               foreach($_SESSION['service_use']['service_id'] as $key=>$servicevalue)
               	if($_SESSION['service_use']['session_use'][$key]!=0)
               	{
               {?>
            <div class="col-md-12">
               <div class="service_Section mb-2"  style="border: dashed;">
                  <div class="form-row p-4">
                     <div class="form-group col-md-6">
                        <label for="servicename_s_1<?=$key?>">Service Name</label>
                        <select class="form-control" id="servicename_s_1<?=$key?>" name="wallet_service_id[]" onchange="calculation(1);">
                           <option value ="">Select Service</option>
                           <?php
                              foreach($services as $value)
                              {
                              	// for hide other option
                              	if($value->id==$servicevalue)
                              	{
                              	?>
                           <option value="<?=$value->id?>"<?php if($value->id==$servicevalue){echo "selected";}?>><?=$value->service_name?></option>
                           <?php }}?>
                        </select>
                     </div>
                    
                     <div class="form-group col-md-6">
                        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#walletServices">Services From Wallet
                        </button>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="wallet_productname_<?=$key?>">Product Name</label>
                        <select class="form-control" id="wallet_productname_<?=$key?>" name="wallet_service_product_use_id[]" >
                           <option value ="">Select Product</option>
                           <?php
                              foreach($products as $value)
                              {?>
                           <option value="<?=$value->product_id?>"><?=$value->product_name?></option>
                           <?php }?>
                        </select>
                     </div>
                     <div class="form-group col-md-3">
                        <label for="service_product_qty_<?=$key?>">Qty</label>
                        <input type="text" id="service_product_qty_<?=$key?>" class="form-control" name="wallet_service_product_qty_use[]"placeholder="Enter Qty">
                     </div>
                     <div class="form-group col-md-3 mt-4">
                        <button type="button" class="btn btn-primary" onclick="addMoreWalletServiceProduct('<?=$servicevalue?>')">Add More</button>
                     </div>
                     <div class="row productappend_s_<?=$servicevalue?>"></div>
                  </div>
               </div>
            </div>
            <!-- Service Use From Wallet Process -->
            <?php
               }}}else{ ?>
            <!-- Direct Service Use -->
            <div class="col-md-12">
               <div class="service_Section serviceAmountCalculation mb-2"  style="border: dashed;">
                  <div class="form-row p-4">
                     <div class="form-group col-md-4">
                        <label for="servicename_s_1">Service Name</label>
                        <select class="form-control servicePurchase" id="servicename_s_1" name="service_sale[]" onchange="calculation(1);updateSum()">
                           <option value ="">Select Service</option>
                           <?php
                              foreach($services as $value)
                              {?>
                           <option value="<?=$value->id?>"><?=$value->service_name?></option>
                           <?php }?>
                        </select>
                     </div>
                     <div class="form-group col-md-2">
                     <label for="session_qty_s_1">Session Qty</label>
                        <input type="number" min="1" id="session_qty_s_1" class="form-control"value="1" name="service_session_qty_use[]" onkeyup="calculation_asper_qty(1);updateSum()" onchange="calculation_asper_qty(1);updateSum()">
                     </div>
                     <div class="form-group col-md-6">
                        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#walletServices">Use Wallet
                        </button>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="productname_s_1">Product Name</label>
                        <select class="form-control" id="productname_s_1" name="service_sale_product_id[]" onchange="calculation(1)">
                           <option value ="">Select Product</option>
                           <?php
                              foreach($products as $value)
                              {?>
                           <option value="<?=$value->product_id?>"><?=$value->product_name?></option>
                           <?php }?>
                        </select>
                     </div>
                     <div class="form-group col-md-3">
                        <label for="product_qty_s_1">Qty</label>
                        <input type="text" id="product_qty_s_1" class="form-control" name="service_sale_product_qty[]"placeholder="Enter Qty">
                        <input type="hidden" id="service_amount_s_1" class="form-control calculation_amount"value="0">
                     </div>
                     <div class="form-group col-md-3 mt-4">
                        <button type="button" class="btn btn-primary" onclick="addMoreServiceProduct(0)">Add More</button>
                     </div>
                     <div class="row productappend_s_0"></div>
                  </div>
               </div>
            </div>
            <!-- Direct Service Use -->
            <?php } ?>
            <!-- The target element where data will be appended -->
            <div class="col-md-12 appendservice"></div>
         </div>
      </div>
      <div class="card patient_service_details">
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <h1>Extranal Product out of service </h1>
               </div>
            </div>
            <div class="product_Section calculation"  style="border: dashed;">
               <div class="row mt-4 ml-4">
                  <div class="form-group col-md-3">
                     <label for="product_pname_1">Product Name</label>
                     <select class="form-control product_name" id="product_pname_1" onchange="getProductInfo(1);updateSum()" name="extra_sale_product_id[]">
                        <option value ="">Select Service</option>
                        <?php
                           foreach($products as $value)
                           {?>
                        <option value="<?=$value->product_id?>" ><?=$value->product_name?></option>
                        <?php }?>
                     </select>
                  </div>
                  <div class="form-group col-md-2">
                     <label for="product_pqty_1">Qty</label>
                     <input type="text" id="product_pqty_1" class="form-control" onkeyup="getProductAmount(1);updateSum()" value="0" name="extra_sale_product_qty[]"placeholder="Enter Qty">
                  </div>
                  <div class="form-group col-md-2">
                     <label for="product_pprice_1">Price</label>
                     <input type="text" readonly id="product_pprice_1" class="form-control" value="0" name="extra_sale_product_price[]"placeholder="Enter Price">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="product_pamount_1">Amount</label>
                     <input type="text" readonly id="product_pamount_1" value="0"  class="form-control calculation_amount"name="extra_sale_product_amount[]"placeholder="Amount">
                  </div>
               </div>
               <div class="row p-4 productDataAppend"></div>
               <div class="form-group col-md-3">
                  <button type="button" class="btn btn-primary" onclick="productAddAssign()">Add More</button>
               </div>
            </div>
            <!-- <div class="form-group col-md-3"></div> -->
         </div>
         <!-- The target element where data will be appended -->
         <div class="form-group col-md-12 mt-4">
            <label for="product_pprice">Description</label>
            <textarea name="description" class="form-control"></textarea>
         </div>
         <div class="form-group col-md-12 mt-4">
            <label for="product_pprice">Image Upload</label>
            <input type="file" class="form-control" name="image" id="image">
         </div>
      </div>
      <div class="card patient_service_details">
         <div class="card-body">
            <h2>Payment Section</h2>
            <div class="row">
               <div class="form-group col-md-3">
                  <label for="netamount">Net Amount</label>
                  <input type="text" value="0" placeholder="Net Amount" id="netamount"class="form-control" name="bill_amount">
               </div>
               <div class="form-group col-md-3">
                  <label for="discountMethod">Discount Method</label><br>
                  <select name="discountMethod" id="discountMethod"onchange="discountCalculation()" class="form-control">
                     <option value="">Select Discount Method</option>
                     <option value="1">Discount In $ Amoun</option>
                     <option value="0">Discount In % Percent</option>
                  </select>
               </div>
               <div class="form-group col-md-3">
                  <label for="discount">Discount</label>
                  <input type="text" value="0" onkeyup="discountCalculation()" placeholder="Discount" id="discount"class="form-control" name="discount_amount">
               </div>
               <div class="form-group col-md-3">
                  <label for="payble_amount">Final Amount</label>
                  <input type="text" value="0" placeholder="Paybel Amount" id="payble_amount"class="form-control" name="new_paybale_amount">
               </div>
            </div>
         </div>
      </div>
      <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
   </div>
</div>
<?=form_close()?>
</div>
</div>
<!-- Service Modal Code -->
<div class="modal fade" id="walletServices" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="    width: 950px; margin-left: -200px;">
         <div class="modal-header">
            <h5 class="modal-title" id="walletServicesLabel">Package & Service in Wallet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form method="post" action="<?=base_url()?>patients/useservices"enctype='multipart/form-data'>
            <div class="modal-body">
               <table id="data-table" class="table table-bordered  table-responsive">
                  <thead>
                     <tr>
                        <th>SR No.</th>
                        <th>Date</th>
                        <th>Transaction ID</th>
                        <!-- <th>Added By</th> -->
                        <th>Particulars/Package Name</th>
                        <th class="text-success">Service & No.of Session</th>
                        <th class="text-success">Money Value</th>
                        <th class="text-success">Session Used By Provider</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $sr =1;
                        foreach($service_wallet_history as $value)
                        {
                          
                        ?>
                     <tr>
                        <td><?=$sr?></td>
                        <td><?=$value->created_at?></td>
                        <td>
                           <?=$value->transaction_id?>
                        </td>
                        <!-- <td><?=$value->name?></td> -->
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
                                 //  $calculation=$this->WalletModel->calculation_of_wallet_services($patient[0]->prid,$serviceresult[0]->id,$value->transaction_id);
                                 $this->db->select_sum('service_session_qty_in', 'total_qty_in');
                                 $this->db->select_sum('service_session_qty_out', 'total_qty_out');
                                 $this->db->select_sum('balance_session', 'total_balance_session'); // Add alias for balance_session
                                 $this->db->where('service_id', $serviceresult[0]->id);
                                 $this->db->where('patient_id', $patient[0]->prid);
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
                        <td>$<?=$moneyvalueresult[0]->money_value?></td>
                        <?php }
                           else{ ?>
                        <td>Null</td>
                        <?php } ?>
                        <!-- for money Value -->
                        <!-- Session Used By Provider -->
                        <td>
                           <?php
                              $service_id= json_decode($value->service_id); 
                              
                              // if (is_array($service_id) || is_object($service_id))
                              if (is_array($service_id))
                              {
                              
                              foreach($service_id as $key=>$services_value)
                              {
                              
                              	$serviceresult=$this->MasterModel->get_databy_id($services_value,'services');
                              	$service_name=$serviceresult[0]->service_name;
                              	$service_id=$serviceresult[0]->id;
                              	$service_charge=$serviceresult[0]->service_charge;
                              	// print_r($service_charge);
                              ?>
                           <?=$service_name?><br>
                           <input type="number" name="session_use[]" id="session_<?=$id_for_session.$key?>" min="0" value=""  class="form-control" onchange="checkSessionQty('<?=$id_for_session.$key?>','<?=$value->transaction_id?>',<?=$service_id?>,<?=$service_charge?>)" onkeyup="checkSessionQty('<?=$id_for_session.$key?>','<?=$value->transaction_id?>',<?=$service_id?>)">
                           <input type="hidden" class="empty_date" id="service_id_<?=$id_for_session.$key?>" value="<?=$service_id?>" name="service_id[]">
                           <input type="hidden" class="empty_date" id="money_value_<?=$id_for_session.$key?>" value="" name="used_money_value[]">
                           <input type="hidden" class="empty_date" id="transaction_id_<?=$id_for_session.$key?>" value="" name="transaction_id[]">
                           <!-- <ol class="p-1 ml-2"> 
                              <li><?=$service_name?> <?=$value->remaining_money_value?></li>
                              </ol> -->
                           <?php } }?>
                        </td>
                     </tr>
                     <?php $sr++; } ?>
                     <!--  For Package Code -->
                     <?php
                        foreach($packages_in_wallet as $value)
                        {
                        $service_id= json_decode($value->service_id); 
                        $session_amount= json_decode($value->service_session);
                          // print_r($packages_in_wallet); die();
                        ?>
                     <tr>
                        <td><?=$sr?></td>
                        <td><?=$value->created?></td>
                        <td><?=$value->transaction_id?></td>
                        <td><?=$value->package_name?></td>
                        <td style="width:25%">
                           <?php
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
                                 $this->db->where('patient_id', $patient[0]->prid);
                                 $this->db->where('transaction_id', $value->transaction_id);
                                 $this->db->where('session_use_trn_id IS NOT NULL'); // Use "IS NOT NULL" for session_use_trn_id
                                 $data = $this->db->get('transaction_service_wallet');
                                 $calculation = $data->result();
                                 
                                 $id_for_session = preg_replace("/[a-zA-Z]/", "",$value->transaction_id);
                                 $id_for_session = str_replace("-","",$id_for_session);
                                 	//  print_r($calculation); die();
                                 ?>
                              <li>Balance Session: <b id="balance_<?=$id_for_session.$key?>"><?=($session_amount[$key])-($calculation[0]->total_qty_out)?></b></li>
                           </ul>
                           <?php } }?>
                        </td>
                        <!-- for money Value -->
                        <?php
                           $moneyvalue = 0;
                           foreach ($service_id as $key => $services_value) {
                           	$serviceresult = $this->MasterModel->get_databy_id($services_value, 'services');
                           	$service_name = $serviceresult[0]->service_name;
                           	$charge = $serviceresult[0]->service_charge;
                           
                           	// for calculation
                           	$this->db->select_sum('service_session_qty_in', 'total_qty_in');
                           	$this->db->select_sum('service_session_qty_out', 'total_qty_out');
                           	$this->db->select_sum('balance_session', 'total_balance_session'); // Add alias for balance_session
                           	$this->db->where('service_id', $serviceresult[0]->id);
                           	$this->db->where('patient_id', $patient[0]->prid);
                           	$this->db->where('transaction_id', $value->transaction_id);
                           	$this->db->where('session_use_trn_id IS NOT NULL'); // Use "IS NOT NULL" for session_use_trn_id
                           	$data = $this->db->get('transaction_service_wallet');
                           	$calculation = $data->result();
                           	if (!empty($calculation)) {
                           		$moneyvalue += $calculation[0]->total_qty_out * $charge;
                           	}
                           }
                           ?>
                        <td>$<?php if(($value->grand_total - $moneyvalue) < 0) { echo "Null";} else{echo $value->grand_total - $moneyvalue;} ?></td>
                        <!-- for money Value -->
                        <!-- Session Used By Provider -->
                        <td>
                           <?php
                              $service_id= json_decode($value->service_id); 
                              if (is_array($service_id))
                              {
                              
                              foreach($service_id as $key=>$services_value)
                              {
                              
                              	$serviceresult=$this->MasterModel->get_databy_id($services_value,'services');
                              	$service_name=$serviceresult[0]->service_name;
                              	$service_id=$serviceresult[0]->id;
                              	$service_charge=$serviceresult[0]->service_charge;
                              	
                              ?>
                           <?=$service_name?><br>
                           <input type="number" name="session_use[]" id="session_<?=$id_for_session.$key?>" min="0" value=""  class="form-control" onchange="checkSessionQty('<?=$id_for_session.$key?>','<?=$value->transaction_id?>',<?=$service_id?>,<?=$service_charge?>)" onkeyup="checkSessionQty('<?=$id_for_session.$key?>','<?=$value->transaction_id?>',<?=$service_id?>)">
                           <input type="hidden" class="empty_date" id="service_id_<?=$id_for_session.$key?>" value="<?=$service_id?>" name="service_id[]">
                           <input type="hidden" class="empty_date" id="money_value_<?=$id_for_session.$key?>" value="" name="used_money_value[]">
                           <input type="hidden" class="empty_date" id="transaction_id_<?=$id_for_session.$key?>" value="" name="transaction_id[]">
                           <?php } }?>
                        </td>
                     </tr>
                     <?php $sr++;}?>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary useServices">Use Services</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!--  Service Modal Code End -->
<script>
   // Declare clickNumber outside the function to keep its value
   var clickNumber = 1;
   
   function addMoreServices() {
     // Increment clickNumber by 1 for each call
     clickNumber++;
   
     var service_count='s_'+clickNumber;
   //   alert(service_count);
   
     // Create a new HTML structure with the input values
         var newData = '<div class="service_Section serviceAmountCalculation mb-2" style="border: dashed;">' +
            '<div class="form-row p-4">' +
            '<div class="form-group col-md-4">' +
            '<label for="servicename_' + service_count + '">Service Name</label>' +
            '<select class="form-control" id="servicename_' + service_count + '" name="service_sale[]" onchange="calculation('+clickNumber+')">' +
            '<option value="">Select Service</option>' +
            '<?php foreach($services as $value) { ?>' +
            '<option value="<?= $value->id ?>"><?= $value->service_name ?></option>' +
            '<?php } ?>' +
            '</select>' +
            '</div>' +
            '<div class="form-group col-md-2">'+
            ' <label for="session_qty_s_1">Session Qty</label>'+
               '<input type="number" id="session_qty_' + service_count + '" min="1" class="form-control" value="1" name="service_session_qty_use[]" onkeyup="calculation_asper_qty('+clickNumber+');updateSum()" onchange="calculation_asper_qty('+clickNumber+');updateSum()">'+
            '</div>'+
            '<div class="form-group col-md-6">'+
            '</div>'+
   
   			'<div class="form-group col-md-6 product_' + service_count + '">' +
   			'<label for="productname_' + service_count + '">Product Name</label>' +
   			'<select class="form-control" id="productname_' + service_count + '" name="service_sale_product_id[]">' +
   			'<option value="">Select Product</option>' +
   			'<?php foreach($products as $value) { ?>' +
   			'<option value="<?= $value->product_id ?>"><?= $value->product_name ?></option>' +
   			'<?php } ?>' +
   			'</select>' +
   			'</div>' +
   			'<div class="form-group col-md-3 qty_' + service_count + '">' +
   			'<label for="product_qty_' + service_count + '">Qty</label>' +
   			'<input type="text" id="product_qty_' + service_count + '" class="form-control" name="service_sale_product_qty[]" placeholder="Enter Qty">' +
   			'<input type="hidden" id="service_amount_' + service_count + '" class="form-control calculation_amount" value="0">' +
   			'</div>' +
   			'<div class="form-group col-md-3 mt-4 removebutton_' + service_count + '">' +
   			'<button type="button" class="btn btn-primary" onclick="addMoreServiceProduct('+clickNumber+')">Add More</button>' +
   			'</div>' +        
   			'<div class="row productappend_' + service_count + '"></div>'+
   	 '<div class="form-group col-md-3 mt-4">' +
   	 '<button type="button" class="btn btn-warning service-btn">Remove This Service</button>' +
   
   	 '</div>' +
   	 '</div>' +
   	 '</div>';
   
     // Append the new HTML structure to the target element with class "appendservice"
     $(".appendservice").append(newData);
     
   setTimeout(() => {
   		updateSum();
   	}, 1000);
   }
   
   
   var productNumber = 1;
   function addMoreServiceProduct(append_id) {
     // Increment clickNumber by 1 for each call
     productNumber++;
   var newData ='<div class="form-group col-md-6 product_' + productNumber + '">'+
   					'<label for="productname_'+productNumber+'">Product Name</label>'+
   					'<select class="form-control" id="productname_'+productNumber+'" name="service_assign[]">'+
   						'<option value ="">Select Product</option>'+
   						<?php
      foreach($products as $value)
      {?>
   						'<option value="<?=$value->product_id?>"><?=$value->product_name?></option>'+
   						<?php }?>
   					'</select>'+
   				'</div>'+
   				'<div class="form-group col-md-3 qty_' + productNumber + '">'+
   					'<label for="product_qty_'+productNumber+'">Qty</label>'+
   					'<input type="text" id="product_qty_'+productNumber+'" class="form-control" name="pay_amount[]"placeholder="Enter Qty">'+
   				'</div>'+
   				'<div class="form-group col-md-3 mt-4 removebutton_' + productNumber + '">'+
   					'<button type="button" class="btn btn-danger"onclick="removeMoreServiceProduct('+productNumber+')">Remove</button>'+
   				'</div>';
   
     // Append the new HTML structure to the target element with class "appendservice"
     $(".productappend_s_"+append_id).append(newData);
   }
   
   
   
   // For Wallet product Append
   var walletproductNumber = 1;
   function addMoreWalletServiceProduct(append_id) {
     // Increment clickNumber by 1 for each call
     walletproductNumber++;
   var newData ='<div class="form-group col-md-6 product_' + walletproductNumber + '">'+
   					'<label for="productname_'+walletproductNumber+'">Product Name</label>'+
   					'<select class="form-control" id="productname_'+walletproductNumber+'" name="wallet_service_product_use_id[]">'+
   						'<option value ="">Select Product</option>'+
   						<?php
      foreach($products as $value)
      {?>
   						'<option value="<?=$value->product_id?>"><?=$value->product_name?></option>'+
   						<?php }?>
   					'</select>'+
   				'</div>'+
   				'<div class="form-group col-md-3 qty_' + walletproductNumber + '">'+
   					'<label for="service_product_qty_'+walletproductNumber+'">Qty</label>'+
   					'<input type="text" id="service_product_qty_'+walletproductNumber+'" class="form-control" name="wallet_service_product_qty_use[]"placeholder="Enter Qty">'+
   				'</div>'+
   				'<div class="form-group col-md-3 mt-4 removebutton_' + walletproductNumber + '">'+
   					'<button type="button" class="btn btn-danger"onclick="removeMoreServiceProduct('+walletproductNumber+')">Remove</button>'+
   				'</div>';
   
     // Append the new HTML structure to the target element with class "appendservice"
     $(".productappend_s_"+append_id).append(newData);
   }
   
   // Wallet product append
   
   
   //  For Service Product Remove Use
   function removeMoreServiceProduct(removeproduct_id){
     $(".product_"+removeproduct_id).remove();
     $(".qty_"+removeproduct_id).remove();
     $(".removebutton_"+removeproduct_id).remove();
   }
    
   	
   //  For Service Section Remove 
   $(document).on("click", ".service-btn", function() {
   	  $(this).closest(".service_Section").remove(); // Remove the closest parent div with class "form-row"
   	});
   
   
   
   //  for Product Section 
   var Addproductcount = 1;
   function productAddAssign() {
     // Increment clickNumber by 1 for each call
     Addproductcount++;
   var newData =  '<div class="row mt-4 ml-4 calculation productSection_'+Addproductcount+'">'+
   						'<div class="form-group col-md-3">'+
   							'<label for="product_pname_'+Addproductcount+'">Product Name</label>'+
   							'<select class="form-control product_name" id="product_pname_'+Addproductcount+'" onchange="getProductInfo('+Addproductcount+');updateSum()"  name="extra_sale_product_id[]">'+
   								'<option value ="">Select Service</option>'+
   								<?php
      foreach($products as $value)
      {?>
   										'<option value="<?=$value->product_id?>"><?=$value->product_name?></option>'+
   								<?php }?>
   							'</select>'+
   						'</div>'+
   						'<div class="form-group col-md-2">'+
   							'<label for="product_pqty_'+Addproductcount+'">Qty</label>'+
   							'<input type="text" id="product_pqty_'+Addproductcount+'" onkeyup="getProductAmount('+Addproductcount+');updateSum()" value="0" class="form-control" name="extra_sale_product_qty[]"placeholder="Enter Qty">'+
   						'</div>'+
   
   						'<div class="form-group col-md-2">'+
   							'<label for="product_pprice_'+Addproductcount+'">Price</label>'+
   							'<input type="text" readonly id="product_pprice_'+Addproductcount+'" value="0" class="form-control" name="extra_sale_product_price[]"placeholder="Enter Price">'+
   						'</div>'+
   						'<div class="form-group col-md-3">'+
   							'<label for="product_pamount_'+Addproductcount+'">Amount</label>'+
   							'<input type="text" readonly id="product_pamount_'+Addproductcount+'"value="0" class="form-control calculation_amount" name="extra_sale_product_amount[]"placeholder="Amount">'+
   						'</div>'+
   
   						'<div class="form-group col-md-2 mt-4">'+
   						'<button type="button" class="btn btn-danger" onclick="removeProduct('+Addproductcount+')">Remove</button>' +
   						'</div>'+
   						
   					'</div>';
   
     // Append the new HTML structure to the target element with class "appendservice"
     $(".productDataAppend").append(newData);
   
     	setTimeout(() => {
   		updateSum();
   	}, 1000);
     
   }  
   
   function removeProduct(productcountNumber){
     $(".productSection_"+productcountNumber).remove();
    
   }
   
   $('.empty_date').val('');
   
   function checkSessionQty(session_id, transaction_id, service_id, service_charge) {
   	let balanceText = $('#balance_' + session_id).text();
       let balance = parseInt(balanceText, 10);
   	let session = parseInt($('#session_' + session_id).val());
   	
   	// alert(session_id);
       // data set in field
       var moneyvalue = session * service_charge;
       $('#money_value_' + session_id).val(moneyvalue); // Added '#' before ID
       $('#transaction_id_' + session_id).val(transaction_id); // Added '#' before ID
       $('#service_id_' + session_id).val(service_id); // Added '#' before ID
   	
       if (session > balance) {
           alert('You have no more session');
           $('#session_' + session_id).val(balance);
       }
   }
   // For geting product information
   function getProductInfo(section_count) {
   	
       var product_id = $('#product_pname_'+section_count).val();
       $.ajax({
           url: "<?php echo base_url() .'Patients/getProduct_details'?>",
           method: "post",
           data: {
               id: product_id,
           },
           dataType: "json",
           success: function (data) {
               // console.log(data[0].product_name); 
   			var getprice = data[0].cost;
   			var qty = $('#product_pqty_'+section_count).val();
   				if (qty == 0) {
                       var amount = 0;
   					var qty = 1;
                       amount = parseFloat(getprice) * parseInt(qty); // Parse values to ensure correct calculations
                       $('#product_pamount_'+section_count).val(amount.toFixed(2));
                       $('#product_pprice_'+section_count).val(getprice);
                       $('#product_pqty_'+section_count).val(qty);
   					
                   } 
   			}
   		
       });
   }
   // Product Amount Calculation as per Qty
   
   function getProductAmount(section_count) {
       var qty = $('#product_pqty_'+section_count).val();
       var price = $('#product_pprice_'+section_count).val();
       var amountAsPerQty = 0;
   		if (qty > 0) {
   			amountAsPerQty = parseFloat(price) * parseInt(qty);
   			$('#product_pamount_'+section_count).val(amountAsPerQty.toFixed(2)); // Limit to two digits after the decimal point
   			
   		}
   }
   
   // for calculation
   
   function calculation(count) {
       var service_id = $('#servicename_s_' + count).val();
       // var netAmount = parseFloat($('#netamount').val()); // Parse netAmount to float
       $.ajax({
           url: "<?php echo base_url() . 'Patients/calculation' ?>",
           method: "post",
           data: {
               id: service_id,
           },
           dataType: "json",
           success: function (data) {
               var charge = parseFloat(data[0].service_charge); // Parse charge to float
   
               $('#service_amount_s_' + count).val(charge.toFixed(2)); // Set netAmount with 2 decimal places
           }
       });
   	setTimeout(() => {
   		updateSum();
   	}, 1000);
   }

   function calculation_asper_qty(count) {
       var service_id = $('#servicename_s_' + count).val();
       var session_qty = $('#session_qty_s_' + count).val();
       // var netAmount = parseFloat($('#netamount').val()); // Parse netAmount to float
       $.ajax({
           url: "<?php echo base_url() . 'Patients/calculation' ?>",
           method: "post",
           data: {
               id: service_id,
           },
           dataType: "json",
           success: function (data) {
               var charge = parseFloat(data[0].service_charge); // Parse charge to float
               var charge =parseFloat(data[0].service_charge * session_qty);
   
               $('#service_amount_s_' + count).val(charge.toFixed(2)); // Set netAmount with 2 decimal places
           }
       });
   	setTimeout(() => {
   		updateSum();
   	}, 1000);
   }
   
   function discountCalculation(){
   	
   	var method = $('#discountMethod').val();
   	if(method==1)
   	{
   	var discount = $('#discount').val();
   	var newNetAmount = $('#netamount').val();
   	var payable_amount=(newNetAmount-discount);
   	$('#netamount').val(newNetAmount); // Set netAmount with 2 decimal places
       $('#payble_amount').val(payable_amount.toFixed(2)); // Set payable_amount with 2 decimal places
   	}
   	else{
   	// Assuming discount is in percentage
   	var discountPercentage = parseFloat($('#discount').val());
   	var newNetAmount = parseFloat($('#netamount').val());
   
   	// Calculate discount amount
   	var discountAmount = (discountPercentage / 100) * newNetAmount;
   
   	// Calculate payable amount after discount
   	var payableAmount = newNetAmount - discountAmount;
   
   	// Update the displayed values with 2 decimal places
   	$('#netamount').val(newNetAmount.toFixed(2));
   	$('#payble_amount').val(payableAmount.toFixed(2));
   		}
   }
   
   //  for all calculation
   		function updateSum() {
   			var productAmountValue=0;
   			var serviceAmountValue=0;
   			var productAmountValue = $('input[name="extra_sale_product_amount[]"]').val();
   			var serviceAmountValue = $('input[name="service_sale[]"]').val();
               var sum = 0;
               var serviceSum = 0;
   
   
   			// for service calculation
   			$('.serviceAmountCalculation').each(function () {
   				var Serviceamount = $(this).find('.calculation_amount').val();
                   amount = parseFloat(Serviceamount) || 0;
                   serviceSum += amount;
               });
   
               // Loop through each product section and add the amount to the sum
               $('.calculation').each(function () {
   				var amount = $(this).find('.calculation_amount').val();
                   amount = parseFloat(amount) || 0;
                   sum += amount;
               });
   
   			
   
   			var finalAmount=parseFloat(sum+serviceSum);
   			console.log(finalAmount);
               // Update the total amount field
               $('#netamount').val(finalAmount);
               $('#payble_amount').val(finalAmount);
           }
   		
   		$("body").delegate(".product_name", "change", function( event ) {
   			setTimeout(() => {
   				updateSum();
   			}, 1000);
   		});
   
</script>