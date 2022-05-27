<?php
    $newCSVContent=file_get_contents('php://input');
    echo $newCSVContent;

    $dataFile = fopen("../data/categories.csv", "w");
    fprintf($dataFile, $newCSVContent);
    fclose($dataFile);
    echo "success";
?>