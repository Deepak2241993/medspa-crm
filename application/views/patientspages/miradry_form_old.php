<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Mira Dry Service Form</h4> 
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
    <label class="col-sm-2 col-form-label"><b>Purpose</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox10" type="checkbox" checked="">
    <label for="checkbox10">Sweat</label>
    </div>
    <div class="checkbox">
    <input id="checkbox11" type="checkbox">
    <label for="checkbox11">Odar</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">Hair</label>
    </div>
    </div>
    </div>
    <div class="form-group row">
        <h4 class="col-sm-6">Left Side</h4>
        <h4 class="col-sm-6">Right Side</h4>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Shape</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox6" type="checkbox" checked="">
    <label for="checkbox6">Hollow</label>
    </div>
    <!--<div class="checkbox">
    <input id="checkbox7" type="checkbox">
    <label for="checkbox7">Present</label>
    </div>-->
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox8" type="checkbox">
    <label for="checkbox8">Creaser</label>
    </div>
    <!--<div class="checkbox">
    <input id="checkbox9" type="checkbox">
    <label for="checkbox9">Absent</label>
    </div>-->
    </div>

    <label class="col-sm-2 col-form-label"><b>Shape</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox6" type="checkbox">
    <label for="checkbox6">Hollow</label>
    </div>
    <!--<div class="checkbox">
    <input id="checkbox7" type="checkbox">
    <label for="checkbox7">Present</label>
    </div>-->
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox8" type="checkbox" checked="">
    <label for="checkbox8">Creaser</label>
    </div>
    <!--<div class="checkbox">
    <input id="checkbox9" type="checkbox">
    <label for="checkbox9">Absent</label>
    </div>-->
    </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><b>Anesthetic fluid</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Enter Anesthetic">
        <label class="col-sm-2 col-form-label"><b>Anesthetic fluid</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Enter Anesthetic">
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><b>Size</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Enter Size">
        <label class="col-sm-2 col-form-label"><b>Size</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Enter Size">
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><b>Performed By</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox1" type="checkbox" checked="">
    <label for="checkbox1">Emp1
    </label>
    </div>
    <div class="checkbox">
    <input id="checkbox2" type="checkbox">
    <label for="checkbox2">Emp2</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox4" type="checkbox">
    <label for="checkbox4">Emp3
    </label>
    </div>
    <div class="checkbox">
    <input id="checkbox3" type="checkbox">
    <label for="checkbox3">Emp</label>
    </div>
    </div>
</div>
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label"><b>Amount</b></label>
        <input type="number" name="amount" class="col-sm-4 form-control" placeholder="Amount">
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