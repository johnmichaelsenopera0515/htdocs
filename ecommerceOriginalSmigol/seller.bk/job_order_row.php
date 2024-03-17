<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT job_order.request_description as description, job_order.id AS prodid, products.name AS prodname, category.name AS catname,CONCAT(users.firstname,' ',users.lastname) AS requestee,users.contact_info,users.address FROM job_order INNER JOIN products on products.id = job_order.product_id  LEFT JOIN category ON category.id=products.category_id LEFT JOIN users on job_order.user_id = users.id WHERE job_order.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>