/********CONTROLS THE ADD_PRODUCT PAGE*********
 ***IN CHARGE OF VIEW ASSIGNMENT***************
 ****WATCHES FOR FORM SUBMISSION***************
 *MAKES AJAX CALL TO SAME PAGES PHP CONTROLLER*
 **********************************************/
var validated = false;

function validate_product_form() {

    if ($("#product_name").val() != "" && $("#product_description").val() != "" && $("#asking_price").val() != "") {
        validated = true;
    }
}

$(document).ready(function() {
    
    //WATCH FOR FORM SUBMISSION
    $("#submit_product_button").click(function() {
        //GET DATA FROM HIDDEN HTML ITEM IN DOM
        var dist_key = $("#hidden_dist_key").html();
        //CHECK IF ALL FORMS FILLED OUT
        validate_product_form();
        
        if (validated == true) {
            $("#add_product_status").html('<img src="view/loader.gif" /> Checking availability...');
            
            $.ajax({
                type: "POST",
                url: "control/add_product_control.php?dist_key="+dist_key,    
                data: $("#add_product_form").serialize(),
                success: function(msg) {

                    if (msg != 'FAIL1' || msg != 'FAIL2' || msg != 'FAIL3' || msg != 'FAIL4') {
                        //on COMPLETION REDIRECT WEB BROWSWER.. PRODUCT KEY WILL BE SUPPLIED THROUGH AJAX CALL::msg
                        $("#hidden_dist_key").ajaxComplete(function(event, request, setting) {
                            var url = "http://negotiatus.com/platform/edit_product.php?dist_key="+dist_key+"&prod_key="+msg;
                            window.location = url;
                
                        });
                    } else {
                    //FAILED
                    }
                }
            
            });     
            
        } else {
            //FORM IS INCOMPLETE
            $("#add_product_status").html('All fields most be filled out to submit product.');
            
        }
        
        return false;
    });
    
    
});