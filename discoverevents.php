<?php
session_start();
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
    <title>HowlOut - discover</title>

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
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <div class="loader"></div>
                <h4><i class="material-icons leftmenuitem icon_blue" style="font-size:26px;vertical-align:middle;" >pageview</i>&nbsp;&nbsp;Discover events</h4>
                <!-- <h4><i class="material-icons icon_yellow" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;Discover events</h4> -->
                <hr>

                <h4><i class="fa fa-map-marker icon_loc" aria-hidden="true" style="font-size:28px;vertical-align:middle;"></i>&nbsp;&nbsp;Your location</h4>
                <div id="map" style="height: 400px;"></div>
                <br>

                <h4><i class="material-icons icon_purple" style="font-size:28px;vertical-align:middle;">event_note</i>&nbsp;&nbsp;Events nearby</h4>
                <div class="eventContainer"></div>
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
        var userPos;
        var map;
        var facebookId = <?php echo $_SESSION['facebookId']; ?>;

        // Initializes the map, sets a default location: Rådhuspladsen.
        // Adds custom control "Center on my location" button to map and then tries to access the user's location using
        // HTML geolocation. If allowed and succesful, stores the user's location in 'userPos', centers the map on this
        // and retrieves nearby events using the function getNearbyEvents
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 55.675291, lng: 12.570202 },
                mapTypeControl: false,
                zoom: 12
            });
            var infoWindow = new google.maps.InfoWindow({map: map});
            var centerControlDiv = document.createElement('div');
            var centerControl = new CenterControl(centerControlDiv, map);

            centerControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT].push(centerControlDiv);

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    userPos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    infoWindow.setPosition(userPos);
                    infoWindow.setContent('You are here');
                    map.setCenter(userPos);
                    getNearbyEvents();
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        // Handler for Google Geolocation errors. From Google.
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
              'Error: The Geolocation service failed.' :
              'Error: Your browser doesn\'t support geolocation.');
        }

        // Function for added the "Center on my location" button to the map
        // Modified from example on https://developers.google.com/maps/documentation/javascript/examples/control-custom
        function CenterControl(controlDiv, map) {
            // Set CSS for the control border.
            var controlUI = document.createElement('div');
            controlUI.style.backgroundColor = '#fff';
            controlUI.style.border = '2px solid #fff';
            controlUI.style.borderRadius = '3px';
            controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
            controlUI.style.cursor = 'pointer';
            controlUI.style.marginBottom = '22px';
            controlUI.style.textAlign = 'center';
            controlUI.title = 'Click to recenter on your location';
            controlDiv.appendChild(controlUI);

            // Set CSS for the control interior.
            var controlText = document.createElement('div');
            controlText.style.color = 'rgb(25,25,25)';
            controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
            controlText.style.fontSize = '14px';
            controlText.style.lineHeight = '25px';
            controlText.style.paddingLeft = '5px';
            controlText.style.paddingRight = '5px';
            controlText.innerHTML = 'Center on my location';
            controlUI.appendChild(controlText);

            // Setup the click event listeners: Center on the users position stored in the variable 'userPos'
            controlUI.addEventListener('click', function() {
                map.setCenter(userPos);
            });
        }

        // Adds a marker to the map 'map' at the specified 'location' with the name 'label'
        function addMarker(location, map, label) {
            var marker = new google.maps.Marker({
                position: location,
                // label: label,
                title: label,
                map: map
            });

            // What to do when an event pin is clicked
            marker.addListener('click', function() {
                // map.setZoom(16);
                map.setCenter(marker.getPosition());
            });
            // Defines which animation to use when placing pins
            marker.setAnimation(google.maps.Animation.DROP);
        }

        // Function to get events close to the users position via the API
        // For each returned event, an eventbox is added to the page, and a marker placed on the map
        function getNearbyEvents() {
            var userLat = userPos.lat;
            var userLng = userPos.lng;
            var today = new Date();
            var isoString = today.toISOString();
            var apiLink = "/event/search?userLat=" + userLat + "&userLong=" + userLng + "&currentTime=" + isoString;
     
            var token = $(".token").data("token");

            runAjax(apiLink, token).done(function(data) {
                var jsonData = JSON.parse(data);
                $.each(jsonData, function(i, ele) {
                    $(".eventContainer").append(makeEventElement(ele) + "<br>");
                    var eventPos = {
                        lat: ele.Latitude,
                        lng: ele.Longitude
                    };
                    addMarker(eventPos, map, ele.Title);
                });
            });
        }

        // Handler for clicking on the "View event" button. Extracts the event ID from the data-attribute "eventid"
        // and takes the user to the relevant page
        $("body").on("click", ".btn-viewevent", function() {
            var eventIdClicked = $(this).parent().parent().parent().parent().data("eventid");
            window.location = "viewevent.php?id="+eventIdClicked;
        });

        // Handler for clicking on "Follow" button, to follow/unfollow an event
        // !!! Button presently disabled on this page !!!
        $("body").on("click", ".btn-followevent", function() {
            var thisButton = $(this);
            var eventId = $(this).parent().parent().parent().parent().data("eventid");
            var apiLink = "/event/joinOrTrack/"+eventId+"/"+facebookId+"?attend=true&join=true";
            var apiData = JSON.stringify({
                // "eventId": eventId,
                // "profileId": facebookId,
                // "attend": false,
                // "join": false
            });
            var token = $(".token").data("token");
            runAjaxPut(apiLink, apiData, token).done(function(data) {
                console.log(data);
                // thisButton.attr("disabled", true);
                // thisButton.css("background-color", "grey");
            });
        });
    
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfCFzcx7k1DMkf_GCasNXbVtGA6-QtSfE&callback=initMap"></script>

</body>

</html>
