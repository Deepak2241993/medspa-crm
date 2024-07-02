<!--Page Container START -->
<div class="page-container">
  <!--Content Wrapper START--> 
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>All Inventory List</h4> 
    
    <div class="row">
        <div class="col-md-3">
           <h4>Current Inventory Cost</h4>
        </div>
        <div class="col-md-5">
        <select id="product" placeholder="Pick a product..." onchange="myFunction()">
        <option value="">Select a product...</option>
            <?php foreach($products as $key=>$value)
            {?>
            <option  value="<?=$value->product_id ?>"><?=$value->product_name?></option>
            <?php } ?>
        </select>  
        </div>
        
        <div class="col-md-2">
            <span id="inventory_c_cost">Current Cost:</span>
        </div>
    </div>
    <div class="button-link mt-4">
        <a href="<?=base_url().'inventory'?>" class="btn btn-primary">Introduce Inventory</a>
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Received Inventory</a>
    </div>
<div class="m-t-25">
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
	<?php if($this->session->flashdata('msg')){
	      echo $this->session->flashdata('msg');
     }?>
    <thead>
        <tr>
            <th>SR No.</th>
			<th>Product Name</th>
			<th>Lot Number</th>
			<th>Inventory In</th>
			<th>Inventory Out</th>
			<th>Current Inventory</th>
			<th>Paid Amount</th>
			<th>Cost By Lot</th>
			<th>Product Used(Last 6 Months) </th>
            <th>Recommendation Inventory</th>
			<th>Remaining Months Or Day</th>
            
			<th>Expiry Date</th>
            <!-- <th>Created Date</th> -->
            <?php if($this->session->userdata('user_type')=='admin'){ ?>
			<th>Action</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$sr =1;
    	foreach($inventory as $data){
            $product_name=(int)$data['product_name'];
            $lot_number = (float)$data['paid_amount'];
            $quantity_in = (int)$data['quantity_in'];


            $this->db->select_sum('remaning_qty');
            $this->db->from('inventory');
            $this->db->where('product_id', $data['product_id']);
            $this->db->where('expiry_date <=',$data['expiry_date']);
            $rec_inventory = $this->db->get()->result_array();
            // $total_cost = 
            // (($current_inventory * $current_cost)+($item_cost * $item_quantity)) / ($item_quantity + $current_inventory); 
    		?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$data['product_name']?></td>
			<td><?=$data['lot_number']?></td>
			<td><?=(int)$data['quantity_in']?></td>
			<td><?=(int)$data['quantity_out']?></td>
			<td><?=(int)$data['quantity_in']-(int)$data['quantity_out']?></td>
		<!-- 	<td><?=$data['current_inventory'] + $data['quantity_in']?></td> -->
            <td><?=$data['paid_amount']?></td>
            <td><?=  number_format($data['paid_amount']/$data['quantity_in'], 2, '.', '' );?></td>
            <td>Last Six months</td>
            <td>
                <?php 

            // Calculation og Months
                $exp_date = new DateTime($data['expiry_date']);
                $current_date = new DateTime();
                $interval = $current_date->diff($exp_date);
                $months = ($interval->y * 12) + $interval->m;

                if($months==0)
                {
                    $days = $interval->days;
                }

            // End Monhts Calculation
        
        if($months!=0){
            echo $rec_inventory[0]['remaning_qty']/$months;
        }
        elseif($days!=0)
        {
            echo $rec_inventory[0]['remaning_qty']/$days;
        }
        else{
            echo $rec_inventory[0]['remaning_qty']/1;
        }
        
        
       
        ?>
        
        </td>

			<td><?php if($months!=0){ echo $months." Monhts";} else { echo $days." Days";}?></td>
			<td><?=$data['expiry_date']?></td>
            <?php if($this->session->userdata('user_type')=='admin'){ ?>
            <td><a href="<?=base_url()?>inventory/update_inventory/<?= $data['inventory_id']?>" class="btn btn-primary mb-2 btn-xs">Edit</a>
			
			<a href="<?=base_url()?>inventory/delete_inventory/<?= $data['inventory_id']?>" class="btn btn-danger btn-xs">Delete</a>
		<?php } ?>	
        </td>
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
</div>
</div>

<!--  Modal code of Inventor Add -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?= form_open('inventory/save_inventory', array('enctype' => 'multipart/form-data')) ?>
                    <div class="form-group"  class="form-control">
                            <label for="inventory_id" class="col-form-label">Select Product:</label>
                            <select id="products" placeholder="Pick a product..." name="product_id"  class="form-control">
                            <option value="">Select a Product...</option>
                            <?php foreach($products as $key=>$value)
                            {?>
                            <option  value="<?=$value->product_id ?>"><?=$value->product_name?></option>
                            <?php } ?>
                        </select>
               
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="qty" class="col-form-label">Qty:</label>
                                <input type="text" name="quantity_in" class="form-control" id="qty" onkeypress="return isNumber(event)" required>
                            </div>
                            <div class="col-md-6">
                            <label for="unit" class="col-form-label">Select Units</label>
                                <select class="form-control"  name="product_units" id="unit">
                                    <?php $unit = array('unit','ml','tip','peel','piece');
                                    foreach($unit as $value){
                                        ?>
                                        <option value="<?=$value?>"><?=$value?></option>
                                        
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exp-date" class="col-form-label">Exp-Date</label>
                        <input type="date" name="expiry_date" class="form-control" id="exp-date" required>
                    </div>
                  
                    <div class="form-group">
                        <label for="amount-paid" class="col-form-label">Paid Admount</label>
                        <span style="position: absolute;margin-left: -95px;margin-top: 44px;">$</span>
                        <input type="text" name="paid_amount" class="form-control" id="amount-paid" onkeypress="return isNumber(event)" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="vendor" class="col-form-label">Select Vendor</label>
                        <input type="text" class="form-control" id="vendor" required>
                    </div> -->
                    
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <input type="submit" name="submit_data" class="btn btn-primary" value="Add">
                    </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>
<!--  mode code End -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>
<script type="text/javascript">	

 new TomSelect("#product",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
    new TomSelect("#products",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });

function isNumber(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}


function myFunction() {
  var product_id = document.getElementById("product").value;
  if (product_id !== '') {
    $.ajax({
      url: "<?php echo base_url().'inventory/getCost'; ?>",
      method: 'POST',
      data: {
        product_id: product_id
      },
      dataType: 'JSON',
      beforeSend: function() {
        $("#type_of_listing_btn").html('Please Wait...');
        $('input[type="text"], button[type="submit"], textarea').prop('disabled', true);
      },
      success: function(data) {
        // alert(data['current_cost']);
        document.getElementById("inventory_c_cost").innerHTML = "<b>Current Cost: " + "$"+data['current_cost']+"</b>";
        
      }
    });
  }
}


 





//    //INSERT NEW DATA
//    $(document).on('change', '#product', function(event) {
//         event.preventDefault();
//         var product_id = $('#product').val().trim();
//         if (product_id != '') {
//             $.ajax({
//                 url: "<?php echo base_url() .'inventory/update_inventory'?>",
//                 method: 'POST',
//                 data: new FormData(this),
//                 contentType: false,
//                 processData: false,
//                 dataType: 'JSON',
//                 beforeSend: function() {
//                     $("#type_of_listing_btn").html('Please Wait...');
//                     $('input[type=text],button[type=submit]', 'textarea').prop('disabled', true);
//                 },
//                 success: function(data) {
//                     $("#type_of_listing_btn").html('Submit');
//                     $('input[type=text],button[type=submit]', 'textarea').prop('disabled', false);
//                     if (data['error']) {
//                         alert(data.error);
//                     } else {
//                         $('#type_of_listing_frm')[0].reset();
//                         alert(data.success);
//                         $('#successModal').modal('hide');
//                         dataTable.ajax.reload();
//                     }
//                 }
//             });
            
//         } else {
//                  alert('Select first Product');
//         }
//     });
    
//         //EDIT DATA
//       $(document).on('click', '.edit_inventory', function(){  
//          var id= $(this).attr("mainid");
//          $(".modal-title").html("Update Details"); 
//             $.ajax({
//               url:"<?php echo base_url(); ?>inventory/fetch_single_inventory",  
//               method:"POST",  
//               data:{id:id,taction:'update_product'},  
//               dataType:"json",  
//               success:function(data) { 
//                 $('#successModal').modal('show');
//                 $('#product_name').val(data.product_name);
// 				$('#current_inventory').val(data.current_inventory);
//                 $('#id').val(data.inventory_id);
//                 $('#action').val('update_product');
//               }  
//             })  
//           });

    $(document).on('click','.delete_inventory',function(event){
	    event.preventDefault();
	    var id= $(this).attr("mainid");
	    if(confirm("Are you sure you Delete this?")){
	        $.ajax({
	            url:"<?php echo base_url(); ?>inventory/delete_inventory",
	            method: "POST",
	            data:{id:id},
	            dataType:"json",
	            success:function(data){  
					if(data['error']){
						alert(data.error);
					}else{
						alert(data.success);
					}  
					dataTable.ajax.reload();  
				} 
	        });
	    }
	    else {  
			return false;       
		}
	});
</script>
	