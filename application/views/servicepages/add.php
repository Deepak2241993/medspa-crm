<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Add New Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="type_of_listing_frm" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="name">Add Service</label>
                            <input type="text" id="service" name="service_name" class="form-control">
                        </div>  
                        
                        <div class="form-group">
                            <label for="name">Service Charge</label>
                            <input type="text" id="service_charge" name="service_charge" class="form-control" placeholder="if any charge by service base">
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