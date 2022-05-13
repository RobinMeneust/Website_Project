<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script src="js/login.js"></script>
</head>
<body>
        <div class="loginHead"></div>
        <div class="loginDiv"><form name="login_form" id="login_form" method="post" action="verification.php">
            <fieldset>
                <table>
                    <tr>
                        <td colspan="2" style="padding:10px ; text-align: center;"><h2>Se connecter à Wip.com<h2></td>
                    </tr>
                    <tr>
                        <td style="padding:5px"><br>Mail:</td>
                        <td style="padding:5px"><br><input placeholder="monmail@monsite.org" type="email" name="mail" id="mail" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Password:</td>
                        <td style="padding:5px"><input type="password" name="password" id="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:5px; text-align: center;"><input type="submit" value="Valider" style="padding:2px"></td>
                    </tr>
                </table>
                <?php 
                    if(empty($_SESSION["currentUsername"])){
                        echo "<p style=\"color:red; margin-top:5px; font-size: medium; text-align: center;\">Nom d'utilisateur ou mot de passe incorrect</p>";
                    }
                ?>
            </fieldset>
        </form></div>
        <div class="loginFooter">
            <nav>
                <ul class="loginFootMenu">
                    <li><a href="index.php">Retourner à l'accueil</a></li>
                </ul>
            </nav>
        </div>
</body>
</html>
