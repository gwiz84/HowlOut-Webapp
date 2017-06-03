<?php
session_start();
$groupId = $_GET['id'];
if (!isset($_GET['id']) || !is_numeric($groupId)) {
    header('Location: ' . 'index.php');
}
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">
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
        <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container hidden" style="border:solid 0px black;height:100%;padding:20px 20px 0 20px;">
            <!--      PAGE CONTENT GOES HERE      -->
            <div class="loader"></div>
            <img src="img/building.jpg" class="img-responsive image"
                 style="width:100%;height:300px;margin-bottom:5px;opacity:0.9;">
            <!-- <h2 style="margin-top:-70px;margin-left:30px;margin-bottom:30px;padding:10px;font-weight:bold;" class="txtTitle textstroke">Group name</h2> -->
            <h2 id="groupTitle" style="margin: -60px 0 50px 30px;z-index:13;position:relative;font-weight:bold;"
                class="textstroke">Group title</h2>
            <i class="fa fa-eye icon_loc"></i>&nbsp;&nbsp;<span class="txtVisibility">Private</span>&nbsp;&nbsp;&nbsp;<i
                class="fa fa-user icon_orange"></i>&nbsp;&nbsp;<span class="txtMemberAmount"></span> members
            <div class="createEventHolder" style="float:right;">
                <button id="" class="btn btn-ho" style="margin-bottom:5px;height:40px;padding:10px;" data-toggle="modal" data-target="#myModal" style="">New conversation</button>
            </div>
            <br><br>
            <h4>About this group</h4>
            <p id="groupDescription">No Description</p>
            <p id="groupDescriptionLong"></p>
            <a class="btnShowHideDesc" style="float:right;font-size:14px;cursor:pointer;">Show description</a><br>
            <h4><i class="material-icons icon_purple" style="font-size:28px;vertical-align:middle;">event_note</i>&nbsp;&nbsp;Upcoming
                events</h4>
            <div class="eventBox">

            </div>
            <br>
            <a href="" style="float:right;font-size:14px;" class="btnViewAllEvents">View all</a><br>
            <br>
            <h4><i class="material-icons icon_orange" style="font-size:28px;vertical-align:middle;">group</i>&nbsp;&nbsp;Group
                members</h4>
            <div class="row memberBox">

            </div>

            <br>
            <a href="" style="float:right;font-size:14px;" class="btnViewAllMembers">View all</a>
            <br>
            <h3 style="text-align:center;">Wall</h3>
            <textarea id="commentfield" class="wall-textarea"></textarea>
            <button id="btnPostComment" class="btn-sm btn-success" style="float:right;">Post comment</button>
            <div id="comments-container" class="comments-container" style="margin: 50px 0 0 0;">
                <!--                    <div class="member-circle col-md-1" style="background-image: url('img/profiledemo.jpg');background-size:100%;margin-left:30px;"></div>-->
                <!--                    <div class="col-md-10"><span><i>21-12-2016 posted by EmmaRox</i></span> <p>Is there cheese?</p>  <hr></div>-->

            </div>

            <!--      PAGE CONTENT GOES HERE      -->
        </div>
    </div>

</div>
<!--    MODEL FOR STARTING A NEW CONVERSATION-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Start new conversation</h4>
            </div>
            <div class="modal-body" style="padding:0px 0 0 0;">

            </div>
            <div class="modal-footer" style="">
                <br>
                <button id="" class="btn btn-default btnInviteFriends" style="margin-bottom:5px;">Start with selected</button>
            </div>
        </div>

    </div>
</div>

<!-- MOBILE WARNING BOX -->
<?php include_once "p_mobilewarning.html"; ?>
<!-- FOOTER -->
<?php include_once "p_footer.html"; ?>
<?php include_once "p_loadScripts.html"; ?>
<script src="js/eventhandler.js"></script>
<script>
    var groupId = <?php echo $groupId; ?>;

    var apiLink = "/group/" + groupId;

    var token = $(".token").data("token");

    var facebookId = <?php echo $_SESSION['facebookId']; ?>;

    // Create
    runAjax(apiLink, token).done(function(data) {
        if (Object.keys(data).length <= 0) {
            window.location = "index.php";
        }
        $(".main-content-container").removeClass("hidden");
        var data = JSON.parse(data);
        updateComments(JSON.stringify(data.Comments));
        var isPrivate = (data.Visibility == 0) ? "Public" : "Private";
        var title = data.Name;
        var desc = data.Description;
        var memberAmount = data.NumberOfMembers;
        var imgSource = data.LargeImageSource;

        $(".image").attr("src", imgSource);
        $("#groupTitle").text(title);
        $(".txtVisibility").text(isPrivate);
        $(".txtMemberAmount").text(memberAmount);
        $(".txtDescription").text(desc);

        // Check if user is groupowner and make Create Event button if user is an owner
        $.each(data.ProfileOwners, function (i, ele) {
            if (ele.Id == facebookId) {
                // Append button that goes to Create Event via this group (the api will block all illegal attempts if this code is changed automatically)
                $(".createEventHolder").append('<button class="btn-sm btn-success btnEditGroup" style="margin-right:10px;">Edit group</button>');
                $(".createEventHolder").append('<button class="btn-sm btn-success btnCreateEvent">Create event</button>');

            }
        });
        var isPrivate = (data.Visibility == 0) ? "Public" : "Private";
        var title = data.Name;
        var desc = data.Description;
        var memberAmount = data.NumberOfMembers;
        var imgSource = data.LargeImageSource;

        $(".image").attr("src", imgSource);
        $("#groupTitle").text(title);
        $(".txtVisibility").text(isPrivate);
        $(".txtMemberAmount").text(memberAmount);
        $(".txtDescription").text(desc);
        if (desc.length > 300) {
            var shortDesc = "";
            for (var i = 0; i < 298; i++) {
                shortDesc += desc[i];
            }
            shortDesc += "..    .";
            $("#groupDescription").html(shortDesc);
            $("#groupDescriptionLong").html(desc);
            $("#groupDescriptionLong").hide();
        } else {
            $("#groupDescription").html(desc);
            $(".btnShowHideDesc").hide();
        }

        if (data.Members.length < 1) {
            $(".memberBox").append('<h5 style="font-style:italic;margin-left:30px;">No members found</h5>');
            $(".btnViewAllMembers").hide();
        } else {
            $.each(data.Members, function (i, ele) {
                $(".memberBox").data("groupid");
                $(".memberBox").append('' +
                    '<div class=" col-md-2" style="text-align:center;">' +
                    '<img src="' + ele.SmallImageSource + '" class="member-circle"><br>' +
                    '<p class="">' + ele.Name + '</p>' +
                    '</div>');
            });
        }
    });

    // Description open/close
    var descOpen = false;
    $("body").on("click", ".btnShowHideDesc", function () {
        if (descOpen) {
            $("#groupDescription").show(50);
            $("#groupDescriptionLong").hide();
            $(".btnShowHideDesc").text("Show description");
            descOpen = false;
        } else {
            $("#groupDescription").hide();
            $("#groupDescriptionLong").show(100);
            $(".btnShowHideDesc").text("Hide description");
            descOpen = true;
        }
    });

    // Click function for create event through group button
    $("body").on("click", ".btnCreateEvent", function () {
        // Redirect to create event with group id instead of profile id
        window.location = "editevent.php?groupid=" + groupId;
    });

    // Click function for editing event through group button
    $("body").on("click", ".btnEditGroup", function () {
        // Redirect to create event with group id instead of profile id
        window.location = "editgroup.php?id=" + groupId;
    });


    // NEXT UPCOMING EVENT
    var now = new Date();
    apiLink = "/event/eventsFromGroupIds?CurrentTime=" + now.toISOString() + "&groupIds=" + groupId;
    runAjax(apiLink, token).done(function(data) {
        var jsonData = JSON.parse(data);
        var eventToShow = null;
        var currentTime = new Date().getTime();
        var lowest = null;
        if (jsonData.length < 1) {
            $(".eventBox").append('<h5 style="font-style:italic;margin-left:20px;">No upcoming events found</h5>');
            $(".btnViewAllEvents").hide();
        } else {
            $.each(jsonData, function (i, ele) {
                var startTime = Date.parse(ele.StartDate);
                if ((startTime - currentTime) > 0) {
                    if (lowest === null) {
                        lowest = startTime - currentTime;
                        eventToShow = ele;
                    } else {
                        if ((startTime - currentTime) < lowest) {
                            lowest = startTime - currentTime;
                            eventToShow = ele;
                        }
                    }
                }
            });
            $(".eventBox").append(makeEventElement(eventToShow) + "<br>");
        }
    });

    $("body").on("click", ".btn-viewevent", function () {
        var eventIdClicked = $(this).parent().parent().parent().parent().data("eventid");
        window.location = "viewevent.php?id=" + eventIdClicked;
    });

    // updates the comment on the page with json data provided as a parameter
    function updateComments(jsonData) {
        var data = JSON.parse(jsonData);
        $("#comments-container").empty();
        $.each(data, function (i, ele) {
            var date = getDateFromISOString(new Date(Date.parse(ele.DateAndTime)));
            $("#comments-container").append('<div class="row" style="margin: 10px 0 0 0;"><div class="member-circle col-md-1" style="background-image: url(' + ele.ImageSource + ');background-size:100px;margin-left:30px;">' +
                '</div><div class="col-md-10"><span><i>' + date + '</i></span><p>' + ele.Content + '</p><hr></div></div>');
        });
    }

    // Post comment on wall
    $("#btnPostComment").click(function () {
        if (($("#commentfield").val().length) > 0) {
            var commentToPost = $("#commentfield").val();
            var currentDate = new Date().toISOString();
            var apiLink = "/message/comment/<?php echo $groupId; ?>?commentType=0";
            var jsonData = JSON.stringify({
                "Content": commentToPost,
                "DateAndTime": currentDate
            });
            runAjaxJSON(apiLink, jsonData, token).done(function(data) {
                updateComments(data);
            });
        }
    });
</script>
</body>

</html>
