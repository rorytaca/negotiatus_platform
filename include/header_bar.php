<?php

include("control/connect.php");

//INITIALIZES COOKIES
if (isset($_GET['cust_key'])) {
    $account_key = $_GET['cust_key'];
    $type = "cust";
} else if (isset($_GET['dist_key'])) {
    $account_key = $_GET['dist_key'];
    $type = "dist";
}





include("control/header_bar_control.php");
print '

<div id="login_bar">
    <div id="login_bar_wrapper">
    <a href="http://negotiatus.com/platform"><div id="logo_small"></div></a>

    <!-- THIS INITIAL DIV IS DISPLAYED, ALL OTHERS ARE HIDDEN -->
    <div id="guest_login_bar_content">
        <span id="welcome">Welcome <span class="accent">guest</span>!</span>
        <a href="#" class="expand_login_bar">login</a>
    </div>
    
    <div id="loging_in_content">

        
        <div class="login_bar_section" id="login_section_bar_2">
            
            <form class="login_form" id="customer_login">
                <span class="little_title">Customer Log In</span>
                <input class ="login_input" name="cust_username" type="text" value="" id="cust_username" />
                <input class ="login_input" name="cust_password" type="text" value="" id="cust_username" /><br />
                <label><input name="remember_me_cust" id="remember_me_cust" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</ label>
                <input class="button" type="submit" name="submit" id="cust_login_button" value="Log in" /><br />
            </form>
            
        </div>
        
       <div class="login_bar_section" id="login_section_bar_2">
            
            <form class="login_form" id="distributor_login">
                <span class="little_title">Distributor Log In</span>
                <input class ="login_input" name="dist_username" type="text" value="" id="dist_username" />
                <input class ="login_input" name="dist_password" type="text" value="" id="dist_password" /><br />
                <input name="remember_me_dist" id="remember_me_dist" type="checkbox" checked="checked" value="1" /><label> &nbsp;Remember me</ label>
                <input class="button" type="submit" name="submit" id="dist_login_button" value="Log in" /><br />
            </form>
            <div class="err" id="msg_two"></div>      
        </div>
    </div>
    
    <div id="logged_in_content">
        <span class="accent_two" id="username_login_bar">'.$_COOKIE['username'].'</span>
        <a href="#" id="logoff_button">log off</a>
        <div id="user_icons">
            <input class ="input_default" name="search_product" type="text" value="" id="search_product_header_bar" />
            <input class="button" type="submit" name="submit" id="search_button_header_bar" value="search" />
            <div id="icon_2" class="icon">
                
                <a href="negotiations_overview.php'; 
                    if ($_COOKIE['account_type'] == "distributor") {
                        print'?dist_key=';
                    } else if ($_COOKIE['account_type'] == "customer") {
                        print'?cust_key=';
                    }
                    $key = $_COOKIE['id'];
                    if ($key) {
                        print $key;
                    }
                    print'">';
            print'
                        
                    <div id="negotiations_icon">';
                    

                    if ($key) {
                        get_negotiations_icon_status($key);
                    }
            
            print'
                    </div>
                </a>
            </div>
            <div id="icon_3" class="icon"></div>
            <div id="icon_4" class="icon"></div>
        </div>
    </div>
    </div>
</div>

';

//SET CONTROL
include_once("control/header_control.php");


?>