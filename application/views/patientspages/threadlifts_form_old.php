<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Thread Lifts Service Form</h4> 
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
        <!--<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Area</b></label>-->
        
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
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Area</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Sides</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Thread Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Number of Thread</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Performed By</th>   
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select  class="form-control">
                        <option hidden value="">Select Service Area</option>
                        <option>Eyebrow</option>
                        <option>Snatched Eye</option>
                        <option>Midface</option>
                        <option>Jowls</option>
                        <option>Submental</option>
                        <option>Neck</option>
                        <option>Butt</option>
                        </select></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                            Left
                        </td>
                        <td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control">
                        <option hidden value="">Select Thread Type</option>
                        <option>Mint fine</option>
                        <option>Mint17</option>
                        <option>Mint Fix</option>
                        <option>Mint Fix Mini</option>
                        <option>Tip up</option>
                        <option>Nose up</option>
                        <option>Miracu 7cm 18g</option>
                        <option>Miracu Forte</option>
                        <option>Miracu 4cm 18g</option>
                        <option>Miracu 6cm 21g</option>
                        <option>Miracu 9cm 21g</option>
                        <option>Mint Easy</option>
                        <option>Mint 43</option>
                        <option>Silhouette Insta 4</option>
                        </select>
                        </td>
                        <td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter number of thread"></td>
                        <td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Performed By"></td>
                    </tr>
                    <tr>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                            Right
                        </td>
                    </tr>
                   <tr>
                        <td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select  class="form-control">
                        <option hidden value="">Select Service Area</option>
                        <option>Eyebrow</option>
                        <option>Snatched Eye</option>
                        <option>Midface</option>
                        <option>Jowls</option>
                        <option>Submental</option>
                        <option>Neck</option>
                        <option>Butt</option>
                        </select></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                            Left
                        </td>
                        <td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control">
                        <option hidden value="">Select Thread Type</option>
                        <option>Mint fine</option>
                        <option>Mint17</option>
                        <option>Mint Fix</option>
                        <option>Mint Fix Mini</option>
                        <option>Tip up</option>
                        <option>Nose up</option>
                        <option>Miracu 7cm 18g</option>
                        <option>Miracu Forte</option>
                        <option>Miracu 4cm 18g</option>
                        <option>Miracu 6cm 21g</option>
                        <option>Miracu 9cm 21g</option>
                        <option>Mint Easy</option>
                        <option>Mint 43</option>
                        <option>Silhouette Insta 4</option>
                        </select>
                        </td>
                        <td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter number of thread"></td>
                        <td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Performed By"></td>
                    </tr>
                    <tr>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                            Right
                        </td>
                    </tr>
                    <tr>
                    <td colspan="5" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a>
                    </td>
                    </tr>
            </tbody>
        </table>
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
<br>
<div class="fillertable">
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Date</th>
            <th title="Area">Area</th>
            <th title="Side">Side</th>
            <th title="Thread Type">Thread Type</th>
            <th title="Number of Thread">Number Of Thread</th>
            <th title="Performed By">Performed By</th>
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