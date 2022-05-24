<?php
    $newXMLContent=file_get_contents('php://input');;
    echo $newXMLContent;

    $dataFile = fopen("../data/products.xml", "w");
    fprintf($dataFile, $newXMLContent);
    fclose($dataFile);
    echo "success";
?>