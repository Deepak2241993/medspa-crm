<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">

    <h4>Add sub Services</h4> 

<div class="m-t-25">

    <hr>

    <?=form_open('services/save_sub_service')?>



    <div class="form-group row">

        <label for="inputservice3" class="col-sm-2 col-form-label">Service</label>

        <div class="col-sm-6">

           <select name="services" class="form-control"> 
           <option value="">Select services</option>
               <?php foreach($services as $service){ ?>
               <option value="<?=$service->sid ?>"><?=$service->service_name ?></option>
               <?php } ?>
           </select>

        </div>

        </div>
        
        
    <div class="form-group row">

        <label for="inputinventory03" class="col-sm-2 col-form-label">Sub services </label>

        <div class="col-sm-6">

            <input type="text" class="form-control" name="sub_service_name" id="" placeholder="Sub Services ">

        </div>

    </div>
    

    <div class="form-group row">

        <label for="inputinventory03" class="col-sm-2 col-form-label">services Charge</label>

        <div class="col-sm-6">

            <input type="number" class="form-control" name="sub_service_charge" id="" placeholder="Services Charge">

        </div>

    </div>

    <div class="form-group row">

        <label for="inputinventory04" class="col-sm-2 col-form-label">service pay</label>

        <div class="col-sm-6">

            <input type="number" class="form-control" name="service_pay" id="inputinventory04" placeholder="Current Cost">

        </div>

    </div>
    
        <div class="form-group row">

         <label for="inputinventory04" class="col-sm-4 col-form-label">Staus</label>

        <div class="col-sm-4">
           <label for="inputinventory04" class="col-sm- col-form-label">Active</label>
            <input type="radio" class="form-control" name="status" checked value="1" id="inputinventory04" > 

        </div>
        <div class="col-sm-4">
           <label for="inputinventory04" class="col-sm-4 col-form-label">In Active</label>
            <input type="radio" class="form-control" name="status"  value="0" id="inputinventory04" > 

        </div>

    </div>
    
      <div class="form-group row">

      

        <div class="col-sm-4">

            <input type="submit" class="form-control"  id="inputinventory04" value="Submit">

        </div>

    </div>

      

   
 

<?=form_close()?>

</div>

</div>

</div>

</div>