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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=QuestriaL" rel="stylesheet">
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
            <div class="inviteButtonPlaceholder"></div>

            <div class="createEventHolder" style="float:right;">

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
                <h4 class="modal-title">Invite friends to this group</h4>
            </div>
            <div class="modal-body" style="padding:0px 0 0 0;">

            </div>
            <div class="modal-footer" style="">
                <br>
                <button id="" class="btn btn-default btnInviteSelected" style="margin-bottom:5px;">Invite selected</button>
            </div>
        </div>

    </div>
</div>

<!-- MOBILE WARNING BOX -->
<?php include_once "p_mobilewarning.html"; ?>
<!-- FOOTER -->
<?php include_once "p_footer.html"; ?>
<?php include_once "p_loadScripts.html"; ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/eventhandler.js"></script>
<script>
    var groupId = <?php echo $groupId; ?>;

    var apiLink = "/group/" + groupId;

    var token = $(".token").data("token");

    var facebookId = <?php echo $_SESSION['facebookId']; ?>;
    var prowners;
    // Get all relevant api data and populate page with elements
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

        // pass data to variable to be used when facebook api calls are complete
        prowners = data.ProfileOwners;

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


    // Gets friends using the app to populate the list of people you can start conversations with
    var facebookId = "";
    window.fbAsyncInit = function() {
        // facebook functions in here
        FB.init({
            appId      : '651141215029165',
            xfbml      : true,
            version    : 'v2.8'
        });
        FB.AppEvents.logPageView();


        // Get friends for conversation picker
        FB.getLoginStatus(function(response) {
            FB.api('/me', function(response)
            {
                facebookId = response.id;
                // Check if user is groupowner and fix appropriate buttons if so
                $.each(prowners, function (i, ele) {
                    console.log(ele.Id + " myid:"+facebookId);
                    if (ele.Id == facebookId) {
                        // Append button that goes to Create Event via this group (the api will block all illegal attempts if this code is changed automatically)
                        $(".createEventHolder").append('<button id="" class="btn-sm btn-success" style="margin-right:10px;" data-toggle="modal" data-target="#myModal">Invite friends</button>');
                        $(".createEventHolder").append('<button class="btn-sm btn-success btnEditGroup" style="margin-right:10px;">Edit group</button>');
                        $(".createEventHolder").append('<button class="btn-sm btn-success btnCreateEvent">Create event</button>');
                }
                });
            });

            FB.api('/me/friends', function(response) {
                $.each(response.data, function(i,ele) {
                    var name = ele.name;
                    var id = ele.id;
                    var imgPath = "https://graph.facebook.com/v2.5/" + ele.id + "/picture?height=300&width=300";
                    $(".modal-body").append('<div class="col-md-12 friendsClickItem" style="cursor:pointer;"><div class=" col-md-1 " style="background-image: url(\'' + imgPath + '\');width:40px;height:40px;background-size:100%;margin:10px 30px 0 30px;vertical-align: bottom;"></div><p style="text-align:left;margin-bottom:10px;">' + name + '<input data-id="' + id + '"  type="checkbox" class="friendsCheckbox" style="float:right;vertical-align: top;"></p></div>');
                });
            });
        });
    };

    // Click function for picking friends
    $("body").on("click", ".friendsClickItem", function() {
        var isChecked = $(this).find(".friendsCheckbox").is(':checked');
        if (isChecked) {
            $(this).find(".friendsCheckbox").prop('checked', false);
        } else {
            $(this).find(".friendsCheckbox").prop('checked', true);
        }

    });

    var idArray = [];
    // Invite selected button
    $(".btnInviteSelected").click(function() {
        var noneChecked = true;
        $(".friendsCheckbox").each(function(i, ele) {
            if ($(this).is(':checked')) {
                noneChecked = false;
                idArray.push($(this).data("id"));
            }
        });
        if (noneChecked) {
            alert("You have to select at least one friend to invite");
        } else {
            // Make call to invite friends
            var apiLink = "/group/inviteDeclineToGroup?invite=true&groupId="+groupId+"&profileIds=";
            for (var i=0;i<idArray.length;i++) {
                if (i==idArray.length-1) {
                    apiLink = apiLink + idArray[i];
                } else {
                    apiLink = apiLink + idArray[i] + "%";
                }
            }
            var apiData = "";
            runAjaxPut(apiLink, apiData, token).done(function(data) {
                console.log(data);
                $('#myModal').modal('toggle');
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
