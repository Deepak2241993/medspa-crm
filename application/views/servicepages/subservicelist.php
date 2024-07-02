<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">

    <h4>All Sub Services List
    
    <a href="<?=base_url(); ?>services/addsubService" ><button class="btn btn-primary btn-xs float-right cst-btn" >Add New SubServices</button></a>

    </h4> 

    

<div class="m-t-25">

<div class="table-responsive">

<table id="data-table" class="table table-bordered">

    <thead>

        <tr>

            <th>SR No.</th>
            <th>Sub Service Name</th>
             <th>Service Name</th>
            <th>Sub Service Charge</th>
            <th>Service pay</th>
            <th>Added Date</th>
        </tr>

    </thead>

    <tbody>

    	<?php

    	$sr =1;

    	foreach($services as $service)

    	{

    		?>

        <tr>

            <td><?=$sr?></td>

            <td><?=$service->sub_service_name?></td>
             <td><?=$service->service_name?></td>
            <td><?=$service->sub_service_charge?></td>
            <td><?=$service->service_pay ?></td>
            <td><?=date('d-m-Y',strtotime($service->create_at))?></td>
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
