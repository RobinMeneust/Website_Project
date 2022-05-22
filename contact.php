<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Contact</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
	<script src="js/formChecker.js"></script>
	<script src="js/global.js"></script>
</head>
<div class="wrapper">
		<header>
			<?php include('php/prefab/header.php')?>
		</header>
		<div class="base">
			<div class="box verticalMenuContainer">
				<?php include('php/prefab/verticalMenu.php')?>
			</div>
			<div class="box mainPart">
				<form name="contact_form" id="contact_form" method="post" action="sendContactForm.php">
					<h1>Demande de contact</h1><br>
					<table class="tableForm">
						<tr>
							<td class="smallSize"><label for="contact_form_date">Date du contact *</label></td>
							<td><input class="smallSize" type="date" id="contact_form_date" name="contact_form_date" value="<?php echo date('Y-m-d') ?>" readonly></td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_lastName">Nom *</label></td>
							<td>
								<input onfocusout="checkStringFormat(this)" maxlength="100" class="mediumSize" placeholder="Entrez votre nom" type="text" id="contact_form_lastName" name="contact_form_lastName" required>
							</td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_firstName">Prénom *</label></td>
							<td>
								<input onfocusout="checkStringFormat(this)" maxlength="100" class="mediumSize" placeholder="Entrez votre prénom" type="text" id="contact_form_firstName" name="contact_form_firstName" required>
							</td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_email">Email *</label></td>
							<td>
								<input maxlength="255" class="mediumSize" placeholder="monmail@monsite.org"  type="email" id="contact_form_email" name="contact_form_email" required>
							</td>
						</tr>
						<tr>
							<td class="smallSize">Genre</td>
							<td>
								<input style="margin: 0 7px 0 7px" type="radio" id="contact_form_genderF" name="contact_form_gender" value="Femme"><label for="contact_form_genderF">Femme</label>
								<input style="margin: 0 7px 0 7px" type="radio" id="contact_form_genderM" name="contact_form_gender" value="Homme"><label for="contact_form_genderM">Homme</label>
							</td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_birthDate">Date de Naissance</label></td>
							<td><input class="smallSize" type="date" id="contact_form_birthDate" name="contact_form_birthDate"></td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_job">Fonction</label></td>
							<td><select id="contact_form_job" name="contact_form_job">
								<option selected></option>
								<option>Agriculteurs exploitants</option>
								<option>Artisans, commerçants, chefs d'entreprise</option>
								<option>Cadres et professions intellectuelles supérieures</option>
								<option>Professions intermédiaires</option>
								<option>Employés</option>
								<option>Ouvriers</option>
								<option>Retraités</option>
								<option>Autres personnes sans activité professionnelle</option>
							</select></td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_subject">Sujet *</label></td>
							<td>
								<input maxlength="255" class="mediumSize" placeholder="Entrez le sujet de votre mail" type="text" id="contact_form_subject" name="contact_form_subject" required>
							</td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_content">Contenu *</label></td>
							<td>
								<textarea maxlength="10000" style="resize: none;" rows="5" cols="120" placeholder="Tapez ici votre mail" id="contact_form_content" name="contact_form_content" style="height: 10vh; width:50vw" required></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input class="submitButton" type="submit"><span style="margin-left: 50px">Les champs avec un * ne doivent pas être vides</span></td>
						</tr>
						<?php 
							if(isset($_SESSION["incorrectContactForm"]) && $_SESSION["incorrectContactForm"]){
								echo "<tr> <td></td> <td><span style=\"color:red\">Formulaire incorrect, veuillez revérifier vos valeurs et donner des dates correctes</span></td></tr>";
								$_SESSION["incorrectContactForm"]=false;
							}
						?>
					</table>
				</form>
			</div>
		</div>
		<footer>
			<?php include('php/prefab/footer.php')?>
		</footer>
	</div>
</body>
</html>