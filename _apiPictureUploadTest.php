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

$content = fopen("c:\hat.png", "r");

$fbid = "10155099965673493";

$date = new DateTime();
$current = $date->format('d-m-Y H:i:s');
$blob_name = $fbid . "." . $current;

// echo "Filename will be: " . $blob_name;

try {
    //Upload blob
    $blobRestProxy->createBlockBlob($container, $blob_name, $content);
    echo "Upload succesful!<br>";
    echo $finalpath . $blob_name."<br>";
    echo "<img src='" . $finalpath . $blob_name . "'>";
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}