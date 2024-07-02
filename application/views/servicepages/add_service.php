<!-- Page Container START -->
<div class="page-container">
   <!-- Content Wrapper START -->
   <div class="main-content">
      <div class="card">
         <div class="card-body">
         <?php if(isset($service[0]->id)){?>
            <h4>Update Service</h4>
            <?php }else{ ?>
               <h4>Add Service</h4>
               <?php } ?>
            <div class="m-t-25">
              <?php if(isset($service[0]->id)){?>
               <form action="<?=base_url()?>services/updateservice/<?=$service[0]->id?>" method="post">
               <?php }else{ ?>
               <form action="<?=base_url()?>services/storeservice" method="post">
               <?php } ?>
                  <div class="form-group">
                     <label for="service_name">Service Name:</label>
                     <input type="text" class="form-control" id="service_name" name="service_name" value="<?=isset($service[0]->service_name)?$service[0]->service_name:''?>">
                  </div>
                  <div class="form-group">
                     <label for="service_cat_id">Select service Category:</label>
                     <select  class="form-control" id="service_cat_id" name="service_cat_id">
                        <option value="">Service category</option>
                        <?php foreach($category as $value){?>
                           <option value="<?=$value->id ?>" <?php if(isset($service[0]->service_cat_id) && $service[0]->service_cat_id==$value->id){echo 'selected';} ?>><?=$value->name?></option>
                           <?php } ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="service_charge">Service Charge:</label>
                     <input type="text" class="form-control" id="service_charge" name="service_charge"value="<?=isset($service[0]->service_charge)?$service[0]->service_charge:''?>">
                  </div>
                 
                 
                  <div class="form-group">
                     <label for="service_time">Service Time:</label>
                     <input type="text" class="form-control" id="service_time" name="service_time"value="<?=isset($service[0]->service_time)?$service[0]->service_time:''?>">
                  </div>
                  <div class="form-group">
                     <label for="machine_need">Machine Needed:</label>
                 <div class="row">
                        <?php
                        if(isset($service[0]->machine_need))
                        {
                           $machine = explode(',',$service[0]->machine_need);
                        }
                         foreach($category as $value){?>
                           <div class="col-md-3">
                              <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="<?= $value->name?>" name="machine_need[]" value="<?= $value->id?>" <?php if(isset($service[0]->machine_need) && in_array($value->id, $machine)){echo "checked";}?>>
                                 <label class="form-check-label" for="<?= $value->name?>"><?= $value->name?></label>
                              </div>
                              <!-- Repeat the pattern for more checkboxes -->
                           </div>                          
                        
                           <?php } ?>
                        </div>
                  </div>
                  <div class="form-group">
                     <label>Service Booking Online:</label>
                     <div class="row">
                           <div class="col-md-2">
                                 <div class="form-check">
                                    <input type="radio" class="form-check-input" id="online_yes" name="service_booking_online" value="1"<?php if(isset($service[0]->service_booking_online) && $service[0]->service_booking_online=='1'){echo 'checked';} ?>>
                                    <label class="form-check-label" for="online_yes">Yes</label>
                                 </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-check">
                                    <input type="radio" class="form-check-input" id="online_no" name="service_booking_online" value="0"<?php if(isset($service[0]->service_booking_online) && $service[0]->service_booking_online=='0'){echo 'checked';} ?>>
                                    <label class="form-check-label" for="online_no">No</label>
                                 </div>
                           </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="any_pre_condition">Any Pre-Condition:</label>
                     <textarea class="form-control" id="any_pre_condition" name="any_pre_condition"><?=isset($service[0]->any_pre_condition)?$service[0]->any_pre_condition:''?></textarea>
                  </div>
                  <div class="form-group">
                     <label for="procedure_info">Procedure Info:</label>
                     <textarea class="form-control" id="procedure_info" name="procedure_info"><?=isset($service[0]->procedure_info)?$service[0]->procedure_info:''?></textarea>
                  </div>
                  <div class="form-group">
                     <label for="pre_post_info">Pre-Post Info:</label>
                     <textarea class="form-control" id="pre_post_info" name="pre_post_info"><?=isset($service[0]->pre_post_info)?$service[0]->pre_post_info:''?></textarea>
                  </div>
                  <div class="form-group">
                     <label for="info_for_front_desk">Info for Front Desk:</label>
                     <textarea class="form-control" id="info_for_front_desk" name="info_for_front_desk"><?=isset($service[0]->info_for_front_desk)?$service[0]->info_for_front_desk:''?></textarea>
                  </div>
                  <div class="form-group">
                     <label for="info_send_in_email">Info Send in Email:</label>
                     <textarea class="form-control" id="info_send_in_email" name="info_send_in_email"><?=isset($service[0]->info_send_in_email)?$service[0]->info_send_in_email:''?></textarea>
                  </div>
                  <div class="form-group">
                     <label class="conset" for="conset">I agree to the terms and conditions</label>
                     <textarea class="form-check-input" id="conset" name="conset"><?=isset($service[0]->conset)?$service[0]->conset:''?></textarea>
                  </div>
                  <div class="form-group">
                     <label for="status">Status:</label>
                     <select class="form-control" id="status" name="status">
                        <option value="1"<?php if(isset($service[0]->status) && $service[0]->status==1){echo 'selected';} ?>>Active</option>
                        <option value="0"<?php if(isset($service[0]->status) && $service[0]->status==0){echo 'selected';} ?>>Inactive</option>
                     </select>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   CKEDITOR.replace('any_pre_condition');
   CKEDITOR.replace('procedure_info');
   CKEDITOR.replace('pre_post_info');
   CKEDITOR.replace('info_for_front_desk');
   CKEDITOR.replace('conset');
</script>