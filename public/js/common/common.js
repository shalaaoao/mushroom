function copy_tips(){
    $(".copy-tips").fadeOut(1700);
}


var alert_page = function(copysuc) {
    var $html = $("<div class='copy-tips'><div class='copy-tips-wrap'>"+copysuc+"</div></div>");
    $("body").find(".copy-tips").remove().end().append($html);
    if(copysuc.length > 16){
        $('.copy-tips-wrap').css('padding-top','12px');
        $('.copy-tips-wrap').css('padding-bottom','12px');
    }
    var width = parseInt($('.copy-tips').css('width'));
    var left = (750 - width)/2;
    $('.copy-tips').css('left',left+'px');
    $(".copy-tips").show();
    setTimeout('copy_tips()',3200);
}