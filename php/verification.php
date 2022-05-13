<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
    $_SESSION["errorlogin"]=0;
    $_SESSION["Islogin"]=0;
    $_SESSION["currentUsername"]="";
    $loginsArray = array(
        // [mail, password, username]
        array("ethanpinto@orange.fr", "1234", "Hanabi"),
        array("ethan", "0201", "Also_Hanabi"),
        array("robin", "1302", "It's Robin")
    );

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_REQUEST["mail"];
        $password=$_REQUEST["password"];
        
        foreach($loginsArray as $login){
            if($username==$login[0] && $password==$login[1]){
                $_SESSION["currentMail"]=$login[0];
                $_SESSION["currentPassword"]=$login[1];
                $_SESSION["currentUsername"]=$login[2];
                header("Location: ../index.php", true);
                exit();
            }
        }
        $_SESSION["errorlogin"]=1;
        header("Location: ./login.php", true);
        exit();
    }
?>
</body>
</html>