<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/png" href="img/logo.png">
	<script src="js/formChecker.js"></script>
</head>
<body>
    <div class="loginDiv" style="width:700px">
        <form name="login_form" id="login_form" method="post" action="php/loginVerification.php">
            <fieldset>
                <table class="tableForm" style="width:500px">
                    <tr>
                        <td colspan="2" style="padding:10px ; text-align: center;"><h1>Connexion à votre compte<br>Mini U<h1></td>
                    </tr>
                    <tr>
                        <td class="smallSize"><label for="username">Mail ou identifiant</label></td>
                        <td><input maxlength="100" onfocusout="checkStringFormat(this, 'username')"  class="smallSize" type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td class="smallSize"><label for="password">Mot de passe</label></td>
                        <td><input maxlength="100" onfocusout="checkStringFormat(this, 'passwd')"  class="smallSize" type="password" name="password" id="password" required></td>
                    </tr>
                    <tr style="height:100px">
                        <td colspan="2" >
                            <input class="submitButton" type="submit" value="Se connecter" style="margin-right:40px">
                            <button class="submitButton" onclick="location.href='createAccount.php'">Créer un compte</button>
                        </td>
                    </tr>
                </table>    
                <?php
                if(isset($_SESSION["errorLogin"])){
                    if($_SESSION["errorLogin"]==1){
                        echo ('<p style="color:red; margin-top:5px; font-size: medium; text-align: center;">Nom d\'utilisateur ou mot de passe incorrect</p>');
                        $_SESSION["errorLogin"]=0;
                    }
                }
                ?>
            </fieldset>
        </form>
    </div>
    <div class="loginFooter">
        <p><a href="index.php">Retourner à l'accueil</a></p>
    </div>
</body>
</html>
