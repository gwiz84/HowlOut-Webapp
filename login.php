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
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Nunito+Sans|Questrial" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
</head>

<body style="background-image:url('img/treeline02.jpg');background-size:cover;background-position:bottom bottom;">
    <?php include_once "_inserttoken.php"; ?>
    <!-- Main Content -->

    <div class="container hidden-xs hidden-sm" style="padding-top: 100px;">

        <div class="row">
           <div class="col-md-offset-2 col-md-8 login-box">
               <img class="" src="img/logo6.png" style="cursor:pointer;width:150px;" ><span class="top-menu-headertext textstroke">Howlout</span>
               <p style="margin-left:50px;font-size:16px;color:white;" class="loggedIn">Welcome, you have been detected as <span class="userName"></span>.<br> Continue with this profile?</p>
               <p style="color:white;margin-left:50px;font-size:16px;" class="loggedOut">Welcome, click the login button and sign in with your facebook profile through the popup.</p>
               <img class="" src="img/facebook-icon01.png" style="cursor:pointer;width:50px;float:right;margin-right:100px;" >
               <button class="btn btn-ho btnLogin" style="margin-right: 20px;float:right;"></button>
           </div>
       </div>

    </div>

    <!-- MOBILE WARNING BOX -->
    <?php include_once "p_mobilewarning.html"; ?>

    <!-- FOOTER -->
    <?php include_once "p_footer.html"; ?>
    <?php include_once "p_loadScripts.html"; ?>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/clean-blog.min.js"></script>
    <script src="js/ajaxhandler.js"></script>

    <script>
    $(".loggedIn").hide();
    $(".btnLogin").html("Log in");
    var accesstoken = "";

    window.fbAsyncInit = function() {
        // facebook functions in here
        FB.init({
            appId      : '651141215029165',
            xfbml      : true,
            version    : 'v2.8'
        });

        FB.AppEvents.logPageView();

        FB.getLoginStatus(function(response) {
            if (response.status == "connected") {
                accesstoken = JSON.stringify(response.authResponse.accessToken);
                $(".loggedIn").show(150);
                FB.api('/me', function(response) {
                   $(".userName").text(response.name);
                });
                $(".btnLogin").html("Continue");
                $(".loggedOut").hide(150);
            } else {
                $(".loggedOut").show(150);
                $(".btnLogin").html("Log in");
            }
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $(".btnLogin").click(function() {
        FB.getLoginStatus(function(response) {

            if (response.status == "connected") {
                accesstoken = response.authResponse.accessToken;
                FB.api('/me', function(response) {
                    var facebookId = response.id;
                    var facebookName = response.name;
                    var apiLink = '/authentication/token?facebookToken='+accesstoken;
                    var token = $(".token").data("token");
                    runAjaxRequestProfile(apiLink, token, facebookName).done(function(data) {
                        if (data == "success") {
                            window.location = "index.php";
                        }
                    });
                });
            } else {
                FB.login(function(response) {
                    if (response.authResponse) {
                        top.location.href = 'index.php';
                    }
                },{
                    scope: 'manage_pages,publish_pages,user_friends',
                        return_scopes: true
                });
            }
        });
    });

</script>

</body>

</html>