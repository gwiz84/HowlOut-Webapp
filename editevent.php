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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="css/timepicker.css" rel="stylesheet">
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
    <script>
        var chosenStart = "";
        var chosenEnd = "";

        var dateToday = new Date();
        $(function() {

            $(".datepicker").datetimepicker({
                dateFormat: 'yy-mm-dd',
                minDate: dateToday,
                minute: 0,
                second: 0,
                stepMinute: 15
            });

            $(".datepicker").on("change",function(e){
                chosenStart = $(this).val();
                chosenStart = chosenStart.replace("/", "-");
                chosenStart = chosenStart.replace("/", "-");
                chosenStart = chosenStart.replace(" ","T")
                chosenStart += ":00.00";

            });

            $(".datepicker2").datetimepicker({
                dateFormat: 'yy-mm-dd',
                minDate: dateToday,
                minute: 0,
                second: 0,
                stepMinute: 15
            });

            $(".datepicker2").on("change",function(e){
                chosenEnd = $(this).val();
                chosenEnd = chosenEnd.replace("/", "-");
                chosenEnd = chosenEnd.replace("/", "-");
                chosenEnd = chosenEnd.replace(" ","T")
                chosenEnd += ":00.00";

            });
        } );
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
    }
    ?>
    <!-- Main Content -->
    <div class="hidden-xs hidden-sm top-menu-container">
        <div class="container" style="padding: 0;">
            <?php include_once "p_topmenu.php"; ?>
        </div>
    </div>
    <div class="fbid" data-fbid="<?php echo $_SESSION['facebookId'] ?>" style="display:none;"></div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 100px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4 style="position:relative;" class=""><i class="material-icons leftmenuitem icon_purple">event_note</i><?php echo $titleaction ?> event</h4><hr>
                <img src="img/building.jpg" class="img-responsive" style="width:100%;height:200px;margin-bottom:5px;position:relative;"><br>
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
                <input type="text" class="datepicker form-control ho-textinput inputStart" style="width:40%;" placeholder="Choose a start date and time" readonly><br>
                <i class="material-icons icon_red">date_range</i> <span style="vertical-align: 30%;">Event end</span>
                <input type="text" class="datepicker2 form-control ho-textinput inputEnd" style="width:40%;" placeholder="Choose an end date and time"readonly>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class="fa fa-map-marker icon_red" aria-hidden="true"style="font-size:20px;vertical-align:middle;"></i></span>
                    <input type="text" class="form-control ho-textinput inputLocation" placeholder="Location" aria-describedby="title-input" style="z-index:1;" >
                </div>
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
    <script src="js/leftmenu.js"></script>
    <script src="js/topmenu.js"></script>
    <script src="js/searchbar.js"></script>
    <script src="js/eventhandler.js"></script>

    <script>
        var token = $(".token").data("token");

        $(function() {
            $(".inputLocation").dawaautocomplete({
                select: function(event, data) {
                    $('.inputLocation').text(data.tekst);
                }
            });
        });

        if ($(".editid").data("editid") != null) {
            var editid = $(".editid").data("editid");
            var apiLink = "https://api.howlout.net/event/event?id="+editid;
            var token = $(".token").data("token");
            $.ajax({
                type: "post",
                url: "_apiRequest.php",
                async: false,
                data: {'apiLink' : apiLink, 'token' : token},
                success: function (data) {
                    var jsonData = JSON.parse(data);
                    var startDate = convertDateString(jsonData.StartDate);
                    var endDate = convertDateString(jsonData.EndDate);
                    chosenStart = startDate;
                    chosenEnd = endDate;
                    $(".inputTitle").val(jsonData.Title);
                    $(".inputDescription").val(jsonData.Description);
                    if (jsonData.Visibility == 0) {
                        $(".radioPublic").prop("checked", true);
                    }
                    $(".inputStart").val(startDate);
                    $(".inputEnd").val(endDate);
                    $(".inputLocation").val(jsonData.AddressName);
                    $(".inputAttendees").val(jsonData.MaxSize);
                },
                error: function (data) {
                    alert(data);
                    // alert("ajax failed");
                }
            });
        }

        function convertDateString(date) {
            convertedDate = date.replace("T", " ").substr(0, 16);
            return convertedDate;
        }

        $(".inputAttendees").keyup(function() {
            var attendees = $(".inputAttendees").val();
            if (attendees > 1000) {
                $(".inputAttendees").val(1000);
            } else if (attendees.length > 0 && attendees <= 0) {
                $(".inputAttendees").val(1);
            }
        });

        $(".btnCreate").click(function() {
            var eventId = ($(".editid").data("editid") != null) ? parseInt($(".editid").data("editid")) : 0;
            var title = $(".inputTitle").val();
            var description = $(".inputDescription").val();
            var address = $(".inputLocation").val();
            var startDate = chosenStart;
            var endDate = chosenEnd;
            var maxSize = $(".inputAttendees").val();
            var isPrivate = ($(".radioPrivate").is(":checked")) ? 1 : 0;
            var profileId = $(".fbid").data("fbid");
            var apiLink = "https://api.howlout.net/event";
            var apiData = JSON.stringify({
                "EventId": eventId,
                "ProfileOwners": [
                {
                    "ProfileId": profileId
                }
                ],
                "ImageSource": "img/building.jpg",
                "Title": title,
                "Latitude": 55.628435,
                "Longitude": 12.578776,
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
            var token = $(".token").data("token");

            $.ajax({
                type: "post",
                url: "_apiRequestJSON.php",
                async: false,
                data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token},
                success: function (data) {
                    var id = JSON.parse(data).EventId;
                    window.location = "viewevent.php?id="+id;
                },
                error: function () {
                    alert("An unexpected error occurred. Please try again later.");
                }
            });
        });

    </script>

</body>

</html>