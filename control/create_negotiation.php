<?php

    include('connect.php');
    
    $dist_key = $_GET['dist_key'];
    $prod_key = $_GET['prod_key'];
    $cust_key = $_GET['cust_key'];
    
    $table_name = $cust_key."_".$prod_key."_".$dist_key."_negotiation";
    
    $table =
    "CREATE TABLE `".$table_name."` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `sender` VARCHAR( 64 ) NOT NULL,
        `exchange` VARCHAR( 256 ) NOT NULL,
        `offer` DOUBLE NOT NULL,
        `time` DATETIME NOT NULL
    ) CHARACTER SET utf8 COLLATE utf8_general_ci";
    
    $mysqli->query($table);
    
    //add this new table to dist and cust negotiation history
    $query = "SELECT * FROM `".$dist_key."_products_list` WHERE product_key='$prod_key'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    
    $price = $row['asking_price'];
    
    $update_dist = "INSERT INTO `".$dist_key."_negotiation_history` (negotiating_customer, negotiating_product, asking_price, table_location, status) VALUES('$cust_key','$prod_key','$price','$table_name','active_unread')";
    $mysqli->query($update_dist);
    
    $update_cust = "INSERT INTO `".$cust_key."_negotiation_history` (negotiating_distributor, negotiating_product, asking_price, table_location, status) VALUES('$dist_key','$prod_key','$price','$table_name','active_unread')";
    $mysqli->query($update_cust);
    
    //redirect page to negotiations page
    
    
?>