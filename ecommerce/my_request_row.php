<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("select 
									CONCAT(b.firstname,' ',lastname) as assign,
									b.contact_info,
									b.address,
									a.expected_date,
									c.name as service,
									d.name as cat,
									c.price
								from 
								job_order a
								left join users b on a.emp_assigned_id = b.id
								left join products c on a.product_id = c.id
								left join category d on c.category_id = d.id
								where a.id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>