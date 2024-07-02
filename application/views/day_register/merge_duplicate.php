<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                <div class="col-md-12 mb-5 mt-2">
                    <h2>Enter Phone For Search</h2>
                </div>
                    <div class="col-md-4 mb-5 mt-2">
                    <form method="post" action="<?=base_url()?>DayRegister/duplicate_date">
                            <input type="search" id="filter" onkeyup="sendData()" name="input" class="btn btn-light form-control" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="col-md-2 mb-5 mt-2">
                        <button type="submit" class='btn btn-success form-control' value='Merge'>Submit</button>
                    </form>
                    
                </div>
                </div>
                <div id="data-plot">
                   <!-- Data plot after search -->
                  <div class='row'>
			<div class='col-md-6'>
                <?php if(isset($data)) {?>
			<h2>Source(Right Data)</h2>
				<table class='table table-bordered table-responsive'>
					<tr>
					<th>Check Box</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Age</th>
						<th>Gender</th>
					</tr>
                    <?php
					foreach($data as $key=>$value)
						{
					?>
					<tr>
                    <td><input type='radio' value='<?=$value['prid']?>' name='sid'></td>
							<td><?=$value['pname']?></td>
							<td><?=$value['phone']?></td>
							<td><?=$value['email']?></td>
							<td><?=$value['age']?></td>
							<td><?=$value['gender']?></td>
					</tr><?php }?>
					
				</table>
                <?php } ?>
			</div>
			<div class='col-md-6'>
            <?php if(isset($data)) {?>
			<h2>Destination(Wrong Data)</h2>
				<table class='table table-bordered table-responsive'>
						<tr>
							<th>Check Box</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Age</th>
							<th>Gender</th>
						</tr><?php
						foreach($data as $key=>$value)
						{ ?>
						<tr>
							<td><input type='radio' value='<?=$value['prid']?>' name='did'></td>
							<td><?=$value['pname']?></td>
							<td><?=$value['phone']?></td>
							<td><?=$value['email']?></td>
							<td><?=$value['age']?></td>
							<td><?=$value['gender']?></td>
						</tr><?php } ?>
						
				</table>
                
			</div>
			<div class='col-md-12'>
            <?php if(isset($msg)){ echo $msg; } ?>
			<input type='submit' id='mergeBtn' class='btn btn-success form-control' value='Merge'>
			</div>
            <?php } ?>
	</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    // Attach a click event to the "Merge" button
    $('#mergeBtn').on('click', function() {

      var sourceValue = $('input[name="sid"]:checked').val();
      var destinationValue = $('input[name="did"]:checked').val();
      if (sourceValue && destinationValue) {
        mergdata(sourceValue, destinationValue);
      } else {
        alert("Please select an option from both Source and Destination tables.");
      }
    });


    function mergdata(sourceValue, destinationValue) {

    // console.log("Source Value: " + sourceValue);
    // console.log("Destination Value: " + destinationValue);
    if(sourceValue !='' && destinationValue !='')
    {

    $.ajax({
                url: '<?=base_url()?>DayRegister/datamerge',
                method: 'POST',
                data: {
                  source_id:sourceValue,
                  destination_id:destinationValue
                },
                dataType: 'HTML',
                success: function(data) {
                  if(data!='No Data Found')
                  {
                    $("#data-plot").html(data);
                  }               
                }
            });
    }
  }

    </script>
