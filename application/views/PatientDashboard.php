
<!-- Content Wrapper END -->
<!--Page Container START -->
<div class="page-container">
<!--Content Wrapper START--> 
    <div class="main-content">
    <div class="card">
        <div class="card-body">
       
            <section class="patient_profile">
            <div class="row align-items-center">

                <div class="col-md-7">

                    <div class="d-md-flex align-items-center">

                        <div class="text-center text-sm-left ">

                            <div class="avatar avatar-image" style="width: 150px; height:150px">
                            <?php
                            if($patients_details[0]->gender=='male')
                            {?>
                            <img src="<?=($patients_details[0]->profile_image)?base_url().'assets/images/uploads/patient/'.$patients_details[0]->profile_image:base_url().'assets/images/avatars/male.jpg'?>"alt="male.jpg"> 
                            <?php } else{?>

                            <img src="<?=($patients_details[0]->profile_image)?base_url().'assets/images/uploads/patient/'.$patients_details[0]->profile_image:base_url().'assets/images/avatars/female.png'?>"alt="female.png"> 
                            <?php } ?>
                              
                            </div>

                        </div>

                        <div class="text-center text-sm-left m-v-15 p-l-30">

                            <h2 class="m-b-5"><?=($patients_details[0]->pname)?ucfirst($patients_details[0]->pname):'Guest'?></h2>

                            <p class="text-opacity font-size-13"><?=($patients_details[0]->email)?$patients_details[0]->email:'Null'?></p>

                            <p class="text-dark m-b-20">Patient</p>

                            <button class="btn btn-primary btn-tone" data-toggle="modal" data-target="#exampleModal">Update Info</button>

                        </div>

                    </div>

                </div>

                <div class="col-md-5">

                    <div class="row">

                        <div class="d-md-block d-none border-left col-1"></div>

                        <div class="col">

                            <ul class="list-unstyled m-t-10">

                                <li class="row">

                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">

                                        <i class="m-r-10 text-primary anticon anticon-mail"></i>

                                        <span>Email: </span> 

                                    </p>

                                    <p class="col font-weight-semibold"><?=($patients_details[0]->email)?$patients_details[0]->email:'Null'?></p>

                                </li>

                                <li class="row">

                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">

                                        <i class="m-r-10 text-primary anticon anticon-phone"></i>

                                        <span>Phone: </span> 

                                    </p>

                                    <p class="col font-weight-semibold"><?=($patients_details[0]->phone)?$patients_details[0]->phone:'Null'?></p>

                                </li>

                                <li class="row">

                                    <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">

                                        <i class="m-r-10 text-primary anticon anticon-compass"></i>

                                        <span>Location: </span> 

                                    </p>

                                    <p class="col font-weight-semibold"><?=($patients_details[0]->full_address)?$patients_details[0]->full_address:'Null'?></p>

                                </li>

                            </ul>

                            

                        </div>

                    </div>

                </div>

            </div><hr/>
            </section>

        <div class="row">
         <div class="col-md-6 col-lg-4">
            <a href="#">
               <div class="card">
                  <div class="card-body">
                     <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                           <i class="anticon anticon-dollar"></i>
                        </div>
                        <div class="m-l-15">
                           <h2 class="m-b-0">100</h2>
                           <p class="m-b-0 text-muted">Wallet <?=$this->session->userdata('type')?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
         </div>
        
         <div class="col-md-6 col-lg-4">
            <div class="card">
               <a href="#">
                  <div class="card-body">
                     <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                           <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                           <h2 class="m-b-0">200</h2>
                           <p class="m-b-0 text-muted">Upcomeing Appointment</p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-md-6 col-lg-4">
            <div class="card">
               <a href="#">
                  <div class="card-body">
                     <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                           <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                           <h2 class="m-b-0">200</h2>
                           <p class="m-b-0 text-muted">Appointment History</p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </div>

         <div class="col-md-6 col-lg-4">
            <div class="card">
               <a href="#">
                  <div class="card-body">
                     <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                           <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                           <h2 class="m-b-0">200</h2>
                           <p class="m-b-0 text-muted">Invoice & Payment</p>
                        </div>
                     </div>
                  </div>
               </a>
            </div>
         </div>

<!-- Modal code start -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?=form_open('PatientDashboard/updateProfile/'.$patients_details[0]->prid , array('enctype' => 'multipart/form-data'))?>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="pname" value="<?=($patients_details[0]->pname)?$patients_details[0]->pname:'Null'?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="recipient-name" name="email" value="<?=($patients_details[0]->email)?$patients_details[0]->email:'Null'?>">
          </div> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="recipient-name" name="phone" value="<?=($patients_details[0]->phone)?$patients_details[0]->phone:'Null'?>">
          </div> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gender:</label>
            <input type="text" class="form-control" id="recipient-name" name="" value="<?=($patients_details[0]->email)?$patients_details[0]->email:'Null'?>">
          </div> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Update Password:</label>
            <input type="text" class="form-control" id="recipient-name" name="password_u" >
            <input type="hidden" class="form-control" id="recipient-name" name="password" value="<?=($patients_details[0]->password)?$patients_details[0]->password:'Null'?>">
          </div> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Age (Enter Year):</label>
            <input type="text" class="form-control" id="recipient-name" name="age" value="<?=($patients_details[0]->age)?$patients_details[0]->age:'Null'?>">
          </div> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Profile Image:<span class="text-danger">(file formate must be gif,jpg,png)</span></label>
            <br>
            <?php
            if($patients_details[0]->gender=='male')
            {?>
            <img src="<?=($patients_details[0]->profile_image)?base_url().'assets/images/uploads/patient/'.$patients_details[0]->profile_image:base_url().'assets/images/avatars/male.jpg'?>"alt="male.jpg" style="height:50px; width:50px;"> 
            <?php } else{?>

            <img src="<?=($patients_details[0]->profile_image)?base_url().'assets/images/uploads/patient/'.$patients_details[0]->profile_image:base_url().'assets/images/avatars/female.png'?>"alt="female.png" style="height:50px; width:50px;"> 
            <?php } ?>
            <input type="file" class="form-control" id="recipient-name" name="profile_image" value="<?=($patients_details[0]->email)?$patients_details[0]->email:'Null'?>">
          </div> 
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Full Address:</label>
            <textarea class="form-control" id="message-text" name="full_address"><?=($patients_details[0]->full_address)?$patients_details[0]->full_address:'Null'?></textarea>
          </div>
        </div>
        <div class="modal-footer">
        <input type="submit" name="submit_data" class="btn btn-primary" value="Update">
        </div>
        <?=form_close()?>
    </div>
  </div>
</div>
<!--  modal code End -->

      </div>
            <!-- Content Wrapper START -->
            <section>
               
                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Wallet Transications</h5>
                            <div>
                                <a href="" class="btn btn-default btn-sm">View All</a> 
                            </div>
                            </div>
                            <div class="table-responsive m-t-30">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>TXN ID</th>
                                        <th>Service Name</th>
                                        <th>Total Wallet Amount</th>
                                        <th>Left Wallet Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($wallet_transiction as $transiction){ ?>
                                    <tr>
                                        <td><?=$i ?></td>
                                        <td>
                                        <?=$transiction->txn_id ?>
                                        </td>
                                        <td>
                                        <?=$transiction->service_name ?>
                                        </td>
                                        <td><?=$transiction->total_wallet_amt ?></td>
                                        <td><?=$transiction->left_wallet_amount ?></td>
                                        <td><?php echo  date("d F Y",strtotime($transiction->created_at)); ?></td>
                                        <td>
                                        <div class="dropdown dropdown-animated scale-left">
                                            <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                            <i class="anticon anticon-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <!--<button class="dropdown-item" type="button">-->
                                                <!--    <i class="anticon anticon-edit"></i>-->
                                                <!--    <span class="m-l-10">Edit</span>-->
                                                <!--</button>-->
                                                <button class="dropdown-item" type="button">
                                                <i class="anticon anticon-delete"></i>
                                                <span class="m-l-10">Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?> 
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
            <!-- Page Container END -->
        </div>
    </div>
    </div>
</div>