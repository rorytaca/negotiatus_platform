function load_search_query(encode_query) {
    $("#search_results").load('control/search_for_product.php?search='+encode_query, function() {
        //the php script called will print the html elements into the html div, you need to fetch thumbnails now
    });
}