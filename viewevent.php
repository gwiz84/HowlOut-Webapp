<?php
session_start();
$eventId = $_GET['id'];
if (!isset($_GET['id']) || !is_numeric($eventId)) {
    header('Location: '.'index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/howlout_icon_with_border.png">
    <title>HowlOut</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Nunito+Sans|Questrial" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
</head>

<body>
    <?php include_once "_inserttoken.php"; ?>
    <?php include_once "_loginCheck.php"; ?>
    <!-- Main Content -->
    <div class="hidden-xs hidden-sm top-menu-container">
        <div class="container" style="padding: 0;">
            <?php include_once "p_topmenu.php"; ?>
        </div>
    </div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 120px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container hidden" style="border:solid 0px black;height:100%;padding:20px 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <div class="eventTopPart">
                    <img id="bannerImg" src="img/building.jpg" class="img-responsive darken" style="width:100%;height:300px;margin-bottom:5px;z-index:10;position:relative;opacity:0.9;">

                    <h2 id="eventTitle" style="margin: -60px 0 50px 30px;z-index:13;position:relative;font-weight:bold;" class="textstroke">Event title</h2>
<!--                    <i class="fa fa-share-alt textstroke"  style="float:right;font-size:28px;margin:-70px 20px 0 0;z-index:12;position:relative;cursor:pointer;"></i>-->

                    <div class="row">
                        <div class="col-md-6">
                            <div id="ownerImg" class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:40px; background-size: cover;margin:0 30px 0 30px;"></div>
                            <h4><span id="eventOwner">Event owner</span></h4>
                            <i class="fa fa-eye icon_loc"></i>&nbsp;&nbsp;<span id="eventVisibility">Visibility</span>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="howlout-button btn-joinevent" style="float:right;margin-top:40px;margin-right:15px;"><i class="fa fa-link joinIcon" style="font-size:20px;color:#45B39D;"></i></button><span class="txtFollowing" style="position:absolute;bottom:-12px;right:95px;"></span>
                            <button type="button" class="howlout-button btn-followevent" style="float:right;margin-top:40px;margin-right:20px;"><i class="fa fa-paw followIcon" style="font-size:20px;color:#45B39D;"></i></button><span class="txtJoined" style="position:absolute;bottom:-12px;right:30px;"></span>
                            <i class="fa fa-clock-o icon_time" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;<span id="eventTime">Event time</span><br>
                            <i class="fa fa-map-marker icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span id="eventLocation">Event location</span><br>
                            <i class="fa fa-user icon_peep" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;<span id="eventSignedUp">Attendees</span>
                        </div>
                    </div>
                </div>
                <br>
                <h4>About this event</h4>
                <p id="eventDescription">No Description</p>
                <p id="eventDescriptionLong"></p>
                <a class="btnShowHideDesc" style="float:right;font-size:14px;cursor:pointer;">Show description</a><br>
                <br>
                <div id="map" style="width:100%;height:400px;"></div>

                <br>
                <h4><i class="material-icons icon_peep" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;Attendees</h4>
                <hr>

                <div id="eventAttendees" class="eventAttendees">

                </div>
                <br>
                <span id="moreAttendees"><a href="" style="float:right;font-size:14px;">View all</a></span>

                <br><br>

                <h3 style="text-align:center;">Wall</h3>
                <div class="comment-input-container">
                    <textarea id="commentfield" class="ho-textinput ho-commentinput" maxlength="250"></textarea>
                    <span class="textcounter" id="textcounter"></span>
                </div>

                <button id="btnPostComment" class="btn btn-sm btn-ho" style="float:right;">Post comment</button>

                <div id="comments-container" class="comments-container">
                </div>

                <!--      PAGE CONTENT GOES HERE      -->
            </div>
        </div>

    </div>

    <!-- MOBILE WARNING BOX -->
    <?php include_once "p_mobilewarning.html"; ?>

    <!-- FOOTER -->
    <?php include_once "p_footer.html"; ?>

    <?php include_once "p_loadScripts.html"; ?>
    <script src="js/eventhandler.js"></script>
    
    <script>
        var maxCommentLength = 250;
        var comment_length = 0;
        var eventLatitude = 55.675291;
        var eventLongitude = 12.570202;
        var token = $(".token").data("token");
        var descOpen = false;
        var attendees = "";
        var currentEventId = <?php echo $eventId ?>;
        var jsonDataEvent;
        var userIsFollowing = false;
        var userIsJoined = false;

        // Facebook call to get current users facebook id
        var facebookId = "";
        window.fbAsyncInit = function() {
            // facebook functions in here
            FB.init({
                appId      : '651141215029165',
                xfbml      : true,
                version    : 'v2.8'
            });
            FB.AppEvents.logPageView();

            FB.getLoginStatus(function(response) {
                FB.api('/me', function(response)
                {
                    facebookId = response.id;
                    // check if current user is already attending and disable join button if he/she is
                    $.each(jsonDataEvent.Attendees, function(i,ele) {
                        if (facebookId==ele.Id) {
                           $(".joinIcon").css("color", "#CD6155");
                            userIsJoined = true;
                            joinFade();
                        }
                    });
                    // check if current user is already following and disable follow button if he/she is
                    $.each(jsonDataEvent.Followers, function(i,ele) {
                        if (facebookId==ele.Id) {
                            $(".followIcon").css("color", "#CD6155");
                            followFade();
                            userIsFollowing = true;
                        }
                    });
                });
            });
        };
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Request the event from the server and fill out the fields
        $(function(){
            $("#textcounter").html(maxCommentLength + " remaining");
            var apiLink = "/event/event?id=<?php echo $eventId ?>";

            runAjax(apiLink, token).done(function(data) {
                if (Object.keys(data).length <= 0) {
                    window.location = "index.php";
                }
                var jsonData = JSON.parse(data);
                jsonDataEvent = jsonData;
                
                var eventDate = new Date(Date.parse(jsonData.StartDate));
                var eventOwner;
                var eventOwnerImg;
                $("#eventTitle").html(jsonData.Title);
                if (jsonData.ProfileOwners != null) {
                    eventOwner = jsonData.ProfileOwners[0].Name;
                    eventOwnerImg = jsonData.ProfileOwners[0].ImageSource;
                } else {
                    eventOwner = jsonData.GroupOwner.Name;
                    eventOwnerImg = jsonData.GroupOwner.SmallImageSource;
                }
                $("#eventOwner").html(eventOwner);
                $("#ownerImg").css("background-image", "url('" + eventOwnerImg + "')");
                $("#eventVisibility").html(jsonData.Visibility == 0 ? "Public" : "Private");
                $("#eventTime").html(getDateFromISOString(eventDate));
                $("#eventLocation").html(jsonData.AddressName);
                $("#eventSignedUp").html(jsonData.NumberOfAttendees + ' / ' + jsonData.MaxSize);
                if (jsonData.Description.length > 300) {
                    var shortDesc = "";
                    for (var i = 0; i < 298; i++) {
                        shortDesc += jsonData.Description[i];
                    }
                    shortDesc = shortDesc + "...";
                    $("#eventDescription").html(shortDesc);
                    $("#eventDescriptionLong").html(jsonData.Description);
                    $("#eventDescriptionLong").hide();
                } else {
                    $("#eventDescription").html(jsonData.Description);
                    $(".btnShowHideDesc").hide();
                }
                $("#bannerImg").attr("src", jsonData.ImageSource);
                $(".main-content-container").removeClass("hidden");
                eventLatitude = jsonData.Latitude;
                eventLongitude = jsonData.Longitude;
                updateMap();
                showAttendees(jsonData.Attendees);
                showComments(jsonData.Comments);
            });
        });
        $(".txtJoined").hide();
        // fade away effect for join text
        function joinFade() {
            $(".txtJoined").show(150);
            setTimeout(function() {
                $(".txtJoined").hide(300);
            }, 2000);
        }
        $(".txtFollowing").hide(0);
        // fade away effect for follow text
        function followFade() {
            $(".txtFollowing").show(150);
            setTimeout(function() {
                $(".txtFollowing").hide(300);
            }, 2000);
        }
        // Show hide description button click function
        $("body").on("click", ".btnShowHideDesc", function() {
            if (descOpen) {
                $("#eventDescription").show(0);
                $("#eventDescriptionLong").hide();
                $(".btnShowHideDesc").text("Show description");
                descOpen = false;
            } else {
                $("#eventDescription").hide();
                $("#eventDescriptionLong").show(0);
                $(".btnShowHideDesc").text("Hide description");
                descOpen = true;
            }
        });

        // Detect max character lenth etc. for comment field
        $("#commentfield").keyup(function() {
            comment_length = $("#commentfield").val().length;
            if (comment_length > 1) {
                $("#btnPostComment").prop('disabled', false);
            }
            var text_remaining = maxCommentLength - comment_length;
            
            if (text_remaining == 0) {
                $("#textcounter").css("color","red");
            } else {
                $("#textcounter").css("color", "#bbbbbb");
            }
            $("#textcounter").html(text_remaining + " remaining");
        });

        // Post comment on wall
        $("#btnPostComment").click(function() {
            if (($("#commentfield").val().length) > 0) {
                var commentToPost = $("#commentfield").val();
                var currentDate = new Date().toISOString();
                var apiLink = "/message/comment/<?php echo $eventId; ?>?commentType=1";
                var jsonData = JSON.stringify({
                    "Content" : commentToPost,
                    "DateAndTime" : currentDate
                });
                runAjaxJSON(apiLink, jsonData, token).done(function(data) {
                    if (Object.keys(data).length >= 0) {
                        showComments(JSON.parse(data));
                    }
                });
            }
        });

        // Updates the comment on the page with JSON data provided as a parameter
        function showComments(jsonData) {
            $("#comments-container").empty();
            $.each(jsonData, function(i, ele) {
                var date = getDateFromISOString(new Date(Date.parse(ele.DateAndTime)));
                $("#comments-container").append('<div class="row" style="margin: 1px 0 0 0;"><div class="member-circle col-md-1" style="background-image: url('+ele.ImageSource+');background-size:100%;margin:0 30px 0 0;">'+
                    '</div><div class="col-md-10"><span><i>'+date+'</i></span><p>'+ele.Content+'</p><hr></div></div>');
            });
        }

        // Update attendees on the page with json data as parameter
        function showAttendees(jsonData) {
            if (jsonData.length > 0) {
                $.each(jsonData, function(i, ele) {
                    $(".eventAttendees").append(makeAttendeeElement(ele));
                }); 
            } else {
                $(".eventAttendees").append('<p>No attendees</p>');
                $("#moreAttendees").hide();
            }
        }

        // Gets the date and time in the format the api needs it in.
        function getFormattedDateTime() {
            return new Date().toISOString().substr(0, 19);
        }

        function updateMap() {
            var loc = {lat: eventLatitude, lng: eventLongitude};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: loc
            });
            var marker = new google.maps.Marker({
                position: loc,
                map: map
            });
        }

        $("body").on("click", ".btn-joinevent", function() {
            if (userIsJoined) {
                var apiLink = "/event/joinOrTrack/"+currentEventId+"/123?attend=false&join=true";
                var apiData = JSON.stringify({
                    "eventId": currentEventId,
                    "profileId": facebookId,
                    "attend": false,
                    "join": true
                });
                var token = $(".token").data("token");
                runAjaxPut(apiLink, apiData, token).done(function(data) {
                    $(".joinIcon").css("color", "#45B39D");
                    $(".txtJoined").text("Joined event");
                    joinFade();
                    userIsJoined = false;
                });
            } else {
                var apiLink = "/event/joinOrTrack/"+currentEventId+"/123?attend=true&join=true";
                var apiData = JSON.stringify({
                    "eventId": currentEventId,
                    "profileId": facebookId,
                    "attend": true,
                    "join": true
                });
                var token = $(".token").data("token");
                runAjaxPut(apiLink, apiData, token).done(function(data) {
                    $(".joinIcon").css("color", "#CD6155");
                    $(".txtJoined").text("Left event");
                    userIsJoined = true;
                    joinFade();
                });
            }

        });

        $("body").on("click", ".btn-followevent", function() {
            if (userIsFollowing) {
                var apiLink = "/event/joinOrTrack/"+currentEventId+"/123?attend=false&join=false";
                var apiData = JSON.stringify({
                    "eventId": currentEventId,
                    "profileId": facebookId,
                    "attend": false,
                    "join": false
                });
                var token = $(".token").data("token");
                runAjaxPut(apiLink, apiData, token).done(function(data) {
                    $(".followIcon").css("color", "#45B39D");
                    $(".txtFollowing").text("Following");
                    userIsFollowing = false;
                    followFade();
                });
            } else {
                var apiLink = "/event/joinOrTrack/"+currentEventId+"/123?attend=true&join=false";
                var apiData = JSON.stringify({
                    "eventId": currentEventId,
                    "profileId": facebookId,
                    "attend": true,
                    "join": false
                });
                var token = $(".token").data("token");
                runAjaxPut(apiLink, apiData, token).done(function(data) {
                    $(".followIcon").css("color", "#CD6155");
                    $(".txtFollowing").text("Unfollowed");
                    userIsFollowing = true;
                    followFade();
                });
            }
        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfCFzcx7k1DMkf_GCasNXbVtGA6-QtSfE&callback=updateMap"></script>

</body>

</html>