<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Profil</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="img/logo.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
		var bool = 0;
		function showPassword(){
			if (bool == 0){
				document.getElementById("profilePassword").innerHTML = "<?php echo $_SESSION["currentUser"]["password"]; ?>";
				document.getElementById("showPassword").innerHTML = "Cacher";
				bool = 1;
			} else {
				document.getElementById("profilePassword").innerHTML = "********";
				document.getElementById("showPassword").innerHTML = "Afficher";
				bool = 0;
			}
		}
	</script>
</head>
<body>
	<div class="profileDiv">
		<?php
			if(!isset($_SESSION["currentUser"])){
				header("Location:login.php");
				exit();
			}
		?>
		<h2 style="text-align:center;">Profil</h2>
		<table style="padding:5px; margin-bottom:10px; width:100%;">
			<tr>
				<td>Identifiant : </td>
				<td><?php echo ($_SESSION["currentUser"]["login"]); ?></td>				
			</tr>
			<tr>
				<td>Prénom : </td>
				<td><?php echo ($_SESSION["currentUser"]["first_name"]); ?></td>				
			</tr>
			<tr>
				<td>Nom : </td>
				<td><?php echo ($_SESSION["currentUser"]["last_name"]); ?></td>				
			</tr>
			<tr>
				<td>Genre : </td>
				<td><?php echo ($_SESSION["currentUser"]["gender"]); ?></td>				
			</tr>
			<tr>
				<td>Mail : </td>
				<td><?php echo ($_SESSION["currentUser"]["email"]); ?></td>				
			</tr>
			<tr>
				<td>Téléphone : </td>
				<td><?php echo ($_SESSION["currentUser"]["phone_nb"]); ?></td>				
			</tr>
			<tr>
				<td>Date de naissance : </td>
				<td><?php echo ($_SESSION["currentUser"]["birth_date"]); ?></td>				
			</tr>
			<tr>
				<td>Adresse : </td>
				<td><?php 
					echo ($_SESSION["currentUser"]["address"]);
					if($_SESSION["missingAddress"]==true){
						echo '<span style="color:red;">Veuillez entrer votre adresse avant de commander</span>';
						$_SESSION["missingAddress"]=false;
					}
				?></td>				
			</tr>
			<tr>
				<td>Fonction : </td>
				<td><?php echo ($_SESSION["currentUser"]["job"]); ?></td>
			</tr>
			<tr>
				<td>Id compte : </td>
				<td><?php echo ($_SESSION["currentUser"]["id"]); ?></td>
			</tr>
			<tr>
				<td>Mot de Passe : </td>
				<td><p id="profilePassword" style="font-size: small;">********</p></td>
				<td><button class="showPassword" id="showPassword" onclick="showPassword()">Afficher</button></td>
			</tr>
		</table>
		<a href="php/logout.php" title="Logout" style="margin-left:10px; padding:5px;">Se déconnecter</a>
		<a href="index.php" title="Index" style="margin-left:10px; padding:5px;">Accueil</a>
		<a href="editProfile.php" title="EditProfile" style="margin-left:10px; padding:5px;">Modifier le profil</a>
	</div>
</body>
</html>