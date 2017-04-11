<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Picture upload test</title>

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <div class="fbid" data-fbid="<?php echo $_SESSION['facebookId'] ?>" style="display:none;"></div>
    <div class="image" data-img="blah" style="height: 400px; text-align: center;
    background-repeat:no-repeat;background-image: url('https://howloutstorage.blob.core.windows.net/howlout/1003281519742082.04-01-2017 21:17:29');"></div>
    <div class="stuff">
        Picture:
        <input style="display: block;" id="imageInput" type="file" name="photo">
    </div>
    <br>
    <button id="btnUpload">Upload</button>

    <?php include_once "p_loadScripts.html"; ?>

    <script>
        var fbid = $(".fbid").data("fbid");
        var image = "";
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    image = e.target.result;
                    $(".image").css("background-image", "url("+image+")");
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function uploadImage(newImage, fbid) {
            var message = "false";
            $.ajax({
                type: "post",
                url: "_apiPictureUpload.php",
                async: false,
                data: { 'newImage' : image, 'fbid': fbid },
                success: function (data) {
                    // var JSONdata = JSON.parse(data);
                    message = JSON.parse(data).imgPath;
                },
                error: function () {
                }
            });
            return message;
        }

        $("#btnUpload").click(function() {
             var succ = uploadImage(image, fbid);
             alert(succ);
             // if (succ) {
             //    alert("WEE!");
             // }
        });

        $("#imageInput").change(function(){
            readURL(this);
        });

    </script>

</body>

</html>