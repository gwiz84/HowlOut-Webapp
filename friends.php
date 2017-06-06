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
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <div class="loader"></div>
                <h4><i class="material-icons icon_green" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;My friends <input type="text" class="friendsSearchBar ho-textinput" style="float:right;border-radius:4px;padding:5px;margin-left:10px;font-size:15px;" placeholder="Search in friends"><i class="material-icons" style="color: #000000;vertical-align: middle;float:right;">search</i></h4>

                <hr>
                <div class="friendsBox row">

                </div>
            </div>
        </div>

    </div>

    <!-- MOBILE WARNING BOX -->
    <?php include_once "p_mobilewarning.html"; ?>

    <!-- FOOTER -->
    <?php include_once "p_footer.html"; ?>

    <?php include_once "p_loadScripts.html"; ?>
    <script>

    // Get all friends of the user and show them on the page
    window.fbAsyncInit = function() {
        // facebook functions in here
        FB.init({
            appId      : '651141215029165',
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();


        // Get groups
        FB.getLoginStatus(function(response) {

            FB.api('/me/friends', function(response) {
                var counter = 1;
                $.each(response.data, function(i,ele) {
                    if (counter <= 4) {
                        var name = ele.name;
                        var imgPath = "https://graph.facebook.com/v2.5/" + ele.id + "/picture?height=300&width=300";
                        $(".friendsBox").append('<div class="col-md-3 friendItem" data-name="'+name+'"><div class="member-circle " style="background-image: url(\'' + imgPath + '\');background-size:100%;margin:0 30px 0 30px;"></div><p style="text-align:center;">' + name + '</p></div>');
                    }
                    counter++;
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

    var searchTerms = "";
    var timeoutID = null;

    // Keyup function for friends search bar
    $(".friendsSearchBar").keyup(function() {
        clearTimeout(timeoutID);
        timeoutID = setTimeout(function() {
            searchInFriends();
        }, 600);
    });

    // Search function which searches in all your own friends
    function searchInFriends() {
        var friendsSearchWords = $(".friendsSearchBar").val().toLowerCase();

        $(".friendItem").each(function(i, ele) {
            var stringToSearch = $(this).data("name").toLowerCase();
            if (stringToSearch.indexOf(friendsSearchWords) != -1) {
                $(this).show(150);
            } else {
                $(this).hide(150);
            }
        });
    }

</script>

</body>

</html>