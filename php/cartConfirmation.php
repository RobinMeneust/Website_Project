<!DOCTYPE html>
<html>
	<head>
		<script src='../js/cartConfirmation.js'></script>
	</head>
<?php
	session_start();

	if(!isset($_SESSION["currentUser"])){
		header("Location: ../login.php", true);
	}else{
		saveQuantityToSession();

	}

	function saveQuantityToSession() {
		$i = 1;
		$list_quantity = array();
		if(isset($_POST['quantity']) && is_array($_POST['quantity'])){
			$list_quantity = $_POST['quantity'];
		}
		if(isset($_POST['cartConfirmation'])){
			foreach($_SESSION['cart'] as $product){
				$_SESSION['cart'][$product['id']]['quantity'] = $list_quantity[$i];
				$i++;
			}
			//var_dump($_SESSION['cart']);
		}
	}
?>
<body onload='<?php $i = 1; 
if(isset($_SESSION["cart"])){
	foreach($_SESSION["cart"] as $product){
		echo("updateStock(`".$product["id"] .'`,`'. $product["quantity"]."`);");
		$i++;
	}
}
?>'>
</body>
</html>