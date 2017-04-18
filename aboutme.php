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
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:20px 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4><i class="material-icons icon_blue" aria-hidden="true" style="font-size:26px;vertical-align:middle;">account_circle</i>&nbsp;&nbsp;About me</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin:0 30px 0 30px;height:200px;width:200px;border-radius:200px;"></div>
                        <input type="file" style="margin:0 0 0 30px;display:none;" class="fileChangePicture">
                    </div>
                    <div class="col-md-6">
                        <h4 style="margin-top:25%;"><?php echo $_SESSION['name']; ?></h4>
                        <a class="btnChangePicture" style="margin-top:200px;cursor:pointer;">Change picture</a>
                    </div>
                </div>

                <br><br>
                <h4><i class="material-icons icon_green" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;My friends</h4>
                <hr>
                <div class="row">
                    <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin:0 30px 0 30px;"></div>
                    <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin:0 30px 0 30px;"></div>
                    <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin:0 30px 0 30px;"></div>
                    <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin:0 30px 0 30px;"></div>
                    <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin:0 30px 0 30px;"></div>
                </div>

                <br>
                <a href="" style="float:right;font-size:14px;">View all</a>

                <h4 style="margin-top:50px;"><i class="material-icons icon_peep" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;My groups</h4>
                <hr>
                <div class="groupBox">

                </div>


                <br>
                <a href="mygroups.php" style="float:right;font-size:14px;">View all</a>
                <!--      PAGE CONTENT GOES HERE      -->
            </div>
        </div>

    </div>

    <!-- MOBILE WARNING BOX -->
    <?php include_once "p_mobilewarning.html"; ?>

    <!-- FOOTER -->
    <?php include_once "p_footer.html"; ?>

    <?php include_once "p_loadScripts.html"; ?>
    <script src="js/grouphandler.js"></script>
    <script>
        $(".btnChangePicture").click(function() {
            $(".fileChangePicture").click();
        });

        // Get groups
        var facebookId = "";
        window.fbAsyncInit = function() {
            // facebook functions in here
            FB.init({
                appId      : '1897963557117405',
                xfbml      : true,
                version    : 'v2.8'
            });
            FB.AppEvents.logPageView();


            // Get groups
            FB.getLoginStatus(function(response) {
                FB.api('/me', function(response)
                {
                    facebookId = response.id;
                    var apiLink2 = 'https://api.howlout.net/profile/'+facebookId;
                    var apiData = JSON.stringify(
                        {
                            ProfileId : facebookId
                        }
                    );
                    var token = $(".token").data("token");
                    $.ajax({
                        type: 'post',
                        url: '_apiRequest.php',
                        async: false,
                        data: {'apiLink' : apiLink2, 'apiData' : apiData, 'token' : token},
                        success: function (data) {
                            var jsonData = JSON.parse(data);
                            console.log(data);
                            var counter = 1;
                            $.each(jsonData.Groups, function(i,ele) {
                                console.log(ele);
                                if (counter<=6) {
                                    $(".groupBox").append(makeGroupElement(ele));
                                    counter++
                                }
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
    </script>
</body>

</html>
