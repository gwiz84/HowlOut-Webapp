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
                    <img src="img/building.jpg" class="img-responsive darken" style="width:100%;height:300px;margin-bottom:5px;z-index:10;position:relative;opacity:0.9;">

                    <h2 id="eventTitle" style="margin: -60px 0 50px 30px;z-index:13;position:relative;font-weight:bold;" class="textstroke">Event title</h2>
                    <i class="fa fa-share-alt textstroke"  style="float:right;font-size:28px;margin:-70px 20px 0 0;z-index:12;position:relative;cursor:pointer;"></i>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin:0 30px 0 30px;"></div>
                            <h4><span id="eventOwner">Event owner</span></h4>
                            <i class="fa fa-eye icon_loc"></i>&nbsp;&nbsp;<span id="eventVisibility">Visibility</span>
                        </div>
                        <div class="col-md-6">
                            <i class="fa fa-paw btnTrackEvent eventpaw" style="float:right;font-size:42px;cursor:pointer;margin-right:20px;"></i>
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

    <!-- // <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfCFzcx7k1DMkf_GCasNXbVtGA6-QtSfE&callback=updateMap"></script> -->

    <?php include_once "p_loadScripts.html"; ?>

    <script>
        var maxCommentLength = 250;
        var comment_length = 0;
        var eventLatitude = 55.675291;
        var eventLongitude = 12.570202;
        var token = $(".token").data("token");

        var attendees = "";

        $("#textcounter").html(maxCommentLength + " remaining");

        $(function(){
            var apiLink = "https://api.howlout.net/event/event?id=<?php echo $eventId ?>";

            $.ajax({
                type: "POST",
                url: "_apiRequest.php",
                async: false,
                data: {'apiLink' : apiLink, 'token' : token},
                success: function (data) {
                    if (Object.keys(data).length <= 0) {
                        window.location = "index.php";
                    }
                    var jsonData = JSON.parse(data);
                    updateAttendees(JSON.stringify(jsonData.Attendees));
                    $(".main-content-container").removeClass("hidden");
                    var eventDate = new Date(Date.parse(jsonData.StartDate));
                    $("#eventTitle").html(jsonData.Title);
                    var eventOwner;
                    if (jsonData.ProfileOwners != null) {
                        eventOwner = jsonData.ProfileOwners[0].Name;
                    } else {
                        eventOwner = jsonData.GroupOwner.Name;
                    }
                    $("#eventOwner").html(eventOwner);
                    $("#eventVisibility").html(jsonData.Visibility == 0 ? "Public" : "Private");
                    $("#eventTime").html(getDateFromISOString(eventDate));
                    $("#eventLocation").html(jsonData.AddressName);
                    $("#eventSignedUp").html(jsonData.NumberOfAttendees + ' / ' + jsonData.MaxSize);
                    if (jsonData.Description.length>300) {
                        var shortDesc = "";
                        for (var i=0;i<298; i++) {
                            shortDesc += jsonData.Description[i];
                        }
                        shortDesc = shortDesc+"..";
                        $("#eventDescription").html(shortDesc);
                        $("#eventDescriptionLong").html(jsonData.Description);
                        $("#eventDescriptionLong").hide();
                    } else {
                        $("#eventDescription").html(jsonData.Description);
                        $(".btnShowHideDesc").hide();
                    }
                    $(".img-responsive").attr("src", jsonData.ImageSource);

                    eventLatitude = jsonData.Latitude;
                    eventLongitude = jsonData.Longitude;
                    updateMap();
                    console.log(jsonData);
                    // updateAttendees(jsonData.Attendees);
                    updateComments(jsonData.Comments);
                },
                error: function (data) {
                    alert(data);
                    // alert("ajax failed");
                }
            });
        });

        var descOpen = false;
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
            if (comment_length > 0) {
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
                $(function(){
                    var commentToPost = $("#commentfield").val();
                    var currentDate = new Date().toISOString();
                    var apiLink = "https://api.howlout.net/message/comment/<?php echo $eventId; ?>?commentType=1";
                    var jsonData = JSON.stringify({
                        "Content" : commentToPost,
                        "DateAndTime" : currentDate
                    });
                    $.ajax({
                        type: "post",
                        url: "_apiRequestJSON.php",
                        async: false,
                        data: {'apiLink' : apiLink, 'apiData' : jsonData, 'token' : token},
                        success: function (data) {
                            updateComments(data);
                        },
                        error: function (data) {
                            alert(data);
                            // alert("ajax failed");
                        }
                    });
                });
            }
        });

        // Get comments as page is loaded
        $(function(){
            var currentDate = new Date().toISOString();
            var apiLink = "https://api.howlout.net/message/comment/<?php echo $eventId; ?>?commentType=1";
            $.ajax({
                type: "post",
                url: "_apiRequest.php",
                async: false,
                data: {'apiLink' : apiLink, 'token' : token},
                success: function (data) {
                    // console.log(data);
                    updateComments(data);
                },
                error: function (data) {
                     alert("An unknown error has occured, please check your internet connection.");
                }
            });
        });

        // Updates the comment on the page with JSON data provided as a parameter
        function updateComments(jsonData) {
            // if (jsonData != null) {
            //     var data = JSON.parse(jsonData);
            //     $("#comments-container").empty();
            //     $.each(data, function(i, ele) {
            //         var date = getDateFromISOString(new Date(Date.parse(ele.DateAndTime)));
            //         $("#comments-container").append('<div class="row" style="margin: 10px 0 0 0;"><div class="member-circle col-md-1" style="background-image: url('+ele.ImageSource+');background-size:100px;margin-left:30px;">'+
            //             '</div><div class="col-md-10"><span><i>'+date+'</i></span><p>'+ele.Content+'</p><hr></div></div>');
            //     });
            // }  
        }

        // Update attendees on the page with json data as parameter
        function updateAttendees(jsonData) {
            var data = JSON.parse(jsonData);
            $(".eventAttendees").empty();
            if (data.length>0) {
                $.each(data, function(i, ele) {
                    $(".eventAttendees").append('');
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

        // Convert an ISO-formatted date/time string to a more easily readable format
        function getDateFromISOString(dateString) {
            var months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            var dDay = dateString.getDate();
            var dMonth = dateString.getMonth();
            var dYear = dateString.getYear() + 1900;
            var dHours = dateString.getHours();
            var dMinutes = dateString.getMinutes();
            dHours = (dHours <= 9 ? ('0' + dHours) : dHours);
            dMinutes = (dMinutes <= 9 ? ('0' + dMinutes) : dMinutes);
            dMonth = months[dMonth];

            return dMonth + " " + dDay + " " + dYear + " " + dHours + ":" + dMinutes;
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
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfCFzcx7k1DMkf_GCasNXbVtGA6-QtSfE&callback=updateMap"></script>

</body>

</html>