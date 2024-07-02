<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Patient Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="<?=base_url()?>assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="index.html">
                        <img src="<?=base_url()?>assets/images/logo/logo.png" alt="Logo">
                        <img class="logo-fold" src="<?=base_url()?>assets/images/logo/logo-fold.png" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="index.html">
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
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#search-drawer">
                                <i class="anticon anticon-search"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="dropdown dropdown-animated scale-left">
                            <a href="javascript:void(0);" data-toggle="dropdown">
                                <i class="anticon anticon-bell notification-badge"></i>
                            </a>
                            <div class="dropdown-menu pop-notification">
                                <div class="p-v-15 p-h-25 border-bottom d-flex justify-content-between align-items-center">
                                    <p class="text-dark font-weight-semibold m-b-0">
                                        <i class="anticon anticon-bell"></i>
                                        <span class="m-l-10">Notification</span>
                                    </p>
                                    <a class="btn-sm btn-default btn" href="javascript:void(0);">
                                        <small>View All</small>
                                    </a>
                                </div>
                                <div class="relative">
                                    <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-blue avatar-icon">
                                                    <i class="anticon anticon-mail"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You received a new message</p>
                                                    <p class="m-b-0"><small>8 min ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-cyan avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">New user registered</p>
                                                    <p class="m-b-0"><small>7 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                            <div class="d-flex">
                                                <div class="avatar avatar-red avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">System Alert</p>
                                                    <p class="m-b-0"><small>8 hours ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                            <div class="d-flex">
                                                <div class="avatar avatar-gold avatar-icon">
                                                    <i class="anticon anticon-user-add"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <p class="m-b-0 text-dark">You have a new update</p>
                                                    <p class="m-b-0"><small>2 days ago</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="<?=base_url()?>assets/images/avatars/vinay.jpg"  alt="">
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-lg avatar-image">
                                            <img src="<?=base_url()?>assets/images/avatars/vinay.jpg" alt="">
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold">Marshall1 Nichols</p>
                                            <p class="m-b-0 opacity-07">UI/UX Desinger</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-lock"></i>
                                            <span class="m-l-10">Account Setting</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-project"></i>
                                            <span class="m-l-10">Projects</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
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
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                <i class="anticon anticon-appstore"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>    
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                               
                            </a>
                           
                        </li>
                       
                        <li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-file"></i>
                                </span>
                                <span class="title">Pages</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="active">
                                    <a href="profile.html">Profile</a>
                                </li>
                        <!--        <li>-->
                        <!--            <a href="invoice.html">Invoice</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="members.html">Members</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="pricing.html">Pricing</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="setting.html">Setting</a>-->
                        <!--        </li>-->
                        <!--        <li class="nav-item dropdown">-->
                        <!--            <a href="javascript:void(0);">-->
                        <!--                <span>Blog</span>-->
                        <!--                <span class="arrow">-->
                        <!--                    <i class="arrow-icon"></i>-->
                        <!--                </span>-->
                        <!--            </a>-->
                        <!--            <ul class="dropdown-menu">-->
                        <!--                <li>-->
                        <!--                    <a href="blog-grid.html">Blog Grid</a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="blog-list.html">Blog List</a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="blog-post.html">Blog Post</a>-->
                        <!--                </li>-->
                        <!--            </ul>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <!--<li class="nav-item dropdown">-->
                        <!--    <a class="dropdown-toggle" href="javascript:void(0);">-->
                        <!--        <span class="icon-holder">-->
                        <!--            <i class="anticon anticon-lock"></i>-->
                        <!--        </span>-->
                        <!--        <span class="title">Authentication</span>-->
                        <!--        <span class="arrow">-->
                        <!--            <i class="arrow-icon"></i>-->
                        <!--        </span>-->
                        <!--    </a>-->
                        <!--    <ul class="dropdown-menu">-->
                        <!--        <li>-->
                        <!--            <a href="login-1.html">Login 1</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="login-2.html">Login 2</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="login-3.html">Login 3</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="sign-up-1.html">Sign Up 1</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="sign-up-2.html">Sign Up 2</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="sign-up-3.html">Sign Up 3</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="error-1.html">Error 1</a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="error-2.html">Error 2</a>-->
                        <!--        </li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="page-header">
                        <h2 class="header-title">Profile</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                                <a class="breadcrumb-item" href="#">Pages</a>
                                <span class="breadcrumb-item active">Profile</span>
                            </nav>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="d-md-flex align-items-center">
                                            <div class="text-center text-sm-left ">
                                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                                    <img src="<?=base_url()?>assets/images/avatars/vinay.jpg" alt="">
                                                    <!--https://misfitamigos.com/forevermedspa_new/assets/images/avatars/vinay.jpg-->
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                                <h2 class="m-b-5">Vinay Kumar</h2>
                                                <p class="text-opacity font-size-13">16vinay16kumar@gmail.com</p>
                                                <p class="text-dark m-b-20">Patient</p>
                                                <button class="btn btn-primary btn-tone">Contact</button>
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
                                                        <p class="col font-weight-semibold"> 16vinay16kumar@gmail.com</p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                            <span>Phone: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"> +91-9319973809</p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                            <span>Location: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"> New Delhi , IND</p>
                                                    </li>
                                                </ul>
                                                <div class="d-flex font-size-22 m-t-15">
                                                    <a href="" class="text-gray p-r-20">
                                                        <i class="anticon anticon-facebook"></i>
                                                    </a>        
                                                    <a href="" class="text-gray p-r-20">    
                                                        <i class="anticon anticon-twitter"></i>
                                                    </a>
                                                    <a href="" class="text-gray p-r-20">
                                                        <i class="anticon anticon-behance"></i>
                                                    </a> 
                                                    <a href="" class="text-gray p-r-20">   
                                                        <i class="anticon anticon-dribbble"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Bio</h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here'.</p>
                                        <hr>
                                        <h5>Services </h5>
                                        <h5 class="m-t-20">
                                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Neurotoxin</span>
                                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Filler</span>
                                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Mira Dry</span>
                                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">RFAL</span>
                                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">RF</span>
                                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">RFMN</span>
                                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Laser Treatment</span>
                                            <span class="badge badge-pill badge-default font-weight-normal m-r-10 m-b-10">Vi Peel</span>
                                        </h5>
                                        <hr>
                                        <!--<h5>Experices</h5>-->
                                        <!--<div class="m-t-20">-->
                                        <!--    <div class="media m-b-30">-->
                                        <!--        <div class="avatar avatar-image">-->
                                        <!--            <img src="assets/images/others/adobe-thumb.png" alt="">-->
                                        <!--        </div>-->
                                        <!--        <div class="media-body m-l-20">-->
                                        <!--            <h6 class="m-b-0">UI/UX Designer, Adobe Inc.</h6>-->
                                        <!--            <span class="font-size-13 text-gray">Jul 2018</span>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--    <div class="media m-b-30">-->
                                        <!--        <div class="avatar avatar-image">-->
                                        <!--            <img src="assets/images/others/amazon-thumb.png" alt="">-->
                                        <!--        </div>-->
                                        <!--        <div class="media-body m-l-20">-->
                                        <!--            <h6 class="m-b-0">Product Developer, Amazon.com Inc.</h6>-->
                                        <!--            <span class="font-size-13 text-gray">Jul-2017 - Jul 2018</span>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--    <div class="media m-b-30">-->
                                        <!--        <div class="avatar avatar-image">-->
                                        <!--            <img src="assets/images/others/nvidia-thumb.png" alt="">-->
                                        <!--        </div>-->
                                        <!--        <div class="media-body m-l-20">-->
                                        <!--            <h6 class="m-b-0">Interface Designer, Nvidia Corporation</h6>-->
                                        <!--            <span class="font-size-13 text-gray">Jul-2016 - Jul 2017</span>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <hr>
                                        <h5>Education</h5>
                                        <div class="m-t-20">
                                            <div class="media m-b-30">
                                                <div class="avatar avatar-image">
                                                    <img src="assets/images/others/cambridge-thumb.png" alt="">
                                                </div>
                                                <div class="media-body m-l-20">
                                                    <h6 class="m-b-0">MSt in Social Innovation, Cambridge University</h6>
                                                    <span class="font-size-13 text-gray">Jul-2012 - Jul 2016</span>
                                                </div>
                                            </div>
                                            <div class="media m-b-30">
                                                <div class="avatar avatar-image">
                                                    <img src="assets/images/others/phillips-academy-thumb.png" alt="">
                                                </div>
                                                <div class="media-body m-l-20">
                                                    <h6 class="m-b-0">Phillips Academy</h6>
                                                    <span class="font-size-13 text-gray">Jul-2005 - Jul 2011</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Reviews (18)</h5>
                                        <div class="m-t-20">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item p-h-0">
                                                    <div class="media m-b-15">
                                                        <div class="avatar avatar-image">
                                                            <img src="assets/images/avatars/thumb-8.jpg" alt="">
                                                        </div>
                                                        <div class="media-body m-l-20">
                                                            <h6 class="m-b-0">
                                                                <a href="" class="text-dark">Neurotoxin</a>
                                                            </h6>
                                                            <span class="font-size-13 text-gray">28th Jul 2018</span>
                                                        </div>
                                                    </div>
                                                    <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                                    <div class="star-rating m-t-15">
                                                        <input type="radio" id="star1-5" name="rating-1" value="5" checked disabled/><label for="star1-5" title="5 star"></label>
                                                        <input type="radio" id="star1-4" name="rating-1" value="4" disabled/><label for="star1-4" title="4 star"></label>
                                                        <input type="radio" id="star1-3" name="rating-1" value="3" disabled/><label for="star1-3" title="3 star"></label>
                                                        <input type="radio" id="star1-2" name="rating-1" value="2" disabled/><label for="star1-2" title="2 star"></label>
                                                        <input type="radio" id="star1-1" name="rating-1" value="1" disabled/><label for="star1-1" title="1 star"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item p-h-0">
                                                    <div class="media m-b-15">
                                                        <div class="avatar avatar-image">
                                                            <img src="assets/images/avatars/thumb-9.jpg" alt="">
                                                        </div>
                                                        <div class="media-body m-l-20">
                                                            <h6 class="m-b-0">
                                                                <a href="" class="text-dark">Victor Terry</a>
                                                            </h6>
                                                            <span class="font-size-13 text-gray">28th Jul 2018</span>
                                                        </div>
                                                    </div>
                                                    <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                                    <div class="star-rating m-t-15">
                                                        <input type="radio" id="star2-5" name="rating-2" value="5" disabled/><label for="star2-5" title="5 star"></label>
                                                        <input type="radio" id="star2-4" name="rating-2" value="4" checked disabled/><label for="star2-4" title="4 star"></label>
                                                        <input type="radio" id="star2-3" name="rating-2" value="3" disabled/><label for="star2-3" title="3 star"></label>
                                                        <input type="radio" id="star2-2" name="rating-2" value="2" disabled/><label for="star2-2" title="2 star"></label>
                                                        <input type="radio" id="star2-1" name="rating-2" value="1" disabled/><label for="star2-1" title="1 star"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item p-h-0">
                                                    <div class="media m-b-15">
                                                        <div class="avatar avatar-image">
                                                            <img src="assets/images/avatars/thumb-10.jpg" alt="">
                                                        </div>
                                                        <div class="media-body m-l-20">
                                                            <h6 class="m-b-0">
                                                                <a href="" class="text-dark">Wilma Young</a>
                                                            </h6>
                                                            <span class="font-size-13 text-gray">28th Jul 2018</span>
                                                        </div>
                                                    </div>
                                                    <span>The palatable sensation we lovingly refer to as The Cheeseburger has a distinguished and illustrious history. It was born from humble roots, only to rise to well-seasoned greatness.</span>
                                                    <div class="star-rating m-t-15">
                                                        <input type="radio" id="star3-5" name="rating-3" value="5" checked disabled/><label for="star3-5" title="5 star"></label>
                                                        <input type="radio" id="star3-4" name="rating-3" value="4" disabled/><label for="star3-4" title="4 star"></label>
                                                        <input type="radio" id="star3-3" name="rating-3" value="3" disabled/><label for="star3-3" title="3 star"></label>
                                                        <input type="radio" id="star3-2" name="rating-3" value="2" disabled/><label for="star3-2" title="2 star"></label>
                                                        <input type="radio" id="star3-1" name="rating-3" value="1" disabled/><label for="star3-1" title="1 star"></label>
                                                    </div>
                                                </li>
                                            </ul> 
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-md-4">-->
                            <!--    <div class="card">-->
                            <!--        <div class="card-body">-->
                            <!--            <h5>Connected</h5>-->
                            <!--            <div class="m-t-30">-->
                            <!--                <div class="d-flex align-items-center">-->
                            <!--                    <div class="avatar avatar-image">-->
                            <!--                        <img src="assets/images/avatars/thumb-1.jpg" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="m-l-10">-->
                            <!--                        <h5 class="m-b-0">-->
                            <!--                            <a href="" class="text-dark">Erin Gonzales</a>-->
                            <!--                        </h5>-->
                            <!--                        <span class="font-size-13 text-gray">UI/UX Designer</span>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="m-t-30">-->
                            <!--                <div class="d-flex align-items-center">-->
                            <!--                    <div class="avatar avatar-image">-->
                            <!--                        <img src="assets/images/avatars/thumb-2.jpg" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="m-l-10">-->
                            <!--                        <h5 class="m-b-0">-->
                            <!--                            <a href="" class="text-dark">Darryl Day</a>-->
                            <!--                        </h5>-->
                            <!--                        <span class="font-size-13 text-gray">Software Engineer</span>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="m-t-30">-->
                            <!--                <div class="d-flex align-items-center">-->
                            <!--                    <div class="avatar avatar-image">-->
                            <!--                        <img src="assets/images/avatars/thumb-3.jpg" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="m-l-10">-->
                            <!--                        <h5 class="m-b-0">-->
                            <!--                            <a href="" class="text-dark">Marshall Nichols</a>-->
                            <!--                        </h5>-->
                            <!--                        <span class="font-size-13 text-gray">Product Manager</span>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="m-t-30">-->
                            <!--                <div class="d-flex align-items-center">-->
                            <!--                    <div class="avatar avatar-image">-->
                            <!--                        <img src="assets/images/avatars/thumb-6.jpg" alt="">-->
                            <!--                    </div>-->
                            <!--                    <div class="m-l-10">-->
                            <!--                        <h5 class="m-b-0">-->
                            <!--                            <a href="" class="text-dark">Riley Newman</a>-->
                            <!--                        </h5>-->
                            <!--                        <span class="font-size-13 text-gray">Data Analyst</span>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="card">-->
                            <!--        <div class="card-body">-->
                            <!--            <h5>Projects</h5>-->
                            <!--            <div class="m-t-20">-->
                            <!--                <div class="m-b-20 p-b-20 border-bottom">-->
                            <!--                    <div class="media align-items-center m-b-15">-->
                            <!--                        <div class="avatar avatar-image">-->
                            <!--                            <img src="assets/images/others/coffee-app-thumb.jpg" alt="">-->
                            <!--                        </div>-->
                            <!--                        <div class="media-body m-l-20">-->
                            <!--                            <h5 class="m-b-0">-->
                            <!--                                <a href="" class="text-dark">Coffee Finder App</a>-->
                            <!--                            </h5>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>-->
                            <!--                    <div class="d-inline-block">-->
                            <!--                        <a class="m-r-5" data-toggle="tooltip" title="Eugene Jordan" href="">-->
                            <!--                            <div class="avatar avatar-image avatar-sm">-->
                            <!--                                <img src="assets/images/avatars/thumb-6.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                        </a>-->
                            <!--                        <a class="m-r-5" data-toggle="tooltip" title="Pamela" href="">-->
                            <!--                            <div class="avatar avatar-image avatar-sm">-->
                            <!--                                <img src="assets/images/avatars/thumb-7.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                        </a>-->
                            <!--                    </div>-->
                            <!--                    <div class="float-right">-->
                            <!--                        <span class="badge badge-pill badge-blue font-size-12 p-h-10">In Progress</span>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="m-b-20 p-b-20 border-bottom">-->
                            <!--                    <div class="media align-items-center m-b-15">-->
                            <!--                        <div class="avatar avatar-image">-->
                            <!--                            <img src="assets/images/others/weather-app-thumb.jpg" alt="">-->
                            <!--                        </div>-->
                            <!--                        <div class="media-body m-l-20">-->
                            <!--                            <h5 class="m-b-0">-->
                            <!--                                <a href="" class="text-dark">Weather App</a>-->
                            <!--                            </h5>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>-->
                            <!--                    <div class="d-inline-block">-->
                            <!--                        <a class="m-r-5" data-toggle="tooltip" title="Lillian Stone" href="">-->
                            <!--                            <div class="avatar avatar-image avatar-sm">-->
                            <!--                                <img src="assets/images/avatars/thumb-8.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                        </a>-->
                            <!--                        <a class="m-r-5" data-toggle="tooltip" title="Victor Terry" href="">-->
                            <!--                            <div class="avatar avatar-image avatar-sm">-->
                            <!--                                <img src="assets/images/avatars/thumb-9.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                        </a>-->
                            <!--                        <a class="m-r-5" data-toggle="tooltip" title="Wilma Young" href="">-->
                            <!--                            <div class="avatar avatar-image avatar-sm">-->
                            <!--                                <img src="assets/images/avatars/thumb-10.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                        </a>-->
                            <!--                    </div>-->
                            <!--                    <div class="float-right">-->
                            <!--                        <span class="badge badge-pill badge-cyan font-size-12 p-h-10">Completed</span>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="m-b-20 p-b-20 border-bottom">-->
                            <!--                    <div class="media align-items-center m-b-15">-->
                            <!--                        <div class="avatar avatar-image">-->
                            <!--                            <img src="assets/images/others/music-app-thumb.jpg" alt="">-->
                            <!--                        </div>-->
                            <!--                        <div class="media-body m-l-20">-->
                            <!--                            <h5 class="m-b-0">-->
                            <!--                                <a href="" class="text-dark">Music App</a>-->
                            <!--                            </h5>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                    <p>Protein, iron, and calcium are some of the nutritional benefits associated with cheeseburgers.</p>-->
                            <!--                    <div class="d-inline-block">-->
                            <!--                        <a class="m-r-5" data-toggle="tooltip" title="Darryl Day" href="">-->
                            <!--                            <div class="avatar avatar-image avatar-sm">-->
                            <!--                                <img src="assets/images/avatars/thumb-2.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                        </a>-->
                            <!--                        <a class="m-r-5" data-toggle="tooltip" title="Virgil Gonzales" href="">-->
                            <!--                            <div class="avatar avatar-image avatar-sm">-->
                            <!--                                <img src="assets/images/avatars/thumb-4.jpg" alt="">-->
                            <!--                            </div>-->
                            <!--                        </a>-->
                            <!--                    </div>-->
                            <!--                    <div class="float-right">-->
                            <!--                        <span class="badge badge-pill badge-cyan font-size-12 p-h-10">Completed</span>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <!--<footer class="footer">-->
                <!--    <div class="footer-content">-->
                <!--        <p class="m-b-0">Copyright © 2019 Theme_Nate. All rights reserved.</p>-->
                <!--        <span>-->
                <!--            <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>-->
                <!--            <a href="" class="text-gray">Privacy &amp; Policy</a>-->
                <!--        </span>-->
                <!--    </div>-->
                <!--</footer>-->
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <i class="anticon anticon-close"></i>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-search"></i>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Files</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-file-excel"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                                        <p class="m-b-0 text-muted font-size-13">by Finance</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-file-word"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                                        <p class="m-b-0 text-muted font-size-13">by Developers</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-purple avatar-icon">
                                        <i class="anticon anticon-file-text"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                                        <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-file-pdf"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                                        <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-30">
                                <h5 class="m-b-20">Members</h5>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                                        <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-2.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                                        <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                                    </div>
                                </div>
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/avatars/thumb-3.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                                        <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                                    </div>
                                </div>
                            </div>   
                            <div class="m-t-30">
                                <h5 class="m-b-20">News</h5> 
                                <div class="d-flex m-b-30">
                                    <div class="avatar avatar-image">
                                        <img src="assets/images/others/img-1.jpg" alt="">
                                    </div>
                                    <div class="m-l-15">
                                        <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                                        <p class="m-b-0 text-muted font-size-13">
                                            <i class="anticon anticon-clock-circle"></i>
                                            <span class="m-l-5">25 Nov 2018</span>
                                        </p>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Theme Config</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="m-b-30">
                                <h5 class="m-b-0">Header Color</h5>
                                <p>Config header background color</p>
                                <div class="theme-configurator d-flex m-t-10">
                                    <div class="radio">
                                        <input id="header-default" name="header-theme" type="radio" checked value="default">
                                        <label for="header-default"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-primary" name="header-theme" type="radio" value="primary">
                                        <label for="header-primary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-success" name="header-theme" type="radio" value="success">
                                        <label for="header-success"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                                        <label for="header-secondary"></label>
                                    </div>
                                    <div class="radio">
                                        <input id="header-danger" name="header-theme" type="radio" value="danger">
                                        <label for="header-danger"></label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Side Nav Dark</h5>
                                <p>Change Side Nav to dark</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                                    <label for="side-nav-theme-toogle"></label>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="m-b-0">Folded Menu</h5>
                                <p>Toggle Folded Menu</p>
                                <div class="switch d-inline">
                                    <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                                    <label for="side-nav-fold-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
            <!-- Quick View END -->
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>