<?php // echo'<pre>';print_r($data);echo'</br>';print_r($patient_name);die;?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Invoice</title>
      <!-- Favicon -->
      <link rel="icon" href="<?=base_url()?>assets/images/logo/favicon.png" type="image/x-icon" />
      <link href="<?=base_url()?>assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="<?=base_url()?>assets/css/app.min.css" rel="stylesheet">
      <!-- Invoice styling -->
      <style>
         body {
         font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
         text-align: center;
         color: #777;
         }
         body h1 {
         font-weight: 300;
         margin-bottom: 0px;
         padding-bottom: 0px;
         color: #000;
         }
         body h3 {
         font-weight: 300;
         margin-top: 10px;
         margin-bottom: 20px;
         font-style: italic;
         color: #555;
         }
         body a {
         color: #06f;
         }
         #btn{
         padding:10px;
         border: 0px;
         margin: 50px;
         cursor: pointer;
         }
         .invoice-box {
         max-width: 800px;
         margin: auto;
         padding: 30px;
         border: 1px solid #eee;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
         font-size: 16px;
         line-height: 24px;
         font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
         color: #555;
         }
         .invoice-box table {
         width: 100%;
         line-height: inherit;
         text-align: left;
         border-collapse: collapse;
         }
         .invoice-box table td {
         padding: 1px;
         vertical-align: top;
         }
         .invoice-box table tr td:nth-child(2) {
         text-align: right;
         }
         .invoice-box table tr.top table td {
         padding-bottom: 10px;
         }
         .invoice-box table tr.top table td.title {
         font-size: 45px;
         line-height: 45px;
         color: #333;
         }
         .invoice-box table tr.information table td {
         padding-bottom: 20px;
         }
         .invoice-box table tr.heading td {
         background: #eee;
         border-bottom: 1px solid #ddd;
         font-weight: bold;
         }
         .invoice-box table tr.details td {
         padding-bottom: 20px;
         }
         .invoice-box table tr.item td {
         border-bottom: 1px solid #eee;
         }
         .invoice-box table tr.item.last td {
         border-bottom: none;
         }
         .invoice-box table tr.total td:nth-child(2) {
         border-top: 2px solid #eee;
         font-weight: bold;
         }
         @media only screen and (max-width: 600px) {
         .invoice-box table tr.top table td {
         width: 100%;
         display: block;
         text-align: center;
         }
         .invoice-box table tr.information table td {
         width: 100%;
         display: block;
         text-align: center;
         }
         }
      </style>
   </head>
   <body>
      <br /><br /><br />
      <div class="invoice-box">
         <table>
            <tr class="top">
               <td colspan="4">
                  <table>
                     <tr>
                        <td class="title">
                           <img src="<?=base_url()?>assets/images/logo/billlogo.png" alt="Company logo" style="width: 70%; max-width: 200px" />
                        </td>
                        <td>
                           <span> <i class="fas fa-phone-alt"></i> (201) 340 - 4809</span><br />
                           <span> <i class="fas fa-envelope"></i> info@forevermedspanj.com</span><br /> <span> <i class="fas fa-globe"></i> www.forevermedspanj.com</span>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr>
            <td colspan="4"><hr/></td>
            </tr>
            <tr class="information">
              
               <td colspan="2">
                  <table>
                     <tr>
                        <td>
                           Patient Name : <?php echo $patient_name;?><br />
                           Date of Invoice : <?php echo $data[0]['created_at'];?><br />
                        </td>
                        <td>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr class="heading">
               <td>Service</td>
               <td style="text-align:left">Qty</td>
               <td>Rate</td>
               <td>Amount</td>
            </tr>
            <!--  For Wallet Calculation -->
                  <?php 
                     $this->load->model('MasterModel');
                     $walletServicedata=json_decode($data[0]['wallet_service_id']);
                     $wallet_session_use=json_decode($data[0]['wallet_service_session_qty_use']);
                     foreach($walletServicedata as $key=>$value){
                        if(!empty($value))
                        {
                        $serviceresult=$this->MasterModel->get_databy_id($value,'services');
                        ?>
                     <tr class="item">
                     <!--  Wallet Service product use  -->
                        <td><?php echo $serviceresult[0]->service_name ;?></td>
                        <td style="text-align:left"><?php echo $wallet_session_use[$key];?></td>
                        <td><?php echo $serviceresult[0]->service_charge;?></td>
                        <td><?php  echo "NIL";?></td>
                     </tr>
                     <?php }}?>
            <!--  For Wallet Calculation END -->


            <!--  For Service Sale Calculation -->
            <?php 
               $this->load->model('MasterModel');
               $Newdata=json_decode($data[0]['servie_id']);
               $service_session_use=json_decode($data[0]['service_session_qty_use']);
               $wallet_session_use=json_decode($data[0]['wallet_service_session_qty_use']);
              
               foreach($Newdata as $key=>$value){
                  if(!empty($value))
                  {
                  $serviceresult=$this->MasterModel->get_databy_id($value,'services');
                  ?>
            <!-- For Service Product Use -->

            <tr class="item">
              
                  <td><?php echo $serviceresult[0]->service_name ;?></td>
                  <td style="text-align:left"><?php echo $service_session_use[$key];?></td>
                  <td><?php echo $serviceresult[0]->service_charge;?></td>
                  <td><?php if(!empty($serviceresult[0]->service_charge)){ echo $service_session_use[$key]*($serviceresult[0]->service_charge); } else echo "NIL";;?></td>
               </tr>
               <?php }}?>
            <!--  For Service Sale Calculation END -->


            <!--  For Extra Product Sale Calculation -->
            <?php 
               $this->load->model('MasterModel');
               $Newdata=json_decode($data[0]['product_id']);
               $product_qty=json_decode($data[0]['product_qty']);
              
               foreach($Newdata as $key=>$value){
                  if(!empty($value))
                  {
                  $products=$this->ProductModel->getProductById($value,'products');
                  ?>
            <!-- For Extra Product Use -->

            <tr class="item">
              
                  <td><?php echo $products[0]->product_name ;?></td>
                  <td style="text-align:left"><?php echo $product_qty[$key];?></td>
                  <td><?php echo $products[0]->cost;?></td>
                  <td><?php if(!empty($products[0]->cost)){ echo $product_qty[$key]*($products[0]->cost); } else echo "NIL";;?></td>
               </tr>
               <?php }}?>
            <!--  For Extra Product Sale Calculation END -->
               
            </tr>

            <tr class="total">
               <td></td>
               <td colspan="3">Bill Amount: $<?php echo $data[0]['bill_amount'];?></td>
            </tr>
            <tr class="total">
                <td></td>
               <td colspan="3">Discount amount : $<?php echo round($data[0]['discount_amount'], 2);?></td>
            </tr>
            <tr class="total">
                <td></td>
               <td colspan="3">Pay Amount: $<?php if(!empty($data[0]['new_paybale_amount'])){echo $data[0]['new_paybale_amount'];} else { echo "NILL";}?></td>
            </tr>
         </table>
      </div>
      <div style="padding: 12px;">
         <button class="btn btn-primary btn-xs float- cst-btn" id="create_pdf">Generate PDF</button> 
         &nbsp; &nbsp; 
         <a href="<?=base_url()?>invoice/invoice_list" class="btn btn-primary btn-xs float- cst-btn">Go Back</a>           
      </div>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
         <script src="custom.js"></script> -->
      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
      <script>  
         (function () {  
             var  
              form = $('.invoice-box'),  
              cache_width = form.width(),  
              a4 = [595.28, 841.89]; // for a4 size paper width and height  
         
             $('#create_pdf').on('click', function () {  
                 $('body').scrollTop(0);  
                 createPDF();  
             });  
             //create pdf  
             function createPDF() {  
                 getCanvas().then(function (canvas) {  
                     var  
                      img = canvas.toDataURL("image/png"),  
                      doc = new jsPDF({  
                          unit: 'px',  
                          format: 'a4'  
                      });  
                     doc.addImage(img, 'JPEG', 20, 20);  
                     doc.save('invoice.pdf');  
                     form.width(cache_width);  
                 });  
             }  
         
             // create canvas object  
             function getCanvas() {  
                 form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');  
                 return html2canvas(form, {  
                     imageTimeout: 2000,  
                     removeContainer: true  
                 });  
             }  
         
         }());  
      </script>  
      <script>  
         /* 
         * jQuery helper plugin for examples and tests 
         */  
         (function ($) {  
             $.fn.html2canvas = function (options) {  
                 var date = new Date(),  
                 $message = null,  
                 timeoutTimer = false,  
                 timer = date.getTime();  
                 html2canvas.logging = options && options.logging;  
                 html2canvas.Preload(this[0], $.extend({  
                     complete: function (images) {  
                         var queue = html2canvas.Parse(this[0], images, options),  
                         $canvas = $(html2canvas.Renderer(queue, options)),  
                         finishTime = new Date();  
         
                         $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);  
                         $canvas.siblings().toggle();  
         
                         $(window).click(function () {  
                             if (!$canvas.is(':visible')) {  
                                 $canvas.toggle().siblings().toggle();  
                                 throwMessage("Canvas Render visible");  
                             } else {  
                                 $canvas.siblings().toggle();  
                                 $canvas.toggle();  
                                 throwMessage("Canvas Render hidden");  
                             }  
                         });  
                         throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);  
                     }  
                 }, options));  
         
                 function throwMessage(msg, duration) {  
                     window.clearTimeout(timeoutTimer);  
                     timeoutTimer = window.setTimeout(function () {  
                         $message.fadeOut(function () {  
                             $message.remove();  
                         });  
                     }, duration || 2000);  
                     if ($message)  
                         $message.remove();  
                     $message = $('<div ></div>').html(msg).css({  
                         margin: 0,  
                         padding: 10,  
                         background: "#000",  
                         opacity: 0.7,  
                         position: "fixed",  
                         top: 10,  
                         right: 10,  
                         fontFamily: 'Tahoma',  
                         color: '#fff',  
                         fontSize: 12,  
                         borderRadius: 12,  
                         width: 'auto',  
                         height: 'auto',  
                         textAlign: 'center',  
                         textDecoration: 'none'  
                     }).hide().fadeIn().appendTo('body');  
                 }  
             };  
         })(jQuery);  
         
      </script>  
   </body>
</html>