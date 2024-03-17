<?php
	include 'includes/session.php'; 

	if(isset($_POST['onprogress'])){
		 
		$now = date('Y-m-d');
		$id = $_POST['job_id'];  
		$conn = $pdo->open();
		echo $id;
		try{
			$stmt = $conn->prepare("UPDATE job_order SET status='O', actual_wip_date=:actual_wip_date WHERE id=:id");
			$stmt->execute(['id'=>$id,'actual_wip_date'=>$now]);

			$_SESSION['success'] = 'Service Approved successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select services to Approved first';
	}

	header('location: myjob_order.php');
	
?>