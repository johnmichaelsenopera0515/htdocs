<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['seller']) || trim($_SESSION['seller']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
	$stmt->execute(['id'=>$_SESSION['seller']]);
	$seller = $stmt->fetch(); 
	$pdo->close();

?>