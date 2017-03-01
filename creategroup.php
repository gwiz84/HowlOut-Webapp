<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/howlout_icon_with_border.png">
    <title>HowlOut - create group</title>

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
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:20px 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4><i class="material-icons icon_yellow" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;Create group</h4>
                <p>
                    <h4><i class="material-icons icon_blue" aria-hidden="true" style="font-size:26px;vertical-align:middle;">info_outline</i>&nbsp;&nbsp;Help</h4>This is some info about creating a group. What they are about and all that sort of thing.
                    <p>
                        <h4><i class="material-icons icon_green" aria-hidden="true" style="font-size:26px;vertical-align:middle;">image</i>&nbsp;&nbsp;Image</h4>
                        <div>
                            <img src="img/building.jpg" class="img-responsive" style="width:100%;height:200px;margin: 0;">
                            <label id="selectImageBtn" class="btn btn-uploadimage" for="imageInput"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i></label>
                            <input style="display: none;" id="imageInput" type="file">
                        </div>
                        
                        <!-- <input type="file" style="margin:0 0 0 30px;display:none;" class="fileChangePicture"> -->
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="title-input"><i class="material-icons icon_yellow" aria-hidden="true"style="font-size:20px;vertical-align:middle;">group</i></span>
                            <input type="text" class="form-control cg-desc" placeholder="Title" aria-describedby="title-input">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="title-input"><i class="material-icons icon_blue" aria-hidden="true"style="font-size:20px;vertical-align:middle;">note</i></span>
                            <textarea type="text" class="form-control cg-desc" placeholder="Description" aria-describedby="title-input"></textarea>
                        </div>


                        <br>
                        <h4><i class="fa fa-eye icon_loc"></i>&nbsp;&nbsp;Visibility</h4>
                        
                        <label class="radio-inline active"><input type="radio" name="event-visib" checked="checked">Private</label>
                        <label class="radio-inline"><input type="radio" name="event-visib">Public</label>
                        <br>
                        <br>
                        <button id="btn-creategroup" class="btn btn-ho">Create group</button>
                    </div>

                    <br>

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
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="js/leftmenu.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <!-- Theme JavaScript -->
        <script src="scripts/clean-blog.min.js"></script>

    </body>

    </html>