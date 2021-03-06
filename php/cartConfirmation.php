<!DOCTYPE html>
<html>
	<head>
		<script src='../js/cartConfirmation.js'></script>
		<script src='../js/global.js'></script>
		<script src='../js/admin.js'></script>
	</head>
<?php
	session_start();

	if(!isset($_SESSION["currentUser"])){
		header("Location: ../login.php", true);
		exit();
	}
	else if(!isset($_SESSION["currentUser"]["address"])){
		$_SESSION["missingAddress"]=true;
		header("Location: ../profile.php", true);
		exit();
	}
	else if(!isset($_SESSION["cart"])){
		$_SESSION["emptyCart"]=true;
		header("Location: ../cart.php", true);
		exit();
	}
?>
<body onload='<?php 
if(isset($_SESSION["cart"])){
	foreach($_SESSION["cart"] as $product){
		// update the stock inside "/data/products.xml"
		echo('updateStock("'.$product["id"].'", 0,"'.$product["quantity"].'");');
	}
	echo("goToInvoicePage()");
}
?>'>

<?php
	// generates an order history

	$file = "../data/orders.json";
	$json = json_decode(file_get_contents($file), true);
	$foundUser=false;

	// generate the data to be saved
	$currentOrder["date"] = date("d/m/Y");
	foreach($_SESSION['cart'] as $product){
		$currentOrder["items_list"][]= array("id" => $_SESSION['cart'][$product['id']]['id'], "description" => $_SESSION['cart'][$product['id']]['description'], "quantity" => $_SESSION['cart'][$product['id']]['quantity']);
	}

	//Search the current user in orders.json and save the new order data
	$i=0;
	foreach($json as $user){
		if($_SESSION["currentUser"]["id"] == $user["user_id"]){
			array_push($json[$i]["orders_list"], $currentOrder);
			$foundUser=true;
			break; // User's ID is unique so if we found it we don't have to search for other ones
		}
		$i++;
	}

	// if the user isn't in orders.json. It's its first order
	if($foundUser==false){
		$newUserData["user_id"]=$_SESSION["currentUser"]["id"];		
		$newUserData["orders_list"]=array($currentOrder);

		array_push($json, $newUserData);
		//We have to sort the new array
		function comparator($object1, $object2){
			$id1 = (int) filter_var($object1["user_id"], FILTER_SANITIZE_NUMBER_INT);
			$id2 = (int) filter_var($object2["user_id"], FILTER_SANITIZE_NUMBER_INT);
			return $id1 > $id2;
		}
		usort($json, 'comparator');
	}
	
	$json = json_encode($json, JSON_PRETTY_PRINT);
	file_put_contents('../data/orders.json',$json);
?>
</body>
</html>