<?php
    session_start();
    $returnedHTML="";
    if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $product){
            if(isset($product['imgSrc'], $product['description'], $product['price'], $product['stock'], $product['quantity'])){
                $returnedHTML.="<tr><td><img class='catalogueImg' alt=".$product['imgSrc']." src=".$product['imgSrc']." alt='Photo de bananes'</td><td>".$product['description']."</td><td>".$product['price']."</td><td>".$product['stock']."</td><td>".$product['quantity']."</td></tr>";
            }
        }
    }
    echo $returnedHTML;
?>