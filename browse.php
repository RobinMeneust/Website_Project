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
                <h1>Liste des catégories</h1><br>
				<table class="categoriesTable">
                    <?php
                        $dataFile = fopen("data/categories.csv", "r") or die("ERROR the file data/categories.csv could not be opened");
                        fgetcsv($dataFile, 100, ","); // Used to ignore the 1st line of the csv file
                        while(($data = fgetcsv($dataFile, 100, ",")) !=FALSE){
                            if(isset($data[1])) // We get the 2nd element (the name of the categorie)
                                echo "<tr><td><a href=\"categorie.php?catID=$data[0]&catName=$data[1]\">$data[1]</a></td></tr>";
                        }
                        fclose($dataFile);
                    ?>
                </table>
				<?php
					if(isset($_SESSION["invalidCategoryParams"]) && $_SESSION["invalidCategoryParams"]){
						echo "<span style=\"color:red\">Erreur catégorie inexistante, veuillez nous contacter via la page Contact</span>";
						$_SESSION["invalidCategoryParams"]=false;
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