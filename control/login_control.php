<?php

//START SESSION
session_name('negotiatus_login');

//SET COOKIE FOR 1 WEEK LIFE
session_set_cookie_params(1*7*24*60*60);

if($_SESSION['id'] && !isset($_COOKIE['negotiatus_remember']) && !$_SESSION['remember_me']) {
    //If you are logged in but do not have 'negotiatus_remember' (browser restart)
    //and have not checked remember me box;
    
    $_SESSION = array();
    session_destroy();
    
    
}

if(isset($_GET['logoff'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit;
    
}

if($_POST['submit'] == "dist_Login") {
    //CHECK IF FORMS BEEN SUBMITTED
    $err = array();
    
    if(!$_POST['dist_username'] || $_POST['dist_password'])
        $err[] = 'All fields must be filled in!';
        if(!count($err))
        {
            //FILTER INPUT DATA
            $dist_username = $mysqli->real_escape_string($_POST['dist_username']);
            $dist_password = $mysqli->real_escape_string($_POST['dist_password']);
            $remember_me = (int)$_POST['rember_me'];
            
            $result = $mysqli->query("SELECT * FROM distributor_accounts WHERE username='$dist_username' AND password='".sha1($dist_password)."'");
            
            $row = $result->fetch_assoc();
            
            if($row['username']) {
                //EVERYTHIGS OK, LOGIN
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['remember_me'] = $row['remember_me'];
                $_SESSION['account_type'] = 'distributor';
                
                setcookie('negotiatus_remember', $_POST['remember_me']);
            }  else $err[]='Invalid username and/or password!';
            
        }
        
        if($err)
            $_SESSION['msg_two']['login-err'] = implode('<br />', $err);
            
        //header("Location: index.php");
        exit;
}


?>