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
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Nunito+Sans|Questrial" rel="stylesheet">
</head>

<body>
    <?php include_once "_inserttoken.php"; ?>
    <?php include_once "_loginCheck.php"; ?>
    <div class="fbid" data-fbid="<?php echo $_SESSION['facebookId'] ?>" style="display:none;"></div>
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
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!--      PAGE CONTENT GOES HERE      -->
                <h4><i class="material-icons icon_yellow" aria-hidden="true" style="font-size:26px;vertical-align:middle;">group</i>&nbsp;&nbsp;Create group</h4><hr>

                <h4><i class="material-icons icon_blue" aria-hidden="true" style="font-size:26px;vertical-align:middle;">info_outline</i>&nbsp;&nbsp;Help</h4>
                If you have a small community and want to host events for a specific group of people, creating a group is the answer. This allows you to keep your events contained to members of the group, along with a small array of functionas to make your life easier when dealing with checklists, budgets or other such issues.
                <br>
                <h4><i class="material-icons icon_green" aria-hidden="true" style="font-size:26px;vertical-align:middle;">image</i>&nbsp;&nbsp;Image</h4>
                <div>
                    <img src="img/building.jpg" class="img-responsive" style="width:100%;height:200px;margin: 0;">
                    <span>
                        <label id="selectImageBtn" class="btn btn-uploadimage" for="imageInput"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i></label>
                        <input style="display: none;" id="imageInput" type="file">
                    </span>
                </div>
                <br>
                <!-- <input type="file" style="margin:0 0 0 30px;display:none;" class="fileChangePicture"> -->
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="title-input"><i class="material-icons icon_yellow" aria-hidden="true"style="font-size:20px;vertical-align:middle;">group</i></span>
                    <input type="text" class="form-control ho-textinput inputTitle" placeholder="Group title" aria-describedby="title-input">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="desc-input"><i class="material-icons icon_blue" aria-hidden="true"style="font-size:20px;vertical-align:middle;">note</i></span>
                    <textarea type="text" class="form-control ho-textinput inputDesc" placeholder="Group description" aria-describedby="desc-input"></textarea>
                </div>


                <br>
                <h4><i class="fa fa-eye icon_loc"></i>&nbsp;&nbsp;Visibility</h4>

                <label class="radio-inline active "><input class="radioPrivate" type="radio" name="event-visible" checked="checked">Private</label>
                <label class="radio-inline "><input class="radioPublic" type="radio" name="event-visible">Public</label>
                <br>
                <br>
                <button id="btn-creategroup" class="btn btn-ho btnCreate" style="float:right;">Create group</button>
            </div>

            <br>

            <br>

            <!--      PAGE CONTENT GOES HERE      -->
        </div>
    </div>

    <!-- MOBILE WARNING BOX -->
    <?php include_once "p_mobilewarning.html"; ?>

    <!-- FOOTER -->
    <?php include_once "p_footer.html"; ?>

    <?php include_once "p_loadScripts.html"; ?>

<script>

    // MANGLER BILLEDE UPLOAD FUNKTIONALITET OG REDIRECT EFTER CREATION!!!!!!!!!!!!!!!!!!!!!
    // OG HVAD FANDEN ER EN "CLOSED" GROUP FFS

    $(".btnCreate").click(function() {
        var title = $(".inputTitle").val();
        var description = $(".inputDesc").val();
        var isPrivate = ($(".radioPrivate").is(":checked")) ? 2 : 0;
        var profileId = $(".fbid").data("fbid");
        var apiLink = 'https://api.howlout.net/group';
        var apiData = JSON.stringify({
            "GroupId": 0,
            "ProfileOwners": [
                {
                    "ProfileId": profileId
                }
            ],
            "Name": title,
            "Description": description,
            "ImageSource": "https://howloutstorage.blob.core.windows.net/howlout/10153817903667221.28-12-2016 23:44:46",
            "Visibility": isPrivate
        });
        var token = $(".token").data("token");
        $.ajax({
            type: 'post',
            url: '_apiRequestJSON.php',
            async: false,
            data: {'apiLink' : apiLink, 'apiData' : apiData, 'token' : token},
            success: function (data) {
                var jsonData = JSON.parse(data);
                window.location = "viewgroup.php?id="+jsonData.GroupId;
            },
            error: function () {
                alert("ajax failed");
            }
        });
    });


</script>
</body>

</html>
