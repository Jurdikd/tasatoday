<?php
include_once "libs/CurlTerror.libs.php";
define("URL_CURL_BCV", "http://www.bcv.org.ve");
//$bcv = CurlTerror::get_bcv(URL_CURL_BCV);



if (($data = @file_get_contents(URL_CURL_BCV)) === false) {
    $error = error_get_last();
    // echo "HTTP request failed. Error was: " . $error['message'] . "<br>";
    $data = array(
        'euro' => array(
            'name' => 'Euro',
            'rate' => "..."
        ),
        'yuan' => array(
            'name' => 'Yuan',
            'rate' => "..."
        ),
        'lira' => array(
            'name' => 'Lira',
            'rate' => "..."
        ),
        'rublo' => array(
            'name' => 'Rublo',
            'rate' => "...",
        ),
        'dolar' => array(
            'name' => 'Dolar',
            'rate' => "..."
        ),
    );
    echo var_dump($data);
} else {
    echo "Everything went better than expected";
}