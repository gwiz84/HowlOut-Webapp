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
    <title>HowlOut - conversations</title>

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
            <div class="col-sm-10 main-content-container" style="height:100%;padding:0 20px 0 20px;position:fixed;">
                <!--      PAGE CONTENT GOES HERE      -->

<!--                Main conversation window -->
                <div class="row">
                    <div class="conv-container col-md-8">
                        <button id="" class="btn btn-xs btn-ho btnNewConversation" style="margin-bottom:5px;">New conversation</button>
                        <div class="col-xs-12 chooseFriendsDiv"><h1>Select friends</h1>
                            <button id="" class=" btnStartConvo" style="margin-bottom:5px;">Start with selected</button>
                        </div>
                        <div class="conv-header"><i class="material-icons leftmenuitem icon_blue">chat</i>Conversation with Benny, Kjeld</div>
                        <div id="conv-messages" class="conv-messages">
                            <div class="conv-message">
                                <div class="conv-circle col-sm-1"></div>
                                <div class="mess-header col-sm-11">
                                    <span class="mess-author">Egon</span><span class="mess-time">01-02-2017 14:29</span>
                                </div>
                                <div class="mess-text col-sm-11">
                                    Hundehoveder og hængerøve! Hvor bli'r I af?
                                </div>
                            </div>
                            <div class="conv-message">
                                <div class="conv-circle col-sm-1"></div>
                                <div class="mess-header col-sm-11">
                                    <span class="mess-author">Benny</span><span class="mess-time">01-02-2017 14:31</span>
                                </div>
                                <div class="mess-text col-sm-11">
                                    Jeg sku' lige have brændstof på. Vi er på vej, skidegodt!
                                </div>
                            </div>
                        </div>
                        <div class="conv-input-container col-xs-8">
                            <div class="col-sm-8">
                                <textarea class="mess-input form-control" placeholder="Type your message here"></textarea>
                            </div>
                            <div class="col-sm-4">
                                <button id="" class="btn btn-xs btn-ho btnSendMsg">Send</button>
                            </div>
                        </div>
                    </div>
                    <!--                Right conversation list -->
                    <div id="conv-list-container" class="conv-list-container ">

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- MOBILE WARNING BOX -->
    <?php include_once "p_mobilewarning.html"; ?>

    <!-- FOOTER -->
    <?php
    // include_once "p_footer.html";
    ?>

    <?php include_once "p_loadScripts.html"; ?>

    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
        function addSlimScroll(element, height) {
            element.slimscroll({
                height: height,
                railVisible: false,
                color: '#2ecc71',
                // railColor: '#2ecc71',
                wheelStep: 4,
                size: '6px'
            });
        }
        addSlimScroll($("#conv-messages"), "100%");
        addSlimScroll($("#conv-list-container"), "90%");

        $(".chooseFriendsDiv").hide();
        var token = $(".token").data("token");
        getAllConversations();

        // Interval to continously update current conversation
        setInterval(function() {
            if (activeId>0) {
                var apiLink = "https://api.howlout.net/message/conversation/getOne/"+activeId;
                runAjax(apiLink, token).done(function(data) {
                    var jsonData = JSON.parse(data);
                    $.each(jsonData.Messages, function(i,ele) {

                    });
                });
            }
        }, 1500);

        // Get all conversations
        function getAllConversations() {
            var currentDate = new Date().toISOString();
            var apiLink = "https://api.howlout.net/message/conversation/getall";
            runAjax(apiLink, token).done(function(data) {
                // Populate the conversation list here
                var jsonData = JSON.parse(data);
                console.log(data);
                if (jsonData.length>0) {
                    activeId = jsonData[0].ConversationId;
                }
                $.each(jsonData, function(i,ele) {
                    var nameList = "";
                    var nameCounter = 0;
                    $.each(ele.Profiles, function(i,ele2) {
                        if (nameCounter <3) {
                            var words = ele2.Name.split(" ");
                            nameList += words[0]+" ";
                        } else {
                            nameList += "..";
                        }
                        nameCounter++;
                    });
                    var lastMessage = (ele.LastMessage!=null) ? ele.LastMessage.Content : "...";
                    $(".conv-list-container").append(
                        '<div class="conv-list-item col-md-12" data-conversationid="'+ele.ConversationId+'">'
                        +'<div class="conv-list-circle col-sm-1"></div>'
                        +'<div class="mess-header">'
                        +' <span class="mess-author">'+nameList+'</span>'
                        +' </div>'
                        +' <div class="conv-list-text">'
                        +'    '+lastMessage+''
                        +'</div>'
                        +' </div>');
                });
            });
        }

        var activeId = -1;
        // Conversation list item click function
        $("body").on("click", ".conv-list-item", function() {
            activeId = $(this).data("conversationid");
        });

        $(".btnSendMsg").click(function() {
            var message = $(".mess-input").val();
            var apiLink = "https://api.howlout.net/message/conversation/writeToConversation/"+activeId;
            var currentDate = new Date().toISOString();
            var apiData = JSON.stringify({
                "Content" : message,
                "DateAndTime" : currentDate
            });
            runAjaxPut(apiLink, apiData, token).done(function(data) {
                console.log(data);
            });
        });

        // Create conversation
        function createConversation(idArray) {
            var apiLink = "https://api.howlout.net/message/conversation?modelType=2";

            apiLink +=  "&profileIds="+facebookId;

            for (var i=0; i<idArray.length; i++) {
                apiLink += "&profileIds="+idArray[i];
            }
            var apiData = null;

            runAjaxJSON(apiLink, apiData, token).done(function(data) {

            });
        }

        // Choose friends open or closed
        var chooseOpen = false;
        $(".btnNewConversation").click(function() {
            if (chooseOpen) {
                $(".btnNewConversation").text("New conversation");
                $(".chooseFriendsDiv").hide(100);
                chooseOpen = false;
            } else {
                $(".btnNewConversation").text("Cancel");
                $(".chooseFriendsDiv").show(100);
                chooseOpen = true;
            }
        });

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
                });

                FB.api('/me/friends', function(response) {
                    $.each(response.data, function(i,ele) {
                        var name = ele.name;
                        var id = ele.id;
                        var imgPath = "https://graph.facebook.com/v2.5/" + ele.id + "/picture?height=300&width=300";
                        $(".chooseFriendsDiv").append('<div class="col-md-12"><div class="member-circle col-md-2 " style="background-image: url(\'' + imgPath + '\');background-size:100%;margin:10px 30px 0 30px;"></div><p style="text-align:center;">' + name + '</p><input data-id="' + id + '" type="checkbox" class="friendsCheckbox"></div>');
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

        $("body").on("click", ".groupLink", function() {
            var groupIdClicked = $(this).data("groupid");
            window.location = "viewgroup.php?id="+groupIdClicked;
        });

        var idArray = [];
        // Stat conversation button
        $(".btnStartConvo").click(function() {
            var noneChecked = true;
            $(".friendsCheckbox").each(function(i, ele) {
                if ($(this).is(':checked')) {
                    noneChecked = false;
                    idArray.push($(this).data("id"));
                }
            });
            if (noneChecked) {
                alert("You have to select at least one friend to converse with.");
            } else {
                createConversation(idArray);
            }
        });

    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="scripts/clean-blog.min.js"></script>

</body>

</html>