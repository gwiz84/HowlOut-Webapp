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
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="css/croppie.css" rel="stylesheet">
    <link href="css/jquery-confirm.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Nunito+Sans|Questrial" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/jquery-confirm.js"></script>
</head>

<body>
    <?php include_once "_inserttoken.php"; ?>
    <?php include_once "_loginCheck.php"; ?>
    <?php
    $titleaction = "Create";
    $buttonaction = "Create";
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $titleaction = "Edit";
        $buttonaction = "Update";
        echo '<div class="groupid" style="display:none;" data-groupid="'.$_GET['id'].'"></div>';
    }
    ?>
    <div class="fbid" data-fbid="<?php echo $_SESSION['facebookId'] ?>" style="display:none;"></div>
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
                <h4 style="position:relative;" class=""><i class="fa fa-calendar-plus-o icon_darkgreen" aria-hidden="true" style="font-size:26px;"></i><span style="font-size:26px; margin-left:9px;"><?php echo $titleaction . ' group';?></span></h4>
                <hr>

                <h4><i class="material-icons icon_blue" aria-hidden="true" style="font-size:26px;vertical-align:middle;">info_outline</i>&nbsp;&nbsp;Help</h4>
                If you have a small community and want to host events for a specific group of people, creating a group is the answer. This allows you to keep your events contained to members of the group, along with a small array of functionas to make your life easier when dealing with checklists, budgets or other such issues.
                <br>
                <h4><i class="material-icons icon_green" aria-hidden="true" style="font-size:26px;vertical-align:middle;">image</i>&nbsp;&nbsp;Image</h4>
                <div id="bannerContainer" style="width:740px;height:300px;">
                    <span id="bannerOverlay" class="bannerOverlay">
                        <div id="selectImageBtn" class="btn btn-showmodal">Choose banner image</div>
                    </span>
                    <img id="bannerImg" class="image img-banner">
                </div>
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
                <button id="btn-creategroup" class="btn btn-ho btnCreate" style="float:right;"><?php echo $buttonaction ?> group</button>
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

    
    <script src="js/topmenu.js"></script>
    <script src="js/searchbar.js"></script>
    <script src="js/ajaxhandler.js"></script>
    <script src="js/imagehandler.js"></script>
    <script src="js/croppie.min.js"></script>

<script>
    var token = $(".token").data("token");
    var orgImageS = "";
    var orgImageM = "";
    var orgImageL = "";
    var imageCropped = null;

    // HVAD ER EN "CLOSED" GROUP?

    // If the 'groupid' data variable is set on the ".groupid" div, a group id has been passed
    // using the "?id=" GET parameter. Try getting the group from the API. If no group is found with
    // the provided id, return to index.php.
    // When the group has been loaded, check if the currently logged in user is one of the owners of the group,
    // i.e. has the right to edit it at all. Otherwise, return to index.php.
    if ($(".groupid").data("groupid") != null) {
        var editid = $(".groupid").data("groupid");
        var apiLink = "https://api.howlout.net/group/"+editid;
        runAjax(apiLink, token).done(function(data) {
            var jsonData = JSON.parse(data);
            var fbid = $(".fbid").data("fbid");
            var ownersArray = jsonData.ProfileOwners;
            var isOwner = false;
            $.each(ownersArray, function(i, ele) {
                if (fbid == ele.ProfileId) {
                    isOwner = true;
                }
            });
            if (!isOwner) {
                window.location = "index.php";
            } else {
                orgImageS = jsonData.SmallImageSource;
                orgImageM = jsonData.ImageSource;
                orgImageL = jsonData.LargeImageSource;
                $("#bannerImg").css("background-image", "url('" + orgImageL + "')");
                $(".inputTitle").val(jsonData.Name);
                $(".inputDesc").val(jsonData.Description);
                if (jsonData.Visibility == 0) {
                    $(".radioPublic").prop("checked", true);
                }
            }
        });
    } else {
        $("#bannerImg").css("background-image", "url('img/building.jpg')"); 
    }


    $(".btnCreate").click(function() {
        var groupId = ($(".groupid").data("groupid") != null) ? parseInt($(".groupid").data("groupid")) : 0;
        var fbid = $(".fbid").data("fbid");
        var imgSrcS = (groupId != null) ? orgImageS : "img/building.jpg";
        var imgSrcM = (groupId != null) ? orgImageM : "img/building.jpg";
        var imgSrcL = (groupId != null) ? orgImageL : "img/building.jpg";
        var newImage = "";
        if (imageCropped != null) {
            uploadImage(imageCropped, fbid).done(function (data) {
                data = JSON.parse(data);
                if (data.status == "OK") {
                    imgSrcS = data.imgPath_s;
                    imgSrcM = data.imgPath_m;
                    imgSrcL = data.imgPath_l;
                    saveGroup(groupId, imgSrcS, imgSrcM, imgSrcL);
                } else {
                    $.alert({
                        type: "red",
                        title: "ERROR!",
                        content: data.errormessage
                    });
                }
            });

        } else {
            saveGroup(groupId, imgSrcS, imgSrcM, imgSrcL);
        }
    });

    function saveGroup(groupId, imgSrcS, imgSrcM, imgSrcL) {
        var title = $(".inputTitle").val();
        var description = $(".inputDesc").val();
        var isPrivate = ($(".radioPrivate").is(":checked")) ? 2 : 0;
        var profileId = $(".fbid").data("fbid");
        var apiLink = 'https://api.howlout.net/group';
        var apiData = JSON.stringify({
            "GroupId": groupId,
            "ProfileOwners": [
                {
                    "ProfileId": profileId
                }
            ],
            "Name": title,
            "Description": description,
            "SmallImageSource": imgSrcS,
            "ImageSource": imgSrcM,
            "LargeImageSource": imgSrcL,
            "Visibility": isPrivate
        });
        var token = $(".token").data("token");

        runAjaxJSON(apiLink, apiData, token).done(function(data) {
            var id = JSON.parse(data).GroupId;
            window.location = "viewgroup.php?id="+id;
        });
    }

    $("#selectImageBtn").click(function() {
        createUploadModal($("#bannerImg"));
    });

</script>
</body>

</html>
