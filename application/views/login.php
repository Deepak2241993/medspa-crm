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

               <div class="container d-flex h-100">

                  <div class="row align-items-center w-100">

                     <div class="col-md-7 col-lg-5 m-h-auto">

                        <div class="card shadow-lg">

                           <div class="card-body">

                              <div class="d-flex align-items-center justify-content-between m-b-30">

                                 <centre>

                                 <img class="img-fluid" alt="" src="<?=base_url()?>assets/logo/Transparent-Logo-Forever-MedSpa.png" hight="40%" width="100%"></center>

                              </div>

                              <h2 class="m-b-0">Sign In</h2>

                              <?php

                                 if($this->session->has_userdata('status'))

                                 {

                                     ?>

                              <div class="alert alert-danger"><b>Failed : </b><?=$this->session->userdata('status')?></div>

                              <?php

                                 }

                                 ?>

                              <?php if($this->session->flashdata('msg')){

                                 echo $this->session->flashdata('msg');

                                 }?>

                              <?=form_open('AdminLogin/checklogin')?> 

                              <div class="form-group">

                                 <label class="font-weight-semibold" for="userName">User Type:</label>

                                 <?php echo form_error('usertype', '<div class="text-danger">', '</div>'); ?>

                                 <div class="input-affix">

                                    <i class="prefix-icon anticon anticon-dashboard"></i>

                                    <select class="form-control" name="usertype" id="userName" onchange="setuseremail(this)"; >

                                       <option value="">Select User Type</option>

                                       <option value="patient">Patient</option>

                                       <option value="Front Desk Representative">Front Desk</option>

                                       <option value="Provider">Provider</option>

                                       <option value="Admin">Admin</option>

                                    </select>

                                 </div>

                              </div>

                              <div class="form-group">

                                 <label class="font-weight-semibold" for="email" id="userlavel">Email:</label>

                                 <?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>

                                 <div class="input-affix">

                                    <i class="prefix-icon anticon anticon-user"></i>

                                    <input type="text" class="form-control" id="usersName" name="email" value="<?=set_value('email')?>" placeholder="Email">

                                 </div>

                              </div>

                              <div class="form-group">

                                 <label class="font-weight-semibold" for="password">Password:</label>

                                 <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>

                                 <div class="input-affix m-b-10">

                                    <i class="prefix-icon anticon anticon-lock"></i>

                                    <input type="password" class="form-control" name="password" value="<?=set_value('password')?>" id="password" placeholder="Password">

                                 </div>

                              </div>

                              <div class="form-group">

                                 <div class="row">

                                    <div class="col-md-4">

                                       <input type="submit" name="login" class="btn btn-primary" value="Sign In">

                                    </div>

                                 

                                    <div class="col-md-2">

                                    </div>

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

      <script>

         // function setuseremail(a){

         //    var type= a.value; 

         //    var input = document.getElementById ("IdofInput");

             

         //     if(type=='patient'){

         //          $('#usersName').attr('placeholder','Email Id');

         //         $('#userlavel').html('Email id');

         //     }else if(type=='Provider'){

         //         $('#usersName').attr('placeholder','Email Id');

         //         $('#userlavel').html('Email id');

         //     }else{

         //         $('#usersName').attr('placeholder','User Name');

         //         $('#userlavel').html('User Name'); 

         //     }

         // }

      </script>

      <!-- Core Vendors JS -->

      <script src="<?=base_url()?>assets/js/vendors.min.js"></script>

      <!-- page js -->

      <!-- Core JS -->

      <script src="<?=base_url()?>assets/js/app.min.js"></script>

   </body>

</html>