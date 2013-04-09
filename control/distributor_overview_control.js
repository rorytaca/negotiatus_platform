var dist_key = $("#hidden_dist_key").html();


function fetch_thumbnails() {
    
    $(".product_thumbnail_wrapper").each(function() {
        //get hidden data
        var prod_key = $(".hidden_prod_key", this).html();
        var dist_key = $("#hidden_dist_key").html();
    
        //set background to this prods image from server
        var filename = $(".hidden_image_name", this).html();;
        path = 'distributors/'+dist_key+'/'+prod_key+'/'+filename;

        $('.product_thumbnail_box', this).css('background-image', 'url('+path+')');
        
        //set a "edit" and "delete" links
        //$(".edit", this).attr("href", "edit_product.php?dist_key="+dist_key+"&prod_key"+prod_key);
        //$(".delete", this).attr("href", "delete_product.php?dist_key="+dist_key+"&prod_key"+prod_key);
        
        //document.getElementByClass("edit").href = "edit_product.php?dist_key="+dist_key+"&prod_key"+prod_key;
    
    });
}

function remove_all_products() {
    $(".product_thumbnail_wrapper").each(function() {
        $(this).remove();
    });
    
}

$(document).ready(function() {
    var dist_key = $("#hidden_dist_key").html();
    fetch_thumbnails();
    
    $("#overview_product_list").on('click', '#prev_product_page_button', function() {
        var page_number = parseInt($("#page_number").html());
        
        page_number--;

        remove_all_products();
        
        $("#overview_product_list").load('control/distributor_overview_control.php?dist_key='+dist_key+'&page='+page_number, function() {
            fetch_thumbnails();
        });
        
        //decrement hidden page number value
        $("#page_number").html(page_number);
        
        
        //return false;
    });
   
    $("#overview_product_list").on('click', '#next_product_page_button', function() {
        //get value of the last printed product. STORED IN DOM in div id="last_product"
        var page_number = parseInt($("#page_number").html());
        
        page_number++;


        remove_all_products();
        
        $("#overview_product_list").load('control/distributor_overview_control.php?dist_key='+dist_key+'&page='+page_number, function() {
            fetch_thumbnails();
        });
        
        //increment hidden page number value
        $("#page_number").html(page_number);
        
        
        //return false;
    });
    
    $("#overview_product_list").on('click', '.delete', function() {
        
        var conf = confirm("Are you sure you want to delete this item?");
        
        if (conf == true) {
            //url: "control/delete_product.php?dist_key='.$dist_key.'&prod_key='.$row['product_key']."
            //get page numb and dist numb
            var page_number = parseInt($("#page_number").html());
        
            var prod_key = $(this).siblings('.hidden_prod_key').html();
            var dist_key = $("#hidden_dist_key").html();
        
        
            //make ajax call to delete_product.php script
            $.ajax ({
                url: "control/delete_product.php?dist_key="+dist_key+"&prod_key="+prod_key,
                type: "GET",
                success: function(msg) {
  
                        //$("#overview_product_list").ajaxComplete(function(event, request, settings) {
                            //reload products page
                            remove_all_products();
        
                            $("#overview_products").load('control/distributor_overview_control.php?dist_key='+dist_key+'&page='+page_number, function() {
                                fetch_thumbnails();
                              
                            });
                        //});
                        
                    
                    
                }
        
            });
        
        } else {
            
        }
        
        
    });
});
