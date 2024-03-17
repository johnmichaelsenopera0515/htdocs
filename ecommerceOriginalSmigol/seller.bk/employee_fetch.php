<?php
	include 'includes/session.php';

	$output = '';

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM users where company=:company and id<>:id");
	$stmt->execute(["company"=>$seller['company'],"id"=>$seller['id']]);

	foreach($stmt as $row){
		$output .= "
			<option value='".$row['id']."' class='append_items'>".$row['firstname'] ." ". $row['lastname']."</option>
		";
	}

	$pdo->close();
	echo json_encode($output);

?>