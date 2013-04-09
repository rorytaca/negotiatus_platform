
/*******************
 *LOGIN BAR CONTROL*
 *******************/

function readCookie(name) {
    name += '=';
    for (var ca = document.cookie.split(/;\s*/), i = ca.length - 1; i >= 0; i--)
        if (!ca[i].indexOf(name))
            return ca[i].replace(name, '');
    return false;
}

$(document).ready(function() {
    var expanded = false;
    
    $("body").on('click', '#username_login_bar', function() {
        var account_type = readCookie("account_type");
        var key = readCookie("id");

        
        if (account_type == 'distributor') {
            window.location = "http://negotiatus.com/platform/distributor_overview.php?dist_key="+key;
        } else if (account_type == 'customer' ) {
            window.location = "http://negotiatus.com/platform/customer_overview.php?cust_key="+key;
        }
    });
    
    $(".expand_login_bar").click(function() {
        $("#login_bar").animate({height: '+=80px'}, 500, 'linear');
        $("#guest_login_bar_content").hide();
        $("#loging_in_content").show();
        expanded = true;
    });
    
    $("#content_wrapper").click(function() {
        if (expanded == true) {
                $("#loging_in_content").hide();
                $("#guest_login_bar_content").show();
                $("#login_bar").animate({height: '-=80px'}, 500, 'linear');
                expanded = false;          
        }
    });
    
     $("#cust_login_button").click(function() {
        var cust_key;
        
        $.ajax ({
            type: "POST",
            url: "control/customer_login_control.php",
            data: $("#customer_login").serialize(),
            success: function(data)
            {
                if (data != "FAIL1" || data != "FAIL2") {
                    //LOGIN SUCCESSFUL
                    cust_key = String(data);
                    $("#loging_in_content").hide();
                    $("#logged_in_content").show();
                    $("#login_bar").animate({height: '-=80px'}, 500, 'linear');
                    $("#login_bar").css('position','fixed');
                    expanded = false;

                } else if (data == "FAIL2") {
                    $("#msg_two").html('Invalid username and/or password.');
                }
                
                $("#msg_two").ajaxComplete(function(event, request, settings) {
                    var url = "http://negotiatus.com/platform/customer_overview.php?cust_key=";
                    var full_url = url.concat(cust_key);
        
                    window.location = full_url;
                });

            }
            

        });

        //window.location = window.location.href;
        return false;
            
    });
            
    $("#dist_login_button").click(function() {
        
        var dist_key;
        
        $.ajax ({
            type: "POST",
            url: "control/distributor_login_control.php",
            data: $("#distributor_login").serialize(),
            success: function(data)
            {
                if (data != "FAIL" || data != "FAIL2") {
                    //LOGIN SUCCESSFUL
                    dist_key = String(data);
                    $("#loging_in_content").hide();
                    $("#logged_in_content").show();
                    $("#login_bar").animate({height: '-=80px'}, 500, 'linear');
                    $("#login_bar").css('position','fixed');
                    expanded = false;
                    

                } else if (data == "FAIL2") {
                    $("#msg_two").html('Invalid username and/or password.');
                }
                
                $("#msg_two").ajaxComplete(function(event, request, settings) {
                    var url = "http://negotiatus.com/platform/distributor_overview.php?dist_key=";
                    var full_url = url.concat(dist_key);
        
                    window.location = full_url;
                });

            }
            

        });

        //window.location = window.location.href;
        return false;
        
    });
    
    $("#logoff_button").click(function() {
        $.ajax ({
            url: "control/logoff_control.php",
            success: function() {
                $("#logoff_button").ajaxComplete(function(event, request, settings) {
                    var url = "http://negotiatus.com/platform/";
        
                    window.location = url;
                    $("#login_bar").css('position','relative');
                });
            }
        });
        
        $("#logged_in_content").hide();
        $("#guest_login_bar_content").show();
        
    });
    
    $("#search_button_header_bar").click(function() {
        var search_query = $("#search_product_header_bar").val();
        window.location = "http://negotiatus.com/platform/product_search.php?search="+search_query;
        
    });
    
    //set negitiation icons color dependent on unread count
    var unread_count = $("#negotiations_icon").html();
    if (unread_count == 0) {
        
        $("#negotiations_icon").removeClass();
        $("#negotiations_icon").addClass("all_read");
    } else {
        $("#negotiations_icon").removeClass();
        $("#negotiations_icon").addClass("unread");
    }

});

function set_to_logged_in() {
    //RETURN TRUE IF LOGGED IN, FALSE IF ELSE

    $("#guest_login_bar_content").hide();
    $("#logged_in_content").show();                

}

function set_to_logged_out() {
    //RETURN TRUE IF LOGGED IN, FALSE IF ELSE
    if (window.location.href != "http://negotiatus.com/platform/index.php") {
        window.location = "http://negotiatus.com/platform/index.php";

    }

}
