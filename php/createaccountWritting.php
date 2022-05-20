<?php
    session_start();

    $_SESSION["errorLogin"]=0;
    $_SESSION["MailAlreadyUse"]=0;
    $_SESSION["UsernameAlreadyUse"]=0;
    $_SESSION["ErrorFormFormat"]=0;


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
    /*
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
   }*/

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

    $jsonData = array($json, $newUserData);
    $test = json_encode($jsonData);
    file_put_contents('../data/users.json',$test);
    echo "gfxgf";
    /*
    //$json[$json.length()] = $newUserData;
    array_push($json,$newUserData);
    $jsonData = json_encode($json);
    echo $json;
    var_dump($json);
    echo $jsonData;
    var_dump($jsonData);
    file_put_contents('../data/users.json', $jsonData);
    */

?>