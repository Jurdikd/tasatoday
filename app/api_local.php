<?php
include_once "../libs/CurlTerror.inc.php";
$result = CurlTerror::get_page('https://localbitcoins.com/bitcoinaverage/ticker-all-currencies');
header('Content-Type: application/json'); # declarar json
echo $result;
