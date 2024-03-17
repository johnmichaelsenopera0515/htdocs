<!-- Description -->
<!-- <div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
                <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Employees</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
                <div class="form-group row"> 
                  <div class="col-sm-6">
                      <label for="name" class="control-label">First name</label> 
                      <input type="text" class="form-control " id="name" name="firstname" required>
                  </div>

                  <div class="col-sm-6"> 
                      <label for="name" class="control-label">Last name</label> 
                      <input type="text" class="form-control m-4" id="name" name="lastname" required>
                  </div> 
                  
                  <div class="col-sm-6">
                      <label for="name" class="control-label">Email</label> 
                      <input type="text" class="form-control " id="name" name="email" required>
                  </div>

                  <div class="col-sm-6"> 
                      <label for="name" class="control-label">Contact info</label> 
                      <input type="text" class="form-control m-4" id="name" name="contact_info" required>
                  </div>  

                  <div class="col-sm-6"> 
                      <label for="name" class="control-label">Password</label> 
                      <input type="password" class="form-control m-4" id="password" name="password" required>
                  </div>  
                </div>
                <div class="form-group row"> 
                  <div class="col-sm-12"> 
                    <p><b>Address</b></p>
                    <div class="col-sm-12">
                      <textarea id="address" name="address" rows="10" cols="80" required></textarea>
                    </div> 
                  </div>
                </div> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
              </div>
        </div>
    </div>
</div>

<!-- Edit Employee-->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Employee</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_edit.php">
                <input type="hidden" class="empid" name="empid">
                <div class="form-group">
                  <div class="col-sm-6">
                    <label  class="control-label">First name</label> 
                    <input type="text" class="form-control" id="_firstname" name="firstname">
                  </div>

                  <div class="col-sm-6"> 
                    <label  class="control-label">Last name</label> 
                    <input type="text" class="form-control" id="_lastname" name="lastname">
                  </div> 
                  
                  <div class="col-sm-6"> 
                      <label for="email" class="control-label">Email</label> 
                      <input type="text" class="form-control " id="_email" name="email" required>
                  </div>
                  
                  <div class="col-sm-6"> 
                    <label  class=" control-label">Contact info</label> 
                    <input type="text" class="form-control" id="_contact_info" name="contact_info">
                  </div>  
                   
                    <div class="col-sm-12">  
                      <label  class="control-label">Address</label> 
                      <div class="col-sm-12">
                        <textarea  name="address"  id="_address" rows="10" cols="80" required></textarea>
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

<!-- Update Photo -->
<!-- <div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="Employees_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="prodid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div> -->