<?php

// REQUIRED LINES FOR ALL AZURE STORAGE CONNECTIONS
require_once 'vendor/autoload.php';
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=howloutstorage;AccountKey=TMMeookNYRsJ3Eu1IywulUIoXynK9vev9ZGyIuYctFIdWfmNs0S/BgzehhL95y7pcURybgUz5/Ubkv95UMXaAA==;";

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
// REQUIRED LINES FOR ALL AZURE STORAGE CONNECTIONS

$container = "howlout";

try    {
    // List blobs.
	$blob_list = $blobRestProxy->listBlobs($container);
	$blobs = $blob_list->getBlobs();

	foreach($blobs as $blob)
	{
		echo "<div class='blob'>".$blob->getName().": ".$blob->getUrl()."&nbsp;<button class='btn-delete' data-blobname='".$blob->getName()."'>Delete</button><br><br></div>";
	}
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
?>
<html>
<body>
	<?php include_once "p_loadScripts.html"; ?>
	<script>
		var fbid = "10155099965673493";
		$("body").on("click", ".btn-delete", function() {
			var blobName = $(this).data("blobname");
			// alert(blobName);
			deleteBlob(blobName, fbid);
			($(this).parent()).remove();
		});
		
		function deleteBlob(blobName, fbid) {
			$.ajax({
				type: "post",
				url: "_apiPictureDelete.php",
				async: false,
				data: { 'imageUrl' : blobName, 'fbid': fbid },
				success: function (data) {
					return true;
				},
				error: function () {
					return false;
					alert("An unexpected error occurred. Please try again later.");
				}
			});
		}
	</script>
</body>
</html>
