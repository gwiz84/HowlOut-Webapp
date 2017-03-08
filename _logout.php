<?php

echo "lort";
die();
$token = $_POST['token'];
if ($token == $_SESSION['token']) {
    unset($_SESSION['loggedIn']);
    unset($_SESSION['apiKey']);
    echo "success";
}

