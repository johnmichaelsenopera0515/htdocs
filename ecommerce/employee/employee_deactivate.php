<?php
	include 'includes/session.php';
 
	 
	if(isset($_POST['deactivate'])){
		$empid = $_POST['empid'];  
		$conn = $pdo->open();
		  
		try{
			$stmt = $conn->prepare("UPDATE users SET status=0 WHERE id=:id");
			$stmt->execute(['id'=>$empid]);

			$_SESSION['success'] = 'Account Deactivated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();

		header('location: employee.php');
	}

?>