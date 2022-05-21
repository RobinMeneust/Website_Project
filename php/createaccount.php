<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/login.js"></script>
</head>
<body>
    <div class="createaccountDiv">
        <form name="login_form" id="login_form" method="post" action="createaccountWritting.php">
            <fieldset>
                <table style="width:100%">
                    <tr>
                        <td colspan="2" style="padding:10px ; text-align: center;"><h2>créer un compte Wip.com<h2></td>
                    </tr>
                    <tr>
                        <td style="padding:5px"><br>Nom :</td>
                        <td style="padding:5px"><br><input type="text" name="lastName" id="lastName" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Prénom :</td>
                        <td style="padding:5px"><input type="text" name="firstName" id="firstName" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Pseudonyme :</td>
                        <td style="padding:5px"><input type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px"><input style="margin: 0 7px 0 7px" type="radio" id="genderF" name="gender"><label for="contact_form_genderF" required>Femme</label>
                        <td style="padding:5px"><input style="margin: 0 7px 0 7px" type="radio" id="genderM" name="gender"><label for="contact_form_genderM">Homme</label>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td style="padding:5px">Mail :</td>
                        <td style="padding:5px"><input placeholder="monmail@monsite.org" type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Téléphone :</td>
                        <td style="padding:5px"><input type="tel" name="tel" id="tel" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Date de naissance :</td>
                        <td style="padding:5px"><input type="date" name="birth" id="birth" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Adresse :</td>
                        <td style="padding:5px"><input type="text" name="adress" id="adress" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Fonction :</td>
                        <td style="padding:5px"><select id="fonction" name="fonction">
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
                        <td style="padding:5px">Password :</td>
                        <td style="padding:5px"><input type="password" name="password" id="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:5px; text-align: center;">
                            <input type="submit" value="S'inscrire" style="padding:2px">
                        </td>
                    </tr>
                </table>    
                <?php
                if(isset($_SESSION["ErrorFormFormat"])){
                    if($_SESSION["ErrorFormFormat"]==1){
                        echo ('<p style="color:red; margin-top:5px; font-size: medium; text-align: center;">Veuillez ne pas utilisé de caractère spéciaux pour remplir ces champs.</p>');
                        $_SESSION["errorLogin"]=0;
                    }
                }
                if(isset($_SESSION["MailAlreadyUse"])){
                    if($_SESSION["MailAlreadyUse"]==1){
                        echo ('<p style="color:red; margin-top:5px; font-size: medium; text-align: center;">Un compte utilise déjà cette adresse email.</p>');
                        $_SESSION["errorLogin"]=0;
                    }
                }
                if(isset($_SESSION["UsernameAlreadyUse"])){
                    if($_SESSION["UsernameAlreadyUse"]==1){
                        echo ('<p style="color:red; margin-top:5px; font-size: medium; text-align: center;">Un compte utilise déjà ce pseudonyme.</p>');
                        $_SESSION["errorLogin"]=0;
                    }
                }
                ?>
            </fieldset>
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