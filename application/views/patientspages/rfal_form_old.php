<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>RFAL Service Form</h4> 
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
        <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Device Name</b></label>
        <select class="col-sm-3 form-control" id="rfaldevice">
            <option hidden="" value="">Select Device Name</option>
            <?php
                    foreach($ssdata as $subservice)
                    {
                ?>
                <option value="<?=$subservice->ssid?>"><?=$subservice->sub_service_name?></option>
                    <?php
                     }
                    ?>
        </select>
    </div>
    <hr style="background-color:grey;height: 1px;">
    <div class="fillerform">
        <div class="forAccutite">
        <div class="form-group row">
            <h4 class="col-sm-6">Left Side</h4>
        </div>
   <div class="form-group row text-center table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead class="text-center">
                <tr>
                <th style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><h3>1.</h3>
                </th>
                <th><b>Area</b></th>
                <th>
                    <select class="form-control name="">
                    <option hidden="" value="">Select Area</option>
                    <option>Submental</option>
                    <option>Jowl</option>
                    <option>Axillary</option>
                    <option>Above knee</option>
                    <option>Nasolabial fold</option>
                    <option>Orbital</option>
                    <option>Small area</option>
                    <option>Vulvoplasty</option>
                    </select>
                </th>
                <th><b>Temperature</b></th>
                <th><input type="text" name="" class="form-control" placeholder="Enter Temperature"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <thead class="text-center">
                    <tr>
                        <th></th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Anesthetict fluid</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Energy</th>
                        <th colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Suction fluid</th>   
                    </tr>
                </thead>
                    <tr>
                        <td></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                         <input type="text" name="" class="form-control" placeholder="Enter Anesthetict fluid">  
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Energy"></td>
                        <td colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Suction fluid"></td>
                    </tr>
                    <tr>
                                                <td></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                            <input type="text" name="" class="form-control" placeholder="Enter Anesthetict fluid">
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Energy"></td>
                        <td colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Suction fluid"></td>
                    </tr>
                    <tr>
                        <td></td>
                    <td colspan="4" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a>
                    </td>
                    </tr>
                        <!----//Close internal rows----->
                </tr>
                <!----//Close exnternal rows----->
                <tr class="text-left">
                    <td colspan="5" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <a href="#"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add One More Area</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
            <div class="form-group row">
            <h4 class="col-sm-6">Right Side</h4>
        </div>
   <div class="form-group row text-center table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead class="text-center">
                <tr>
                <th style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><h3>1.</h3>
                </th>
                <th><b>Area</b></th>
                <th>
                    <select class="form-control name="">
                    <option hidden="" value="">Select Area</option>
                    <option>Submental</option>
                    <option>Jowl</option>
                    <option>Axillary</option>
                    <option>Above knee</option>
                    <option>Nasolabial fold</option>
                    <option>Orbital</option>
                    <option>Small area</option>
                    <option>Vulvoplasty</option>
                    </select>
                </th>
                <th><b>Temperature</b></th>
                <th><input type="text" name="" class="form-control" placeholder="Enter Temperature"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <thead class="text-center">
                    <tr>
                        <th></th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Anesthetict fluid</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Energy</th>
                        <th colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Suction fluid</th>   
                    </tr>
                </thead>
                    <tr>
                        <td></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                         <input type="text" name="" class="form-control" placeholder="Enter Anesthetict fluid">  
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Energy"></td>
                        <td colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Suction fluid"></td>
                    </tr>
                    <tr>
                                                <td></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                            <input type="text" name="" class="form-control" placeholder="Enter Anesthetict fluid">
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Energy"></td>
                        <td colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Suction fluid"></td>
                    </tr>
                    <tr>
                        <td></td>
                    <td colspan="4" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a>
                    </td>
                    </tr>
                        <!----//Close internal rows----->
                </tr>
                <!----//Close exnternal rows----->
                <tr class="text-left">
                    <td colspan="5" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <a href="#"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add One More Area</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label"><b>Amount</b></label>
        <div class="col-sm-4">
            <input type="number" name="amount" class="form-control" placeholder="Amount">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <input type="button" name="cancel" class="btn btn-danger" value="Cancel">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
        </div>
        <div class="col-sm-4">
        </div>
    </div>
    </div>
    <div class="forMorpheus">
    <div class="form-group row">
        <h3>Treatment Details</h3>
    </div>

    <div class="form-group row text-center">
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
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><select class="form-control" name="">
                    <option hidden="" value="">Select Area</option>
                    <option>Submental</option>
                    <option>Jowl</option>
                    <option>NLF</option>
                    <option>Periorbital</option>
                    <option>Neck</option>
                    </select></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
                </tr>
                 <tr>
                    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><select class="form-control" name="">
                    <option hidden="" value="">Select Area</option>
                    <option>Submental</option>
                    <option>Jowl</option>
                    <option>NLF</option>
                    <option>Periorbital</option>
                    <option>Neck</option>
                    </select></td>
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
    <div class="form-group row">
    <label  class="col-sm-2 col-form-label"><b>Amount</b></label>
        <div class="col-sm-4">
            <input type="number" name="amount" class="form-control" placeholder="Amount">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <input type="button" name="cancel" class="btn btn-danger" value="Cancel">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
        </div>
        <div class="col-sm-4">
        </div>
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
            <th title="Anesthetict fluid">Anesthetict fluid</th>
            <th title="Rec Probe">Energy</th>
            <th title="Performed By">Suction Fluid</th>
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
            <td><?php echo "abc";//$ntxs->forehead?></td>
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