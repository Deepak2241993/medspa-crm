<div class="page-container">
   <!-- Content Wrapper START -->
   <div class="main-content">
        <div class="card">
            <div class="card-body"> 
            <?php if($this->session->flashdata('success')){
                                 echo $this->session->flashdata('success');
                                 }if($this->session->flashdata('error')){
                                 echo $this->session->flashdata('error');
                                 }?>
                <table class="table" border='1'>
                <thead>
                   <center> <h3>Transaction Number:<?=$temp_store_service[0]->transaction_id?></h3></center>
                    <tr>
                        <th>Service Name</th>
                        <th>Price</th>
                        <th>Number of Session</th>
                        <th>Amount</th>
                    </tr>  
                </thead>
                <tbody>
                <?php 
                    $service_id= json_decode($temp_store_service[0]->service_id);
		            $final_session_purchase= json_decode($temp_store_service[0]->service_session_number_cr);
                    // print_r($temp_store_service[0]->service_category_id); die();
                    $netpay=0;
                foreach($service_id as $key=>$value)
                    {
                        $serviceresult=$this->MasterModel->get_databy_id($value,'services');
        
                        $service_name=$serviceresult[0]->service_name;
                        $service_charge=$serviceresult[0]->service_charge;
                        $payble_amount =$final_session_purchase[$key]*$service_charge;

                        $netpay=$netpay + $payble_amount;
                        ?>
                    <tr>
                        <td><?=$service_name ?></td>
                        <td><?=$service_charge;?></td>
                        <td><?=$final_session_purchase[$key];?></td>
                        <td>$<?=$final_session_purchase[$key]*$service_charge ?></td>
				    </tr>
                    <?php } ?>
                    <tr><td  colspan='2'></td><td style="color:blue;font-weight: 700;">Net Amount:</td><td style="color:balack;font-weight: 700;"id="netamount"><span>$</span><?=$netpay?></td></tr>
                    <tr><td colspan='2'></td><td style="color:orage;font-weight: 700;">Discount in %:</td><td style="color:balack;font-weight: 700;"><input type="number" id="discountPercent" name="discount" class="form-control" onkeyup="calculateDiscount()"></td></tr>
                    <tr><td  colspan='2' ></td><td style="color:green;font-weight: 700;">Net Payble Amount:</td><td style="color:green;font-weight: 700;" id="discountedPrice">$<?=$netpay?></td></tr>
				<!-- Add more rows as needed -->
			</tbody>
		</table>
        <!-- <h4>Please Fill OTP</h4> -->
        <form action="<?=base_url()?>patients/payment_of_service_wallet/<?=$temp_store_service[0]->id?>" method="post">
            <div class="row">
            <div class="col-md-12">
            <input type="hidden" name="patient_id" id="patient_id" class="form-control" value="<?=$temp_store_service[0]->patient_id?>" >
            <input type="hidden" name="transaction_id" id="patient_id" class="form-control" value="<?=$temp_store_service[0]->transaction_id?>" >
            <input type="hidden" name="discount" class="form-control discountPercent" value="0">
            <input type="hidden" name="discounted_price_pay" class="form-control discountedPrice" value="<?=$netpay?>">
            </div>
            <div class="col-md-6">
            <button type="submit" name="submit" class="btn btn-primary" id="discountedPrice_pay_button">Pay $<?=$netpay?></button>
            </div>
            </div>
                </form>
            </div>
        </div>
        <!-- <a href="<?=base_url()?>patients/payment_of_service_wallet/<?=$temp_store_service[0]->id?>/<?=$temp_store_service[0]->patient_id?>/<?=$temp_store_service[0]->transaction_id?>" name="submit" class="btn btn-primary">Pay $<?=$netpay?></a> -->
    </div>
</div>


<script>
    function calculateDiscount(){
        let discountPercentage = parseFloat($('#discountPercent').val());
        let netamount  = $('#netamount').text().replace("$", "");
       let originalPrice  = parseFloat(netamount);
        // alert(originalPrice );

        var discountAmount = (originalPrice * discountPercentage) / 100;
        var discountedPrice = originalPrice - discountAmount;

    // Display the discounted price

    //  for view
    $("#discountedPrice").text('$'+discountedPrice.toFixed(2));
    $("#discountPercent").val(discountPercentage);
    //  for view end

    $(".discountPercent").val(discountPercentage);
    $(".discountedPrice").val(discountedPrice.toFixed(2));
    $("#discountedPrice_pay_button").text('$' + discountedPrice.toFixed(2) + ' Pay');
    
    
    }
    </script>