<?php
  
  include('control/negotiation_room_control.php');
  $user = $_GET['user'];
  if (isset($_GET['loc'])) {
    $loc_numb = $_GET['loc'];
  }
  
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>::Negotiatus::</title>
  
  <meta name="author" content="SitePoint">
  
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/master_control.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/negotiation_control.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/set_div_background.js"></script>
  <link rel="stylesheet" href="view/styles2.css">
    
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
</head>
<body>

  <div id="content_wrapper">
    <div id="header">
      <div id="inner_header">
        <div id="logo"></div>
        <h2>Everything is negotiable</h2>
      </div>
    </div>
    <div id="inner_content">
    
        
        <div id="product_info">
            <div id="data">
                <span class="product_info">Item: <?php print $name ?></span>
                <span class="product_info">Seller: <?php print $seller ?></span>
                <span class="product_info">Size: <?php print $size ?></span>
                <span class="product_info">Color: <?php print $color ?></span>
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
        
        <div id="chat_info">
            <?php print_chat_history($loc); ?>
        </div>
        
        <div class="hidden" id="hidden_user_type"><?php print $user ?></div>
        <div class="hidden" id="hidden_loc_numb"><?php print $loc_numb ?></div>
        
        
        <div id="respond">
          <?php print_exchange_form($loc); ?>
        
        </div>

    </div>
  </div>
 


</body>
</html>