<?php
    if(isset($_REQUEST["quantity"], $_REQUEST["id"], $_REQUEST["imgSrc"], $_REQUEST["description"], $_REQUEST["price"], $_REQUEST["stock"])){
        $quantity=$_REQUEST["quantity"];
        $productID=$_REQUEST["id"];
        $imgSrc=$_REQUEST["imgSrc"];
        $description=$_REQUEST["description"];
        $price=$_REQUEST["price"];
        $stock=$_REQUEST["stock"];

        if(isset($_SESSION['cart'][$productID])){	
            if($_SESSION['cart'][$productID]!=$quantity){
                //update existing var
                $_SESSION['cart'][$productID]+=$quantity;
            }
        }
        else{
            //new var
            $_SESSION['cart'][$productID]['id']=$productID;
            $_SESSION['cart'][$productID]['quantity']=$quantity;
            $_SESSION['cart'][$productID]['imgSrc']=$imgSrc;
            $_SESSION['cart'][$productID]['description']=$description;
            $_SESSION['cart'][$productID]['price']=$price;
            $_SESSION['cart'][$productID]['stock']=$stock;
        }
        echo "success";
    }
?>