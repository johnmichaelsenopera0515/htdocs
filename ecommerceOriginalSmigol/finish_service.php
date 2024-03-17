<?php
	include 'includes/session.php'; 

	if(isset($_POST['finish'])){
		$id = $_POST['id'];
		$rate = $_POST['rate'];
		$feedback = $_POST['feedback']; 

echo $id;
		$conn = $pdo->open();

		try{
			
			$now = date('Y-m-d');
			$stmt = $conn->prepare("UPDATE job_order SET status='F',rate=:rate, feedback=:feedback,finish_date=:finish_date WHERE id=:id");
			$stmt->execute(['id'=>$id,'rate'=>$rate,'feedback'=>$feedback,'finish_date'=>$now]);
			$_SESSION['success'] = 'Service updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit Service form first';
	}

	header('location: my_request.php');

?>