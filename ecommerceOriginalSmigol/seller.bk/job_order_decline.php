<?php
	include 'includes/session.php';

	if(isset($_POST['decline'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE job_order SET status='D' WHERE id=:id");
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

	header('location: job_order.php');
	
?>