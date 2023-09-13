$('.show-read-more').each(function(){
    var myStr = $(this).text();
    if($.trim(myStr).length > 10){
        var newStr = myStr.substring(0, 10);
        var removedStr = myStr.substring(10, $.trim(myStr).length);
        $(this).empty().html(newStr);
        $(this).append('<a href="javascript:void(0);" class="read-more">more...</a>');
        $(this).append('<span class="more-text">' + removedStr + '</span>');
    }
});

$(".read-more").click(function(){
    $(this).siblings(".more-text").contents().unwrap();
    $(this).remove();
});
