<?php
include_once "../../libs/CurlTerror.libs.php";
include_once "../../libs/FunctionTerror.libs.libs.php";
function cambiarComas_puntos($num)
{
    # Cambiar comas por puntos...
    $convertido = str_replace(',', '.', $num);
    return $convertido;
}
$urlCurl = "https://exchangemonitor.net/ajax/widget-unique?country=ve&type=";
$promedio = CurlTerror::get_simple($urlCurl . 'promedio');
$enparalelo = CurlTerror::get_simple($urlCurl . 'enparalelovzla');
$airtm = CurlTerror::get_simple($urlCurl . 'airtm');
$dolartoday = CurlTerror::get_simple($urlCurl . 'dolartoday');
$bcv = CurlTerror::get_simple($urlCurl . 'bcv');
$reserve = CurlTerror::get_simple($urlCurl . 'reserve');
header('Content-Type: application/json'); # declarar json
$result = $promedio;




//echo var_dump($promedio);
if (
    is_array($promedio) &&
    is_array($enparalelo) &&
    is_array($airtm) &&
    is_array($dolartoday) &&
    is_array($bcv) &&
    is_array($reserve)
) {

    $tasatoday  = array(
        'Tasatoday' => array(
            'name' => 'TasaToday',
            'price' => cambiarComas_puntos($promedio['price']),
            'percent' => $promedio['percent'],
            'change' => $promedio['change'],
            'color' => $promedio['color'],
            'symbol' => $promedio['symbol'],
        ),
        'enparalelovzla' => array(
            'name' => $enparalelo['name'],
            'price' => cambiarComas_puntos($enparalelo['price']),
            'percent' => $enparalelo['percent'],
            'change' => $enparalelo['change'],
            'color' => $enparalelo['color'],
            'symbol' => $enparalelo['symbol'],
        ),
        'airtm' => array(
            'name' => $airtm['name'],
            'price' => cambiarComas_puntos($airtm['price']),
            'percent' => $airtm['percent'],
            'change' => $airtm['change'],
            'color' => $airtm['color'],
            'symbol' => $airtm['symbol'],
        ),
        'dolartoday' => array(
            'name' => $dolartoday['name'],
            'price' => cambiarComas_puntos($dolartoday['price']),
            'percent' => $dolartoday['percent'],
            'change' => $dolartoday['change'],
            'color' => $dolartoday['color'],
            'symbol' => $dolartoday['symbol'],
        ),
        'bcv' => array(
            'name' => $bcv['name'],
            'price' => cambiarComas_puntos($bcv['price']),
            'percent' => $bcv['percent'],
            'change' => $bcv['change'],
            'color' => $bcv['color'],
            'symbol' => $bcv['symbol'],
        ),
        'reserve' => array(
            'name' => $reserve['name'],
            'price' => cambiarComas_puntos($reserve['price']),
            'percent' => $reserve['percent'],
            'change' => $reserve['change'],
            'color' => $reserve['color'],
            'symbol' => $reserve['symbol'],
        ),
        'zelle' => array(
            'name' => 'ZELLE',
            'price' => number_format(cambiarComas_puntos($enparalelo['price']) - (cambiarComas_puntos($enparalelo['price']) * 0.02), 2),
            'percent' => $enparalelo['percent'],
            'change' => $enparalelo['change'],
            'color' => $enparalelo['color'],
            'symbol' => $enparalelo['symbol'],
        )
    );

    $respuesta = $tasatoday; #Devolvemos datos en formato json
} else {
    header($_SERVER['SERVER_PROTOCOL'] . $dolarToday . " Not Found Forbidden - Error: SERVIDOR", true, $dolarToday);
    header("HTTP/1.0 " . $dolarToday . " Not Found Forbidden - Error: SERVIDOR");
    $respuesta = http_response_code($dolarToday) . " Forbidden - Error: SERVIDOR";
}
echo json_encode($respuesta);
