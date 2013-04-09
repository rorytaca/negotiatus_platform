<?php
    //WHEN THEY LOG IN BROWSER URL WILL HOLD DIST_KEY
    $dist_key = $_GET['dist_key'];
    include('control/connect.php');
    
    
    include('control/print_overview_product_list.php');
    include('control/print_negotiations_overview.php');
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
    
    <script language="JavaScript" type="text/javascript" src="control/distributor_overview_control.js"></script>
    <link rel="stylesheet" href="view/styles.css?v=1.0">
  
</head>
<body>
    <?php
        include_once('include/header_bar.php');
    ?>
  
    <div id="content_wrapper">
        <div id="inner_content">
        
        <div class="hidden" id="hidden_dist_key"><?php print $dist_key; ?></div>
        <div id="store_front_manager">
            
            
            <div id="overview_product_list">
                <a href="add_product.php?dist_key=<?php print $dist_key ?>" class="add_product">Add Product</a><br />
                <div id="overview_products">
                    <?php print_overview_product_list($dist_key, 0);  ?>
                </div>
                
                
            </div>
            
            <div id="negotiation_updates_wrapper">
                <span class="section_title">Negotiations Status:</span>
                <?php print_negotiations_overview($dist_key, 0); ?>
            </div>
            
            
        </div>
        </div>
    </div>

</body>
</html>