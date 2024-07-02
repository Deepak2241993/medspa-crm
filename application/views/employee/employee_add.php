<!-- Page Container START -->
<div class="page-container">
   <!-- Content Wrapper START -->
   <div class="main-content">
      <?=form_open('employee/employee_store')?>
      <div class="card">
         <div class="card-body">
            <h4>Add Employee</h4>
            <div class="m-t-25">
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="name">Employee Name <span class="text-danger">*</span></label>
                     <input type="text" name="name" class="form-control" id="name" placeholder="Employee's Name" required="">
                  </div>
                  <?=form_error('name','<div class="text-danger">','</div>')?>
                  <div class="form-group col-md-6">
                     <label for="inputAddress2">Email <span class="text-danger">*</span></label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="Enter Staff Email" required>
                  </div>
                  <?=form_error('email','<div class="text-danger">','</div>')?>
                  <div class="form-group col-md-6">
                     <label for="phone">Phone Number <span class="text-danger">*</span></label>
                     <input type="text"  name="phone" class="form-control" id="phone" placeholder="Phone Number" required="">
                  </div>
                  <?=form_error('phone','<div class="text-danger">','</div>')?>
                  <div class="form-group col-md-6">
                     <label for="join_date">Join Date <span class="text-danger">*</span></label>
                     <input type="text" class="form-control datepicker-input" id="join_date" placeholder="Join Date" name="doj" required="">
                  </div>
               </div>
               <fieldset class="form-group">
                  <div class="row">
                     <label class="col-form-label col-sm-2 pt-0">Gender <span class="text-danger">*</span></label>
                     <div class="col-sm-2">
                        <div class="radio">
                           <input type="radio" name="gender" id="gridRadios1" value="male" checked>
                           <label for="gridRadios1">
                           Male
                           </label>
                        </div>
                     </div>
                     <div class="col-sm-2">
                        <div class="radio">
                           <input type="radio" name="gender" id="gridRadios2" value="female">
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
                     <?php
                        $department=array('Front Desk Representative','Provider','Admin');
                        ?>
                     <select class="form-control" name="department" id="department" required onchange="serviceassign()">
                        <option value="">Select Department</option>
                        <?php foreach($department as $value)
                           {
                              ?>
                        <option  value="<?= $value?>"><?= $value?></option>
                        <?php
                           }
                           ?>
                     </select>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="salary">Salary(Per Hour) <span class="text-danger">*</span></label>
                     <input type="text" id="salary" class="form-control"name="salary" placeholder="Salary(Per Hour)" required="">
                  </div>
                  <div class="col-md-6 ">
                     <label for="join_date">Software Access <span class="text-danger">*</span></label></br>
                     <div class="d-flex justify-content-start mt-2">
                        <?php
                           $panel=array('Admin','Provider','Front-Desk');
                           foreach($panel as $value)
                           {
                              ?>
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="checkbox" id="interest1" name="panel_access[]" value="<?=$value ?>">
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
                     <input type="text" class="form-control" id="inputCity" name="country">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputCity">City</label>
                     <input type="text" class="form-control" id="inputCity" name="city">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputState">State</label>
                     <input type="text" class="form-control" id="inputState" name="state">
                  </div>
                  <div class="form-group col-md-2">
                     <label for="inputZip">Zip</label>
                     <input type="text" class="form-control" id="inputZip" name="zip">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="full_address" class="col-sm-2 col-form-label">Full Address</label>
                  <textarea Class="form-control" id="full_address" name="full_address"></textarea>
               </div>
            </div>
         </div>
      </div>
      <div class="card" style="display:none;" id="service_assign">
         <div class="card-body">
            <h1>Service Assign to Provider</h1>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="name"> Service Name</label>
                  <select class="form-control" name="service_assign[]">
                     <option value ="">Select Service</option>
                     <?php
                        foreach($services as $value)
                        {?>
                     <option value="<?=$value->id?>"><?=$value->service_name?></option>
                     <?php }?>
                  </select>
               </div>
               <div class="form-group col-md-3">
                  <label for="inputAddress2">Pay Amount</label>
                  <input type="text" class="form-control" name="pay_amount[]"placeholder="Pay Amount">
               </div>
               <div class="form-group col-md-3"></div>
            </div>
            <!-- The target element where data will be appended -->
            <div class="append-data"></div>
            <button type="button" class="btn btn-primary" onclick="serviceAssign()">Add More</button>
         </div>
      </div>
      <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
      <?=form_close()?>
   </div>
</div>
<script>
   function serviceAssign() {
     // Create a new HTML structure with the input values
     var newData = '<div class="form-row">'+
     '<div class="form-group col-md-6">'+   
                '<label for="name">Service Name</label>'+
     '<select class="form-control" name="service_assign[]">'+
     <?php foreach($services as $value){?>   
     '<option value="<?=$value->id?>"><?=$value->service_name?></option>'+
    <?php }?>
     '</select>'+
     '</div>'+
     '<div class="form-group col-md-3">'+
     '<label for="inputAddress2">Pay Amount</label>'+
     '<input type="number" class="form-control" name="pay_amount[]" placeholder="Pay Amount">'+
     '</div>'+
     '<div class="form-group col-md-3 mt-4">'+
     '<button type="button" class="btn btn-danger remove-btn">Remove</button>'+ // Add the "Remove" butto
     '</div>'+
     '</div>';
   
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
   
   
   
</script>