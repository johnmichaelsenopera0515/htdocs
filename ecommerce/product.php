<?php include 'includes/session.php'; ?> 
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id  LEFT JOIN users ON products.seller_id=users.id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch(); ; 
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuvYHHq3_kHfy-4KjtnOd-u5OAdMBXin4&libraries=places&callback=initMap" async defer></script>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" width="100%" class="zoom" data-magnify-src="images/large-<?php echo $product['photo']; ?>">
		            		<br><br>
		            		<form class="form-inline" id="productForm">
		            			<div class="form-group">
			            			<div class="input-group col-sm-12">
										<p><b>Company: </b><?php echo $product['company']; ?> </p>
										<p><b>Address: </b><span ><?php echo $product['address']; ?></span> </p>
										<input type="hidden" id="autocomplete" value="<?php echo $product['address']; ?>">
							        </div> 
			            		</div>
		            		</form>
		            	</div>
		            	<div class="col-sm-6">
		            		<h1 class="page-header"><?php echo $product['prodname']; ?></h1>
		            		<h3><b>PHP <?php echo number_format($product['price'], 2); ?></b></h3>
		            		<p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a></p>
		            		<p><b>Description:</b></p>
		            		<p><?php echo $product['description']; ?></p>
							 
		            	</div>  
						<?php
	        			if(isset($_SESSION['user'])){
	        				echo " 
							<div id='map' style='width: 100%; height: 400px;'></div>
							
							<form class='form-horizontal' method='POST' action='product_request.php'>
								<input type='hidden' class='prodid' name='prodid' value=".$product['prodid'].">
								<div class='form-group col-sm-12'>
									<label for='exampleFormControlTextarea1'>Requests / Notes for service</label>
									<textarea class='form-control' id='exampleFormControlTextarea1' name='request_description' rows='5'></textarea> 
									<button type=submit class='btn btn-primary btn-sm btn-flat'><i class='fa fa-shopping-cart'></i> Submit</button>  
								</div>  
							</form>
	        				";
							}
							else{
								echo "
									<h4>You need to <a href='login.php'>Login</a> to Request Appointment.</h4>
								";
							}
						?> 
		            </div> 
		            <br>
				    <div class="fb-comments" data-href="http://easyserve.ph/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
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

<?php include 'includes/scripts_routesMap.php'; ?>
<script>
// $(document).on('click', '.submit', function(e){  
// 		alert('success')
// 		var request_description = <?php echo $product['id']; ?>;
// 		var product_id = <?php echo $product['id']; ?>;
// 		alert('success2')
// 		$.ajax({
// 			type: 'POST',
// 			url: 'product_request.php',
// 			data: {
// 				request_description: request_description,
// 				product_id: product_id,
// 			},
// 			dataType: 'json',  
// 			success: function(response){
// 				console.log(response)
// 				if(!response.error){
// 					 alert('success')
// 				}
// 			}
// 		});
// 	}); 
</script>

</body>
</html>