<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Contoura Service Form</h4> 
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
        <!--<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Laser Type</b></label>
        <select class="col-sm-3 form-control">
                <option hidden value="">Select Laser Type</option>
                <option>IPL</option>
                <option>1064 Ellite</option>
                <option>Pi004 F8</option>
                <option>Pi004 Fractional</option>
                <option>1540</option>
                <option>Emerge</option>
        </select>-->
    </div>
    <hr style="background-color:grey;height: 1px;">
    <div class="fillerform">
    <div class="form-group">
        <h3>Treatment Details</h3>
    </div>
    <div class="form-group row text-center table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead class="text-center">
                <tr>
                <th style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><h3>1.</h3></th>
                <th colspan="2" >Area</th>
                <th colspan="3" ><input type="text" name="" class="form-control" placeholder="Enter Area Name"></th>  
                </tr>
            </thead>
            <tbody>
                <tr><!----Row start for a particular area---->
                <thead class="text-center" >
                    <th></th>
                    <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Rec Time(min)</th>
                    <th width="20%" style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Rec Prob</th>
                    <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Performed by</th>
                    <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Date</th>
                    <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Total Time Done(min) </th>
                </thead>
                    <tr>
                        <td></td>
                    <td  style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                    <input type="text" name="" placeholder="Time in Minutes" class="form-control">
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                    <select class="form-control" required="">
                            <option value="" hidden="">Select</option>
                            <option>BR</option>
                            <option>MR</option>
                            <option>F+</option>
                            <option>FV</option>
                            
                        </select>
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                    <input type="text" name="" class="form-control" placeholder="Enter Performer Name">
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Date"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Total Time(in Minutes)"></td>
                </tr>

                <tr>
                    <td></td>
                    <td  style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                    <input type="text" name="" placeholder="Time in Minutes" class="form-control">
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                    <select class="form-control" required="">
                            <option value="" hidden="">Select</option>
                            <option>BR</option>
                            <option>MR</option>
                            <option>F+</option>
                            <option>FV</option>
                            
                        </select>
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                    <input type="text" name="" class="form-control" placeholder="Enter Performer Name">
                    </td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Date"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Total Time(in Minutes)"></td>
                </tr>
                <tr>
                <!----Add here more internal services--->
                    <td></td>
                    <td colspan="5" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <a id="addmoreinner" href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a>
                    </td>
                </tr>
                <!-----//close internal area---->
                </tr>

                <tr class="text-left">
                    <td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">
                        <a href="#"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add One More Area</a>
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
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Date</th>
            <th title="Applied Area">Applied Area</th>
            <th title="Rec Time(min)">Rec Time(min)</th>
            <th title="BR">BR</th>
            <th title="MR">MR</th>
            <th title="F+">F+</th>
            <th title="FV">FV</th>
            <th title="Performed by">Performed by</th>
            <th title="Total Time Done(min)">Total Time Done(min)</th>
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
            <td><?php echo "abc";//$ntxs->crows_feet?></td>
            <td><?php echo "abc";//$ntxs->crows_feet?></td>
            <td><?php echo "abc";//$ntxs->crows_feet?></td>
            <td><?php echo "abc";//$ntxs->crows_feet?></td>
            <td><?php echo "abc";//$ntxs->crows_feet?></td>
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

