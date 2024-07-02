<!--Page Container START -->
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>


<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css" rel="stylesheet">
</head>
<div class="page-container">
  <!--Content Wrapper START--> 
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>All Patient Note List


    <a href="<?=base_url()?>patients/patient_note/" class="btn btn-primary btn-xs float-right cst-btn">Add New</a></h4> 
 <br/><br/>
 <?=form_open('patients/patient_note_list')?>
    <div class="row well input-daterange">

        <div class="col-sm-3">
          <label class="control-label">Start date</label>
          <input class="form-control datepicker" type="date" name="min" value="<?php if(isset($dates['min'])){
            echo $dates['min'];
          }?>" id="min" placeholder="yyyy-mm-dd" style="height: 40px;"/>
        </div>

        <div class="col-sm-3">
          <label class="control-label">End date</label>
          <input class="form-control datepicker" type="date" name="max" value="<?php if(isset($dates['max'])){
            echo $dates['max'];
          }?>" id="max" placeholder="yyyy-mm-dd" style="height: 40px;"/>
        </div>

        <div class="col-sm-2">
          <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px">
            <i class="fa fa-filter"></i> Filter
          </button>
        </div>

        <div class="col-sm-12 text-danger" id="error_log"></div>

             </div>
         <?=form_close()?>


<div class="m-t-25">    
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
	<?php if($this->session->flashdata('msg')){
	      echo $this->session->flashdata('msg');
     }?>
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Patient Name</th>
            <th>Service Name</th>
			<th>Product Name</th>
			<th>Commint</th>
			<th>Discount Amount</th>
			
			<th>Total Amount</th>
			<th>Payment Status</th>
            <th>Created Date</th>
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php
        $sr =1;
       
        foreach($patients_note_list as $data){
           // echo'<pre>';print_r($data);die;
            $payment_st=$data['payment_status'];
            if($payment_st==''){
             $pay='Not Completed';
            }else{
             $pay='Completed';   
            }

            if($data['p_flag']=='1'){
            $flg='disabled';
            }else{
             $flg='';   
            }

            ?>
        <tr class="<?=$data['id']?>">
            <td><?=$sr?></td>
            <td><?=$data['pname']?></td>
            <td><?=$data['service_name']?></td>
            <td><?php if(isset($data['sub_service_name'])){ echo $data['sub_service_name'];}else{echo '';} ?></td>
            <td><?=$data['commint']?></td>
            <td>$<?=$data['bamount']?></td>
            <td>$<?=$data['tamount']?></td>
            <td><span><button type="button" id="<?php echo $data['id'];?>" <?=$flg?> onclick="payment_status_update(<?=$data['id']?>)" class="btn btn-primary btn-xs float-right cst-btn" style=""><?=$pay?></button></span></td>
            <td><?=$data['created_at']?></td>
         

            <td><a href="<?=base_url()?>patients/patient_note/<?= $data['id']?>" class="btn btn-primary mb-2 btn-xs">Update</a>
            
            <a href="<?=base_url()?>patients/delete_patient_note/<?= $data['id']?>" class="btn btn-danger btn-xs">Delete</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">		
   //INSERT NEW DATA
   $(document).on('submit', '#type_of_listing_frm', function(event) {
        event.preventDefault();
        var item_quantity = $('#item_quantity').val().trim();
        var item_cost = $('#item_cost').val().trim();
        if (item_quantity != '' || item_cost != '') {
            $.ajax({
                url: "<?php echo base_url() .'inventory/update_inventory'?>",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() {
                    $("#type_of_listing_btn").html('Please Wait...');
                    $('input[type=text],button[type=submit]', 'textarea').prop('disabled', true);
                },
                success: function(data) {
                    $("#type_of_listing_btn").html('Submit');
                    $('input[type=text],button[type=submit]', 'textarea').prop('disabled', false);
                    if (data['error']) {
                        alert(data.error);
                    } else {
                        $('#type_of_listing_frm')[0].reset();
                        alert(data.success);
                        $('#successModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                }
            });
            
        } else {
                 alert('Fields are Required');
        }
    });
    
        //EDIT DATA
      $(document).on('click', '.edit_inventory', function(){  
         var id= $(this).attr("mainid");
         $(".modal-title").html("Update Details"); 
            $.ajax({
              url:"<?php echo base_url(); ?>inventory/fetch_single_inventory",  
              method:"POST",  
              data:{id:id,taction:'update_product'},  
              dataType:"json",  
              success:function(data) { 
                $('#successModal').modal('show');
                $('#product_name').val(data.product_name);
				$('#current_inventory').val(data.current_inventory);
                $('#id').val(data.inventory_id);
                $('#action').val('update_product');
              }  
            })  
          });

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


    function payment_status_update(id){
      // debugger;
        
        if(confirm("Are you sure you want to Update Payment Status ?")){
            $.ajax({
                url:"<?php echo base_url(); ?>patients/payment_status_update",
                method: "POST",
                data:{id:id},
                dataType:"json",
                success:function(data){  //debugger;
                    if(data['error']){
                        alert(data.error);
                    }else{
                        var mm=$('#'+data.div_id);
                        if(data.data=='no'){
                            var html='Not Completed';
                        }else{
                            var html='Completed';
                        }
                        mm[0].innerText=(html);
                        $('#'+data.div_id).prop('disabled', true);
                       // debugger;
                        alert(data.success);
                    }  
                    dataTable.ajax.reload();  
                } 
            });
        }
        else {  
            return false;       
        }
    };

//     $(document).ready(function() { 
    
//     minDate = new DateTime($('#min'), {
//         format: 'MMMM Do YYYY'
//     });
//     console.log(minDate);
//     maxDate = new DateTime($('#max'), {
//         format: 'MMMM Do YYYY'
//     });
//     console.log(maxDate);

// });

</script>


	