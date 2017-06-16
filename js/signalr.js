
$.connection.hub.url ='http://api.howlout.dk/signalr';

var yourHubProxy = $.connection.myHub;

$.connection.hub.start().done(function () {
    // console.log('Now connected, connection ID=' + $.connection.hub.id);
    yourHubProxy.server.subscribe($(".top-menu").data("banshee"));
});

var fbId = $(".top-menu").data("grid");
loadNotifications();


yourHubProxy.client.sendNotification = function (message) {
    audio.play();
    $(".imgNotificationAlert").fadeIn(150);
    // console.log(message);
    $(".notificationContent").prepend('' +
        ' <div class="notificationItem" data-notificationtype="'+message.NotificationType+'" data-modelid="'+message.ModelId+'"> '+
        '<img src="img/noticon.png" style="width:30px;background-size:contain;"><span style="font-size:12px;color:black;margin-left:10px;font-style:italic;">'+message.ContentName+'</span>'+
        '</div>'
    );
};





// get all notifications and fill up notification window
function loadNotifications() {
    var apiLink = "/message/inAppNotification/"+fbId;
    runAjax(apiLink, $(".token").data("token")).done(function(data) {
       var jsonData = JSON.parse(data);
       $.each(jsonData, function(i,ele) {
           $(".notificationContent").prepend('' +
               ' <div class="notificationItem" data-notificationtype="'+jsonData.NotificationType+'" data-modelid="'+jsonData.ModelId+'"> '+
               '<img src="img/noticon.png" style="width:30px;background-size:contain;"><span style="font-size:12px;color:black;margin-left:10px;font-style:italic;">'+ele.ContentName+'</span>'+
               '</div>'
           );
       });
    });
}

$("body").on("click", ".notificationItem", function() {
    var notificationType = $(this).data("notificationtype");
    var modelId = $(this).data("modelid");
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