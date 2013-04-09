<?php
    if (isset($_GET['cust_key'])) {
        $user_key = $_GET['cust_key'];
        $user_type = 'customer';
    } else if (isset($_GET['dist_key'])) {
        $user_key = $_GET['dist_key'];
        $user_type = 'distributor';
    }
    
    include('control/negotiation_overview_control.php');
    
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
    <script language="JavaScript" type="text/javascript" src="control/negotiation_overview_control.js"></script>
    <link rel="stylesheet" href="view/styles.css?v=1.0">
  
</head>
<body>
    <?php
        include_once('include/header_bar.php');
    ?>
  
    <div id="content_wrapper">
        <div id="inner_content">
            <h2>Negotiation Overview</h2>
        
                <div id="negotiation_history_wrapper">
                    
                    <div id="negotiation_history_nav">
                        <div class="negotiation_history_tab" id="in_progress">In Progress</div>
                        <div class="negotiation_history_tab" id="all_history">All History</div>
                        <div class="negotiation_history_tab" id="completed_deals">Completed Deals</div>
                    </div>
                    
                    <div class="hidden" id="user_key"><?php print $user_key ?></div>
                    <div class="hidden" id="user_type"><?php print $user_type ?></div>
                    
                    <div id="negotiation_history_display">
                        
                        <?php
                            print_negotiations_in_progress($user_key,$user_type);
                        ?>
                        
                    </div>
                    
                </div>
      
        </div>
    </div>

</body>
</html>