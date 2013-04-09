<?php

    include("connect.php");
    
    $reg_type = $_GET['type'];
    
   
        
        $username = $mysqli->real_escape_string($_POST['username']);
        
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string(sha1($_POST['password']));
        
        
         if ($reg_type == "distributor") {
            $storefrontname = $mysqli->real_escape_string($_POST['storefrontname']);
            $sqlcreate = $mysqli->query("INSERT INTO distributor_accounts (username, store_name, email, password) VALUES('$username','$storefrontname','$email','$password') ");
        
        
            //GET ID#, USE IT TO ASSIGN DISTRIBUTOR KEY
            $result = $mysqli->query("SELECT * FROM distributor_accounts WHERE username='$username'");
            $row = $result->fetch_assoc();
            $db_id = $row['id'];
            $db_id = (string)$db_id;
        
            $dist_key = "";
            $add_string = "0";
            $number_zeros = 6 - strlen($db_id);
            for ($i = 0; $i < $number_zeros; $i++) {
                $dist_key = $dist_key.$add_string;
            }
            $dist_key = $dist_key.$db_id;
        
            $update_query = "UPDATE distributor_accounts SET distributor_key = '$dist_key' WHERE id='$db_id'";
            $mysqli->query($update_query);
            
            mkdir('../distributors/'.$dist_key, 0777);
        
            //create dist_specific product list
            $sql_table =
            "CREATE TABLE `".$dist_key."_products_list` (
                `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `product_key` VARCHAR( 5 ) NOT NULL,
                `product_name` TEXT( 31 ) NOT NULL,
                `product_description` TEXT( 255 ) NOT NULL,
                `asking_price` DOUBLE NOT NULL,
                `image_name` VARCHAR(64) NOT NULL,
                `sizes` VARCHAR(255) NOT NULL,
                `colors` VARCHAR(255) NOT NULL,
                `tag` VARCHAR(32) NOT NULL
            ) CHARACTER SET utf8 COLLATE utf8_general_ci";
        
        
            //dist negotiation history table
            $sql_table2 =
             "CREATE TABLE `".$dist_key."_negotiation_history` (
                `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `negotiating_distributor` VARCHAR( 64 ) NOT NULL,
                `negotiating_product` TINYTEXT NOT NULL,
                `asking_price` DOUBLE NOT NULL,
                `sizes` VARCHAR( 255 ) NOT NULL,
                `colors` VARCHAR( 255 ) NOT NULL,
                `sale_price` DOUBLE NOT NULL,
                `quantity` INT NOT NULL
            ) CHARACTER SET utf8 COLLATE utf8_general_ci";
            $mysqli->query($sql_table2);
            
            if ($mysqli->query($sql_table) === TRUE && $sqlcreate) {
                echo'OK';
            } else {
                echo'NOT OK';
            }
            
    } else {
        //ITS A CUSTOMER ACCOUNT
        $sqlcreate = $mysqli->query("INSERT INTO customer_accounts (username, email, password) VALUES('$username','$email','$password') ");

        //GET ID#, USE IT TO ASSIGN DISTRIBUTOR KEY
        $result = $mysqli->query("SELECT * FROM customer_accounts WHERE username='$username'");
        $row = $result->fetch_assoc();
        $db_id = $row['id'];
        $db_id = (string)$db_id;
        
        $cust_key = "";
        $add_string = "0";
        $number_zeros = 7 - strlen($db_id);
        
        for ($i = 0; $i < $number_zeros; $i++) {
            $cust_key = $cust_key.$add_string;
        }
        $cust_key = $cust_key.$db_id;
        
        $update_query = "UPDATE customer_accounts SET customer_key = '$cust_key' WHERE id='$db_id'";
        $mysqli->query($update_query);
    
        //create dist_specific product list
        $sql_table =
        "CREATE TABLE `".$cust_key."_negotiation_history` (
            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `negotiating_distributor` VARCHAR( 64 ) NOT NULL,
            `negotiating_product` TINYTEXT NOT NULL,
            `asking_price` DOUBLE NOT NULL,
            `sale_price` DOUBLE NOT NULL,
            `sizes` VARCHAR( 255 ) NOT NULL,
            `colors` VARCHAR( 255 ) NOT NULL,
            `quantity` INT NOT NULL
        ) CHARACTER SET utf8 COLLATE utf8_general_ci";
        
        if ($mysqli->query($sql_table) === TRUE && $sqlcreate) {
            echo'OK';
        } else {
            echo'NOT OK';
        }
    
        
    }


?>