<?php
session_start();

$apiLink = $_POST['apiLink'];
$token = $_POST['token'];
$name = $_POST['name'];
$_SESSION['name'] = $name;

if ($token == $_SESSION['token']) {
    try {
        $curl = curl_init($apiLink);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $apiLink);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $content = curl_exec($curl);
        if ($content === FALSE)
            throw new Exception(curl_error($curl), curl_errno($curl));

        $token = json_decode($content)->token;
        $fbid = json_decode($content)->id;
        $_SESSION['apiKey'] = $token;
        $_SESSION['facebookId'] = $fbid;
        $_SESSION['loggedIn'] = true;
        echo "success";
    } catch(Exception $e) {
        echo trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);
    }
}
?>