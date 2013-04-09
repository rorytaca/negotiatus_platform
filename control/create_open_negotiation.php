<?php
    //get varibles from post
    include('connect.php');
    $name = $mysqli->real_escape_string($_POST['product_name']);
    $seller = $mysqli->real_escape_string($_POST['seller']);
    $color = $mysqli->real_escape_string($_POST['color']);
    $size = $mysqli->real_escape_string($_POST['size']);
    $price = $mysqli->real_escape_string($_POST['asking_price']);
    $link = $mysqli->real_escape_string($_POST['product_image']);
    
    //connect and create chat history table, add location to master open negotiations chat
    include('connect.php');
    
    $loc_numb = rand(1000000,2000000);
    
    $test = $mysqli->query("SELECT * FROM negotiation_".loc_numb);
    //if test exists try a different random number
    while ($test) {
        $test = NULL;
        $loc_numb = rand(1000000,2000000);
        $test = $mysqli->query("SELECT * FROM negotiation_".loc_numb);
    }
    
    $loc = "negotiation_".$loc_numb;
    
    $insert = "INSERT INTO `open_negotiations_master_history` (product_name, seller, color, size, price, link, chat_location) VALUES('$name','$seller','$color','$size','$price','$link','$loc')";
    $mysqli->query($insert);
    
    $table = 
    "CREATE TABLE `".$loc."` (
        `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `sender` VARCHAR( 64 ) NOT NULL,
        `exchange` VARCHAR( 256 ) NOT NULL,
        `offer` DOUBLE NOT NULL,
        `time` DATETIME NOT NULL
    ) CHARACTER SET utf8 COLLATE utf8_general_ci";
    $mysqli->query($table);

    //set header
    header("Location: http://negotiatus.com/platform/negotiation.php?loc=".$loc_numb."&user=customer");
?>