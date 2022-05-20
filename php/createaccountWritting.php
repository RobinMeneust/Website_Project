<?php
    session_start();

    $_SESSION["ErrorFormFormat"]=0;
    $_SESSION["MailAlreadyUse"]=0;
    $_SESSION["UsernameAlreadyUse"]=0;


    //check if the create account form are with "valid" form
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_REQUEST["username"];
        $lastName=$_REQUEST["lastName"];
        $firstName=$_REQUEST["firstName"];
        $gender=$_REQUEST["gender"];
        $email=$_REQUEST["email"];
        $phoneNB=$_REQUEST["tel"];
        $birth=$_REQUEST["birth"];
        $location=$_REQUEST["adress"];
        $fonction=$_REQUEST["fonction"];
        $password=$_REQUEST["password"];
    }

    //check if the mail ou username isn't arleady use
    $file = "../data/users.json";
    $json = json_decode(file_get_contents($file), true);
    
    foreach($json as $user){
        if($email==$user["email"]){
            $_SESSION["MailAlreadyUse"]=1;
            header("Location: createaccount.php", true);
            exit();
        }
        if($username==$user["login"]){
            $_SESSION["UsernameAlreadyUse"]=1;
            header("Location: createaccount.php", true);
            exit();
        }
   }

    //Write the content of the form in the users.json

    $id = "wip";

    $newUserData = array(
        "login" => $username,
		"password" => $password,
		"last_name" => $lastName,
		"first_name" => $firstName,
		"gender" => $gender,
		"email" => $email,
		"phone_nb" => $phoneNB,
		"birth_date" => $birth,
		"address" => $location,
		"job" => $fonction,
		"id" => $id
    );
    array_push($json,$newUserData);
    $json = json_encode($json, JSON_PRETTY_PRINT);
    file_put_contents('../data/users.json',$json);
    header("Location: createaccount.php", true);
    exit();
?>