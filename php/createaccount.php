<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/formChecker.js"></script>
</head>
<body>
    <div class="createAccountDiv">
        <form name="login_form" id="login_form" method="post" action="createAccountSave.php">
            <h1>Création de compte</h1><br>
            <table class="tableForm">
                <tr>
                    <td class="smallSize"><label for="lastName">Nom</label></td>
                    <td>
                        <input onfocusout="checkStringFormat(this)" maxlength="100" class="mediumSize" placeholder="Entrez votre nom" type="text" id="lastName" name="lastName" required>
                    </td>
                </tr>
                <tr>
                    <td class="smallSize"><label for="firstName">Prénom</label></td>
                    <td>
                        <input onfocusout="checkStringFormat(this)" maxlength="100" class="mediumSize" placeholder="Entrez votre prénom" type="text" id="firstName" name="firstName" required>
                    </td>
                </tr>
                <tr>
                    <td class="smallSize"><label for="username">Identifiant</label></td>
                    <td>
                        <input onfocusout="checkStringFormat(this)" maxlength="100" class="mediumSize" placeholder="Entrez votre identifiant" type="text" id="username" name="username" required>
                    </td>
                </tr>
                <tr>
                    <td class="smallSize"><label for="email">Email</label></td>
                    <td>
                        <input maxlength="255" class="mediumSize" placeholder="monmail@monsite.org"  type="email" id="email" name="email" required>
                    </td>
                </tr>
                <tr>
                    <td class="smallSize">Genre</td>
                    <td>
                        <input style="margin: 0 7px 0 7px" type="radio" id="genderF" name="gender" value="F" required><label for="genderF">Femme</label>
                        <input style="margin: 0 7px 0 7px" type="radio" id="genderM" name="gender" value="M"><label for="genderM">Homme</label>
                    </td>
                </tr>
                <tr>
                    <td class="smallSize"><label for="birthDate">Date de Naissance</label></td>
                    <td><input class="smallSize" type="date" id="birthDate" name="birthDate" required></td>
                </tr>
                <tr>
                    <td class="smallSize"><label for="job">Fonction</label></td>
                    <td>
                        <select id="job" name="job" required>
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
                    <td><input maxlength="15" onfocusout="checkStringFormat(this, 'tel')" class="smallSize" type="tel" name="tel" id="tel" required></td>
                </tr>
                <tr>
                    <td class="smallSize"><label for="address">Adresse</label></td>
                    <td><input onfocusout="checkStringFormat(this)" class="mediumSize" type="text" name="address" id="address" required></td>
                </tr>
                <tr>
                    <td class="smallSize"><label for="password">Password</label></td>
                    <td><input maxlength="100" onfocusout="checkStringFormat(this, 'passwd')" class="mediumSize" type="password" name="password" id="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="submitButton" type="submit" value="S'inscrire"></td>
                </tr>
            </table>
        </form>
    </div>
        <div class="loginFooter">
            <p>
                <a href="./login.php">Retour</a>
                <a href="../index.php">Retourner à l'accueil</a>
            </p>
        </div>
</body>
</html>