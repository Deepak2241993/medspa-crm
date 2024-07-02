<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>RF Service Form</h4> 
<div class="m-t-25">
<?=form_open()?>
<br>
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
    <label class="col-sm-2 col-form-label"><b>Area</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox10" type="checkbox" checked="">
    <label for="checkbox10">area1</label>
    </div>
    <div class="checkbox">
    <input id="checkbox11" type="checkbox">
    <label for="checkbox11">area2</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">area3</label>
    </div>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Treatment Type</b></label>
    <div class="col-sm-4">
    <div class="checkbox">
    <input id="checkbox1" type="checkbox" checked="">
    <label for="checkbox1">Part of Coolsculpting Package
    </label>
    </div>
    <div class="checkbox">
    <input id="checkbox2" type="checkbox">
    <label for="checkbox2">Independent Treatment</label>
    </div>
    </div>

    <label class="col-sm-2 col-form-label"><b>Device</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox6" type="checkbox" checked="">
    <label for="checkbox6">Forma v</label>
    </div>
    <div class="checkbox">
    <input id="checkbox7" type="checkbox">
    <label for="checkbox7">Plus</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox8" type="checkbox">
    <label for="checkbox8">Mini Fx</label>
    </div>
    <div class="checkbox">
    <input id="checkbox9" type="checkbox">
    <label for="checkbox9">Body Fx</label>
    </div>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Purpose</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox13" type="checkbox" checked="">
    <label for="checkbox13">Lose skin</label>
    </div>
    <div class="checkbox">
    <input id="checkbox14" type="checkbox">
    <label for="checkbox14">fat</label>
    </div>
    </div>

    <div class="col-sm-3">
    <div class="checkbox">
    <input id="checkbox15" type="checkbox">
    <label for="checkbox15">Lose skin and fat</label>
    </div>
    </div>
    </div>
    <div class="form-group row">
        <h4>Treatment Details</h4>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><b>Treatment No.</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Treatment No.">
        <label class="col-sm-2 col-form-label"><b>Temperature</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Average Temp">
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><b>Energy</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Average Energy">
        <label class="col-sm-2 col-form-label"><b>Duration</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Duration">
    </div>
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label"><b>Amount</b></label>
        <input type="number" name="amount" class="col-sm-4 form-control" placeholder="Amount">
    </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Performed By</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox13" type="checkbox" checked="">
    <label for="checkbox13">Emp1</label>
    </div>
    <div class="checkbox">
    <input id="checkbox14" type="checkbox">
    <label for="checkbox14">Emp2</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox15" type="checkbox">
    <label for="checkbox15">Emp3</label>
    </div>
    <div class="checkbox">
    <input id="checkbox16" type="checkbox">
    <label for="checkbox16">Emp4</label>
    </div>
    </div>
    </div>

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
<!--<table id="data-table" class="table table-bordered">
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
        //foreach($ntxpatdata as $ntxs)
        {
            ?>
        <tr>
            <td><?=$sr?></td>
            <td><?=$ntxs->create_at?></td>
            <td><?=$ntxs->forehead?></td>
            <td><?=$ntxs->glabella?></td>
            <td><?=$ntxs->crows_feet?></td>
            <td><?=$ntxs->eye_bro?></td>
            <td><?=$ntxs->bunny_line?></td>
            <td><?=$ntxs->upper_lip?></td>
            <td><?=$ntxs->lower_lip?></td>
            <td><?=$ntxs->depressor_nasai?></td>
            <td><?=$ntxs->dao?></td>
            <td><?=$ntxs->mentalis?></td>
            <td><?=$ntxs->masseter?></td>
            <td><?=$ntxs->any_area?></td>
            <td><?=$ntxs->price?></td>
            <td><?=$ntxs->discount?></td>
            <td><?=$ntxs->promo?></td>
        </tr>
        <?php
        $sr++;
    }
        ?>
    </tbody>
</table>-->
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
