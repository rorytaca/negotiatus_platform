
<?php
    //GET URL VARs
    $dist_key = $_GET['dist_key'];
    
    //CONNECT TO DBs
    include("connect.php");

    //PARSE VARs from POST
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $asking_price = $_POST['asking_price'];
    
    //SUBMIT THESE DETAILS TO DB
    $distributor_db_insert_query = "INSERT INTO ".$dist_key."_products_list (product_name, product_description, asking_price) VALUES('$product_name','$product_description','$asking_price') ";
    $mysqli->query($distributor_db_insert_query);
    
    $result = $mysqli->query("SELECT * FROM ".$dist_key."_products_list WHERE product_name='$product_name'");
    $prod_row = $result->fetch_assoc();
    $prod_id = $prod_row['id'];
    
    $prod_id = (string)$prod_id;
    $prod_key = "";
    $add_string = "0";
    
    $number_zeros = 5 - strlen($prod_id);
    for ($i = 0; $i < $number_zeros; $i++) {
        $prod_key = $prod_key.$add_string;
    }
    $prod_key = $prod_key.$prod_id;
    
    $update_query = "UPDATE ".$dist_key."_products_list SET product_key='$prod_key' WHERE id='$prod_id'"; 
    $mysqli->query($update_query);
    $general_db_insert_query = "INSERT INTO `general_products_list` (distributor_key, product_key, product_name, asking_price) VALUES('$dist_key','$prod_key','$product_name','$asking_price') ";
    $mysqli->query($general_db_insert_query);
    
    //CREATE DIR FOR PRODUCT
    mkdir('../distributors/'.$dist_key.'/'.$prod_key, 0777);
    
    //SAVE PHOTO TO DIR
    $image_path = '../distributors/'.$dist_key.'/'.$prod_key.'/';
    
    $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg");
    
    $name = $_FILES['product_image']['name'];
    $size = $_FILES['product_image']['size'];
    
    if(strlen($name)) {
        list($txt, $ext) = explode(".", $name);
        if (in_array($ext,$valid_formats)) {
            if($size<(1024*1024)) { //MAX IMAGE SIZE 1MB
                $rewrite_name = "product_image.".$ext;
                $tmp = $_FILES['product_image']['tmp_name'];
                
                if (move_uploaded_file($tmp, $image_path.$rewrite_name)) {
                    //pass through ajax call
                    echo $prod_key;
                    $update_query = "UPDATE ".$dist_key."_products_list SET image_name='$rewrite_name' WHERE id='$prod_id'"; 
                    $mysqli->query($update_query);
                    
                    header("Location: http://negotiatus.com/platform/edit_product.php?dist_key=".$dist_key."&prod_key=".$prod_key);
                } else {
                    echo'FAIL4';
                }
                
                
            } else {
                echo'FAIL3';
            }
            
            
        } else {
            echo'FAIL2';
        }
    
    
    
    } else {
        echo'FAIL1';
    }
    
    
    
    
    

?>
