<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE products SET status='D' WHERE id=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Service Declined successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select services to decline first';
	}

	header('location: products.php');
	
?>