<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Patient's Registration</h4> 
<div class="m-t-25">
<?=form_open('patients/saveregistration')?>
    <!-- Default Datepicker--
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-6">
    <div class="input-affix m-b-10">
        <i class="prefix-icon anticon anticon-calendar"></i>
        <input type="text" class="form-control datepicker-input" placeholder="Pick a date">
    </div>
    </div>
    </div>-->

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Patient's Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="pname" placeholder="Patient's Name">
        </div>
        <?=form_error('pname','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail4" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="phone" id="inputEmail4" placeholder="Phone Number">
        </div>
        <?=form_error('phone','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail5" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" id="inputEmail5" placeholder="Email">
        </div>
        <?=form_error('email','<div class="text-danger">','</div>')?>
    </div>
     <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-6">
            <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Age" name="age" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">Years</span>
    </div>
        </div>
        </div>
        <?=form_error('age','<div class="text-danger">','</div>')?>
    </div>
       <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-2 pt-0">Gender</label>
            <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="gender" id="gridRadios1" value="male" checked>
                    <label for="gridRadios1">
                        Male
                    </label>
                </div>
            </div>
                <div class="col-sm-2">
                <div class="radio">
                    <input type="radio" name="gender" id="gridRadios2" value="female">
                    <label for="gridRadios2">
                        Female
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <!-- <div class="form-group row">
        <label for="inputEmail03" class="col-sm-2 col-form-label">Client Allergy</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="allergy" id="inputEmail03" placeholder="Client Allergy">
        </div>
        <?//=form_error('allergy','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail003" class="col-sm-2 col-form-label">PMH</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="pmh" id="inputEmail003" placeholder="PMH">
        </div>
        <?//=form_error('pmh','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail0003" class="col-sm-2 col-form-label">PSH</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="psh" id="inputEmail0003" placeholder="PSH">
        </div>
        <?//=form_error('psh','<div class="text-danger">','</div>')?>
    </div> -->

    <!-- <div class="form-group row">
        <label for="inputEmail00003" class="col-sm-2 col-form-label">Source of Contact</label>
        <div class="col-sm-6">
            <select class="form-control" name="sourcefrom" id="inputEmail00003">
                <option value="" hidden>------Select How They Come--------</option>
                <option>As existing client</option>
                <option>Saw groupon advertisement</option>
                <option>Has groupon</option>
                <option>Instagram Promo</option>
                <option>Google advertisement</option>
                <option>Word of mouth</option>
            </select>
        </div>
        <?=form_error('sourcefrom','<div class="text-danger">','</div>')?>
    </div> -->

    <div class="form-group row">
        <label for="inputPassword093" class="col-sm-2 col-form-label">Any Comment</label>
        <div class="col-sm-6">
            <textarea class="form-control" name="comment" id="inputPassword093" placeholder="Write a comment...."></textarea>
        </div>
        <?=form_error('comment','<div class="text-danger">','</div>')?>
    </div>
 
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