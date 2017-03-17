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
    <title>HowlOut - my events</title>

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
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container eventContainer" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4><i class="material-icons icon_purple" style="font-size:28px;vertical-align:middle;">event_note</i>&nbsp;&nbsp;My events</h4>
                <hr>
                <!--                THE EVENT BOX START -->


                <!--                THE EVENT BOX END -->
                <br>
<!--                <a href="" style="float:right;font-size:14px;">View all</a>-->
             
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

    <?php include_once "p_loadScripts.html"; ?>
    <script src="js/eventhandler.js"></script>

    <script>
        var facebookId = "";
        window.fbAsyncInit = function() {
            // facebook functions in here
            FB.init({
                appId      : '1897963557117405',
                xfbml      : true,
                version    : 'v2.8'
            });
            FB.AppEvents.logPageView();

            FB.getLoginStatus(function(response) {
                FB.api('/me', function(response)
                {
                    facebookId = response.id;

                    var apiLink = 'https://api.howlout.net/event/eventsFromProfileIds?joined=true&CurrentTime='+getFormattedDateTime()+'&profileIds='+facebookId;
                    var apiData = JSON.stringify({id:1});
                    var token = $(".token").data("token");
                    $.ajax({
                        type: 'post',
                        url: '_apiRequest.php',
                        async: false,
                        data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token},
                        success: function (data) {
                            var jsonData = JSON.parse(data);
                            $.each(jsonData, function(i,ele) {
                                $(".eventContainer").append(makeEventElement(ele) + "<br>");
                            });
                        },
                        error: function () {
                            alert("ajax failed");
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

        $("body").on("click", ".btn-viewevent", function() {
            var eventIdClicked = $(this).data("eventid");
            window.location = "viewevent.php?id="+eventIdClicked;
        });

        $(".eventpaw").click(function() {
            alert("PAW!");
        });

        // Gets the date and time in the format the api needs it in.
        function getFormattedDateTime() {
            return new Date().toISOString().substr(0, 19);
        }

    </script>
</body>

</html>