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



var notiOpen = false;
// notification btn click function
$(".btnNotifications").click(function() {
    if ($(".notificationItem").length>0) {
        $(".imgNotificationAlert").fadeOut(150);
        if (notiOpen) {
            $(".notificationContent").fadeOut(150);
            notiOpen = false;
        } else {
            $(".topresultcontent").hide();
            $(".notificationContent").fadeIn(150);
            notiOpen = true;
        }
    }
});



// Function which closes the notification content div when you click outside of it
$(document).mouseup(function (e) {
    var container = $(".notificationContent");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0 ) // ... nor a descendant of the container
    {
        if ( $('.notificationContent:visible') ) {
            notiOpen = false;
            $(".notificationContent").hide();
        }
    }
});