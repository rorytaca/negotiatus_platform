<?php
    //WHEN THEY LOG IN BROWSER URL WILL HOLD DIST_KEY
    $dist_key = $_GET['dist_key'];
    $prod_key = $_GET['prod_key'];
    
    //RETURNS PRODUCT VARS IN $product_name, $product_description, $id, $asking_price
    include('control/connect.php');
    include('control/fetch_product_details.php');
    include('control/print_main_tag_menu.php');
    
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
    <script language="JavaScript" type="text/javascript" src="control/edit_product_control.js"></script>
    <link rel="stylesheet" href="view/styles.css?v=1.0">
  
</head>
<body>
    <?php
        include_once('include/header_bar.php');
    ?>
  
    <div id="content_wrapper">
        <div id="inner_content">
            
            
        
            <div class="hidden" id="hidden_dist_key"><?php print $dist_key; ?></div>
            <div id="edit_form">
                <form action="control/edit_product_control.php?dist_key=<?php print $dist_key ?>&prod_key=<?php print $prod_key ?>" method="post" name="add_product" id="add_product_form" enctype="multipart/form-data">
                    <p>Edit Product Name:</p><br />
                    <input class="input_default" name="product_name" type="text" value="<?php print $name ?>" id="product_name" /><br />
                
                    <p>Edit Product Description:</p><br />
                    <textarea class="textarea_default" name="product_description" type="text" id="product_description"><?php print $product_description ?></textarea><br />

                    <p>Edit Asking Prices:</p><br />
                    <input class="input_default" name="asking_price" type="text" value="<?php print $price ?>" id="asking_price" /><br />
              
                    <p>Edit Main Product Image:</p><br />
                    <input class="input_default" name="product_image" type="file" value="" id="product_image" /><br />
                
                    <p>Product Tags:</p><br />
                    <p>Pick a category:</p><br />
                    <select name="main_tag_categories" id="main_tag_categories" class="edit_drop_down"> <?php print_main_tag_categories();    ?> </select><br />
                    <p>Pick a tag:</p><br />
                    <select name="sub_tag_categories" id="sub_tag_categories" class="edit_drop_down"> </select>
                
                
                    <input class="button" type="submit" name="submit_product" value="submit" id="submit_product_button" /><br />
                
                    <!-- THIS WILL DISPLAY ERRORS -->
                    <div id="add_product_status"></div>

                </form>
            
            
            </div>
        </div>
    </div>

</body>
</html>