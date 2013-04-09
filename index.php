<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>::Negotiatus::</title>
  
  <meta name="author" content="SitePoint">
  
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/master_control.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/cookie.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/load_search_query.js"></script>
  <script language="JavaScript" type="text/javascript" src="control/registration_control.js"></script>
  
  
  <link rel="stylesheet" href="view/styles.css">
    
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
</head>
<body>
  
  <?php
    include_once('include/header_bar.php');
  ?>
  

  
  <div id="content_wrapper">
    <div id="inner_content">
      <div id="home_page_banner">
        <div id="banner_image">
        <h2>Ecommerce Evolves</h2>
        <p>In a world where money talks, you are forcing yours to stay quite. Now, with Negotiatus, you let sellers know how much you are willing to pay. It is your money. Why shop on their terms?</p>
        <p>Because in life, everything is negotiable</p>
        </div>
        <div id="banner_form">
            <h3>Sign Up</h3>
            <h4>Because its free and easy!</h4>
            <form action="control/register_account_control.php" method="post" name="new" id="form_id">
      
            <input class ="input_default" name="username" type="text" value="Username" id="username" />
            <div id="status_one"></div>
            <br />
      
            
            <input class ="input_default" name="email" type="text" value="Email" id="email" />
            <div id="status_two"></div>
            <br />
            
            <input class ="input_default" name="password" type="text" value="Password" id="password" />
            <br />
      
            <input class ="input_default" name="confirm_password" type="text" value="Confirm Password" id="confirm_password" />
            <div id="status_three"></div>
            <br />
            
            <input class="button" type="submit" name="submit" id="cust_submit_button" value="Submit" /><br />
            <div id="status_four"></div>
      
        </form>
        </div>
      </div>
      
      <div id="how_it_works">
        <h3>A Quick Walkthrough</h3>
        <p>Shopping through Negotiatus is quick and easy, just follow these simple steps:</p>
        
        <div class="walkthrough_box" id="box1">
          <div class="walkthrough_image" id="img1"></div> 
          <span class="walkthrough_text" id="text1">After <a href="#">registering</a> your account, simply begin searching for the products you want. When you find something your interested in, start negotiating.</span>
        </div>
        
        <div class="walkthrough_box" id="box2">
          <div class="walkthrough_image" id="img2"></div> 
          <span class="walkthrough_text" id="text2">Barter with the seller until a deal is made.</span>          
        </div>
        
        <div class="walkthrough_box" id="box3">
          <div class="walkthrough_image" id="img3"></div> 
          <span class="walkthrough_text" id="text3">Check out your transaction history to see how much money you've saved!</span>           
        </div>
        
        
      </div>
      
      <div id="distributors_section">
        <h3>Are you a retailer?</h3>
        <p>Would you like to join the negotiatus community? Register a distributor account now, and instantly begin selling your goods on the negotiatus network. Registration is free and easy. </p>
        
        
      </div>
      <a href="#"><div id="distributor_join">Join Now!</div></a>
      

    

    </div>
    
    <div id="footer">
      
    </div>
  </div>
 


</body>
</html>