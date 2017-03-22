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
    <div class="container hidden-xs hidden-sm" style="padding-top: 100px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:20px 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <img src="img/building.jpg" class="img-responsive image" style="width:100%;height:200px;margin-bottom:5px;">
                <h3 style="margin-top:-70px;margin-left:30px;margin-bottom:30px;padding:10px;" class="txtTitle textstroke">Group name</h3>
                <i class="fa fa-eye icon_loc"></i>&nbsp;&nbsp;<span class="txtVisibility">Private</span>&nbsp;&nbsp;&nbsp;<i class="fa fa-user icon_orange"></i>&nbsp;&nbsp;<span class="txtMemberAmount"></span> members<br><br>
                <h4>About this group</h4>
                <p class="txtDescription"></p>
                <a href="" style="float:right;font-size:14px;">View more</a><br>
                <h4><i class="material-icons icon_purple" style="font-size:28px;vertical-align:middle;">event_note</i>&nbsp;&nbsp;Upcoming events</h4>
                <div class="event-box">
                    <div class="innertop" style="background-image:url('img/building.jpg');background-size:100%;">
                        <span style="font-size:28px;color:white;" class="textstroke">Orgy event</span>
                    </div>

                    <div class="innerbottom">
                        <i class="fa fa-paw btnTrackEvent eventpaw" style="float:right;font-size:42px;cursor:pointer;"></i>
                        <i class="fa fa-clock-o icon_time" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventTime">18:00</span><br>
                        <i class="fa fa-map-marker icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">Nørregade 22, 1450 København K.</span><br>
                        <i class="fa fa-user icon_peep" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventSignedUp">20 / 24</span>
                    </div>
                </div><br>
                <a href="" style="float:right;font-size:14px;">View all</a><br>
                <br>
                <h4><i class="material-icons icon_orange" style="font-size:28px;vertical-align:middle;">group</i>&nbsp;&nbsp;Group members</h4>
                <div class="row memberBox">

                </div>

                <br>
                <a href="" style="float:right;font-size:14px;">View all</a>
                <br>
                <h3 style="text-align:center;">Wall</h3>
                <textarea class="wall-textarea"></textarea>
                <button class="btn-sm btn-success" style="float:right;">Post comment</button>
                <div class="row" style="margin: 50px 0 0 0;">
                    <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin-left:30px;"></div>
                    <div class="col-md-10"><span><i>21-12-2016 posted by EmmaRox</i></span> <p>Is there cheese?</p>  <hr></div>

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

        var apiLink ="https://api.howlout.net/group/<?php echo $eventId; ?>";

        var token = $(".token").data("token");

        $.ajax({
            type: 'post',
            url: '_apiRequest.php',
            async: false,
            data: {'apiLink' : apiLink, 'token' : token},
            success: function (dataraw) {
    //            alert(dataraw);
                var data = JSON.parse(dataraw);
                var isPrivate = (data.Visibility==0) ? "Public" : "Private" ;
                var title = data.Name;
                var desc = data.Description;
                var memberAmount = data.NumberOfMembers;
                var imgSource = data.LargeImageSource;

                $(".image").attr("src", imgSource);
                $(".txtTitle").text(title);
                $(".txtVisibility").text(isPrivate);
                $(".txtMemberAmount").text(memberAmount);
                $(".txtDescription").text(desc);

                $.each(data.Members, function(i, ele) {

                    $(".memberBox").append('' +
                        '<div class=" col-md-2" style="text-align:center;">'+
                        '<img src="'+ele.SmallImageSource+'" class="member-circle"><br>'+
                        '<p class="">'+ele.Name+'</p>'+
                        '</div>');

                });
            },
            error: function () {
                alert("An unexpected error has sadly occurred.");
            }
        });
    </script>
</body>

</html>
