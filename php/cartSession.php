<?php
# start of session
session_start();

	# get the variable from the request
    $id=$_REQUEST['id'];
    $PorM=$_REQUEST['PorM'];

	# check if we add or remove (+ or -) a quantity depending on the button clicked and we update the quantity inside the session variable
	if ($PorM == "-") {
		if(isset($id) && isset($PorM)){
			$_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity']-1;
		}
	}else{
		if(isset($id) && isset($PorM)){
			$_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity']+1;
		}
	}

?>