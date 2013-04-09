function set_div_background(div_id,image) {
    
    $("#" + div_id).css('background-image','url(' + image + ')');
    
    var newImage = new Image();
    newImage.src = image;
    
    var height = newImage.height;
    var width = newImage.width;
    
    var ratio = height/width;
    
    var setWidth = 0;
    
    if (ratio < .4) {
        setWidth = 250;
    } else if (ratio < .6) {
        setWidth = 230;
    } else if (ratio < .8) {
        setWidth = 215;
    } else if (ratio < 1.0) {
        setWidth = 200;
    } else if (ratio < 1.2) {
        setWidth = 185;
    } else if (ratio < 1.4) {
        setWidth = 170;
    } else if (ratio < 1.6) {
        setWidth = 150;
    }
    
    $("#" + div_id).css('height','200px');
    $("#" + div_id).css('width',setWidth);
    
}