<?php
	include 'includes/session.php';
 
	 
	if(isset($_POST['activate'])){
		$empid = $_POST['empid'];  
		$conn = $pdo->open();
		  
		try{
			$stmt = $conn->prepare("UPDATE users SET status=1 WHERE id=:id");
			$stmt->execute(['id'=>$empid]);

			$_SESSION['success'] = 'Account Activated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();

		header('location: employee.php');
	}

?>