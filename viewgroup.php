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
    <div class="hidden-xs hidden-sm top-menu-container">
        <div class="container" style="padding: 0;">
            <?php include_once "p_topmenu.php"; ?>
        </div>
    </div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 124px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:20px 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <img src="img/building.jpg" class="img-responsive" style="width:100%;height:200px;margin-bottom:5px;">
                <i class="fa fa-eye icon_loc"></i>&nbsp;&nbsp;Private&nbsp;&nbsp;&nbsp;<i class="fa fa-user icon_orange"></i>&nbsp;&nbsp;18 members<br><br>
                <h4>About this group</h4>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                    The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
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
                    <div class="row">
                        <div class="member-circle col-md-1" style="background-image: url('img/howlout_icon.png');background-size:100%;">

                        </div>
                        <div class="member-circle col-md-1" style="background-image: url('img/howlout_icon.png');background-size:100%;margin-left:30px;">

                        </div>
                        <div class="member-circle col-md-1" style="background-image: url('img/howlout_icon.png');background-size:100%;margin-left:30px;">

                        </div>
                        <div class="member-circle col-md-1" style="background-image: url('img/howlout_icon.png');background-size:100%;margin-left:30px;">

                        </div>
                        <div class="member-circle col-md-1" style="background-image: url('img/howlout_icon.png');background-size:100%;margin-left:30px;">

                        </div>
                        <div class="member-circle col-md-1" style="background-image: url('img/howlout_icon.png');background-size:100%;margin-left:30px;">

                        </div>
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
