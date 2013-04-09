<?php


//INCLUDE AT START OF PAGE TO FETCH PROD DETAILS AND HAVE THEM PRESENT IN THE HTML AS PRINTABLE VARIABLES

//FILES HEADER MUST HAVE $dist_key and $prod_key AS VARs IN THE URL
    include("connect.php");
    
    $dist_key = $_GET['dist_key'];
    $prod_key = $_GET['prod_key'];
    
    $mysql_fetch = "SELECT * FROM ".$dist_key."_products_list WHERE product_key='$prod_key'";
    $result = $mysqli->query($mysql_fetch);
    $row = $result->fetch_assoc();
    
    $id = $row['id'];
    $name = $row['product_name'];
    $product_description = $row['product_description'];
    $price =$row['asking_price'];
    
    $image_name = $row['image_name'];
    $link = "http://negotiatus.com/platform/distributors/".$dist_key."/".$prod_key."/".$image_name;
    
    $result2 = $mysqli->query("SELECT * FROM `distributor_accounts` WHERE distributor_key='$dist_key'");
    $row2 = $result2->fetch_assoc();
    $seller = $row2['store_name'];

?>