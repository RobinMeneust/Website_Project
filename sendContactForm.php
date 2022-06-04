<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Envoi du formulaire de contact</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="image/png" href="img/logo.png">
</head>
<body>
	<?php
	// Check if a the birth date is invalid (checks if it's in the future)
		function checkDatesConsistency($birthDate, $date){
			$dateArray = explode('-', $date);
			$birthDateArray = explode('-', $birthDate);

			if($dateArray[0] <= $birthDateArray[0]){ // if the birth date is after the current date or if the user is less than 1 year old
				return false;
			}
			return true;
		}

		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$_SESSION["incorrectContactForm"]=false;
			$to="websiteprojet2022@gmail.com";
			if(isset($_REQUEST["contact_form_subject"], $_REQUEST["contact_form_content"], $_REQUEST["contact_form_email"], $_REQUEST["contact_form_firstName"], $_REQUEST["contact_form_lastName"], $_REQUEST["contact_form_date"])){
				$subject=$_REQUEST["contact_form_subject"];
				$message=$_REQUEST["contact_form_content"];
				$from=$_REQUEST["contact_form_email"];
				$name=$_REQUEST["contact_form_firstName"]." ".$_REQUEST["contact_form_lastName"];
				$date=$_REQUEST["contact_form_date"];
				
				//Check if the needed variables are defined
				if(isset($_REQUEST["contact_form_gender"]))
					$gender=$_REQUEST["contact_form_gender"];
				if(isset($_REQUEST["contact_form_birthDate"]))
					$birthDate=$_REQUEST["contact_form_birthDate"];
				if(isset($_REQUEST["contact_form_job"]))
					$job=$_REQUEST["contact_form_job"];
				if(trim($subject)=="" || trim($message)=="" || trim($from)=="" || trim($name)=="" || $date=="" || !checkDatesConsistency($birthDate, $date)){
					$_SESSION["incorrectContactForm"]=true;
					header("Location: contact.php", true);
					exit();
				}
			}
			else{
				$_SESSION["incorrectContactForm"]=true;
				header("Location: contact.php", true);
				exit();
			}
			$message.="\n$name\nEnvoyé le : $date\n\n_______________\n\nInformations supplémentaires:\n\nGenre : $gender\nDate de naissance : $birthDate\nFonction : $job";
			
			
			echo "<table class=\"mailTable\">";
			echo "<tr><td><b>De</b> : $from </td></tr>";
			echo "<tr><td><b>À</b> : $to </td></tr>";
			echo "<tr><td><b>Objet</b> : $subject</td></tr>";
			echo "<tr><td>".nl2br($message)."</td></tr>"; // nl2br is used to convert all "\n" to "<br>"
			// rawurlencode is used to get an url format of subject and body (e.g && is encoded so that it isn't interpreted as a new param such as &body)
			if(strlen($message)>1800){
				$message = substr($message, 0, 1800); // if the message is too long we have to shorten it
			}
			echo "<tr><td><a href=\"mailto:websiteprojet2022@gmail.com?subject=".rawurlencode($subject)."&body=".rawurlencode($message)."\">Envoyer</a></td></tr>";
			echo "</table>";
		}
	?>
</body>
</html>