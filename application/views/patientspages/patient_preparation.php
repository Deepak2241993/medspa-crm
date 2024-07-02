<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Patient's Preparation General Form</h4> 
<div class="m-t-25">
<?=form_open('patients/savepatient_preparation')?>
    
    <br/>
    <h6 style="text-left: center;color: blue;">Fill Missing Information : </h6> 
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Patient's Name</label>
        <div class="col-sm-6">
         <select name="pname" class="form-control"  id="pname" required>
              <option value=""> SELECTED </option>
              <?php if(!empty($patients_list)){
                    foreach($patients_list as $patients){?>
                        <option value="<?= $patients->pid?>"><?= $patients->pname?></option>
                    <?php }} ?>
            </select>
        </div>
        <?=form_error('pname','<div class="text-danger">','</div>')?>
    </div>


    <div class="form-group row">
        <label for="inputEmail4" class="col-sm-3 col-form-label">Phone Number</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number">
        </div>
        <?=form_error('phone','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail5" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        <?=form_error('email','<div class="text-danger">','</div>')?>
    </div>



   <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm What Procedure Is Being Requested </label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="pbeingreqst" placeholder="Confirm What Procedure is being requested">
        </div>
        <?=form_error('pbeingreqst','<div class="text-danger">','</div>')?>
    </div>

<fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Patient Consent</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="consent" id="gridRadios1" value="yes" checked>
                    <label for="gridRadios1">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="consent" id="gridRadios2" value="no">
                    <label for="gridRadios2">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

 <br/>
    <h6 style="text-left: center;color: blue;">Patient Picture : </h6> 
<div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Botax Picture Via Ipad/Software </label>
        <div class="col-sm-6">
            <input class="form-control" type="file" id="myFile1" name="botex_pic" placeholder="Botax Picture via ipad/software">
        </div>
        <?=form_error('botex_pic','<div class="text-danger">','</div>')?>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Filler Picture With Commerce </label>
        <div class="col-sm-6">
            <input class="form-control" type="file" id="myFile2" name="filler_pic" placeholder="Filler Picture with Commerce">
        </div>
        <?=form_error('filler_pic','<div class="text-danger">','</div>')?>
    </div>
 <br/>
<fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Have They Performed Any Other From Us</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="performed" id="gridRadios3" value="yes" checked>
                    <label for="gridRadios3">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="performed" id="gridRadios4" value="no">
                    <label for="gridRadios4">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

    <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Do They Have Any Groupon</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="group_on" id="gridRadios5" value="yes" checked>
                    <label for="gridRadios5">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="group_on" id="gridRadios6" value="no">
                    <label for="gridRadios6">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

     <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Discuss Pricing Deals</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="pdeals" id="gridRadios13" value="yes" checked>
                    <label for="gridRadios13">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="pdeals" id="gridRadios14" value="no">
                    <label for="gridRadios14">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

     <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Procedure Information</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="pinfo" id="gridRadios15" value="yes" checked>
                    <label for="gridRadios15">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="pinfo" id="gridRadios16" value="no">
                    <label for="gridRadios16">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

<!-- <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Procedure Information Brief Other Instructions And How To Obtain Details

</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="pinst_obt_details" placeholder="instructions and how to obtain details">
        </div>
        <?=form_error('pinst_obt_details','<div class="text-danger">','</div>')?>
    </div> -->

  <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Procedure Information Brief Other Instructions And How To Obtain Details</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="pr_inf_brief" id="gridRadios17" value="yes" checked>
                    <label for="gridRadios17">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="pr_inf_brief" id="gridRadios18" value="no">
                    <label for="gridRadios18">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>






    <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Aspir / All Registration Links Directly From Software To Text or Email</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="textormail" id="gridRadios7" value="yes" checked>
                    <label for="gridRadios7">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="textormail" id="gridRadios8" value="no">
                    <label for="gridRadios8">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

      <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Process Filter Picture</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="filter_pic" id="gridRadios9" value="yes" checked>
                    <label for="gridRadios9">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="filter_pic" id="gridRadios10" value="no">
                    <label for="gridRadios10">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

   <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-3 pt-0">Any Future Interests </label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="filter_pi" id="gridRadios11" value="yes" checked>
                    <label for="gridRadios11">
                        Yes
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="filter_pi" id="gridRadios12" value="no">
                    <label for="gridRadios12">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

  
 
    <div class="form-group row">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-3">
            <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
        </div>
        <div class="col-sm-4">
        </div>
    </div>
<?=form_close()?>
</div>
</div>
</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
  <script src="<?=base_url()?>assets/js/ajax.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
  // Initialize select2
  $("#pname").select2();

  $('#pname').change(function(){
  
   var pid = $('#pname').val();
   //$('#typesub').empty('');
   $("#email").val('');
   $("#phone").val('');

   var urls=document.URL;
   var Urls = urls.split("patients_preparation_form");
  // console.log(urls);
   $.ajax({
     url:Urls[0]+'get_patient_data_by_id',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {pid: pid},
     dataType: 'json',
     success: function(response){
  
     if(response){
     $("#email").val(response.email);
     $("#phone").val(response.phone);
     }

      
     }
  });
  });
  });
  </script>