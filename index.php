<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script src="js/login.js"></script>
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
				<h1>PLACEHOLDER TITLE</h1><br>
				<p>
					<?php
						//PLACEHOLDER
						for($i=0; $i<5; $i++){
							echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard ";
						}
					?>
				</p>
			</div>
		</div>
		<footer>
			<div class="footerContent">
				<h4>footer title placeholder</h4><br>
				<address>
					placeholder<br>
				</address>
			</div>
		</footer>
	</div>
</body>
</html>