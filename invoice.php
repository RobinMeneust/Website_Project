<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Envoi du formulaire de contact</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
	<script src='../js/global.js'></script>
</head>
<body onload="clearSessionCart();">
	<?php

		$from="websiteprojet2022@gmail.com";
		$to=$_SESSION["currentUser"]["email"];
		$subject="Commande de ".$_SESSION["currentUser"]["first_name"]." ".$_SESSION["currentUser"]["last_name"];
		$total=0;
		$message="";

		if(isset($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $product){
				$message.="• " . $product['description'] . " : " . $product['quantity'] . " x " . $product['price'] . " = " . floatval(substr($product['price'], 0, -1))*$product['quantity'] . "€\n\n";
				$total+=floatval(substr($product['price'], 0, -1))*$product['quantity'];
			}
			$message.="\n Total : ".$total."€";
		}		
		
		echo "<table class=\"mailTable\">";
		echo "<tr><td><b>De</b> : $from </td></tr>";
		echo "<tr><td><b>À</b> : $to </td></tr>";
		echo "<tr><td><b>Objet</b> : $subject</td></tr>";
		echo "<tr><td>".nl2br($message)."</td></tr>";
		if(strlen($message)>1800){
			$message = substr($message, 0, 1800); // if the message is too long we have to shorten it
		}
		echo "<tr><td><a href=\"mailto:$to?subject=".rawurlencode($subject)."&body=".rawurlencode($message)."\">Envoyer</a><a href=\"./index.php\">Retour à l'accueil</a></td></tr>";
		echo "</table>";
	?>
</body>
</html>
