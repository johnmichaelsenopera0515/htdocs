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
              <h4 class="modal-title"><b>Approving...</b></h4>
            </div>
            <div class="modal-body">
              <div>
                <label class="control-label">Requestee : </label> 
                <label class="control-label" id="requestee"></label>  
              </div>
              <div>
                <label class="control-label">Contact No : </label> 
                <label class="control-label" id="contact_info"></label>  
              </div>
              <div>
                <label class="control-label">Address : </label> 
                <label class="control-label" id="address"></label>  
              </div>
              <form class="form-horizontal" method="POST" action="job_order_approve.php"> 
                <input type="hidden" class="prodid" name="job_id">
                <div>
                  <label class="control-label">Assign By</label>  
                  <div class='mb-4'>
                    <select class="form-control" id="assigned_emp" name="emp_assigned_id" required>
                      <option selected id="empselected"></option>
                    </select>
                  </div>
                </div>
                <div>
                  <label class="control-label">Expected Service Date</label>  
                  <div class='mb-4'> 
                    <input type="date" class="form-control" id="_expected_date" name="expected_date" required value="<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>
                <hr />
                <div >
                    <p>APPROVE SERVICE</p>
                    <h2 class="bold name"></h2>
                </div>  
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                  <button type="submit" class="btn btn-primary btn-flat" name="approve"> Approve</button> 
                </div> 
              </form>
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
                    <input  type="number" pattern="(\d{3})([\.])(\d{2})" class="form-control" id="edit_price" name="price"   >
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="description" rows="10" cols="80"></textarea>
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

