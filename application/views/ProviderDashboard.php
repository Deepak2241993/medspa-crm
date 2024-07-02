<!--Page Container START -->
<div class="page-container">
  <!--Content Wrapper START--> 
 <div class="main-content">
<div class="card">
<div class="card-body">
<h4>All Patient Note List
    <!--<a href="<?=base_url()?>Register/patient_register/" class="btn btn-primary btn-xs float-right cst-btn">Add Patient</a>-->
    </h4> 
 <br/><br/>
 
    </div>
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
            <th>Patient Name</th>
            <th>Service Category Name</th>
			<th>Room No</th>
		
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php
        $sr =1;
        foreach($provider as $data){
            // echo'<pre>';print_r($provider);die;
            ?>
      <tr class="<?=$data->id?>">
            <td><?=$sr?></td>
            <td><?=$data->pname?></td>
            <td><?=$data->serviceCategoryName ?></td>
           <td> <?=$data->room_no?></td>
           <td> 
           <!--<button id="check_in" value="<?=$data->id?>"class="btn btn-secondary check_in" name="check_in">Check In</button>-->
          
           <?php 
           
           if( $data->provide_check_in=='')
                     {?>
                  <a style="color: blue;" href="<?php echo base_url('ProviderDashboard/check_in'); ?>/<?php echo $data->id; ?>" onclick="return confirm('Are you sure?')">Check In</a>
                  
           <?php } else if ($data->provide_check_in!='' && $data->provide_check_out=='') {
               ?>
                <a style="color: green;" href="<?php echo base_url('ProviderDashboard/check_in'); ?>/<?php echo $data->id; ?>" onclick="return confirm('Are you sure?')"> <?=$data->provide_check_in?> Check In</a>  
                
                <!--<a href="<?=base_url()?>patients/service/<?= $data->id?>/<?= $data->pid?>" id="patients_visit" class="btn btn-primary btn-xs">Assign Services</a>-->
                 <a href="<?=base_url()?>patients/generic/<?= $data->id?>/<?= $data->pid?>" id="patients_visit" class="btn btn-primary btn-xs">Assign Services</a>
                 <a style="color: blue;" href="<?php echo base_url('ProviderDashboard/check_out'); ?>/<?php echo $data->id; ?>" onclick="return confirm('Are you sure?')">Check Out</a>
                
           <?php } else if ($data->provide_check_in!='' && $data->provide_check_out!='') { ?>
           
           <!--<a style="color: green;" href="<?php echo base_url('ProviderDashboard/check_in'); ?>/<?php echo $data->id; ?>" onclick="return confirm('Are you sure?')"> <?=$data->provide_check_in?> Check In</a>  -->
           
           <!--<a href="<?=base_url()?>patients/service/<?= $data->id?>" id="patients_visit" class="btn btn-primary btn-xs">Assign Services</a>-->
           
            <a style="color: red;" href="<?php echo base_url('ProviderDashboard/check_out'); ?>/<?php echo $data->id; ?>" onclick="return confirm('Are you sure?')"> <?=$data->provide_check_out?> Check Out</a>
            
             
           
           <?php }?>
            
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

.H1toH5 input { display: none; }
.H1toH5 .seatButton { padding: 5px; border: 1px solid #ccc; background: yellow; }
.H1toH5 input:checked + .seatButton { background: red; }

</script>


	