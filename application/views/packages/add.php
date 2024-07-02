<!-- Page Container START -->
<div class="page-container">
   <!-- Content Wrapper START -->
   <div class="main-content">
   <?php if(isset($packages[0]->id))
   {?>
      <?=form_open('packages/packageupdate/'.$packages[0]->id,array('enctype' => 'multipart/form-data'))?>
      <input type="hidden" name="id" class="form-control" value="<?=isset($packages[0]->id)?$packages[0]->id:''?>">
      <?php }else{?>
         <?=form_open('packages/packagestore',array('enctype' => 'multipart/form-data'))?>
         <?php } ?>
      <div class="card">
         <div class="card-body">
            <h4>Add Package</h4>
            <div class="m-t-25">
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="package_name_id">Package Name <span class="text-danger">*</span></label>
                     <input type="text" name="package_name" class="form-control" id="package_name_id" placeholder="Package Name" required="" value="<?=isset($packages[0]->package_name)?$packages[0]->package_name:''?>">
                  </div>
                  
                  <?=form_error('email','<div class="text-danger">','</div>')?>
                  <div class="form-group col-md-6">
                     <label for="phone">Image <span class="text-danger">Image Must be Less then 1 MB*</span></label>
                     <?php if(isset($packages[0]->image))
                     {?>
                     <img src="<?=($packages[0]->image)?base_url().'uploads/packages/'.$packages[0]->image:base_url().'uploads/noimage.png'?>" style="height:80px; width:80px;">
                     <?php }?>
                     <input type="file"  name="image" class="form-control" id="phone" >
                     <input type="hidden"  name="old_image" value="<?=isset($packages[0]->image)?$packages[0]->image:''?>">
                  </div>
                  
            </div>
         </div>
      </div>
      <div class="card" style="display:block;" id="service_assign">
         <div class="card-body">
            <h4>Select Service For Package Build</h4>
            <div class="form-row">
               
                  <div class="form-group col-md-3">
                     <label for="service">Category Name</label>
                     <select class="form-control categoryClass" name="service_cat_id[]" id="category_0" onchange="populateServices(this, 0)">
                        <option value ="">Select Category</option>
                        <?php
                           foreach($category as $key=>$value)
                           {?>
                        <option value="<?=$value->id?>"><?=$value->name?></option>
                        <?php }?>
                     </select>
                  </div>

                  <div class="form-group col-md-3">
                  <label for="service"> Service Name</label>
                  <select class="form-control serviceClass" name="service_id[]" id="service_0" amount="0"  onchange="servicePriceShow(this, 0)">
                     <option value ="">Select Service</option>
                     
                  </select>
               </div>
               <div class="form-group col-md-2">
                  <label for="service_session<?=$key?>"> Service Session</label>
                  <input type="number" min="0"  name="service_session[]" class="form-control sessionClass" id="service_session_0" class="form-control text-center" value="0" onchange="price_calculate(this, 0)">
                  
               </div>
               <div class="form-group col-md-2">
                  <label for="amount<?=$key?>">Amount</label>
                  <input type="text" name="amount[]" class="form-control amountClass" id="amount_0" placeholder="Amount" required="" value="">
               </div>
                 

               <div class="form-group col-md-3"></div>
              
            </div>
            <!-- The target element where data will be appended -->
            <div class="append-data"></div>

            <button type="button" class="btn btn-primary mb-4 add_more" onclick="serviceAssign()">Add More</button>
            <button type="button" id="calculateButton" suggested_amount="0" class="btn btn-primary mb-4">Suggested Amount $</button>

            <?=form_error('name','<div class="text-danger">','</div>')?>
            <div class="form-group col-md-6">
               <label for="packagePrice">Price <span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="price" id="packagePrice" placeholder="Enter price" required  value="<?=isset($packages[0]->price)?$packages[0]->price:''?>">
            </div>
            <div class="form-group col-md-6">
					<label for="packagePrice">Exp Date<span class="text-danger">(in months)</span> <span class="text-danger">*</span></label>
					<input type="text" class="form-control" name="exp_date" id="packagePrice" placeholder="Exp Date" required  value="<?=isset($packages[0]->exp_date)?$packages[0]->exp_date:''?>">
				</div>
            <?=form_error('name','<div class="text-danger">','</div>')?>
            <div class="form-group col-md-12">
               <label for="description">Package Description <span class="text-danger">*</span></label>
               <textarea class="form-control" id="info_description" name="description"><?=isset($packages[0]->price)?$packages[0]->description:''?></textarea>
               
            </div>

            <div class="form-group mt-4 col-md-6">
             <label for="status">Status:</label>
             <select class="form-control" id="status" name="status">
                <option value="1"<?php if(isset($packages[0]->status) && $packages[0]->status==1){echo 'selected';} ?>>Active</option>
                <option value="0"<?php if(isset($packages[0]->status) && $packages[0]->status==0){echo 'selected';} ?>>Inactive</option>
             </select>
          </div>
        </div>
        <input type="submit" name="submit_data" class="btn btn-success ml-4 mb-4" value="Submit">
    </div>
      <?=form_close()?>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  var sectionCount = 0; // Initialize a counter to keep track of the sections added.

function serviceAssign() {
  // Increment the section count for unique IDs and names.
  sectionCount++;

  // Create a new set of HTML form fields with unique IDs and names.
  var newData = '<div class="form-row" id="service_remove_' + sectionCount + '">' +
    '<div class="form-group col-md-3">' +
    '<label for="category">Category Name</label>' +
    '<select class="form-control categoryClass" name="service_cat_id[]" id="category_' + sectionCount + '" count_value="0" onchange="populateServices(this, ' + sectionCount + ')">' +
    '<option value="">Select Category</option>';

  <?php foreach ($category as $key => $value) { ?>
    newData += '<option value="<?= $value->id ?>"><?= $value->name ?></option>';
  <?php } ?>

  newData += '</select>' +
    '</div>' +
    '<div class="form-group col-md-3">' +
    '<label for="service">Service Name</label>' +
    '<select class="form-control serviceClass" name="service_id[]" id="service_' + sectionCount + '" amount="0" onchange="servicePriceShow(this, ' + sectionCount + ')">' +
    '<option value="">Select Service</option>' +
    '</select>' +
    '</div>' +
    '<div class="form-group col-md-2">' +
    '<label for="service_session_' + sectionCount + '">Service Session</label>' +
    '<input type="number" min="0" name="service_session[]" class="form-control sessionClass" id="service_session_' + sectionCount + '" class="form-control text-center" value="0" onchange="price_calculate(this, ' + sectionCount + ')">' +
    '</div>' +
    '<div class="form-group col-md-2">' +
    '<label for="amount_' + sectionCount + '">Amount</label>' +
    '<input type="text" name="amount[]" class="form-control amountClass" id="amount_' + sectionCount + '" placeholder="Amount" required="" value="">' +
    '</div>' +
    '<div class="form-group col-md-2 mt-4" id="service_button_' + sectionCount + '">' +
    '<button type="button" class="btn btn-danger remove-btn" onclick="removesection(' + sectionCount + ')">Remove</button>' +
    '</div>' +
    '</div>';

  // Append the new set of fields to the target element.
  $(".append-data").append(newData);
}

   
   // Add a click event listener to the "Remove" button
   
   function removesection(section_key){
      $('#service_remove_'+section_key).remove();
      $('#service_button_'+section_key).remove();
   }
   
   $(document).on("click", ".remove-btn", function() {
     $(this).closest(".form-row").remove(); // Remove the closest parent div with class "form-row"
   });
   
   //  for service assign
   function serviceassign() {
   var service = $('#department').val();

   $(this).closest(".form-row").remove();

   if(service == 'Provider')
   {
      $('#service_assign').css('display', 'block');

   }
   }

   function populateServices(element, sectionCount) {
  var cat_id = $(element).val();
  var platformDropdown = $('#service_' + sectionCount);

  $.ajax({
    url: '<?= base_url() ?>packages/getService',
    method: 'post',
    data: {
      id: cat_id,
    },
    dataType: 'JSON',
    success: function (response) {
      platformDropdown.empty();
      platformDropdown.append('<option value="">Select Service</option>');

      $.each(response.services, function (key, value) {
        platformDropdown.append('<option value="' + value.id + '">' + value.service_name + '</option>');
        $('#service_session_' + sectionCount).val(1);
      });
    },
    error: function () {
      console.log('Error fetching services.');
    }
  });
}


   // Showing Price

   function servicePriceShow(element, sectionCount) {
      var get_service_category_id = $(element).val();
  
  if (get_service_category_id > 0) {
    $.ajax({
      url: "<?= base_url() ?>packages/getServiceprice",
      method: 'POST',
      data: {
        service_category_id: get_service_category_id,
      },
      dataType: 'JSON',
      success: function(data) {
        if (data['error']) {
          alert(data.error);
        } else {
          var count_value = parseInt(data.package[0].service_charge);
          $('#amount_' + sectionCount).val(count_value);
          $('#service_' + sectionCount).attr('amount',count_value);

          $('#service_session_' + sectionCount).val(1);
        }
      },
      error: function() {
        console.log('Error fetching service price.');
      }
    });
  }
}


function price_calculate(element, sectionCount) {
   var service_value = parseInt($('#service_' + sectionCount).attr('amount'));
   var service_session = parseInt($('#service_session_' + sectionCount).val());
   
   if (service_value > 0 && service_session > 0) {
      var totalvalue = service_value * service_session;
      $('#amount_' + sectionCount).val(totalvalue);
   } else {
      alert('Please enter valid values for service value and service session in section ' + sectionCount + '.');
   }
}

$(document).ready(function() {
            $("#calculateButton").click(function() {
                // Initialize a variable to store the sum
                var sum = 0;

                // Loop through each input field with the name "amount[]"
                $("input[name='amount[]']").each(function() {
                    // Extract the value and convert it to a number
                    var value = parseFloat($(this).val()) || 0;

                    // Add the value to the sum
                    sum += value;
                });

                // Display the sum in the result paragraph
                $("#calculateButton").text("Suggested Amount: $ " + sum);
            });
        });

   
CKEDITOR.replace('info_description');
   
</script>