<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT job_order.request_description as description, job_order.id AS job_id, CONCAT(users.firstname,' ',users.lastname) AS name, users.address AS address, users.contact_info AS contact_info, products.name AS servicename, category.name AS catname FROM job_order INNER JOIN users on job_order.user_id = users.id INNER JOIN products on products.id = job_order.product_id LEFT JOIN category ON category.id=products.category_id  WHERE job_order.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>