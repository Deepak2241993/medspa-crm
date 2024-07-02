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
    <h4>RF Service Form</h4> 
            
<div class="m-t-25" id="rdo">
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
            <input type="button" class="btn btn-primary" value="Add This Service" id="addservice">
            <input type="button" class="btn btn-primary" value="Show Service Usage" id="showusage2">
            </div>
        </div>
<!--------------------------- RFAL Service start --------------------->
<div id="rfal" >
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Patient Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">RFAL</label>
<!--<div class="col-sm-3">
</div>
<div class="col-sm-3">
<input type="button" class="btn btn-primary" value="Add This Service" id="addfillerservice">
<input type="button" class="btn btn-primary" value="Show Service Usage" id="showfillerusage">
</div>
</div> -->
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">RFAL</label>
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Device Name</b></label>
<select class="col-sm-3 form-control" id="rfaldevice">

</select>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox16" type="checkbox" class="rfal" name="rfal" checked>
<label for="checkbox16">Check this for select</label>
</div>
</div>
<div class="forAccutite">
<div class="form-group row">
<h4 class="col-sm-6">Left Side</h4>
</div>
<div class="form-group row text-center table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
<thead class="text-center">
<tr>
<th style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">
<h3>1.</h3>
</th>
<th><b>Area</b></th>
<th>
<select class="form-control" name="">
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
<th style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">
<h3>1.</h3>
</th>
<th><b>Area</b></th>
<th>
<select class="form-control" name="">
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">
<select class="form-control" name="">
   <option hidden="" value="">Select Area</option>
   <option>Submental</option>
   <option>Jowl</option>
   <option>NLF</option>
   <option>Periorbital</option>
   <option>Neck</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="" class="form-control" placeholder="Enter Passage"></td>
</tr>
<tr>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; ">
<select class="form-control" name="">
   <option hidden="" value="">Select Area</option>
   <option>Submental</option>
   <option>Jowl</option>
   <option>NLF</option>
   <option>Periorbital</option>
   <option>Neck</option>
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
</div>
</div>
</div>
</div>
<!------------------- RF Services Start ------------------------------------->

<div id="rf" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">RF</label>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox17" type="checkbox" class="rf" name="rf">
<label for="checkbox17">Check this for select</label>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Area</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox18" type="checkbox" name="area1" checked="">
<label for="checkbox18">area1</label>
</div>
<div class="checkbox">
<input id="checkbox19" type="checkbox" name="area2">
<label for="checkbox19">area2</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox20" type="checkbox" name="area3">
<label for="checkbox20">area3</label>
</div>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Treatment Type</b></label>
<div class="col-sm-4">
<div class="checkbox">
<input id="checkbox21" type="checkbox" checked="" name="part_Coolsculpting">
<label for="checkbox21">Part of Coolsculpting Package
</label>
</div>
<div class="checkbox">
<input id="checkbox22" type="checkbox" name="independent_treatment">
<label for="checkbox22">Independent Treatment</label>
</div>
</div>

<label class="col-sm-2 col-form-label"><b>Device</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox23" type="checkbox" checked="" name="forma_v">
<label for="checkbox23">Forma v</label>
</div>
<div class="checkbox">
<input id="checkbox24" type="checkbox" name="plus">
<label for="checkbox24">Plus</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox25" type="checkbox" name="mini_fx">
<label for="checkbox25">Mini Fx</label>
</div>
<div class="checkbox">
<input id="checkbox26" type="checkbox" name="body_fx">
<label for="checkbox26">Body Fx</label>
</div>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Purpose</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox27" type="checkbox" checked="" name="lose_skin">
<label for="checkbox27">Lose skin</label>
</div>
<div class="checkbox">
<input id="checkbox28" type="checkbox" name="fat">
<label for="checkbox28">Fat</label>
</div>
</div>

<div class="col-sm-3">
<div class="checkbox">
<input id="checkbox29" type="checkbox" name="lose_skin_fat">
<label for="checkbox29">Lose skin and fat</label>
</div>
</div>
</div>
<div class="form-group row">
<h4>Treatment Details</h4>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Treatment No.</b></label>
<input type="text" name="treatment_no" class="form-control col-sm-4" placeholder="Treatment No.">
<label class="col-sm-2 col-form-label"><b>Temperature</b></label>
<input type="text" name="temperature" class="form-control col-sm-4" placeholder="Average Temp">
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Energy</b></label>
<input type="text" name="energy" class="form-control col-sm-4" placeholder="Average Energy">
<label class="col-sm-2 col-form-label"><b>Duration</b></label>
<input type="text" name="duration" class="form-control col-sm-4" placeholder="Duration">
</div>
<div class="form-group row">
<label  class="col-sm-2 col-form-label"><b>Amount</b></label>
<input type="number" name="amount" class="col-sm-4 form-control" placeholder="Amount">
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Performed By</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox30" type="checkbox" checked="" name="Emp1">
<label for="checkbox30">Emp1</label>
</div>
<div class="checkbox">
<input id="checkbox31" type="checkbox" name="Emp2">
<label for="checkbox31">Emp2</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox32" type="checkbox" name="Emp3">
<label for="checkbox32">Emp3</label>
</div>
<div class="checkbox">
<input id="checkbox33" type="checkbox" name="Emp4">
<label for="checkbox33">Emp4</label>
</div>
</div>
</div>
</div>
</div>

<!--------------------- RFMN Service Start ----------------------------------->

<div id="rfmn" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">RFMN</label>
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Area</b></label>
<select class="col-sm-3 form-control" name="rfmn_area">
<option hidden value="">Select Area</option>
<option value="Face">Face</option>
<option value="Face & Neck">Face & Neck</option>
<option value="Face Neck and Chest">Face Neck and Chest</option>
<option value="Vulval treatmen">Vulval treatment</option>
<option value="Periorbital">Periorbital</option>
</select>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox54" type="checkbox" class="rfmn" name="rfmn" checked="" disabled="">
<label for="checkbox54">Check this for select</label>
</div>
</div>
<div class="form-group">
<h4>Treatment info</h4>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Type</b></label>
<div class="checkbox col-sm-2">
<input id="checkbox34" type="checkbox" checked="" name="rfmn_type[]" value="R">
<label for="checkbox34">R</label>
</div>
<div class="checkbox col-sm-2">
<input id="checkbox35" type="checkbox" name="rfmn_type[]" value="R+N">
<label for="checkbox35">R+N</label>
</div>
<div class="checkbox col-sm-2">
<input id="checkbox36" type="checkbox" name="rfmn_type[]" value="R+N+C">
<label for="checkbox36">R+N+C</label>
</div>
<div class="checkbox col-sm-2">
<input id="checkbox37" type="checkbox" name="rfmn_type[]" value="Vulval">
<label for="checkbox37">Vulval</label>
</div>
<div class="checkbox col-sm-2">
<input id="checkbox38" type="checkbox" name="rfmn_type[]" value="Stretch">
<label for="checkbox38">Stretch</label>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Purpose</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox39" type="checkbox" checked="" name="purpose[]" value="Loose Skin">
<label for="checkbox39">Loose Skin
</label>
</div>
<div class="checkbox">
<input id="checkbox40" type="checkbox" name="purpose[]" value="Purpose2">
<label for="checkbox40">purpose2</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox41" type="checkbox" name="purpose[]" value="Purpose3">
<label for="checkbox41">Purpose3
</label>
</div>
<div class="checkbox">
<input id="checkbox42" type="checkbox" name="purpose[]" value="Purpose4">
<label for="checkbox42">Purpose4</label>
</div>
</div>

<label class="col-sm-2 col-form-label"><b>Skin Type</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox43" type="checkbox" checked="" name="skin_type[]" value="1">
<label for="checkbox43">1</label>
</div>
<div class="checkbox">
<input id="checkbox44" type="checkbox" name="skin_type[]" value="2">
<label for="checkbox44">2</label>
</div>
<div class="checkbox">
<input id="checkbox45" type="checkbox" name="skin_type[]" value="3">
<label for="checkbox45">3</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox46" type="checkbox" name="skin_type[]" value="4">
<label for="checkbox46">4</label>
</div>
<div class="checkbox">
<input id="checkbox47" type="checkbox" name="skin_type[]" value="5">
<label for="checkbox47">5</label>
</div>
<div class="checkbox">
<input id="checkbox48" type="checkbox" name="skin_type[]" value="6">
<label for="checkbox48">6</label>
</div>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Treatment Number</b></label>
<input type="text" name="rfmn_treatment_number" class="form-control col-sm-4" placeholder="Enter Anesthetic">
</div>
<div class="form-group row">
<h3>Treatment Details</h3>
</div>
<div class="form-group row">

<label class="col-sm-2 col-form-label"><b>Add Here</b></label>
<div class="col-sm-2">
<div class="checkbox" >
<input id="checkbox49"  type="checkbox" checked="" name="treatment_details[]" value="M8">
<label for="checkbox49">M8</label>
</div>
<div class="checkbox">
<input id="checkbox50" type="checkbox" name="treatment_details[]" value="MP">
<label for="checkbox50">MP</label>
</div>
<div class="checkbox">
<input id="checkbox51" type="checkbox" name="treatment_details[]" value="F60">
<label for="checkbox51">F60</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox52" type="checkbox" name="treatment_details[]" value="F24">
<label for="checkbox52">F24</label>
</div>
<div class="checkbox">
<input id="checkbox53" type="checkbox" name="treatment_details[]" value="F24C">
<label for="checkbox53">F24C</label>
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
<select class="form-control" name="performed_area_1">
<option hidden value="">Select Area</option>
<option value="MidFace and lower face">MidFace and lower face</option>
<option value="Submental">Submental</option>
<option value="Periorbital, lips">Periorbital, lips</option>
<option value="Forehead">Forehead</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="passage_1_1" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="passage_2_1" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="passage_3_1" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="passage_4_1" class="form-control" placeholder="Enter Passage"></td>
</tr>
<tr>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="performed_area_2">
<option hidden value="">Select Area</option>
<option value="MidFace and lower face">MidFace and lower face</option>
<option value="Submental">Submental</option>
<option value="Periorbital, lips">Periorbital, lips</option>
<option value="Forehead">Forehead</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="passage_1_2" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="passage_2_2" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="passage_3_2" class="form-control" placeholder="Enter Passage"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="passage_4_2" class="form-control" placeholder="Enter Passage"></td>
</tr>
<tr>
<td colspan="5">
<a href="#">Add One More Row</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<!----------------Neurotaxin Service Start ----------------------------->  

        <div id="newservices" style="display:none;">
        <hr style="background-color:grey;height: 1px;">
        <div class="form-group row">
        <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
        <label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Neurotaxin</label>
        <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Sub Service Name</b></label>
        <select class="col-sm-3 form-control" name="ssid" id="sub_srv_fun">
                <option hidden value="">Select Sub Service</option>
                        <option value="1">Botax</option>
                                    <option value="2">Xeomin</option>
                                    <option value="3">Evolus</option>
                                    <option value="4">Dysport</option>
            
            </select>
    </div>
    <hr style="background-color:grey;height: 1px;">
    <div class="newservice">
    <div class="col-sm-6">
    <div class="checkbox">
    <input id="checkbox13" type="checkbox" name="nurotoxis">
    <label for="checkbox13">Check this for select</label>
    </div>
    </div>
    <div class="table-responsive">
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col">Applied Area</th>
                <th scope="col">Unit</th>
                <th scope="col">Unit</th>
                <th scope="col">Unit</th>
                <th scope="col">Unit</th>
                <th scope="col">Unit</th>
                <th scope="col">Unit</th>
                <th scope="col">Enter units manually </th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td>Forehead</td>
                <td><input type="radio" name="forehead" class="radio" value="6"><br>6</td>
                <td><input type="radio" name="forehead" class="radio" value="7"><br>7</td>
                <td><input type="radio" name="forehead" class="radio" value="8"><br>8</td>
                <td><input type="radio" name="forehead" class="radio" value="9"><br>9</td>
                <td><input type="radio" name="forehead" class="radio" value="10"><br>10</td>
                <td><input type="radio" name="forehead" class="radio" value="11"><br>11</td>
                <td><input type="text" name="forehead2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Glabella</td>
                <td><input type="radio" name="glabella" class="radio" value="14">(1+4+4+4+1)</td>
                <td><input type="radio" name="glabella" class="radio" value="14">(2+3+4+3+2)</td>
                <td><input type="radio" name="glabella" class="radio" value="11">(1+3+3+3+1)</td>
                <td><input type="radio" name="glabella" class="radio" value="10">(2+3+3+2)</td>
                <td><input type="radio" name="glabella" class="radio" value="20">(2+5+6+5+2)</td>
                <td><input type="radio" name="glabella" class="radio" value="6">(3+3)</td>
                <td><input type="text" name="glabella2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Crows Feet</td>
                <td><input type="radio" name="crowfeet" class="radio" value="12"><br>12</td>
                <td><input type="radio" name="crowfeet" class="radio" value="16"><br>16</td>
                <td><input type="radio" name="crowfeet" class="radio" value="20"><br>20</td>
                <td><input type="radio" name="crowfeet" class="radio" value="24"><br>24</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="crowfeet2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Eye Brow</td>
                <td><input type="radio" name="eyebrow" class="radio" value="4"><br>4</td>
                <td><input type="radio" name="eyebrow" class="radio" value="6"><br>6</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="eyebrow2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Bunny lines</td>
                <td><input type="radio" name="bunnylines" class="radio" value="8"><br>8</td>
                <td><input type="radio" name="bunnylines" class="radio" value="6"><br>6</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="bunnylines2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Upper lip lines</td>
                <td><input type="radio" name="uperlip" class="radio" value="2"><br>2</td>
                <td><input type="radio" name="uperlip" class="radio" value="3"><br>3</td>
                <td><input type="radio" name="uperlip" class="radio" value="4"><br>4</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="uperlip2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Lower lip</td>
                <td><input type="radio" name="lowerlip" class="radio" value="2"><br>2</td>
                <td><input type="radio" name="lowerlip" class="radio" value="3"><br>3</td>
                <td><input type="radio" name="lowerlip" class="radio" value="4"><br>4</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="lowerlip2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Depressor Nasai</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="depressor2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Dao</td>
                <td><input type="radio" name="dao" class="radio" value="6"><br>6</td>
                <td><input type="radio" name="dao" class="radio" value="4"><br>4</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="dao2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Mentalis</td>
                <td><input type="radio" name="mentalis" class="radio" value="4"><br>4</td>
                <td><input type="radio" name="mentalis" class="radio" value="6"><br>6</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="mentalis2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
            <tr>
                <td>Masseter</td>
                <td><input type="radio" name="masseter" class="radio" value="40"><br>40</td>
                <td><input type="radio" name="masseter" class="radio" value="30"><br>30</td>
                <td><input type="radio" name="masseter" class="radio" value="50"><br>50</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><input type="text" name="masseter2" class="form-control" placeholder="Or Enter(1+2+3)"></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>

<!-- ----------------- Filler Service Start ------------------->

<div id="filler" style="display:none;">
<div class="form-group row">
<div class="col-sm-3">
<input type="hidden" name="sid_name" id="sid_name" value="Filler"><input type="hidden" name="sid" id="sid" value="2"> <input type="hidden" name="product_Qty[]" id="Cheek_t" value="30_168"> <input type="hidden" name="product_Qty[]" id="Chin_t" value="20_500"> <input type="hidden" name="product_Qty[]" id="Forehead_t" value="15_480"> <input type="hidden" name="product_Qty[]" id="Lips_t" value="15_490"> <input type="hidden" name="product_Qty[]" id="Mandible_t" value="15_500"> <input type="hidden" name="product_Qty[]" id="Nose_t" value="15_490"> <input type="hidden" name="product_Qty[]" id="Orbital_t" value="15_490"> <input type="hidden" name="product_Qty[]" id="Smile_Lines_t" value="20_378"> <input type="hidden" name="product_Qty[]" id="Temple_t" value="10_490">
</div>
<div class="col-sm-3"><input type="button" class="btn btn-primary" value="Add This Service" id="addfillerservice" style="display: none"></div>

<br>
<div class="row"><label style="font-size: 16px;font-weight: 2px"><b>Service Name</b></label><label style="border: none;font-size: 16px;color:navy">&nbsp;&nbsp;&nbsp;Filler</label></div>

<hr style="background-color:grey;height: 1px">
<div class="fillerform">
<div class="form-group">
<h3>Treatment Details</h3>
</div>
<div class="form-group row table-responsive">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox14" type="checkbox" name="filler">
<label for="checkbox14">Check this for select</label>
</div>
</div>
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Cheek</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="cheeks"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="cheeks_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" id="cheek_applied_side" name="applied_side[]">
<option value="" hidden="">Select</option>
<option value="Right Cheek Anterior">Right Cheek Anterior</option>
<option value="Right Cheek Lateral">Right Cheek Lateral</option>
<option value="Left Cheek Anterior">Left Cheek Anterior</option>
<option value="Left Cheek Lateral">Left Cheek Lateral</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Cheek_t1" class="form-control Cheek_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerve">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="cheeks"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="cheeks"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
<div class="form-group row table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Temple</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="temple"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="temple_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="applied_side[]" id="temple_applied_side">
<option value="" hidden="">Select</option>
<option value="Right temple Lifting">Right temple Lifting</option>
<option value="Left Temple lifting">Left Temple lifting</option>
<option value="Right temple hollow">Right temple hollow</option>
<option value="Left temple hollow">Left temple hollow</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Temple_t1" class="form-control Temple_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerve">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="temple"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="temple"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
<div class="form-group row table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Lips</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="lips"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="lips_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="applied_side[]" id="lips_applied_side">
<option value="" hidden="">Select</option>
<option value="Upper">Upper</option>
<option value="Lower">Lower</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Lips_t1" class="form-control Lips_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerv">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="lips"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="lips"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
<div class="form-group row table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Chin</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="chin"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="chin_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="applied_side[]" id="chin_applied_side">
<option value="" hidden="">Select</option>
<option value="Mentum">Mentum</option>
<option value="Pogonium">Pogonium</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Chin_t1" class="form-control Chin_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerve">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="chin"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="chin"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
<div class="form-group row table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Mandible</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="mandible"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="mandible_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="applied_side[]" id="mandible_applied_side">
<option value="" hidden="">Select</option>
<option value="Right Mandibular body">Right Mandibular body</option>
<option value="Left Mandibular body">Left Mandibular body</option>
<option value="Right gonial angle">Right gonial angle</option>
<option value="Left gonial angle">Left gonial angle</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Mandible_t1" class="form-control Mandible_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerve">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="mandible"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="mandible"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
<div class="form-group row table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Orbital</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="orbital"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="orbital_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="applied_side[]" id="orbital_applied_side">
<option value="" hidden="">Select</option>
<option value="Right Tear trough">Right Tear trough</option>
<option value="Left Tear Trough">Left Tear Trough</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Orbital_t1" class="form-control Orbital_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerve">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="orbital"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="orbital"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
<div class="form-group row table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Nose</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="nose"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="nose_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="applied_side[]" id="nose_applied_side">
<option value="" hidden="">Select</option>
<option value="Hump">Hump</option>
<option value="Tip">Tip</option>
<option value="Base">Base</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Nose_t1" class="form-control Nose_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerve">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="nose"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="nose"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
<div class="form-group row table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Forehead</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="forehead"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="forehead_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="applied_side[]" id="forehead_applied_side">
<option value="" hidden="">Select</option>
<option value="Forehead">Forehead</option>
<option value="Right">Right</option>
<option value="Left">Left</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Forehead_t1" class="form-control Forehead_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerve">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="forehead"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="forehead"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
<div class="form-group row table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px">
<thead>
<tr>
<th colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:2px">
<h3>Smile Lines</h3>
</th>
</tr>
<tr class="text-center">
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Applied Side</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Filler Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Qty</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Type</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Cannula</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px">Needle</th>
</tr>
</thead>
<tbody>
<tr>
<td style="display: none"><input type="text" name="product[]" value="" id="smile_lines"></td>
<td style="display: none"><input type="text" name="f_ssid[]" value="" id="smile_lines_ssid"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="applied_side[]" id="smile_lines_applied_side">
<option value="" hidden="">Select</option>
<option value="Right">Right</option>
<option value="Left">Left</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="filler_type[]">
<option value="" hidden="">Select</option>
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
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="text" name="amt[]" id="Smile_Lines_t1" class="form-control Smile_Lines_t" onblur="Amount_cal(this)" placeholder="Enter Qty"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px">
<select class="form-control" name="type[]">
<option value="" hidden="">Select</option>
<option value="Anesthesia">Anesthesia</option>
<option value="Infraorbital nerve">Infraorbital nerve</option>
<option value="Mental nerve">Mental nerve</option>
<option value="Topical">Topical</option>
<option value="Insertion point">Insertion point</option>
<option value="Perioral V">Perioral V</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="cannula" value="smile_lines"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px"><input type="checkbox" name="needle" value="smile_lines"></td>
</tr>
<tr>
<td colspan="6" style="border-color:#b1b3b5;border-style: solid;border-width:1px"><a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a></td>
</tr>
<!----//Close internal rows----->
</tbody>
</table>
</div>
</div>
</div>
</div>

<!-- -------------- Miradry service Start ---------------------------------->


<div id="miradry" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Mira Dry</label>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox15" class="miradryadd" type="checkbox" name="miradry">
<label for="checkbox15">Check this for select</label>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Purpose</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox10" type="checkbox" name="sweat" checked="">
<label for="checkbox10">Sweat</label>
</div>
<div class="checkbox">
<input id="checkbox11" type="checkbox" name="odar">
<label for="checkbox11">Odar</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox12" type="checkbox" name="hair">
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
<input id="checkbox6" type="checkbox" checked="" name="left_Hollow">
<label for="checkbox6">Hollow</label>
</div>
<!--<div class="checkbox">
<input id="checkbox7" type="checkbox">
<label for="checkbox7">Present</label>
</div>-->
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox8" type="checkbox" name="left_Creaser">
<label for="checkbox8">Creaser</label>
</div>
</div>

<label class="col-sm-2 col-form-label"><b>Shape</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox7" type="checkbox" name="right_Hollow">
<label for="checkbox7">Hollow</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox8" type="checkbox" checked="" name="rigjt_Creaser">
<label for="checkbox8">Creaser</label>
</div>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Anesthetic fluid</b></label>
<input type="text" name="left_ane" class="form-control col-sm-4" placeholder="Enter Anesthetic">
<label class="col-sm-2 col-form-label"><b>Anesthetic fluid</b></label>
<input type="text" name="right_ane" class="form-control col-sm-4" placeholder="Enter Anesthetic">
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Size</b></label>
<input type="text" name="left_size" class="form-control col-sm-4" placeholder="Enter Size">
<label class="col-sm-2 col-form-label"><b>Size</b></label>
<input type="text" name="right_siz" class="form-control col-sm-4" placeholder="Enter Size">
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Performed By</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox1" type="checkbox" checked="" name="Emp1">
<label for="checkbox1">Emp1
</label>
</div>
<div class="checkbox">
<input id="checkbox2" type="checkbox" name="Emp2">
<label for="checkbox2">Emp2</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox4" type="checkbox" name="Emp3">
<label for="checkbox4">Emp3
</label>
</div>
<div class="checkbox">
<input id="checkbox3" type="checkbox" name="Emp">
<label for="checkbox3">Emp</label>
</div>
</div>
</div>
</div>
</div>






<!--- ------------------- Laser Treatment Service Start ------------------->

<div id="laser-treatment" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">laser-treatment</label>
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Laser Type</b></label>
<select class="col-sm-3 form-control" name="laser_type">
<option hidden value="">Select Laser Type</option>
<option value="IPL">IPL</option>
<option value="1064 Ellite">1064 Ellite</option>
<option value="Pi004 F8">Pi004 F8</option>
<option value="Pi004 Fractiona">Pi004 Fractional</option>
<option value="1540">1540</option>
<option value="Emerge">Emerge</option>
</select>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox55" type="checkbox" class="laser-treatment" name="laser-treatment">
<label for="checkbox55">Check this for select</label>
</div>
</div>
<div class="form-group row">
<h4>Treatment info</h4>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Purpose</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox56" type="checkbox" checked="" name="leaser_purpose[]" value="Sun Damage">
<label for="checkbox56">Sun Damage
</label>
</div>
<div class="checkbox">
<input id="checkbox57" type="checkbox" name="leaser_purpose[]" value="Resurfacing">
<label for="checkbox57">Resurfacing</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox58" type="checkbox" name="leaser_purpose[]" value="Fine Lines">
<label for="checkbox58">Fine Lines
</label>
</div>
<div class="checkbox">
<input id="checkbox59" type="checkbox" name="leaser_purpose[]" value="Spit Pigment">
<label for="checkbox59">Spit Pigment</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox60" type="checkbox" name="leaser_purpose[]" value="Melasma">
<label for="checkbox60">Melasma
</label>
</div>
<div class="checkbox">
<input id="checkbox61" type="checkbox" name="leaser_purpose[]" value="Capillaries">
<label for="checkbox61">Capillaries</label>
</div>
</div>
<div class="col-sm-4">
<div class="checkbox">
<input id="checkbox62" type="checkbox" name="leaser_purpose[]" value="Acne Scarry Pigment">
<label for="checkbox62">Acne Scarry Pigment
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
<option value="Face">Face</option>
<option value="Neck">Neck</option>
<option value="Chest">Chest</option>
<option value="Arms">Arms</option>
<option value="other">Other</option>
</select>
<div id="lasertraetmenthide">
<input type="text" name="laser_area_manual" class="form-control" placeholder="Enter" id="laser_area_manual">
</div>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="passage_1" class="form-control" placeholder="Enter"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="passage_2" class="form-control" placeholder="Enter"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="passage_3" class="form-control" placeholder="Enter"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="passage_4" class="form-control" placeholder="Enter"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="passage_5" class="form-control" placeholder="Enter"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="passage_6" class="form-control" placeholder="Enter"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="passage_7" class="form-control" placeholder="Enter"></td>
</tr>
<tr>
<td colspan="8">
<a href="#">Add One More Row</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<!----------------------- Coolsculpting Service ------------------------>

 
<div id="Coolsculpting" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Coolsculpting</label>
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
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox64" type="checkbox" class="coolsculpting" name="coolsculpting">
<label for="checkbox64">Check this for select</label>
</div>
</div>
<div class="form-group row">
<h3>Treatment Details</h3>
</div>
<div class="form-group row text-center table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
<thead class="text-center">
<tr>
<th style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><h3>1.</h3></th>
<th><b>Area</b></th>
<th ><input type="text" name="" class="form-control" placeholder="Enter Area Name"></th> 
<th></th>
</tr>
</thead>
<tbody>
<tr>
<thead class="text-center">
<tr>
<th></th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Rec Probe</th>
<th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Date</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Done By</th>   
</tr>
</thead>
<tr>
<td></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="area_rec_probe1">
<option hidden value="">Select</option>
<option value="Adv">Adv</option>
<option value="Adv +">Adv +</option>
<option value="Adv -">Adv -</option>
<option value="Mini">Mini</option>
<option value="Smooth">Smooth</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="area_rec_probe1_date" class="form-control" placeholder="Enter"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="area_rec_probe1_doneby" class="form-control" placeholder="Enter"></td>
</tr>
<tr>
<td></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="area_rec_probe2">
<option hidden value="">Select</option>
<option value="Adv">Adv</option>
<option value="Adv +">Adv +</option>
<option value="Adv -">Adv -</option>
<option value="Mini">Mini</option>
<option value="Smooth">Smooth</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="area_rec_probe2_date" class="form-control" placeholder="Enter"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="area_rec_probe2_doneby" class="form-control" placeholder="Enter"></td>
</tr>
<tr>
<td></td>
<td colspan="3" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<a href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add One More Row</a>
</td>
</tr>
<!----//Close internal rows----->
</tr>
<!----//Close exnternal rows----->
<tr class="text-left">
<td colspan="4" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<a href="#"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Add One More Area</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

<!---------------------- Contoura Service Start ------------------------>

<div id="Contoura" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Contoura</label>
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
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox65" type="checkbox" class="contoura" name="contoura">
<label for="checkbox65">Check this for select</label>
</div>
</div>
<div class="form-group">
<h3>Treatment Details</h3>
</div>
<div class="form-group row text-center table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
<thead class="text-center">
<tr>
<th style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><h3>1.</h3></th>
<th colspan="2" >Area</th>
<th colspan="3" ><input type="text" name="contoura_area" class="form-control" placeholder="Enter Area Name"></th>  
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
<input type="text" name="contoura_timeIn_minut1" placeholder="Time in Minutes" class="form-control">
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="contoura_rec_prob1">
<option value="" hidden="">Select</option>
<option value="BR">BR</option>
<option value="MR">MR</option>
<option value="F+">F+</option>
<option value="FV">FV</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="contoura_performer_name1" class="form-control" placeholder="Enter Performer Name">
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="contoura_date1" class="form-control" placeholder="Enter Date"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="contoura_total_time1" class="form-control" placeholder="Enter Total Time(in Minutes)"></td>
</tr>
<tr>
<td></td>
<td  style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="contoura_timeIn_minut2" placeholder="Time in Minutes" class="form-control">
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="contoura_rec_prob2">
<option value="" hidden="">Select</option>
<option value="BR">BR</option>
<option value="MR">MR</option>
<option value="F+">F+</option>
<option value="FV">FV</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="contoura_performer_name2" class="form-control" placeholder="Enter Performer Name">
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="contoura_date2" class="form-control" placeholder="Enter Date"></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="contoura_total_time2" class="form-control" placeholder="Enter Total Time(in Minutes)"></td>
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
</div>
</div>
</div>

<!---- -------------- Thread Lift Service Start -------------------------->

<div id="Thread-Lifts" style="display:none;"> 
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Thread Lifts</label>
<!--<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Area</b></label>-->
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox66" type="checkbox" class="thread-lifts" name="Thread-Lifts">
<label for="checkbox66">Check this for select</label>
</div>
</div>
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
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Number of Thread</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Performed By</th>   
</tr>
</thead>
<tbody>
<tr>
<td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select  class="form-control" name="thread_lifts_area1">
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
<select class="form-control" name="thread_lifts_type1">
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
<td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="thread_lifts_numberthread1" class="form-control" placeholder="Enter number of thread"></td>
<td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="thread_lifts_performedby1" class="form-control" placeholder="Enter Performed By"></td>
</tr>
<tr>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
Right
</td>
</tr>
<tr>
<td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select  class="form-control" name="thread_lifts_area2">
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
<select class="form-control"  name="thread_lifts_type2">
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
<td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="thread_lifts_numberthread2" class="form-control" placeholder="Enter number of thread"></td>
<td rowspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="thread_lifts_performedby2" class="form-control" placeholder="Enter Performed By"></td>
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
</div> 
</div> 


<!----- -------------------- Sculptra-Butt Service Start -------------------->

<div id="Sculptra-Butt" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Sculptra Butt</label>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox67" type="checkbox" class="sculptra-butt" name="Sculptra-Butt">
<label for="checkbox67">Check this for select</label>
</div>
</div>
<div class="form-group">
<h3>Treatment Details</h3>
</div>
<div class="form-group row text-center table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
<thead class="text-center">
<tr>
<th style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><h3>1.</h3></th>
<th><h4>Dialution</h4></th>
<th colspan="2"><input type="text" name="dialution" class="form-control" placeholder="Enter Dialution">
</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<thead class="text-center">
<tr>
<th></th>
<th colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Left</th>
<th colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Right</th> 
</tr>
</thead>
<tr>
<th></th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Area</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Vials</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Area</th>
<th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Vials</th> 
</tr>
<tr>
<td></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="sculptra_butt_area_left1">
<option hidden value="">Select Area</option>
<option value="Projection">Projection</option>
<option value="Hipdiss">Hipdiss</option>
<option value="Cellulite">Cellulite</option>
<option value="Dimple">Dimple</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="sculptra_butt_vials_left1" class="form-control" placeholder="Enter Vials">
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="sculptra_butt_area_left2">
<option hidden value="">Select area</option>
<option value="Projection">Projection</option>
<option value="Hipdiss">Hipdiss</option>
<option value="Cellulite">Cellulite</option>
<option value="Dimple">Dimple</option>
</select></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="sculptra_butt_vials_left2" class="form-control" placeholder="Enter Vials"></td>
</tr>
<tr>
<td></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="sculptra_butt_area_right1">
<option hidden value="">Select area</option>
<option value="Projection">Projection</option>
<option value="Hipdiss">Hipdiss</option>
<option value="Cellulite">Cellulite</option>
<option value="Dimple">Dimple</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="sculptra_butt_vials_right1" class="form-control" placeholder="Enter Vials">
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="sculptra_butt_area_right2">
<option hidden value="">Select area</option>
<option value="Projection">Projection</option>
<option value="Hipdiss">Hipdiss</option>
<option value="Cellulite">Cellulite</option>
<option value="Dimple">Dimple</option>
</select></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="sculptra_butt_vials_right2" class="form-control" placeholder="Enter Vials"></td>
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
</div>
</div>

<!--------------------- Sculptra-Face Service Start -------------------------->

<div id="Sculptra-Face" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Sculptra Face</label>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
<div class="checkbox">
<input id="checkbox68" type="checkbox" class="sculptra-face" name="Sculptra-face">
<label for="checkbox68">Check this for select</label>
</div>
</div>
<div class="form-group">
<h3>Treatment Details</h3>
</div>
<div class="form-group row text-center table-responsive">
<table class="table" id="" style="border-color:#b1b3b5;border-style: solid;border-width:1px;margin: 30px;">
<thead class="text-center">
<tr>
<th style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><h3>1.</h3></th>
<th><h4>Dialution</h4></th>
<th colspan="2"><input type="text" name="sculptra_face_dialution" class="form-control" placeholder="Enter Dialution">
</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<thead class="text-center">
<tr>
<th></th>
<th colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Left</th>
<th colspan="2" style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Right</th> 
</tr>
</thead>
<tr>
<th></th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Area</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Vials</th>
<th style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Area</th>
<th  style="border-color:#b1b3b5;border-style: solid;border-width:2px; ">Vials</th> 
</tr>
<tr>
<td></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="sculptra_face_area_left1">
<option hidden value="">Select Area</option>
<option value="Projection">Projection</option>
<option value="Hipdiss">Hipdiss</option>
<option value="Cellulite">Cellulite</option>
<option value="Dimple">Dimple</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="sculptra_face_vials_left1" class="form-control" placeholder="Enter Vials">
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="sculptra_face_area_left2">
<option hidden value="">Select area</option>
<option value="Projection">Projection</option>
<option value="Hipdiss">Hipdiss</option>
<option value="Cellulite">Cellulite</option>
<option value="Dimple">Dimple</option>
</select></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="sculptra_face_vials_left2" class="form-control" placeholder="Enter Vials"></td>
</tr>
<tr>
<td></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="sculptra_face_area_right1">
<option hidden value="">Select area</option>
<option value="Projection">Projection</option>
<option value="Hipdiss">Hipdiss</option>
<option value="Cellulite">Cellulite</option>
<option value="Dimple">Dimple</option>
</select>
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="sculptra_face_vials_right1" class="form-control" placeholder="Enter Vials">
</td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<select class="form-control" name="sculptra_face_area_right2">
<option hidden value="">Select area</option>
<option value="Projection">Projection</option>
<option value="Hipdiss">Hipdiss</option>
<option value="Cellulite">Cellulite</option>
<option value="Dimple">Dimple</option>
</select></td>
<td style="border-color:#b1b3b5;border-style: solid;border-width:1px;">
<input type="text" name="sculptra_face_vials_right2" class="form-control" placeholder="Enter Vials"></td>
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
</div> 
</div> 

<!----------------------- Asthetic-Services Start --------------------------->

<div id="Asthetic-Services" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Asthetic-Services></label>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
      <div class="checkbox">
      <input id="checkbox69" type="checkbox" class="asthetic-services" name="Asthetic-Services">
      <label for="checkbox69">Check this for select</label>
      </div>
      </div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Purpose</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox70" type="checkbox" checked="" name="astheti_purpose[]" value="Clossed Pores">
<label for="checkbox70">Clossed Pores</label>
</div>
<div class="checkbox">
<input id="checkbox71" type="checkbox" name="astheti_purpose[]" value="Oily Skin">
<label for="checkbox71">Oily Skin</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox72" type="checkbox" name="astheti_purpose[]" value="Dry Skin">
<label for="checkbox72">Dry Skin</label>
</div>
<div class="checkbox">
<input id="checkbox73" type="checkbox" name="astheti_purpose[]" value="Sensitive">
<label for="checkbox73">Sensitive</label>
</div>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Skin Condition</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox74" type="checkbox" checked="" name="astheti_skin_condition[]" value="Acene">
<label for="checkbox74">Acene</label>
</div>
<div class="checkbox">
<input id="checkbox75" type="checkbox" name="astheti_skin_condition[]" value="Pigment">
<label for="checkbox75">Pigment</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox76" type="checkbox" name="astheti_skin_condition[]" value="Sun Damage">
<label for="checkbox76">Sun Damage</label>
</div>
<div class="checkbox">
<input id="checkbox78" type="checkbox" name="astheti_skin_condition[]" value="Rine lines">
<label for="checkbox78">Rine lines</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox79" type="checkbox" name="astheti_skin_condition[]" value="Wrinkles">
<label for="checkbox79">Wrinkles</label>
</div>
<div class="checkbox">
<input id="checkbox80" type="checkbox" name="astheti_skin_condition[]" value="Roseckia">
<label for="checkbox80">Roseckia</label>
</div>
</div>
</div>

<div class="form-group row">
<h4>Products used at home</h4>
</div>
<hr>
<div class="form-group row">
<label class="col-sm-6 col-form-label"><b>Recent Skin Care Treatments</b></label>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Botax</b></label>
<input type="text" name="skin_care_botax" class="form-control col-sm-4" placeholder="Average Energy">
<label class="col-sm-2 col-form-label"><b>Skin Type</b></label>
<input type="text" name="skin_care_type" class="form-control col-sm-4" placeholder="Duration">
</div>
<div class="form-group row">
<label  class="col-sm-2 col-form-label"><b>Microneedling</b></label>
<input type="number" name="skin_care_microneedling" class="col-sm-4 form-control" placeholder="Amount">
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>RF</b></label>
<input type="text" name="skin_care_rf" class="form-control col-sm-4" placeholder="Duration">
</div>
<hr>
<div class="form-group row">
<label class="col-sm-6 col-form-label"><b>Service</b></label>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Mini Facial</b></label>
<input type="text" name="service_mini_facial" class="form-control col-sm-4" placeholder="Average Energy">
<label class="col-sm-2 col-form-label"><b>Detailed Facial</b></label>
<input type="text" name="service_detailed_facial" class="form-control col-sm-4" placeholder="Duration">
</div>
<div class="form-group row">
<label  class="col-sm-2 col-form-label"><b>Buckle Facial</b></label>
<input type="number" name="service_buckle_facial" class="col-sm-4 form-control" placeholder="Buckle Facial">
<label class="col-sm-2 col-form-label"><b>Micro-Derma </b></label>
<input type="text" name="service_micro_derma" class="form-control col-sm-4" placeholder="Duration">
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Derma Planning</b></label>
<input type="text" name="service_derma_planning" class="form-control col-sm-4" placeholder="Duration">
</div>
<hr>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Product and Service Recommandation</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox81" type="checkbox" checked="" name="astheti_product_and_service[]" value="Peels">
<label for="checkbox81">Peels</label>
</div>
<div class="checkbox">
<input id="checkbox82" type="checkbox" name="astheti_product_and_service[]" value="Micro Needling">
<label for="checkbox82">Micro Needling</label>
</div>
</div>

<div class="col-sm-4">
<div class="checkbox">
<input id="checkbox83" type="checkbox" name="astheti_product_and_service[]" value="Skin Care Retnol / Vite / Full Regime">
<label for="checkbox83">Skin Care Retnol / Vite / Full Regime</label>
</div>
<div class="checkbox">
<input id="checkbox84" type="checkbox" name="astheti_product_and_service[]" value="Laser">
<label for="checkbox84">Laser</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox">
<input id="checkbox85" type="checkbox" name="astheti_product_and_service[]" value="Other Asthetic Services">
<label for="checkbox85">Other Asthetic Services</label>
</div>
</div>
</div>
</div>
</div>

<!------------------------- Vi - Peel Service ---------------------------->

<div id="Vi-Peel" style="display:none;">
<div class="form-group row">
<label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
<label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control">Vi-Peel</label>
</div>
<hr style="background-color:grey;height: 1px;">
<div class="fillerform">
<div class="col-sm-6">
      <div class="checkbox">
      <input id="checkbox86" type="checkbox" class="vi-peel" name="vi-peel">
      <label for="checkbox86">Check this for select</label>
      </div>
      </div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Purpose</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox87" type="checkbox" checked="" name="vi-peel-purpose[]" value="Fine lines">
<label for="checkbox87">Fine lines</label>
</div>
<div class="checkbox">
<input id="checkbox88" type="checkbox" name="vi-peel-purpose[]" value="Melasma">
<label for="checkbox88">Melasma</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox89" type="checkbox" name="vi-peel-purpose[]" value="Pigment">
<label for="checkbox89">Pigment</label>
</div>
<div class="checkbox">
<input id="checkbox90" type="checkbox" name="vi-peel-purpose[]" value="Acne">
<label for="checkbox90">Acne</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox91" type="checkbox" name="vi-peel-purpose[]" value="Sun Damage">
<label for="checkbox91">Sun Damage</label>
</div>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Skin Type</b></label>
<div class="col-sm-4">
<input type="text" name="vi-peel_skn_type" class="form-control" placeholder="Skin type">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Primed</b></label>
<label class="col-sm-2 col-form-label">Retnol</label>
<input type="text" name="vi-peel_primed_retnol" class="col-sm-3 form-control" placeholder="Enter Retnol">
<label class="col-sm-2 col-form-label">HQ</label>
<input type="text" name="vi-peel_primed_hq" class="col-sm-3 form-control" placeholder="Enter Retnol">
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Skin care products at home</b></label>
<div class="col-sm-4">
<input type="text" name="vi-peel_skin_care" class="form-control" placeholder="Skin Care">
</div>
</div>
<hr>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Prior Peeling History</b></label>
<div class="col-sm-4">
<input type="text" name="vi-peel_prior_history" class="form-control" placeholder="Peeling History">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Prior Peeling Complications</b></label>
<div class="col-sm-4">
<input type="text" name="vi-peel_prior_complications" class="form-control" placeholder="Peeling Complications">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Recent</b></label>
<label class="col-sm-2 col-form-label">Laser</label>
<input type="text" name="vi-peel_laser" class="col-sm-3 form-control" placeholder="Recent Laser">
<label class="col-sm-2 col-form-label">Peel</label>
<input type="text" name="vi-peel_recent_peet" class="col-sm-3 form-control" placeholder="Recent Peel">
</div>
<hr>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Peel Details</b></label>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox92" type="checkbox" checked="" name="vi-peel-details[]" value="VI">
<label for="checkbox92">VI</label>
</div>
<div class="checkbox">
<input id="checkbox93" type="checkbox" name="vi-peel-details[]" value="VIA">
<label for="checkbox93">VIA</label>
</div>
</div>

<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox94" type="checkbox" name="vi-peel-details[]" value="Purify">
<label for="checkbox94">Purify</label>
</div>
<div class="checkbox">
<input id="checkbox95" type="checkbox" name="vi-peel-details[]" value="P+">
<label for="checkbox95">P+</label>
</div>
</div>
<div class="col-sm-2">
<div class="checkbox">
<input id="checkbox96" type="checkbox" name="vi-peel-details[]" value="PP+">
<label for="checkbox96">PP+</label>
</div>
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Face</b></label>
<div class="col-sm-3 checkbox">
<input id="checkbox97" type="checkbox">
<label for="checkbox97">Number of Layers</label>
</div>
<input type="text" name="vi-peel_no_face_layer" class="col-sm-4 form-control" placeholder="Enter number of layers">
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Neck</b></label>
<div class="col-sm-3 checkbox">
<input id="checkbox98" type="checkbox">
<label for="checkbox98">Number of Layers</label>
</div>
<input type="text" name="vi-peel_no_Neck_layer" class="col-sm-4 form-control" placeholder="Enter number of layers">
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"><b>Any Area</b></label>
<div class="col-sm-3 checkbox">
<input id="checkbox99" type="checkbox">
<label for="checkbox99">Number of Layers</label>
</div>
<input type="text" name="vi-peel_no_anyarea_layer" class="col-sm-4 form-control" placeholder="Enter number of layers">
</div>
<hr>
<div class="form-group row">
<div class="col-sm-2">
</div>
<div class="col-sm-8">
<div class="checkbox">
<input id="checkbox100" type="checkbox" checked="" name="vi-peel_Discuss_Post" value="Discuss Post Care">
<label for="checkbox100">Discuss Post Care</label>
</div>
<div class="checkbox">
<input id="checkbox101" type="checkbox" name="vi-peel_Discuss_Priming" value="Discuss Priming">
<label for="checkbox101">Discuss Priming</label>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-sm-2">
</div>
<div class="col-sm-3">
<div class="checkbox">
<input id="checkbox102" type="checkbox" checked="" name="vi-peel_Retnol" value="Retnol">
<label for="checkbox102">Retnol</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox">
<input id="checkbox103" type="checkbox" name="vi-peel_HQ" value="HQ">
<label for="checkbox103">HQ</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox">
<input id="checkbox104" type="checkbox" checked="" name="vi-peel_VI+E" value="VI+E">
<label for="checkbox104">VI+E</label>
</div>
</div>
</div>
</div>
</div>

<!-------------------- Tattoo Services Start ------------------------------>

    <div id="Tattoo" style="display:none;">
    <div class="form-group row">
    <label style="font-size: 16px;font-weight: 2px;" class="col-sm-3 col-form-label"><b>Service Name</b></label>
    <label style="border: none;font-size: 16px;color:navy;" class="col-sm-3 form-control"><?= $sdata[0]['service_name']?></label>
    </div>
    <hr style="background-color:grey;height: 1px;">
    <div class="fillerform">
    <div class="col-sm-6">
    <div class="checkbox">
    <input id="checkbox105" type="checkbox" class="tattoo" name="tatoo">
    <label for="checkbox105">Check this for select</label>
    </div>
    </div>
    <div class="form-group row">
    <h4>Information</h4>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Size</b></label>
    <input type="text" name="tatoo_size" class="form-control col-sm-4" placeholder="Enter Size">
    <label class="col-sm-2 col-form-label"><b>Area</b></label>
    <input type="text" name="tatoo_area" class="form-control col-sm-4" placeholder="Enter Area">
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Tattoo Type</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox106" type="radio" name="tattoo_type" value="Professional">
    <label for="checkbox106">Professional</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox106" type="radio" name="tattoo_type" checked="" value="Others">
    <label for="checkbox106">Others</label>
    </div>
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Color</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox107" type="checkbox" checked="" name="tattoo_color[]" value="Black">
    <label for="checkbox107">Black</label>
    </div>
    <div class="checkbox">
    <input id="checkbox108" type="checkbox" name="tattoo_color[]" value="Red">
    <label for="checkbox108">Red</label>
    </div>
    </div>

    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox109" type="checkbox" name="tattoo_color[]" value="Yellow">
    <label for="checkbox109">Yellow</label>
    </div>
    <div class="checkbox">
    <input id="checkbox110" type="checkbox" name="tattoo_color[]" value="Blue">
    <label for="checkbox110">Blue</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox111" type="checkbox" name="tattoo_color[]" value="Orange">
    <label for="checkbox111">Orange</label>
    </div>
    <div class="checkbox">
    <input id="checkbox112" type="checkbox" name="tattoo_color[]" value="Green">
    <label for="checkbox112">Green</label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox113" type="checkbox" name="tattoo_color[]" value="Coverup">
    <label for="checkbox113">Coverup</label>
    </div>
    </div>
    </div>
    <hr>
    <div class="form-group row">
    <label class="col-sm-6 col-form-label"><b>Previous Treatment Prior to Our Clinic</b></label>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Skin Type</b></label>
    <input type="text" name="tattoo_skin_type" class="form-control col-sm-4" placeholder="Skin Type">
    </div>
    <hr>
    <div class="form-group row">
    <h4>Treatment Details</h4>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label"><b>Treatment Number</b></label>
    <input type="text" name="tattoo_treat_no" class="form-control col-sm-4" placeholder="Enter treatment number">
    <label class="col-sm-2 col-form-label"><b>Patch Used</b></label>
    <div class="col-sm-2">
    <div class="checkbox">
    <input id="checkbox114" type="radio" name="patch" checked="" value="Yes">
    <label for="checkbox114">Yes</label>
    </div>
    <div class="checkbox">
    <input id="checkbox114" type="radio" name="patch" value="No">
    <label for="checkbox114">No</label>
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
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_perform_area1" class="form-control" placeholder="Enter Area">
    </td>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_passage_1_1" class="form-control" placeholder="Enter Passage"></td>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_passage_1_2" class="form-control" placeholder="Enter Passage"></td>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_passage_1_3" class="form-control" placeholder="Enter Passage"></td>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_passage_1_4" class="form-control" placeholder="Enter Passage"></td>
    </tr>
    <tr>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px;"><input type="text" name="tattoo_perform_area2" class="form-control" placeholder="Enter Area">
    </td>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_passage_1_1" class="form-control" placeholder="Enter Passage"></td>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_passage_2_1" class="form-control" placeholder="Enter Passage"></td>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_passage_3_1" class="form-control" placeholder="Enter Passage"></td>
    <td style="border-color:#b1b3b5;border-style: solid;border-width:1px; "><input type="text" name="tattoo_passage_4_1" class="form-control" placeholder="Enter Passage"></td>
    </tr>
    <tr>
    <td colspan="5">
        <a href="#">Add One More Row</a>
    </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-3 col-form-label"><b>Any area</b></label>
    <input name="any_area" class="col-sm-4 form-control" placeholder="Any area"></textarea>
    </div>

    <div class="form-group row">
    <label class="col-sm-3 col-form-label"><b>Amt</b></label>
    <div class="col-sm-4">
    <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>
    <input type="number" name="bamount" id="bamount" class="form-control" placeholder="Amount">  
    </div>
    </div>

    <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Additional comments</b></label>
    <div class="col-sm-4">
    <textarea rows="3" cols="70" name="comments" class="form-control" placeholder="Enter text here...">
    </textarea>
    </div>
    </div>
    <br>

    <!---edit here/////////////////////////-->
    <!--data to comment-->
    <fieldset class="form-group">
    <div class="row">
    <label class="col-form-label col-sm-3 pt-0">Add More Services<h6>One Day visit</h6></label>
    <div class="col-sm-2">
    <div class="radio">
    <input type="radio" name="group_on" class="more_s" id="gridRadios5" value="yes" >
    <label for="gridRadios5">
        Yes
    </label>
    </div>
    </div>
    <div class="col-sm-2">
    <div class="radio">
    <input type="radio" name="group_on" class="more_n" id="gridRadios6" value="no" checked>
    <label for="gridRadios6">
        No
    </label>
    </div>
    </div>
    </div>
    </fieldset>





    <div class="form-group row" id="add_more_services" style="display: none;">
    <label class="col-sm-3 col-form-label"><b>ADD SERVICES</b></label>
    <select class="col-sm-3 form-control getservice" id="location_html" onchange="location_html = this.value;">
    <option hidden value="">Select New Service</option>
    <?php
    foreach($allservices as $service)
    {
        if($service->sid!=$sdata[0]['sid'])
        {
    ?>
    <option value="<?= $service->sid?>"><?=$service->service_name?></option>
    <?php
        }
     }
    ?>
    </select>
    </div>
    <!--data to comment-->
    <!---edit here/////////////////////////-->


    <!--total data edit-->
    <div id="dataDisplay" >
    <div class="form-group row"  class="form-group row"  >
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
    <input type="text" name="damount" id="damount" class="form-control" placeholder="Discount">
    </div>
    </div>


    <div class="form-group row">
    <label class="col-sm-3 col-form-label"><b>Promo Code</b></label>
    <input type="text" name="promo" class="col-sm-4 form-control" placeholder="Promo Code">
    </div>

    </div>

    <!--total data edit-->
    <br>
    <div class="" id="service_pages"></div>
    <br>
    <div class="form-group row" id="more_btn">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4" id="cansavebtn">
    <a href="<?=base_url()?>patients/allpatients" name="cancel" class="btn btn-danger">Cancel</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="sub_form" class="btn btn-primary" value="Submit">
    </div>
    <div class="col-sm-4"></div>
    </div>
    </div>
    <?=form_close()?>
</div>
</div>
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script type="text/javascript">

    $('#cheek_applied_side').change(function(){ 
    $("#cheeks_ssid").val('5');
    
  })

    $('#temple_applied_side').change(function(){ 
    $("#temple_ssid").val('6');
    
  })

    $('#lips_applied_side').change(function(){ 
    $("#lips_ssid").val('7');
    
  })

    $('#chin_applied_side').change(function(){ 
    $("#chin_ssid").val('8');
    
  })

    $('#mandible_applied_side').change(function(){ 
    $("#mandible_ssid").val('9');
    
  })

    $('#orbital_applied_side').change(function(){ 
    $("#orbital_ssid").val('10');
    
  })
    

    $('#nose_applied_side').change(function(){ 
    $("#nose_ssid").val('11');
    
  })
    

    $('#forehead_applied_side').change(function(){ 
    $("#forehead_ssid").val('12');
    
  })

    $('#smile_lines_applied_side').change(function(){ 
    $("#smile_lines_ssid").val('13');
    
  })
  </script>
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
if(parseInt(tqty)<parseInt(cqty)){
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
  var f_dis= (cal_dis * 100)/parseInt(bamount);
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
<script type="text/javascript">


$('#sub_srv_fun').change(function(){ 
   var ssid = $(this).val();//debugger;
    var get_product = $(this);
    var product=get_product[0].selectedOptions[0].innerText;
    $("#product_names").val(product);

   if(ssid=='4'){
    var mm=$("input[type='radio']");

    for(var i=0;i<mm.length;i++){

    var units=(mm[i].value) * 3;
    mm[i].value=units;
    if(i==6){ 
    units='(3+12+12+12+3)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }

    if(i==7){  
    units='(6+9+12+9+6)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }

    if(i==8){ 
    units='(3+9+9+9+9)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }

    if(i==9){ 
    units='(6+9+9+6)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }

    if(i==10){ 
    units='(6+15+18+15+6)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }
   
   if(i==11){ 
    units='(9+9)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }
    
    if(i<6 || i>11){
     var html=mm[i].parentElement.outerHTML;
    var res = html.split("<br>");
    var html_set=res[0]+"<br>"+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;   
    }
    

}

}else{ //debugger;
    
   var flag=false;
    var mm=$("input[type='radio']");

    for(var i=0;i<mm.length;i++){
   
    if(mm[i].value=='6'){
     flag=true;
    }
    if(mm[i].value=='18'){
     flag=false;
    }
    if(flag==false){

       var units=(mm[i].value) / 3;
    mm[i].value=units;
    if(i==6){ 
    units='(1+4+4+4+1)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }

    if(i==7){  
    units='(2+3+4+3+2)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }

    if(i==8){ 
    units='(1+3+3+3+1)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }

    if(i==9){ 
    units='(2+3+3+2)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }

    if(i==10){ 
    units='(2+5+6+5+2)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }
   
   if(i==11){ 
    units='(3+3)';
    var html=mm[i].parentElement.outerHTML;
    var res = html.split("(");
    var html_set=res[0]+""+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;
    }
    
    if(i<6 || i>11){
    if(flag==false){
     var html=mm[i].parentElement.outerHTML;
    var res = html.split("<br>");
    var html_set=res[0]+"<br>"+units+"</td>";
    mm[i].parentElement.outerHTML=html_set;     
    }
     
    }

    }

   
    

}
}
});


// function Disc_cal() { //debugger;
//   $("#discount").val(''); 
//   var netAmt= $("#namount").val(); 
//   var Amt= $("#amount").val(); 
//   if(parseInt(Amt) > parseInt(netAmt)){
//     var dis_amt=parseInt(Amt) - parseInt(netAmt);
//  // var dis_per=parseInt(Amt) / (dis_amt);
//   var f_dis= (dis_amt / parseInt(Amt)) * 100;
//   var dis=f_dis.toFixed(2);
//   $("#discount").val(dis);

//   }
//   }

$("input[type='radio']").change(function() {debugger;
    var mm=$(this);
    var chk=false;
    var selected_data=mm[0].value;
    if(selected_data=='yes'){
     chk=true;
     $("#add_more_services").show( );
     //$("#dataDisplay,#cansavebtn").hide() ;  //vmedit
    }

    if(selected_data=='no'){
    chk=true;
    $("#add_more_services").hide();
    $("#dataDisplay,#cansavebtn").show() ;  //vmedit original
    //$("#dataDisplay").hide() ;

    }
    var check_sub_service = $("#sub_srv_fun").val();
    var qty = '';
    if(check_sub_service !='' && chk==false){
            var cal='';
    var net='';
    var old_amt='';
    var mm=$(this);
    var selected_data=mm[0].value;

    var sal_cost=$("#product_selling_cost").val();
    net=sal_cost;
    var amt=$("#bamount").val();
    if(amt!=""){
     old_amt=amt;
     cal=selected_data * sal_cost;
     net=parseInt(cal) + parseInt(old_amt);
      $("#qty").val((parseInt(cal)/parseInt(sal_cost)) + parseInt(old_amt)/parseInt(sal_cost));
    }else{
       cal=selected_data * sal_cost;
        net=parseInt(cal);// + parseInt(cal);

        $("#qty").val(selected_data);
    }
    $("#bamount").val(net);
    }else{ //debugger;
        if(chk!=true){
                 alert("Please Select Sub Service");

     var mm=$(this);
     mm[0].checked=false;
        }

    // $(this).checked = false;


    }


})

$('#sub_srv_fun').change(function(){
  // debugger
   var ssid = $('#sub_srv_fun').val();
   var sid = $('#sid').val();
   //'neurotoxin';
   var url=document.URL;
   var res = url.split("neurotoxin");
   var Url=res[0];
   //product_selling_cost
   $.ajax({
     url:Url+'get_inventory_data_by_service_and_product',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {sid: sid,ssid: ssid},
     dataType: 'json',
     success: function(response){
     //debugger;
     if(response){
     $("#product_selling_cost").val(response.current_sell_cost);   
     }
     
     }

    });
});
$(document).ready(function() {
  $(".miradryadd").on('click', function() {
    if ($('.miradryadd:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".laser-treatment").on('click', function() {
    if ($('.laser-treatment:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {

    if ($('.rfal:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });

$(document).ready(function() {
  $(".rf").on('click', function() {
    if ($('.rf:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".rfmn").on('click', function() {
    if ($('.rfmn:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".coolsculpting").on('click', function() {
    if ($('.coolsculpting:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".thread-lifts").on('click', function() {
    if ($('.thread-lifts:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".contoura").on('click', function() {
    if ($('.contoura:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".sculptra-butt").on('click', function() {
    if ($('.sculptra-butt:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".sculptra-face").on('click', function() {
    if ($('.sculptra-butt:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".vi-peel").on('click', function() {
    if ($('.vi-peel:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".asthetic-services").on('click', function() {
    if ($('.asthetic-Services:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".tattoo").on('click', function() {
    if ($('.tattoo:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});


$(document).ready(function() {
  $(".package").on('click', function() {
    if ($('.package:checked')) {
      var oldamm = $('#bamount').val();
      var mira = 100;
      var fields = (+oldamm) + (+mira);
      //$('#bamount').append( fields.value );
      $("#bamount").val(fields);
    }else{
        $("#bamount").val(oldamm);
    }
    });
});
$(document).ready(function() {
  $(".more_s").on('click', function() {
    if ($('.more_s:checked')) {
        $("#dataDisplay").hide();
        $("#more_btn").hide();
     }
    });
});
$(document).ready(function() {
  $(".more_n").on('click', function() {
    if ($('.more_n:checked')) {
       $("#more_btn").show();
     }
    });
});

// $('#location_html').change(function(e){ //debugger;
//   var data = $("#location_html").val();
//   var url=document.URL;
//   var get_url=url.split("patients");
//   var Url=get_url[0];
//   var res = data.split("/");
//    var pid=res[0];
//    var sid=res[1];
 
//    $.ajax({
//      url:Url+'patients/serviceOnPatient/'+pid+'/'+sid,//baseURL+'index.php/user/userDetails',
//      method: 'get',
//      success: function(response){

//      $("#service_pages").append(response); //debugger;
//      $("#filler_ids"). attr('class', 'page-container1');
    
     
//      }

//     });

// });

$(document).ready(function(){
    $("#rdo input[type=radio]:checked").each(function() { debugger;
        var value = $(this).val();
    });
});
// $('#location_html').change(function(){
   
//   var sid = $('#location_html').val();
//   alert(sid);
//   $.ajax({
//      url:baseURL+'patients/getsuservices',//baseURL+'index.php/user/userDetails',
//      method: 'POST',
//      data: {sid: sid},
//      dataType: 'json',
//      success: function(response){
//      //debugger;
//      }

//     });
// });
jQuery(document).ready(function($){
                $(".getservice").on("change",function(){
                    var myId = $(this).val();
                        //alert( myId );
                        $.ajax({
                            url: "<?=base_url('patients/getsuservices')?>",
                            type: "POST",
                            data: { "sid": myId },
                            success: function(data){
                                debugger;
                                var returnedData = JSON.parse(data);
                                //alert(returnedData.success);
                                //console.log(returnedData);
                            if(returnedData.status == "success"){
                                $.each(returnedData, function (i, p) {
                                  $('#rfaldevice').append($('<option></option>').val(p.ssid).html(p.sub_service_name));
                                });
                                }else{
                                    toastr.error("Someone went wrong");
                                }
                                location.reload(true);  
                            },
                            error: function(){
                                //do action
                            }
                        });
                
                });
            });
// jQuery(document).ready(function($){
//                 $(".getservice").on("change",function(){
//                     var myId = $(this).val();
//                      alert( myId );
//                      $.ajax({
//                          url: "<?=base_url('patients/getsuservices')?>",
//                          type: "POST",
//                          data: { "sid": myId },
//                          success: function(data){
//                              var returnedData = JSON.parse(data);
//                              alert(returnedData.success);
//                              console.log(returnedData);
//                          if(returnedData.status == "success"){
//                              alert('fffff');
//                              $.each(returnedData, function (i, p) {
//                                   $('#selectSkill').append($('<option></option>').val(p.ssid).html(p.sub_service_name));
//                                 });
//                          //  location.reload(true);  
//                          },
//                          error: function(){
//                              //do action
//                          }
//                      });
                
//                 });
//             });

$("select[id=location_html]").on('change', function(){
     console.log("change");
     var target = $('#location_html option:selected').val();
     console.log("selected value= "+target);
     if(target == "1/2")
    $("#newservices").show(selectedEffect, options, 500, callback );
   // $("#newservices").append(filer);
    $("#cansavebtn").show();
});
$('#location_html').on('change', function() {
   // alert( this.value ); // or $(this).val()
     if(this.value == "2") {
       $('#filler').show();
     }
     if(this.value == "3"){
       $('#miradry').show();
     }
     if(this.value == "4") {
       $('#rfal').show();
      }
     if(this.value == "1"){
       $('#newservices').show();
     }
     if(this.value == "6"){
       $('#rfmn').show();
     }
     if(this.value == "7") {
       $('#laser-treatment').show();
      }
     if(this.value == "8"){
       $('#Coolsculpting').show();
     }
     if(this.value == "9"){
       $('#Contoura').show();
     }
     if(this.value == "10") {
       $('#Thread-Lifts').show();
      }
     if(this.value == "12"){
       $('#Sculptra-Butt').show();
     }
     if(this.value == "13"){
       $('#Sculptra-Face').show();
     }
     if(this.value == "14"){
       $('#Vi-Peel').show();
     }
     if(this.value == "15"){
       $('#Asthetic-Services').show();
     }
     if(this.value == "16"){
       $('#Tattoo').show();
     }
     if(this.value == "17"){
       $('#Package').show();
     }
     if(this.value == "17"){
       $('#').show();
     }
   });
</script>