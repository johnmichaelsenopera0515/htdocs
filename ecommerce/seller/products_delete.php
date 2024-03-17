<?php
	include 'includes/session.php'; 
	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE products SET status=:status WHERE id=:id");
			$stmt->execute(['id'=>$id,'status'=>'I']);

			$_SESSION['success'] = 'Product deactivated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select product to delete first';
	}
 
	header('location: products.php');
	
?>