<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Page Container START -->
<div class="page-container">
 <!-- Content Wrapper START -->
 <div class="main-content">
<div class="card">
<div class="card-body">
    <h4>Use Products In service</h4> 
    
     
     <?=form_open('Patients/save_used_product/'.$notesid)?>
    
    <div class="m-t-25" id="visitServices">
          <input type="hidden" name="pid" id="pid" value="<?=$pid?>">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Products</label>
        <div class="col-sm-6">
            <!--<select class="form-control" id="afterup" name="sname" onchange="location = this.value;">-->
           
            <select class="form-control" name="produnct_name" name="type" required>
                <option  value="">Select Product</option>
                 <?php foreach($productsdata as $products){ ?>
                <option value="<?=$products->inventory_id ?>_<?=$products->current_sell_cost ?>"><?=$products->product_name ?></option>
                 <?php  } ?>
                
            </select>
        </div>
    </div>
</div>
    <!-- Editing here in for loop -->
<div class="m-t-25" id="services">
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Qty</label>
        <div class="col-sm-6">
           <input name="qty" class="form-control" required>
         </div>
    </div>
</div>



  <div class="form-group row">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-3">
            <input type="submit" name="submit_data" id="btn_submit" class="btn btn-primary" value="ADD">
        </div>
        <div class="col-sm-4">
        </div>
    </div>

   <?=form_close()?>
    <!-- Editing here in for loop -->
    
</div>
</div>
</div>
</div>
<script>
    function hideshow(val){
        var wall= val.value;
        if(wall=='wallet_amount'){
          $('#services').hide();
         $('#session_package').hide();
        }else{
            $('#services').show();
         $('#session_package').show();
        }
    }
</script>
