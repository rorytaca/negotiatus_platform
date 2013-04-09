<?php
    function get_negotiations_icon_status($account_key) {
        
        include('connect.php');
        $results = $mysqli->query("SELECT * FROM `".$account_key."_negotiation_history` WHERE status='active_unread'");
        
        $unread = 0;
        while($row = $results->fetch_assoc()) {
            if ($row['id']) {
                $unread++;
            }
            
        }
        
        print $unread;
        
    }

?>