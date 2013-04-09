<?php

include('connect.php');

$dist_key = $_GET['dist_key'];
$prod_key = $_GET['prod_key'];

//COLLECT VARIABLES FROM POST AND SEND OUT MYSQL QUERY TO DB
$new_name = $_POST['product_name'];
$new_description= $_POST['product_description'];
$new_asking_price= $_POST['asking_price'];
$new_tag = $_POST['sub_tag_categories'];

$sql_update = "UPDATE ".$dist_key."_products_list SET product_name='$new_name', product_description='$new_description', asking_price='$new_asking_price', tag='$new_tag' WHERE product_key='$prod_key'"; 

$mysqli->query($sql_update);

//update general product database tag
$update_gen = "UPDATE `general_products_list` SET product_name='$new_name', asking_price='$new_asking_price', tag='$new_tag' WHERE product_key='$prod_key' AND distributor_key='$dist_key'";
$mysqli->query($update_gen);

//SEE IF INPUT FIELD WAS CHANGED
if ($_FILES['product_image']['name'] != "") {
    //SEE IF OLD IMAGE EXISTS... IF so delete it and replace with new one from input
    
    $image_path = '../distributors/'.$dist_key.'/'.$prod_key.'/';
    
    $item = glob($image_path."/product_image.*");
    foreach($item as $item) {
        unlink($item);
    }
    
    
    
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
                    
                    $sql_update = "UPDATE ".$dist_key."_products_list SET image_name='$rewrite_name'  WHERE product_key='$prod_key'";
                    $sql_update2 = "UPDATE `general_products_list` SET image_name='$rewrite_name'  WHERE product_key='$prod_key' AND distributor_key='$dist_key'";
                    $mysqli->query($sql_update);
                    $mysqli->query($sql_update2);
                    
                    header("Location: http://negotiatus.com/platform/distributor_overview.php?dist_key=".$dist_key);
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
    

} else {
    header("Location: http://negotiatus.com/platform/distributor_overview.php?dist_key=".$dist_key);
}

?>