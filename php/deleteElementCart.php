<?php
    session_start();

    $id = $_REQUEST['id'];
    unset($_SESSION['cart'][$id]);
?>