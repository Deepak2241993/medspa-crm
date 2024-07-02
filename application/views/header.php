<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Select CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Select to CDN END -->
      <title><?php echo ucfirst($this->session->userdata('user_type'));?> Dashboard</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo/favicon.png">
      <!-- page css -->
      <!-- Core css -->
      <link href="<?=base_url()?>assets/css/app.min.css" rel="stylesheet">
      <!-- page css -->
      <link href="<?=base_url()?>assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="<?=base_url()?>assets/vendors/select2/select2.css" rel="stylesheet">
      <link href="<?=base_url()?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
      <script type="text/javascript" src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      
    
    <!-- Include jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
      <script type="text/javascript">
         var baseurl = "<?=base_url()?>";
         
      </script>
   </head>
   <body>
      <div class="app">
      <div class="layout">
      <!-- Header START -->
      <div class="header">
         <div class="logo logo-dark">
            <a href="#">
            <img src="<?=base_url()?>assets/logo/Transparent-Logo-Forever-MedSpa.png" alt="Logo" height="40%" width="60%">
            <img class="logo-fold" src="<?=base_url()?>assets/logo/Transparent-Logo-Forever-MedSpa.png" alt="Logo" height="80%" width="100%">
            </a>
         </div>
         <div class="logo logo-white">
            <a href="#">
            <img src="<?=base_url()?>assets/images/logo/logo-white.png" alt="Logo">
            <img class="logo-fold" src="<?=base_url()?>assets/images/logo/logo-fold-white.png" alt="Logo">
            </a>
         </div>
         <div class="nav-wrap">
            <ul class="nav-left">
               <li class="desktop-toggle">
                  <a href="javascript:void(0);">
                  <i class="anticon"></i>
                  </a>
               </li>
               <li class="mobile-toggle">
                  <a href="javascript:void(0);">
                  <i class="anticon"></i>
                  </a>
               </li>
               <?php if($this->session->userdata('user_type')!="patient"){?>
               <li>
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                  <i class="anticon anticon-search"></i>
                  </a>
               </li>
               <?php } ?>
            </ul>
            <ul class="nav-right">
            <?php if($this->session->userdata('user_type')!="patient"){?>
               <li class="dropdown dropdown-animated scale-left">
                  <a href="javascript:void(0);" data-toggle="dropdown">
                  <i class="anticon anticon-bell notification-badge"></i>
                  </a>
               </li>
               <?php } ?>
               <li><?php $sessdata=$this->session->userdata(); echo $sessdata['name'] ;?></li>
               <li class="dropdown dropdown-animated scale-left">
                  <div class="pointer" data-toggle="dropdown">
                     <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="<?=base_url()?>assets/logo/user_profile.png"  alt="">
                     </div>
                  </div>
                  <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                     <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                           <div class="avatar avatar-lg avatar-image">
                              <img src="<?=base_url()?>assets/logo/user_profile.png" alt="">
                           </div>
                           <div class="m-l-10">
                              <p class="mt-3 text-dark font-weight-semibold"><?=ucfirst($sessdata['name']) ?></p>
                           </div>
                        </div>
                     </div>
                     <?php if($this->session->userdata('user_type')!="patient"){?>

                     <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                           <div>
                              <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                              <span class="m-l-10">Edit Profile</span>
                           </div>
                           <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                     </a>
                     <?php } else{ ?>
                     <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                           <div>
                              <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                              <span class="m-l-10">Account Setting</span>
                           </div>
                           <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                     </a>
                     <?php } ?>
                     <a href="<?=base_url()?>AdminLogin/logout" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                           <div>
                              <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                              <span class="m-l-10">Logout</span>
                           </div>
                           <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                     </a>
                  </div>
               </li>
            </ul>
         </div>
      </div>
      <!-- Header END -->