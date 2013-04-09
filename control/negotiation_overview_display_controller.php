<?php
    include('negotiation_overview_control.php');
    $user_key = $_GET['user_key'];
    $user_type = $_GET['user_type'];
    $function = $_GET['function'];
    
    if ($function == "1") {
        echo print_negotiations_in_progress($user_key,$user_type);
    } else if ($function == "2") {
        echo print_negotiations_all_history($user_key,$user_type);
    } else if ($function == "3") {
        echo print_negotiations_completed($user_key,$user_type);
    }

?>