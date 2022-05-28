<?php 
    session_start(); 
    if(!isset($_SESSION["currentUser"]) || $_SESSION['currentUser']==""){
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Historique des commandes</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
	<script src="js/global.js"></script>
</head>
<body>
	<div class="wrapper">
		<header>
			<?php include('php/prefab/header.php')?>
		</header>
		<div class="base">
			<div class="box verticalMenuContainer">
				<?php include('php/prefab/verticalMenu.php')?>
			</div>
			<div class="box mainPart">
				<h1>Historique des commandes</h1><br><br>
					<?php
						$file = "data/orders.json";
						$json = json_decode(file_get_contents($file), true);
					
						//Search the current user in orders.json and save the new order data
						foreach($json as $user){
							if($_SESSION["currentUser"]["id"] == $user["user_id"]){
								foreach($user["orders_list"] as $order){
									echo "<b>Date de la commande :</b> ".$order["date"];
									echo "<table class=\"ordersTable\"><tr><th>Description</th><th>ID</th><th>Quantité</th></tr>";
									foreach($order["items_list"] as $product){
										echo '<tr><td>'.$product['description'].'</td><td>'.$product['id'].'</td><td>'.$product['quantity'].'</td></tr>';
									}
									echo "</table><hr><br>";
								}
								break;
							}
						}
					?>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>