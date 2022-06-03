<?php
    $newCSVContent=file_get_contents('php://input');

    $dataFile = fopen("../data/categories.csv", "w");
    fprintf($dataFile, $newCSVContent);
    fclose($dataFile);
    echo "success";
?>