<table class="footerContent" style="padding-top:30px">
	<tr>
		<th>Catégories</th>
		<th>Gestion du compte</th>
		<th>Autres pages</th>
	</tr>
	<tr>
		<td>
			<ul>
				<?php
					$dataFile = fopen("data/categories.csv", "r") or die("ERROR the file data/categories.csv could not be opened");
					fgetcsv($dataFile, 100, ","); // Used to ignore the 1st line of the csv file
					while(($data = fgetcsv($dataFile, 100, ",")) !=FALSE){
						if(isset($data[1])) // We get the 2nd element (the name of the category)
							echo "<li><a href=\"categories.php?catID=$data[0]&catName=$data[1]\">$data[1]</a></li>";
					}
					fclose($dataFile);
				?>
			</ul>
		</td>
		<td>
			<ul>
				<li><a href=createAccount.php>Inscription</a></li>
				<li><a href=login.php>Connexion</a></li>
				<li><a href=profile.php>Profil</a></li>
				<li><a href=php/logout.php>Déconnexion</a></li>
			</ul>
		</td>
		<td>
			<ul>
				<li><a href=index.php>Accueil</a></li>
				<li><a href=about.php>À propos</a></li>
				<li><a href=contact.php>Nous contacter</a></li>
			</ul>
		</td>
	</tr>
</table>
<table class="footerContent" style="border:none">
	<tr>
		<th>Concepteurs</th>
		<th>Mention légale</th>
		<th>Contact</th>
	</tr>
	<tr>
		<td>
			<ul>
				<li>Romain BARRÉ</li>
				<li>Alexis DUVERGER</li>
				<li>Robin MENEUST</li>
				<li>Ethan PINTO</li>
			</ul>
		</td>
		<td><ul><li>© Mini U</li></ul></td>
		<td>
			<address><ul><li>websiteprojet2022@gmail.com</li></ul></address>
		</td>
	</tr>
</table>