<?php

  $dist_key =  $_GET['dist_key'];
  $prod_key =  $_GET['prod_key'];

  include('control/connect.php');
  include('control/fetch_product_details.php');
  include('control/get_customer_key.php');
  
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>::Negotiatus::</title>
  
  <meta name="author" content="SitePoint">
  
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/master_control.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/product_control.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/set_div_background.js"></script>
  <link rel="stylesheet" href="view/styles.css">
    
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
</head>
<body>
  
  <?php
    include_once('include/header_bar.php');
  ?>
  
  <div id="content_wrapper">
    <div id="inner_content">
        
        <div id="product_info">
            <div id="data">
                <span class="product_info">Item: <?php print $name ?></span>
                <span class="product_info">Seller: <?php print $seller ?></span>
                <span class="product_info">Sizes: <?php print $size ?></span>
                <span class="product_info">Colors: <?php print $color ?></span>
                <span class="product_info">Listing Price: $<?php print $price ?></span>
                
            </div>
            
            <div id="product_image">
              <?php print 
              '
                <script language="JavaScript" type="text/javascript">
                  set_div_background("product_image","'.$link.'");
                </script>
              ';
              ?>
            </div>
            
        </div>
        
          <a href="#" class="negotiate_button">NEGOTIATE</a>
        
          <span class="hidden" id="hidden_dist_key"><?php print $dist_key; ?></span>
          <span class="hidden" id="hidden_prod_key"><?php print $prod_key; ?></span>
          <span class="hidden" id="hidden_cust_key"><?php print $cust_key; ?></span>
        
        
        
        </div>
    </div>
  </div>
 


</body>
</html>