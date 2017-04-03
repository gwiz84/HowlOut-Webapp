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
    <div class="container hidden-xs hidden-sm" style="padding-top: 100px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="height:100%;padding:0 20px 0 20px;position:fixed;">
                <!--      PAGE CONTENT GOES HERE      -->
                
                <div class="conv-container col-sm-9">
                    <div class="conv-header"><i class="material-icons leftmenuitem icon_blue">chat</i>Conversation with Benny, Kjeld
                    </div>
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

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Kjeld</span><span class="mess-time">01-02-2017 14:32</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Benny, kør lige ordentligt! Yvonne tilgiver mig aldrig hvis jeg dør!
                            </div>
                        </div>

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Egon</span><span class="mess-time">01-02-2017 14:34</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Årh, så hold dog kæft, dit pattebarn!
                            </div>
                        </div>

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Kjeld</span><span class="mess-time">01-02-2017 14:36</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Det kan du ikke være bekendt! Jeg som altid hjælper dig med dine sindssyge planer, selvom det aldrig bliver til nogen millioner!
                            </div>
                        </div>

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Benny</span><span class="mess-time">01-02-2017 14:38</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Ja, det vil jeg sgu også nok sige, Egon.
                            </div>
                        </div>

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Egon</span><span class="mess-time">01-02-2017 14:41</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Alright, alright, jeg ta'r det tilbage.
                            </div>
                        </div>

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Benny</span><span class="mess-time">01-02-2017 14:43</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Det er så i orden... tak.
                            </div>
                        </div>

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Egon</span><span class="mess-time">01-02-2017 14:44</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Og skal vi SÅ komme i gang?
                            </div>
                        </div>

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Egon</span><span class="mess-time">01-02-2017 14:44</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Og skal vi SÅ komme i gang?
                            </div>
                        </div>

                        <div class="conv-message">
                            <div class="conv-circle col-sm-1"></div>
                            <div class="mess-header col-sm-11">
                                <span class="mess-author">Egon</span><span class="mess-time">01-02-2017 14:44</span>
                            </div>
                            <div class="mess-text col-sm-11">
                                Og skal vi SÅ komme i gang?
                            </div>
                        </div>
                    </div>

                    <div class="conv-input-container">
                        <div class="col-sm-9">
                            <textarea class="mess-input form-control" placeholder="Type your message here"></textarea>
                        </div>
                        <div class="col-sm-2">
                            <button id="" class="btn btn-xs btn-ho">Send</button>
                        </div>
                    </div>

                </div>
                <div id="conv-list-container" class="conv-list-container col-sm-3">
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author conv-list-event">HowlOut møde</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
                    </div>
                    <div class="conv-list-item">
                        <div class="conv-list-circle col-sm-1"></div>
                        <div class="mess-header">
                            <span class="mess-author">Egon, Benny, Kjeld</span>
                        </div>
                        <div class="conv-list-text">
                            Egon: Og skal vi SÅ komme i gang?
                        </div>
                        <!-- <span class="mess-time">01-02-2017 14:44</span> -->
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
        function addSlimScroll(element) {
            element.slimscroll({
                height: '100%',
                railVisible: false,
                color: '#2ecc71',
                // railColor: '#2ecc71',
                wheelStep: 4,
                size: '6px'
            });
        }
        addSlimScroll($("#conv-messages"));
        // addSlimScroll($("#conv-list-container"));


    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Theme JavaScript -->
    <script src="scripts/clean-blog.min.js"></script>

</body>

</html>