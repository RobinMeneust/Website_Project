<?php
	$newXMLContent=file_get_contents('php://input');

	$dataFile = fopen("../data/products.xml", "w");
	fprintf($dataFile, $newXMLContent);
	fclose($dataFile);
	echo "success";
?>