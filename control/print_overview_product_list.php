<?php

    function print_overview_product_list($dist_key, $page) {
        //GET ALL products FROM DIST_PRODUCTS_LIST db
        include('connect.php');
        
        $start = $page * 16;
        $result = $mysqli->query("SELECT * FROM ".$dist_key."_products_list LIMIT ".$start.", 16");

        if($result) {
            $counter = 1;
            while (($row = $result->fetch_assoc()) && $counter < 17) {
            //print the div of the image    
                print'
                <div class="product_thumbnail_wrapper">
                    <div class="product_thumbnail_box" id="product_thumbnail_'.$counter.'">
            
                    </div>
                
                    <span class="product_thumbnail_name">'.$row['product_name'].'</span>
                    <span class="product_thumbnail_price">'.$row['asking_price'].'</span>
                    <div class="hidden_prod_key">'.$row['product_key'].'</div>
                    
                    <a href="edit_product.php?dist_key='.$dist_key.'&prod_key='.$row['product_key'].'" class="edit">edit</a>
                    <a href="#" class="delete">delete</a>
                ';
                

                print'<div class="hidden" id="page_number">'.$page.'</div>';
                    
                print'
                    <div class="hidden_image_name">'.$row['image_name'].'</div>
                    
                </div>
                ';
                
                
                
                $counter++;
                if ($counter > 16) {
                    print '<a href="#" id="next_product_page_button">Next Page</a>';
                }


            }
            if ($page > 0) {
                print '<a href="#" id="prev_product_page_button">Previous Page</a>';
            }

        }

        
    }

?>