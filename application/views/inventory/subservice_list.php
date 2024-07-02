<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Particular Sub Services List</h4> 
<div class="m-t-25">
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Sub Service Name</th>
            <th>Service Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$sr =1;
    	foreach($data as $subservice)
    	{
    		?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$subservice->sub_service_name?></td>
            <td><?=$subservice->service_name?></td>
            <td><a href="<?=base_url()?>inventory/create_inventory/<?= $subservice->sid?>/<?= $subservice->ssid?>" class="btn btn-primary btn-xs">Create New Inventory</a></td>
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