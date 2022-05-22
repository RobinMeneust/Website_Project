<?php
	session_start();

	$_SESSION["mailAlreadyUsed"]=0;
	$_SESSION["usernameAlreadyUsed"]=0;
	$_SESSION["errorPassword"]=0;
	$_SESSION["errorNewPassword"]=0;

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
		$_SESSION["errorPassword"] = 1;
		header("Location: ../editProfile.php", true);
		exit();
	}
	if($password != $newPassword){
		$_SESSION["errorNewPassword"] = 1;
		header("Location: ../editProfile.php", true);
		exit();
	}
	$file = "../data/users.json";
	$json = json_decode(file_get_contents($file), true);

	//Check if the mail or the username are not already used.
	foreach($json as $user){
		if(($email==$user["email"]) && ($email != "")){
			if ($email != $_SESSION["currentUser"]["email"]){
				$_SESSION["mailAlreadyUsed"]=1;
				header("Location: ../editProfile.php", true);
				exit();
			}
		}
		if(($username==$user["login"]) && ($username != "")){
			if ($username != $_SESSION["currentUser"]["login"]){
				$_SESSION["usernameAlreadyUsed"]=1;
				header("Location: ../editProfile.php", true);
				exit();
			}
		}
   }

   //Search where are written the actual information of the user with is ID and change his coordinates.
   $i=0;
   foreach($json as $user){
		if($_SESSION["currentUser"]["id"] == $user["id"]){
			if($username != ""){
				$json[$i]["login"] = $username;
				$_SESSION["currentUser"]["login"] = $username;
			}
			if($lastName != ""){
				$json[$i]["last_name"] = $lastName;
				$_SESSION["currentUser"]["last_name"] = $lastName;
			}
			if($firstName != ""){
				$json[$i]["first_name"] = $firstName;
				$_SESSION["currentUser"]["first_name"] = $firstName;
			}
			if($gender != ""){
				$json[$i]["gender"] = $gender;
				$_SESSION["currentUser"]["gender"] = $gender;
			}
			if($email != ""){
				$json[$i]["email"] = $email;
				$_SESSION["currentUser"]["email"] = $email;
			}
			if($phoneNB != ""){
				$json[$i]["phone_nb"] = $phoneNB;
				$_SESSION["currentUser"]["phone_nb"] = $phoneNB;
			}
			if($birth != ""){
				$json[$i]["birth_date"] = $birth;
				$_SESSION["currentUser"]["birth_date"] = $birth;
			}
			if($address != ""){
				$json[$i]["address"] = $address;
				$_SESSION["currentUser"]["address"] = $address;
			}
			if($job != ""){
				$json[$i]["job"] = $job;
				$_SESSION["currentUser"]["job"] = $job;
			}
			break; // User's ID is unique so if we found it we don't have to search for other ones
		}
		$i++;
	}

	$json = json_encode($json, JSON_PRETTY_PRINT);
	file_put_contents('../data/users.json',$json);
	header("Location: ../profile.php", true);
	exit();