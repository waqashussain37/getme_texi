$('.google-map')
    .gmap3({
        center: [51.509865, -0.118092],
        mapTypeId: google.maps.MapTypeId.ROADMAP
    })
    .route({
        origin: $('#pickUpLocation').text(),
        destination: $('#dropOffLocation').text(),
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    })
    .directionsrenderer(function (results) {
        if (results) {
            return {
                panel: "#box",
                directions: results
            }
        }
    })
    .then(function (map) {
        map.setZoom(15);
    });

$('.show-read-more').each(function(){
    var myStr = $(this).text();
    if($.trim(myStr).length > 50){
        var newStr = myStr.substring(0, 50);
        var removedStr = myStr.substring(50, $.trim(myStr).length);
        $(this).empty().html(newStr);
        $(this).append('<a href="javascript:void(0);" class="read-more">read more...</a>');
        $(this).append('<span class="more-text">' + removedStr + '</span>');
    }
});

$(".read-more").click(function(){
    $(this).siblings(".more-text").contents().unwrap();
    $(this).remove();
});
