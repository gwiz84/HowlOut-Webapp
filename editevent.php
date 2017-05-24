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
    <title>HowlOut</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="css/timepicker.css" rel="stylesheet">
    <link href="css/croppie.css" rel="stylesheet">
    <link href="css/jquery-confirm.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Nunito+Sans|Questrial" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/timepicker.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/jquery-confirm.js"></script>
    <script>
        var chosenStart = "";
        var chosenEnd = "";

        var dateToday = new Date();
        $(function() {
            var firstPick = true;
            $(".datepicker").datetimepicker({
                dateFormat: 'yy-mm-dd',
                minDate: dateToday,
                minute: 0,
                second: 0,
                stepMinute: 15,
                onSelect: function(dateStr)
                {
                    chosenStart = $(this).val();
                    chosenStart = chosenStart.replace("/", "-");
                    chosenStart = chosenStart.replace("/", "-");
                    chosenStart = chosenStart.replace(" ","T")
                    chosenStart += ":00.00";
                    var newMinDate = new Date(Date.parse(chosenStart));
                    if (firstPick) {
                        $(".datepicker2").datetimepicker({
                            dateFormat: 'yy-mm-dd',
                            minDate: newMinDate,
                            minute: 0,
                            second: 0,
                            stepMinute: 15,
                            onSelect: function(dateStr)
                            {
                                chosenEnd = $(this).val();
                                chosenEnd = chosenEnd.replace("/", "-");
                                chosenEnd = chosenEnd.replace("/", "-");
                                chosenEnd = chosenEnd.replace(" ","T")
                                chosenEnd += ":00.00";
                            }
                        });
                        firstPick = false;
                    } else {
                        $('.datepicker2').datepicker('option', 'minDate', newMinDate);
                    }
                }
            });
        });
</script>
</head>

<body>
    <?php include_once "_inserttoken.php"; ?>
    <?php include_once "_loginCheck.php"; ?>
    <?php
    $titleaction = "Create";
    $buttonaction = "Create";
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $titleaction = "Edit";
        $buttonaction = "Update";
        echo '<div class="editid" style="display:none;" data-editid="'.$_GET['id'].'"></div>';
    } else if (isset($_GET['groupid'])) {
        echo '<div class="groupid" style="display:none;" data-groupid="'.$_GET['groupid'].'"></div>';
    }
    ?>
    <!-- Main Content -->
    <div class="hidden-xs hidden-sm top-menu-container">
        <div class="container" style="padding: 0;">
            <?php include_once "p_topmenu.php"; ?>
        </div>
    </div>
    <div class="fbid" data-fbid="<?php echo $_SESSION['facebookId'] ?>" style="display:none;"></div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 120px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4 style="position:relative;" class=""><i class="fa fa-calendar-plus-o icon_darkgreen" aria-hidden="true" style="font-size:26px;"></i><span style="font-size:26px; margin-left:9px;"><?php echo $titleaction . ' event';
                    if (isset($_GET['groupid'])) {
                         echo " - for group";
                    }
                    ?>
                    </h4>
                    <hr>
                <h4><i class="material-icons icon_blue" aria-hidden="true" style="font-size:26px;vertical-align:middle;">info_outline</i>&nbsp;&nbsp;Help</h4>
                Creating an event allows you to either host it is a public or private type, depending on your needs. If you are hosting an event you want everyone to be able to find, chose the public type. If you are organizing a private event and want to invite specific members only, choose the private type.
                <br>
                <h4><i class="material-icons icon_green" aria-hidden="true" style="font-size:26px;vertical-align:middle;">image</i>&nbsp;&nbsp;Image</h4>
                <div id="bannerContainer" style="width:740px;height:300px;">
                    <span id="bannerOverlay" class="bannerOverlay">
                        <div id="selectImageBtn" class="btn btn-showmodal">Choose banner image</div>
                    </span>
                    <img id="bannerImg" class="image img-banner">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class="material-icons icon_yellow" aria-hidden="true"style="font-size:20px;vertical-align:middle;">add</i></span>
                    <input type="text" class="form-control ho-textinput inputTitle" placeholder="Event title" aria-describedby="title-input" style="z-index:1;">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class="material-icons icon_blue" aria-hidden="true"style="font-size:20px;vertical-align:middle;">note</i></span>
                    <textarea type="text" class="form-control ho-textinput inputDescription" placeholder="Event description" aria-describedby="title-input" style="z-index:1;"></textarea>
                </div>
                <hr>
                <h4>Choose event duration</h4>

                <i class="material-icons icon_green">date_range</i> <span style="vertical-align: 30%;">Event start</span>
                <input type="text" class="datepicker form-control ho-textinput inputStart" style="width:40%;z-index:40;" placeholder="Choose a start date and time" readonly><br>
                <i class="material-icons icon_red">date_range</i> <span style="vertical-align: 30%;">Event end</span>
                <input type="text" class="datepicker2 form-control ho-textinput inputEnd" style="width:40%;" placeholder="Choose an end date and time"readonly>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class="fa fa-map-marker icon_red" aria-hidden="true"style="font-size:20px;vertical-align:middle;"></i></span>
                    <input id="address" type="text" class="form-control ho-textinput inputLocation" placeholder="Location" aria-describedby="title-input" style="z-index:1;" >
                </div>
                <br>
                <div id="map" style="height: 400px;"></div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class=" fa fa-user icon_peep icon_yellow" aria-hidden="true" style="font-size:20px;vertical-align:middle;"></i></span>
                    <input type="number" class="form-control ho-textinput inputAttendees" placeholder="Maximum allowed number of attendees" aria-describedby="title-input" min="1" max="1000" style="z-index:1;">
                </div>

                <br>
                <h4><i class="fa fa-eye icon_loc"></i>&nbsp;&nbsp;Visibility</h4>

                <label class="radio-inline active radioPrivate"><input type="radio" name="event-visib" checked="checked" class="radioPrivate">Private</label>
                <label class="radio-inline"><input type="radio" name="event-visib" class="radioPublic">Public</label>

                <br><br><br>
                <button id="btn-creategroup" class="btn btn-ho btnCreate" style="float:right;"><?php echo $buttonaction ?> event</button>

            </div>
        </div>

    </div>

    <!-- MOBILE WARNING BOX -->
    <?php include_once "p_mobilewarning.html"; ?>

    <!-- FOOTER -->
    <?php include_once "p_footer.html"; ?>

    <script src="js/dawa-autocomplete.js"></script>
    <script src="js/topmenu.js"></script>
    <script src="js/searchbar.js"></script>
    <script src="js/ajaxhandler.js"></script>
    <script src="js/eventhandler.js"></script>
    <script src="js/imagehandler.js"></script>
    <script src="js/croppie.min.js"></script>

    <script>
        var token = $(".token").data("token");
        var map;
        var geocoder;
        var markersArray = [];
        var eventLat = 55.675637;
        var eventLng = 12.569544;
        var addressSelected = false;
        var orgImageS = "";
        var orgImageM = "";
        var orgImageL = "";
        var imageCropped = null;

        // Activates the DAWA autocomplete feature on the ".inputLocation" field.
        $(function() {
            $(".inputLocation").dawaautocomplete({
                select: function(event, data) {
                    $('.inputLocation').text(data.tekst);
                    geocodeAddress(geocoder, map);
                    addressSelected = true;
                },
            });
        });

        // Initializes the map display, centered on Rådhuspladsen in Copenhagen by default.
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: eventLat, lng: eventLng },
                mapTypeControl: false,
                zoom: 12,
            });
            geocoder = new google.maps.Geocoder();
            if (addressSelected) {
                geocodeAddress(geocoder, map);
            }
        }
        
        // "Translates" the selected address into latitude and longitude using Google's geocoding functions
        // Centers the map on the location provided, and stores the latitude and longitude values in the
        // 'eventLat' and 'eventLng' variables for later use.
        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    clearMarkers();
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                    markersArray.push(marker);
                    eventLat = results[0].geometry.location.lat();
                    eventLng = results[0].geometry.location.lng();
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        // Deletes all markers in the array by removing references to them.
        function clearMarkers() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }
        }

        // If the 'editid' data variable is set on the ".editid" div, an event id has been passed
        // using the "?id=" GET parameter. Try getting the event from the API. If no event is found with
        // the provided id, return to index.php.
        // When the event has been loaded, check if the currently logged in user is one of the owners of the event,
        // i.e. has the right to edit it at all. Otherwise, return to index.php.
        if ($(".editid").data("editid") != null) {
            addressSelected = true;
            var editid = $(".editid").data("editid");
            var apiLink = "/event/?id="+editid;
            runAjax(apiLink, token).done(function(data) {
                var jsonData = JSON.parse(data);
                var fbid = $(".fbid").data("fbid");
                var ownersArray = jsonData.ProfileOwners;
                var isOwner = false;
                $.each(ownersArray, function(i, ele) {
                    if (fbid == ele.Id) {
                        isOwner = true;
                    }
                });
                if (!isOwner) {
                    window.location = "index.php";
                } else {
                    var startDate = convertDateString(jsonData.StartDate);
                    var endDate = convertDateString(jsonData.EndDate);
                    chosenStart = startDate;
                    chosenEnd = endDate;
                    orgImageS = jsonData.SmallImageSource;
                    orgImageM = jsonData.ImageSource;
                    orgImageL = jsonData.LargeImageSource;
                    eventLat = jsonData.Latitude;
                    eventLng = jsonData.Longitude;
                    $("#bannerImg").css("background-image", "url('" + orgImageM + "')");
                    $(".inputTitle").val(jsonData.Title);
                    $(".inputDescription").val(jsonData.Description);
                    if (jsonData.Visibility == 0) {
                        $(".radioPublic").prop("checked", true);
                    }
                    $(".inputStart").val(startDate);
                    $(".inputEnd").val(endDate);
                    $(".inputLocation").val(jsonData.AddressName);
                    $(".inputAttendees").val(jsonData.MaxSize);
                    initMap();
                }
            });
        } else {
            $("#bannerImg").css("background-image", "url('img/building.jpg')"); 
        }

        // Converts the date-string 'date' to a format understandable by the datepicker plugin.
        function convertDateString(date) {
            convertedDate = date.replace("T", " ").substr(0, 16);
            return convertedDate;
        }

        // When the user enters number for Maxinum number of attendees, change it if it falls below 1 or above 1000.
        $(".inputAttendees").keyup(function() {
            var attendees = $(".inputAttendees").val();
            if (attendees > 1000) {
                $(".inputAttendees").val(1000);
            } else if (attendees.length > 0 && attendees <= 0) {
                $(".inputAttendees").val(1);
            }
        });

        // Clicking on the "Create event"/"Update event" button first checks if a new image has been selected (imageCropped != null)
        // If a new image has been selected, upload it to the server using the 'uploadImage' function (imagehandler.js). When the upload
        // has finished, put the returned URL to the picture in the variable imgSrc and then run the 'saveEvent' function, saving or
        // updating the event.
        $(".btnCreate").click(function() {
            // $(this).prop("disabled", "disabled");
            var eventId = ($(".editid").data("editid") != null) ? parseInt($(".editid").data("editid")) : 0;
            var fbid = $(".fbid").data("fbid");
            var imgSrcS = (eventId != null) ? orgImageS : "img/building.jpg";
            var imgSrcM = (eventId != null) ? orgImageM : "img/building.jpg";
            var imgSrcL = (eventId != null) ? orgImageL : "img/building.jpg";
            var newImage = "";
            if (imageCropped != null) {
                uploadImage(imageCropped, fbid).done(function (data) {
                    data = JSON.parse(data);
                    if (data.status == "OK") {
                        imgSrcS = data.imgPath_s;
                        imgSrcM = data.imgPath_m;
                        imgSrcL = data.imgPath_l;
                        saveEvent(eventId, imgSrcS, imgSrcM, imgSrcL);
                    } else {
                        $.alert({
                            type: "red",
                            title: "ERROR!",
                            content: data.errormessage
                        });
                    }
                });

            } else {
                saveEvent(eventId, imgSrcS, imgSrcM, imgSrcL);
            }
        });

        // Saves the event. Puts the required data from the inputfields into variables, which are then stored as JSON in 'apiData'
        // Finally, the API calls the backend, sending 'apiData' and getting the ID of the saved event back. Then the user is redirected
        // to the viewevent page using the returned ID.
        function saveEvent(eventId, imgSrcS, imgSrcM, imgSrcL) {
            var title = $(".inputTitle").val();
            var description = $(".inputDescription").val();
            var address = $(".inputLocation").val();
            var startDate = chosenStart;
            var endDate = chosenEnd;
            var maxSize = $(".inputAttendees").val();
            var isPrivate = ($(".radioPrivate").is(":checked")) ? 1 : 0;
            var profileId = $(".fbid").data("fbid");
            var apiLink = "/event";
            var groupId = $(".groupid").data("groupid");
            var apiData;
            if (groupId > 0) {
                apiData = JSON.stringify({
                    "Id": eventId,
                    "GroupOwner": {
                        "Id": groupId
                    },
                    "SmallImageSource": imgSrcS,
                    "ImageSource": imgSrcM,
                    "LargeImageSource": imgSrcL,
                    "Title": title,
                    "Latitude": eventLat,
                    "Longitude": eventLng,
                    "AddressName": address,
                    "Description": description,
                    "StartDate": startDate,
                    "EndDate": endDate,
                    "EventTypes": [
                    0
                    ],
                    "MinAge": 0,
                    "MaxAge": 200,
                    "MinSize": 1,
                    "MaxSize": maxSize,
                    "Visibility": isPrivate
                });
            } else {
                apiData = JSON.stringify({
                    "Id": eventId,
                    "ProfileOwners": [
                    {
                        "Id": profileId
                    }
                    ],
                    "SmallImageSource": imgSrcS,
                    "ImageSource": imgSrcM,
                    "LargeImageSource": imgSrcL,
                    "Title": title,
                    "Latitude": eventLat,
                    "Longitude": eventLng,
                    "AddressName": address,
                    "Description": description,
                    "StartDate": startDate,
                    "EndDate": endDate,
                    "EventTypes": [
                    0
                    ],
                    "MinAge": 0,
                    "MaxAge": 200,
                    "MinSize": 1,
                    "MaxSize": maxSize,
                    "Visibility": isPrivate
                });
            }
            runAjaxJSON(apiLink, apiData, token).done(function(data) {
                var id = JSON.parse(data).Id;
                window.location = "viewevent.php?id="+id;
            });
        }

        // When the user clicks the "Choose banner image" button, the picture upload modal is displayed using the 'createUploadModal'
        // function (imagehandler.js) and passing the ID of the div where the returned cropped image should be displayed.
        $("#selectImageBtn").click(function() {
            createUploadModal($("#bannerImg"));
        });

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfCFzcx7k1DMkf_GCasNXbVtGA6-QtSfE&callback=initMap"></script>

</body>

</html>