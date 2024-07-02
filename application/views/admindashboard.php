<?php 
echo "admin dashboard";
?>

<!-- Page Container START -->
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <a href="<?=base_url()?>/patients/allprovider">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-icon avatar-lg avatar-blue">
                                            <i class="anticon anticon-user"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <h2 class="m-b-0"><?= count($provider)?></h2>
                                                <p class="m-b-0 text-muted">Total Provider</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="card">
                                <a href="<?=base_url().'patients/allpatients'?>">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                                <i class="anticon anticon-line-chart"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <h2 class="m-b-0"><?= count($patient)?></h2>
                                                <p class="m-b-0 text-muted">Total Patient</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="<?=base_url().'services'?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                                <i class="anticon anticon-profile"></i>
                                            </div>
                                            <div class="m-l-15">
                                                <h2 class="m-b-0"><?= count($services)?></h2>
                                                <p class="m-b-0 text-muted">Total Services</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="<?=base_url().'inventory/view_inventory'?>">
                                <div class="card">
                                        <div class="card-body">
                                            <div class="media align-items-center">
                                                <div class="avatar avatar-icon avatar-lg avatar-purple">
                                                <i class="anticon anticon-profile"></i>
                                                </div>
                                                <div class="m-l-15">
                                                    <h2 class="m-b-0"><?= count($inventory)?></h2>
                                                    <p class="m-b-0 text-muted">Total Inventory</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                        <a href="<?=base_url().'staff'?>">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                                            <i class="anticon anticon-user"></i>
                                        </div>
                                        <div class="m-l-15">
                                            <h2 class="m-b-0"><?= count($staf)?></h2>
                                            <p class="m-b-0 text-muted">Total Staff</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        
                    </div>
                    <!--  for Visit Data -->
                    <div class="card-body">
    <h4>Visit Data</h4> 
<div class="m-t-25">
<div class="table-responsive">
<table id="data-table" class="table table-bordered">
   
    <thead>
        <tr>
            <th>SR No.</th>
            <th>Date</th>
            <th>Name</th>
            <th>Procedure info</th>
            <th>Amount paid</th>
            <th>Method Paid</th>
            <th>Wallet</th>
            <th>Provider Specific pt accumulated/Data</th>
            <th>Seen by Provider</th>
            <th>Clinic time(Check in And check out)</th>
            <th style="width:100%;">Profit = (Rev - (cost of product+ provider paid+Clinic cost))</th>
           <!--  <th>Action</th> -->
        </tr>
    </thead>
    <tbody>
      
       <tr>
            <td>1</td>
            <td>Sonu Kumar</td>
            <td>p1Xq1</td>
            <td>100$</td>
            <td>Cash</td>
            <td>wallet</td>
            <td>Provider Note 1</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
           <!--  <th>Action</th> -->
        </tr>
       
    </tbody>


    
   
</table>
</div>
</div>
</div>
                    <!--  vist data end -->
                
                </div>
                <!-- Content Wrapper END -->