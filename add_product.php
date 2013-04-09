<?php
    //WHEN THEY LOG IN BROWSER URL WILL HOLD DIST_KEY
    $dist_key = $_GET['dist_key']
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
    <!-- <script language="JavaScript" type="text/javascript" src="control/add_product_control.js"></script> -->
    <link rel="stylesheet" href="view/styles.css?v=1.0">
  
</head>
<body>
    <?php
        include_once('include/header_bar.php');
    ?>
  
    <div id="content_wrapper">
        <h1>Negotiatus Platform</h1>
        <h2>Add Product</h2>
        
        <div class="hidden" id="hidden_dist_key"><?php print $dist_key; ?></div>
        <div id="form">
            <form action="control/add_product_control.php?dist_key=<?php print $dist_key; ?>" method="post" name="add_product" id="add_product_form" enctype="multipart/form-data">
                <p>Product Name:</p><br />
                <input class="input_default" name="product_name" type="text" value="" id="product_name" /><br />
                
                <p>Product Description:</p><br />
                <textarea class="textarea_default" name="product_description" type="text" value="" id="product_description"></textarea><br />

                <p>Asking Prices:</p><br />
                <input class="input_default" name="asking_price" type="text" value="" id="asking_price" /><br />
              
                <p>Main Product Image:</p><br />
                <input class="input_default" name="product_image" type="file" value="" id="product_image" /><br />
                
                <input class="button" type="submit" name="submit_product" value="submit" id="submit_product_button" /><br />
                
                <!-- THIS WILL DISPLAY ERRORS -->
                <div id="add_product_status"></div>

            </form>
            
            
        </div>
        
    </div>

</body>
</html>