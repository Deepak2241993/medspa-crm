<!-- Page Container START -->
<div class="page-container">
<!-- Content Wrapper START -->
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <h2>Patient Package Wallet Details</h2>
                
                <div class="m-t-25">
                    <table id="data-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SR No.</th>
                                <th>Package Name</th>
                                <th>Services in Package</th>
                                <th>Image</th>
                                <th>Qty</th>  
                                <th>Price</th>  
                                <th>Total</th>  
                                
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sr =1;
                            // print_r($order['items'][0]); die();
                            foreach($order['items'] as $pt)
                            {
                            // print_r($pt);die;
                                ?>
                            <tr>
                                <td><?=$sr?></td>
                                <td><?=$pt['package_name']?></td>
                                <td >
                                    <ul style="padding-left: 10px;">
                                    <?php
                                    $packagedata=$this->MasterModel->get_databy_id($pt['product_id'],'package_list');
                                    // print_r($packagedata); die();
                                    
                                    $service_id=json_decode($packagedata[0]->service_id);
                                    $session_number=json_decode($packagedata[0]->service_session);
                                    foreach($service_id as $key=>$value)
                                    {
                                    // print_r($session_number); die();
                                    $servicesdata=$this->MasterModel->get_databy_id($value,'services');
                                    ?>
                                    
                                    <li><b><?=$servicesdata[0]->service_name?> | Session:</b><?=$session_number[$key]?></li>
                                    <?php }
                                    ?>
                                   
                                    </ul>
                                </td>
                                <td><?=$pt['package_name']?></td>
                                <td><?=$pt['quantity']?></td>
                                <td><?=$pt['price']?></td>
                                <td><?=$pt['sub_total']?></td>
                                
                                
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