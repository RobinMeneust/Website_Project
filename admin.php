<?php 
    session_start(); 
    if(!isset($_SESSION["currentUser"]) || $_SESSION['currentUser']['id']!="u00"){
        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion du site</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
	<script src="js/global.js"></script>
    <script src="js/admin.js"></script>
</head>
<body onload="loadStock();">
	<div class="wrapper">
		<header>
			<?php include('php/prefab/header.php')?>
		</header>
		<div class="base">
			<div class="box verticalMenuContainer">
				<?php include('php/prefab/verticalMenu.php')?>
			</div>
			<div class="box mainPart">
				<h1>Gestion du site</h1><br>
                <table id="editStockTable"></table>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>