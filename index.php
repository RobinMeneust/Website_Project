<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Accueil</title>
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
			<div class="box mainPart" style="text-align:center;">
				<h1>Faites vos courses avec Mini U !</h1><br>
				<img src="./img/logo.png" alt="logo_du_site" width="300px">
				<p style="text-align:center;">
					Bonjour à vous ! La société Mini U est ravie de vous accueillir sur son site web !
				</p>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>