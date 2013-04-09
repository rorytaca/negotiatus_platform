<?php
    $name = "negotiatus_remember";
    $value = $_COOKIE[$name];
    setcookie($name, $value, time()- (3600*24), '/platform/', 'negotiatus.com', 0, false);
    
    $name = "username";
    $value = $_COOKIE[$name];
    setcookie($name, $value, time()- (3600*24), '/platform/', 'negotiatus.com', 0, false);
    
    $name = "id";
    $value = $_COOKIE[$name];
    setcookie($name, $value, time()- (3600*24), '/platform/', 'negotiatus.com', 0, false);
    
    $name = "account_type";
    $value = $_COOKIE[$name];
    setcookie($name, $value, time()- (3600*24), '/platform/', 'negotiatus.com', 0, false); 
    
?>