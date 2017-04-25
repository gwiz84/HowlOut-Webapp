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

$imgdata = file_get_contents($newfile);
$filesize = strlen($imgdata);
$filetype = exif_imagetype($newfile);
if (!($filetype >= 1 && $filetype <= 3) && !getimagesizefromstring($imgdata)) {
	echo '{"status": "ERROR", "errormessage": "Not an image file"}';
} else {
	try {
    //Upload blob
		$fullpath = $finalpath . $blob_name;
		$blobRestProxy->createBlockBlob($container, $blob_name, $content);
		echo '{"status": "OK", "imgPath": "' . $fullpath .'"}';
	}
	catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
		$code = $e->getCode();
		$error_message = $e->getMessage();
		echo $code.": ".$error_message."<br />";
	}	
}