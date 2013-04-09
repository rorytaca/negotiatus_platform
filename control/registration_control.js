pic1 = new Image(16, 16);
pic1.src = "view/loader.gif";
var submittable = false;
var username_check = false;
var storefront_check = false;
var email_check = false;
var password_check = false;
var conf_password_check = false;

function submit_validation() {
    //IF storefront does not exist, set check to true
    if (!$("#storefrontname").length) {
        storefront_check = true;
    }
    
    
    if (username_check == true && storefront_check == true && email_check == true && password_check == true && conf_password_check == true) {
        submittable = true;
    } else {
        submittable = false;
    }
}

$(document).ready(function(){
    //CHECK TO MAKE SURE USERNAME IS AVAILABLE
    $("#username").change(function() {
        //see if cust or dist registration
        var type;
        
        if (window.location.href == "http://negotiatus.com/platform/distributor_register.php") {
            type="distributor";
        } else {
            type="customer";
        }
        
        var usr = $("#username").val();
       
        if (usr.length >= 3) {
            $("#status_one").html('<img src="view/loader.gif" /> Checking availability...');
            
            $.ajax ({
                type: "POST",
                url: "control/checkAvailability.php?type="+type,
                data: {'username': usr},
                success: function(msg) {
                    
                    $("#status_one").ajaxComplete(function(event, request, settings) {
                        if(msg == 'OK') {
                            $("#username").removeClass('registration_warning');
                            $("#username").addClass('registration_ok');
                            $(this).html('<img src="view/accepted.png" />');
                            username_check = true;
                        } else {
                            $("#username").removeClass('registration_ok');
                            $("#username").addClass('registration_warning');
                            $(this).html(msg);
                            username_check = false;
                        }
                    }); 
                }
            });
            
        } else {
            $("#status_one").html('Username must be at least 3 characters.');
            $("#username").removeClass('registration_ok');
            $("#username").addClass('registration_warning');
            username_check = false;
        }
    });
    
    $("#storefrontname").change(function() {
        var storefront_name = $("#storefrontname").val();
        if(storefront_name.length > 0) {
            storefront_check = true;
            
        } else {
            storefront_check = false;
        }
    });
    
    //CHECK IF VALID EMAIL
    $("#email").change(function() {
        var email =  $("#email").val();
        
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if( !emailReg.test( email ) ) {
            $("#status_two").html('Not a valid email adress.');
            $("#email").removeClass('registration_ok');
            $("#email").addClass('registration_warning');
            email_check = false;
        } else {
            $("#status_two").html('<img src="view/accepted.png" />');
            $("#email").removeClass('registration_warning');
            $("#email").addClass('registration_ok');
            email_check = true;
            
        }
    });
    
    //CHECK TO MAKE SURE PASSWORD & CONFIRM PASSWORD ARE IDENTICAL
    $("#password").change(function() {
        var pw = $("#password").val();
        
        if (pw.length >= 6) {

            $("#status_three").html('Acceptable password');
            $("#password").removeClass('registration_warning');
            $("#password").addClass('registration_ok');
           password_check = true;
        } else {
            $("#status_three").html('Password must be at least 6 characters.');
            
            $("#password").removeClass('registration_ok');
            $("#password").addClass('registration_warning');
            password_check = false;
        }
        
     });
     
    $("#confirm_password").change(function() {
        var pw = $("#password").val();
        var conf_pw = $("#confirm_password").val();
         
        if (conf_pw.length > 5 && pw == conf_pw) {
            $("#status_three").html('<img src="view/accepted.png" />');
            $("#password").removeClass('registration_warning');
            $("#password").addClass('registration_ok');
            $("#confirm_password").removeClass('registration_warning');
            $("#confirm_password").addClass('registration_ok');
            conf_password_check = true;
        } else {
            
            if (conf_pw.length < 6) {
                $("#status_three").html('Password is not long enough.');
            } else {
                $("#status_three").html('Passwords do not match up.');
            }
            $("#password").removeClass('registration_ok');
            $("#password").addClass('registration_warning');
            $("#confirm_password").removeClass('registration_ok');
            $("#confirm_password").addClass('registration_warning');
            
            conf_password_check = false;
        }
        
    });
    
    $("#dist_submit_button").click(function() {
        var url = "control/register_account_control.php?type=distributor";
        
        //run submit validation
        submit_validation();
        
        if (submittable == false) {
            alert("This form is incomplete, please go over the entries and submit again!");
            return false;
        } else {
            $.ajax ({
                type: "POST",
                url: url,
                data: $("#form_id").serialize(),
                success: function(data)
                {
                    if (data == "OK") {
                        //GO TO NEXT PAGE
                        window.location = "http://negotiatus.com/platform/account_registered.html";
                    } else {
                        //DISPLAY ERROR AND REMAIN
                        $("#status_four").html('An error occured registering this account, please try again.');
                    }
                }
            });
            return false;
        }
    });
    
    $("#cust_submit_button").click(function() {
        var url = "control/register_account_control.php?type=customer";
        
        //run submit validation
        submit_validation();
        
        if (submittable == false) {
            alert("This form is incomplete, please go over the entries and submit again!");
            return false;
        } else {
            $.ajax ({
                type: "POST",
                url: url,
                data: $("#form_id").serialize(),
                success: function(data)
                {
                    if (data == "OK") {
                        //GO TO NEXT PAGE
                        window.location = "http://negotiatus.com/platform/account_registered.html";
                    } else {
                        //DISPLAY ERROR AND REMAIN
                        $("#status_four").html('An error occured registering this account, please try again.');
                    }
                }
            });
            return false;
        }
    });

});