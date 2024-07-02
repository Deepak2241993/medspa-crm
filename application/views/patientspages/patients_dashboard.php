<!-- Page Container START -->
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">

                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                                            <i class="anticon anticon-dollar"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <h2 class="m-b-0" style="background: whitesmoke;">$<?php echo $patient_data['total_rev'];?></h2>
                                            <p class="m-b-0 text-muted">Total Revenue</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body" style="
    width: 257px;
">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                            <i class="anticon anticon-line-chart"></i>
                                        </div>
        <?php $last_v=end($patient_data['data']);
        $last_visit = $last_v?$last_v['created_at']:'';
     //   date('Y-m-d', strtotime($last_visit));
       $d = date('Y-m-d', strtotime($last_visit));
     //   echo'<pre>';print_r($last_visit);die;
        ?>
                                        <div class="m-l-15">
                                            <h2 class="m-b-0" style="background: whitesmoke;"><?php echo $last_v?$d:'';?></h2>
                                            <p class="m-b-0 text-muted">Last Visit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                                            <i class="anticon anticon-profile"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <h2 class="m-b-0" style="background: whitesmoke;"><?php if(empty($patient_data['data'])){echo '0';}else{echo $patient_data['data'][0]['contact_source'];}?></h2>
                                            <p class="m-b-0 text-muted">Contact Source</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                                            <i class="anticon anticon-dollar"></i>
                                        </div>
                                        <div class="m-l-15">
                                <?php 
                                if(isset($money_walite_cost) && !empty($money_walite_cost))
                                {
                                    $money= $money_walite_cost;
                                }
                                else
                                {
                                    $money= '0';
                                } 
                                    if(!empty($patient_data['data']))
                                    {
                                        $url = base_url().'patients/walite_view?pid='.$patient_data['data'][0]['pid'];
                                    }
                                    else
                                    {
                                        $url = '#';
                                    }

                                ?>
<a href="<?= $url ?>" title="Wallete View">  <h2 id="m_wallet" class="m-b-0" style="background: whitesmoke;">$<?php echo $money;?></h2></a>
      
                                            <a type="button" id="btn_money_w" class="btn"  data-toggle="modal" data-target="#successModal">Add Money In Wallet</a>
                                        </div>
                                    </div>
                </div>
            </div>
        </div>
                        
                    <!--     <div class="col-md-6 col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                                            <i class="anticon anticon-profile"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <p class="m-b-0 text-muted"><button type="button" id="btn_money_w" class="btn btn-primary btn-xs float-right cst-btn" style="height: 80px;" data-toggle="modal" data-target="#successModal">Add Money In Wallet</button></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                <!-- <div class="col-md-6 col-lg-2">
                            <div class="card">
                                <div class="card-body">
                                       <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar avatar-icon avatar-lg avatar-gold">
                                            <i class="anticon anticon-profile"></i>
                                        </div>
                                       
                                            <div class="btn-group">
                                              
                                                <button class="btn btn-default">
                                                    <span>Year</span>
                                                </button>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php
                        if(!empty($patient_data['data']))
                        {
                        ?>
                    <input type="hidden" name="p_ids" id="p_ids" value="<?php echo $patient_data['data'][0]['pid'];?>">
                    <?php
                        }
                        ?>
                        </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                     <!--    <h5>Patient Activity</h5>-->                                    
                                         <div>
                                            <div class="btn-group">
                                                <p class="btn btn-default "style="background-color: #ededed;">
                                                    <span>Patient Dashboard</span>
                                                </p>
                                             
                                            </div>
                                        </div>
                                    </div>
<br/>
     <div class="m-t-501" style="height: 575px">
                                        <!-- <canvas class="chart" id="revenue-chart"></canvas> -->
        <div class="table-responsive">
<table id="data-table" class="table table-bordered">
     <thead>
        <tr>
            <th>SR No.</th>
            <th>Patient Name</th>
            <th>Service</th>
            <th>Sub Service</th>
            <th>Paymont Method</th>
            <th>Total Qty</th>
            <th>Dis. Amount</th>
            <th>Bill Amount</th>
            <th>Total Amount</th>
            <th>Created Date</th>
            <th>Created Time</th>
            <th>Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $sr =1;
        foreach($invoices_list as $data){
           // echo'<pre>';print_r($data);die;?>
        <tr class="<?=$data['id']?>">
            <td><?=$sr?></td>
            <td><?=$data['pname']?></td>
            <td><?=$data['services']?></td>
            <td><?=$data['products']?></td>
            <td><?=$data['method_name']?></td>
            <td><?=$data['Qty']?></td>
            <td>$<?=$data['damount']?></td>
            <td>$<?=$data['bamount']?></td>
            <td>$<?=$data['tamount']?></td>
            <td><?= date('d-m-Y',strtotime($data['created_at']))?></td>
            <td><?= date('H:s:s',strtotime($data['created_at']))?></td>
            <td>
                <?php if(isset($data['nsd_id']) && !empty($data['nsd_id'])){?>
                <a href="<?=base_url()?>patients/view?nsd_id=<?= $data['nsd_id']?>" class="btn btn-primary btn-xs">View</a>
               <?php }?>

               <?php 
               if(isset($data['pn_id']) && !empty($data['pn_id']))
                {?>
                <a href="<?=base_url()?>patients/view?pn_id=<?= $data['pn_id']?>" class="btn btn-primary btn-xs">View</a>
               <?php 
                }
                ?>

            </td>

         
        </tr>
        <?php
        $sr++;
    }
        ?>
    </tbody>

    <!--<tfoot>
        <tr>
            <th>...</th>
        </tr>
    </tfoot>-->
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Content Wrapper END -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
      <script src="<?=base_url()?>assets/js/ajax.js"></script>
    <script type="text/javascript">
        $('#ttype').change(function(){  debugger;
   var sid = $(this).val();
   $('#ttypesub').empty('');
   $("#ttypesub").append('<option value="'+''+'">'+' Select Product '+'</option>');
   var res=document.URL;
   var url = res.split("/patients/dashboard/");
   console.log(res);
   $.ajax({
     url:url[0]+'/invoice/allsubservices',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {sid: sid},
     dataType: 'json',
     success: function(response){ //debugger
       var len = response.length;
    
       if(len > 0){
          // Read values
          $('#typesub').show();
          $.each(response,function(key,value){

                 $("#ttypesub").append('<option value="'+value.sub_service_name+'">'+value.sub_service_name+'</option>');

              });
          
 
       }else{
         $('#typesub').hide();
        // $('#typesub').empty('');
       }
 
     }
  });
 });

 $('#ttypesub').change(function(){  //debugger;
   var sid = $("#ttype").val();
   var ssid = $(this).val();
  // $('#ttypesub').empty('');
  // $("#ttypesub").append('<option value="'+''+'">'+' Select Product '+'</option>');
   var res=document.URL;
   var url = res.split("/dashboard/");
   console.log(res);
   $.ajax({
     url:url[0]+'/get_product_cost_data',//baseURL+'index.php/user/userDetails',
     method: 'get',
     data: {sid: sid,ssid:ssid},
     dataType: 'json',
     success: function(response){ //debugger
       var len = response.length;
    
       if(len > 0){
                  $('#current_sell_cost').val(response[0].current_sell_cost);
 
       }else{

                $('#current_sell_cost').val('');
       }
 
     }
  });
 });

 function sal_amount_cal() { //debugger;
  $("#discount").val(''); 
  var Qty= $("#mquantity").val(); 
  var cost= $("#current_sell_cost").val(); 
  if(Qty !='' && cost !=''){
    var bill_amt=parseInt(cost) * parseInt(Qty);

  $("#bamount").val(bill_amt);

  }else{
    $("#bamount").val(bill_amt);
  }
  }

  function Disc_cal() { //debugger;
  $("#discount").val(''); 
  var netAmt= $("#bamount").val(); 
  var Amt= $("#amount").val(); 
  if(parseInt(Amt) < parseInt(netAmt)){
    var dis_amt= parseInt(netAmt) - parseInt(Amt);
 // var dis_per=parseInt(Amt) / (dis_amt);
  var f_dis= (dis_amt / parseInt(Amt)) * 100;
  var dis=f_dis.toFixed(2);
  $("#discount").val(dis);

  }
}

 $(document).on('submit', '#type_of_listing_frm', function(event) {
        event.preventDefault();
        var service = $('#ttype').val().trim();
        if (service != '') {
            $.ajax({
                url: "<?php echo base_url() .'patients/insert_money_wallet_data'?>",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                dataType: 'JSON',
                beforeSend: function() { //debugger;
                    $("#type_of_listing_btn").html('Please Wait...');
                    $('input[type=text],button[type=submit]', 'textarea').prop('disabled', true);
                },
                success: function(data) { //debugger;
                    $("#type_of_listing_btn").html('Submit');
                    $('input[type=text],button[type=submit]', 'textarea').prop('disabled', false);
                    if (data['error']) {
                        alert(data.error);
                    } else { //debugger;

                    var str=$("#m_wallet").html();
                    old_money=str.split("$");

                  var old =  old_money[1] ;
                  var new_money = data.namount;
                    var tmp1= parseInt(old) + parseInt(new_money);
                    var tmp='$'+ tmp1;
                    $("#m_wallet").html('');
                    $("#m_wallet").html(tmp);
                        $('#type_of_listing_frm')[0].reset();
                        alert(data.success);
                        $('#successModal').modal('hide');
                        
                    }
                }
            });
            
        } else {
                 alert('Fields are Required');
        }
    });

 $("#btn_money_w").click(function(){ //debugger

    var p_ids = $("#p_ids").val();

    var pids =$("#pids").val(p_ids);
});

    </script>