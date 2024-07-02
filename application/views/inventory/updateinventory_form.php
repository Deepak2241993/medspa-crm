<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Update Inventory</h4> 
<div class="m-t-25">
<?=form_open('inventory/submit_updated_inventory/'.$inventory[0]['inventory_id'] , array('enctype' => 'multipart/form-data'))?>
	<?php if($this->session->flashdata('msg')){
	      echo $this->session->flashdata('msg');
     }?>
          <div class="form-group"  class="form-control">
                            <label for="inventory_id" class="col-form-label">Select Product:</label>
                    <select id="products" placeholder="Pick a product..." name="product_id"  class="form-control">
                    <option value="">Select a Product...</option>
                    <?php foreach($products as $key=>$value)
                    {?>
                    <option  value="<?=$value->product_id ?>" <?php if($inventory[0]['product_id']==$value->product_id){ echo "selected";} ?>><?=$value->product_name ?></option>
                    <?php } ?>
                    </select>
               
                    </div>
	<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="qty" class="col-form-label">Qty:</label>
                                <input type="text" name="quantity_in" class="form-control" id="qty" value="<?= $inventory[0]['quantity_in'] ?>" onkeypress="return isNumber(event)" required>
                            </div>
                            <div class="col-md-6">
                            <label for="unit" class="col-form-label">Select Units</label>
                                <select class="form-control"  name="product_units" id="unit">
                                    <?php $unit = array('unit','ml','tip','peel','piece');
                                    foreach($unit as $value){
                                        ?>
                                        <option value="<?=$value?>" <?php if($inventory[0]['product_units']==$value){ echo "selected";} ?>><?=$value?></option>
                                        
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exp-date" class="col-form-label">Exp-Date</label>
                        <input type="date" value="<?= $inventory[0]['expiry_date'] ?>" name="expiry_date" class="form-control" id="exp-date" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="amount-paid" class="col-form-label">Paid Admount</label>
                        <span style="position: absolute;margin-left: -95px;margin-top: 44px;">$</span>
                        <input type="text" name="paid_amount" class="form-control" id="amount-paid" value="<?= $inventory[0]['paid_amount'] ?>" onkeypress="return isNumber(event)" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="vendor" class="col-form-label">Select Vendor</label>
                        <input type="text" class="form-control" id="vendor" required>
						 <input type="hidden" name="url_id"  value="<?php echo $this->uri->segment('3') ?>">
						<input type="hidden" name="inventory_id"  value="<?php echo $inventory['0']['inventory_id'] ?>">
                    </div> -->               

 
    <div class="form-group row">
        
        <div class="col-sm-3">
            <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
            <a href="<?=base_url('inventory/view_inventory')?>"  class="btn btn-warning">Back</a>
        </div>
        <div class="col-sm-9">
        </div>
    </div>
<?=form_close()?>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>
    <script>
            new TomSelect("#products",{
        create: false,
        sortField: {
            field: "text",
            direction: "asc"
        }
    });
        </script>