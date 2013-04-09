<?php
  if(isset($_GET['search'])) {
    $search_set = true;
    $search = $_GET['search'];
    include('control/search_for_prod.php');
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
  <script language="JavaScript" type="text/javascript" src="control/product_search_control.js"></script>
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
        <p>Product Search:</p>
        
        <input class ="input_default" name="search_product" type="text" value="" id="search_product" />
        <input class="button" id="prod_search_button" type="submit" name="submit" value="search" /><br />
      
        <div id="search_results">
          <?php if($search_set == true) {
              search_for_prod($search);
            }
          
          ?> 

        </div>
      
      
    </div>
  </div>
 


</body>
</html>