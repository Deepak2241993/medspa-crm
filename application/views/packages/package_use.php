<!-- Modal Code -->
<div class="modal fade" id="walletPackages" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<!-- <div class="modal-dialog modal-lg" id="walletPackages" tabindex="-1" role="dialog" aria-labelledby="walletPackagesLabel" aria-hidden="true"> -->
  <div class="modal-dialog" role="document">
	 <div class="modal-content" style="    width: 1200px; margin-left: -300px;">
		<div class="modal-header">
		  <h5 class="modal-title" id="walletPackagesLabel">Available Package in Wallet</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			 <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form method="post" action="<?=base_url()?>patients/useservices">
				<div class="modal-body">
				<table id="data-table" class="table table-bordered  table-responsive">
                                    <thead>
                                    
                                       <tr>
                                          <th>SR No.</th>
                                          <th>Date</th>
                                          <th>Transaction ID</th>
                                          <th>Added By</th>
                                          <th>Particulars</th>
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
														<td><?=$moneyvalueresult[0]->money_value?></td>
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
													<!-- Session Used By Provider -->
												</tr>
												<?php
													$sr++;
                                          
                                          }
                                          ?>
                                       
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
<!-- Modal Code End -->