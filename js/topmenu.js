$(".menuSettings").hide();

var hovering = false;

$(".btnMenuSettings").hover(function(){
    $(".menuSettings").removeClass("hidden");
    $(".menuSettings").slideDown(150);
    hovering = true;
    setTimeout(function() {
        if (!hovering) {
            $(".menuSettings").slideUp(150);
            hovering = false;
        }
    }, 3000);
}, function(){
    hovering = false;
});

$(".menuSettings").hover(function(){
    hovering = true;
}, function(){
    $(".menuSettings").slideUp(150);
    hovering = false;
});
