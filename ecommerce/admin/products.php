<?php include 'includes/session.php'; ?>
<?php
  $where_request = '';
  $where_approved = '';
  $where_declined = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where_request = 'WHERE products.category_id ='.$catid;
    $where_approved = 'WHERE  products.category_id ='.$catid;
    $where_declined = 'WHERE  products.category_id ='.$catid;
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Products</li>
        <li class="active">Product List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">Request</a></li>
        <li><a data-toggle="tab" href="#tab2">Approved</a></li> 
        <li><a data-toggle="tab" href="#tab3">Declined</a></li> 
      </ul> 
      <div class="tab-content">
        <div id="tab1" class="tab-pane fade in active">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                  <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</a> -->
                  <div class="pull-right">
                    <form class="form-inline">
                      <div class="form-group">
                        <label>Category: </label>
                        <select class="form-control input-sm" id="select_category">
                          <option value="0">ALL</option>
                          <?php
                            $conn = $pdo->open();

                            $stmt = $conn->prepare("SELECT * FROM category");
                            $stmt->execute();

                            foreach($stmt as $crow){
                              $selected = ($crow['id'] == $catid) ? 'selected' : ''; 
                              echo "
                                <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                              ";
                            }

                            $pdo->close();
                          ?>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered">
                    <thead>
                      <th>Service Provider</th>
                      <th>Service Name</th>
                      <!-- <th>Photo</th> -->
                      <th>Description</th>
                      <th>Price</th>
                      <th>Views Today</th>
                      <th>Tools</th>
                    </thead>
                    <tbody>
                      <?php
                        $conn = $pdo->open();

                        try{
                          $now = date('Y-m-d');
                          $stmt = $conn->prepare("SELECT products.*,users.company FROM products INNER JOIN users on products.seller_id = users.id $where_request and products.status='P'");
                          $stmt->execute();
                          foreach($stmt as $row){
                            $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                            $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                            echo "
                              <tr> 
                                <td>".$row['company']."</td>
                                <td>".$row['name']."</td> 
                                <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
                                <td>PHP ".number_format($row['price'], 2)."</td>
                                <td>".$counter."</td>
                                <td>
                                  <button class='btn btn-success btn-sm approve btn-flat' data-id='".$row['id']."'> Approve</button>
                                  <button class='btn btn-danger btn-sm decline btn-flat' data-id='".$row['id']."'>  Decline</button>
                                </td>
                              </tr>
                            ";
                          }
                        }
                        catch(PDOException $e){
                          echo $e->getMessage();
                        }

                        $pdo->close();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="tab2" class="tab-pane fade in">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                  <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</a> -->
                  <div class="pull-right">
                    <form class="form-inline">
                      <div class="form-group">
                        <label>Category: </label>
                        <select class="form-control input-sm" id="select_category">
                          <option value="0">ALL</option>
                          <?php
                            $conn = $pdo->open();

                            $stmt = $conn->prepare("SELECT * FROM category");
                            $stmt->execute();

                            foreach($stmt as $crow){
                              $selected = ($crow['id'] == $catid) ? 'selected' : ''; 
                              echo "
                                <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                              ";
                            }

                            $pdo->close();
                          ?>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered">
                    <thead>
                      <th>Service Provider</th>
                      <th>Service Name</th>
                      <!-- <th>Photo</th> -->
                      <th>Description</th>
                      <th>Price</th>
                      <th>Views Today</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                      <?php
                        $conn = $pdo->open();

                        try{
                          $now = date('Y-m-d');
                          $stmt = $conn->prepare("SELECT * FROM products INNER JOIN users on products.seller_id = users.id $where_approved  and products.status='A'");
                          $stmt->execute();
                          foreach($stmt as $row){
                            $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                            $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                            echo "
                              <tr> 
                                <td>".$row['company']."</td>
                                <td>".$row['name']."</td> 
                                <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
                                <td>PHP ".number_format($row['price'], 2)."</td>
                                <td>".$counter."</td>
                                <td>
                                  <button class='btn btn-primary btn-flat' > Approved</button>
                                </td>
                              </tr>
                            ";
                          }
                        }
                        catch(PDOException $e){
                          echo $e->getMessage();
                        }

                        $pdo->close();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div id="tab3" class="tab-pane fade in">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                  <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New</a> -->
                  <div class="pull-right">
                    <form class="form-inline">
                      <div class="form-group">
                        <label>Category: </label>
                        <select class="form-control input-sm" id="select_category">
                          <option value="0">ALL</option>
                          <?php
                            $conn = $pdo->open();

                            $stmt = $conn->prepare("SELECT * FROM category");
                            $stmt->execute();

                            foreach($stmt as $crow){
                              $selected = ($crow['id'] == $catid) ? 'selected' : ''; 
                              echo "
                                <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                              ";
                            }

                            $pdo->close();
                          ?>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="box-body">
                  <table id="example1" class="table table-bordered">
                    <thead>
                      <th>Service Provider</th>
                      <th>Service Name</th>
                      <!-- <th>Photo</th> -->
                      <th>Description</th>
                      <th>Price</th>
                      <th>Views Today</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                      <?php
                        $conn = $pdo->open();

                        try{
                          $now = date('Y-m-d');
                          $stmt = $conn->prepare("SELECT * FROM products INNER JOIN users on products.seller_id = users.id $where_declined and products.status='D'");
                          $stmt->execute();
                          foreach($stmt as $row){
                            $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                            $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                            echo "
                              <tr> 
                                <td>".$row['company']."</td>
                                <td>".$row['name']."</td> 
                                <td><a href='#description' data-toggle='modal' class='btn btn-info btn-sm btn-flat desc' data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
                                <td>PHP ".number_format($row['price'], 2)."</td>
                                <td>".$counter."</td>
                                <td>
                                  <button class='btn btn-danger btn-flat' > Declined</button>
                                </td>
                              </tr>
                            ";
                          }
                        }
                        catch(PDOException $e){
                          echo $e->getMessage();
                        }

                        $pdo->close();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div> 
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/products_modal.php'; ?>
    <?php include 'includes/products_modal2.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.decline', function(e){
    e.preventDefault();
    $('#decline').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.approve', function(e){
    e.preventDefault();
    $('#approve').modal('show');
    var id = $(this).data('id');
     
    getRow(id);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.desc', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $('#select_category').change(function(){
    var val = $(this).val();
    if(val == 0){
      window.location = 'products.php';
    }
    else{
      window.location = 'products.php?category='+val;
    }
  });

  $('#addproduct').click(function(e){
    e.preventDefault();
    getCategory();
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

  $("#edit").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'products_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#desc').html(response.description);
      $('.name').html(response.prodname);
      $('.prodid').val(response.prodid);
      $('#edit_name').val(response.prodname);
      $('#catselected').val(response.category_id).html(response.catname);
      $('#edit_price').val(response.price);
      CKEDITOR.instances["editor2"].setData(response.description);
      getCategory();
    }
  });
}
function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'category_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#category').append(response);
      $('#edit_category').append(response);
    }
  });
}
</script>
</body>
</html>
