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
                            
                              <!-- Button trigger modal -->
                              <?php if($this->session->flashdata('success')){
                                 echo $this->session->flashdata('success');
                                 }if($this->session->flashdata('error')){
                                 echo $this->session->flashdata('error');
                                 }?>
                             

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
                            
                              <div class="table-responsive">
                                 <table id="data-table" class="table table-bordered">
                                    <thead>
                                    
                                       <tr>
                                          <th>SR No.</th>
                                          <th>Date</th>
                                          <th>Transaction ID</th>
                                          <th>Added By</th>
                                          <th>Particulars</th>
                                          <th class="text-success">Service Cr.</th>
                                          <th class="text-danger">Service Dr.</th>
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
                                          $service_id= json_decode($value->service_id); 
                                          if (is_array($service_id) || is_object($service_id))
                                          {

                                          foreach($service_id as $key=>$services_value)
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
                                          foreach($patient_wallet['wallet_items'] as $pt)
                                          {
                                             // $inAmountSum += $pt->in_amount;
                                             // $outAmountSum += $pt->out_amount;
                                             // $total=$inAmountSum-$outAmountSum;
                                          ?>
                                       <tr>
                                          <td><?=$sr?></td>
                                          <td><?=$pt->created?></td>
                                          <td><?=$pt->id?></td>
                                          
                                          <td style="color:green;"><?=$pt->grand_total?></td>
                                          <td><a href="<?=base_url()?>packages/orderSuccess/<?=$pt->id?>">View Details</a></td>
                                          
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