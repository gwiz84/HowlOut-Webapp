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
    <?php include_once "_loginCheck.php"; ?>
    <!-- Main Content -->
    <div class="hidden-xs hidden-sm" style="background-color: #e9f7ef;position: fixed; width: 100%;z-index: 99;">
        <div class="container" style="border:solid 0px black;height:200px; padding: 0;">
            <?php include_once "p_topmenu.php"; ?>
        </div>
    </div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 200px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4><i class="material-icons icon_peep" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;My groups</h4>
                <hr>
                <!--            GROUP CIRCLE THING START-->
                <div class="row">
                    <div class="group-circle col-md-1" style="background-image: url('img/howlout_icon.png');background-size:100%;">

                    </div>
                    <div class="group-circle col-md-1" style="background-image: url('img/howlout_icon.png');background-size:100%;margin-left:30px;">

                    </div>
                </div>

                <br>
                <div class="row">
                    <a href="" style="float:right;font-size:14px;">View all</a>
                </div>

                <!--             GROUP CIRCLE THING END -->


                <br>
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


</body>

</html>
