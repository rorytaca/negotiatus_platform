<?php
    include_once('connect.php');
    if(!$_POST['dist_username'] || !$_POST['dist_password']) {
        echo'FAIL';
    }
    
    else {
            //FILTER INPUT DATA
            $dist_username = $mysqli->real_escape_string($_POST['dist_username']);
            $dist_password = $mysqli->real_escape_string($_POST['dist_password']);
            $remember_me = (int)$_POST['rember_me_dist'];
            
            $result = $mysqli->query("SELECT * FROM distributor_accounts WHERE username='$dist_username' AND password='".sha1($dist_password)."'");
            
            $row = $result->fetch_assoc();
            
            if($row['username']) {
                //EVERYTHIGS OK, LOGIN
                
                $life = time() +(int)1*7*24*60*60;
                
                
                setcookie('negotiatus_remember', $_POST['remember_me_dist'],$life,'/platform/','negotiatus.com', 0, false);
                setcookie('username', $row['username'],$life,'/platform/','negotiatus.com', 0, false);
                setcookie('id', $row['distributor_key'],$life,'/platform/','negotiatus.com', 0, false);
                setcookie('account_type', 'distributor',$life,'/platform/','negotiatus.com', 0, false);
                
                $dist_key = $row['distributor_key'];
                echo $dist_key;
                
            }
            else echo'FAIL2';
            
            
            
        }
        exit;
        
        
?>