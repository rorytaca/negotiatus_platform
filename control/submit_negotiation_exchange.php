<?php
    echo'test';

    $loc = $_GET['loc'];
    $user = $_GET['user'];

    
    $exchange = $_POST['exchange'];
    
    //connect and update exchange to 
    include('connect.php');
    $query = "INSERT INTO `negotiation_'.$loc.'` (sender, exchange, time) VALUES('$user','$exchange',now())"
    $update = $mysqli->query($query);


    
?>