$(document).ready(function() {
    $(".negotiate_button").click(function() {
        
        var dist_key = $(this).next("#hidden_dist_key").html();
        var prod_key = $(this).siblings("#hidden_prod_key").html();
        var cust_key = $(this).siblings("#hidden_cust_key").html();
       
        $.ajax({
            type: "POST",
            url: "control/create_negotiation.php?dist_key="+dist_key+"&prod_key="+prod_key+"&cust_key="+cust_key,
            success: function(data)
            {       
        
                $("#product_page_info").ajaxComplete(function(event, request, settings) {
                    //redirect page to negotiation.php...
                    window.location = "http://negotiatus.com/platform/negotiation.php?cust_key="+cust_key+"&prod_key="+prod_key+"&dist_key="+dist_key;
                });
            }
            
            
            
        });
        
        return false;
    });
    
});