<?php
    session_start();

    # remove a specific element the session variable "$_SESSION['cart]"
    $id = $_REQUEST['id'];
    unset($_SESSION['cart'][$id]);
?>