<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?=base_url()?>assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('<?=base_url()?>assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100000">
                    <div class="row align-items-center w-100">
                        <div class="col-md- 8col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="<?=base_url()?>assets/logo/Transparent-Logo-Forever-MedSpa.png" hight="40%" width="60%">
                                        <h2 class="m-b-0">Sign In</h2>
                                    </div>
                                   
                                             
                                    <?=form_open('register/save_patient_registration')?>
                                        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Patient's Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="pname" placeholder="Patient's Name" required>
        </div>
        <?=form_error('pname','<div class="text-danger">','</div>')?>
    </div>
                                        <div class="form-group row">
        <label for="inputEmail4" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="phone" id="inputEmail4" placeholder="Phone Number" required>
        </div>
        <?=form_error('phone','<div class="text-danger">','</div>')?>
    </div>
                                       <div class="form-group row">
        <label for="inputEmail5" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" id="inputEmail5" placeholder="Email"required>
        </div>
        <?=form_error('email','<div class="text-danger">','</div>')?>
    </div>

<!--<div class="form-group row">-->
<!--        <label for="inputEmail7" class="col-sm-2 col-form-label">password</label>-->
<!--        <div class="col-sm-6">-->
<!--            <input type="password" class="form-control" name="password" id="password" placeholder="password">-->
<!--        </div>-->
<!--        <?=form_error('password','<div class="text-danger">','</div>')?>-->
<!--    </div>-->

    <!-- <div class="form-group row">-->
    <!--    <label for="inputEmail3" class="col-sm-2 col-form-label">Date Of Birth</label>-->
    <!--    <div class="col-sm-6">-->
    <!--        <div class="input-group mb-3">-->
    <!--<input type="date" class="form-control" placeholder="Age" name="age" aria-label="Recipient's username" aria-describedby="basic-addon2">-->
    <!--<div class="input-group-append">-->
    <!--    <span class="input-group-text" id="basic-addon2">DOB</span>-->
        
    <!--</div>-->
    <!--    </div>-->
    <!--    </div>-->
    <!--    <?=form_error('age','<div class="text-danger">','</div>')?>-->
    <!--</div>-->
    <!--   <fieldset class="form-group">-->
    <!--    <div class="row">-->
    <!--        <label class="col-form-label col-sm-2 pt-0">Gender</label>-->
    <!--        <div class="col-sm-2">-->
    <!--            <div class="radio" required>-->
    <!--                <input type="radio" name="gender" id="gridRadios1" value="male" checked>-->
    <!--                <label for="gridRadios1">-->
    <!--                    Male-->
    <!--                </label>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--            <div class="col-sm-2">-->
    <!--            <div class="radio">-->
    <!--                <input type="radio" name="gender" id="gridRadios2" value="female">-->
    <!--                <label for="gridRadios2">-->
    <!--                    Female-->
    <!--                </label>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</fieldset>-->
    <!--<div class="form-group row">-->
    <!--    <label for="inputEmail03" class="col-sm-2 col-form-label">Client Allergy</label>-->
    <!--    <div class="col-sm-6">-->
    <!--        <input type="text" class="form-control" name="allergy" id="inputEmail03" placeholder="Client Allergy">-->
    <!--    </div>-->
    <!--    <?=form_error('allergy','<div class="text-danger">','</div>')?>-->
    <!--</div>-->
    <!--<div class="form-group row">-->
    <!--    <label for="inputEmail003" class="col-sm-2 col-form-label">PMH</label>-->
    <!--    <div class="col-sm-6">-->
    <!--        <input type="text" class="form-control" name="pmh" id="inputEmail003" placeholder="PMH">-->
    <!--    </div>-->
    <!--    <?=form_error('pmh','<div class="text-danger">','</div>')?>-->
    <!--</div>-->
    <!--<div class="form-group row">-->
    <!--    <label for="inputEmail0003" class="col-sm-2 col-form-label">PSH</label>-->
    <!--    <div class="col-sm-6">-->
    <!--        <input type="text" class="form-control" name="psh" id="inputEmail0003" placeholder="PSH">-->
    <!--    </div>-->
    <!--    <?=form_error('psh','<div class="text-danger">','</div>')?>-->
    <!--</div>-->
    
    <!-- <div class="form-group row">-->
    <!--    <label for="inputEmail00003" class="col-sm-2 col-form-label">Prefer Method Contact</label>-->
    <!--    <div class="col-sm-6">-->
    <!--        <select class="form-control" name="perferfrom" id="inputEmail00003">-->
    <!--            <option value="" hidden>------Select Perfer Method-------</option>-->
    <!--            <option>Email</option>-->
    <!--            <option>Phone number</option>-->
               
    <!--        </select>-->
    <!--    </div>-->
    <!--    <?=form_error('perferfrom','<div class="text-danger">','</div>')?>-->
    <!--</div>-->
    

    <!--<div class="form-group row">-->
    <!--    <label for="inputEmail00003" class="col-sm-2 col-form-label">Source of Contact</label>-->
    <!--    <div class="col-sm-6">-->
    <!--        <select class="form-control" name="sourcefrom" id="inputEmail00003">-->
    <!--            <option value="" hidden>------Select How They Come--------</option>-->
    <!--            <option>As existing client</option>-->
    <!--            <option>Saw groupon advertisement</option>-->
    <!--            <option>Has groupon</option>-->
    <!--            <option>Instagram Promo</option>-->
    <!--            <option>Google advertisement</option>-->
    <!--            <option>Word of mouth</option>-->
    <!--        </select>-->
    <!--    </div>-->
    <!--    <?=form_error('sourcefrom','<div class="text-danger">','</div>')?>-->
    <!--</div>-->

    <!--<div class="form-group row">-->
    <!--    <label for="inputPassword093" class="col-sm-2 col-form-label">Any Comment</label>-->
    <!--    <div class="col-sm-6">-->
    <!--        <textarea class="form-control" name="comment" id="inputPassword093" placeholder="Write a comment...."></textarea>-->
    <!--    </div>-->
    <!--    <?=form_error('comment','<div class="text-danger">','</div>')?>-->
    <!--</div>-->
 
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
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">Copyright © 2020 Forever MedSpa. All rights reserved.</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="<?=base_url()?>assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="<?=base_url()?>assets/js/app.min.js"></script>

</body>

</html>