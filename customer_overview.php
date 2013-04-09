<?php
    //WHEN THEY LOG IN BROWSER URL WILL HOLD DIST_KEY
    $cust_key = $_GET['cust_key'];
    include('control/connect.php');
    
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>::Negotiatus::</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
  
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="control/master_control.js"></script>
    <script language="JavaScript" type="text/javascript" src="control/customer_overview_control.js"></script>
    <link rel="stylesheet" href="view/styles.css?v=1.0">
  
</head>
<body>
    <?php
        include_once('include/header_bar.php');
    ?>
  
    <div id="content_wrapper">
        <div id="inner_content">
        
            <h2>Customer Overview</h2>
            <h3>Featured Sellers:</h3>
            <div class="hidden" id="hidden_cust_key"><?php print $cust_key; ?></div>
            
            <div id="featured_sellers_wrapper">
                
                <div id="left_arrow"></div>
                    <div id="featured_sellers_banner">
                    
                    
                    </div>
                <div id="right_arrow"></div>
                
            </div>
            
            
            <div id="popular_items_wrapper">
                <h3>Popular Items:</h3>
                
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
                <div class="popular_item_box"></div>
            </div>
            
            
            <div id="shop_by_category_wrapper">
                <h3>Shop by Category:</h3>
            </div>
            
            <div id="bottom_customer_overview_nav"></div>
        </div>
            
    
    </div>

</body>
</html>