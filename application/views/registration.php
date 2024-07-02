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
                              <div class="m-b-30">
                                 <img class="img-fluid" alt="" src="<?=base_url()?>assets/logo/Transparent-Logo-Forever-MedSpa.png" style="height:50%; width:50%">
                                 
                                 <h2 class="m-b-0">Registration</h2>
                              </div>
                              <?=form_open('register/saveregistration')?>
                              <div class="form-group row">
                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Patient's Name</label>
                                 <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="pname" placeholder="Patient's Name" required>
                                 </div>
                                 <?=form_error('pname','<div class="text-danger">','</div>')?>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEmail4" class="col-sm-3 col-form-label">Phone Number</label>
                                 <div class="col-sm-9">
                                    <input type="number" class="form-control" name="phone" id="inputEmail4" placeholder="Phone Number" required>
                                 </div>
                                 <?=form_error('phone','<div class="text-danger">','</div>')?>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEmail5" class="col-sm-3 col-form-label">Email</label>
                                 <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="inputEmail5" placeholder="Email"required>
                                 </div>
                                 <?=form_error('email','<div class="text-danger">','</div>')?>
                              </div>
                           
                              <fieldset class="form-group">
                                 <div class="row">
                                    <label class="col-form-label col-sm-3 pt-0">Gender</label>
                                    <div class="col-sm-2">
                                       <div class="radio" required>
                                          <input type="radio" name="gender" id="gridRadios1" value="male" checked>
                                          <label for="gridRadios1">
                                          Male
                                          </label>
                                       </div>
                                    </div>
                                    <div class="col-sm-3">
                                       <div class="radio">
                                          <input type="radio" name="gender" id="gridRadios2" value="female">
                                          <label for="gridRadios2">
                                          Female
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </fieldset>
                              
                              <div class="form-group row">
                                 <div class="col-sm-3">
                                 </div>
                                 <div class="col-sm-9">
                                    <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
                                 </div>
                                
                              </div>
                              <?=form_close()?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="d-none d-md-flex p-h-40 justify-content-between">
                  <span class="">Copyright © <?=date('Y')?> Forever MedSpa. All rights reserved.</span>
                  <ul class="list-inline">
                     <li class="list-inline-item">
                        <a class="text-dark text-link" href="#">Legal</a>
                     </li>
                     <li class="list-inline-item">
                        <a class="text-dark text-link" href="#">Privacy</a>
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