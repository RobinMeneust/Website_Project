<?php
	session_start();

	if(!isset($_SESSION["currentUser"])){
		header("Location: ../login.php", true);
	}else{
		validationCart();
	}

	function validationCart() {
		$i = 1;
		if(isset($_POST['cartConfirmation'])){
			foreach($_SESSION['cart'] as $product){
				$product['quantity'] = $_POST['quantity'.$i];
				//var_dump($product['quantity']);
				//var_dump($_POST['quantity'.$i]);
				$i++;
			}
		}
	}
?>