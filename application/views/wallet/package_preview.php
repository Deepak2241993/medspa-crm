<!-- Page Container START -->
<div class="page-container">
<!-- Content Wrapper START -->
    <div class="main-content">
        <div class="card">
            <div class="card-body">
                <h1>Package Wallet View</h1>
                
                <div class="m-t-25">
                    <div class="container mt-5">

                        <!-- Include jQuery library -->
                        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

                        <script>
                        // Update item quantity
                        function updateCartItem(obj, rowid){
                            $.get("<?php echo base_url('packages/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
                                if(resp == 'ok'){
                                    location.reload();
                                }else{
                                    alert('Cart update failed, please try again.');
                                }
                            });
                        }
                        </script>
                        <table class="table">
                        <thead>
                            <tr>
                                <th width="13%"></th>
                                <th width="30%">Product</th>
                                <th width="15%">Price</th>
                                <th width="10%">Quantity</th>
                                <th width="20%" class="text-right">Subtotal</th>
                                <th width="12%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
                            <tr>
                                <td>
                                    <?php $imageURL = !empty($item["image"])?base_url('uploads/packages/'.$item["image"]):base_url('uploads/noimage.png'); ?>
                                    <img src="<?php echo $imageURL; ?>" width="50"/>
                                </td>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo '$'.$item["price"]; ?></td>
                                <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                                <td class="text-right"><?php echo '$'.$item["subtotal"]; ?></td>
                                <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('packages/removeItem/'.$item["rowid"]); ?>':false;"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>
                            </tr>
                            <?php } }else{ ?>
                            <tr>
                                <td colspan="6"><p>Your cart is empty.....</p></td>
                            <?php } ?>
                            <?php if($this->cart->total_items() > 0){ ?>
                                <td></td>
                                <td><a class="btn btn-primary" href="<?=base_url()?>packages/package_list/<?=$_SESSION['wallet_patient_id']?>">Add More Package</a></td>
                                <td><a class="btn btn-success" href="<?=base_url()?>packages/placeOrder/<?=$_SESSION['wallet_patient_id']?>"> <?php echo '$'.$this->cart->total(); ?> Pay</a></td>
                                <td><strong>Cart Total</strong></td>
                                <td class="text-right"><strong><?php echo '$'.$this->cart->total(); ?></strong></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>