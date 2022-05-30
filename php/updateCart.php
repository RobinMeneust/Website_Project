<?php
    session_start();
    $returnedHTML='<tr><th>Photo</th><th>Description</th><th>Prix</th><th class="stockColumn">Stock</th><th>Quantité Commandée</th></tr>';
    $cartSize=0;
    $totalPrice=0;
    if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $product){
            if(isset($product['imgSrc'], $product['description'], $product['price'], $product['stock'], $product['quantity'])){
                $returnedHTML.="<tr><td><img class='catalogueImg' style='cursor:default' alt='".$product['imgSrc']."' src='".$product['imgSrc']."' alt='Photo de bananes'></td><td>".$product['description']."</td><td>".$product['price']."</td><td>".$product['stock']."</td><td>".$product['quantity']."</td></tr>";
                $cartSize+=intval($product['quantity'], 10);
                
                $totalPrice+=floatval(substr($product['price'], 0, -1))*$product['quantity']; // we delete the "€" character at the end and we convert the string to a number
            }
        }
    }
    $returnedHTML.="<tr><td></td><td><b>Total</b></td><td>$totalPrice"."€</td><td></th><td>$cartSize</td></tr>";
    echo $returnedHTML;
?>