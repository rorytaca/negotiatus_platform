<?php
    

    $loc = $_GET['loc'];
    $user = $_GET['user'];
    
    $exchange = $_POST['exchange'];
    
    include('connect.php');

    $table = "negotiation_".$loc;
    
    $query = "INSERT INTO `".$table."` (sender, exchange, time) VALUES('$user','$exchange', now())";
    $update = $mysqli->query($query);

?>