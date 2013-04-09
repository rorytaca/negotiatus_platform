$(document).ready(function() {
    var user_key = $("#user_key").html();
    var user_type = $("#user_type").html();
    
    $(".negotiation_history_tab").click(function() {
        $("#negotiation_history_display").html(''); 
    });
    
    $("#in_progress").click(function() {
        $("#negotiation_history_display").load('control/negotiation_overview_display_controller.php?user_key='+user_key+'&user_type='+user_type+'&function=1', function() {
        });
    });
    
    $("#all_history").click(function() {
        $("#negotiation_history_display").load('control/negotiation_overview_display_controller.php?user_key='+user_key+'&user_type='+user_type+'&function=2', function() {
        });
    });
        
    $("#completed_deals").click(function() {
        $("#negotiation_history_display").load('control/negotiation_overview_display_controller.php?user_key='+user_key+'&user_type='+user_type+'&function=3', function() {
        });
    });

});