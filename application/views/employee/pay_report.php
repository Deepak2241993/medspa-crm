<!-- Page Container START -->

<div class="page-container">

<!-- Content Wrapper START -->

<div class="main-content">

   <div class="card">

      <div class="card-body">

         <h4>Employee's Details</h4>

         <div class="m-t-25">
            <div class="form-row">
               <div class="form-group col-md-4">

                  <label for="name">Employee Name: <b><?= $employees[0]->name ?></b></label></div>
               <div class="form-group col-md-4">

                  <label for="inputAddress2">Email: <b><?= $employees[0]->email ?></b></label>

               </div>

               <div class="form-group col-md-4">

                  <label for="phone">Phone Number: <b><?= $employees[0]->phone ?></b></label>

               </div>

               <?=form_error('phone','<div class="text-danger">','</div>')?>

               <div class="form-group col-md-4">

                  <label for="join_date">Join Date: <b><?= $employees[0]->doj ?></b></label>

               </div>
               <div class="form-group col-md-4">

                  <label for="join_date">Gender: <b><?= $employees[0]->gender ?></b></label>

               </div>
               <div class="form-group col-md-4">

               <label for="join_date">Current Pay Rate:<b> $<?php if(!empty($running_salary[0]->pay_amount)){echo $running_salary[0]->pay_amount;} else{ echo "null";}?></b></label>

            </div>

            </div>
            <div class="form-row">

            <div class="col-md-12 ">

               <label for="join_date">Software Access:</label></br>

               <div class="d-flex justify-content-start mt-2">

               <?php
               $panel=array('Admin','Provider','Front-Desk');
               $panel_access=explode(',',$employees[0]->panel_access);
               foreach($panel as $value)
               {
                  ?>

                  <div class="form-check mr-3">
                        <input class="form-check-input" type="checkbox" id="interest1" name="panel_access[]" value="<?=$value ?>"<?php if(in_array( $value, $panel_access)) echo "checked"; ?>>

                        <label class="form-check-label" for="interest1">

                           <?=$value ?>

                        </label>

                  </div>
                  <?php } ?>

               

               </div>

                <!-- Add more checkboxes as needed -->

            </div>
         </div>
      </div>
   </div>
</div>

   <div class="card">

            <div class="card-body">

            <div class="table-responsive">
               <h3>Payment Details</h3>
               <div class="row">
                  <div class="col-md-4">
                     <layout id="start_date">Start Date</layout>
                     <input type="date"id="start_date" class="form-control">
                  </div>
                  <div class="col-md-4">
                     <layout id="end_date">End Date</layout>
                     <input type="date" id="end_date" class="form-control">
                  </div>
                  <div class="col-md-2">
                     <button class="mt-4 btn btn-info">Submit</button>
                  </div>
               </div>

<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Date</th>
            <th>Clident Name</th>
            <th>Procedure</th>
            <th>Quantity</th>          
            <th>Service Pay</th>          
            <th>Tip on Card</th>          
            <th>Total Pay</th>          
           
        </tr>
    </thead>
    <tbody>
    	
        <tr>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>           
            
        </tr>
       
    </tbody>
 
</table>

            </div>

      </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function serviceAssign() {
    var providerName = $("#name").val();
    var email = $("#email").val();

    // Create a new HTML structure with the input values
    var newData = '<div class="form-row">';
    newData += '<div class="form-group col-md-6">';
    newData += ' <label for="name">Provider Name</label>';
    newData += '<select id="" class="form-control" name="service_assign[]">';
    newData += '<option value ="">Select Service</option>';
            <?php
            foreach($services as $value)
            {?>
               
               newData += '<option value ="<?=$value->sid?>"><?=$value->service_name?></option>';
            <?php }?>

            newData += '</select>';
    newData += '</div>';
    newData += '<div class="form-group col-md-3">';
    newData += '<label for="inputAddress2">Email</label>';
    newData += '<input type="text" class="form-control" name="pay_amount[]" id="email" placeholder="Pay Amount" required>';
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
</script>