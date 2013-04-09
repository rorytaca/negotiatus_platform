<?php
    function print_negotiations_in_progress($user_key,$user_type) {
        
        include('connect.php');

        $results = $mysqli->query("SELECT * FROM `".$user_key."_negotiation_history` WHERE status='active_unread' OR status='active'");
        while ($row = $results->fetch_assoc()) {
            //product_name
            $prod_num = $row['negotiating_product'];
            
            if ($user_type == "distributor") {
                $dist_key = $user_key;
            } else {
                $dist_key = $row['negotiating_distributor'];   
            }
            
                $result1 = $mysqli->query("SELECT * FROM `general_products_list` WHERE distributor_key='$dist_key' AND product_key='$prod_num'");
                $row1 = $result1->fetch_assoc();
                $product_name = $row1['product_name'];
            
                //quantity
                $quantity = $row['quantity'];
                //customer_name
                if ($user_type =="customer") {
                    $cust_num = $user_key;
                }
                else {
                    $cust_num = $row['negotiating_customer'];
                }
                
                $result2 = $mysqli->query("SELECT * FROM `customer_accounts` WHERE customer_key='$cust_num'");
                $row2 = $result2->fetch_assoc();
                $customer_name = $row2['username'];
                $status = $row['status'];
            
                print'
                <a href="negotiation.php?cust_key='.$cust_num.'&prod_key='.$prod_num.'&dist_key='.$dist_key.'">
                    <div class="negotiation_box '.$status.'">
                        <span class="negotiation_box_product_name">'.$product_name.'</span>
                        <span class="negotiation_box_quantity">'.$quantity.'</span>
                    </div>
                </a>
                ';
         }
        
        
        
    }
    
    function print_negotiations_all_history($user_key,$user_type) {
        
        include('connect.php');

        $results = $mysqli->query("SELECT * FROM `".$user_key."_negotiation_history`");
        while ($row = $results->fetch_assoc()) {
            //product_name
            $prod_num = $row['negotiating_product'];
            
            if ($user_type == "distributor") {
                $dist_key = $user_key;
            } else {
                $dist_key = $row['negotiating_distributor'];   
            }
            
                $result1 = $mysqli->query("SELECT * FROM `general_products_list` WHERE distributor_key='$dist_key' AND product_key='$prod_num'");
                $row1 = $result1->fetch_assoc();
                $product_name = $row1['product_name'];
            
                //quantity
                $quantity = $row['quantity'];
                //customer_name
                if ($user_type =="customer") {
                    $cust_num = $user_key;
                }
                else {
                    $cust_num = $row['negotiating_customer'];
                }
                $result2 = $mysqli->query("SELECT * FROM `customer_accounts` WHERE customer_key='$cust_num'");
                $row2 = $result2->fetch_assoc();
                $customer_name = $row2['username'];
                $status = $row['status'];
            
                print'
                <a href="negotiation.php?cust_key='.$cust_num.'&prod_key='.$prod_num.'&dist_key='.$dist_key.'">
                    <div class="negotiation_box '.$status.'">
                        <span class="negotiation_box_product_name">'.$product_name.'</span>
                        <span class="negotiation_box_quantity">'.$quantity.'</span>
                    </div>
                </a>
                ';
         }
        
        
        
    }
    
    function print_negotiations_completed($user_key,$user_type) {
        
        include('connect.php');

        $results = $mysqli->query("SELECT * FROM `".$user_key."_negotiation_history` WHERE status='success'");
        while ($row = $results->fetch_assoc()) {
            //product_name
            $prod_num = $row['negotiating_product'];
            
            if ($user_type == "distributor") {
                $dist_key = $user_key;
            } else {
                $dist_key = $row['negotiating_distributor'];   
            }
            
                $result1 = $mysqli->query("SELECT * FROM `general_products_list` WHERE distributor_key='$dist_key' AND product_key='$prod_num'");
                $row1 = $result1->fetch_assoc();
                $product_name = $row1['product_name'];
            
                //quantity
                $quantity = $row['quantity'];
                //customer_name
                if ($user_type =="customer") {
                    $cust_num = $user_key;
                }
                else {
                    $cust_num = $row['negotiating_customer'];
                }
                $result2 = $mysqli->query("SELECT * FROM `customer_accounts` WHERE customer_key='$cust_num'");
                $row2 = $result2->fetch_assoc();
                $customer_name = $row2['username'];
                $status = $row['status'];
            
                print'
                <a href="negotiation.php?cust_key='.$cust_num.'&prod_key='.$prod_num.'&dist_key='.$dist_key.'">
                    <div class="negotiation_box '.$status.'">
                        <span class="negotiation_box_product_name">'.$product_name.'</span>
                        <span class="negotiation_box_quantity">'.$quantity.'</span>
                    </div>
                </a>
                ';
         }
        
        
        
    }


?>