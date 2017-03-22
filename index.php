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
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4><i class="material-icons icon_purple" style="font-size:28px;vertical-align:middle;">event_note</i>&nbsp;&nbsp;Upcoming events</h4>
                <hr>
                <!--                THE EVENT BOX START -->
                <div class="event-box">
                    <div class="innertop" style="background-image:url('img/building.jpg');background-size:100%;">
                        <span style="font-size:28px;color:white;" class="textstroke">Orgy event</span>
                    </div>
                    <div class="innerbottom">
                        <div class="col-xs-12 col-sm-6">
                            <span style="overflow: hidden;text-overflow: ellipsis;">Dette er en beskrivelse af en event som jeg har lavet. Nu vil jeg danse under månens lyyyyyyyyys om natten. Hvis denne beskrivelse ikke er god nok til dig.
                                Så tag noget heroin og dø som den junkie du eeeeeer.ssssssss ssssssssssssssssss ssssssssssss</span>
                        </div>
                        <div class="col-xs-12 col-sm-6" >
                            <i class="fa fa-clock-o icon_time" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventTime">18:00</span><br>
                            <i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">Nørregade 22, 1450 København K.</span><br>
                            <i class="fa fa-user icon_peep" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventSignedUp">20 / 24</span>
                            <br><br><br><br>
                            <div style="float:right;">
                                <button type="button" class="btn-sm btn-success"><i class="fa fa-share-alt-square" style="font-size:18px;"></i></button>
                                <button type="button" class="btn-sm btn-warning"><i class="fa fa-paw" style="font-size:18px;"></i></button>
                                <button type="button" class="btn-sm btn-primary"><span style="font-size:14px;">View</span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--                THE EVENT BOX END -->
                <br>
                <a href="" style="float:right;font-size:14px;">View all</a>

                <h4><i class="material-icons icon_peep" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;My groups</h4>
                <hr>
                <!--            GROUP CIRCLE ThING START-->
                <div class="group-circle" style="background-image: url('img/howlout_icon.png');background-size:100%;">

                </div>
                <br>
                <a href="" style="float:right;font-size:14px;">View all</a>
                <!--             GROUP CIRLCE THING END -->
                <h4><i class="material-icons icon_blue" style="font-size:28px;vertical-align:middle;">pageview</i>&nbsp;&nbsp;Suggested events</h4>
                <hr>
                <!--            BUNCH OF DEMO SUGGESTED EVENTS FOR SHOW BELOW HERE -->
                <div class="event-box">
                    <div class="innertop" style="background-image:url('img/building.jpg');background-size:100%;">
                        <span style="font-size:28px;color:white;" class="textstroke">Orgy event</span>
                    </div>
                    <div class="innerbottom">
                        <div class="col-xs-12 col-sm-6">
                            <span style="overflow: hidden;text-overflow: ellipsis;">Dette er en beskrivelse af en event som jeg har lavet. Nu vil jeg danse under månens lyyyyyyyyys om natten. Hvis denne beskrivelse ikke er god nok til dig.
                                Så tag noget heroin og dø som den junkie du eeeeeer.ssssssss ssssssssssssssssss ssssssssssss</span>
                        </div>
                        <div class="col-xs-12 col-sm-6" >
                            <i class="fa fa-clock-o icon_time" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventTime">18:00</span><br>
                            <i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">Nørregade 22, 1450 København K.</span><br>
                            <i class="fa fa-user icon_peep" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventSignedUp">20 / 24</span>
                            <br><br><br><br>
                            <div style="float:right;">
                                <button type="button" class="btn-sm btn-success"><i class="fa fa-share-alt-square" style="font-size:18px;"></i></button>
                                <button type="button" class="btn-sm btn-warning"><i class="fa fa-paw" style="font-size:18px;"></i></button>
                                <button type="button" class="btn-sm btn-primary"><span style="font-size:14px;">View</span></button>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="event-box">
                    <div class="innertop" style="background-image:url('img/building.jpg');background-size:100%;">
                        <span style="font-size:28px;color:white;" class="textstroke">Orgy event</span>
                    </div>
                    <div class="innerbottom">
                        <div class="col-xs-12 col-sm-6">
                            <span style="overflow: hidden;text-overflow: ellipsis;">Dette er en beskrivelse af en event som jeg har lavet. Nu vil jeg danse under månens lyyyyyyyyys om natten. Hvis denne beskrivelse ikke er god nok til dig.
                                Så tag noget heroin og dø som den junkie du eeeeeer.ssssssss ssssssssssssssssss ssssssssssss</span>
                        </div>
                        <div class="col-xs-12 col-sm-6" >
                            <i class="fa fa-clock-o icon_time" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventTime">18:00</span><br>
                            <i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">Nørregade 22, 1450 København K.</span><br>
                            <i class="fa fa-user icon_peep" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventSignedUp">20 / 24</span>
                            <br><br><br><br>
                            <div style="float:right;">
                                <button type="button" class="btn-sm btn-success"><i class="fa fa-share-alt-square" style="font-size:18px;"></i></button>
                                <button type="button" class="btn-sm btn-warning"><i class="fa fa-paw" style="font-size:18px;"></i></button>
                                <button type="button" class="btn-sm btn-primary"><span style="font-size:14px;">View</span></button>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="event-box">
                    <div class="innertop" style="background-image:url('img/building.jpg');background-size:100%;">
                        <span style="font-size:28px;color:white;" class="textstroke">Orgy event</span>
                    </div>
                    <div class="innerbottom">
                        <div class="col-xs-12 col-sm-6">
                            <span style="overflow: hidden;text-overflow: ellipsis;">Dette er en beskrivelse af en event som jeg har lavet. Nu vil jeg danse under månens lyyyyyyyyys om natten. Hvis denne beskrivelse ikke er god nok til dig.
                                Så tag noget heroin og dø som den junkie du eeeeeer.ssssssss ssssssssssssssssss ssssssssssss</span>
                        </div>
                        <div class="col-xs-12 col-sm-6" >
                            <i class="fa fa-clock-o icon_time" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventTime">18:00</span><br>
                            <i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">Nørregade 22, 1450 København K.</span><br>
                            <i class="fa fa-user icon_peep" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventSignedUp">20 / 24</span>
                            <br><br><br><br>
                            <div style="float:right;">
                                <button type="button" class="btn-sm btn-success"><i class="fa fa-share-alt-square" style="font-size:18px;"></i></button>
                                <button type="button" class="btn-sm btn-warning"><i class="fa fa-paw" style="font-size:18px;"></i></button>
                                <button type="button" class="btn-sm btn-primary"><span style="font-size:14px;">View</span></button>
                            </div>
                        </div>
                    </div>
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
    var apiLink = 'https://api.howlout.net/event/eventsFromProfileIds?joined=true&CurrentTime=2017-02-27T13:30:00.84&profileIds=10153817903667221';
    var apiData = JSON.stringify({id:1});

    $.ajax({
        type: 'post',
        url: '_apiRequest.php',
        async: false,
        data: {'apiLink' : apiLink, 'apiData' : apiData},
        success: function (data) {
            for (var i=0; i<data.length; i++) {

            }
        },
        error: function () {
            alert("ajax failed");
        }
    });
</script>

</body>

</html>
