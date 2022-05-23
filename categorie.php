<?php
	session_start();
	if(!isset($_REQUEST["catID"], $_REQUEST["catName"])){
		$_SESSION["invalidCategoryParams"]=true;
		header("Location: browse.php", true);
		exit();
	}
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
<body onload="loadCategorie('<?php echo $_REQUEST["catID"]; ?>');">
<div class="wrapper">
		<header>
			<?php include('php/prefab/header.php')?>
		</header>
		<div class="base">
			<div class="box verticalMenuContainer">
				<?php include('php/prefab/verticalMenu.php')?>
			</div>
			<div class="box mainPart">
				<h1><?php echo $_REQUEST["catName"]; ?></h1><br>
				<table id="cat"></table>
				<button id="buttonHideStock" type="submit" class="button"  onclick="hide()">Cacher stock</button>
				<?php
					if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_REQUEST["quantity"], $_REQUEST["productID"])){
						$quantity=$_REQUEST["quantity"];
						$productID=$_REQUEST["productID"];

						if(isset($_REQUEST['cart'][$productID])){	
							if($_SESSION['cart'][$productID]!=$quantity){
								//update existing var
								$_SESSION['cart'][$productID]=$quantity;
							}
						}
						else{
							//new var
							$_SESSION['cart'][$productID]=$quantity;
						}
					}
					echo "<span>TEST SESSION: (for ID=".$productID.") ".$_SESSION['cart'][$productID]." | TEST FORM: ".$productID." ".$quantity."</span><br>";
				?>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>