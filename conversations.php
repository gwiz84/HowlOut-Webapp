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
            <div class="col-sm-2 left-menu-container" style="position:fixed;">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-md-offset-1 col-md-9 main-content-container" style="height:100%;padding:0 20px 0 20px;position:fixed;">
                <!--      PAGE CONTENT GOES HERE      -->
                <div class="loader"></div>
<!--                Main conversation window -->

                    <div class="conv-container col-md-8">
                        <button id="" class="btn btn-ho" style="margin-bottom:5px;height:40px;padding:10px;" data-toggle="modal" data-target="#myModal" style="">New conversation</button>
                        <hr>
<!--                        <div class="conv-header"><i class="material-icons leftmenuitem icon_blue">chat</i>Conversation with Benny, Kjeld</div>-->
                        <div id="conv-messages" class="conv-messages" style="">

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
                    <div class="conv-list-container col-md-3" id="conv-list-container " >

                    </div>


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
                    <button id="" class="btn btn-default btnStartConvo" style="margin-bottom:5px;">Start with selected</button>
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

<!--    <script src="js/jquery.slimscroll.min.js"></script>-->
    <script>
        var activeId = -1;
//        function addSlimScroll(element, height) {
//            element.slimscroll({
//                height: height,
//                railVisible: false,
//                color: '#2ecc71',
//                // railColor: '#2ecc71',
//                wheelStep: 4,
//                size: '6px'
//            });
//        }
//        addSlimScroll($("#conv-messages"), "100%");
//        addSlimScroll($("#conv-list-container"), "90%");



        var curHeight = $(window).height();
        $(".conv-messages").height(curHeight-295);
        $(".conv-list-container").height(curHeight-200);


        $(window).on('resize', function(){
            var curHeight = $(window).height();
            $(".conv-messages").height(curHeight-295);
            $(".conv-list-container").height(curHeight-200);
        });

        $(".chooseFriendsDiv").hide();
        var token = $(".token").data("token");
        getAllConversations();


        var currentMsgAmount = -1;
        // Interval to continously update current conversation if any new messages are sent/received
        setInterval(function() {
            if (activeId > 0) {
                var apiLink = "/message/conversation/getOne/"+activeId;
//                console.log("Id:"+activeId+" MsgCount:"+currentMsgAmount);
                runAjax(apiLink, token).done(function(data) {
                    var usedActiveId = activeId;
                    var jsonData = JSON.parse(data);
                    if (jsonData.Messages.length > currentMsgAmount) {
                        $(".conv-messages").empty();
                        currentMsgAmount = jsonData.Messages.length;
                        $.each(jsonData.Messages, function (i, ele) {
//                            console.log(JSON.stringify(ele));
                            $(".conv-messages").append('<div class="conv-message">' +
                                '<div class="conv-circle col-sm-1" style="background-image: url(\'' + ele.ImageSource + '\');background-size:100%;"></div>' +
                                '<div class="mess-header col-sm-11">' +
                                '<span class="mess-author">' + ele.SenderName + '</span><span class="mess-time">' + convertDateString(ele.DateAndTime).toString() + '</span>' +
                                '</div>' +
                                '<div class="mess-text col-sm-11">' + ele.Content +
                                '</div>' +
                                '</div>');

                            $("."+usedActiveId).find(".lastMsg").text(shortenMsg(ele.Content));
                        });
                        scrollDown();
                    }
                });
            }
        }, 700);


        // scrolls to the bottom of the msg div
        function scrollDown() {
            var wtf    = $('.conv-messages');
            var height = wtf[0].scrollHeight;
            wtf.scrollTop(height);
        }

        // Keyboard enter click function for sending chat messages
        $(".mess-input").keypress(function(e) {
            if(e.which == 13) {
                sendMsg();
            }
        });

        // Get all conversations for the current user
        function getAllConversations() {
            var currentDate = new Date().toISOString();
            var apiLink = "/message/conversation/getall";
            runAjax(apiLink, token).done(function(data) {
                // Populate the conversation list here
                var jsonData = JSON.parse(data);
                $(".conv-list-container").empty();
                $.each(jsonData, function(i,ele) {
                    var nameList = "";
                    var nameCounter = 0;
                    var isFirst = true;

                    $.each(ele.Profiles, function(i, ele2) {
                        if (nameCounter < 3) {
                            var words = ele2.Name.split(" ");
                            if (isFirst) {
                                nameList += words[0];
                            } else {
                                nameList += ", "+words[0];
                            }
                        } else {
                            nameList += "...";
                        }
                        nameCounter++;
                        isFirst = false;
                    });
                    var lastMessage = (ele.LastMessage!=null) ? ele.LastMessage.Content : "...";
                    lastMessage = shortenMsg(lastMessage);
                    $(".conv-list-container").append(
                        '<div class="conv-list-item col-md-12 '+ele.Id+'" data-conversationid="'+ele.Id+'">'
                        +'<div class="conv-list-circle col-sm-1"></div>'
                        +'<div class="mess-header">'
                        +' <span class="mess-author">'+nameList+'</span>'
                        +' </div>'
                        +' <div class="conv-list-text lastMsg">'
                        +'   '+lastMessage+''
                        +'</div>'
                        +' </div>');
                });
                checkSelectedConvo();
            });
        }

        // Shortens a message to 30 characters and ellipsis effect
        function shortenMsg(msg) {
            var lastMessageFinal = "";
            if (msg.length > 30) {
                for (var i = 0; i < 30; i++) {
                    lastMessageFinal += msg[i];
                }
                lastMessageFinal += "...";
            } else {
                lastMessageFinal = msg;
            }
            return lastMessageFinal;
        }

        // Conversation list item click function (to select a conversation)
        $("body").on("click", ".conv-list-item", function() {
            activeId = $(this).data("conversationid");
            $(".conv-messages").empty();
            currentMsgAmount = -1;
            checkSelectedConvo();
        });


        // function that changes background color on selected conversation based on which is active
        function checkSelectedConvo() {
            $(".conv-list-item").each(function(i,ele) {
                if ($(this).data("conversationid") == activeId) {
                    $(this).css("background-color","#D5D8DC");
                } else {
                    $(this).css("background-color","transparent");
                }
            });
        }

        // Chat send button mouse click function
        $(".btnSendMsg").click(function() {
            sendMsg();
        });

        // function to send message via chat
        function sendMsg() {
            var message = $(".mess-input").val();
            var apiLink = "/message/conversation/writeToConversation/"+activeId;
            var currentDate = new Date().toISOString();
            var apiData = JSON.stringify({
                "Content" : message,
                "DateAndTime" : currentDate
            });
            runAjaxPut(apiLink, apiData, token).done(function(data) {
                $(".mess-input").val("");
            });
            localStorage.curconvid = activeId;
        }

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

        // Click function for picking friends when starting a new conversation
        $("body").on("click", ".friendsClickItem", function() {
            var isChecked = $(this).find(".friendsCheckbox").is(':checked');
            if (isChecked) {
                $(this).find(".friendsCheckbox").prop('checked', false);
            } else {
                $(this).find(".friendsCheckbox").prop('checked', true);
            }

        });

        var idArray = [];
        // Start conversation button
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
                getAllConversations();
            }
        });

        // Create conversation function
        function createConversation(idArray) {
            var apiLink2 = "/message/conversation?modelType=2";

            apiLink2 +=  "&profileIds="+facebookId;

            for (var i = 0; i < idArray.length; i++) {
                apiLink2 += "&profileIds="+idArray[i];
            }
            var apiData = null;

            runAjaxJSON(apiLink2, apiData, token).done(function(data) {
                var jsonData = JSON.parse(data);
                activeId = jsonData.Id;
                currentMsgAmount = -1;
                $('#myModal').modal('toggle');
            });
        }

        // Converts the date-string 'date' to a format understandable by the datepicker plugin.
        function convertDateString(date) {
            convertedDate = date.replace("T", " ").substr(0, 16);
            return convertedDate;
        }

        // get last conversation id from localstorage
        if (localStorage.getItem("curconvid") != null){
            activeId = localStorage.getItem("curconvid");
            checkSelectedConvo();
        }
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>