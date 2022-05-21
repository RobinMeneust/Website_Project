<?php
    session_start();
  
    $_SESSION["errorLogin"]=0;
    $_SESSION["currentUsername"]="";

    $file = "../data/users.json";
    $json = json_decode(file_get_contents($file), true);

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_REQUEST["username"];
        $password=$_REQUEST["password"];
    }
    foreach($json as $user){
        if(($username==$user["login"] /*|| $username==$user["email"] [WIP]*/ ) && $password==$user["password"]){
            $_SESSION["currentUser"]=$user;
                header("Location: ../index.php", true);
                exit();
        }
   }
?>