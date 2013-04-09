<?php
    include_once('connect.php');
    if(!$_POST['cust_username'] || !$_POST['cust_password']) {
        echo'FAIL1';
    }
    
    else {
            //FILTER INPUT DATA
            $cust_username = $mysqli->real_escape_string($_POST['cust_username']);
            $cust_password = $mysqli->real_escape_string($_POST['cust_password']);
            $remember_me = (int)$_POST['rember_me_cust'];
            
            $result = $mysqli->query("SELECT * FROM customer_accounts WHERE username='$cust_username' AND password='".sha1($cust_password)."'");
            
            $row = $result->fetch_assoc();
            
            if($row['username']) {
                //EVERYTHINGS OK, LOGIN
                
                $life = time() +(int)1*7*24*60*60;
                
                
                setcookie('negotiatus_remember', $_POST['remember_me_cust'],$life,'/platform/','negotiatus.com', 0, false);
                setcookie('username', $row['username'],$life,'/platform/','negotiatus.com', 0, false);
                setcookie('id', $row['customer_key'],$life,'/platform/','negotiatus.com', 0, false);
                setcookie('account_type', 'customer',$life,'/platform/','negotiatus.com', 0, false);
                
                $cust_key = $row['customer_key'];
                echo $cust_key;
                
            }
            else echo'FAIL2';
            
            
            
        }
        exit;
?>