<?php
    include('connect.php');
        $cat = $_GET['cat'];

        //$cat holds category name, each category has a sub-directory of sub-categories named 'name'_sub_categories
        $sql_result = $mysqli->query("SELECT * FROM ".$cat."_sub_categories");
        while ($row = $sql_result->fetch_assoc()) {
            print'<option value="'.$row['sub_category'].'">'.$row['sub_category'].'</option>';
                
        }

?>