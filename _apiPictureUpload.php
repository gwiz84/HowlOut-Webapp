<?php

// REQUIRED LINES FOR ALL AZURE STORAGE CONNECTIONS
require_once 'vendor/autoload.php';
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=howloutstorage;AccountKey=TMMeookNYRsJ3Eu1IywulUIoXynK9vev9ZGyIuYctFIdWfmNs0S/BgzehhL95y7pcURybgUz5/Ubkv95UMXaAA==;";

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
// REQUIRED LINES FOR ALL AZURE STORAGE CONNECTIONS

$container = "howlout";
$finalpath = "https://howloutstorage.blob.core.windows.net/howlout/";

$newfile = $_POST['newImage']; // base64 encoded

$content = fopen($newfile, "r");

$fbid = $_POST['fbid'];

$date = new DateTime();
$current = $date->format('d-m-Y H:i:s');
$blob_name = $fbid . "." . $current;

$MAXIMUM_FILESIZE = 6 * 1024 * 1024;

// Strip the base64 header from '$newfile'
$image_large = substr($newfile, 22);
// Decode the base64 string now stored in '$image_large'
$image_large = base64_decode($image_large);
// Initialize variables for medium and small images
$image_med = null;
$image_small = null;

// Create a new variable '$im' by converting the string '$image_large'
$im = imagecreatefromstring($image_large);
// If the above operation succeeds, meaning '$im' is an actual image, proceed with resizing
if ($im !== false) {
    $width_s = 247;
    $width_m = 494;
    $height_s = 100;
    $height_m = 200;
    list($width_org, $height_org) = getimagesize($newfile);
    $image_m = imagecreatetruecolor($width_m, $height_m);
    $image_s = imagecreatetruecolor($width_s, $height_s);
    imagecopyresampled($image_m, $im, 0, 0, 0, 0, $width_m, $height_m, $width_org, $height_org);
    imagecopyresampled($image_s, $im, 0, 0, 0, 0, $width_s, $height_s, $width_org, $height_org);
    ob_start();
    imagepng($image_m);
    $image_med = ob_get_clean();
    ob_start();
    imagepng($image_s);
    $image_small = ob_get_clean();
}

$imgdata = file_get_contents($newfile);
$filesize = strlen($imgdata);
$filetype = exif_imagetype($newfile);

// NEEDS EDITING
// If the upload succeeds, the returned "message" contains the remote path to the uploaded image (imgPath).
// Otherwise, "message"/this function returns "false"
if (!($filetype >= 1 && $filetype <= 3) && !getimagesizefromstring($imgdata)) {
	echo '{"status": "ERROR", "errormessage": "Not an image file"}';
} else {
	try {
    //Upload blob
        $name_small = $blob_name . '.small';
        $name_medium = $blob_name . '.medium';
        $name_large = $blob_name . '.large';
        $path_s = $finalpath . $name_small;
        $path_m = $finalpath . $name_medium;
        $path_l = $finalpath . $name_large;
        $blobRestProxy->createBlockBlob($container, $name_small, $image_small);
        $blobRestProxy->createBlockBlob($container, $name_medium, $image_med);
		$blobRestProxy->createBlockBlob($container, $name_large, $image_large);
		echo '{"status": "OK", "imgPath_l": "' . $path_l .'", "imgPath_m": "' . $path_m .'", "imgPath_s": "' . $path_s .'"}';
	}
	catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
		$code = $e->getCode();
		$error_message = $e->getMessage();
		echo '{"status": "ERROR", "errormessage": ".$error_message."}';
		// echo $code.": ".$error_message."<br />"; // Standard response
	}	
}
?>