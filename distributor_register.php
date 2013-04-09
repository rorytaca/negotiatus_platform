<?php
    include_once("control/connect.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>::Negotiatus::</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
  
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="control/registration_control.js"></script>
    <link rel="stylesheet" href="view/styles.css?v=1.0">
  
</head>
<body>
  
    <h1>Negotiatus Platform</h1>
    <h2>Distributor Registration</h2>
  
    <div id=form>
        <form action="control/register_account_control.php" method="post" name="new" id="form_id">
      
            <p>Username:</p><br />
            <input class ="input_default" name="username" type="text" value="" id="username" />
            <div id="status_one"></div>
            <br />
      
            <p>Store Front Name:</p><br />
            <input class ="input_default" name="storefrontname" type="text" value="" id="storefrontname" />
            <br />
      
            <p>Email:</p><br />
            <input class ="input_default" name="email" type="text" value="" id="email" />
            <div id="status_two"></div>
            <br />
            
            <p>Password:</p><br />
            <input class ="input_default" name="password" type="password" value="" id="password" />
            <br />
      
            <p>Confirm Password:</p><br />
            <input class ="input_default" name="confirm_password" type="password" value="" id="confirm_password" />
            <div id="status_three"></div>
            <br />
            
            <input class="button" type="submit" name="submit" id="dist_submit_button" value="Submit" /><br />
            <div id="status_four"></div>
      
        </form>
    </div>

</body>
</html>