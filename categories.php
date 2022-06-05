<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Produits</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
	<script src="js/categorieGeneration.js"></script>
	<script src="js/catalogue.js"></script>
	<script src="js/global.js"></script>
</head>
<body onload="loadCategory('<?php if(isset($_REQUEST["catID"])){ echo $_REQUEST["catID"]; } ?>');">
<div class="wrapper">
		<header>
			<?php include('php/prefab/header.php')?>
		</header>
		<div class="base">
			<div class="box verticalMenuContainer">
				<?php include('php/prefab/verticalMenu.php')?>
			</div>
			<div class="box mainPart">
				<h1><?php if(isset($_REQUEST["catName"])) echo $_REQUEST["catName"]; ?></h1><br>
				<table id="cat"></table>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>