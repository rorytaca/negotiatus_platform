<?php


?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>::Negotiatus::</title>
  
  <meta name="author" content="SitePoint">
  
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <link rel="stylesheet" href="view/styles2.css">
    
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
</head>
<body>
    
  <div id="content_wrapper">
    <div id="index_content">

        <div id="header">
            <div id="logo"></div>            
            <h1><strong>E</strong>VERYTHING <strong>I</strong>S <strong>N</strong>EGOTIABLE</h1>
        </div>
        
          <div id="form_wrapper">
            <h2>Create Negotiation:</h2>
            <form action="control/create_open_negotiation.php" method="post" name="c_o_n" id="open_negotiation_form">
                <p>Product Name:</p><br />
                <input class="input_default" name="product_name" type="text" value="" id="product_name" /><br />
                
                <p>Seller:</p><br />
                <input class="input_default" name="seller" type="text" value="" id="seller" /><br />

                <p>Size:</p><br />
                <input class="input_default" name="size" type="text" value="" id="size" /><br />

                <p>Color:</p><br />
                <input class="input_default" name="color" type="text" value="" id="color" /><br />
                
                <p>List Prices:</p><br />
                <input class="input_default" name="asking_price" type="text" value="" id="asking_price" /><br />
              
                <p>Product Image Link:</p><br />
                <input class="input_default" name="product_image" type="text" value="" id="product_image" /><br />
                
                
                <input class="button" type="submit" name="submit_product" value="submit" id="submit_button" /><br />
                
                <!-- THIS WILL DISPLAY ERRORS -->
                <div id="add_product_status"></div>
          
            </form>
          </div>        



    </div>
  </div>
 


</body>
</html>