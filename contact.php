<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script src="js/contact.js"></script>
</head>
<body>
	<div class="wrapper">
		<header>
			<table class="tableHeader">
				<tr>
					<td class="logo"><img src="./img/logo.png" alt="logo_du_site" width="250px"></td>
					<td><h1 class="title">LA FLEUR</h1></td>
					<td>
						<span class="loginBox">
							<svg width="20px" height="20px" fill="#e94560"><path d="M10 12c-7.3 0-9 5.5-9 5.5v1h18v-1S17.3 12 10 12z"/><circle cx="10" cy="6" r="5"/></svg>
							<a href="php/login.php">Connexion</a>
						</span>
						<span class="cartBox">
							<svg width="20px" height="20px" viewBox="0 0 122.88 111.85" fill="#e94560"><path d="M4.06,8.22A4.15,4.15,0,0,1,0,4.06,4.13,4.13,0,0,1,4.06,0h6A19.12,19.12,0,0,1,20,2.6c5.44,3.45,6.41,8.38,7.8,13.94h91a4.07,4.07,0,0,1,4.06,4.06,5,5,0,0,1-.21,1.25L112.06,64.61a4,4,0,0,1-4,3.13H41.51c1.46,5.41,2.92,8.32,4.89,9.67C48.8,79,53,79.08,59.93,79h47.13a4.06,4.06,0,0,1,0,8.12H60c-8.63.1-13.94-.11-18.2-2.91s-6.66-7.91-8.95-17h0L18.94,14.46c0-.1,0-.1-.11-.21a7.26,7.26,0,0,0-3.12-4.68A10.65,10.65,0,0,0,10,8.22H4.06Zm80.32,25a2.89,2.89,0,0,1,5.66,0V48.93a2.89,2.89,0,0,1-5.66,0V33.24Zm-16.95,0a2.89,2.89,0,0,1,5.67,0V48.93a2.89,2.89,0,0,1-5.67,0V33.24Zm-16.94,0a2.89,2.89,0,0,1,5.66,0V48.93a2.89,2.89,0,0,1-5.66,0V33.24Zm41.72-8.58H30.07l9.26,34.86H105l8.64-34.86Zm2.68,67.21a10,10,0,1,1-10,10,10,10,0,0,1,10-10Zm-43.8,0a10,10,0,1,1-10,10,10,10,0,0,1,10-10Z"/></svg>
							<a href="cart.php">Panier</a>
						</span>
					</td>
				</tr>
				<tfoot>
					<tr class="horizontalMenu">
						<td colspan="3">
							<nav>
								<ul class="navElement">
									<li><a href="index.php">Accueil</a></li>
									<li><a href="WIP.php">Bulbes</a></li>
									<li><a href="WIP.php">Rosiers</a></li>
									<li id="largeNavElement"><a href="WIP.php">Plantes à massif</a></li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</nav>
						</td>
					</tr>
				</tfoot>
			</table>
		</header>
		<div class="base">
			<div class="box menu">
				<p>Placeholder menu</p><br>
				<ul class="menuElement">
					<li><a href="index.php"><img src=img/logo.png alt="PLACEHOLDER">Accueil</a></li>
				</ul>
				<br><hr style="width:10vw"><br>
				<p>Placeholder menu</p><br>
				<ul class="menuElement">
					<li><a href="WIP.php"><img src=img/logo.png alt="PLACEHOLDER">Bulbes</a></li>
					<li><a href="WIP.php"><img src=img/logo.png alt="PLACEHOLDER">Rosiers</a></li>
					<li><a href="WIP.php"><img src=img/logo.png alt="PLACEHOLDER">Plantes à massif</a></li>
					<li><a href="contact.php"><img src=img/logo.png alt="PLACEHOLDER">Contact</a></li>
				</ul>
			</div>
			<div class="box mainPart">
				<h1>PLACEHOLDER TITLE</h1><br>
				<form name="contact_form" id="contact_form" method="post">
					<h1 style="text-align: center; color:#e94560;">Demande de contact</h1><br>
					<table class="tableContactForm">
						<tr>
							<td class="smallSize"><label for="contact_form_date">Date du contact</label></td>
							<td><input class="smallSize" type="date" id="contact_form_date" name="contact_form_date" required></td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_lastName">Nom</label></td>
							<td>
								<input onfocusout="checkStringFormat(this)" class="mediumSize" placeholder="Entrez votre nom" type="text" id="contact_form_lastName" name="contact_form_lastName" required>
							</td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_firstName">Prénom</label></td>
							<td>
								<input onfocusout="checkStringFormat(this)" class="mediumSize" placeholder="Entrez votre prénom" type="text" id="contact_form_firstName" name="contact_form_firstName" required>
							</td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_email">Email</label></td>
							<td>
								<input placeholder="monmail@monsite.org" class="mediumSize" type="email" id="contact_form_email" name="contact_form_email" required>
							</td>
						</tr>
						<tr>
							<td class="smallSize">Genre</td>
							<td>
								<input style="margin: 0 7px 0 7px" type="radio" id="contact_form_genderF" name="contact_form_gender"><label for="contact_form_genderF" required>Femme</label>
								<input style="margin: 0 7px 0 7px" type="radio" id="contact_form_genderM" name="contact_form_gender"><label for="contact_form_genderM">Homme</label>
							</td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_birthDate">Date de Naissance</label></td>
							<td><input class="smallSize" type="date" id="contact_form_birthDate" name="contact_form_birthDate" required></td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_job">Fonction</label></td>
							<td><select id="contact_form_job" name="contact_form_job" required>
								<option>Agriculteurs exploitants</option>
								<option>Artisans. commerçants. chefs entreprise</option>
								<option>Cadres et professions intellectuelles supérieures</option>
								<option>Professions intermédiaires</option>
								<option>Employés</option>
								<option>Ouvriers</option>
								<option>Retraités</option>
								<option>Autres personnes sans activité professionnelle</option>
							</select></td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_subject">Sujet</label></td>
							<td>
								<input maxlength="255" class="mediumSize" placeholder="Entrez le sujet de votre mail" type="text" id="contact_form_subject" name="contact_form_subject" required>
							</td>
						</tr>
						<tr>
							<td class="smallSize"><label for="contact_form_content">Contenu</label></td>
							<td>
								<textarea maxlength="10000" style="resize: none;" rows="5" cols="120" placeholder="Tapez ici votre mail" id="contact_form_content" name="contact_form_content" style="height: 10vh; width:50vw" required></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input class="submitButton" type="submit"></td>
						</tr>
					</table>
				</form>
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