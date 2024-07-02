<div class="modal fade" id="successModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Add New Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="type_of_listing_frm_sub" enctype="multipart/form-data">
                        
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Add Products</label>
                <div class="col-sm-8">
                 <input type="text" class="form-control" id="" name="sub_service" placeholder="Add Products">
                </div>
            </div>


            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Product Units</label>
                <div class="col-sm-8">
                 <input type="text" class="form-control" id="" name="p_units" placeholder="Products Units">
                </div>
            </div>
            

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Quantity</label>
                <div class="col-sm-8">
                 <input type="text" class="form-control" id="" name="qty" placeholder="Quantity">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Current Cost</label>
                <div class="col-sm-8">
                 <input type="number" class="form-control" id="" name="c_cost" placeholder="Current Cost">
                </div>
            </div>


        <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Expiry Date</label>
            <div class="col-sm-8">
                 <div class="input-affix m-b-10">

                <i class="prefix-icon anticon anticon-calendar"></i>

                <input type="text" name="exp_date" class="form-control datepicker-input" placeholder="Expiry Date">

                 </div>
            </div>
        </div>
                                            

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Parent Cmpany</label>
                <div class="col-sm-8">
                 <input type="text" class="form-control" id="" name="parent_cmp" placeholder="Parent Cmpany">
                </div>
            </div>
          

                        <input type="hidden" name="taction" id="action" value="">
                        <input type="hidden" name="s_id" id="s_id" value="">
                       <button type="submit" class="btn btn-success" id="type_of_listing_btn">Submit</button>
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       
                    </form>
    
                </div>
            </div>
        </div>
    </div>
