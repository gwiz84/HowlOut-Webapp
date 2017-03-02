<?php
session_start();

$apiLink = $_POST['apiLink'];
$apiData = $_POST['apiData'];
// $apiKey = $_SESSION['apiKey'];
$token = $_POST['token'];

if ($token == $_SESSION['token']) {
    try {

        $curl = curl_init($apiLink);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_POST, true);
//    curl_setopt($curl, CURLOPT_POSTFIELDS, $apiData);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'apiKey: z+XhFXu833xhhrwQ8Z9RxDrE6WvBER/DNzuQ90x0pdk=10153817903667221')
        );
        $content = curl_exec($curl);
        if ($content === FALSE)
            throw new Exception(curl_error($curl), curl_errno($curl));

        echo $content;

    } catch(Exception $e) {
        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
        E_USER_ERROR);
    }
}