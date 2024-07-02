<!-- Page Container START -->
<div class="page-container">
<!-- Content Wrapper START -->
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <h4>All Package List</h4> 
                <a href="<?php echo base_url('packages/cart'); ?>" title="View Cart"><i class="fa-solid fa-cart-shopping"></i> (<?php echo ($this->cart->total_items() > 0)?$this->cart->total_items().' Items':'Empty'; ?>)</a>
                <div class="m-t-25">
                <div class="row">
                    <?php 
                    if(!empty($packages)){
                    foreach($packages as $value)
                    // print_r($value); die();
                    {?>
                    <div class="col-sm-4">
                        <div class="card">
                        <div class="card-body">
                        <?php $imageURL = !empty($value->image)?base_url('uploads/packages/'.$value->image):base_url('uploads/noimage.png'); ?>
                                    <img src="<?php echo $imageURL; ?>" width="30%"/>
                            <h5 class="card-title"><?=$value->package_name?></h5>
                            <ul>
                            <?php
                            $service=json_decode($value->service_id);
                            $session=json_decode($value->service_session);
                            foreach($service as $key=>$servicevalue)
                            {
                                $servicedata=$this->MasterModel->get_databy_id($servicevalue,'services');
                            ?>
                            <li><?=$servicedata[0]->service_name?> | Session: <?=$session[$key]?> | Price:<?=$session[$key]*$servicedata[0]->service_charge?></li>
                            <?php } ?>
                            </ul>
                            <p class="card-text"><?=substr($value->description,0,200)?></p>
                            <a href="#" class="btn btn-primary">$<?=$value->price?></a>
                            <a href="<?=base_url()?>packages/addToCart/<?=$value->id?>" class="btn btn-primary">Add To Wallet</a>
                        </div>
                        </div>
                    </div>
                    <?php } }else{?>
                        <h2>Package Wallet Empty</h2>
                        <?php } ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
