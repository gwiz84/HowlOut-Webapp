// Variable to store the image in
var image = null;
var maxImageSize = 6000000;

// Tries to load the image from passed variable "imageToLoad"
// "element" is the DOM element to change the "background-image" for if file is loaded
// If succesful, the image is stored in "image" (base64 encoded)
function loadImageFromFile(imageToLoad, croppieElement) {
	if (imageToLoad.files && imageToLoad.files[0]) {

		if (imageToLoad.files[0].size > maxImageSize) {
			return '{"status": "ERROR", "message": "File is too big<br>Maximum filesize: ' + maxImageSize + ' bytes"}';
		} else if (!isFileTypeImage(imageToLoad)) {
			return '{"status": "ERROR", "message": "Not an image file"}';
		} else {
			var reader = new FileReader();

			reader.onload = function (e) {
				isFileAnImage(e.target.result, function(isImage) {
					if (isImage) {
						image = e.target.result;
						croppieElement.croppie('bind', {
							url: image,
						});
					} else {
						return '{"status": "ERROR", "message": "Not an image file"}';
					}
				});
				
				// element.css("background-image", "url("+image+")");
			};

			reader.readAsDataURL(imageToLoad.files[0]);
			return '{"status": "OK", "message": "File is OK"}';
		}
	}
}
// http://stackoverflow.com/questions/18299806/how-to-check-file-mime-type-with-javascript-before-upload

function isFileAnImage(url, callback) {
    var img = new Image();
    img.onload = function() { callback(true); };
    img.onerror = function() { callback(false); };
    img.src = url;
}

// Tries uploading picture file "newImage" using the Facebook ID "fbid"
// If the upload succeeds, the returned "message" contains the remote path to the uploaded image (imgPath).
// Otherwise, "message"/this function returns "false"
function uploadImage(newImage, fbid) {
	if (newImage != null) {
		return $.ajax({
			type: "POST",
			url: "_apiPictureUpload.php",
			async: false,
			data: { 'newImage' : newImage, 'fbid': fbid },
		});
	} else {
		console.log("HEJ!");
	}
}

function isFileTypeImage(file) {
	var validTypes = ['bmp', 'gif', 'jpg', 'jpeg', 'png'];
	if (validTypes.indexOf(file.files[0].type.split("/").pop()) > -1) {
		return true;
	}
	return false;
}

function createUploadModal(divForCroppedImg) {
	return $.confirm({
		title: 'Upload and crop new image',
		content: imgUpContent(),
		boxWidth: '770px',
		useBootstrap: false,
		closeIcon: true,
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
				croppieDiv.croppie('result', {
					type: 'base64',
					size: { width: 740 }
				}).then(function(croppedImage) {
					$("#newImg").attr('src', croppedImage);
					imageCropped = croppedImage;
				});
			});


		},
		buttons: {
			cancel: function() {
				imageCropped = null;
			},
			done: {
				btnClass: 'btn-green',
				action: function() {
					if (imageCropped != null) {
						divForCroppedImg.attr('src', imageCropped);    
					}
				}
			}
		}
	});
}

function imgUpContent() {
	return '<div><div id="croppieimg" style="width:740px;height:300px;border:solid 1px darkgrey;"></div>'+
	'<span><input id="imageInput" type="file" accept="image/*"></span><br><button id="btnCrop" class="btn btn-red">Crop</button><br><br><br>'+
	'<img id="newImg" style="width:740px;height:300px;border:solid 1px darkgrey;">';
}