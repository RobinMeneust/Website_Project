<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="profilDiv">
		<?php
			if(!isset($_SESSION["currentUser"])){
				header("Location:php/login.php");
				exit();
			}
		?>
		<h2 style="text-align:center;">Profil</h2>
		<table style="padding:5px; margin-bottom:10px; width:100%;">
			<tr>
				<td>Pseudonyme : </td>
				<td><?php echo ($_SESSION["currentUser"]["login"]); ?></td>
				<td style="padding-left:10px;">Modifier</td>
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
				<td style="padding-left:10px;">Modifier</td>
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
				<td><?php echo ($_SESSION["currentUser"]["address"]); ?></td>
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
				<td><?php echo ("********");?></td>
				<td style="padding-left:0px;">Afficher</td>
				<td style="padding-left:0px;">Modifier</td>
			</tr>
		</table>
		<a href="./php/logout.php" tite="Logout" style="margin-left:10px; padding:5px;">Se déconnecter</a>
		<a href="./index.php" tite="Index" style="margin-left:10px; padding:5px;">Accueil</a>
	</div>
</body>
</html>
<!-- $_SESSION["currentPassword"] -->