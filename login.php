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

</head>

<body>

<?php include_once "_inserttoken.php"; ?>
<!-- Main Content -->

<div class="container hidden-xs hidden-sm" style="padding-top: 200px;">

    <div class="row">
       <div class="col-md-offset-2 col-md-8 login-box">
           <img class="" src="img/howlout_icon_with_border.png" style="cursor:pointer;width:150px;" ><span class="top-menu-headertext">Howlout</span>
            <span style="margin-left:50px;font-size:20px;">Welcome, please log in below.</span>
           <br><br><br>
           <div class="input-group">
               <span class="input-group-addon" id="title-input"><i class="fa fa-user " aria-hidden="true"style="font-size:20px;vertical-align:middle;color:green;"></i></span>
               <input type="text" class="form-control cg-desc" placeholder="Input username" aria-describedby="title-input">
           </div><br>
           <div class="input-group">
               <span class="input-group-addon" id="title-input"><i class="fa fa-lock icon_yellow" aria-hidden="true"style="font-size:20px;vertical-align:middle;"></i></span>
               <input type="text" class="form-control cg-desc" placeholder="Input password" aria-describedby="title-input">
           </div><br><img class="" src="img/facebook-icon01.png" style="cursor:pointer;width:50px;" >
           <button class="btn btn-default" style="float:right;">Log in</button>
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="js/leftmenu.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Theme JavaScript -->
<script src="scripts/clean-blog.min.js"></script>

<script>
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
                    var facebookId = response.id;
                    var facebookName = response.name;
                    var apiLink = 'https://api.howlout.net/profile?create=true';
                    var apiData = JSON.stringify(
                        {
                            "ProfileId": facebookId,
                            "Name": facebookName,
                            "ImageSource": "https://graph.facebook.com/v2.5/191571161232364/picture?height=100&width=100",
                            "SmallImageSource": "https://graph.facebook.com/v2.5/191571161232364/picture?height=500&width=50",
                            "LargeImageSource": "https://graph.facebook.com/v2.5/191571161232364/picture?height=300&width=300",
                            "Description":"Test Description",
                            "Age": 0
                        }
                    );
                    var token = $(".token").data("token");
                    $.ajax({
                        type: 'post',
                        url: '_apiRequestProfile.php',
                        async: false,
                        data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token},
                        success: function (data) {
                            var jsonData = JSON.parse(data);
                            console.log(data);

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