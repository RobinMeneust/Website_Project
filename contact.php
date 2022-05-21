<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script src="js/contact.js"></script>
	<script src="js/global.js"></script>
</head>
<body>
	<div class="wrapper">
		<header>
			<table class="tableHeader">
				<tr>
					<td class="logo"><img src="./img/logo.png" alt="logo_du_site" width="250px"></td>
					<td><h1 class="title">PLACEHOLDER TITLE</h1></td>
					<td>
						<span class="loginBox">
							<svg width="20px" height="20px" fill="#e94560"><path d="M10 12c-7.3 0-9 5.5-9 5.5v1h18v-1S17.3 12 10 12z"/><circle cx="10" cy="6" r="5"/></svg>
							<?php
								echo ('<a href=');
								if(!isset($_SESSION["currentUser"]))
									echo ('"php/login.php">Connexion</a>');
								else echo ('"profile.php">'.$_SESSION["currentUser"]["login"].'</a>');
							?>
						</span>
						<br>
						<span class="cartBox">
							<svg width="20px" height="20px" viewBox="0 0 122.88 111.85" fill="#e94560"><path d="M4.06,8.22A4.15,4.15,0,0,1,0,4.06,4.13,4.13,0,0,1,4.06,0h6A19.12,19.12,0,0,1,20,2.6c5.44,3.45,6.41,8.38,7.8,13.94h91a4.07,4.07,0,0,1,4.06,4.06,5,5,0,0,1-.21,1.25L112.06,64.61a4,4,0,0,1-4,3.13H41.51c1.46,5.41,2.92,8.32,4.89,9.67C48.8,79,53,79.08,59.93,79h47.13a4.06,4.06,0,0,1,0,8.12H60c-8.63.1-13.94-.11-18.2-2.91s-6.66-7.91-8.95-17h0L18.94,14.46c0-.1,0-.1-.11-.21a7.26,7.26,0,0,0-3.12-4.68A10.65,10.65,0,0,0,10,8.22H4.06Zm80.32,25a2.89,2.89,0,0,1,5.66,0V48.93a2.89,2.89,0,0,1-5.66,0V33.24Zm-16.95,0a2.89,2.89,0,0,1,5.67,0V48.93a2.89,2.89,0,0,1-5.67,0V33.24Zm-16.94,0a2.89,2.89,0,0,1,5.66,0V48.93a2.89,2.89,0,0,1-5.66,0V33.24Zm41.72-8.58H30.07l9.26,34.86H105l8.64-34.86Zm2.68,67.21a10,10,0,1,1-10,10,10,10,0,0,1,10-10Zm-43.8,0a10,10,0,1,1-10,10,10,10,0,0,1,10-10Z"/></svg>
							<a href="
								<?php
									if(!isset($_SESSION["currentUser"]))
										echo ('php/login.php');
									else echo ('cart.php');
								?>">Panier</a>
						</span>
					</td>
				</tr>
				<tfoot>
					<tr class="horizontalMenu">
						<td colspan="3">
							<nav>
								<ul class="navElement">
									<li><a href="index.php">Accueil</a></li>
									<li id="largeNavElement"><a href="categorie.php?cat=c1">Fruits et Légumes</a></li>
									<li><a href="categorie.php?cat=c2">Viandes</a></li>
									<li><a href="categorie.php?cat=c3">Desserts</a></li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</nav>
						</td>
					</tr>
				</tfoot>
			</table>
		</header>
		<div class="base">
			<div style="text-align:center">
				<button class="verticalMenuButton" onclick="changeMenuDisplay('show')">☰</button>
				<div class="verticalMenu">
					<br><br><br><br>
					<ul class="menuElement">
						<li><a href="index.php">
							<svg viewBox="0 0 122.88 88.86"><title>email</title><path d="M7.05,0H115.83a7.07,7.07,0,0,1,7,7.05V81.81a7,7,0,0,1-1.22,4,2.78,2.78,0,0,1-.66,1,2.62,2.62,0,0,1-.66.46,7,7,0,0,1-4.51,1.65H7.05a7.07,7.07,0,0,1-7-7V7.05A7.07,7.07,0,0,1,7.05,0Zm-.3,78.84L43.53,40.62,6.75,9.54v69.3ZM49.07,45.39,9.77,83.45h103L75.22,45.39l-11,9.21h0a2.7,2.7,0,0,1-3.45,0L49.07,45.39Zm31.6-4.84,35.46,38.6V9.2L80.67,40.55ZM10.21,5.41,62.39,47.7,112.27,5.41Z"/></svg>
							<span class="verticalMenuText">Accueil</span>
						</a></li>
					</ul>
					<hr><br><br>
					<ul class="menuElement">
						<li><a href="categorie.php?cat=c1">
							<svg viewBox="0 0 104 122.88"><g><path d="M61.64,0.59c0.91-0.84,2.33-0.78,3.17,0.13c0.84,0.91,0.78,2.33-0.13,3.17c-3.99,3.69-6.95,8.15-8.7,13.5 c-1.62,4.92-2.24,10.62-1.74,17.18c0.83-0.07,1.66-0.17,2.49-0.31c1.5-0.25,3.01-0.64,4.53-1.16l0,0c0.08-0.03,0.16-0.05,0.24-0.07 c5.03-1.13,9.55-1.44,13.63-1.04c4.16,0.4,7.84,1.54,11.12,3.3C96.87,41,102.02,49.4,103.53,58.79c1.81,11.31-1.8,23.96-7.49,34.85 c-2.68,5.13-7.09,12.07-12.19,17.74c-3.91,4.35-8.28,8-12.71,9.66c-3.57,1.34-7.02,1.71-10.36,1.38c-2.93-0.29-5.76-1.13-8.49-2.33 c-3.59,1.8-7.34,2.87-11.31,2.79c-4.37-0.09-8.92-1.57-13.69-4.99l0-0.01c-0.06-0.04-0.12-0.09-0.17-0.14 c-4.75-4.15-8.64-8.5-11.97-12.91c-3.31-4.38-6.08-8.84-8.58-13.24C1.47,82.66-0.5,73.02,0.11,64.15 c0.51-7.47,2.85-14.42,6.69-19.98c3.91-5.65,9.37-9.86,16.05-11.75c5.6-1.59,12.02-1.54,19.06,0.67l0,0.01 c1.72,0.52,3.45,0.93,5.16,1.19c0.89,0.14,1.77,0.24,2.66,0.3c-0.29-4.15-0.17-7.99,0.34-11.55c-5.77,3.27-11.11,4.49-16.05,3.89 C21.93,25.45,16.07,15.39,11.33,5.53l6.48-0.68c17-2.6,27.15,3.24,33,14.36c0.26-1.09,0.56-2.16,0.9-3.19 C53.71,9.89,57.09,4.8,61.64,0.59L61.64,0.59z M16.66,81.92c-0.39-1.17,0.24-2.45,1.42-2.84c1.17-0.39,2.45,0.24,2.84,1.42 c1.27,3.79,3.16,7.19,5.52,10.3c2.4,3.14,5.29,5.98,8.51,8.61c0.96,0.78,1.11,2.19,0.33,3.16c-0.78,0.96-2.19,1.11-3.16,0.33 c-3.49-2.85-6.63-5.93-9.25-9.37C20.22,90.05,18.09,86.22,16.66,81.92L16.66,81.92z M52.4,39.16c-0.13,0.01-0.26,0.01-0.38,0 c-1.88,0.01-3.76-0.14-5.64-0.44c-1.94-0.3-3.87-0.75-5.8-1.34l-0.02-0.01l0,0.01c-6.17-1.94-11.72-2-16.51-0.64 c-5.63,1.6-10.24,5.17-13.57,9.98c-3.39,4.89-5.45,11.06-5.9,17.73c-0.55,8.05,1.25,16.8,5.88,24.93 c2.41,4.23,5.07,8.52,8.26,12.75c3.14,4.16,6.79,8.25,11.21,12.13c3.98,2.84,7.66,4.07,11.12,4.14c3.49,0.07,6.84-1.01,10.09-2.77 c0.65-0.36,1.4-0.35,2.03-0.06l0,0c2.62,1.24,5.3,2.11,8.04,2.39c2.69,0.27,5.46-0.03,8.34-1.11c3.67-1.38,7.46-4.59,10.95-8.47 c4.85-5.38,9.02-11.95,11.55-16.8c5.3-10.14,8.68-21.81,7.04-32.07c-1.29-8.06-5.75-15.29-14.96-20.22 c-2.77-1.49-5.9-2.45-9.44-2.79c-3.58-0.35-7.58-0.07-12.07,0.92c-1.71,0.58-3.43,1.01-5.16,1.31 C55.8,38.98,54.11,39.13,52.4,39.16L52.4,39.16z"/></g></svg>
							<span class="verticalMenuText">Fruits et Légumes</span>
						</a></li>
						<li><a href="categorie.php?cat=c2">
							<svg viewBox="0 0 122.88 95.94"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M91.88,1.54c5.26,1.4,10.28,3.83,14.67,6.98c12.89,9.25,16.75,20.66,16.3,36.29 c-0.24,8.37-2.18,16.52-4.96,22.09C96.3,110.09,7.99,102.4,0.53,61.68c-0.53-2.9-0.56-5.91-0.52-9.69 c0.06-4.9,0.14-11.56,3.19-15.52c3.09-4.03,8.54-5.63,15.32-5.85c7.41,0.51,14.26-1.92,20.74-6.81 C55.94,11.23,66.84-5.12,91.88,1.54L91.88,1.54z M94.45,47.89c0,4.12-4.74,7.45-10.59,7.45c-5.85,0-10.59-3.34-10.59-7.45 c0-4.12,4.74-7.45,10.59-7.45C89.7,40.44,94.45,43.78,94.45,47.89L94.45,47.89z M103.34,31.95c3.71,2.99,6.72,6.66,8.51,10.75 c4.92,11.24-1.06,21.35-8.56,29.62c-6.02,5.77-13.83,9.7-23.52,11.73c-8.87,1.85-19.3,2.11-31.36,0.71 c-7.78-0.9-14.4-2.53-19.92-4.87c-6.36-2.7-16.54-9.71-18.92-16.46c-1.85-5.26,0.95-9.72,9.45-9.76 c29.82,0.51,33.32-25.98,57.82-29.49C86.34,22.81,95.94,25.98,103.34,31.95L103.34,31.95z"/></g></svg>
							<span class="verticalMenuText">Viandes</span>
						</a></li>
						<li><a href="categorie.php?cat=c3">
							<svg viewBox="0 0 63.27 122.88"><g><path class="st0" d="M26.65,122.88L3.25,61.19c20.86-0.95,31.06,0.16,54.41,0l-24.46,61.69H26.65L26.65,122.88z M42.79,19.77 c-0.24-2.69-2.66-4.55-4.85-6.23c-1.02-0.78-1.99-1.53-2.8-2.37C33.06,9,32.26,6.66,34.97,3.37c-2.13-0.48-4.23-0.52-6.18-0.17 c-2.12,0.39-4.07,1.24-5.68,2.51c-1.6,1.26-2.88,2.93-3.67,4.96c-0.92,2.35-1.19,5.17-0.57,8.41c0.15,0.8-0.39,1.58-1.22,1.72 L17.6,20.8l0,0c-1.21,0.18-2.31,0.53-3.27,1.01c-1.83,0.93-3.21,2.37-4.04,4.11c-0.84,1.77-1.13,3.87-0.79,6.1 c0.22,1.43,0.71,2.91,1.49,4.38c0.38,0.73,0.09,1.62-0.65,2c-0.11,0.06-0.22,0.1-0.34,0.12c-2.25,0.62-4.01,1.69-5.2,3.06 c-0.82,0.94-1.37,2.03-1.62,3.19c-0.25,1.19-0.21,2.47,0.17,3.79c0.61,2.15,2.08,4.4,4.52,6.54h47.04c2.1-1.11,3.52-2.64,4.36-4.37 c0.92-1.89,1.15-4.02,0.82-6.09c-0.34-2.1-1.27-4.12-2.66-5.76c-1.48-1.74-3.48-3.04-5.87-3.51c-0.03,0-0.05-0.01-0.08-0.02 c-1.97,0.57-4.19,1.53-6.53,2.55c-6.89,2.99-14.76,6.4-22.19,2.7c-0.75-0.37-1.04-1.27-0.66-2c0.38-0.73,1.29-1.02,2.04-0.65 c6.15,3.07,13.31-0.04,19.59-2.77c2.42-1.05,4.72-2.05,6.88-2.67c0.56-3.01,0.22-5.28-0.81-6.97c-1-1.63-2.72-2.79-4.96-3.6 c-2.45,2.11-5.12,3.6-7.76,4.33c-2.77,0.76-5.52,0.67-7.99-0.4c-0.76-0.33-1.11-1.21-0.77-1.96c0.34-0.75,1.24-1.08,2-0.75 c1.79,0.78,3.84,0.83,5.95,0.25C38.46,22.83,40.69,21.57,42.79,19.77L42.79,19.77z M23.2,14.75c0.65,0,1.18,0.52,1.18,1.16 c0,0.64-0.53,1.16-1.18,1.16c-0.65,0-1.18-0.52-1.18-1.16C22.02,15.26,22.55,14.75,23.2,14.75L23.2,14.75z M30.56,45.62 c0.74,0,1.34,0.59,1.34,1.31c0,0.73-0.6,1.31-1.34,1.31c-0.74,0-1.34-0.59-1.34-1.31C29.22,46.21,29.82,45.62,30.56,45.62 L30.56,45.62z M13.69,43.29c0.74,0,1.34,0.59,1.34,1.31c0,0.73-0.6,1.31-1.34,1.31c-0.74,0-1.34-0.59-1.34-1.31 C12.35,43.88,12.95,43.29,13.69,43.29L13.69,43.29z M51.74,44.55c0.74,0,1.34,0.59,1.34,1.31c0,0.73-0.6,1.31-1.34,1.31 s-1.34-0.59-1.34-1.31C50.4,45.14,51,44.55,51.74,44.55L51.74,44.55z M24.24,49.45c-0.26-0.31-0.22-0.77,0.09-1.03 c0.31-0.26,0.78-0.22,1.05,0.09l1.72,2c0.26,0.31,0.22,0.77-0.09,1.03c-0.31,0.26-0.78,0.22-1.05-0.09L24.24,49.45L24.24,49.45z M7.37,47.12c-0.27-0.31-0.22-0.77,0.09-1.03c0.31-0.26,0.78-0.22,1.05,0.09l1.72,2c0.26,0.31,0.22,0.77-0.09,1.03 c-0.31,0.26-0.78,0.22-1.05-0.09L7.37,47.12L7.37,47.12z M45.42,48.39c-0.26-0.31-0.22-0.77,0.09-1.03 c0.31-0.26,0.78-0.22,1.05,0.09l1.72,2c0.26,0.31,0.22,0.77-0.09,1.03c-0.31,0.26-0.78,0.22-1.05-0.09L45.42,48.39L45.42,48.39z M39.82,11.21c2.61,2,5.48,4.21,5.95,7.92c2.93,1.03,5.23,2.6,6.64,4.9c1.39,2.26,1.88,5.15,1.23,8.83 c2.46,0.79,4.53,2.27,6.12,4.14c1.74,2.05,2.9,4.57,3.33,7.19c0.43,2.64,0.13,5.38-1.07,7.83c-1.14,2.35-3.09,4.41-5.95,5.85 c-0.23,0.14-0.5,0.21-0.79,0.21H7.31v0c-0.35,0-0.69-0.12-0.98-0.35c-3.19-2.64-5.1-5.55-5.9-8.36c-0.51-1.79-0.56-3.55-0.21-5.18 c0.36-1.66,1.13-3.19,2.27-4.5c1.26-1.45,2.97-2.65,5.08-3.46C7.05,34.96,6.7,33.7,6.5,32.47c-0.44-2.8-0.05-5.49,1.05-7.79 c1.11-2.33,2.95-4.25,5.39-5.49c0.84-0.42,1.74-0.77,2.71-1.02c-0.4-3.22-0.02-6.1,0.94-8.56c0.99-2.53,2.59-4.63,4.61-6.21 c2.01-1.57,4.42-2.64,7.04-3.11c3.17-0.58,6.63-0.3,10.03,0.97c0.21,0.08,0.4,0.2,0.56,0.37c0.57,0.6,0.54,1.53-0.07,2.1 c-2.87,2.63-2.64,4.14-1.42,5.42C37.99,9.8,38.88,10.49,39.82,11.21L39.82,11.21z M26.34,108.34l-2.3-6.2l14.65-3.33l-2.85,7.37 L26.34,108.34L26.34,108.34z M21.63,95.63l-2.3-6.2l25.21-5.72l-2.85,7.37L21.63,95.63L21.63,95.63z M16.92,82.93l-2.3-6.2 l35.77-8.12l-2.85,7.37L16.92,82.93L16.92,82.93z"/></g></svg>
							<span class="verticalMenuText">Desserts</span>
						</a></li>
						<li><a href="contact.php">
							<svg viewBox="0 0 122.88 88.86"><title>email</title><path d="M7.05,0H115.83a7.07,7.07,0,0,1,7,7.05V81.81a7,7,0,0,1-1.22,4,2.78,2.78,0,0,1-.66,1,2.62,2.62,0,0,1-.66.46,7,7,0,0,1-4.51,1.65H7.05a7.07,7.07,0,0,1-7-7V7.05A7.07,7.07,0,0,1,7.05,0Zm-.3,78.84L43.53,40.62,6.75,9.54v69.3ZM49.07,45.39,9.77,83.45h103L75.22,45.39l-11,9.21h0a2.7,2.7,0,0,1-3.45,0L49.07,45.39Zm31.6-4.84,35.46,38.6V9.2L80.67,40.55ZM10.21,5.41,62.39,47.7,112.27,5.41Z"/></svg>
							<span class="verticalMenuText">Contact</span>
						</a></li>
					</ul>
				</div>
			</div>
			<div class="box" style="width:20vw;"></div>
			<div class="box mainPart">
				<h1>PLACEHOLDER TITLE</h1><br>
				<form name="contact_form" id="contact_form" method="post" action="php/sendContactForm.php">
					<h1 style="text-align: center; color:#e94560;">Demande de contact</h1><br>
					<table class="tableContactForm">
						<tr>
							<td class="smallSize"><label for="contact_form_date">Date du contact *</label></td>
							<td><input class="smallSize" type="date" id="contact_form_date" name="contact_form_date" required></td>
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
								<input style="margin: 0 7px 0 7px" type="radio" id="contact_form_genderF" name="contact_form_gender" value="femme"><label for="contact_form_genderF">Femme</label>
								<input style="margin: 0 7px 0 7px" type="radio" id="contact_form_genderM" name="contact_form_gender" value="homme"><label for="contact_form_genderM">Homme</label>
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