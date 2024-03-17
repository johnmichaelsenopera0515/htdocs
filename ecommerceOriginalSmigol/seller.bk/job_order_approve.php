<?php
	include 'includes/session.php';

	if(isset($_POST['approve'])){
		$id = $_POST['job_id'];
		$emp_assigned_id = $_POST['emp_assigned_id'];
		$expected_date = $_POST['expected_date']; 
		
		if($emp_assigned_id==''){
			$_SESSION['error'] = 'Select services to Approved first';
		}
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE job_order SET status='A', emp_assigned_id=:emp_assigned_id, expected_date=:expected_date WHERE id=:id");
			$stmt->execute(['id'=>$id,'emp_assigned_id'=>$emp_assigned_id,'expected_date'=>$expected_date]);

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

	header('location: job_order.php');
	
?>