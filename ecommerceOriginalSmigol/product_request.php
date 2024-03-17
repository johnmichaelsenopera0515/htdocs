<?php
	include 'includes/session.php'; 

		if($_POST['request_description'] == ""){
			$_SESSION['error'] = 'Fill up service order form first';
		}

		$request_description = $_POST['request_description'];  
		$product_id = $_POST['prodid'];  
		$user_id = $user['id'];    
		$now = date('Y-m-d');
		$conn = $pdo->open();  

		try{ 
			$stmt = $conn->prepare("INSERT INTO job_order (user_id, product_id, request_description, request_date) VALUES (:user_id, :product_id, :request_description,:now)");
			$stmt->execute(['user_id'=>$user_id, 'product_id'=>$product_id, 'request_description'=>$request_description, 'now'=>$now]);
			$_SESSION['success'] = 'Service added successfully'; 
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		} 

		$pdo->close(); 
	 
		
	header('location: my_request.php');

?>