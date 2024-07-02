<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Neurotoxin Patient's List</h4> 
<div class="m-t-25">
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Date</th>
            <th title="Forehead">FH</th>
            <th title="Glabella">GB</th>
            <th title="Crows Feet">CF</th>
            <th title="Eye Brow">EB</th>
            <th title="Bunny lines">BL</th>
            <th title="Upper lip lines">UL</th>
            <th title="Lower lip">LL</th>
            <th title="Depressor Nasai">DN</th>
            <th title="Dao">DAO</th>
            <th title="Mentalis">MT</th>
            <th title="Masseter">MSR</th>
            <th title="Any Are">Any Area</th>
            <th title="Price">Price</th>
            <th title="Discount">Discount</th>
            <th title="Promo">Promo</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$sr =1;
    	foreach($data as $nptl)
    	{
    ?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$nptl->create_at?></td>
            <td><?=$nptl->forehead?></td>
            <td><?=$nptl->glabella?></td>
            <td><?=$nptl->crows_feet?></td>
            <td><?=$nptl->eye_bro?></td>
            <td><?=$nptl->bunny_line?></td>
            <td><?=$nptl->upper_lip?></td>
            <td><?=$nptl->lower_lip?></td>
            <td><?=$nptl->depressor_nasai?></td>
            <td><?=$nptl->dao?></td>
            <td><?=$nptl->mentalis?></td>
            <td><?=$nptl->masseter?></td>
            <td><?=$nptl->any_area?></td>
            <td><?=$nptl->bamount?></td>
            <td><?=$nptl->damount?></td>
            <td><?=$nptl->promo?></td>
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