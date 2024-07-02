<!--Page Container START -->
<div class="page-container">
  <!--Content Wrapper START--> 
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>All Services List</h4> 
    <a class="btn btn-primary btn-xs float-right cst-btn mb-3"href="<?=base_url()?>services/addService">Add New</a>
<div class="m-t-25">
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
    <?php if($this->session->flashdata('msg')){
          echo $this->session->flashdata('msg');
     }?>
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Service Name</th>
            <th>Service Charge</th>
           
            <th>Created Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sr =1;
        foreach($services as $data){
            // $current_inventory=(int)$data['current_inventory'];
            // $current_cost = (float)$data['current_cost'];
            // $item_cost = (float)$data['item_cost'];
            // $item_quantity = (int)$data['item_quantity'];
            // $current_inventory = $data['current_inventory'];


            // $total_cost = 
            // (($current_inventory *  $current_cost )
            // + ( $item_cost * $item_quantity)) / ($item_quantity + $current_inventory); 
            ?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$data->service_name?></td>
            <td><?=$data->service_charge?></td>
           
            <td><?=$data->create_at?></td>
            <td>
            <a href="<?=base_url()?>services/service_edit/<?= $data->id?>" name="edit_service"  mainid="<?= $data->id?>" class="btn btn-primary mr-2">Edit</button>
            
            <a href="<?=base_url()?>services/servicedelete/<?= $data->id?>" name="delete_inventory" mainid="<?= $data->id?>" class="btn btn-danger ">Delete</button>
            </td>
      </tr>
        <?php
        $sr++;
    }
        ?>
    </tbody>


    
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Add New Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="type_of_listing_frm" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Current Inventory </label>
                            <input type="text" id="current_inventory" name="current_inventory" class="form-control" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Item Cost</label>
                            <input type="text" id="item_cost" name="item_cost" class="form-control">
                        </div>                        

                        <div class="form-group">
                            <label for="name">Item Quantity</label>
                            <input type="text" id="item_quantity" name="item_quantity" class="form-control">
                        </div> 

                        <input type="hidden" name="taction" id="action" value="">
                        <input type="hidden" name="id" id="id" value="">
                       <button type="submit" class="btn btn-success" id="type_of_listing_btn">Submit</button>
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       
                    </form>
    
                </div>
            </div>
        </div>
    </div>
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
    //   $(document).on('click', '.edit_inventory', function(){  
    //      var id= $(this).attr("mainid");
    //      $(".modal-title").html("Update Details"); 
    //         $.ajax({
    //           url:"<?php echo base_url(); ?>inventory/fetch_single_inventory",  
    //           method:"POST",  
    //           data:{id:id,taction:'update_product'},  
    //           dataType:"json",  
    //           success:function(data) { 
    //             $('#successModal').modal('show');
    //             $('#product_name').val(data.product_name);
    //             $('#current_inventory').val(data.current_inventory);
    //             $('#id').val(data.inventory_id);
    //             $('#action').val('update_product');
    //           }  
    //         })  
    //       });

    // $(document).on('click','.delete_inventory',function(event){
    //     event.preventDefault();
    //     var id= $(this).attr("mainid");
    //     if(confirm("Are you sure you Delete this?")){
    //         $.ajax({
    //             url:"<?php echo base_url(); ?>inventory/delete_inventory",
    //             method: "POST",
    //             data:{id:id},
    //             dataType:"json",
    //             success:function(data){  
    //                 if(data['error']){
    //                     alert(data.error);
    //                 }else{
    //                     alert(data.success);
    //                 }  
    //                 dataTable.ajax.reload();  
    //             } 
    //         });
    //     }
    //     else {  
    //         return false;       
    //     }
    // });
</script>
    