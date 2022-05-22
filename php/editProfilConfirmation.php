<?php
	session_start();

	$_SESSION["MailAlreadyUse"]=0;
	$_SESSION["UsernameAlreadyUse"]=0;
	$_SESSION["ErrorPassword"]=0;
	$_SESSION["ErrorNewPassword"]=0;

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$username=$_REQUEST["username"];
		$lastName=$_REQUEST["lastName"];
		$firstName=$_REQUEST["firstName"];
		$gender=$_REQUEST["gender"];
		$email=$_REQUEST["email"];
		$phoneNB=$_REQUEST["tel"];
		$birth=$_REQUEST["birthDate"];
		$address=$_REQUEST["address"];
		$job=$_REQUEST["job"];
		$password=$_REQUEST["password"];
		$newPassword=$_REQUEST["newPassword"];
		$oldPassword=$_REQUEST["oldPassword"];
	}
	if($oldPassword != $_SESSION["currentUser"]["password"]){
		$_SESSION["ErrorPassword"] = 1;
		header("Location: ../editProfil.php", true);
		exit();
	}
	if($password != $newPassword){
		$_SESSION["ErrorNewPassword"] = 1;
		header("Location: ../editProfil.php", true);
		exit();
	}
	$file = "../data/users.json";
	$json = json_decode(file_get_contents($file), true);

	//Check if the mail or the username are not already used.
	foreach($json as $user){
		if(($email==$user["email"]) && ($email != "")){
			if ($email != $_SESSION["currentUser"]["email"]){
				$_SESSION["MailAlreadyUse"]=1;
				header("Location: ../editProfil.php", true);
				exit();
			}
		}
		if(($username==$user["login"]) && ($username != "")){
			if ($username != $_SESSION["currentUser"]["login"]){
				$_SESSION["UsernameAlreadyUse"]=1;
				header("Location: ../editProfil.php", true);
				exit();
			}
		}
   }

   //Search where are writted the actual information of the user with is ID and change his coordonate.
   foreach($json as $user){
		if($_SESSION["currentUser"]["id"] == $user["id"]){
			if($username != ""){
				$user["login"] = $username;
				$_SESSION["currentUser"]["login"] = $username;
			}
			if($lastName != ""){
				$user["last_name"] = $lastName;
				$_SESSION["currentUser"]["last_name"] = $lastName;
			}
			if($firstName != ""){
				$user["first_name"] = $firstName;
				$_SESSION["currentUser"]["first_name"] = $firstName;
			}
			if($gender != ""){
				$user["gender"] = $gender;
				$_SESSION["currentUser"]["gender"] = $gender;
			}
			if($email != ""){
				$user["email"] = $email;
				$_SESSION["currentUser"]["email"] = $email;
			}
			if($phoneNB != ""){
				$user["phone_nb"] = $phoneNB;
				$_SESSION["currentUser"]["phone_nb"] = $phoneNB;
			}
			if($birth != ""){
				$user["birth_date"] = $birth;
				$_SESSION["currentUser"]["birth_date"] = $birth;
			}
			if($address != ""){
				$user["address"] = $address;
				$_SESSION["currentUser"]["address"] = $address;
			}
			if($job != ""){
				$user["job"] = $job;
				$_SESSION["currentUser"]["job"] = $job;
			}
		}
	}

	$json = json_encode($json, JSON_PRETTY_PRINT);
	file_put_contents('../data/users.json',$json);
	header("Location: ../profile.php", true);
	exit();