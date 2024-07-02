
<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">
    <a class="btn btn-primary btn-xs float-right cst-btn" href="<?=base_url()?>packages/create" >Add New</a>
    <h4>All Packages List</h4>
<div class="m-t-25">
<div class="table-responsive">
<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success');?> </div>
  <?php }?>
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Package Name</th>
            <th>Image</th>
            <th>Price</th>                  
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>
    	<?php
    	$sr =1;
    	foreach($packages as $pt)
    	{
        // print_r($pt);die;
    		?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$pt->package_name?></td>
            <td><img src="<?=($pt->image)?base_url().'uploads/packages/'.$pt->image:base_url().'uploads/noimage.png'?>" style="height:100px"></td>
            <td><?=$pt->price?></td>
            
            
            <td><a href="<?=base_url()?>packages/package_edit/<?= $pt->id?>"  class="btn btn-primary btn-xs">Edit</a>
             <a href="javascript:void(0);" onclick="deletedat('<?php echo $pt->id ;?>');" class="btn btn-danger btn-xs">Delete</a> </td> 
            
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
</div>
<script>
    function deletedat(id){
        var url="<?php echo base_url();?>";
       var r=confirm("Do you want to delete this?");
        if (r==true)
          window.location = url+"packages/delete/"+id;
        else
          return false;
        } 
</script>