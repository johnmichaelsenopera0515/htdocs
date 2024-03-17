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
        My Job Orders List
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
        <li class="active"><a data-toggle="tab" href="#tab1">Pending JO</a></li>
        <li><a data-toggle="tab" href="#tab2">ON-GOING JO</a></li>  
        <li><a data-toggle="tab" href="#tab3">Finished JO</a></li>  
      </ul> 
      <div class="tab-content">
        <div id="tab1" class="tab-pane fade in active">
          <div class="row">
            <div class="col-xs-12">
              <div class="box"> 
                <div class="box-body">
                  <table id="example1" class="table table-bordered">
                    <thead>
                      <th>Customer</th>
                      <th>Address</th> 
                      <th>Job Order</th> 
                      <th>Customer Notes</th> 
                      <th>Tools</th>
                    </thead>
                    <tbody>
                      <?php
                        $conn = $pdo->open();

                        try{
                          $now = date('Y-m-d');
                          $stmt = $conn->prepare("SELECT *,job_order.id FROM job_order LEFT JOIN products on products.id = job_order.product_id INNER JOIN users on job_order.user_id = users.id $where_request and job_order.status='A' and job_order.emp_assigned_id=:emp_assigned_id");
                          $stmt->execute(['emp_assigned_id'=>$employee['id']]);
                          foreach($stmt as $row){
                            $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                            $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                            echo "
                              <tr> 
                                <td>".$row['firstname'].' '.$row['lastname']."</td>
                                <td>".$row['address']."</td> 
                                <td>".$row['name']."</td> 
                                <td>".$row['request_description']."</td>  
                                <td>
                                  <button class='btn btn-success btn-sm approve btn-flat' data-id='".$row['id']."'> ON-PROGRESS</button> 
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
                <div class="box-body">
                  <table id="example2" class="table table-bordered">
                    <thead> 
                      <th>Status</th> 
                      <th>Customer</th>
                      <th>Address</th> 
                      <th>Job Order</th>  
                      <th>Customer Notes</th> 
                    </thead>
                    <tbody>
                      <?php
                        $conn = $pdo->open();

                        try{
                          $now = date('Y-m-d');
                          $stmt = $conn->prepare("SELECT *,job_order.id  FROM job_order LEFT JOIN products on products.id = job_order.product_id INNER JOIN users on job_order.user_id = users.id $where_request and job_order.status='O' and job_order.emp_assigned_id=:emp_assigned_id");
                          $stmt->execute(['emp_assigned_id'=>$employee['id']]);
                          foreach($stmt as $row){
                            $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                            $counter = ($row['date_view'] == $now) ? $row['counter'] : 0; 
                            echo "
                            <tr> 
                              <td> 
                                <button class='btn btn-success btn-flat' > ON-GOING</button>
                              </td>
                              <td>".$row['firstname'].' '.$row['lastname']."</td>
                              <td>".$row['address']."</td> 
                              <td>".$row['name']."</td> 
                              
                              <td>".$row['request_description']."</td>  
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
                <div class="box-body">
                  <table id="example3" class="table table-bordered">
                    <thead> 
                      <th>Status</th> 
                      <th>Customer</th>
                      <th>Address</th> 
                      <th>Job Order</th>  
                      <th>Customer Notes</th> 
                    </thead>
                    <tbody>
                      <?php
                        $conn = $pdo->open();

                        try{
                          $now = date('Y-m-d');
                          $stmt = $conn->prepare("SELECT *,job_order.id  FROM job_order LEFT JOIN products on products.id = job_order.product_id INNER JOIN users on job_order.user_id = users.id $where_request and job_order.status='F' and job_order.emp_assigned_id=:emp_assigned_id");
                          $stmt->execute(['emp_assigned_id'=>$employee['id']]);
                          foreach($stmt as $row){
                            $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                            $counter = ($row['date_view'] == $now) ? $row['counter'] : 0; 
                            echo "
                            <tr> 
                              <td> 
                                <button class='btn btn-success btn-flat' > FINISH</button>
                              </td>
                              <td>".$row['firstname'].' '.$row['lastname']."</td>
                              <td>".$row['address']."</td> 
                              <td>".$row['name']."</td> 
                              
                              <td>".$row['request_description']."</td>  
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
    <?php include 'includes/JO_modal2.php'; ?>

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
    url: 'job_order_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#notes').html(response.description);
      $('#customer_name').html(response.name);
      $('#address').html(response.address);
      $('#contact_info').html(response.contact_info); 
      $('#servicename').html(response.servicename); 
      
      $('#job_id').val(response.job_id);   
    }
  });
}
function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'employee_fetch.php',
    dataType: 'json',
    success:function(response){
      // $('#empselected').append(response);
      $('#edit_employee').append(response);
    }
  });
}
</script>
</body>
</html>
