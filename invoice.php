<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Envoi du formulaire de contact</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
</head>
<body>
	<?php




					$_SESSION['cart'][0]['id']=0;
			$_SESSION['cart'][0]['quantity']=2;
			$_SESSION['cart'][0]['imgSrc']="./img/bananes.jpg";
			$_SESSION['cart'][0]['description']="des bananes";
			$_SESSION['cart'][0]['price']=3;
			$_SESSION['cart'][0]['stock']=30;

			$_SESSION['cart'][1]['id']=1;
			$_SESSION['cart'][1]['quantity']=5;
			$_SESSION['cart'][1]['imgSrc']="./img/carottes.jpg";
			$_SESSION['cart'][1]['description']="des carottes";
			$_SESSION['cart'][1]['price']=5;
			$_SESSION['cart'][1]['stock']=50;

			$_SESSION["currentUser"]["last_name"] = "Smith";
			$_SESSION["currentUser"]["email"] = "smith@gmail.com";



		$from="websiteprojet2022@gmail.com";
		$to=$_SESSION["currentUser"]["email"];
		$subject="Commande de " . $_SESSION["currentUser"]["last_name"];
		$total=0;

		$message='<ul>';
		foreach($_SESSION['cart'] as $product){
			$message.="<li>" . $product['id'] . " : " . $product['quantity'] . " x " . $product['price'] . "€ = " . $product['quantity']*$product['price'] . "€</li>";
			$total+=$product['quantity']*$product['price'];
		}
		$message.='Total : '.$total.'€</ul>';
			
		echo "<table class=\"mailTable\">";
		echo "<tr><td><b>De</b> : $from </td></tr>";
		echo "<tr><td><b>À</b> : $to </td></tr>";
		echo "<tr><td><b>Objet</b> : $subject</td></tr>";
		echo "<tr><td>$message</td></tr>";
		echo "<tr><td><a href=\"mailto:$to?subject=$subject&body=$message\">Envoyer</a></td></tr>";
		echo "</table>";
	?>
</body>
</html>
