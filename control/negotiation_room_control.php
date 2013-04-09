<?php
//CHECK IF OPEN OR PRIVATE. OPEN HAS LOC AS VARIABLE, PRIVATE HAS DIST, PROD, CUST KEYS AS VARIABLES


include('connect.php');


if (isset($_GET['loc'])) {
    //take loc... access loc prod info and chat history
    $loc = $mysqli->real_escape_string($_GET['loc']);
    $user = $mysqli->real_escape_string($_GET['user']);
    
    $full_loc = "negotiation_".$loc;

    $request = $mysqli->query("SELECT * FROM `open_negotiations_master_history` WHERE chat_location='$full_loc'");
    $row = $request->fetch_assoc();

    //get product info variables
    $name = $row['product_name'];
    $seller = $row['seller']; 
    $size = $row['size']; 
    $color = $row['color']; 
    $price = $row['price']; 
    $link = $row['link'];
    $loc = $row['chat_location'];
    

    
} else {
    
    $dist_key = $mysqli->real_escape_string($_GET['dist_key']);
    $prod_key = $mysqli->real_escape_string($_GET['prod_key']);
    $cust_key = $mysqli->real_escape_string($_GET['cust_key']);  
    
    $full_loc = $cust_key."_".$prod_key."_".$dist_key."_negotiation";
    
    $query = "SELECT * FROM `".$cust_key."_negotiation_history` WHERE negotiating_distributor ='$dist_key' AND negotiating_product ='$prod_key'";
    $request = $mysqli->query($query);
    $row = $request->fetch_assoc();

    //get product info variables
    
    $size = $row['sizes']; 
    $color = $row['colors']; 
    $price = $row['asking_price'];
    
    
    //$link = $row['link'];
    $loc = $row['table_location'];


    //get seller name from dist list
    $result2 = $mysqli->query("SELECT * FROM `distributor_accounts` WHERE distributor_key='$dist_key'");
    $row2 = $result2->fetch_assoc();
    $seller = $row2['store_name'];
    
    //get product name
    $result3 = $mysqli->query("SELECT * FROM `".$dist_key."_products_list` WHERE product_key='$prod_key'");
    $row3 = $result3->fetch_assoc();
    $name = $row3['product_name'];
    $filename = $row3['image_name'];
    $link = "http://negotiatus.com/platform/distributors/".$dist_key."/".$prod_key."/".$filename;
}

//CALL THIS IN HTML TO PRINT HISTORY
function print_chat_history($table) {
    include('control/connect.php');
    
    $query = "SELECT * FROM ".$table;
    $request = $mysqli->query($query);
    while ($row = $request->fetch_assoc()) {
        $sender = $row['sender'];
        
        $exchange = $row['exchange'];
        
        print'
            <p class="chat_exchange_'.$sender.'">
        
            '.$exchange.'
        
            </p><br />
        ';
    }  
}

function print_exchange_form($table) {
    $user = $_GET['user'];
    if (!$user && (isset($_GET['cust_key']))) {
        $user = 'customer';
    } else if (!$user && (isset($_GET['dist_key']))) {
        $user = 'distributor';
    }
    
    include('control/connect.php');
    $query = "SELECT * FROM ".$table." ORDER BY `id` DESC LIMIT 1";
    $request = $mysqli->query($query);
    $row = $request->fetch_assoc();
    $last_sender = $row['sender'];
    
    $chat_empty = false;
    if (!$last_sender) {
        $chat_empty = true;
    }

    if ((($user == "customer") && $chat_empty) || (!$chat_empty && ($user != $last_sender))) {
        print'
            <form action="" method="post" name="respond" id="negotiation_respond_form" >
              <textarea class="textarea_default" name="exchange" type="text" id="exchange"></textarea><br />
              <input class="button" type="submit" name="submit_exchange" value="submit" id="submit_exchange_button" /><br />
            

            </form>
        ';
    } else {
        print'<span class="exchange_waiting">Please wait for the other party to reply.</span>';
    }

}

?>