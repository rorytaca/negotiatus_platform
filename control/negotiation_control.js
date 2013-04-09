$(document).ready(function() {
    $("#submit_exchange_button").click(function() {
        var user_type = $("#hidden_user_type").html();
        var loc_numb = $("#hidden_loc_numb").html();
        
        
        var php_url = "control/submit_exchange.php?loc="+loc_numb+"&user="+user_type;
       //make ajax call to submit exchange
       $.ajax({
            type: "POST",
            url: php_url,
            data: $("#negotiation_respond_form").serialize(),
            success: function(msg) {
                $("#negotiation_respond_form").ajaxComplete(function(event, request, setting) {
                    window.location = window.location;
                    
                });

            }
        
        
        });
        //update browser
        return false;
    });

});