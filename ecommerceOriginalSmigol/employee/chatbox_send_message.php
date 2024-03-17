<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	
	$message = $_POST['message'];
	$job_id = $_POST['job_id'];
 
	if(isset($_SESSION['employee'])){
		try{ 
			$stmt = $conn->prepare("INSERT INTO chatbox(order_id,user_id,message)VALUES(:order_id,:user_id,:msg)");
			$stmt->execute(['order_id'=>$job_id,'user_id'=>$employee['id'],'msg'=>$message]); 
			echo $job_id;
			// echo json_encode($job_id);
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	// else{
	// 	if(!isset($_SESSION['cart'])){
	// 		$_SESSION['cart'] = array();
	// 	}

	// 	if(empty($_SESSION['cart'])){
	// 		$output['count'] = 0;
	// 	}
	// 	else{
	// 		foreach($_SESSION['cart'] as $row){
	// 			$output['count']++;
	// 			$stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.id=:id");
	// 			$stmt->execute(['id'=>$row['productid']]);
	// 			$product = $stmt->fetch();
	// 			$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
	// 			$output['list'] .= "
	// 				<li>
	// 					<a href='product.php?product=".$product['slug']."'>
	// 						<div class='pull-left'>
	// 							<img src='".$image."' class='img-circle' alt='User Image'>
	// 						</div>
	// 						<h4>
	// 	                        <b>".$product['catname']."</b>
	// 	                        <small>&times; ".$row['quantity']."</small>
	// 	                    </h4>
	// 	                    <p>".$product['prodname']."</p>
	// 					</a>
	// 				</li>
	// 			";
				
	// 		}
	// 	}
	// }


	$pdo->close();

?>

