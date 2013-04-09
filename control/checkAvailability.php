<?php
// This is a code to check the username from a mysql database table

    if(isSet($_POST['username'])) {
        
        include("connect.php");
        $username = $mysqli->real_escape_string($_POST['username']);

        $type = $_GET['type'];

        if ($type == "customer") {
            $sql_check = $mysqli->query("SELECT * FROM `customer_accounts` WHERE username='$username'");
        } else {
            $sql_check = $mysqli->query("SELECT * FROM `distributor_accounts` WHERE username='$username'");
        }
        $exists = mysqli_num_rows($sql_check);
        
        if( $exists > 0) {
            echo 'The username '.$username.' is already in use.';
        } else {
            echo 'OK';
        }
    }

?>