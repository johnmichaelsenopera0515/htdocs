<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['add'])){
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$contact_info = $_POST['contact_info']; 
		$password = $_POST['password']; 

		// $slug = slugify($name);
		// $category = $_POST['category'];
		// $price = $_POST['price'];
		// $description = $_POST['description'];
		// $seller_id = $seller['id'];
		// $filename = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE status=1 AND firstname= '".$firstname."' AND lastname='".$lastname."'");
		$stmt->execute();
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Employee already exist';
		}
		else{  
			try{
				$password = password_hash($password, PASSWORD_DEFAULT);
				$now = date('Y-m-d');
				$stmt = $conn->prepare("INSERT INTO users (type, company ,email, password, firstname, lastname, activate_code, created_on, status, address, contact_info) VALUES (:type, :company, :email, :password, :firstname, :lastname, :code, :now, 1, :address, :contact_info)");
				$stmt->execute(['type'=>3,'company'=>$seller['company'],'email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>'', 'now'=>$now, 'address'=>$address, 'contact_info'=>$contact_info]);
				$_SESSION['success'] = 'Service added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: employee.php');

?>