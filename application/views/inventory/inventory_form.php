<!-- Page Container START -->

<div class="page-container">

 <!-- Content Wrapper START -->

 <div class="main-content">

<div class="card">

<div class="card-body">

    <h4>New Inventory Form</h4> 

<div class="m-t-25">

    <hr>

<?=form_open('inventory/save_inventory')?>



    <div class="form-group row">

        <label for="inputservice3" class="col-sm-2 col-form-label">Service Category</label>

        <div class="col-sm-4">

            <input type="text" class="form-control" id="inputservice3" name="servicename" placeholder="Service Name" readonly value="<?php echo $data[0]['service_name'] ?>">

        </div>

        

        <label for="inputProduct4" class="col-sm-2 col-form-label">Product Name</label>

        <div class="col-sm-4">

            <input type="text" class="form-control" name="phone" id="inputProduct4" placeholder="Product Name" readonly value="<?php echo $data[0]['sub_service_name'] ?>">

        </div>

    </div>

       <fieldset class="form-group">

        <div class="row">

            <label class="col-form-label col-sm-2 pt-0">Product Measurement</label>

            <div class="col-sm-2">

                <div class="radio">

                    <input type="radio" name="measurement" id="gridRadios1" value="unit" checked>

                    <label for="gridRadios1">

                        unit

                    </label>

                </div>

            </div>

            <div class="col-sm-2">

                <div class="radio">

                    <input type="radio" name="measurement" id="gridRadios2" value="ml">

                    <label for="gridRadios2">

                        ml

                    </label>

                </div>

            </div>

                <div class="col-sm-2">

                <div class="radio">

                    <input type="radio" name="measurement" id="gridRadios3" value="tip">

                    <label for="gridRadios3">

                        tip

                    </label>

                </div>

                </div>

            <div class="col-sm-2">

                <div class="radio">

                    <input type="radio" name="measurement" id="gridRadios4" value="peel">

                    <label for="gridRadios4">

                        peel

                    </label>

                </div>

            </div>

            <div class="col-sm-2">

                <div class="radio">

                    <input type="radio" name="measurement" id="gridRadios5" value="piece">

                    <label for="gridRadios5">

                        piece

                    </label>

                </div>

            </div>

        </div>

    </fieldset>

    <div class="form-group row">

        <label for="inputinventory03" class="col-sm-2 col-form-label">Current Inventory</label>

        <div class="col-sm-6">

            <input type="text" class="form-control" name="current_inventory" id="inputinventory03" placeholder="Current Inventory">

        </div>

    </div>

    <div class="form-group row">

        <label for="inputinventory04" class="col-sm-2 col-form-label">Current Cost</label>

        <div class="col-sm-6">

            <input type="number" class="form-control" name="current_cost" id="inputinventory04" placeholder="Current Cost">

        </div>

    </div>

        <div class="form-group row">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Closest Expiry Date</label>

        <div class="col-sm-6">

    <div class="input-affix m-b-10">

        <i class="prefix-icon anticon anticon-calendar"></i>

        <input type="text" class="form-control datepicker-input" placeholder="Pick a date">

    </div>

    </div>

    </div>

    <div class="form-group row">

        <label for="inputEmail0003" class="col-sm-2 col-form-label">Parent Company Name</label>

        <div class="col-sm-6">

            <input type="text" class="form-control" name="parent_company" id="inputEmail0003" placeholder="Parent Company Name">

        </div>

    </div>

    <div class="form-group row">

        <label for="inputPassword093" class="col-sm-2 col-form-label">Any Comment</label>

        <div class="col-sm-6">

            <textarea class="form-control" name="comment" id="inputPassword093" placeholder="Write a comment...."></textarea>

        </div>

        <?=form_error('comment','<div class="text-danger">','</div>')?>

    </div>

 

    <div class="form-group row">

        <div class="col-sm-4 text-center">

        </div>

        <div class="col-sm-4">

            <a href="<?=base_url()?>inventory/" class="btn btn-danger">Quit</a>&nbsp;&nbsp;&nbsp;

            <input type="submit" name="submit_data" class="btn btn-primary" value="Submit">

        </div>

        <div class="col-sm-4">

        </div>

    </div>

<?=form_close()?>

</div>

</div>

</div>

</div>