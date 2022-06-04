
<?php

session_start();

    $id=$_REQUEST['id'];
    $PorM=$_REQUEST['PorM'];
	var_dump($PorM);


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