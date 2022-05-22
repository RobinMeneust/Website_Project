<?php
	session_start();
	if(!(isset($_SESSION["currentUser"]))){
		header("Location: login.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Edit Profil</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
	<script src="js/formChecker.js"></script>
</head>
<body>
	<div class="editProfilDiv">
		<form name="editProfil_form" id="editProfil_form" method="post" action="php/editProfilConfirmation.php">
			<h1>Modification du profil</h1><br>
			<table class="tableForm">
				<tr>
					<td class="smallSize"><label for="lastName">Nom</label></td>
					<td>
						<input onfocusout="checkStringFormat(this)" maxlength="100" class="mediumSize" placeholder="<?php echo $_SESSION["currentUser"]["last_name"]; ?>" type="text" id="lastName" name="lastName">
					</td>
				</tr>
				<tr>
					<td class="smallSize"><label for="firstName">Prénom</label></td>
					<td>
						<input onfocusout="checkStringFormat(this)" maxlength="100" class="mediumSize" placeholder="<?php echo $_SESSION["currentUser"]["first_name"]; ?>" type="text" id="firstName" name="firstName">
					</td>
				</tr>
				<tr>
					<td class="smallSize"><label for="username">Identifiant</label></td>
					<td>
						<input onfocusout="checkStringFormat(this)" maxlength="100" class="mediumSize" placeholder="<?php echo $_SESSION["currentUser"]["login"]; ?>" type="text" id="username" name="username">
					</td>
				</tr>
				<tr>
					<td class="smallSize"><label for="email">Email</label></td>
					<td>
						<input maxlength="255" class="mediumSize" placeholder="<?php echo $_SESSION["currentUser"]["email"]; ?>"  type="email" id="email" name="email">
					</td>
				</tr>
				<tr>
					<td class="smallSize">Genre</td>
					<td>
						<input style="margin: 0 7px 0 7px" type="radio" id="genderF" name="gender" value="F"><label for="genderF">Femme</label>
						<input style="margin: 0 7px 0 7px" type="radio" id="genderM" name="gender" value="M"><label for="genderM">Homme</label>
					</td>
				</tr>
				<tr>
					<td class="smallSize"><label for="birthDate">Date de Naissance</label></td>
					<td><input class="smallSize" type="date" id="birthDate" name="birthDate"></td>
				</tr>
				<tr>
					<td class="smallSize"><label for="job">Fonction</label></td>
					<td>
						<select id="job" name="job">
							<option>Agriculteurs exploitants</option>
							<option>Artisans, commerçants, chefs d'entreprise</option>
							<option>Cadres et professions intellectuelles supérieures</option>
							<option>Professions intermédiaires</option>
							<option>Employés</option>
							<option>Ouvriers</option>
							<option>Retraités</option>
							<option>Autres personnes sans activité professionnelle</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="smallSize"><label for="tel">Téléphone</label></td>
					<td><input maxlength="15" onfocusout="checkStringFormat(this, 'tel')" class="smallSize" placeholder="<?php echo $_SESSION["currentUser"]["phone_nb"]; ?>" type="tel" name="tel" id="tel"></td>
				</tr>
				<tr>
					<td class="smallSize"><label for="address">Adresse</label></td>
					<td><input onfocusout="checkStringFormat(this)" class="mediumSize" placeholder="<?php echo $_SESSION["currentUser"]["address"]; ?>" type="text" name="address" id="address"></td>
				</tr>
				<tr>
					<td class="smallSize"><label for="password">Nouveau mot de passe</label></td>
					<td><input maxlength="100" onfocusout="checkStringFormat(this, 'passwd')" class="mediumSize" placeholder="******" type="password" name="password" id="password"></td>
				</tr>
				<tr>
					<td class="smallSize"><label for="password">confirmer le nouveau mot de passe</label></td>
					<td><input maxlength="100" onfocusout="checkStringFormat(this, 'passwd')" class="mediumSize" placeholder="******" type="password" name="newPassword" id="newPassword"></td>
				</tr>
				<tr>
					<td class="smallSize"><label for="password">mot de passe actuel *</label></td>
					<td><input maxlength="100" onfocusout="checkStringFormat(this, 'passwd')" class="mediumSize" type="password" name="oldPassword" id="oldPassword"></td>
				</tr>
				<tr><td><td><i>Vous devez écrire votre mot de passe actuel pour changer les informations de votre compte.</i></td></td></tr>
				<tr>
					<td></td>
					<td><input class="submitButton" type="submit" value="Valider"></td>
				</tr>
			</table>
			<?php 
			if(isset($_SESSION["MailAlreadyUse"])){
				if($_SESSION["MailAlreadyUse"]==1){
					echo ('<p style="color:red; margin-top:5px; font-size: medium; text-align: center;">Cette adresse mail est déjà utilisé</p>');
					$_SESSION["MailAlreadyUse"]=0;
				}
			}
			if(isset($_SESSION["UsernameAlreadyUse"])){
				if($_SESSION["UsernameAlreadyUse"]==1){
					echo ('<p style="color:red; margin-top:5px; font-size: medium; text-align: center;">Ce pseudonyme est déjà utilisé</p>');
					$_SESSION["UsernameAlreadyUse"]=0;
				}
			}
			if(isset($_SESSION["ErrorPassword"]) && isset($_SESSION["ErrorNewPassword"])){
				if($_SESSION["ErrorPassword"]==1 || $_SESSION["ErrorNewPassword"]==1){
					echo ('<p style="color:red; margin-top:5px; font-size: medium; text-align: center;">Mot de passe invalide.</p>');
					$_SESSION["ErrorPassword"]=0;
					$_SESSION["ErrorNewPassword"]=0;
				}
			}
			?>
		</form>
	</div>
		<div class="loginFooter">
			<p>
				<a href="login.php">Retour</a>
				<a href="index.php">Retourner à l'accueil</a>
			</p>
		</div>
</body>
</html>