<?php

    $main_cats = array();
    
    
    function print_main_tag_categories() {
        
        include('connect.php');
        
        $sql_result = $mysqli->query("SELECT * FROM `main_categories`");
        if ($sql_result) {
            $index = 0;
            while ($row = $sql_result->fetch_assoc()) {
                $main_cats[$index] = $row['category'];
             
                print '<option value="'.$main_cats[$index].'">'.$main_cats[$index].'</option>';
                $index++;
            }
        }
    }

?>