<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-success" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title" id="modal-title">Add Money Wallet</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span>

                    </button>

                </div>

                <div class="card-body">

                    <form action="" method="post" id="type_of_listing_frm" enctype="multipart/form-data">

               <input type="hidden" name="current_sell_cost" id="current_sell_cost" value="">

               <input type="hidden" name="pids" id="pids" value="">

         

               

        <div class="row_type">

    <div class="form-group row s_cls">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Services </label>

        <div class="col-sm-8">

            <select name="ttype" class="form-control" id="ttype" required>

              <option value=""> Select Service </option>

              <?php  if(!empty($treatment_type)){

                    foreach($treatment_type as $treatment){?>

                        <option value="<?= $treatment->id?>"><?= $treatment->service_name?></option>

                    <?php }} ?>

            </select>

        </div>

        <?=form_error('ttype','<div class="text-danger">','</div>')?>

    </div>

    <div class="form-group row" id="typesub" style="display: none;">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Product</label>

        <div class="col-sm-8">

            <select name="ttypesub" class="form-control" id="ttypesub" >

            </select>

        </div>

        <?=form_error('ttypesub','<div class="text-danger">','</div>')?>

    </div>



    <div class="form-group row">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>

        <div class="col-sm-4">

            <input type="number" class="form-control" id="mquantity" onblur="sal_amount_cal()" name="mquantity1"  placeholder="Quantity" required>

        </div><!-- <div class="col-sm-4">

            <label for="inputEmail3" id="cal_qty_to_prod_cost" class="col-sm-4 col-form-label"></label>

        </div> -->

        <?=form_error('mquantity','<div class="text-danger">','</div>')?>

    </div>





     <div class="form-group row">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Current Amount</label>

        <div class="col-sm-4">

            <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>

            <input type="number" class="form-control" id="bamount" onblur="sal_amount_cal()" name="bamount"  placeholder="Current Amount" required>

        </div>

        <?=form_error('Current Amount','<div class="text-danger">','</div>')?>

    </div>



</div>







    <div class="form-group row s_cls">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Amount</label>

        <div class="col-sm-5">

            <span style="position: absolute; margin-left: 4px; margin-top: 9px;">$</span>

            <input type="number" id="amount" onblur="Disc_cal()" name="namount" class="form-control">

        </div>

        <?=form_error('namount','<div class="text-danger">','</div>')?>

    </div>



    <!-- <div class="form-group row s_cls">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>

        <div class="col-sm-5">

            <input type="number" id="qty" name="qty" class="form-control">

        </div>

        <?=form_error('qty','<div class="text-danger">','</div>')?>

    </div> -->



    <div class="form-group row s_cls">

        <label for="inputEmail3" class="col-sm-2 col-form-label">Discount</label>

        <div class="col-sm-5">

            <span style="position: absolute; margin-left: 4px; margin-top: 9px;">%</span>

            <input type="text" id="discount" name="discount" class="form-control">

        </div>

        <?=form_error('qty','<div class="text-danger">','</div>')?>

    </div>









                        <input type="hidden" name="taction" id="action" value="">

                        <input type="hidden" name="id" id="id" value="">

                       <button type="submit" class="btn btn-success" id="type_of_listing_btn">Submit</button>

                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                       

                    </form>

    

                </div>

            </div>

        </div>

    </div>

    