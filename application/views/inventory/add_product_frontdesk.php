<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Introduce Frontdesk Product</h4> 
<div class="m-t-25">

<?= form_open('inventory/frontproductIntroduce', array('enctype' => 'multipart/form-data')) ?>
	<?php if($this->session->flashdata('msg')){
	      echo $this->session->flashdata('msg');
     }?>
	
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="product_name" placeholder="Product name" required>
        </div>
        <?=form_error('product_name','<div class="text-danger">','</div>')?>
    </div>
	
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Measurement unit</label>
        <div class="col-sm-6">
			<select name="product_units" class="form-control" id="product_units" required>
				<option  value="">Select</option>
			    <option  value="units">Units</option>
				<option value="ml">ml</option>
				<option value="tip">tip</option>
				<option value="peel">peel</option>
				<option value="piece">piece</option>
			</select>
        </div>
        <?=form_error('product_units','<div class="text-danger">','</div>')?>
    </div>
	
	<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Parent Company</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail3" name="parent_company" placeholder="Parent Company Name" required>
        </div>
        <?=form_error('parent_company','<div class="text-danger">','</div>')?>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Product Image</label>
        <div class="col-sm-6">
            <input type="file" class="form-control" id="inputEmail3" name="image" placeholder="Image" required>
            <input type="hidden" class="form-control" id="inputEmail3" name="product_type"value="front"required>
        </div>
        <?=form_error('image','<div class="text-danger">','</div>')?>
    </div>
	

 
    <div class="form-group row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-3">
            <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">
        </div>
        <div class="col-sm-7">
        </div>
    </div> 
<?=form_close()?>
</div>
</div>
</div>
</div>


