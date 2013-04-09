<?php

    function search_for_prod($search_query) {
    

    
    include("connect.php");

    $onload = $_GET['onload'];

    //COMPARE SEARCH_QUERY TO 3 TYPES OF DATA: PRODUCT TAG SUB-CATEGORIES, PRODUCT NAMES, AND DISTRIBUTOR NAMES
    
    
    //1. SUBCATEGORIES
    //LOAD ALL OF THEM INTO AN ARRAY, COMPARE, AND STORE RESULT IN ANOTHER INDEX ARRAY
    $sub_categories = array();
    $m = 0;
    
    //get categories array
    $sql_result = $mysqli->query("SELECT * FROM `all_sub_categories`");
    while ($row = $sql_result->fetch_assoc()) {
        $sub_categories[$m] = $row['category'];
        $m++;
    }
    
    $category_comparisons = array();
    $n = 0;
    foreach($sub_categories as $cat) {
        $lev = levenshtein(strtolower($search_query), strtolower($cat));
        
        if ($lev == 0) {
            //break out and begin printing 
            $sql_result = $mysqli->query("SELECT * FROM `general_products_list` WHERE tag='$cat'");
            
            while ($row = $sql_result->fetch_assoc()) {
                print'
                    <a href="product.php?dist_key='.$row['distributor_key'].'&prod_key='.$row['product_key'].'">
                        <div class="product_thumbnail_wrapper">
                            
                            <div class="product_thumbnail_box"></div>
                            <span class="product_thumbnail_name">'.$row['product_name'].'</span>
                            <span class="product_thumbnail_price">$'.$row['asking_price'].'</span>
                            
                            <div class="hidden hidden_prod_key">'.$row['product_key'].'</div>
                            <div class="hidden hidden_dist_key">'.$row['distributor_key'].'</div>
                            <div class="hidden hidden_image_name">'.$row['image_name'].'</div>
                            
                            <div class="negotiate_button"><span>negotiate</span></div>
                        </div>
                    </a>
                ';
                
            }
            exit;
            
        }
        
        
        $array_row = array();
        
        $category_comparisons[$n] = $lev;
        
        $n++;
        
    }
    
    $lowest_cat = 10000;
    
    //go through category comparisons, find max
    for($i = 0; $i < $n;$i++) {
        if ($category_comparisons[i] < $lowest_cat) {
            $lowest_cat = $category_comparisons[$i];
        }
    }
    
    $lowest_category_indexes = array_keys($category_comparisons, $lowest_cat);
    
    //IF LOWEST IS < 3, break
    
    
    
    //2. DISTRIBUTOR NAMES
    $distributors = array();
    $o = 0;
    
    $sql_result2 = $mysqli->query("SELECT * FROM `distributor_accounts`");
    while ($row = $sql_result2->fetch_assoc()) {
        $distributors[$o] = $row['store_name'];
        $o++;
    }
    
    $distributor_comparisons = array();
    $p = 0;
    foreach($distributors as $distributor) {
        $lev = levenshtein(strtolower($search_query), strtolower($distributor));
        
        if ($lev == 0) {

            $sql = $mysqli->query("SELECT * FROM `distributor_accounts` WHERE store_name='$distributor'");
            $row = $sql->fetch_assoc();
            
            $dist_key = $row['distributor_key'];
            print $dist_key;
            
            //break out and begin printing 
            $sql_result = $mysqli->query("SELECT * FROM `general_products_list` WHERE distributor_key='$dist_key'");
            
            while ($row = $sql_result->fetch_assoc()) {
                print'
                    <a href="product.php?dist_key='.$row['distributor_key'].'&prod_key='.$row['product_key'].'">
                         <div class="product_thumbnail_wrapper">
                            
                            <div class="product_thumbnail_box"></div>
                            <span class="product_thumbnail_name">'.$row['product_name'].'</span>
                            <span class="product_thumbnail_price">$'.$row['asking_price'].'</span>
                            
                            <div class="hidden hidden_prod_key">'.$row['product_key'].'</div>
                            <div class="hidden hidden_dist_key">'.$row['distributor_key'].'</div>
                            <div class="hidden hidden_image_name">'.$row['image_name'].'</div>
                            
                            <div class="negotiate_button"><span>negotiate</span></div>
                        </div>
                    </a>
                ';
                
            }
            exit;
            
        }
        
        $distributor_comparisons[$p] = $lev;
        
        $p++;
        
    }
    
    $lowest_dist = 10000;
    //go through category comparissons, find max
    for($i = 0; $i < $p;$i++) {
        if ($distributor_comparisons[i] < $lowest_dist) {
            $lowest_dist = $distributor_comparisons[$i];
        }
    }
    
     $lowest_distributor_indexes = array_keys($distributor_comparisons, $lowest_dist);
    
    //3. PRODUCT NAMES
    $products = array();
    $q = 0;
    
    $sql_result3 = $mysqli->query("SELECT * FROM `general_products_list`");
    while ($row = $sql_result3->fetch_assoc()) {
        $products[$q] = $row['product_name'];
        $q++;
    }
    
    $product_comparisons = array();
    $r = 0;
    foreach($products as $product) {
        $lev = levenshtein(strtolower($search_query), strtolower($product));
        
        if ($lev == 0) {
            //break out and begin printing 
            $sql_result = $mysqli->query("SELECT * FROM `general_products_list` WHERE product_name='$product'");
            
            while ($row = $sql_result->fetch_assoc()) {
                print'
                    <a href="product.php?dist_key='.$row['distributor_key'].'&prod_key='.$row['product_key'].'">
                        <div class="product_thumbnail_wrapper">
                            
                            <div class="product_thumbnail_box"></div>
                            <span class="product_thumbnail_name">'.$row['product_name'].'</span>
                            <span class="product_thumbnail_price">$'.$row['asking_price'].'</span>
                            
                            <div class="hidden hidden_prod_key">'.$row['product_key'].'</div>
                            <div class="hidden hidden_dist_key">'.$row['distributor_key'].'</div>
                            <div class="hidden hidden_image_name">'.$row['image_name'].'</div>
                            
                            <div class="negotiate_button"><span>negotiate</span></div>
                        </div>
                    </a>
                ';
                
            }
            exit;
            
        }

        $product_comparisons[$r] = $lev;
        
        $r++;
        
    }    
    
    $lowest_prod = 10000;
    //go through category comparissons, find max
    for($i = 0; $i < $r;$i++) {
        if ($product_comparisons[i] < $lowest_prod) {
            $lowest_prod = $product_comparisons[$i];
        }
    }
    
     $lowest_product_indexes = array_keys($product_comparisons, $lowest_prod);
     if ($lowest_cat == 1) {
        print 'Did you mean:';
        foreach ($lowest_category_indexes as $lci) {
            $cat = $sub_categories[$lci];
            echo'<a class="recommend" href="#">'.$cat.'</a><span class="hidden">'.rawurlencode($cat).'</span>';
        }
        print '?';
    } else if ($lowest_dist < 3) {
        print 'Did you mean:';
        foreach ($lowest_distributor_indexes as $lci) {
            $cat = $distributors[$lci];
            $enc_cat = rawurlencode($distributors[$lci]);
            echo'<a class="recommend" href="#">'.$cat.'</a><span class="hidden">'.rawurlencode($cat).'</span>';
        }
        print '?';
    } else if ($lowest_prod < 5) {
        print '<p>Did you mean:</p>';
        foreach ($lowest_product_indexes as $lci) {
            $cat = $products[$lci];

            echo'<a class="recommend" href="#">'.$cat.'</a><span class="hidden">'.rawurlencode($cat).'</span>';
        }
        print '?';
    }
    
    //SORT THROUGH RESULTS
    else if ($lowest_cat < $lowest_prod && $lowest_cat < $lowest_dist) {
        //display closest index from categories
        print 'Did you mean:';
        foreach ($lowest_category_indexes as $lci) {
            $cat = $sub_categories[$lci];
            echo'<a class="recommend" href="#">'.$cat.'</a><span class="hidden">'.rawurlencode($cat).'</span>';
        }
        print '?';
        
    } else if ($lowest_dist < $lowest_cat && $lowest_dist< $lowest_prod) {
        //display closest index from dist
        print 'Did you mean:';
        foreach ($lowest_distributor_indexes as $lci) {
            $cat = $distributors[$lci];
            echo'<a class="recommend" href="#">'.$cat.'</a><span class="hidden">'.rawurlencode($cat).'</span>';
        }
        print '?';        
    } else {
        print 'Did you mean:';
        foreach ($lowest_product_indexes as $lci) {
            $cat = $products[$lci];

            echo'<a class="recommend" href="#">'.$cat.'</a><span class="hidden">'.rawurlencode($cat).'</span>';
        }
        print '?';
    }
    //PRINT RESULTS

    
    
    }
?>