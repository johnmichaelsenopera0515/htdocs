<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
 
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1 class="page-header">My Requests</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
						<table id="example1" class="table table-bordered">
							<thead> 
								<th>Status</th> 
								<th>Service</th>  
								<!-- <th>Price</th> -->
								<th>Action</th> 
							</thead>
							<tbody>
							<?php
								$conn = $pdo->open(); 
								try{
								$now = date('Y-m-d');
								$stmt = $conn->prepare("SELECT job_order.id as job_id,job_order.request_date,job_order.status as jo_status,users.company,products.* FROM job_order INNER JOIN products on products.id = job_order.product_id INNER JOIN users on products.seller_id = users.id where user_id=".$user['id']);
								$stmt->execute();
								 
								foreach($stmt as $row){
									$image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
									$counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
									

									if($row['jo_status'] == 'A'){
										$status = "<button class='btn btn-success btn-sm btn-flat'>Approved</button>"; 
										$action = "";
									}else if($row['jo_status'] == 'D'){
										$status = "<button class='btn btn-danger btn-sm btn-flat'>Decline</button>";  
										$action = "";
									}else if($row['jo_status'] == 'P'){
										$status = "<button class='btn btn-secondary btn-sm btn-flat'>Pending</button>"; 
										$action = "";
									}else if($row['jo_status'] == 'O'){
										$status = "<button class='btn btn-warning btn-sm btn-flat'>ON-GOING</button>";
										$action = "<button class='btn btn-success finish btn-sm btn-flat' data-id='".$row['job_id']."'>Finish</button>";
									}else if($row['jo_status'] == 'F'){
										$status = "<button class='btn btn-primary btn-sm btn-flat'>FINISHED</button>";
										$action = "";
									}
									 

									echo "
									<tr> 
										<td> 
											$status  
										<td>
											<button class='jo_info'  data-id='".$row['job_id']."'><i class='fa fa-search' ></i> ".$row['name']."</button>
										</td>  
										<td>
											$action 
									";
									
									// <td>PHP ".number_format($row['price'], 2)."</td> 
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
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div> 

<?php include 'includes/scripts_staticMap.php'; ?> 
<?php include 'includes/products_modal2.php'; ?>

<script>
var total = 0;
$(function(){
	$(document).on('click', '.finish', function(e){ 
		e.preventDefault();
		$('#finish_work').modal('show');
		var id = $(this).data('id');
		$('.prodid').val(id); 
	});

	$(document).on('click', '.jo_info', function(e){ 
		e.preventDefault();
		var id = $(this).data('id');
		$('.prodid').val(id); 
		console.log(id)
		getRow(id)
		
		$('#jo_info').modal('show');
	});

	function getRow(id){ 
		$.ajax({
			type: 'POST',
			url: 'my_request_row.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){

			console.log('response',response)
			$('#service').val(response.service);
			$('#cat').val(response.cat);
			$('#price').val(response.price); 
			
			$('#assign').val(response.assign);  
			$('#contact_no').val(response.contact_info);  
			$('#address').val(response.address);  
			$('#expected_date').val(response.expected_date); 
			}
		});
	}
	

	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	$(document).on('click', '.add', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		qty++;
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});

function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'my_request_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}

function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'my_request_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
 
</script>
<!-- Paypal Express -->
<script> 
// Example function to show a result to the user. Your site's UI library can be used instead.
function resultMessage(message) {
  const container = document.querySelector("#result-message");
  container.innerHTML = message;
}

</script>
</body>
</html>