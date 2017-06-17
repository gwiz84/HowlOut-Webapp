
$.connection.hub.url ='http://api.howlout.dk/signalr';

var yourHubProxy = $.connection.myHub;

$.connection.hub.start().done(function () {
    // console.log('Now connected, connection ID=' + $.connection.hub.id);
    yourHubProxy.server.subscribe($(".top-menu").data("banshee"));
});

var fbId = $(".top-menu").data("grid");
loadNotifications();

// function which receives notifications via signalr
yourHubProxy.client.sendNotification = function (message) {
    audio.play();
    $(".imgNotificationAlert").fadeIn(150);
    // console.log(message);
    // $(".notificationContent").prepend('' +
    //     ' <div class="notificationItem" data-notificationtype="'+message.NotificationType+'" data-modelid="'+message.ModelId+'" data-notificationid="'+message.Id+'"> '+
    //     '<img src="img/noticon.png" style="width:30px;background-size:contain;"><span class="contName" style="font-size:12px;color:black;margin-left:10px;font-style:italic;font-weight:bold;">'+message.ContentName+'</span>'+
    //     '</div>'
    // );
    loadNotifications();
};

// get all notifications and fill up notification window
function loadNotifications() {
    var apiLink = "/message/inAppNotification/"+fbId;
    runAjax(apiLink, $(".token").data("token")).done(function(data) {
       var jsonData = JSON.parse(data);
       var unseenCounter = 0;
       var totalCounter = 0;
       $.each(jsonData, function(i,ele) {
           totalCounter++;
           // if (totalCounter>=14) return false;
           if (!ele.Seen) {
               unseenCounter++;
               $(".notificationContent").prepend('' +
                   ' <div class="notificationItem" data-notificationtype="'+ele.NotificationType+'" data-modelid="'+ele.ModelId+'" data-notificationid="'+ele.Id+'"> '+
                   '<img src="img/noticon.png" style="width:30px;background-size:contain;"><span class="contName" style="font-size:12px;color:black;margin-left:10px;font-style:italic;font-weight:bold;">'+ele.ContentName+'</span>'+
                   '</div>'
               );
           } else {
               $(".notificationContent").prepend('' +
                   ' <div class="notificationItem" data-notificationtype="'+ele.NotificationType+'" data-modelid="'+ele.ModelId+'" data-notificationid="'+ele.Id+'"> '+
                   '<img src="img/noticon.png" style="width:30px;background-size:contain;"><span class="contName" style="font-size:12px;color:black;margin-left:10px;font-style:italic;">'+ele.ContentName+'</span>'+
                   '</div>'
               );
           }
       });
       if (unseenCounter>0) {
           $(".imgNotificationAlert").fadeIn(150);
       } else {
           $(".imgNotificationAlert").fadeOut(150);
       }
    });
}

// notification btn click function
var notiOpen = false;
$(".btnNotifications").click(function() {
    if ($(".notificationItem").length>0) {
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

// click function for notification items
$("body").on("click", ".notificationItem", function() {
    var notificationType = $(this).data("notificationtype");
    var modelId = $(this).data("modelid");

    var notificationId = $(this).data("notificationid");
    var apiLink = "/message/inAppNotification/setSeen/"+notificationId+"?isSeen=true";
    var apiData = null;
    var token = $(".token").data("token");
    $(this).find(".contName").css("font-weight","normal");
    runAjaxPut(apiLink, apiData, token).done(function(data) {
        switch (parseInt(notificationType)) {
            case 0:
                window.location = "conversations.php";
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
                window.location = "viewevent.php?id="+modelId;
                break;
            case 4:
                window.location = "viewgroup.php?id="+modelId;
                break;
            case 5:
                window.location = "viewevent.php?id="+modelId;
                break;
            case 6:
                window.location = "viewevent.php?id="+modelId;
                break;
            case 7:
                break;
            case 8:
                window.location = "viewevent.php?id="+modelId;
                break;
            case 9:
                break;
            case 10:
                break;
            case 11:
                window.location = "viewgroup.php?id="+modelId;
                break;
            case 12:
                break;
            case 13:
                window.location = "viewevent.php?id="+modelId;
                break;
            case 14:
                window.location = "viewevent.php?id="+modelId;
                break;
            case 15:
                window.location = "viewevent.php?id="+modelId;
                break;
            case 16:
                break;
            case 17:
                break;
            case 18:
                break;
        }
    });

});