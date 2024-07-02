<?php //echo'<pre>';print_r($sdata[0]);die;?>
<!-- Page Container START -->
<div class="page-container" id="filler_ids">
  <?php   $vid=$this->input->get('vid', TRUE);
  ?>
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Filler Service Form</h4> 
<div class="m-t-25">
<?=form_open('patients/savefiller')?>
<br>
       <input type="hidden" name="p_visit" id="p_visit" value="<?=$vid?>">
        <div class="form-group row">
            <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Patient Name</b></label>
            <label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control"><?= $pdata[0]['pname']?></label>
            <div class="col-sm-3">
                
                <input type="hidden" name="sid_name" id="sid_name" value="<?= $sdata[0]['service_name']?>">
                 <input type="hidden" name="pid" id="pid" value="<?= $pdata[0]['pid']?>">
                 <input type="hidden" name="sid" id="sid" value="<?= $sdata[0]['sid']?>">
            <?php foreach($product_inv as $inv) {?>
<input type="hidden" name="product_Qty[]" id="<?php echo $inv['product_name'].'_t';?>" value="<?php echo $inv['current_sell_cost'].'_'.$inv['current_inventory'];?>">
            <?php }?>
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
    <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Cheek</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="cheeks"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" id="cheek_applied_side" name="applied_side[]">
                        <option hidden value="">Select</option>
                        <option value="Right Cheek Anterior">Right Cheek Anterior</option>
                        <option value="Right Cheek Lateral">Right Cheek Lateral</option>
                        <option value="Left Cheek Anterior">Left Cheek Anterior</option>
                        <option value="Left Cheek Lateral">Left Cheek Lateral</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>
                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>                       
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Cheek_t1" class="form-control Cheek_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerve">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="cheeks" ></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="cheeks" ></td>
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
    <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Temple</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="temple"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="applied_side[]" id="temple_applied_side">
                        <option hidden value="">Select</option>
                        <option value="Right temple Lifting">Right temple Lifting</option>
                        <option value="Left Temple lifting">Left Temple lifting</option>
                        <option value="Right temple hollow">Right temple hollow</option>
                        <option value="Left temple hollow">Left temple hollow</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>
                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Temple_t1" class="form-control Temple_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerve">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="temple"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="temple"></td>
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
    <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Lips</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="lips"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="applied_side[]" id="lips_applied_side">
                        <option hidden value="">Select</option>
                        <option value="Upper">Upper</option>
                        <option value="Lower">Lower</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>
                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Lips_t1" class="form-control Lips_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerv">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="lips"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="lips"></td>
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
    <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Chin</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="chin"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="applied_side[]" id="chin_applied_side">
                        <option hidden value="">Select</option>
                        <option value="Mentum">Mentum</option>
                        <option value="Pogonium">Pogonium</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>

                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Chin_t1" class="form-control Chin_t"  onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerve">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="chin"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="chin"></td>
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
    <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Mandible</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="mandible"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="applied_side[]" id="mandible_applied_side">
                        <option hidden value="">Select</option>
                        <option value="Right Mandibular body">Right Mandibular body</option>
                        <option value="Left Mandibular body">Left Mandibular body</option>
                        <option value="Right gonial angle">Right gonial angle</option>
                        <option value="Left gonial angle">Left gonial angle</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>
                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Mandible_t1" class="form-control Mandible_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerve">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="mandible"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="mandible"></td>
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
    <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Orbital</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="orbital"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="applied_side[]" id="orbital_applied_side">
                        <option hidden value="">Select</option>
                        <option value="Right Tear trough">Right Tear trough</option>
                        <option value="Left Tear Trough">Left Tear Trough</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>
                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Orbital_t1" class="form-control Orbital_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerve">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="orbital"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="orbital"></td>
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
        <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Nose</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="nose"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="applied_side[]" id="nose_applied_side">
                        <option hidden value="">Select</option>
                        <option value="Hump">Hump</option>
                        <option value="Tip">Tip</option>
                        <option value="Base">Base</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>
                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Nose_t1" class="form-control Nose_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerve">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="nose"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="nose"></td>
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
        <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Forehead</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="forehead"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="applied_side[]" id="forehead_applied_side">
                        <option hidden value="">Select</option>
                        <option value="Forehead">Forehead</option>
                        <option value="Right">Right</option>
                        <option value="Left">Left</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>
                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Forehead_t1" class="form-control Forehead_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerve">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="forehead"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="forehead"></td>
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
        <div class="form-group row table-responsive">
        <table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
            <thead>
                <tr>
                    <th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px; "><h3>Smile Lines</h3></th>
                </tr>
                    <tr class="text-center">
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Applied Side</th>
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Filler Type</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Qty</th> 
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Type</th>  
                        <th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Cannula</th>
                        <th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Needle</th> 
                    </tr>
                </thead>
            <tbody>
                    <tr>
                        <td style="display: none;"><input type="text" name="product[]" value="" id="smile_lines"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="applied_side[]" id="smile_lines_applied_side">
                        <option hidden value="">Select</option>
                        <option value="Right">Right</option>
                        <option value="Left">Left</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="filler_type[]">
                        <option hidden value="">Select</option>
                        <option value="Juvederm Voluma">Juvederm Voluma</option>
                        <option value="Juvederm Ultra">Juvederm Ultra</option>
                        <option value="Juvederm Ultra+"></option>
                        <option value="Vallore">Vallore</option>
                        <option value="Smooth">Smooth</option>
                        <option value="Vobella">Vobella</option>
                        <option value="Restylane Lyft">Restylane Lyft</option>
                        <option value="Restylane L">Restylane L</option>
                        <option value="Restylane Defyne">Restylane Defyne</option>
                        <option value="Restylane Refyne">Restylane Refyne</option>
                        <option value="Restylane Silk">Restylane Silk</option>
                        <option value="Restylane Kysse">Restylane Kysse</option>
                        <option value="Versa">Versa</option>
                        <option value="Radiesse">Radiesse</option>
                        <option value="Radiesse Hyperdilute 1:1">Radiesse Hyperdilute 1:1</option>
                        <option value="Radiesse Hyperdilute 1:2">Radiesse Hyperdilute 1:2</option>
                        <option value="Radiesse Hyperdilute 1:3">Radiesse Hyperdilute 1:3</option>
                        <option value="Bellafill">Bellafill</option>
                        <option value="Sculptra">Sculptra</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="amt[]" id="Smile_Lines_t1" class="form-control Smile_Lines_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>

                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
                        <select class="form-control" name="type[]">
                        <option hidden value="">Select</option>
                        <option value="Anesthesia">Anesthesia</option>
                        <option value="Infraorbital nerve">Infraorbital nerve</option>
                        <option value="Mental nerve">Mental nerve</option>
                        <option value="Topical">Topical</option>
                        <option value="Insertion point">Insertion point</option>
                        <option value="Perioral V">Perioral V</option>
                        </select>
                        </td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="cannula" value="smile_lines"></td>
                        <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="checkbox" name="needle" value="Smile_lines"></td>
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
    <br>

    <div class="form-group row">
            <label class="col-sm-3 col-form-label"><b>Qty</b></label>
            <div class="col-sm-4">
              <input type="number" name="qty" id="qty" class="form-control" readonly placeholder="Qty">  
            </div>
</div>

    <div class="form-group row">
            <label class="col-sm-3 col-form-label"><b>Amount</b></label>
            <div class="col-sm-4">
                <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
              <input type="number" name="bamount" id="bamount" class="form-control" placeholder="Amount">  
            </div>
</div>

<div class="form-group row">
            <label class="col-sm-3 col-form-label"><b>Net Amount</b></label>
            <div class="col-sm-4">
            <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
            <input type="number" name="namount" id="namount" onblur="Disc_cal()" class="form-control" placeholder="Net Amount">
        </div>
</div>

<div class="form-group row">
            <label class="col-sm-3 col-form-label"><b>Discount</b></label>
            <div class="col-sm-4">
            <span style="position: absolute; margin-left: 4px; margin-top: 9px;">%</span>
            <input type="text" name="damount" id="damount"  class="form-control" placeholder="Discount">
        </div>
</div>

    <br>
        <div class="form-group row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <a href="<?=base_url()?>patients/allpatients" name="cancel" class="btn btn-danger">Cancel</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">

    $('#cheek_applied_side').change(function(){ 
    $("#cheeks").val('cheek');
    
  })

    $('#temple_applied_side').change(function(){ 
    $("#temple").val('temple');
    
  })

    $('#lips_applied_side').change(function(){ 
    $("#lips").val('lips');
    
  })

    $('#chin_applied_side').change(function(){ 
    $("#chin").val('chin');
    
  })

    $('#mandible_applied_side').change(function(){ 
    $("#mandible").val('mandible');
    
  })

    $('#orbital_applied_side').change(function(){ 
    $("#orbital").val('orbital');
    
  })
    

    $('#nose_applied_side').change(function(){ 
    $("#nose").val('nose');
    
  })
    

    $('#forehead_applied_side').change(function(){ 
    $("#forehead").val('forehead');
    
  })

    $('#smile_lines_applied_side').change(function(){ 
    $("#smile_lines").val('smile_Lines');
    
  })


    
function Amount_cal(e) { debugger;
var get_ids=e.classList[1];
$("#"+get_ids+1).prop("readonly", true);
var data=$("#"+get_ids).val();

var res = data.split("_");
var cost=res[0];
var tqty=res[1];
var cqty=e.value;
//$("#"+get_ids).val(cqty);
if(tqty<cqty){
alert("Product Qty Not avilable");
return false;
}else{
}

var amt=0;
   if(cqty !=''){   
 var Qty = $("#qty").val();
 if(Qty ==''){
  $("#qty").val(cqty);
 }else{
  var q=$("#qty").val();
   $("#qty").val(parseInt(q)+parseInt(cqty));
 }
  var bamount = $("#bamount").val();
    if(bamount == ''){
     $("#bamount").val(parseInt(cost) * parseInt(cqty));    
    }else{
   var b=  $("#bamount").val();
   $("#bamount").val(parseInt(b)+parseInt(cost) * parseInt(cqty));
    }
   }
  }

  function Disc_cal(){ //debugger;
  var namount=$("#namount").val();
   var bamount=$("#bamount").val();
  if(namount !='' && bamount !=''){
  var cal_dis=(parseInt(bamount) - parseInt(namount));
  var f_dis= (cal_dis / parseInt(bamount)) * 100;
  var dis=f_dis.toFixed(2);
  $("#damount").val(parseInt(dis));
  // var cal_dis=(parseInt(bamount) * parseInt(dis_per))/100;
  // document.getElementById('bamount').readOnly = true;
  // document.getElementById('damount').readOnly = true;
  //  document.getElementById('namount').readOnly = true;
  //  var dis = parseInt(bamount) - parseInt(cal_dis);
  // $("#namount").val(parseInt(dis));

  }else{
 //   $("#namount").val(parseInt(bamount));
  }
  
  }

</script>


