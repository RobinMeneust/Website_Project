<?php
	session_start();

	if(!isset($_SESSION["currentUser"])){
		header("Location: ../login.php", true);
	}else{
		header("Location: ../cart.php", true);
	}
?>