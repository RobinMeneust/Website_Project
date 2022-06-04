<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>A propos</title>
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
				<h1>A PROPOS</h1><br><br><br>
				<p>
					&emsp;&emsp;Le site Mini U, créé en mai 2022, a pour but de reproduire les fonctionnalités d'un site de vente en ligne.
					Il est né dans le cadre d'un projet scolaire ayant pour but la mise en pratique de nos cours de développement web en utilisant : HTML, PHP, JavaScript, AJAX, ...
				</p><br>
				<p>
					&emsp;&emsp;Ce site dispose d'une fonctionnalité de connexion et de création de compte complet. 
					Vous avez la possibilité de modifier les coordonnées de votre compte. Vous pouvez aussi contacter l'entreprise fictive en vous rendant sur la page "Contact". 
					Il vous est possible de gérer vos achats rapidement en naviguant parmi nos listes de produits et de surveiller la liste de vos achats en vous rendant dans votre panier.
					Nos produits sont triés en trois catégories : Fruits et Légumes, Viandes et Poissons et enfin Desserts. 
					Soyez libre de commander ce que vous voulez dans la limite de votre budget et de nos stocks disponibles.
				</p><br>
				<p>
					&emsp;&emsp;Il s'agit là d'une simulation et non d'un cas concret, ne vous attendez pas à recevoir réellement ces produits nous ne voulons pas de clients déçus !
				</p>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>