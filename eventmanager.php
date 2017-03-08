<?php
session_start();
include_once "_loginCheck.php";
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
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

</head>

<body>
    <?php include_once "_inserttoken.php"; ?>
    <!-- Main Content -->
    <div class="hidden-xs hidden-sm top-menu-container">
        <div class="container" style="border:solid 0px black;height:200px; padding: 0;">
            <?php include_once "p_topmenu.php"; ?>
        </div>
    </div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 200px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8" style="border: solid 0px black; height:100%; padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4><i class="material-icons icon_purple" style="font-size:28px;vertical-align:middle;">event_note</i>&nbsp;&nbsp;Event manager</h4>
                <hr>
                <!--                THE EVENT EDIT BOX START -->
                <div class="event-box-edit">

                    <div class="innertop" style="background-image:url('img/building.jpg');background-size:100%;">
                        <span style="font-size:28px;color:white;" class="textstroke">Orgy event</span>
                    </div>

                    <div class="innerbottom">
                        <i class="fa fa-paw btnTrackEvent eventpaw" style="float:right;font-size:42px;cursor:pointer;"></i>
                        <i class="fa fa-clock-o icon_time" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventTime">18:00</span><br>
                        <i class="fa fa-map-marker icon_loc icon_loc" aria-hidden="true" style="margin: 0 0 0 2px;"></i>&nbsp;&nbsp;&nbsp;<span class="eventLocation">Nørregade 22, 1450 København K.</span><br>
                        <i class="fa fa-user icon_peep" aria-hidden="true"></i>&nbsp;&nbsp;<span class="eventSignedUp">20 / 24</span>
                    </div>
                    <div class="innermenu">

                        <i class="fa fa-pencil" aria-hidden="true" style="color:brown;"></i><span class="eventEdit" style="margin-left:10px;cursor:pointer;">Edit</span><br><br>
                        <i class="fa fa-files-o" aria-hidden="true" style="color:#21618c;"></i><span class="eventDuplicate" style="margin-left:10px;cursor:pointer;">Duplicate</span><br><br>
                        <i class="fa fa-times" aria-hidden="true" style="color: #c0392b ;"></i><span class="eventDelete" style="margin-left:14px;cursor:pointer;">Delete</span>
                    </div>

                </div>
                <!--                THE EVENT EDIT BOX END -->

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
    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Theme JavaScript -->
    <script src="scripts/clean-blog.min.js"></script>

</body>

</html>
