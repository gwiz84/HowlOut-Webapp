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
    <title>HowlOut</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="css/timepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="css/croppie.css" />
    <link href="css/jquery-confirm.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Nunito+Sans|Questrial" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.0/jquery-confirm.min.js"></script>
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
    <div class="fbid" data-fbid="<?php echo $_SESSION['facebookId'] ?>" style="display:none;"></div>
    <div class="container hidden-xs hidden-sm" style="padding-top: 120px;">

        <div class="row">
            <div class="col-sm-2 left-menu-container">
                <?php include_once "p_leftmenu.php"; ?>
            </div>
            <div class="col-sm-10 col-lg-offset-1 col-lg-8 main-content-container" style="border:solid 0px black;height:100%;padding:0 20px 0 20px;">
                <!-- PAGE CONTENT GOES HERE      -->
                <h4 style="position:relative;" class=""><i class="fa fa-calendar-plus-o icon_darkgreen" aria-hidden="true" style="font-size:26px;"></i><span style="font-size:26px; margin-left:9px;">TEST CROPPIE</span></h4>
                <br>
                
   <!--              <div id="croppieimg" class="" style="border:solid 1px darkgrey;width:740px; height: 300px;"></div>
                
                <span>
                    <label id="selectImageBtn" class="btn btn-uploadimage" for="imageInput"><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i></label>
                    <input id="imageInput" type="file">
                </span>
                <br>
                <button id="btnCrop">Crop</button>
                <br><br><br> -->
                <img id="newImg2" style="height:300px; width: 740px; border: solid 1px black;background-repeat:no-repeat;">
<!--                 <br>
                <button id="btnUp">Upload!</button> -->
                <button id="btnModal">Modal</button>
            </div>

        </div>

    </div>

    <!-- MOBILE WARNING BOX -->
    <?php include_once "p_mobilewarning.html"; ?>

    <!-- FOOTER -->
    <?php include_once "p_footer.html"; ?>

    <script src="js/topmenu.js"></script>
    <script src="js/searchbar.js"></script>
    <script src="js/imagehandler.js"></script>
    <script src="js/croppie.min.js"></script>
    <script src="js/jquery-confirm.js"></script>

    <script>
        var imageCropped;
        // var imageDiv = $('#croppieimg').croppie({
        //     viewport: { width: 740, height: 300 },
        //     // boundary: { width: 800, height: 300 },
        //     showZoomer: false,
        //     enableOrientation: true,
        //     // enableZoom: false,
        //     enforceBoundary: true
        // });

        // imageDiv.croppie('bind', {
        //     url: 'img/building.jpg',
        // });

        // function loadImageFromFile(imageToLoad, element) {
        //     if (imageToLoad.files && imageToLoad.files[0]) {

        //         if (imageToLoad.files[0].size > maxImageSize) {
        //             return '{"status": "ERROR", "message": "File is too big<br>Maximum filesize: ' + maxImageSize + ' bytes"}';
        //         } else if (!isFileTypeImage(imageToLoad)) {
        //             return '{"status": "ERROR", "message": "Not an image file"}';
        //         } else {
        //             var reader = new FileReader();

        //             reader.onload = function (e) {
        //                 image = e.target.result;
        //                 element.croppie('bind', {
        //                     url: image,
        //                 })
        //             };

        //             reader.readAsDataURL(imageToLoad.files[0]);
        //             return '{"status": "OK", "message": "File is OK"}';
        //         }
        //     }
        // }

        // $("#imageInput").change(function(){
        //     var hat = loadImageFromFile(this, $("#croppieimg"));
        // });

        // $("#btnCrop").click(function(){
        //     imageDiv.croppie('result', 'base64').then(function(croppedImage) {
        //         $("#newImg").attr('src', croppedImage);
        //     });
        // });

        
        $("#btnUp").click(function() {
            var imgToUp = null;
            var imgSrc = "intet";
            var fbid = $(".fbid").data("fbid");
            imageDiv.croppie('result', 'base64').then(function(croppedImage) {
                imgToUp = croppedImage;
                // console.log(imgSrc);
            }).then(function(asdf) {
                // console.log("2: " + imgToUp);
                var newImage = uploadImage(imgToUp, fbid);
                if (newImage.status == "OK") {
                    imgSrc = newImage.imgPath;
                    console.log(imgSrc);
                }
            });
            console.log(imgSrc);
        });

        $("#btnModal").click(function() {
            $.confirm({
                title: 'Upload and crop new image',
                content: imgUpContent(),
                boxWidth: '770px',
                useBootstrap: false,
                closeIcon: true,
                // type: 'green',
                onContentReady: function() {
                    var self = this;
                    var croppieDiv = this.$content.find('#croppieimg').croppie({
                        viewport: { width: 740, height: 300 },
                        // boundary: { width: 800, height: 300 },
                        showZoomer: false,
                        enableOrientation: true,
                        // enableZoom: false,
                        enforceBoundary: true
                    });
                    this.$content.find("#imageInput").change(function(){
                        var JSONresponse = JSON.parse(loadImageFromFile(this, croppieDiv));
                        if (JSONresponse.status == "ERROR") {
                            $.alert({
                                type: "red",
                                title: "ERROR!",
                                content: JSONresponse.message
                            });
                        }
                    });
                    this.$content.find("#btnCrop").click(function(){
                        croppieDiv.croppie('result', 'base64').then(function(croppedImage) {
                            $("#newImg").attr('src', croppedImage);
                            imageCropped = croppedImage;
                        });
                    });

                },
                buttons: {
                    cancel: function() {

                    },
                    done: {
                        btnClass: 'btn-green',
                        action: function() {
                            if (imageCropped != null) {
                                $("#newImg2").attr('src', imageCropped);    
                            }
                        }
                    }
                }
            });
        });

        function imgUpContent() {
            // return '<div id="croppieImg" src="img/building.jpg" class="" style="border:solid 1px darkgrey;width:740px; height: 300px;"></div>';
            return '<div><div id="croppieimg" style="width:740px;height:300px;border:solid 1px darkgrey;"></div>'+
                '<span><input id="imageInput" type="file"></span><br><button id="btnCrop" class="btn btn-red">Crop</button><br><br><br>'+
                '<img id="newImg" style="width:740px;height:300px;border:solid 1px darkgrey;">';
        }


    </script>

</body>

</html>