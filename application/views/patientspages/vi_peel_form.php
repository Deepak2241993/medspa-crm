<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <?php //echo'<pre>';print_r($sdata[0]);die;
 $vid=$this->input->get('vid', TRUE);
 $notes_id = $this->uri->segment(3);
 ?>
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Vi Peel Service Form</h4> 
<div class="m-t-25">
<?=form_open('patients/saveServices')?>
<br>
        <input type="hidden" name="product_selling_cost" id="product_selling_cost" value=""> 
        <input type="hidden" name="p_visit" id="p_visit" value="<?=$vid?>">
         <input type="hidden" name="p_notes_id" id="p_notes_id" value="<?=$notes_id?>">
        <input type="hidden" name="sid" id="sid" value="<?=$sdata[0]['sid']?>">
        <input type="hidden" name="product_name" id="product_names" value="">
        <input type="hidden" name="pid" id="pid" value="<?=$pdata[0]['pid']?>">
        <input type="hidden" name="pcid" id="pcid" value="<?=$pdata[0]['pid']?>">
        <input type="hidden" name="qty" id="qty" value="">
        <div class="form-group row">
            <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Patient Name</b></label>
            <label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control"><?= $pdata[0]['pname']?></label>
            <div class="col-sm-3">
            </div>
            <div class="col-sm-3">
            <input type="button" class="btn btn-primary" value="Add This Service" id="addfillerservice">
            <input type="button" class="btn btn-primary" value="Show Service Usage" id="showfillerusage">
            </div>
        </div>
        <div class="form-group row">
        <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
        <label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control"><?= $sdata[0]['service_name']?></label>
    </div>
    <hr style="background-color:grey;height: 1px;">
    <div class="fillerform">
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Purpose</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox10" type="checkbox" checked="">
    <label for="checkbox10">Fine lines</label>
    </div>
    <div class="checkbox">
    <input id="checkbox11" type="checkbox">
    <label for="checkbox11">Melasma</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">Pigment</label>
    </div>
    <div class="checkbox">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">Acne</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">Sun Damage</label>
    </div>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Skin Type</b></label>
    <div class="col-sm-4">
    <input type="text" name="skn" class="form-control" placeholder="Skin type">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Primed</b></label>
    <label class="col-sm-2 col-form-label">Retnol</label>
    <input type="text" name="skmn" class="col-sm-3 form-control" placeholder="Enter Retnol">
    <label class="col-sm-2 col-form-label">HQ</label>
    <input type="text" name="skmn" class="col-sm-3 form-control" placeholder="Enter Retnol">
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Skin care products at home</b></label>
    <div class="col-sm-4">
    <input type="text" name="sknh" class="form-control" placeholder="Skin Care">
    </div>
    </div>
    <hr>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Prior Peeling History</b></label>
    <div class="col-sm-4">
    <input type="text" name="sknh" class="form-control" placeholder="Peeling History">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Prior Peeling Complications</b></label>
    <div class="col-sm-4">
    <input type="text" name="sknh" class="form-control" placeholder="Peeling Complications">
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Recent</b></label>
    <label class="col-sm-2 col-form-label">Laser</label>
    <input type="text" name="skmn" class="col-sm-3 form-control" placeholder="Recent Laser">
    <label class="col-sm-2 col-form-label">Peel</label>
    <input type="text" name="skmn" class="col-sm-3 form-control" placeholder="Recent Peel">
    </div>
    <hr>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Peel Details</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox10" type="checkbox" checked="">
    <label for="checkbox10">VI</label>
    </div>
    <div class="checkbox">
    <input id="checkbox11" type="checkbox">
    <label for="checkbox11">VIA</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">Purify</label>
    </div>
    <div class="checkbox">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">P+</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">PP+</label>
    </div>
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Face</b></label>
    <div class="col-sm-3 checkbox">
    <input id="checkbox121" type="checkbox">
    <label for="checkbox121">Number of Layers</label>
    </div>
    <input type="text" name="skmn" class="col-sm-4 form-control" placeholder="Enter number of layers">
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Neck</b></label>
    <div class="col-sm-3 checkbox">
    <input id="checkbox1201" type="checkbox">
    <label for="checkbox1201">Number of Layers</label>
    </div>
    <input type="text" name="skmn" class="col-sm-4 form-control" placeholder="Enter number of layers">
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Any Area</b></label>
    <div class="col-sm-3 checkbox">
    <input id="checkbox1021" type="checkbox">
    <label for="checkbox1021">Number of Layers</label>
    </div>
    <input type="text" name="skmn" class="col-sm-4 form-control" placeholder="Enter number of layers">
    </div>
    <hr>
    <div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
    <div class="checkbox">
    <input id="checkbox13" type="checkbox" checked="">
    <label for="checkbox13">Discuss Post Care</label>
    </div>
    <div class="checkbox">
    <input id="checkbox14" type="checkbox">
    <label for="checkbox14">Discuss Priming</label>
    </div>
    </div>
    </div>
    <div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
    <div class="checkbox">
    <input id="checkbox13" type="checkbox" checked="">
    <label for="checkbox13">Retnol</label>
    </div>
    </div>
    <div class="col-sm-3">
    <div class="checkbox">
    <input id="checkbox14" type="checkbox">
    <label for="checkbox14">HQ</label>
    </div>
    </div>
    <div class="col-sm-3">
    <div class="checkbox">
    <input id="checkbox13" type="checkbox" checked="">
    <label for="checkbox13">VI+E</label>
    </div>
    </div>
    </div>
    <hr>
<br>
<br>
    <div class="form-group row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <a href="<?=base_url()?>patients/allpatients" name="cancel" class="btn btn-danger">Cancel</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" name="submit_data" class="btn btn-primary" value="Submit">
        </div>
        <div class="col-sm-4">
        </div>
    </div>
<?=form_close()?>
</div>
<div class="fillertable">
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Date</th>
            <th title="">Peel</th>
            <th title="">R</th>
            <th title="">IN</th>
            <th title="">A</th>
            <th title="">Priming Rational</th>
            <th title="">Priming HQ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sr =1;
        //foreach($ntxpatdata as $ntxs)
        //{
            ?>
        <tr>
            <td><?php echo $sr;?></td>
            <td><?php echo "abc";//$ntxs->create_at?></td>
            <td><?php echo "abc";//$ntxs->create_at?></td>
            <td><?php echo "abc";//$ntxs->create_at?></td>
            <td><?php echo "abc";//$ntxs->forehead?></td>
            <td><?php echo "abc";//$ntxs->glabella?></td>
            <td><?php echo "abc";//$ntxs->glabella?></td>
            <td><?php echo "abc";//$ntxs->glabella?></td>
        </tr>
        <?php
        //$sr++;
    //}
        ?>
    </tbody>
</table>
</div>
</div>
<br>
<div class="form-group row">
            <label class="col-sm-3 col-form-label"><b>ADD MORE SERVICES</b></label>
            <select class="col-sm-3 form-control" onchange="location = this.value;">
                <option hidden value="">Select New Service</option>
                <?php
                    foreach($allservices as $service)
                    {
                        if($service->sid!=$sdata[0]['sid'])
                        {
                ?>
                <option value="<?=base_url()?>patients/serviceOnPatient/<?= $pdata[0]['pid']?>/<?= $service->sid?>"><?=$service->service_name?></option>
                    <?php
                        }
                     }
                    ?>
            </select>
</div>
</div>
</div>
</div>
</div>