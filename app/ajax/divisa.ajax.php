<?php
include_once "../../libs/CurlTerror.libs.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";

#Definir variable para url de curl
define("URL_CURL", "https://exchangemonitor.net/ajax/widget-unique?country=ve&type=");
define("URL_CURL_BCV", "http://www.bcv.org.ve");
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
        $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);

        if (
            //verificar tasas
            is_array($promedio) &&
            is_array($enparalelo) &&
            is_array($airtm) &&
            is_array($dolartoday) &&
            is_array($bcv) &&
            is_array($reserve) &&
            is_array($bcvTasa)
        ) {
            $tasatoday  = array(
                'tasatoday' => array(
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
                ),
                'reserve' => array(
                    'name' => $reserve['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($reserve['price']),
                    'percent' => $reserve['percent'],
                    'change' => $reserve['change'],
                    'color' => $reserve['color'],
                    'symbol' => $reserve['symbol'],
                ),
                'euro' => array(
                    'name' => $bcvTasa['euro']['name'],
                    'rate' => $bcvTasa['euro']['rate'],
                    'percent' => $bcv['percent'],
                    'change' => $bcv['change'],
                    'color' => $bcv['color'],
                    'symbol' => $bcv['symbol'],
                ),
                'yuan' => array(
                    'name' => $bcvTasa['yuan']['name'],
                    'rate' => $bcvTasa['yuan']['rate'],
                    'percent' => $bcv['percent'],
                    'change' => $bcv['change'],
                    'color' => $bcv['color'],
                    'symbol' => $bcv['symbol'],
                ),
                'lira' => array(
                    'name' => $bcvTasa['lira']['name'],
                    'rate' => $bcvTasa['lira']['rate'],
                    'percent' => $bcv['percent'],
                    'change' => $bcv['change'],
                    'color' => $bcv['color'],
                    'symbol' => $bcv['symbol'],
                ),
                'rublo' => array(
                    'name' => $bcvTasa['rublo']['name'],
                    'rate' => $bcvTasa['rublo']['rate'],
                    'percent' => $bcv['percent'],
                    'change' => $bcv['change'],
                    'color' => $bcv['color'],
                    'symbol' => $bcv['symbol'],
                )

            );
            $respuesta = $tasatoday; #Devolvemos datos en formato json
        } else {


            $respuesta = array('error' => array(
                'message' => array(
                    'lang' => array(
                        'en' =>
                        "Error: OpenSSL SSL_connect: SSL_ERROR_SYSCALL in connection with server",
                        'es' =>
                        "Error: : OpenSSL SSL_connect: SSL_ERROR_SYSCALL en conexión con el servidor"
                    ),
                ),
            ));
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
            $respuesta = array('error' => array(
                'message' => array(
                    'lang' => array(
                        'en' =>
                        "Error: OpenSSL SSL_connect: SSL_ERROR_SYSCALL in connection with server",
                        'es' =>
                        "Error: : OpenSSL SSL_connect: SSL_ERROR_SYSCALL en conexión con el servidor"
                    ),
                ),
            ));
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
            $respuesta = array('error' => array(
                'message' => array(
                    'lang' => array(
                        'en' =>
                        "Error: OpenSSL SSL_connect: SSL_ERROR_SYSCALL in connection with server",
                        'es' =>
                        "Error: : OpenSSL SSL_connect: SSL_ERROR_SYSCALL en conexión con el servidor"
                    ),
                ),
            ));
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
            $respuesta = array('error' => array(
                'message' => array(
                    'lang' => array(
                        'en' =>
                        "Error: OpenSSL SSL_connect: SSL_ERROR_SYSCALL in connection with server",
                        'es' =>
                        "Error: : OpenSSL SSL_connect: SSL_ERROR_SYSCALL en conexión con el servidor"
                    ),
                ),
            ));
        }
    } else {
        $respuesta = array('error' => array(
            'message' => array(
                'lang' => array(
                    'en' =>
                    "Error: Rates no corrects",
                    'es' =>
                    "Error: Tasas no estan correctas"
                ),
            ),
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
