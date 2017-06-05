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
    <link href="css/jquery-confirm.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=QuestriaL" rel="stylesheet">

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
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 eventContainer" style="border: solid 0px black; height:100%; padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <div class="loader"></div>
                <h4><i class="material-icons leftmenuitem icon_darkpurple">event_available</i>&nbsp;&nbsp;Event manager</h4>
                <hr>

                </div>
                <!--      THE EVENT EDIT BOX END -->

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
    <script src="js/jquery-confirm.js"></script>
    <script>
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

                    var apiLink = '/event/eventsFromProfileIds?joined=true&CurrentTime='+getFormattedDateTime()+'&profileIds='+facebookId;
                    var token = $(".token").data("token");
                    runAjax(apiLink, token).done(function(data) {
                        var jsonData = JSON.parse(data);
                        if (jsonData.length<1) {
                            $(".eventContainer").append('<h5 style="font-style:italic;margin-left:20px;">No events found</h5>');
                        } else {
                            $.each(jsonData, function(i,ele) {
                                $(".eventContainer").append(makeEditEventElement(ele) + "<br>");
                            });
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

        $("body").on("click", ".btn-editevent", function() {
            var eventIdClicked = $(this).parent().data("eventid");
            window.location = "editevent.php?id="+eventIdClicked;
        });

        $("body").on("click", ".btn-duplicateevent", function() {
            var eventIdClicked = $(this).parent().data("eventid");
            alert("DUPLICATE!");
        });

		$("body").on("click", ".btn-deleteevent", function() {
            var eventIdClicked = $(this).parent().data("eventid");
            var eventTitle = $(this).parent().data("eventtitle");
            var thisBox = $(this).parent().parent().parent().parent();
            $.confirm({
                title: 'Delete "' + eventTitle + '"',
                content: 'Are you sure you wish to delete this event?',
                animation: 'zoom',
                closeAnimation: 'zoom',
                // animationBounce: 3.5, // default is 1.2 whereas 1 is no bounce.
                type: "red",
                typeAnimated: true,
                buttons: {
                    yes: {
                        text: 'Yes',
                        action: function() {
                            var apiLink = "/event/"+eventIdClicked;
                            var token = $(".token").data("token");
                            runAjaxDeleteEvent(apiLink, token).done(function(data) {    
                                if (data) {
                                    thisBox.remove();
                                    $.alert('Event deleted');
                                } else {
                                    console.log("ERROR: " + data);
                                    // alert('An unexpected error occurred!');
                                }
                            });                            
                        }
                    },
                    no: {
                        text: "No"
                    }
                }
            });
        });

        $("body").on("click", ".btn-viewevent", function() {
            var eventIdClicked = $(this).parent().data("eventid");
            window.location = "viewevent.php?id="+eventIdClicked;
        });

        // Gets the date and time in the format the api needs it in.
        function getFormattedDateTime() {
            return new Date().toISOString().substr(0, 19);
        }

    </script>

</body>

</html>
