<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$seller_id = $seller['id'];
		// $filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM products WHERE slug=:slug AND seller_id=".$seller['id']);
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Service already exist';
		}
		else{
			// if(!empty($filename)){
			// 	$ext = pathinfo($filename, PATHINFO_EXTENSION);
			// 	$new_filename = $slug.'.'.$ext;
			// 	move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			// }
			// else{
			// 	$new_filename = '';
			// }

			try{
				$stmt = $conn->prepare("INSERT INTO products (category_id, name, description, slug, price, seller_id) VALUES (:category, :name, :description, :slug, :price,:seller_id)");
				$stmt->execute(['category'=>$category, 'name'=>$name, 'description'=>$description, 'slug'=>$slug, 'price'=>$price, 'seller_id'=>$seller_id]);
				$_SESSION['success'] = 'Service added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: products.php');

?>