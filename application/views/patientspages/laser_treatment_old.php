<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Laser Treatment Service Form</h4> 
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
        <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Laser Type</b></label>
        <select class="col-sm-3 form-control">
                <option hidden value="">Select Laser Type</option>
                <option>IPL</option>
                <option>1064 Ellite</option>
                <option>Pi004 F8</option>
                <option>Pi004 Fractional</option>
                <option>1540</option>
                <option>Emerge</option>
        </select>
    </div>
    <hr style="background-color:grey;height: 1px;">
    <div class="fillerform">
    <div class="form-group row">
            <h4>Treatment info</h4>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Purpose</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox1" type="checkbox" checked="">
    <label for="checkbox1">Sun Damage
    </label>
    </div>
    <div class="checkbox">
    <input id="checkbox2" type="checkbox">
    <label for="checkbox2">Resurfacing</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox3" type="checkbox">
    <label for="checkbox3">Fine Lines
    </label>
    </div>
    <div class="checkbox">
    <input id="checkbox4" type="checkbox">
    <label for="checkbox4">Spit Pigment</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox5" type="checkbox">
    <label for="checkbox5">Melasma
    </label>
    </div>
    <div class="checkbox">
    <input id="checkbox6" type="checkbox">
    <label for="checkbox6">Capillaries</label>
    </div>
    </div>
    <div class="col-sm-4">
    <div class="checkbox">
    <input id="checkbox7" type="checkbox">
    <label for="checkbox7">Acne Scarry Pigment
    </label>
    </div>
    </div>
    </div>
    <div class="form-group row">
        <h3>Treatment Details</h3>
    </div>
    <div class="form-group row text-center table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead class="text-center">
                <tr>
                <th width="20%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Performed Area</th>
                <th width="12%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 1</th>
                <th width="11%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 2</th>
                <th width="11%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 3</th>
                <th width="11%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 4</th>
                <th width="12%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 5</th>
                <th width="11%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 6</th>
                <th width="12%" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">Passage 7</th>   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                <select class="form-control" name="laser_area" id="laser2">
                <option hidden value="">Select Area</option>
                <option>Face</option>
                <option>Neck</option>
                <option>Chest</option>
                <option>Arms</option>
                <option value="other">Other</option>
                </select>
                <div id="lasertraetmenthide">
                <input type="text" name="laser_area_manual" class="form-control" placeholder="Enter" id="laser_area_manual">
                </div>
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter"></td>
                </tr>
                <tr>
                    <td colspan="8">
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
            <input type="button" id="laser_area2" name="submit_data" class="btn btn-primary" value="Submit">
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
            <th title="Area">Area</th>
            <th title="Laser">Laser</th>
            <th title="Psg - 1">Psg1</th>
            <th title="Psg - 2">Psg2</th>
            <th title="Psg - 3">Psg3</th>
            <th title="Psg - 4">Psg4</th>
            <th title="Psg - 5">Psg5</th>
            <th title="Psg - 6">Psg6</th>
            <th title="Psg - 7">Psg7</th>
            <th title="Charged">Charged</th>
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
            <td><?php echo "abc";//$ntxs->forehead?></td>
            <td><?php echo "abc";//$ntxs->glabella?></td>
            <td><?php echo "abc";//$ntxs->crows_feet?></td>
            <td><?php echo "abc";//$ntxs->eye_bro?></td>
            <td><?php echo "abc";//$ntxs->bunny_line?></td>
            <td><?php echo "abc";//$ntxs->upper_lip?></td>
            <td><?php echo "abc";//$ntxs->lower_lip?></td>
            <td><?php echo "abc";//$ntxs->depressor_nasai?></td>
            <td><?php echo "abc";//$ntxs->dao?></td>
            <td><?php echo "abc";//$ntxs->mentalis?></td>
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo "abc";//$ntxs->create_at?></td>
            <td><?php echo "abc";//$ntxs->forehead?></td>
            <td><?php echo "abc";//$ntxs->glabella?></td>
            <td><?php echo "abc";//$ntxs->crows_feet?></td>
            <td><?php echo "abc";//$ntxs->eye_bro?></td>
            <td><?php echo "abc";//$ntxs->bunny_line?></td>
            <td><?php echo "abc";//$ntxs->upper_lip?></td>
            <td><?php echo "abc";//$ntxs->lower_lip?></td>
            <td><?php echo "abc";//$ntxs->depressor_nasai?></td>
            <td><?php echo "abc";//$ntxs->dao?></td>
            <td><?php echo "abc";//$ntxs->mentalis?></td>
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
