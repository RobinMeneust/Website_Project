<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Panier</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
	<script src="js/global.js"></script>
	<script src='./js/cartConfirmation.js'></script>
	<script src="js/catalogue.js"></script>
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
				<h1>PANIER</h1><br>

                <form method="POST" action="./php/cartConfirmation.php">
					<?php 
						$returnedHTML='<table id="tableCart"><tr><th>Photo</th><th>Référence</th><th>Description</th><th>Prix</th><th class="stockColumn">Stock</th><th>Quantité Commandée</th></tr>';
    					$cartSize=0;
    					$totalPrice=0;
						$i = 1;
    					if(isset($_SESSION['cart'])) {
        					foreach($_SESSION['cart'] as $product){
            					if(isset($product['imgSrc'], $product['description'], $product['price'], $product['stock'], $product['quantity'], $product['id'])){
                					$returnedHTML.="<tr id='".$i."'><td><img class='catalogueImg' style='cursor:default' alt='".$product['imgSrc']."' src='".$product['imgSrc']."' alt='Photo de bananes'></td><td id='ref'>".$product['id']."</td><td>".$product['description']."</td><td id='price". $i ."'>".$product['price']."</td><td id='stockID".$i."'>".$product['stock']."</td><td><input type='button' id='button-".$i."' value='-' onclick='decrease(`".$i."`); minusSize(`".$i."`);'><input type='number' id='quantity". $i ."' name='quantity' min='0' size='6' value='".$product['quantity']."' disabled /><input type='button' id='button+".$i."' value='+' onclick='increase(`".$i."`); plusSize(`".$i."`);'><br><input type='button' id='buttonX".$i."' value='X' onclick='deleteTr(`".$i."`,`".$product['id']." `);'></td></tr>";
                					$cartSize+=intval($product['quantity'], 10);
                					$totalPrice+=floatval(substr($product['price'], 0, -1))*$product['quantity']; // we delete the "€" character at the end and we convert the string to a number
									$i += 1;
            					}
        					}
   		 				}
    					$returnedHTML.="<tr><td></td><td><b>Total</b></td><td id='total'>$totalPrice</td><td></th><td id='cartSize'>$cartSize</td></tr></table>";
    					echo $returnedHTML;
					?>
					<button class="submitButton" onclick="clearSessionCart();">Vider le panier</button>
                    <input type="submit" value="Confirmer la commande" name="cartConfirmation" />
                </form>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>