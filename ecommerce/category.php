<?php include 'includes/session.php'; ?>
<?php
	$slug = $_GET['category'];

	$conn = $pdo->open();

	try{
		$stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
		$stmt->execute(['slug' => $slug]);
		$cat = $stmt->fetch();
		$catid = $cat['id'];
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();

?>

<?php include 'includes/header.php'; ?>
<script>
	var userRating = 0; // Initialize the user rating variable 
	 
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
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
		            <h1 class="page-header"><?php echo $cat['name']; ?></h1>
		       		<?php
		       			
		       			$conn = $pdo->open();
						
		       			try{
		       			 	$inc = 3;	
							$description = "";
						    $stmt = $conn->prepare('SELECT a.* FROM ( SELECT products.id, users.photo, products.description, products.slug, users.firstname, products.name, products.price,IF(job_order.rate>0,IF(job_order.rate > 5,AVG(job_order.rate),job_order.rate),5) as rate FROM products LEFT JOIN users ON products.seller_id = users.id LEFT JOIN job_order ON products.id = job_order.product_id WHERE products.status = "A" AND category_id = :catid ) a;');
						    $stmt->execute(['catid' => $catid]); 
							 
							echo "<div class='row'>";
						    foreach ($stmt as $row) {
								if($row['name'] != ""){
									$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
									// $inc = ($inc == 3) ? 1 : $inc + 1;
									if($inc == 1)
										echo "<div class='row'>";
									if (strlen($row['description']) > 100) { 
										$description = substr($row['description'], 0,30) . " ...";
									}


									$start_1 = $row['rate'] >= 1 ? 'checked' : '';
									$start_2 = $row['rate'] >= 2 ? 'checked' : '';
									$start_3 = $row['rate'] >= 3 ? 'checked' : '';
									$start_4 = $row['rate'] >= 4 ? 'checked' : '';
									$start_5 = $row['rate'] == 5 ? 'checked' : '';
	

									echo "
										<a href='product.php?product=".$row['slug']."'>
											<div class='col-sm-6 col-xs-6 col-md-4'>
												<div class='box box-solid'>
													<div class='box-body prod-body'>
													
														<h5>".$row['firstname']."</h5> 
														<div style='display:flex;justify-content:center'>
															<img src='".$image."' width='100%' height='110px' class='thumbnail rounded-circle' > 
														</div> 
														<h5>".$row['name']."</h5> 
														<div class='rate'>
															<span class='fa fa-star ".$start_1."' id='firstStar'></span>
															<span class='fa fa-star ".$start_2."'  id='secondStar'></span>
															<span class='fa fa-star ".$start_3."'  id='thirdStar'></span>
															<span class='fa fa-star ".$start_4."'  id='forthStar'></span>
															<span class='fa fa-star ".$start_5."'  id='fifthStar'></span>
														</div>  
														<p style='text-overflow: ellipsis;'>". 
															$description
														."</p>
													</div>
													<div class='box-footer'>
														<b>PHP ".number_format($row['price'], 2)."</b>
													</div>
												</div>
											</div>
										</a>
										<script> 
											rate(".$row['rate'].");
										</script>
									"; 
								}
								echo "</div>";
								if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
								if($inc == 2) echo "<div class='col-sm-4'></div></div>";
							};
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<style>
	.checked{
		color: orange;
	}
</style>
</body>
</html>