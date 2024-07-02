<!--Page Container START -->
<div class="page-container">
  <!--Content Wrapper START--> 
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>All Invoice List


    <a href="<?=base_url()?>invoice/" class="btn btn-primary btn-xs float-right cst-btn">Add New</a>

    </h4> 
    <br/><br/>
 <?=form_open('invoice/invoice_list')?>
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

           <br/><br/>
  <div class="col-md-12 row">
 <?=form_open('invoice/invoice_list')?>
   
 <div class="row well">
        <div class="">
          <label class="control-label">Service</label>
          <div class="col-sm-5">
            <select name="ttype" class="form-control" id="ttype" style="width: 228px;" required>
              <option value="">Select Treatment Type</option>
              <?php if(!empty($servicecategory)){
                    foreach($servicecategory as $treatment){?>
                        <option value="<?= $treatment->id?>" <?php if(isset($dates['ttype'])) echo ($treatment->id==  $dates['ttype']) ? ' selected="selected"' : '';?>><?= $treatment->name?></option>
                    <?php }} ?>
            </select>
        </div>
        </div>

        <div class="col-sm-3">
          <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px;width: 109px;">
            <i class="fa fa-filter"></i> Filter
          </button>
        </div>

        <div class="col-sm-12 text-danger" id="error_log"></div>

  </div>
         <?=form_close()?>

<?=form_open('invoice/invoice_list')?>
   
 <div class="row well">
        <div class="col-sm-5">
          <label class="control-label">Patient Name</label>
          <input class="form-control datepicker" type="text" name="p_name" value="<?php if(isset($dates['p_name'])){
            echo $dates['p_name'];
          }?>" id="p_name" placeholder="Patient Name" style="height: 40px;"/>
        </div>

        <div class="col-sm-3">
          <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px;width: 109px;">
            <i class="fa fa-filter"></i> Filter
          </button>
        </div>

        <div class="col-sm-12 text-danger" id="error_log"></div>

             </div>
         <?=form_close()?>

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
            <th>Services</th>
            <th>Bill Amount</th>
            <th>Dis. Amount</th>
            <th>Pay Amount</th>
            <th>Created Date</th>
            <th>Paymont Status</th>
            <th>Bill Basic</th>
            <th>Bill Detailed</th>
        </tr>
    </thead>
    <tbody>
    	<?php
        $sr =1;
        foreach($invoices_list as $data){
        ?>
        <tr class="<?=$data['id']?>">
            <td><?=$sr?></td>
            <td><?=$data['pname']?></td>
            <td>
              <?php
                $service_id = json_decode($data['servie_id']);
                if(!empty($service_id))
                {
                foreach($service_id as $key=>$value)
                {
                  $this->db->select('service_name');//
                  $this->db->from('services');
                  $this->db->where('services.id', $value);
                  $query = $this->db->get();
                  $querym= $query->result_array();
                   if(!empty($querym[0]['service_name']))
                   {
                     echo $querym[0]['service_name'].",";
                   }
                }}
              ?>
              <?=$data['services']?>
            </td>
            <td>$<?=$data['bill_amount']?></td>
            <td>$<?=$data['discount_amount']?></td>
            <td>$<?=$data['new_paybale_amount']?></td>
            <td><?=$data['created_at']?></td>
            <td><a href="<?=base_url()?>invoice/?id=<?= $data['id']?>&&prid=<?= $data['patient_id']?>" class="btn btn-warning btn-xs float-right cst-btn" > Pending</a></td>
            <td><a href="<?=base_url()?>invoice/create_bill/?id=<?= $data['id']?>&&type=one" class="btn btn-primary btn-xs float-right cst-btn" target="_blank">Bill 1</a></td>
            <td><a href="<?=base_url()?>invoice/create_bill/?id=<?= $data['id']?>&&type=four" class="btn btn-primary btn-xs float-right cst-btn" target="_blank">Bill 4</a></td>
           <!--  <td><span><button type="button" id="<?php echo $data['id'];?>" onclick="payment_status_update(<?=$data['id']?>)" class="btn btn-primary btn-xs float-right cst-btn" style=""><?=$data['payment_status']?></button></span></td>
            <td><?=$data['created_at']?></td>
         

            <td><a href="<?=base_url()?>patients/patient_note/<?= $data['id']?>" class="btn btn-primary mb-2 btn-xs">Update</a>
            
            <a href="<?=base_url()?>patients/delete_patient_note/<?= $data['id']?>" class="btn btn-danger btn-xs">Delete</a>
            </td> -->
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
       debugger;
        
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
                        mm[0].innerText=(data.data);
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

</script>
	