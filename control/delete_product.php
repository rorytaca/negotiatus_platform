<?php

    $dist_key = $_GET['dist_key'];
    $prod_key = $_GET['prod_key'];
    
    include('connect.php');
    //delete from product database and distributor one
    $sql_query1 = "DELETE FROM general_products_list WHERE product_key='$prod_key' AND distributor_key='$dist_key'";
    $result1 = $mysqli->query($sql_query1); 
    
    $sql_query2 = "DELETE FROM ".$dist_key."_products_list WHERE product_key='$prod_key'";
    $result2 = $mysqli->query($sql_query2); 

    //remove dir
    $mydir = "../distributors/".$dist_key."/".$prod_key."/"; 
    
    $d = dir($mydir); 
    while($entry = $d->read()) { 
    if ($entry!= "." && $entry!= "..") { 
        unlink($entry); 
        } 
    } 
    $d->close(); 
    rmdir($mydir);

    if($result1 && $result2) {
        echo'PASS';
        
    }
?>