<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Envoi du formulaire de contact</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $to="websiteprojet2022@gmail.com";
            $subject=$_REQUEST["contact_form_subject"];
            $message=$_REQUEST["contact_form_content"];
            $from=$_REQUEST["contact_form_email"];
            $name=$_REQUEST["contact_form_firstName"]." ".$_REQUEST["contact_form_lastName"];
            $date=$_REQUEST["contact_form_date"];

            $gender=$_REQUEST["contact_form_gender"];
            $birthDate=$_REQUEST["contact_form_birthDate"];
            $job=$_REQUEST["contact_form_job"];
            if(trim($subject)=="" || trim($message)=="" || trim($from)=="" || trim($name)=="" || $date==""){
                header("Location: ../contact.php", true);
                exit();
            }
            $message = nl2br($message);
            $message.="<br><br>$name<br>Envoyé le : $date<br><br>Informations supplémentaires:<br>Genre : $gender<br>Date de naissance : $birthDate<br>Fonction : $job";
            
            echo "<table class=\"mailTable\">";
            echo "<tr><td><b>De</b> : $from </td></tr>";
            echo "<tr><td><b>À</b> : $to </td></tr>";
            echo "<tr><td><b>Objet</b> : $subject</td></tr>";
            echo "<tr><td>$message</td></tr>";
            echo"<tr><td><a href=\"mailto:websiteprojet2022@gmail.com?subject=$subject&body=[copier le contenu affiché dans la page 'Envoi du formulaire de contact']\">Envoyer</a></td></tr>";
            echo "</table>";
        }
    ?>
</body>
</html>