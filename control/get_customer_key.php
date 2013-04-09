<?php

    $cust_usrname = $_COOKIE['username'];
    $cust_id = $_COOKIE['id'];
    
    include("connect.php");
    $result = $mysqli->query("SELECT * FROM `customer_accounts` WHERE username='$cust_usrname' AND id='$cust_id'");
    $row = $result->fetch_assoc();
    
    $cust_key = $row['customer_key'];

?>