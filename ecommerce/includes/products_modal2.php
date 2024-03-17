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
                <label class="control-label">JOHN MARK ROMERO</label>  
              </div>
              <div>
                <label class="control-label">Contact No : </label> 
                <label class="control-label">2348972934</label>  
              </div>
              <div>
                <label class="control-label">Address : </label> 
                <label class="control-label">3erawdrfasd fawerq54rq2w fawedrf</label>  
              </div>
              <form class="form-horizontal" method="POST" action="job_order_approve.php"> 
                <input type="hidden" class="prodid" name="job_id">
                <div>
                  <label class="control-label">Assign By</label>  
                  <div class='mb-4'>
                    <select class="form-control" id="edit_employee" name="emp_assigned_id">
                      <option selected id="empselected"></option>
                    </select>
                  </div>
                </div>
                <div>
                  <label class="control-label">Expected Service Date</label>  
                  <div class='mb-4'> 
                    <input type="date" class="form-control" id="_expected_date" name="expected_date">
                  </div>
                </div>
                <hr />
                <div >
                    <p>APPROVE SERVICE</p>
                    <h2 class="bold name"></h2>
                </div> 
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
                    <input type="text" class="form-control" id="edit_price" name="price">
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

<!-- Edit -->
<div class="modal fade" id="finish_work">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Finish Service</b></h4>
            </div>
            <div class="modal-body">
              <p><b>Rate</b></p>
                <div class='rate'>
                  <button onclick="rate(1)"><span class='fa fa-star checked' id="firstStar"></span></button>
                  <button onclick="rate(2)"><span class='fa fa-star checked' id="secondStar"></span></button>
                  <button onclick="rate(3)"><span class='fa fa-star checked' id="thirdStar"></span></button>
                  <button onclick="rate(4)"><span class='fa fa-star checked' id="forthStar"></span></button>
                  <button onclick="rate(5)"><span class='fa fa-star checked' id="fifthStar"></span></button>
                </div>
              <form class="form-horizontal" method="POST" action="finish_service.php">
                <input type="hidden" class="prodid" name="id">  
                <input type="hidden" id="rate" name="rate">  
               
                <p><b>Feedback</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="feedback" rows="10" cols="80"></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="finish"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- JO INFO TO SELLER -->
<!-- <div class="modal fade" id="jo_info"> -->
<div class="modal fade" id="jo_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Job Order Info </b></h4>
            </div>
            <div class="modal-body">
              <div>
                <label class="control-label">Assign By : </label> 
                <input type="text" readonly id="assign" class="no-border" name="assign">
              </div>
              <div>
                <label class="control-label">Contact No : </label> 
                <input type="text" readonly id="contact_no" class="no-border" name="contact_no">
              </div>
              <div>
                <label class="control-label">Address : </label> 
                <input type="text" readonly id="address" class="no-border" name="address">
              </div>

              <hr>  

              <div>
                <label class="control-label">Service Name : </label> 
                <input type="text" readonly id="service" class="no-border" name="service">
              </div>
              <div>
                <label class="control-label">Category : </label> 
                <input type="text" readonly id="cat" class="no-border" name="cat">
              </div>
              <div>
                <label class="control-label">Price : </label> 
                <input type="text" readonly id="price" class="no-border" name="price">
              </div> 
              <div>
                <label class="control-label">Expected Date : </label> 
                <input type="text" readonly id="expected_date" class="no-border" name="expected_date">
              </div> 
               
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button> 
              </div> 
        </div>
    </div>
</div>
<style>
  	.checked{
      color: orange; 
    }
    .rate{
      cursor: pointer !important;
    }
</style>
<script>
  var userRating = 0; // Initialize the user rating variable 
  $('#rate').val(5); 
  function rate(rating = 5) {  
    userRating = rating; // Set the user rating to the selected value
    
    // Change the color of the third star to yellow when the user clicks it
    if (rating == 1) { 
      document.getElementById("firstStar").classList.add("checked");
      document.getElementById("secondStar").classList.remove("checked");
      document.getElementById("thirdStar").classList.remove("checked");
      document.getElementById("forthStar").classList.remove("checked");
      document.getElementById("fifthStar").classList.remove("checked");
    } else if (rating == 2) { 
      document.getElementById("firstStar").classList.add("checked");
      document.getElementById("secondStar").classList.add("checked");
      document.getElementById("thirdStar").classList.remove("checked");
      document.getElementById("forthStar").classList.remove("checked");
      document.getElementById("fifthStar").classList.remove("checked");
    } else if (rating == 3) { 
      document.getElementById("firstStar").classList.add("checked");
      document.getElementById("secondStar").classList.add("checked");
      document.getElementById("thirdStar").classList.add("checked");
      document.getElementById("forthStar").classList.remove("checked");
      document.getElementById("fifthStar").classList.remove("checked");
    } else if (rating == 4) { 
      document.getElementById("firstStar").classList.add("checked");
      document.getElementById("secondStar").classList.add("checked");
      document.getElementById("thirdStar").classList.add("checked");
      document.getElementById("forthStar").classList.add("checked");
      document.getElementById("fifthStar").classList.remove("checked");
    } else if (rating == 5) { 
      document.getElementById("firstStar").classList.add("checked");
      document.getElementById("secondStar").classList.add("checked");
      document.getElementById("thirdStar").classList.add("checked");
      document.getElementById("forthStar").classList.add("checked");
      document.getElementById("fifthStar").classList.add("checked");
    }  
    $('#rate').val(rating); 
  }

</script>

<style>
  .no-border{
    border:0px;
  }
</style>


