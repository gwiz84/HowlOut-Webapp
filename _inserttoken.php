<?php

$peber = "hidalgoisahorse1923";
$token = md5(uniqid(rand().$peber, TRUE));
$_SESSION['token'] = $token;
echo '<input class="hidden token" data-token="'.$token.'">';

?>