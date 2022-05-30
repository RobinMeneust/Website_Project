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
		$subject="Commande de " . $_SESSION["currentUser"]["last_name"];
		$total=0;

		$message='<ul>';
		foreach($_SESSION['cart'] as $product){
			$message.="<li>" . $product['description'] . ", " . $product['id'] . " : " . $product['quantity'] . " x " . $product['price'] . " = " . floatval(substr($product['price'], 0, -1))*$product['quantity'] . "€</li>";
			$total+=floatval(substr($product['price'], 0, -1))*$product['quantity'];
		}
		$message.='Total : '.$total.'€</ul>';
			
		echo "<table class=\"mailTable\">";
		echo "<tr><td><b>De</b> : $from </td></tr>";
		echo "<tr><td><b>À</b> : $to </td></tr>";
		echo "<tr><td><b>Objet</b> : $subject</td></tr>";
		echo "<tr><td>$message</td></tr>";
		echo "<tr><td><a href=\"mailto:$to?subject=$subject&body=$message\">Envoyer</a><a href=\"./index.php\">Retour à l'accueil</a></td></tr>";
		echo "</table>";
	?>
</body>
</html>
