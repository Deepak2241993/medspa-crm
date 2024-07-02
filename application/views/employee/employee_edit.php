<!-- Page Container START -->
<div class="page-container">
   <!-- Content Wrapper START -->
   <div class="main-content">
      <?=form_open('employee/employee_update/'.$employees[0]->id, array('enctype' => 'multipart/form-data'))?>
      <div class="card">
         <div class="card-body">
            <h4>Update Employee</h4>
                  <?php
                     if ($this->session->flashdata('success')) {
                        echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                     }
                     ?>
               <div class="m-t-25">
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="emp_name">Employee Name <span class="text-danger">*</span></label>
                           <input type="text" name="name" class="form-control" id="emp_name" value="<?= $employees[0]->name ?>" placeholder="Employee's Name" required="">
                        </div>
                        <?=form_error('name','<div class="text-danger">','</div>')?>
                        <div class="form-group col-md-6">
                           <label for="email">Email <span class="text-danger">*</span></label>
                           <input type="email" class="form-control" name="email" value="<?= $employees[0]->email ?>" id="email" placeholder="Enter Staff Email" required>
                        </div>
                        <?=form_error('email','<div class="text-danger">','</div>')?>
                        <div class="form-group col-md-6">
                           <label for="phone">Phone Number <span class="text-danger">*</span></label>
                           <input type="text"  name="phone" class="form-control" id="phone" value="<?= $employees[0]->phone ?>" placeholder="Phone Number" required="">
                        </div>
                        <?=form_error('phone','<div class="text-danger">','</div>')?>
                        <div class="form-group col-md-6">
                           <label for="join_date">Join Date <span class="text-danger">*</span></label>
                           <input type="text" class="form-control datepicker-input" value="<?= $employees[0]->doj ?>" id="join_date" placeholder="Join Date" name="doj" required="">
                        </div>
                     </div>
                     <fieldset class="form-group">
                        <div class="row">
                           <label class="col-form-label col-sm-2 pt-0">Gender <span class="text-danger">*</span></label>
                           <div class="col-sm-2">
                              <div class="radio">
                                 <input type="radio" name="gender" id="gridRadios1" value="male" <?= ($employees[0]->gender == 'Male')?'checked':'null' ?>>
                                 <label for="gridRadios1">
                                 Male
                                 </label>
                              </div>
                           </div>
                           <div class="col-sm-2">
                              <div class="radio">
                                 <input type="radio" name="gender" id="gridRadios2" value="female"<?= ($employees[0]->gender == 'Female')?'checked':'null' ?>>
                                 <label for="gridRadios2">
                                 Female
                                 </label>
                              </div>
                           </div>
                        </div>
                     </fieldset>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="join_date">Department <span class="text-danger">*</span></label>
                           <input type="hidden" value="<?=$employees[0]->department ?>" id="pre_assign_department">
                           <?php
                              $department=array('Front Desk Representative','Provider','Admin');
                              $designation=array('Computer Operator','Sr. Doctor','Jr.Doctor','Internship','Admin','Account');
                              ?>
                           <select class="form-control" name="department" id="department" required onchange="serviceassign()">
                              <option value="">Select Department</option>
                              <?php foreach($department as $value)
                                 {
                                    ?>
                              <option  value="<?= $value?>" <?=($value==$employees[0]->department)?'selected':'null'?>><?= $value?></option>
                              <?php
                                 }
                                 ?>
                           </select>
                        </div>
                     </div>
                     
                     <div class="form-row">
                        <div class="form-group col-md-4">
                           <label for="salary">Salary(Per Hour) <span class="text-danger">*</span></label>
                           <input type="text" id="salary" value="$<?php if(!empty($running_salary[0]->pay_amount)){echo $running_salary[0]->pay_amount;} else{ echo "null";}?>" class="form-control"name="salary" placeholder="Salary(Per Hour)"disabled>
                        </div>
                        <div class="form-group col-md-2 mt-4">
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                           Edit Salary
                           </button>
                        </div>
                        <div class="col-md-6 ">
                           <label for="join_date">Software Access <span class="text-danger">*</span></label></br>
                           <div class="d-flex justify-content-start mt-2">
                              <?php
                                 $panel=array('Admin','Provider','Front-Desk');
                                 $panel_access=explode(',',$employees[0]->panel_access);
                                 foreach($panel as $value)
                                 {
                                    ?>
                              <div class="form-check mr-3">
                                 <input class="form-check-input" type="checkbox" id="interest1" name="panel_access[]" value="<?=$value ?>" <?php if(in_array( $value, $panel_access)) echo "checked"; ?>>
                                 <label class="form-check-label" for="interest1">
                                 <?=$value ?>
                                 </label>
                              </div>
                              <?php } ?>
                           </div>
                           <!-- Add more checkboxes as needed -->
                        </div>
                        <?=form_error('email','<div class="text-danger">','</div>')?>
                     </div>

                     <div class="form-row">
                        <div class="form-group col-md-3">
                           <label for="inputCity">Country</label>
                           <input type="text" class="form-control" id="inputCity" name="country" value="<?=$employees[0]->country?>">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="inputCity">City</label>
                           <input type="text" class="form-control" id="inputCity" name="city" value="<?=$employees[0]->city?>">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="inputState">State</label>
                           <input type="text" class="form-control" id="inputState" name="inputState" value="<?=$employees[0]->state?>">
                        </div>
                        <div class="form-group col-md-2">
                           <label for="inputZip">Zip</label>
                           <input type="text" class="form-control" id="inputZip" name="zip" value="<?=$employees[0]->zip?>">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="full_address" class="col-sm-2 col-form-label">Full Address</label>
                        <textarea Class="form-control" id="full_address" name="full_address"><?=$employees[0]->full_address?></textarea>
                     </div>
               </div>
         </div>
      </div>
      <div class="card" id="service_assign" style="display:block;">

         <?php if($employees[0]->department=='Provider'){?>
         <div class="card-body">
            <h1>Service Assign to Provider</h1>
            <div class="form-row">
               <?php foreach($assign_service as $key=>$service_category_id)
                  {?>
                  
               <div class="form-group col-md-6" id="service_name_<?=$key?>">
                  <label for="provider_name">Service Name : </label>
                  <select name="service_assign[]"class="form-control" id="provider_name">
                     <option value ="">Select Service</option>
                     <?php
                        foreach($services as $value)
                        {?>
                     <option value ="<?=$value->id?>" <?php if($value->id==$service_category_id->service_category_id){echo 'selected';} ?>><?=$value->service_name?></option>
                     <?php }?>
                  </select>
               </div>
               <?=form_error('name','<div class="text-danger">','</div>')?>
               <div class="form-group col-md-3" id="service_pay_<?=$key?>">
                  <label for="inputAddress2">Pay Amount</label>
                  <input type="text" class="form-control" name="pay_amount[]"  id="email" placeholder="Pay Amount" value="<?=$service_category_id->pay_amount?>">
               </div>
               <?=form_error('email','<div class="text-danger">','</div>')?>
               <div class="form-group col-md-3 mt-4" id="service_button_<?=$key?>">
                  <button type="button" class="btn btn-danger"onclick="removeservice_section('<?=$key?>')">Remove</button>
               </div>
               <?php } ?>
               
            </div>
            <div class="append-data"></div>
            <button type="button" class="btn btn-primary" onclick="add_more_services()">Add More</button>
            <!-- The target element where data will be appended -->
         </div>
         <?php } ?>
      </div>



      <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
      <?=form_close()?>
   </div>
</div>
</div>
</div>
<!-- modal code -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Salary History</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <table class="table table-bordered">
               <tr>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>Amount</th>
               </tr>
               <tr>
                  <?php if(count($salary_report)>0){foreach($salary_report as $value){?>
                  <th><?=date('m-d-Y',strtotime($value->created_at))?></th>
                  <th><?php if(!empty($value->end_date)){echo date('m-d-Y',strtotime($value->end_date)); }else { echo "Now Running";}?></th>
                  <th>$<?=$value->pay_amount?></th>
               </tr>
               <?php } 
                  $current_salary= $value->pay_amount;
                  $last_salary_update_id = $value->id;
                  } ?>
            </table>
         </div>
         <div class="p-4">
            <?=form_open('employee/salaryupdate')?>
            <div class="row">
               <div class="col-md-6">
                  <label for="old_salary">Running Salary</label>
                  <input id="old_salary" type="text"value="$<?php if(!empty($current_salary)){echo $current_salary;} else{echo "null";}?>" disabled>
                  <input type="hidden"value="<?php if(!empty($last_salary_update_id)){echo $last_salary_update_id; } else{ echo "null";}?>" name="last_salary_update_id">
                  <input type="hidden"value="<?=$employees[0]->id?>" name="emp_id">
               </div>
               <div class="col-md-6">  
                  <label>Enter Updated Salary($) <span class="text-danger">*</span></label>
                  <input type="number" placeholder="Change Current Salary" name="pay_amount" required>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="salary_update" class="btn btn-primary">Update</button>
         </div>
         <?=form_close()?>
      </div>
   </div>
</div>
<!-- End Modeal code -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   function add_more_services() {
    
     // Create a new HTML structure with the input values
     var newData = '<div class="form-row">';
     newData += '<div class="form-group col-md-6">';
     newData += ' <label for="pname">Provider Name</label>';
     newData += '<select id="pname" class="form-control" name="service_assign[]">';
     newData += '<option value ="">Select Service</option>';
             <?php
      foreach($services as $value)
      {?>
      newData += '<option value ="<?=$value->id?>"><?=$value->service_name?></option>';
             <?php }?>
   
             newData += '</select>';
     newData += '</div>';
   
   
     newData += '<div class="form-group col-md-3">';
     newData += '<label for="inputAddress2">Email</label>';
     newData += '<input type="text" class="form-control" name="pay_amount[]" id="email" placeholder="Pay Amount"  required>';
     newData += '</div>';
     newData += '<div class="form-group col-md-3 mt-4">';
     newData += '<button type="button" class="btn btn-danger remove-btn">Remove</button>'; // Add the "Remove" button
     newData += '</div>';
     newData += '</div>';
   
     // Append the new HTML structure to the target element
     $(".append-data").append(newData);
   }
   
   // Add a click event listener to the "Remove" button
   $(document).on("click", ".remove-btn", function() {
     $(this).closest(".form-row").remove(); // Remove the closest parent div with class "form-row"
   });

   //  for service assign
   function serviceassign() {
   var service = $('#department').val();
   if(service == 'Provider')
   {
      $('#service_assign').css('display', 'block');
   }
   }


   $(document).ready(function() {
      var service = $('#pre_assign_department').val();
   if(service == 'Provider')
   {
      $('#service_assign').css('display', 'block');
   }
});

 function removeservice_section(section_id){
   $('#service_name_'+section_id).remove();
   $('#service_pay_'+section_id).remove();
   $('#service_button_'+section_id).remove();
 }

</script>