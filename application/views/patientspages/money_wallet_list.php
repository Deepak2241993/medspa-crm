<?php  //echo'<pre>'; echo'<pre>';print_r($money_walite_list[0]['pname']);die('mmm');die;?>

<!-- Page Container START -->

            <div class="page-container">

                



                <!-- Content Wrapper START -->

                <div class="main-content">

                    

                    <div class="row">

                        <div class="col-md-12 col-lg-12">

                            <div class="card">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between align-items-center">

                                     <!--    <h5>Patient Activity</h5>

 -->                                        <div>

                                            <div class="btn-group">

                                                <p class="btn btn-default "style="background-color: #ededed;">

                                                    <?php if(isset($money_walite_list[0]['pname'])){

                                                        $name=$money_walite_list[0]['pname'];

                                                    }else{

                                                        $name='';

                                                    }

                                                    ?>

                                                    <span>Patient Name    : <?=$name?></span>

                                                </p>

                                             

                                            </div>

                                        </div>

                                    </div>

<br/>

     <div class="m-t-501" style="height: 575px">

                                        <!-- <canvas class="chart" id="revenue-chart"></canvas> -->

        <div class="table-responsive">

<table id="data-table" class="table table-bordered">

<?php 

if(isset($money_walite_list) && !empty($money_walite_list)){?>

  <thead>

        <tr>



            <th>SR No.</th>

           <!--  <th>Patient Name</th> -->

            <th>Service Name</th>

            <th>Product Name</th>

            <th>Sell Cost</th>

            <th>Qty</th>

            <th>Bill Amount</th>

            <th>Discount %</th>

            <th>Net Amount</th>

            <th>Status</th>

             <th>Date</th>

           <!--  <th>Action</th> -->

        </tr>

    </thead>

    <tbody>

        <?php

//pid,sid,product_name,sell_cost,qty,bamount,discount_per,namount,created_at,status

        $sr =1;

        foreach($money_walite_list as $data){



            $st=$data['status'];

            if($st==1){

             $status='Not Used';

            }else{

             $status='Userd';   

            }

//echo'<pre>';print_r($data['status']);die;

            // if($data['p_flag']=='1'){

            // $flg='disabled';

            // }else{

            //  $flg='';   

            // }



            ?>

        <tr class="<?=$data['id']?>">

            <td><?=$sr?></td>

          <!--   <td><?=$data['pname']?></td> -->

            <td><?=$data['service_name']?></td>

            <td><?=$data['sub_service_name']?></td>

            <td>$<?=$data['sell_cost']?></td>

            <td><?=$data['qty']?></td>

            <td>$<?=$data['bamount']?></td>

             <td><?=$data['discount_per']?>%</td>

             <td>$<?=$data['namount']?></td>

            <td><span><button type="button"  id="<?php echo $data['id'];?>" <?=$st?> class="btn btn-primary btn-xs float-right cst-btn" style=""><?=$status?></button></span></td>

            <td><?=$data['created_at']?></td>

         



            <!-- <td><a href="<?=base_url()?>patients/patient_note/<?= $data['id']?>" class="btn btn-primary mb-2 btn-xs">Update</a>

            

            <a href="<?=base_url()?>patients/delete_patient_note/<?= $data['id']?>" class="btn btn-danger btn-xs">Delete</a>

            </td> -->

        </tr>

        <?php

        $sr++;

    }

        ?>

    </tbody>



<?php }?>

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

                      <!--   <div class="col-md-12 col-lg-4">

                            <div class="card">

                                <div class="card-body">

                                    <h5 class="m-b-0">Customers</h5>

                                    <div class="m-v-60 text-center" style="height: 200px">

                                        <canvas class="chart" id="customers-chart"></canvas>

                                    </div>

                                    <div class="row border-top p-t-25">

                                        <div class="col-4">

                                            <div class="d-flex justify-content-center">

                                                <div class="media align-items-center">

                                                    <span class="badge badge-success badge-dot m-r-10"></span>

                                                    <div class="m-l-5">

                                                        <h4 class="m-b-0">350</h4>

                                                        <p class="m-b-0 muted">New</p>

                                                    </div>    

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-4">

                                            <div class="d-flex justify-content-center">

                                                <div class="media align-items-center">

                                                    <span class="badge badge-secondary badge-dot m-r-10"></span>

                                                    <div class="m-l-5">

                                                        <h4 class="m-b-0">450</h4>

                                                        <p class="m-b-0 muted">Returning</p>

                                                    </div>    

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-4">

                                            <div class="d-flex justify-content-center">

                                                <div class="media align-items-center">

                                                    <span class="badge badge-warning badge-dot m-r-10"></span>

                                                    <div class="m-l-5">

                                                        <h4 class="m-b-0">100</h4>

                                                        <p class="m-b-0 muted">Others</p>

                                                    </div>    

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div> -->

                    </div>

                    <!--<div class="row">

                        <div class="col-md-12 col-lg-4">

                            <div class="card">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between align-items-center">

                                        <div>

                                            <h2 class="m-b-0">$17,267</h2>

                                            <p class="m-b-0 text-muted">Avg.Profit</p>

                                        </div>

                                        <div>

                                            <span class="badge badge-pill badge-cyan font-size-12">

                                                <span class="font-weight-semibold m-l-5">+5.7%</span>

                                            </span>

                                        </div>

                                    </div>

                                    <div class="m-t-50" style="height: 375px">

                                         <canvas class="chart" id="avg-profit-chart"></canvas>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-12 col-lg-8">

                            <div class="card">

                                <div class="card-body">

                                   <div class="d-flex justify-content-between align-items-center">

                                        <h5>Top Product</h5>

                                        <div>

                                            <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>

                                        </div>

                                    </div>

                                    <div class="m-t-30">

                                        <div class="table-responsive">

                                            <table class="table table-hover">

                                                <thead>

                                                    <tr>

                                                        <th>Product</th>

                                                        <th>Sales</th>

                                                        <th>Earning</th>

                                                        <th style="max-width: 70px">Stock Left</th>

                                                    </tr>

                                                </thead>

                                                <tbody>

                                                    <tr>

                                                        <td>

                                                            <div class="media align-items-center">

                                                                <div class="avatar avatar-image rounded">

                                                                    <img src="<?=base_url()?>assets/images/others/thumb-9.jpg" alt="">

                                                                </div>

                                                                <div class="m-l-10">

                                                                    <span>Gray Sofa</span>

                                                                </div>

                                                            </div>

                                                        </td>

                                                        <td>81</td>

                                                        <td>$1,912.00</td>

                                                        <td>

                                                            <div class="d-flex align-items-center">

                                                                <div class="progress progress-sm w-100 m-b-0">

                                                                    <div class="progress-bar bg-success" style="width: 82%"></div>

                                                                </div>

                                                                <div class="m-l-10">

                                                                    82

                                                                </div>

                                                            </div>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td>

                                                            <div class="media align-items-center">

                                                                <div class="avatar avatar-image rounded">

                                                                    <img src="<?=base_url()?>assets/images/others/thumb-10.jpg" alt="">

                                                                </div>

                                                                <div class="m-l-10">

                                                                    <span>Gray Sofa</span>

                                                                </div>

                                                            </div>

                                                        </td>

                                                        <td>26</td>

                                                        <td>$1,377.00</td>

                                                        <td>

                                                            <div class="d-flex align-items-center">

                                                                <div class="progress progress-sm w-100 m-b-0">

                                                                    <div class="progress-bar bg-success" style="width: 61%"></div>

                                                                </div>

                                                                <div class="m-l-10">

                                                                    61

                                                                </div>

                                                            </div>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td>

                                                            <div class="media align-items-center">

                                                                <div class="avatar avatar-image rounded">

                                                                    <img src="<?=base_url()?>assets/images/others/thumb-11.jpg" alt="">

                                                                </div>

                                                                <div class="m-l-10">

                                                                    <span>Wooden Rhino</span>

                                                                </div>

                                                            </div>

                                                        </td>

                                                        <td>71</td>

                                                        <td>$9,212.00</td>

                                                        <td>

                                                            <div class="d-flex align-items-center">

                                                                <div class="progress progress-sm w-100 m-b-0">

                                                                    <div class="progress-bar bg-danger" style="width: 23%"></div>

                                                                </div>

                                                                <div class="m-l-10">

                                                                    23

                                                                </div>

                                                            </div>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td>

                                                            <div class="media align-items-center">

                                                                <div class="avatar avatar-image rounded">

                                                                    <img src="<?=base_url()?>assets/images/others/thumb-12.jpg" alt="">

                                                                </div>

                                                                <div class="m-l-10">

                                                                    <span>Red Chair</span>

                                                                </div>

                                                            </div>

                                                        </td>

                                                        <td>79</td>

                                                        <td>$1,298.00</td>

                                                        <td>

                                                            <div class="d-flex align-items-center">

                                                                <div class="progress progress-sm w-100 m-b-0">

                                                                    <div class="progress-bar bg-warning" style="width: 54%"></div>

                                                                </div>

                                                                <div class="m-l-10">

                                                                    54

                                                                </div>

                                                            </div>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td>

                                                            <div class="media align-items-center">

                                                                <div class="avatar avatar-image rounded">

                                                                    <img src="<?=base_url()?>assets/images/others/thumb-13.jpg" alt="">

                                                                </div>

                                                                <div class="m-l-10">

                                                                    <span>Wristband</span>

                                                                </div>

                                                            </div>

                                                        </td>

                                                        <td>60</td>

                                                        <td>$7,376.00</td>

                                                        <td>

                                                            <div class="d-flex align-items-center">

                                                                <div class="progress progress-sm w-100 m-b-0">

                                                                    <div class="progress-bar bg-success" style="width: 76%"></div>

                                                                </div>

                                                                <div class="m-l-10">

                                                                    76

                                                                </div>

                                                            </div>

                                                        </td>

                                                    </tr>

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>-->

                    

                </div>

                <!-- Content Wrapper END -->