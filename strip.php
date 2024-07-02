<?php
   /*
   Template Name: Instant Quote
   */
   session_start();
   get_header();
   
   $post_id              = get_the_ID();
   $is_elementor_used = \Elementor\Plugin::instance()->editor->is_edit_mode();
   $container_tag        = 'product' === get_post_type( $post_id ) ? 'div' : 'article'; ?>
<div id="main-content">
   <?php if ( ! $is_elementor_used ) : ?>
   <div class="container">
      <div id="content-area" class="clearfix">
         <div id="left-area">
            <?php endif; ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <<?php echo $container_tag; ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( ! $is_elementor_used ) : ?>
            <h1 class="main_title"><?php the_title(); ?></h1>
            <?php
               $thumb = '';
               
               $width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );
               
               $height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
               $classtext = 'et_featured_image';
               $titletext = get_the_title();
               $alttext = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
               // 	$thumbnail = get_thumbnail( $width, $height, $classtext, $alttext, $titletext, false, 'Blogimage' );
               // 	$thumb = $thumbnail["thumb"];
               
               // 	if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
               // 		print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
               ?>
            <?php endif; ?>
            <?php
               the_content();
               
               if ( ! $is_elementor_used )
               	wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
               ?>
            <style>
               .main-column{
               border-bottom: 1px solid #ccc;
               width: 96%;
               float: left;
               margin-bottom: 18px;
               box-shadow: 2px 2px 2px #99999
               }
               .ten-half{
               padding: 10px 10%;
               width: 80%;
               float: left;
               text-align: center;
               }
               .two-half{
               width:20%;
               float: left;
               }
               .custom-form {
               width: 80%;
               text-align: center;
               /* background: #fff; */
               margin: auto;
               padding: 25px;
               padding-top: 50px;
               display: table;
               margin-top: 44px;
               padding-bottom: 50px;
               box-shadow: 0px 70px 100px 0px rgb(0 0 0 / 6%);
               border-radius: 8px;
               border: 2px solid #ccc;
               /**background-image: url(http://sasnagar.co.in/goodfellaspizzeriagreystanes/wp-content/uploads/2021/05/form-bg-1.png);**/
               background-size: cover;
               background-repeat: no-repeat;
               }
               .outer_package {
               float: left;
               width: 100%;
               }
               .packae-label label {
               float: left;
               text-align: left;
               font-size: 16px;
               padding-bottom: 10px;
               font-family: 'Rubik';
               width:100%;
               }
               .pkg-salads {
               float: left;
               width: 100%;
               padding: 20px 0px;
               }
               .pkg-salads p {
               float: left;
               width: 100%;
               text-align: left;
               font-size: 16px;
               font-family: 'Rubik';
               padding-left:10px;
               }
               .check_box-otption {
               width: 100%;
               float: left;
               padding: 15px 0px;
               }
               .custom-form select#package, .custom-form input {
               padding: 10px;
               }
               .check_box-otption label {
               float: left;
               width: 10%;
               }
               .outer_package input {
               width: 20px;
               margin: 0px;
               }
               .custom-form .col-sm-6 {
               /* border: 1px solid; */
               float: left;
               width: 50%;
               padding-left: 10px;
               padding-right: 10px;
               }
               .radio_fields {
               opacity: 2 !important;
               display: inline-block !important;
               width: 15% !important;
               height: 15% !important;
               }
               .col-md-4.col-sm-12 input {
               float: left;
               width: 100%;
               }
               .custom-form .col-md-4.col-sm-12 {
               width: 31% !important;
               float: left;
               margin-right: 14px;
               }
               form.custom-form select {
               width: 100%;
               /* padding-left: 15px; */
               background: #f2f2f2;
               height: 44px;
               font-size: 16px;
               border: 0px;
               }
               .outer_package input {
               width: 100%;
               /* padding-left: 15px; */
               background: #f2f2f2;
               height: 44px;
               font-size: 16px;
               border: 0px;
               }
               #display-div {
               float: left;
               width: 100%;
               padding-bottom: 20px;
               padding-left: 20px;
               }
               #display-div p {
               float: left;
               width: 100%;
               text-align: left;
               font-size: 18px;
               padding-bottom:20px;
               }
               .left_box-salads {
               float: left;
               text-align: center;
               padding-right: 20px;
               }
               .left_box-salads input {
               height: 30px !important;
               /* margin: 0px 9px 0px 0px; */
               float: left;
               width: 40px !important;
               padding: 10px 0px 10px 3px;
               border: none;
               background: #f2f2f2;
               }
               .left_box-salads label{
               float:left;
               }
               #main-footer {
               background-color: #1f2024;
               float: left;
               width: 100%;
               margin-top: 20px;
               }
               .send_to_email input,.send_to_email select {
               float: left;
               width: 15%;
               margin-left: 10px;
               margin-right: 20px;
               padding: 10px;
               background: #f2f2f2;
               border: 0px;
               height: 40px;
               }
               .send_to_email2 input, .send_to_email2 select {
               width: 40%;
               margin-right: 0;
               margin-left: 20px;
               padding: 10px;
               background: #f2f2f2;
               border: 0px;
               }
               .button-submit {
               clear: both;
               margin-top: 27px;
               background-color: #ce2222 !important;
               border: 0px;
               color: #fff;
               font-size: 17px;
               text-transform: uppercase;
               font-weight: bold;
               width: auto !important;
               border-radius: 4px;
               height: auto !important;
               padding: 15px 30px !important;
               cursor: pointer;
               }
               .tottle-number {
               padding-left: 10px;
               float: left;
               width: 100%;
               margin-top: 18px;
               }
               h4#Total {
               font-size: 18px;
               text-align: left;
               border: 1px solid #ccc;
               float: left;
               padding: 8px 30px;
               }
               .outer_package h2 {
               margin-top: 0px;
               margin-bottom: 40px;
               font-size: 28px;
               text-transform: capitalize;
               font-weight: 800;
               text-align: center;
               float: left;
               width: 100%;
               }
               .tottle-number label {
               float: left;
               margin-right: 12px;
               margin-bottom: 28px;
               font-family: 'Rubik';
               font-size: 29px;
               margin-top: 5px;
               }
               .col-sm-6.packae-label {
               width: 25%;
               }
               .col-sm-6.packae-label.col_2 {
               width: 75%;
               padding-right: 0px;
               }
               @media only screen and (min-width:320px) and (max-width:767px){
               .custom-form .col-sm-6 {
               width: 100%;
               }
               .custom-form .col-md-4.col-sm-12 {
               width: 100% !important;
               margin-top: 0px !important;
               margin-right: 9px;
               float: left;
               margin-bottom: 20px;
               }
               .custom-form {
               width: 100%;
               padding: 11px;
               }
               .left_box-salads {
               width: 32%;
               padding-right: 0px !important;
               }
               .button-submit {
               margin-top: 0px;
               }
               .outer_package h2 {
               margin-top: 16px;
               margin-bottom: 10px;
               font-size: 22px;
               }
               .pkg-salads {
               padding: 0px 0px;
               }
               .left_box-salads input {
               height: 25px !important;
               /* margin: 0px 9px 0px 0px; */
               float: left;
               width: 27px !important;
               }
               .send_to_email input, .send_to_email select {
               float: left;
               width: 31%;
               margin-right: 0;
               margin-left: 7px;
               padding: 10px;
               background: #f2f2f2;
               border: 0px;
               height: 40px;
               margin-bottom: 30px;
               }
               .left_box-salads label {
               float: left;
               font-size: 14px;
               margin: 1px !important;
               }
               .both-btn a#myBtn {
               display: grid;
               float: none;
               width: 44%!important;
               clear: inherit!important;
               /* padding: 0px !important; */
               font-size: 14px !IMPORTANT;
               padding: 10px 9px !important;
               }
               .both-btn input.button-submit {
               width: 49%!important;
               margin-right: 22px;
               float: left;
               padding: 12px 9px !important;
               font-size: 14px !important;
               }
               #display-div {
               padding-left: 4px;
               }
               form.custom-form select {
               font-size: 14px;
               }
               .outer_package input {
               font-size: 14px;
               }
               .pkg-salads p {
               font-size: 14px;
               }
               #display-div p {
               font-size: 14px;
               }
               .packae-label label {
               font-size: 14px;
               margin-top: 10px;
               }
               .col-sm-6.packae-label.col_2 {
               width: 100%;
               padding-right: 10px;
               }
               .send_to_email2 {
               /* float: left; */
               width: 100% !important;
               }
               .modal-content {
               width: 94% !important;
               }
               h2.select_time {
               //padding-left: 0px !important;
               }
               .send_to_email2 select {
               margin: 0px !important;
               }
               .send_to_email2 h2 {
               padding-top: 15px !important;
               }
               }
               /**************************************************************>
               /* The Modal (background) */
               .modal {
               display: none; /* Hidden by default */
               position: fixed; /* Stay in place */
               z-index: 3; /* Sit on top */
               padding-top: 100px; /* Location of the box */
               left: 0;
               top: 0;
               width: 100%; /* Full width */
               height: 100%; /* Full height */
               overflow: auto; /* Enable scroll if needed */
               background-color: rgb(0,0,0); /* Fallback color */
               background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
               }
               /* Modal Content */
               .modal-content {
               background-color: #e8e8e8;
               margin: auto;
               padding: 20px;
               border: 1px solid #888;
               width: 50%;
               margin-top: 10%;
               }
               /* The Close Button */
               .close {
               color: #aaaaaa;
               float: right;
               font-size: 28px;
               font-weight: bold;
               }
               .close:hover,
               .close:focus {
               color: #000;
               text-decoration: none;
               cursor: pointer;
               }
               .send_to_email2 input {
               width: 100%;
               margin: 0px;
               height: 42px;
               }
               .send_to_email2 select {
               width: 100%;
               height: 42px;
               }
               #payNow {
               /* float: left; */
               width: 100%;
               clear: both;
               padding-top: 13px;
               display: block;
               }
               #payNow {
               margin-top: 0px;
               }
               .send_to_email2 {
               margin-right: 2px;
               float: left;
               width: 48%;
               }
               .send_to_email2.booking {
               background: #fff;
               border: 1px solid #ccc;
               padding: 17px;
               margin-bottom: 10px;
               }
               h2.select_time {
               padding-left: 19px;
               }
               .faq_section .et_pb_toggle_close {
               background-color: transparent;
               padding: 0px!Important;
               color: #fff !important;
               }
               .faq_section .et_pb_toggle_content{
               color: #fff !important;
               }
               #main-footer {
               margin-top: 0px;
               }
               .faq_section .et_pb_toggle_open{
               background:transparent !important
               }
               .faq_section .et_pb_toggle_title {
               color: #fff !important;
               }
               .faq_section {
               background-image: linear-gradient(
               180deg
               ,#121a25 0%,#002e54 100%)!important;
               }
               .menu_sec_nne{display:none}
               .entry-content tr td, body.et-pb-preview #main-content .container tr td, .entry-content thead th, .entry-content tr th, body.et-pb-preview #main-content .container thead th, body.et-pb-preview #main-content .container tr th{
               padding: 1px !important;
               border:none;
               }
               .glyphicon-minus:before {
               content: "\2212";
               }
               .glyphicon-plus:before {
               content: "\2b";
               }
               .glyphicon {
               padding: 7px;
               border: none;
               position: relative;
               top: 1px;
               display: inline-block;
               font-family: 'Rubik';
               /* font-style: normal; */
               font-weight: 900;
               /* line-height: 0; */
               -webkit-font-smoothing: antialiased;
               }
               button.btn-number {
               border:none;
               border-radius: inherit;
               border-radius: 50%;
               }
               .radio-toolbar input[type="radio"] {
               display: none;
               margin: 2px;
               }
               .radio-toolbar label {
               display: inline-block;
               background-color: #fefefe;
               padding: 4px 11px;
               font-size: 16px;
               cursor: pointer;
               border: 1px solid #ccc;
               margin: 2px;
               border-radius: 20px;
               }
               .radio-toolbar input[type="radio"]:checked+label {
               color: #fff;
               background: #d61f1f !important;
               border: #ce2222;
               }
               .et_pb_column.et_pb_column_4_4{
               z-index:inherit !important;
               }
               .form-address .width-50{
               width: 48%;
               float: left;
               margin: 0 2px;
               }
               .form-address .width-60{
               width: 58%;
               float: left;
               margin: 0 2px;
               }
               .form-address .width-100{
               width: 98%;
               float: left;
               margin: 0 2px;
               }
               .form-address .width-40{
               width: 39%;
               float: left;
               margin: 0 2px;
               }
               .form-address {
               background: #fff;
               border: 1px solid #ccc;
               padding: 6px;
               margin-bottom: 10px;
               margin-top: 10px;
               width: 100%;
               float: left;
               }
            </style>
            <link rel="stylesheet" href="../wp-content/themes/Divi/css/jquery-ui.css">
            <?php
               if(isset($_POST['PayNow'])){
                   
                   
                    $Packadge=$_POST['model_package_name'];
                   $Adults=$_POST['model_adults'];
                   $Children=$_POST['model_children'];
                  $ChildrenUnder=$_POST['model_under_children'];
                  $SaladsGarden=$_POST['model_garden'];
                  $SaladsGreek=$_POST['model_greek'];
                  $SaladsPenne=$_POST['model_penne'];
                  $PastaHariyali =$_POST['model_hariyali'];
                 $PastaChefs=$_POST['model_chefs'];
                  $PastaCreamy =$_POST['model_creamy'];
                $PastaBoscaiola =$_POST['model_boscaiola'];
                $Bolognaise =$_POST['model_bolognaise'];
               $TotalPrice=$_POST['model_total'];
                   $Name=$_POST['model_name'];
                 $Email=$_POST['model_email'];
                 $Phone=$_POST['model_phone'];
               $Amount20=$_POST['twtyper'];
                   $BookingDate=$_POST['booking-date'];
                  $BookingTime=$_POST['booking-time'];
                   $UnitNumber=$_POST['unit_number'];
                 $StreetNumber=$_POST['street_number'];
                  $Street=$_POST['street'];
                  $Suburb=$_POST['suburb'];
                   $Postcode=$_POST['postcode'];
                      
                         $headers = "From : Live Catering<pizzeria.goodfella@gmail.com";
                         $toEmail = $Email;
                         $subject =  "Congratulations you have been awarded the job in Frightchain";
                          $message .= 
                    	  "Instant Quote
                    	 Package:  " .  $package_name . "\n
                       Adults: " .  $Adults ."\n
                   Children:" .  $Children . "\n
                  Children Under:" .  $ChildrenUnder . "\n
                  Salads Garden: " .  $SaladsGarden . "\n
                  Salads Greek:  " .  $SaladsGreek . "\n
                  Salads Penne:  " . $SaladsPenne . "\n
                 Pasta Hariyali Penne Pastas:  " . $PastaHariyali . "\n
                 Pasta  Chefs Special Pasta:   " . $PastaChefs . "\n
                  Pasta Creamy chicken pesto pasta:  " . $PastaCreamy . "\n
                Pasta Boscaiola pasta: " . $PastaBoscaiola . "\n
                Bolognaise pasta:  " . $Bolognaise . "\n
               Total Price:" . $TotalPrice . "\n
                   Name: " . $Name . "\n
                 Email:" . $Email . "\n
                 Phone: " . $Phone . "\n
                  
                  20% Amount:" . $Amount20 . "\n
                   Booking Date:" . $BookingDate . "\n
                  Booking Time: " . $BookingTime . "\n
                   Unit Number:  " . $UnitNumber . "\n
                 Street Number:" . $StreetNumber . "\n
                  Street:" . $Street . "\n
                  Suburb: " . $Suburb . "\n
                   Postcode:" . $Postcode . "\n ";
               						$mailHeaders = "From: Admin\r\n";
               			if(mail($toEmail, $subject, $message,$mailHeaders)) {
               			    $_SESSION['model_package_name']=$_POST['model_package_name'];
               	$_SESSION['model_total']=$_POST['model_total'];
               	$_SESSION['model_less_amnt']=$_POST['twtyper'];
               	$_SESSION['model_pending_amnt']=$_POST['model_total']-$_POST['twtyper'];
               $_SESSION['model_email']=$_POST['model_email'];
               	$_SESSION['model_phone']=$_POST['model_phone'];
               	$_SESSION['model_name']=$_POST['model_name'];
               	$_SESSION['unit_number']=$_POST['unit_number'];
               	$_SESSION['street_number']=$_POST['street_number'];
               	$_SESSION['street']=$_POST['street'];
               	$_SESSION['suburb']=$_POST['suburb'];
               	$_SESSION['postcode']=$_POST['postcode'];
               			    
               			?><script type="text/javascript">location.href = 'card-detail';</script>
            <?php
               exit();
               	}
               
               	else{
                   echo '<script>alert("Something wrong");</script>';
               
               }
               }		 
               
               ?>
            <?php
               if(isset($_POST['instant_quote'])){
                   
                $name=$_POST['dy_name'];
                 $email= $_POST['dy_email'];
                 $phone= $_REQUEST['dy_phone']; 
                 $package_name=$_POST['package_name'];
                 $adult= $_POST['adults'];
                 $Garden=$_POST['Garden'];
                 $Greek=$_POST['Greek'];
                 $Penne=$_POST['Penne'];
                 $children=$_POST['children'];
                 $Children2=$_POST['Children-under'];
                 $total_price=$_POST['total_price'];
                 $hariyali=$_POST['hariyali']; 
                 $chefs=$_POST['chefs']; 
                 $creamy=$_POST['creamy']; 
                 $boscaiola=$_POST['boscaiola']; 
                 $bolognaise=$_POST['bolognaise']; 
                 
                   $Children2=$_POST['Children-under'];
                            // $headers = "From : Live Catering<info@goodfellaspizzeria.com.au";
                             $headers = "From : Live Catering<pizzeria.goodfella@gmail.com";
                           $f_name= $_POST['dy_name'];
                           $l_name = $_POST['dy_phone'];
                        // $toEmail ='info@goodfellaspizzeria.com.au,pizzeria.goodfellas@gmail.com,jotwebaus@gmail.com,'.$email;
                         $toEmail =$email;
                        // $toEmail=$_POST['dy_email'];
                         $subject ='Instant Quote by '.$_POST['dy_name'];
                    	   //$message = "Hello! This is a test email message.";
                    	     $message .= 
                    	  "Instant Quote
                    	 Package:  " .  $package_name . "\n
                        Adults:" . $adult . "\n
                        Children:" . $children . "\n
                        Children:" . $children . "\n
                        Children Under:". $Children2 . "\n
                        
                        Salads Garden:" . $Garden . "\n
                        Salads Greek:" . $Greek . "\n
                        Salads Penne:" . $Penne . "\n 
                        Hariyali Penne Pastas :" . $hariyali . "\n
                        Chefs Special Pasta:" . $chefs . "\n
                        Creamy chicken pesto pasta:" . $creamy . "\n
                        Boscaiola pasta:" . $boscaiola . "\n
                        Bolognaise pasta:" . $bolognaise . "\n
                       
                       Total Price:" . $total_price . "\n
                       Name: " . $name . "\n
                       Email:" . $email . "\n
                       Phone: " . $phone . "\n";
               			
               			$mailHeaders = "From: pizzeria.goodfellas@gmail.com\r\n";
               			if(mail($toEmail, $subject,$message,$mailHeaders)) {
               				 echo '<script>alert("Thank you for your quote - please reach out on 0497 19 09 19 if you have any question");</script>';
               				
               			}
               			else{
               			    
               			     echo '<script>alert("Something wrong 02");</script>';
               			}
               			
               			
               }
               ?>
            <div class="entry-content">
               <div id="instant-get-quote">
                  <form  method="post" class="custom-form" action="<?php the_permalink();?>
                     ">
                     <div class="outer_package" id="get-quote">
                        <h2>Get quote for live catering</h2>
                        <div class="col-sm-6 packae-label">
                           <label for="package">Package</label>
                           <select name="package" id="package" onchange="myFunction()">
                              <option value="0">--Select--</option>
                              <option value="22">Traditional ($22)</option>
                              <option value="24">Gourmet ($24)</option>
                              <option value="26">Deluxe ($26)</option>
                              <option value="22">Traditional Indian ($22)</option>
                              <option value="24">Gourmet Indian ($24)</option>
                              <option value="26">Deluxe Indian ($26)</option>
                           </select>
                        </div>
                        <div class="col-sm-6 packae-label col_2">
                           <label for="person">How many Persons</label>
                           <div class="col-md-4 col-sm-12">
                              <div class="form-group"><span class="wpcf7-form-control-wrap number-adults">
                                 <input type="number" name="adults" id="number-adults" value="" class="wpcf7-form-control wpcf7-number wpcf7-validates-as-number" min="0" aria-invalid="true" placeholder="Adults (13 years +)" onchange="myFunction()"></span> 
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-12">
                              <div class="form-group"><span class="wpcf7-form-control-wrap number-children-over"><input type="number" name="children" id="number-children-over" value="" class="wpcf7-form-control wpcf7-number wpcf7-validates-as-number" min="0" aria-invalid="false" placeholder="Children (5-12 years)" onchange="myFunction()"></span></div>
                           </div>
                           <div class="col-md-4 col-sm-12">
                              <div class="form-group"><span class="wpcf7-form-control-wrap number-Children-under"><input type="number" id="number-children-under"name="Children-under" value="" class="wpcf7-form-control wpcf7-number wpcf7-validates-as-number" min="0" aria-invalid="false" placeholder="Children (4 and under)" onchange="myFunction()"></span></div>
                           </div>
                        </div>
                     </div>
                     <fieldset class="form-style salads pkg-salads">
                        <p><label>Would you like salads included?</label></p>
                        <div class="check_box-otption"><label>No <input type="radio" style="visibility: visible !important;
                           opacity: 2 !important;
                           display: inline-block !important;
                           vertical-align: middle !important;
                           width: 15% !important;
                           height: 15% !important;" name="salads" checked="" onchange="Opensaladdiv();myFunction();" value="no" id="option-no"></label>
                           <label>Yes 
                           <input type="radio"  style="visibility: visible !important;
                              opacity: 2 !important;
                              display: inline-block !important;
                              vertical-align: middle !important;
                              width: 15% !important;
                              height: 15% !important;" name="salads" value="yes" id="option-yes" onchange="Opensaladdiv();myFunction();"></label>
                        </div>
                     </fieldset>
                     <fieldset class="form-style salads-div" id="display-div" style="clear: both; display: none;">
                        <p>
                           <legend class="pkg-heading">SALADS
                        </legend></p>
                        <div class="left_box-salads">
                           <input type="number" name="Garden" value="0" id="Garden" onchange="myFunction()"  min="0">
                           <label for="Garden">Garden</label>
                        </div>
                        <div class="left_box-salads">
                           <input type="number" name="Greek" value="0" id="Greek" onchange="myFunction()" min="0">
                           <label for="Greek">Greek</label>
                        </div>
                        <div class="left_box-salads">
                           <input type="number" name="Penne" value="0" id="Penne-Pesto" onchange="myFunction()"  min="0">
                           <label for="Penne Pesto">Penne Pesto</label>
                        </div>
                     </fieldset>
                     <!------------------->
                     <fieldset class="form-style pasta-div" id="display-div" style="clear: both; display: none;">
                        <p>
                           <legend class="pkg-heading">PASTA
                        </legend></p>
                        <div class="left_box-pasta">
                           <input type="number" name="Garden" value="0" id="Garden" onchange="smyFunction()"  min="0">
                           <label for="Garden">Garden</label>
                        </div>
                        <div class="left_box-pasta">
                           <input type="number" name="Greek" value="0" id="Greek" onchange="smyFunction()" min="0">
                           <label for="Greek">Greek</label>
                        </div>
                        <div class="left_box-pasta">
                           <input type="number" name="Penne" value="0" id="Penne-Pesto" onchange="smyFunction()"  min="0">
                           <label for="Penne Pesto">Penne Pesto</label>
                        </div>
                     </fieldset>
                     <!------------------->
                     <fieldset class="form-style salads pkg-salads">
                        <p><label>Would you like Pasta included?</label></p>
                        <div class="check_box-otption">
                           <label>No <input type="radio" style="visibility: visible !important;
                              opacity: 2 !important;
                              display: inline-block !important;
                              vertical-align: middle !important;
                              width: 15% !important;
                              height: 15% !important;" name="pasta" checked="" onchange="Openpastadiv();smyFunction();" value="no" id="no1"></label>
                           <label>Yes <input type="radio" style="visibility: visible !important;
                              opacity: 2 !important;
                              display: inline-block !important;
                              vertical-align: middle !important;
                              width: 15% !important;
                              height: 15% !important;"  name="pasta" value="yes" id="option-yes" onchange="Openpastadiv();smyFunction();"></label>
                        </div>
                     </fieldset>
                     <fieldset class="form-style pasta-div hjefeffe" id="display-div2" style="clear: both; display: none;">
                        <p>
                           <legend class="pkg-heading">Pasta
                        </legend></p>
                        <div class="left_box-pasta">
                           <input type="number" name="hariyali" value="0" id="hariyali" onchange="smyFunction()"  min="0">
                           <label for="Hariyali Penne Pastas">Hariyali Penne Pastas</label>
                        </div>
                        <div class="left_box-pasta">
                           <input type="number" name="chefs" value="0" id="chefs" onchange="smyFunction()" min="0">
                           <label for="Chefs Special Pasta"> Chefs Special Pasta</label>
                        </div>
                        <div class="left_box-pasta">
                           <input type="number" name="creamy" value="0" id="creamy" onchange="smyFunction()"  min="0">
                           <label for="Creamy chicken pesto pasta">Creamy chicken pesto pasta</label>
                        </div>
                        <div class="left_box-pasta">
                           <input type="number" name="boscaiola" value="0" id="boscaiola" onchange="smyFunction()"  min="0">
                           <label for="Boscaiola pasta">Boscaiola pasta</label>
                        </div>
                        <div class="left_box-pasta">
                           <input type="number" name="bolognaise" value="0" id="bolognaise" onchange="smyFunction()"  min="0">
                           <label for="Bolognaise pasta">Bolognaise pasta</label>
                        </div>
                     </fieldset>
                     <input type="hidden" name="total_price" id="total_price" >
                     <input type="hidden" name="package_name" id="package_name" value="" />
                     <div class="send_to_email">
                        <input type="text" name="dy_name" placeholder="Name" id="name">
                        <input type="text" name="dy_email" placeholder="Email" id="email">
                        <input type="text" name="dy_phone" placeholder="Phone" id="phone">
                     </div>
                     <div class="tottle-number">
                        <label>Total</label>
                        <h4 id="Total">$0</h4>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <ul style="text-align: left;">
                              <li>Minimum spend for Live Catering is $1000</li>
                              <li>Travel charges may apply for outer areas</li>
                              <li>Please select 5 varieties of Pizzas from selected package</li>
                              <!--<li>Please select any of one varieties of starters and deserts</li>--->
                           </ul>
                        </div>
                     </div>
                     <div class="both-btn">
                        <input type="submit" name="instant_quote" value="Email me Quote" class="button-submit"  onclick="return validateMyForm(event);" >
                        <a id="myBtn" class="button-submit">Book Now</a>
                     </div>
                  </form>
               </div>
               <div id="myModal" class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                     <span class="close">&times;</span>
                     <div class="main-column">
                        <div class="two-half">
                           <img src="https://misfitamigos.com/goodfella/wp-content/uploads/2023/07/goodfellas_dark_1@300xbb.png" alt="goodfellaspizzeriagreystanes" id="logo" data-height-percentage="88" data-actual-width="300" data-actual-height="153">
                        </div>
                        <div class="ten-half">
                           <p>Booking at <strong style="color: #ce2222;">Goodfellas Pizzeria</strong> <br> on <strong><?php echo date('l, F d, Y'); ?></strong> for <span class="model_adulttop">1</span> person</p>
                        </div>
                     </div>
                     <form method="post">
                        <div class="send_to_email2">
                           <input type="hidden" id="model_total" name="model_total">
                           <!--<input type="hidden" id="model_email" name="model_email">
                              <input type="hidden" id="model_name" name="model_name">
                              <input type="hidden" id="model_phone" name="model_phone">-->
                           <input type="hidden" id="model_adults" name="model_adults">
                           <input type="hidden" id="model_children" name="model_children">
                           <input type="hidden" id="model_under_children" name="model_under_children">
                           <input type="hidden" id="model_package" name="model_package">
                           <input type="hidden" id="model_package_name" name="model_package_name">
                           <input type="hidden" id="twtyper" name="twtyper">
                           <input type="hidden" id="model_garden" name="model_garden">
                           <input type="hidden" id="model_greek" name="model_greek">
                           <input type="hidden" id="model_penne" name="model_penne">
                           <input type="hidden" id="model_hariyali" name="model_hariyali">
                           <input type="hidden" id="model_chefs" name="model_chefs">
                           <input type="hidden" id="model_creamy" name="model_creamy">
                           <input type="hidden" id="model_boscaiola" name="model_boscaiola">
                           <input type="hidden" id="model_bolognaise" name="model_bolognaise">
                           <input type="text" id="alternate" size="30" name="booking-date" value="<?php echo date('l, F d, Y'); ?>">
                           <div id="datepicker"></div>
                           <h2 style="font-size: 17px;font-weight: 700;margin-top: 22px;">Event Address</h2>
                           <div class="form-address">
                              <div class="form-group width-50">
                                 <label>UNIT NUMBER</label>
                                 <input class="form-control" type="text" name="unit_number">
                              </div>
                              <div class="form-group width-50">
                                 <label>STREET NUMBER</label>
                                 <input class="form-control" type="text" name="street_number">
                              </div>
                              <div class="form-group width-100">
                                 <label>STREET</label>
                                 <input class="form-control" type="text" name="street">
                              </div>
                              <div class="form-group width-60">
                                 <label>SUBURB</label>
                                 <input class="form-control" type="text" name="suburb">
                              </div>
                              <div class="form-group width-40">
                                 <label>POSTCODE</label>
                                 <input class="form-control" type="text" name="postcode" placeholder="optional">
                              </div>
                              <div class="form-group width-50">
                                 <label>Name</label>
                                 <input class="form-control" type="text" name="model_name" id="model_name">
                              </div>
                              <div class="form-group width-50">
                                 <label>Phone Number</label>
                                 <input class="form-control" type="text" name="model_phone" id="model_phone">
                              </div>
                              <div class="form-group width-100">
                                 <label>Email</label>
                                 <input class="form-control" type="text" name="model_email" id="model_email">
                              </div>
                           </div>
                        </div>
                        <div class="send_to_email2 booking">
                           <h5> Booking for- </h5>
                           <span>Adults: <b><span class="model_adulttop">1</span></b></span><br>
                           <span>Children (5-12 years): <b><span id="childrentop">1</span></b></span><br>
                           <span>Children (4 and under): <b><span id="childrenundertop">1</span></b></span><br>
                        </div>
                        <div class="send_to_email2 booking">
                           <h5 class="select_time">Select a Time</h5>
                           <div class="radio-toolbar">
                              <!-- <input type="radio" id="radio1" name="booking-time" value="1:00AM" checked><label for="radio1">1:00AM</label>
                                 <input type="radio" id="radio2" name="booking-time" value="2:00AM"><label for="radio2">2:00AM</label>
                                 <input type="radio" id="radio3" name="booking-time" value="3:00AM"><label for="radio3">3:00AM</label>
                                 <input type="radio" id="radio4" name="booking-time" value="4:00AM"><label for="radio4">4:00AM</label>
                                 <input type="radio" id="radio5" name="booking-time" value="5:00AM"><label for="radio5">5:00AM</label>
                                 <input type="radio" id="radio6" name="booking-time" value="6:00AM"><label for="radio6">6:00AM</label>
                                 <input type="radio" id="radio7" name="booking-time" value="7:00AM"><label for="radio7">7:00AM</label>
                                 <input type="radio" id="radio8" name="booking-time" value="8:00AM"><label for="radio8">8:00AM</label>
                                 <input type="radio" id="radio9" name="booking-time" value="9:00AM"><label for="radio9">9:00AM</label>-->
                              <input type="radio" id="radio10" name="booking-time" value="10:00AM"><label for="radio10">10:00AM</label>
                              <input type="radio" id="radio11" name="booking-time" value="11:00AM"><label for="radio11">11:00AM</label>
                              <input type="radio" id="radio12" name="booking-time" value="12:00AM"><label for="radio12">12:00AM</label>
                              <input type="radio" id="radio13" name="booking-time" value="1:00PM"><label for="radio13">1:00PM</label>
                              <input type="radio" id="radio14" name="booking-time" value="2:00PM"><label for="radio14">2:00PM</label>
                              <input type="radio" id="radio15" name="booking-time" value="3:00PM"><label for="radio15">3:00PM</label>
                              <input type="radio" id="radio16" name="booking-time" value="4:00PM"><label for="radio16">4:00PM</label>
                              <input type="radio" id="radio17" name="booking-time" value="5:00PM"><label for="radio17">5:00PM</label>
                              <input type="radio" id="radio18" name="booking-time" value="6:00PM"><label for="radio18">6:00PM</label>
                              <input type="radio" id="radio19" name="booking-time" value="7:00PM"><label for="radio19">7:00PM</label>
                              <input type="radio" id="radio20" name="booking-time" value="8:00PM"><label for="radio20">8:00PM</label>
                              <input type="radio" id="radio21" name="booking-time" value="9:00PM"><label for="radio21">9:00PM</label>
                              <input type="radio" id="radio22" name="booking-time" value="10:00PM"><label for="radio22">10:00PM</label>
                              <!--<input type="radio" id="radio23" name="booking-time" value="11:00PM"><label for="radio23">11:00PM</label>
                                 <input type="radio" id="radio24" name="booking-time" value="12:00PM"><label for="radio24">12:00PM</label>-->
                           </div>
                        </div>
                        <span id="payNow" style="color:red;"></span><br>
                        <input type="submit" name="PayNow" id="payNow" value="Pay Now" class="button-submit">
                     </form>
                  </div>
               </div>
               <style>
                  .hhhh {
                  font-size: 24px;
                  color: #fff;
                  }
                  .hjefeffe .left_box-pasta {
                  width: 19%;
                  float: left;
                  margin-left: 3px;
                  }
                  .hjefeffe input {
                  border: gainsboro;
                  background: #f2f2f2;
                  margin-right: 3px;
                  width: 100%;
                  }
                  .hjefeffe label {
                  float: left;
                  font-size: 11px;
                  }
                  legend.pkg-heading {
                  text-align: left;
                  padding-left: 10px;
                  font-family: 'Rubik';
                  font-size: 18px;
                  margin-bottom: 11px;
                  }
                  /* Add this style to hide the arrows */
                  input[type="number"]::-webkit-inner-spin-button,
                  input[type="number"]::-webkit-outer-spin-button {
                  -webkit-appearance: block !important;
                  margin: 0 !important;
                  }
                  input[type="number"] {
                  -moz-appearance: textfield;
                  }
               </style>
               <!--faq section-->
               <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
               <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
               <script>
                  $( function() {
                      var dateToday = new Date();
                    $( "#datepicker" ).datepicker({
                        minDate: +3,
                        altField: "#alternate",
                      altFormat: "DD, d MM, yy"
                    });
                  } );
               </script>
               <script>
                  // Get the modal
                  var modal = document.getElementById("myModal");
                  var btn = document.getElementById("myBtn");
                  var span = document.getElementsByClassName("close")[0];
                  btn.onclick = function() {
                      var TotalP = Number(document.getElementById("total_price").value);
                      var twtyper = (20/100 *TotalP).toFixed(2);
                    //  alert(twtyper);
                       document.getElementById("twtyper").value =twtyper;
                      //document.getElementById("payNow").innerHTML ="Pay 20% now $"+twtyper+" and rest later";
                      //document.getElementById("payNow").innerHTML ="Pay 20% Deposite now. Balance wll be payable on the day of the Event";
                  var packaged = document.getElementById("package").value;
                    var adults = Number(document.getElementById("number-adults").value);
                    var name = document.getElementById("name").value;
                    var email = document.getElementById("email").value;
                    var phone = document.getElementById("phone").value;
                    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                   // alert(packaged);
                    var children = document.getElementById("number-children-over").value;
                    var children_under = document.getElementById("number-children-under").value;
                    var Garden = document.getElementById("Garden").value;
                    var Greek = document.getElementById("Greek").value;
                    var Penne = document.getElementById("Penne-Pesto").value;
                    
                     var hariyali = document.getElementById("hariyali").value;
                     var chefs = document.getElementById("chefs").value;
                      var creamy = document.getElementById("creamy").value;
                      var boscaiola = document.getElementById("boscaiola").value;
                      var bolognaise = document.getElementById("bolognaise").value;
                    
                    
                    
                     var packaged_name = document.getElementById("package").options[document.getElementById("package").selectedIndex].text;
                     
                    if(packaged=='0')
                    { 
                      alert("Please Select Package");
                      e.preventDefault();
                      return false;
                    }
                    /*else if(adults<30 || adults=='')
                    {
                      alert("Adults value should be 30");
                     e.preventDefault();
                      return false;
                    }*/
                    else if(TotalP< 1000)
                    {
                      alert("Minimum spend for Live Catering is $1000");
                     e.preventDefault();
                      return false;
                    }
                    else if(name=='')
                    {
                      alert("Please Enter your Name");
                     e.preventDefault();
                      return false;
                    }else if(email=='')
                    {
                      alert("Please Enter your Email");
                     e.preventDefault();
                      return false;
                    }else if(reg.test(email) == false)
                    {
                      alert("Please Enter a valid Email");
                     e.preventDefault();
                      return false;
                    }else if(phone=='')
                    {
                      alert("Please Enter your Phone number");
                     e.preventDefault();
                      return false;
                    }else{
                  //e.preventDefault();
                        document.getElementById("model_name").value=name;
                        document.getElementById("model_email").value=email;
                        document.getElementById("model_phone").value=phone;
                        document.getElementById("model_adults").value=adults;
                        document.getElementById("model_children").value=children;
                        document.getElementById("model_under_children").value=children_under;
                        document.getElementById("model_package").value=packaged;
                        document.getElementById("model_package_name").value=packaged_name;
                        document.getElementById("model_total").value=TotalP;
                         document.getElementById("model_hariyali").value=hariyali;
                        document.getElementById("model_chefs").value=chefs;
                        document.getElementById("model_creamy").value=creamy;
                         document.getElementById("model_boscaiola").value=boscaiola;
                         document.getElementById("model_bolognaise").value=bolognaise;
                        document.getElementById("model_garden").value=Garden;
                        document.getElementById("model_greek").value=Greek;
                        document.getElementById("model_penne").value=Penne;
                        document.getElementsByClassName("model_adulttop")[0].innerHTML=adults;
                        document.getElementsByClassName("model_adulttop")[1].innerHTML=adults;
                        document.getElementById("childrenundertop").innerHTML=children;
                        document.getElementById("childrentop").innerHTML=children_under;
                    modal.style.display = "block";
                    } 
                  }
                  span.onclick = function() {
                    modal.style.display = "none";
                  }
                  window.onclick = function(event) {
                    if (event.target == modal) {
                      modal.style.display = "none";
                    }
                  }
               </script>
               <script>
                  function myFunction() {
                    var text = document.getElementById("package").options[document.getElementById("package").selectedIndex].text;
                   
                    document.getElementById("package_name").value=text;
                    var packaged = document.getElementById("package").value;
                    var adults = document.getElementById("number-adults").value;
                    var children = document.getElementById("number-children-over").value;
                    var Garden = document.getElementById("Garden").value;
                    var Greek = document.getElementById("Greek").value;
                    var Penne = document.getElementById("Penne-Pesto").value;
                    var ele = document.getElementsByName('salads');
                    var ele1 = document.getElementsByName('pasta');
                    var hariyali = document.getElementById("hariyali").value;
                    var chefs = document.getElementById("chefs").value;
                    var creamy = document.getElementById("creamy").value;
                    var hariyali = document.getElementById("hariyali").value;
                    var boscaiola  = document.getElementById("boscaiola").value;
                    var bolognaise  = document.getElementById("bolognaise").value;
                    
                    
                   var Gardentotal=0;
                    var Greektotal=0;
                    var Pennetotal=0;
                    var childtotal=0;
                    if(children>=1){
                    childtotal=(Number(packaged)/2) * Number(children);
                    }
                    for(i = 0; i < ele.length; i++) {
                                  if(ele[i].checked)
                                  if(ele[i].value=='yes'){
                                  if(Garden>=1){
                    Gardentotal= (Number(Garden)*80);
                    }
                    if(Greek>=1){
                    Greektotal=(Number(Greek)*80);
                    }
                    if(Penne>=1){
                    Pennetotal= (Number(Penne)*80);
                    }
                  
                              }else{
                                  document.getElementById("Garden").value="0";
                                  document.getElementById("Greek").value="0";
                                  document.getElementById("Penne-Pesto").value="0";
                    var Gardentotal=0;
                    var Greektotal=0;
                    var Pennetotal=0;
                   
                              }
                              }
                    
                    
                   
                    var adulttotal = Number(packaged) * Number(adults);
                    var total=adulttotal+childtotal+Gardentotal+Greektotal+Pennetotal;
                    document.getElementById("Total").innerHTML= "$"+total;
                    document.getElementById("total_price").value= total;
                    //alert(total);
                  }
                  
               </script>
               <script>
                  function Opensaladdiv() {
                   var ele = document.getElementsByName('salads');
                                
                              for(i = 0; i < ele.length; i++) {
                                  if(ele[i].checked)
                                  //alert(ele[i].value);
                                  if(ele[i].value=='yes'){
                                  document.getElementById("display-div").style.display="block";
                              }else{
                                  document.getElementById("display-div").style.display="none"
                              }
                    //alert(total);
                  }
                  }
                  
                  function Opensaladdiv1() {
                   var ele = document.getElementsByName('salads');
                                
                              for(i = 0; i < ele.length; i++) {
                                  if(ele[i].checked)
                                  alert(ele[i].value);
                                  if(ele[i].value=='yes'){
                                  document.getElementById("display-div1").style.display="block";
                              }else{
                                  document.getElementById("display-div1").style.display="none"
                              }
                    //alert(total);
                  }
                  }
                  
                  
                  
                  
                  
               </script>
               <script>
                  $("#no1").click(function(){
                    $("#display-div2").hide();
                  });
               </script>
               <script>
                  function smyFunction() {
                    var text = document.getElementById("package").options[document.getElementById("package").selectedIndex].text;
                                document.getElementById("package_name").value=text;
                    var packaged = document.getElementById("package").value;
                    var adults = document.getElementById("number-adults").value;
                    var children = document.getElementById("number-children-over").value;
                    var ele1 = document.getElementsByName('pasta');
                    var hariyali = document.getElementById("hariyali").value;
                    var chefs = document.getElementById("chefs").value;
                    var creamy = document.getElementById("creamy").value;
                    var boscaiola  = document.getElementById("boscaiola").value;
                    var bolognaise  = document.getElementById("bolognaise").value;
                    
                    
                   var hariyalitotal=0;
                    var chefstotal=0;
                    var creamytotal=0;
                    var boscaiolatotal=0;
                    var bolognaisetotal=0;
                    
                    var childtotal=0;
                    if(children>=1){
                    childtotal=(Number(packaged)/2) * Number(children);
                    }
                    for(i = 0; i < ele1.length; i++) {
                                  if(ele1[i].checked)
                                  if(ele1[i].value=='yes'){
                                  if(hariyali>=1){
                    hariyalitotal= (Number(hariyali)*100);
                    }
                    if(chefs>=1){
                    chefstotal=(Number(chefs)*100);
                    }
                    if(creamy>=1){
                    creamytotal= (Number(creamy)*100);
                    }
                     if(boscaiola>=1){
                    boscaiolatotal= (Number(boscaiola)*100);
                    }
                     if(bolognaise>=1){
                    bolognaisetotal= (Number(bolognaise)*100);
                    }
                    
                  
                              }else{
                                  document.getElementById("hariyali").value="0";
                                  document.getElementById("chefs").value="0";
                                  document.getElementById("creamy").value="0";
                  				document.getElementById("boscaiola").value="0";
                  				document.getElementById("bolognaise").value="0";
                    var hariyalitotal=0;
                    var chefstotal=0;
                    var creamytotal=0;
                    var boscaiolatotal=0;
                    var bolognaisetotal=0;
                    
                   
                              }
                              }
                    
                    
                   
                    var adulttotal = Number(packaged) * Number(adults);
                    var total=adulttotal+childtotal+hariyalitotal+chefstotal+creamytotal+boscaiolatotal+bolognaisetotal;
                    document.getElementById("Total").innerHTML= "$"+total;
                    document.getElementById("total_price").value= total;
                    //alert(total);
                  }
                  
               </script>
               <script>
                  function Openpastadiv() {
                      
                  var ele1= document.getElementsByName('pasta');
                                
                              for(i = 0; i < ele1.length; i++) {
                                  if(ele1[i].checked)
                                  //alert(ele1[i].value);
                                  if(ele1[i].value=='yes'){
                                  document.getElementById("display-div2").style.display="block";
                              }
                                                   else{
                                  document.getElementById("display-div2").style.display="none"
                              }
                              
                              
                    //alert(total);
                  }
                  }
                  
                  function Openpastadiv1() {
                   var ele = document.getElementsByName('pasta');
                                
                              for(i = 0; i < ele1.length; i++) {
                                  if(ele1[i].checked)
                                  //alert(ele[i].value);
                                  if(ele1[i].value=='yes'){
                                  document.getElementById("display-div2").style.display="block";
                              }
                               if(ele1[i].value=='no'){
                                  document.getElementById("display-div2").style.display="none";
                              }else{
                                  
                                  document.getElementById("display-div2").style.display="none";
                              }
                              
                              
                              
                              
                    //alert(total);
                  }
                  }
                  
                  
               </script>
               <script>
                  function validateMyForm(e)
                  {
                       var packaged = document.getElementById("package").value;
                    var adults = Number(document.getElementById("number-adults").value);
                    var name = document.getElementById("name").value;
                    var email = document.getElementById("email").value;
                    var phone = document.getElementById("phone").value;
                    var TotalP = Number(document.getElementById("total_price").value);
                    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                    //alert(adults);
                    if(packaged=='0')
                    { 
                      alert("Please Select Package");
                      e.preventDefault();
                      return false;
                    }
                   /* else if(adults<30 || adults=='')
                    {
                      alert("Adults value should be 30");
                     e.preventDefault();
                      return false;
                    }*/
                   /* else if(TotalP< 800)
                    {
                      alert("Minimum spend for Live Catering is $800");
                     e.preventDefault();
                      return false;
                    }*/
                    else if(name=='')
                    {
                      alert("Please Enter your Name");
                     e.preventDefault();
                      return false;
                    }else if(email=='')
                    {
                      alert("Please Enter your Email");
                     e.preventDefault();
                      return false;
                    }else if(reg.test(email) == false)
                    {
                      alert("Please Enter a valid Email");
                     e.preventDefault();
                      return false;
                    }else if(phone=='')
                    {
                      alert("Please Enter your Phone number");
                     e.preventDefault();
                      return false;
                    }else{
                  //e.preventDefault();
                        return true;
                    //alert("validations passed");
                    //return true;
                    }
                  }
               </script>
               <script>
                  $('.btn-number').click(function(e){
                      e.preventDefault();
                      
                      fieldName = $(this).attr('data-field');
                      type      = $(this).attr('data-type');
                      var input = $("input[name='"+fieldName+"']");
                      var currentVal = parseInt(input.val());
                      if (!isNaN(currentVal)) {
                          if(type == 'minus') {
                              
                              if(currentVal > input.attr('min')) {
                                  input.val(currentVal - 1).change();
                              } 
                              if(parseInt(input.val()) == input.attr('min')) {
                                  $(this).attr('disabled', true);
                              }
                  
                          } else if(type == 'plus') {
                  
                              if(currentVal < input.attr('max')) {
                                  input.val(currentVal + 1).change();
                              }
                              if(parseInt(input.val()) == input.attr('max')) {
                                  $(this).attr('disabled', true);
                              }
                  
                          }
                      } else {
                          input.val(0);
                      }
                  });
                  $('.input-number').focusin(function(){
                     $(this).data('oldValue', $(this).val());
                  });
                  $('.input-number').change(function() {
                      
                      minValue =  parseInt($(this).attr('min'));
                      maxValue =  parseInt($(this).attr('max'));
                      valueCurrent = parseInt($(this).val());
                      
                      name = $(this).attr('name');
                      if(valueCurrent >= minValue) {
                          $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
                      } else {
                          alert('Sorry, the minimum value was reached');
                          $(this).val($(this).data('oldValue'));
                      }
                      if(valueCurrent <= maxValue) {
                          $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
                      } else {
                          alert('Sorry, the maximum value was reached');
                          $(this).val($(this).data('oldValue'));
                      }
                      
                      
                  });
                  $(".input-number").keydown(function (e) {
                          // Allow: backspace, delete, tab, escape, enter and .
                          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                               // Allow: Ctrl+A
                              (e.keyCode == 65 && e.ctrlKey === true) || 
                               // Allow: home, end, left, right
                              (e.keyCode >= 35 && e.keyCode <= 39)) {
                                   // let it happen, don't do anything
                                   return;
                          }
                          // Ensure that it is a number and stop the keypress
                          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                              e.preventDefault();
                          }
                      });
               </script>
               </script>	
            </div>
            <!-- .entry-content -->
            <?php
               if ( ! $is_elementor_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
               ?>
            </<?php echo $container_tag; ?>> <!-- .et_pb_post -->
            <?php endwhile; ?>
            <?php if ( ! $is_elementor_used ) : ?>
         </div>
         <!-- #left-area -->
         <?php get_sidebar(); ?>
      </div>
      <!-- #content-area -->
   </div>
   <!-- .container -->
   <?php endif; ?>
</div>
<!-- #main-content -->
<?php
get_footer();