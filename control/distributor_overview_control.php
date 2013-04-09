<?php

    include('print_overview_product_list.php');
    
    $dist_key = $_GET['dist_key'];
    
    if (!isset($_GET['page'])) {
        //if not set and this function is called (only called from ajax process of next button) go to results 16-32, so set page to 1
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    
    print_overview_product_list($dist_key, $page);

?>