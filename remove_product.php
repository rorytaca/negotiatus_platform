<?php

    $dist_key = $_GET['dist_key'];
    $prod_key = $_GET['prod_key'];
    

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
    <!-- <script language="JavaScript" type="text/javascript" src="control/edit_product_control.js"></script> -->
    <link rel="stylesheet" href="view/styles.css?v=1.0">
  
</head>
<body>
    <?php
        include_once('include/header_bar.php');
    ?>
  
    <div id="content_wrapper">
        <h1>Negotiatus Platform</h1>
        <h2>Remove Product</h2>
        
        <div class="hidden" id="hidden_dist_key"><?php print $dist_key; ?></div>

        
        
    </div>

</body>
</html>