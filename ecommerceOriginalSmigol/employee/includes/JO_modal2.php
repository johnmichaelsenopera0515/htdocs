<!-- Delete -->
<div class="modal fade" id="decline">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Declining...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="job_order_decline.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>DECLINE SERVICE</p>
                    <h2 class="bold name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat"  name="decline" ><i class="fa fa-trash"></i> Decline</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Approve -->
<div class="modal fade" id="approve">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Move to On-Progress...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="job_order_onProgress.php">
                <input type="hidden" id="job_id" name="job_id">
                <div>
                  <label class="control-label">Requestee : <span class="bold" id='customer_name'></span></label>  
                  
                </div>
                <div>
                  <label class="control-label">Contact No :  <span class="bold" id='contact_info'></span></label>  
                </div>
                <div>
                  <label class="control-label">Address :  <span class="bold" id='address'></span></label>  
                </div>
                <div>
                  <label class="control-label">Customer Notes : <span class="bold" id='notes'></span></label>  
                </div>

                <div>
                  <label class="control-label">Services Name : </label>  
                  <h5 class="bold text-center" id='servicename'></h5>
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                  <button type="submit" class="btn btn-primary btn-flat" name="onprogress"> ON-PROGRESS</button> 
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Product</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_edit.php">
                <input type="hidden" class="prodid" name="id">
                <div class="form-group">
                  <label for="edit_name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="edit_name" name="name">
                  </div>

                  <label for="edit_category" class="col-sm-1 control-label">Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="edit_category" name="category">
                      <option selected id="catselected"></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="edit_price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="edit_price" name="price">
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="notes" rows="10" cols="80"></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

