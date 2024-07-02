<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>RFMN Service Form</h4> 
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
        <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Area</b></label>
        <select class="col-sm-3 form-control">
                <option hidden value="">Select Area</option>
                <option>Face</option>
                <option>Face & Neck</option>
                <option>Face Neck and Chest</option>
                <option>Vulval treatment</option>
                <option>Periorbital</option>
        </select>
    </div>
    <hr style="background-color:grey;height: 1px;">
    <div class="fillerform">
    <div class="form-group">
            <h4>Treatment info</h4>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Type</b></label>
    <div class="checkbox col-sm-2">
    <input id="checkbox10" type="checkbox" checked="">
    <label for="checkbox10">R</label>
    </div>
    <div class="checkbox col-sm-2">
    <input id="checkbox11" type="checkbox">
    <label for="checkbox11">R+N</label>
    </div>
    <div class="checkbox col-sm-2">
    <input id="checkbox14" type="checkbox">
    <label for="checkbox14">R+N+C</label>
    </div>
    <div class="checkbox col-sm-2">
    <input id="checkbox12" type="checkbox">
    <label for="checkbox12">Vulval</label>
    </div>
    <div class="checkbox col-sm-2">
    <input id="checkbox15" type="checkbox">
    <label for="checkbox15">Stretch</label>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Purpose</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox1" type="checkbox" checked="">
    <label for="checkbox1">Loose Skin
    </label>
    </div>
    <div class="checkbox">
    <input id="checkbox2" type="checkbox">
    <label for="checkbox2">purpose2</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox3" type="checkbox">
    <label for="checkbox3">Purpose3
    </label>
    </div>
    <div class="checkbox">
    <input id="checkbox4" type="checkbox">
    <label for="checkbox4">Purpose4</label>
    </div>
    </div>

    <label class="col-sm-2 col-form-label"><b>Skin Type</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox6" type="checkbox" checked="">
    <label for="checkbox6">1</label>
    </div>
    <div class="checkbox">
    <input id="checkbox7" type="checkbox">
    <label for="checkbox7">2</label>
    </div>
    <div class="checkbox">
    <input id="checkbox21" type="checkbox">
    <label for="checkbox21">3</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox8" type="checkbox">
    <label for="checkbox8">4</label>
    </div>
    <div class="checkbox">
    <input id="checkbox9" type="checkbox">
    <label for="checkbox9">5</label>
    </div>
    <div class="checkbox">
    <input id="checkbox22" type="checkbox">
    <label for="checkbox22">6</label>
    </div>
    </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label"><b>Treatment Number</b></label>
        <input type="text" name="ane" class="form-control col-sm-4" placeholder="Enter Anesthetic">
    </div>
    <div class="form-group row">
        <h3>Treatment Details</h3>
    </div>
    <div class="form-group row">
    
    <label class="col-sm-2 col-form-label"><b>Add Here</b></label>
    <div class="col-sm-2">
    <div class="checkbox" >
    <input id="checkbox16"  type="checkbox" checked="">
    <label for="checkbox16">M8</label>
    </div>
    <div class="checkbox">
    <input id="checkbox17" type="checkbox">
    <label for="checkbox17">MP</label>
    </div>
    <div class="checkbox">
    <input id="checkbox18" type="checkbox">
    <label for="checkbox18">F60</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox19" type="checkbox">
    <label for="checkbox19">F24</label>
    </div>
    <div class="checkbox">
    <input id="checkbox20" type="checkbox">
    <label for="checkbox20">F24C</label>
    </div>
    </div>
    </div>
    <div class="form-group row text-center table-responsive">
        <table class="table" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead class="text-center">
                <tr>
                <th width="20%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Performed Area</th>
                <th style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 1</th>
                <th style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 2</th> 
                <th style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 3</th>
                <th style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 4</th>   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">
                    <select class="form-control">
                    <option hidden value="">Select Area</option>
                    <option>MidFace and lower face</option>
                    <option>Submental</option>
                    <option>Periorbital, lips</option>
                    <option>Forehead</option>
                     </select>
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                </tr>
                 <tr>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                    <select class="form-control">
                    <option hidden value="">Select Area</option>
                    <option>MidFace and lower face</option>
                    <option>Submental</option>
                    <option>Periorbital, lips</option>
                    <option>Forehead</option>
                     </select>
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                </tr>
                <tr>
                    <td colspan="5">
                        <a href="#">Add One More Row</a>
                    </td>
                </tr>
            </tbody>
        </table>
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
