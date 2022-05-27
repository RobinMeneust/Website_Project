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
	<script src="js/formChecker.js"></script>
</head>
<body onload="loadEditableProducts(); loadCategoriesSelectList();">
	<div class="wrapper">
		<header>
			<?php include('php/prefab/header.php')?>
		</header>
		<div class="base">
			<div class="box verticalMenuContainer">
				<?php include('php/prefab/verticalMenu.php')?>
			</div>
			<div class="box mainPart">
				<h1>Gestion du site</h1><br><br>
				<table id="editProductsTable"></table><br><br>
				<h2>Nouveau produit</h2><br><br>
				<table id="newProductTable">
					<tr><th>Photo</th><th>Nom<th>Description</th><th>Prix</th><th>Stock</th><th>Catégorie</th><th>Action</th></tr>
					<tr><td><input maxlength="500" class="smallSize" placeholder="Entrez le chemin" type="text" id="imgSrcOfNewItem" name="imgSrcOfNewItem"></td>
					<td><input onfocusout="checkStringFormat(this, 'default')" maxlength="100" class="smallSize" placeholder="Entrez le nom" type="text" id="nameOfNewItem" name="nameOfNewItem"></td>
					<td><input maxlength="100" class="smallSize" placeholder="Entrez la description" type="text" id="descriptionOfNewItem" name="descriptionOfNewItem"></td>
					<td><input onfocusout="checkIfElementValueIsPositive(this)" type="number" step="0.01" id="priceOfNewItem" name="priceOfNewItem" min="0" max="" value="0" size="3">€</td>
					<td><input onfocusout="checkIfElementValueIsPositive(this)" type="number" id="stockOfNewItem" name="stockOfNewItem" min="0" max="" value="0" size="3"></td>
					<td>
						<table id="newCategoryTable">
							<tr><td>Créer une nouvelle : </td><td><input onfocusout="checkStringFormat(this, 'default', true)" maxlength="100" class="smallSize" placeholder="Entrez le nom de la catégorie" type="text" id="categoryNameOfNewItem" name="categoryNameOfNewItem"></td></tr>
							<tr><td>Ou prendre une existante : </td><td><select id="select_categoryNameOfNewItem" name="select_categoryNameOfNewItem"></select></td></tr>
						</table>
					</td>
					<td><button class="submitButton" onclick="addNewProduct(); loadEditableProducts(); loadCategoriesSelectList();">Ajouter</button></td></tr>
				</table>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>