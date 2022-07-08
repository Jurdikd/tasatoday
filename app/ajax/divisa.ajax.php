<?php
include_once "../../libs/CurlTerror.libs.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";

#Definir variable para url de curl
define("URL_CURL", "https://exchangemonitor.net/ajax/widget-unique?country=ve&type=");

//Recibimos los datos por json
$get = UrlGetTerror::Getjson();

// verificamos si la verificación de la acción esta inciada y no esta vacia
if (!empty($get) && !empty($get['rates'])) {
    #guardamos la variable rates
    $rates = $get['rates'];
    #verificamos los datos entrando
    if ($get['rates'] === "rates") {

        //Obtener todas las tasas
        $promedio = CurlTerror::get_simple(URL_CURL . 'promedio');
        $enparalelo = CurlTerror::get_simple(URL_CURL . 'enparalelovzla');
        $airtm = CurlTerror::get_simple(URL_CURL . 'airtm');
        $dolartoday = CurlTerror::get_simple(URL_CURL . 'dolartoday');
        $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
        $reserve = CurlTerror::get_simple(URL_CURL . 'reserve');

        if (
            //verificar tasas
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
                    'rate' => FunctionTerror::cambiarComas_puntos($promedio['price']),
                    'percent' => $promedio['percent'],
                    'change' => $promedio['change'],
                    'color' => $promedio['color'],
                    'symbol' => $promedio['symbol'],
                ),
                'bcv' => array(
                    'name' => $bcv['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($bcv['price']),
                    'percent' => $bcv['percent'],
                    'change' => $bcv['change'],
                    'color' => $bcv['color'],
                    'symbol' => $bcv['symbol'],
                ),
                'enparalelovzla' => array(
                    'name' => $enparalelo['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($enparalelo['price']),
                    'percent' => $enparalelo['percent'],
                    'change' => $enparalelo['change'],
                    'color' => $enparalelo['color'],
                    'symbol' => $enparalelo['symbol'],
                ),
                'airtm' => array(
                    'name' => $airtm['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($airtm['price']),
                    'percent' => $airtm['percent'],
                    'change' => $airtm['change'],
                    'color' => $airtm['color'],
                    'symbol' => $airtm['symbol'],
                ),
                'dolartoday' => array(
                    'name' => $dolartoday['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($dolartoday['price']),
                    'percent' => $dolartoday['percent'],
                    'change' => $dolartoday['change'],
                    'color' => $dolartoday['color'],
                    'symbol' => $dolartoday['symbol'],
                ),
                'reserve' => array(
                    'name' => $reserve['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($reserve['price']),
                    'percent' => $reserve['percent'],
                    'change' => $reserve['change'],
                    'color' => $reserve['color'],
                    'symbol' => $reserve['symbol'],
                ),
                'zelle' => array(
                    'name' => 'ZELLE',
                    'rate' => number_format(FunctionTerror::cambiarComas_puntos($enparalelo['price']) - (FunctionTerror::cambiarComas_puntos($enparalelo['price']) * 0.02), 2),
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
    } else if ($get['rates'] === "promedio") {
        //Obtener tasa enparalelovzla
        $promedio = CurlTerror::get_simple(URL_CURL . 'promedio');

        if (is_array($promedio)) {
            $tasaDivisa  = array(
                'tasatoday' => array(
                    'name' => 'TasaToday',
                    'rate' => FunctionTerror::cambiarComas_puntos($promedio['price']),
                    'percent' => $promedio['percent'],
                    'change' => $promedio['change'],
                    'color' => $promedio['color'],
                    'symbol' => $promedio['symbol'],
                ),
            );

            $respuesta = $tasaDivisa; #Devolvemos datos en formato json
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . $promedio . " Not Found Forbidden - Error: SERVIDOR", true, $promedio);
            header("HTTP/1.0 " . $promedio . " Not Found Forbidden - Error: SERVIDOR");
            $respuesta = http_response_code($promedio) . " Forbidden - Error: SERVIDOR";
        }
    } else if ($get['rates'] === "enparalelovzla") {
        //Obtener tasa enparalelovzla
        $enparalelo = CurlTerror::get_simple(URL_CURL . 'enparalelovzla');

        if (is_array($enparalelo)) {
            $tasaDivisa  = array(
                'enparalelovzla' => array(
                    'name' => $enparalelo['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($enparalelo['price']),
                    'percent' => $enparalelo['percent'],
                    'change' => $enparalelo['change'],
                    'color' => $enparalelo['color'],
                    'symbol' => $enparalelo['symbol'],
                ),
            );

            $respuesta = $tasaDivisa; #Devolvemos datos en formato json
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . $enparalelo . " Not Found Forbidden - Error: SERVIDOR", true, $enparalelo);
            header("HTTP/1.0 " . $enparalelo . " Not Found Forbidden - Error: SERVIDOR");
            $respuesta = http_response_code($enparalelo) . " Forbidden - Error: SERVIDOR";
        }
    } else if ($get['rates'] === "enparalelo") {
        //Obtener tasa airtm
        $airtm = CurlTerror::get_simple(URL_CURL . 'airtm');

        if (is_array($airtm)) {
            $tasaDivisa  = array(
                'airtm' => array(
                    'name' => $airtm['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($airtm['price']),
                    'percent' => $airtm['percent'],
                    'change' => $airtm['change'],
                    'color' => $airtm['color'],
                    'symbol' => $airtm['symbol'],
                ),
            );

            $respuesta = $tasaDivisa; #Devolvemos datos en formato json
        } else {
            header($_SERVER['SERVER_PROTOCOL'] . $airtm . " Not Found Forbidden - Error: SERVIDOR", true, $airtm);
            header("HTTP/1.0 " . $airtm . " Not Found Forbidden - Error: SERVIDOR");
            $respuesta = http_response_code($airtm) . " Forbidden - Error: SERVIDOR";
        }
    } else {
        $respuesta = array('error' => array(
            'message' => array(
                'lang' => array(
                    'en' =>
                    "Error: Verification no correct",
                    'es' =>
                    "Error: La verificación no esta correcta"
                ),
            )
        ));
    }
} else {
    $respuesta = array('error' => array(
        'message' => array(
            'lang' => array(
                'en' =>
                "Error: Empty data",
                'es' =>
                "Error: Datos vacíos"
            )
        ),
    ));
}
header('Content-Type: application/json'); # declarar documento como json
//Devolvemos la respuesta formato json
echo json_encode($respuesta);
