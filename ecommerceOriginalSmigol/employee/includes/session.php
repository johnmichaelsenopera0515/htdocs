<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['employee']) || trim($_SESSION['employee']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_SESSION['employee']]);
	$employee = $stmt->fetch(); 
	$pdo->close();

?>