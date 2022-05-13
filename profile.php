<?php session_start();
$_SESSION["currentUsername"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="profilDiv">
        <h2 style="text-align:center;">Profil</h2>
        <table style="padding:5px; margin-bottom:10px; width:100%;">
            <tr>
                <td>Pseudonyme : </td>
                <td><?php echo ($_SESSION["currentUsername"]);?></td>
                <td style="padding-left:10px;">Modifier</td>
            </tr>
            <tr>
                <td>Mail : </td>
                <td><?php echo ($_SESSION["currentMail"]);?></td>
                <td style="padding-left:10px;">Modifier</td>
            </tr>
            <tr>
                <td>Mot de Passe : </td>
                <td><?php echo ("*****");?></td>
                <td style="padding-left:10px;">Modifier</td>
            </tr>
        </table>
        <a href="./php/logout.php" tite="Logout" style="margin-left:10px; padding:5px;">Se déconnecter</a>
        <a href="./index.php" tite="Index" style="margin-left:10px; padding:5px;">Accueil</a>
    </div>
</body>
</html>
<!-- $_SESSION["currentPassword"] -->