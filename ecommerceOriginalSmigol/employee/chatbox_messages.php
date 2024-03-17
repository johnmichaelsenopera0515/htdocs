<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	
	$output = array('list'=>'','name'=>'','photo'=>'');
    $job_id = $_POST['id'];
	if(isset($_SESSION['employee'])){
		try{
            $image = (!empty($employee['photo'])) ? '../images/'.$employee['photo'] : '../images/profile.jpg';
			$stmt = $conn->prepare("SELECT chatbox.*,users.firstname,users.photo as profile_picture FROM job_order JOIN chatbox ON job_order.id = chatbox.order_id JOIN users ON job_order.user_id = users.id where job_order.id =:job_id order by chatbox.created_date ASC");
			$stmt->execute(['job_id'=>$job_id]);
 
            // $output['photo'] = '';
            // $output['name'] = 'working';
			foreach($stmt as $row){
				// $output['count']++; 
				// $productname = (strlen($row['prodname']) > 30) ? substr_replace($row['prodname'], '...', 27) : $row['prodname'];
                if($employee['id'] == $row['user_id'] ){
                    $output['list'] .= "
                        <li class='clearfix'>
                            <div class='message-data text-right'>
                                <span class='message-data-time'>".$row['created_date']."</span> 
                                <img src='".$image."' alt='avatar'>
                            </div>
                            <div class='message other-message float-right'> ".$row['message']." </div>
                        </li>
                    ";
                }else{  
                    $output['list'] .= "
                        <li class='clearfix'>
                            <div class='message-data'>
                                <span class='message-data-time'>".$row['created_date']."</span>
                            </div>
                            <div class='message my-message'> ".$row['message']." </div>                                    
                        </li>    
                    ";  
                }

                $output['photo'] = (!empty($row['profile_picture'])) ? 'images/'.$row['profile_picture'] : 'images/profile.jpg';
                $output['name'] = $row['firstname'];
				
			}
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
	echo json_encode($output);

?>

