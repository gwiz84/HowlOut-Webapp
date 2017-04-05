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
    <title>HowlOut - Secret Admin Page!</title>

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
    <div class="fbid" data-fbid="<?php echo $_SESSION['facebookId'] ?>" style="display:none;"></div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 100px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h2>Secret admin page!</h2>
                <hr>
                <h4>Join/leave event as owner</h4>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class="fa fa-map-marker icon_red" aria-hidden="true" style="font-size:20px;vertical-align:middle;"></i></span>
                    <input id="inputEventId" type="text" class="form-control ho-textinput" placeholder="Event ID" aria-describedby="title-input" style="z-index:1;">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class=" fa fa-user icon_peep icon_yellow" aria-hidden="true" style="font-size:20px;vertical-align:middle;"></i></span>
                    <input id="inputProfileId" type="text" class="form-control ho-textinput" placeholder="Profile ID" aria-describedby="title-input">
                </div>
                <br>
                <button id="btnUseMyId" class="btn btn-warning" style="float:left;">Use my ID</button>&nbsp;&nbsp;
                <button id="btnClear" class="btn btn-danger btn-sm">Clear fields</button>
                <label class="radio-inline active"><input type="radio" name="event-visib" checked="checked" class="radioJoin">Join</label>
                <label class="radio-inline"><input type="radio" name="event-visib" class="radioLeave">Leave</label>
                <button id="btnMakeOwner" class="btn btn-success" style="float:right;">Execute!</button>
                <br>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class="fa fa-info icon_blue" aria-hidden="true" style="font-size:20px;vertical-align:middle;"></i></span>
                    <input id="message" type="text" class="form-control ho-textinput" placeholder="System message" aria-describedby="title-input" style="z-index:1;">
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
    <script>
        $("#btnUseMyId").click(function() {
            var facebookId = $(".fbid").data("fbid");
            $("#inputProfileId").val(facebookId);
        });

        $("#btnClear").click(function() {
            $("#inputEventId").val("");
            $("#inputProfileId").val("");
        });

        $("#btnMakeOwner").click(function() {
            var eventId = $("#inputEventId").val();
            var profileId = $("#inputProfileId").val();
            var type = 1;
            if ($(".radioLeave").is(":checked")) {
                type = 2;
            }
            if ($.isNumeric(eventId) && $.isNumeric(profileId)) {
                var apiLink = "https://api.howlout.net/event/AcceptDeclineLeaveEventAsOwner?eventId=" + eventId + "&handlingType=" + type;
                var apiData = JSON.stringify({
                    eventId: eventId,
                    handlingType: type,
                });
                var token = $(".token").data("token");
                $.ajax({
                    type: 'post',
                    url: '_apiRequestPut.php',
                    async: false,
                    data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token},
                    success: function (data) {
                        $("#message").val(data);
                        console.log(data);
                },
                error: function () {
                    alert("ajax failed");
                }
            }); 
            }
            
        });

    </script>


</body>

</html>