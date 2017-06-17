// Items to hide initially
$(".menuSettings").hide();
$(".notificationContent").hide();
$(".imgNotificationAlert").hide();
var audio = new Audio('ding.wav');


var hovering = false;
// hover effect for cog icon
$(".btnMenuSettings").hover(function(){
    $(".menuSettings").removeClass("hidden");
    $(".topresultcontent").hide();
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

// auto remove cog menu when not hovering over it
$(".menuSettings").hover(function(){
    hovering = true;
}, function(){
    $(".menuSettings").slideUp(150);
    hovering = false;
});

// fade effect when loading pages
$(window).on('load', function () {
    $(".loader").fadeOut("slow");
});


