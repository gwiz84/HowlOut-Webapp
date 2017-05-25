<?php
session_start();

$apiLink = $_POST['apiLink'];
$apiData = $_POST['apiData'];
$token = $_POST['token'];

if ($token == $_SESSION['token']) {
    try {
        $curl = curl_init($apiLink);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $apiData);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$_SESSION['apiKey'],
                'Content-Length: ' . strlen($apiData))
        );
        $content = curl_exec($curl);
        if ($content === FALSE)
            throw new Exception(curl_error($curl), curl_errno($curl));

        echo $content;
    } catch(Exception $e) {
        echo trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
    }
} else {
    echo 'FAILURE! Token: '.$token.', Session-token: '.$_SESSION['token'];
}
?>