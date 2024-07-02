<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Filler Service Form</h4> 
<div class="m-t-25">
<?=form_open('')?>
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

<div class="form-group">
        <h3>Treatment Details</h3>
    </div>
    <div class="form-group row text-center table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead class="text-center">
                    <tr>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Amount</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control">
                        <option hidden value="">Select</option>
                        <option class="text-primary" disabled>----Cheek ----</option>
                        <option>Right Cheek Anterior</option>
                        <option>Right Cheek Lateral</option>
                        <option>Left Cheek Anterior</option>
                        <option>Left Cheek Lateral</option>
                        <option class="text-primary" disabled>----Temple ----</option>
                        <option>Right temple Lifting</option>
                        <option>Left Temple lifting</option>
                        <option>Right temple hollow</option>
                        <option>Left temple hollow</option>
                        <option class="text-primary"disabled>----Lips ----</option>
                        <option>Upper</option>
                        <option>Lower</option>
                        <option class="text-primary" disabled>----Chin ----</option>
                        <option>Mentum</option>
                        <option>Pogonium</option>
                        <option class="text-primary" disabled>----Mandible ----</option>
                        <option>Right Mandibular body</option>
                        <option>Left Mandibular body</option>
                        <option>Right gonial angle</option>
                        <option>Left gonial angle</option>
                        <option class="text-primary" disabled>----Orbital ----</option>
                        <option>Right Tear trough</option>
                        <option>Left Tear Trough</option>
                        <option class="text-primary" disabled>----Nose ----</option>
                        <option>Hump</option>
                        <option>Tip</option>
                        <option>Base</option>
                        <option class="text-primary" disabled>----Forehead ----</option>
                        <option>Forehead</option>
                        <option>Right</option>
                        <option>Left</option>
                        <option class="text-primary" disabled>----Smile Lines ----</option>
                        <option>Right</option>
                        <option>Left</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control">
                        <option hidden value="">Select</option>
                        <option>Juvederm Voluma</option>
                        <option>Juvederm Ultra</option>
                        <option>Juvederm Ultra+</option>
                        <option>Vallore</option>
                        <option>Smooth</option>
                        <option>Vobella</option>
                        <option>Restylane Lyft</option>
                        <option>Restylane L</option>
                        <option>Restylane Defyne</option>
                        <option>Restylane Refyne</option>
                        <option>Restylane Silk</option>
                        <option>Restylane Kysse</option>
                        <option>Versa</option>
                        <option>Radiesse</option>
                        <option>Radiesse Hyperdilute 1:1</option>
                        <option>Radiesse Hyperdilute 1:2</option>
                        <option>Radiesse Hyperdilute 1:3</option>
                        <option>Bellafill</option>
                        <option>Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="" class="form-control" placeholder="Enter Amount"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control">
                        <option hidden value="">Select</option>
                        <option>Anesthesia</option>
                        <option>Infraorbital nerve</option>
                        <option>Mental nerve</option>
                        <option>Topical</option>
                        <option>Insertion point</option>
                        <option>Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="" ></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="" ></td>
                    </tr>
                    <tr>
                    <td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a>
                    </td>
                    </tr>
                        <!----//Close internal rows----->
                </tr>
            </tbody>
        </table>
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