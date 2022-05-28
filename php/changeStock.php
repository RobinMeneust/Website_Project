<?php
	session_start();

	echo($_REQUEST['id']);
	echo($_REQUEST['newStock']);

	$dom=new DOMDocument();
	$dom->load("../data/products.xml");
	
	$root=$dom->documentElement; 

	
	$categories=$root->getElementsByTagName('CATEGORY');
	
	foreach ($categories as $category) {
		$products=$category->getElementsByTagName('PRODUCT');
		foreach($products as $product){
			$id=$product->getElementsByTagName('ID')->item(0)->textContent;
			if($id == $_REQUEST['id']){
				$product->getElementsByTagName('STOCK')->item(0)->textContent = $_REQUEST['newStock'];
			}
		}
	}
	echo $dom->save("../data/products.xml");
	include('./clearSessionCart.php');
?>