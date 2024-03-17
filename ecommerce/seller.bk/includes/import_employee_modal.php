 
<!-- Update Photo -->
<div class="modal fade" id="import">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="emp_excel_to_db.php" enctype="multipart/form-data">
                <input type="hidden" class="prodid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Upload Excel</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="excelFile" accept=".xlsx" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> Import</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Activate Employee-->
<div class="modal fade" id="activate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Activating...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_activate.php"  enctype="multipart/form-data"> 
                <input type="hidden" class="empid" name="empid">
                <div class="text-center">
                    <h2>Are you sure you want to Activate this account ?</h2> 
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-trash"></i> Activate</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Deactivate Employee-->
<div class="modal fade" id="deactivate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deactivating...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_deactivate.php"  enctype="multipart/form-data"> 
                <input type="hidden" class="empid" name="empid">
                <div class="text-center">
                    <h2>Are you sure you want to Deactivate this account ?</h2> 
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="deactivate"><i class="fa fa-trash"></i> Deactivate</button>
              </form>
            </div>
        </div>
    </div>
</div>




