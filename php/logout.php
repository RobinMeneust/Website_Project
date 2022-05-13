<?php
session_start();
unset($_SESSION["currentMail"]);
unset($_SESSION["currentPassword"]);
unset($_SESSION["currentUsername"]);
header("Location:../index.php");
?>