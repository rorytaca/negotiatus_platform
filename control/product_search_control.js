function fetch_thumbnails() {
    
    $(".product_thumbnail_wrapper").each(function() {
        //get hidden data
        var prod_key = $(".hidden_prod_key", this).html();
        var dist_key = $(".hidden_dist_key", this).html();
    
        //set background to this prods image from server
        var filename = $(".hidden_image_name", this).html();
        path = '/platform/distributors/'+dist_key+'/'+prod_key+'/'+filename;

        $('.product_thumbnail_box', this).css('background-image', 'url('+path+')');
    });
}

function load_search_query(encode_query) {
    $("#search_results").load('control/search_for_product.php?search='+encode_query, function() {
        //the php script called will print the html elements into the html div, you need to fetch thumbnails now
        fetch_thumbnails();
    });
}

            
$(document).ready(function() {
    fetch_thumbnails();
    
    $("#prod_search_button").click(function() {
        //get value from input field 
        var search_query = $("#search_product").val();
        //make ajax call to the search function, load results into result div on completion
        
        var encode_query = encodeURIComponent(search_query);
        
        //$("#search_results").load('control/search_for_product.php?search='+encode_query, function() {
            //the php script called will print the html elements into the html div, you need to fetch thumbnails now
        //});
        load_search_query(encode_query);

    });
   
   
     $("#search_results").on('click', '.recommend', function() {
        var encoded_search = $(this).next('.hidden').html();
        load_search_query(encoded_search);
        $('#search_product').val(decodeURIComponent(encoded_search));
        
        return false;
     });
     
     
});