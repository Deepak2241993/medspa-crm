<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">

    <h4>All Service Category List
    
    <button class="btn btn-primary btn-xs float-right cst-btn" data-toggle="modal" data-target="#successModal">Add New</button>

    </h4> 

    

<div class="m-t-25">

<div class="table-responsive">
<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success');?> </div>
  <?php   }?>
<table id="data-table" class="table table-bordered">

    <thead>

        <tr>

            <th>SR No.</th>

            <th>Name</th>
            <th>Added Date</th>
            <th>Action</th>

        </tr>

    </thead>

    <tbody>

    	<?php

    	$sr =1;

    	foreach($category as $value)

    	{

    		?>

        <tr>

            <td><?=$sr?></td>

            <td><?=$value->name?></td>
            <td><?=date('d-m-Y',strtotime($value->created_at))?></td>
            <td><a data-toggle="modal" data-target="#serviceUpdate_<?= $value->id ?>"  class="btn btn-primary btn-xs">Edit</a>
             <a href="javascript:void(0);" onclick="deletedat('<?=$value->id ?>');" class="btn btn-danger btn-xs">Delete</a> </td> 


             <!-- Model Code For Update -->
            <div class="modal fade" id="serviceUpdate_<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-success" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title">Update Service Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url()?>services/insert_service_data/<?=$value->id?>" method="post"  enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <label for="name">Service Name</label>
                                    <input type="text"  name="service_name" class="form-control" value="<?=$value->name?>">
                                </div>                        
                                
                                
                                <div class="form-group">
                                    <select class="form-control" name="status">
                                        <option value="1"<?php echo  ($value->status==1) ? 'selected':''?>>Active</option>
                                        <option value="0"<?php echo  ($value->status==0) ? 'selected':''?>>Inactive</option>
                                    </select>
                                </div>
                               
                                <input type="hidden" name="id" id="id" value="<?=$value->id?>">
                                <input type="hidden" name="taction" id="id" value="update_product">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                            </form>
            
                        </div>
                    </div>
                </div>
            </div>
             <!-- End Modal Code -->
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
                            <label for="name">Add Service</label>
                            <input type="text" id="service" name="service_name" class="form-control">
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
        var service = $('#service').val().trim();
        if (service != '') {
            $.ajax({
                url: "<?php echo base_url() .'services/insert_service_data'?>",
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
    

    function deletedat(id){
       var url="<?php echo base_url();?>";
       var r=confirm("Do you want to delete this?");
        if (r==true)
          window.location = url+"services/deletecategory/"+id;
        else
          return false;
        } 
</script>