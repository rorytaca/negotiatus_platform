<?php
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        header("Location: http://negotiatus.com/platform/control/search_for_product.php?search=".$search."&onload=yes");
        
        
        
        
        
        
    }

?>