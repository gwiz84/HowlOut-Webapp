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
	// var message = "false";
	if (newImage != null) {
		return $.ajax({
			type: "POST",
			url: "_apiPictureUpload.php",
			async: false,
			data: { 'newImage' : newImage, 'fbid': fbid },
			// success: function (data) {
			// 	message = JSON.parse(data);
			// 	console.log("success");
			// 	console.log(message.status);
			// },
			// // error: function () {
			// // },
			// done: function(data) {
			// 	message = JSON.parse(data);
			// 	// return message;
			// 	console.log("NU!");
			// }
		});
	}
	// return message;
}

function isFileTypeImage(file) {
	var validTypes = ['bmp', 'gif', 'jpg', 'jpeg', 'png'];
	if (validTypes.indexOf(file.files[0].type.split("/").pop()) > -1) {
		return true;
	}
	return false;
}