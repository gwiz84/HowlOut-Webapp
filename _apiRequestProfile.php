<?php
session_start();

$apiLink = $_POST['apiLink'];
$apiData = $_POST['apiData'];
$token = $_POST['token'];
$_SESSION['facebookId'] = json_decode($apiData)->ProfileId;


if ($token == $_SESSION['token']) {
    try {

        $curl = curl_init($apiLink);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $apiData);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($apiData))
        );
        $content = curl_exec($curl);
        if (FALSE === $content)
            throw new Exception(curl_error($curl), curl_errno($curl));

        $_SESSION['loggedIn'] = true;
        $_SESSION['apiKey'] = $content;
        echo "success";
    } catch(Exception $e) {

        echo trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);

    }
}









