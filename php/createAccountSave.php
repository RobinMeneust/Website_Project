<?php
	session_start();

	$_SESSION["ErrorFormFormat"]=0;
	$_SESSION["MailAlreadyUse"]=0;
	$_SESSION["usernameAlreadyUsed"]=0;

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
	}

	//check if the mail or username isn't already used
	$file = "../data/users.json";
	$json = json_decode(file_get_contents($file), true);
	
	foreach($json as $user){
		if($email==$user["email"]){
			$_SESSION["mailAlreadyUsed"]=1;
			header("Location: ../createAccount.php", true);
			exit();
		}
		if($username==$user["login"]){
			$_SESSION["usernameAlreadyUsed"]=1;
			header("Location: ../createAccount.php", true);
			exit();
		}
	}

	// generate the id for the new account
	$prev = 0;
	$nbUser = count($user);
	$i = 0;
	foreach($json as $user){
		$idRead = (int) filter_var($user["id"], FILTER_SANITIZE_NUMBER_INT);
		if($idRead != 0){	//don't check the case id=0 because it's the admin.
			if($idRead != ($prev+1)){	// If we have found an unused 
				$id = "u".($prev+1);	// id between 2 used, we can use it for the new user
				break;
			}
			if(++$i === $nbUser){
				$id = "u".($idRead+1);	// if all id are already used, 
				break;					// so we add an id +1 bigger than the biggest one. 
			}
			$prev = $idRead;
		}
	}

	//Write the content of the form in the users.json
	$newUserData = array(
		"login" => $username,
		"password" => $password,
		"last_name" => $lastName,
		"first_name" => $firstName,
		"gender" => $gender,
		"email" => $email,
		"phone_nb" => $phoneNB,
		"birth_date" => $birth,
		"address" => $address,
		"job" => $job,
		"id" => $id
	);
	array_push($json,$newUserData);
	//We have to shorten the new array
	function comparator($object1, $object2){
		$id1 = (int) filter_var($object1["id"], FILTER_SANITIZE_NUMBER_INT);
		$id2 = (int) filter_var($object2["id"], FILTER_SANITIZE_NUMBER_INT);
		return $id1 > $id2;
	}
	usort($json, 'comparator');

	$json = json_encode($json, JSON_PRETTY_PRINT);
	file_put_contents('../data/users.json',$json);

	//Login the user with is new account.
	$_SESSION["currentUser"]=$newUserData;
	header("Location: ../index.php", true);
	exit();
?>