<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['empid'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$contact_info = $_POST['contact_info'];  
		$email = $_POST['email'];  
		$address = $_POST['address'];  

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE users SET  address=:address,email=:email,firstname=:firstname, lastname=:lastname, contact_info=:contact_info WHERE id=:id");
			$stmt->execute(['address'=>$address,'email'=>$email,'firstname'=>$firstname, 'lastname'=>$lastname, 'contact_info'=>$contact_info, 'id'=>$id]);
			$_SESSION['success'] = 'Account updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit service form first';
	}

	header('location: employee.php');

?>