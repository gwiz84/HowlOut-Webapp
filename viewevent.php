<?php session_start(); ?>
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

</head>

<body>
    <?php include_once "_inserttoken.php"; ?>
    <!-- Main Content -->
    <div class="hidden-xs hidden-sm" style="background-color: #e9f7ef;position: fixed; width: 100%;z-index: 99;">
        <div class="container" style="border:solid 0px black;height:200px; padding: 0;">
            <?php include_once "p_topmenu.php"; ?>
        </div>
    </div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 200px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container hidden" style="border:solid 0px black;height:100%;padding:20px 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <img src="img/building.jpg" class="img-responsive" style="width:100%;height:200px;margin-bottom:5px;z-index:10;position:relative;">
                <h2 id="eventTitle" style="margin: -60px 0 50px 30px;z-index:13;position:relative;" class="textstroke">Event title</h2>
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
                <br>
                <h4>About this event</h4>
                <p id="eventDescription">No Description</p>
                <a href="" style="float:right;font-size:14px;">View more</a><br>
                <br>
                <div id="map" style="width:100%;height:400px;"></div>

                <br>
                <h4><i class="material-icons icon_peep" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;Attendees</h4>
                <hr>

                <div id="eventAttendees" class="row eventAttendees">
                    No attendees
                </div>
                <br>
                <span id="moreAttendees"><a href="" style="float:right;font-size:14px;">View all</a></span>

                <br><br>

                <h3 style="text-align:center;">Wall</h3>
                <div class="comment-container">
                    <textarea id="commentfield" class="ho-textinput ho-commentinput" maxlength="250"></textarea>
                    <span class="textcounter" id="textcounter"></span>
                </div>

                <button id="btnPostComment" class="btn btn-sm btn-ho disabled" style="float:right;">Post comment</button>
                <div class="row" style="margin: 50px 0 0 0;">
                    <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin-left:30px;"></div>
                    <div class="col-md-10"><span><i>21-12-2016 posted by EmmaRox</i></span> <p>Is there cheese?</p>  <hr></div>
                </div>

                <!--      PAGE CONTENT GOES HERE      -->
            </div>
        </div>

    </div>

    <!-- MOBILE WARNING BOX -->
    <div class="container  hidden-md hidden-lg">
        <div class="row">
            <div class="col-xs-12">
                <h1>
                    Please download the mobile app
                </h1>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <p class="copyright text-muted">Copyright &copy; HowlOut 2017</p>
                </div>
            </div>
        </div>
    </footer>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfCFzcx7k1DMkf_GCasNXbVtGA6-QtSfE&callback=updateMap"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="js/leftmenu.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Theme JavaScript -->
    <script src="scripts/clean-blog.min.js"></script>

    <script>
        var maxCommentLength = 250;
        var comment_length = 0;
        var eventLatitude = 55.675291;
        var eventLongitude = 12.570202;

        $("#textcounter").html(maxCommentLength + " remaining");

        $(function(){
            var apiLink = 'https://api.howlout.net/event/event?id=25';
            var apiData = JSON.stringify({id:1});
            var token = $(".token").data("token");
            $.ajax({
                type: 'post',
                url: '_apiViewEvent.php',
                async: false,
                data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token},
                success: function (data) {
                    $(".main-content-container").removeClass("hidden");
                    var jsonData = JSON.parse(data);
                    var eventDate = new Date(Date.parse(jsonData.StartDate));
                    // alert(data);
                    $("#eventTitle").html(jsonData.Title);
                    $("#eventOwner").html(jsonData.ProfileOwners[0].Name);
                    $("#eventVisibility").html(jsonData.Visibility == 0 ? "Private" : "Public");
                    $("#eventTime").html(getDateFromISOString(eventDate));
                    $("#eventLocation").html(jsonData.AddressName);
                    $("#eventSignedUp").html(jsonData.NumberOfAttendees + ' / ' + jsonData.MaxSize);
                    $("#eventDescription").html(jsonData.Description);
                    eventLatitude = jsonData.Latitude;
                    eventLongitude = jsonData.Longitude;
                    updateMap();
                    updateAttendees(jsonData.Attendees);
                },
                error: function () {
                    alert("ajax failed");
                }
            });
        });

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

        $("#btnPostComment").click(function() {
            if (($("#commentfield").val().length) > 0) {
                alert("POST!");
            }
        });

        function updateAttendees(attArray) {
            if (attArray.length > 0) {
                $("#eventAttendees").html("");

                $.each(attArray, function(i,ele) {
                    $("#eventAttendees").append('<div class="member-circle col-md-1" style="background-image: url('+ele.ImageSource+');background-size:100%;margin:0 30px 0 30px;">');
                });
                $.each(attArray, function(i,ele) {
                    $("#eventAttendees").append('<div class="member-circle col-md-1" style="background-image: url('+ele.ImageSource+');background-size:100%;margin:0 30px 0 30px;">');
                });
                $.each(attArray, function(i,ele) {
                    $("#eventAttendees").append('<div class="member-circle col-md-1" style="background-image: url('+ele.ImageSource+');background-size:100%;margin:0 30px 0 30px;">');
                });
                $.each(attArray, function(i,ele) {
                    $("#eventAttendees").append('<div class="member-circle col-md-1" style="background-image: url('+ele.ImageSource+');background-size:100%;margin:0 30px 0 30px;">');
                });
                $.each(attArray, function(i,ele) {
                    $("#eventAttendees").append('<div class="member-circle col-md-1" style="background-image: url('+ele.ImageSource+');background-size:100%;margin:0 30px 0 30px;">');
                });
            }
        }

        // Gets the date and time in the format the api needs it in.
        function getFormattedDateTime() {
            return new Date().toISOString().substr(0, 19);
        }

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
    

</body>

</html>
