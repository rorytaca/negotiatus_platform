<?php

//connect to negotiatus, distributor accounts
$hostname='neg1133908043307.db.8689925.hostedresource.com';
$username='neg1133908043307';
$password='Yeknom@123';
$dbname='neg1133908043307';

//mysqli_connect($hostname,$username,$password) OR DIE ('Unable to connect to database!');
//mysqli_select_db($dbname);

$mysqli = new mysqli($hostname,$username,$password,$dbname) OR DIE ('Unable to connect to database!');
    
?>