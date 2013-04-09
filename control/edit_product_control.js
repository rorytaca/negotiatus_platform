$(document).ready(function() {
    //watch for main_tags to get changed
    $("#main_tag_categories").change(function() {
        //make ajax call to set_sub_tag_menu, print in that div
        var div = document.getElementById("main_tag_categories");
        
        var new_cat = div.options[div.selectedIndex].value;
       
        $("#sub_tag_categories").load('control/print_sub_tag_menu.php?cat='+new_cat, function() {
        
        });
    
    });
});