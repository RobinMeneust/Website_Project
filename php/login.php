<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="../js/login.js"></script>
</head>
<body>
    <div class="loginDiv">
        <form name="login_form" id="login_form" method="post" action="loginVerification.php">
            <fieldset>
                <table style="width:100%">
                    <tr>
                        <td colspan="2" style="padding:10px ; text-align: center;"><h2>Se connecter à Wip.com<h2></td>
                    </tr>
                    <tr>
                        <td style="padding:5px"><br>Mail ou identifiant :</td>
                        <td style="padding:5px;"><br><input placeholder="identifiant" type="text" name="username" id="username" required></td>
                    </tr>
                    <tr>
                        <td style="padding:5px">Mot de passe :</td>
                        <td style="padding:5px"><input type="password" name="password" id="password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:5px; text-align: center;">
                            <input type="submit" value="Se connecter" style="padding:2px">
                            <button onclick="location.href='createaccount.php'" style="margin-left:10px; padding:2px; color:black;">Créer un compte</button>
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
            <p><a href="../index.php">Retourner à l'accueil</a></p>
        </div>
</body>
</html>
