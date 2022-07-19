<?php
include_once "../config/config.inc.php";
include_once "../../libs/CurlTerror.libs.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";

$verifyHost = HTTPS . DOMINIO . ":" . PUERTO;

#Definir variable para url de curl
define("URL_CURL", "https://exchangemonitor.net/ajax/widget-unique?country=ve&type=");
define("URL_CURL_BCV", "http://www.bcv.org.ve");
//Recibimos los datos por json
$get = UrlGetTerror::Getjson();
if (!empty($_SERVER['HTTP_ORIGIN'])) {
    # comprobanos el origin...
    $origin = $_SERVER['HTTP_ORIGIN'];
    // verificamos si get es correcto y esta inciada y no vacia
    if (!empty($get) && !empty($get['rates']) && $verifyHost == $origin) {
        #guardamos la variable rates
        $rates = $get['rates'];

        #verificamos los datos que entran
        if ($get['rates'] === "rates") {

            //Obtener todas las tasas
            $promedio = CurlTerror::get_simple(URL_CURL . 'promedio');
            $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
            $enparalelo = CurlTerror::get_simple(URL_CURL . 'enparalelovzla');
            $airtm = CurlTerror::get_simple(URL_CURL . 'airtm');
            $localbitcoins = CurlTerror::get_simple(URL_CURL . 'localbitcoins');
            $reserve = CurlTerror::get_simple(URL_CURL . 'reserve');
            $dolartoday = CurlTerror::get_simple(URL_CURL . 'dolartoday');
            $skrill = CurlTerror::get_simple(URL_CURL . 'monedero-skrill');
            $amazon = CurlTerror::get_simple(URL_CURL . 'monedero-amazon');
            $paypal = CurlTerror::get_simple(URL_CURL . 'monedero-paypal');
            $zoom = CurlTerror::get_simple(URL_CURL . 'remesas-zoom');
            $yadio = CurlTerror::get_simple(URL_CURL . 'yadio');
            $petro = CurlTerror::get_simple(URL_CURL . 'petro');
            $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);

            if (
                //verificar tasas
                is_array($promedio) &&
                is_array($bcv) &&
                is_array($enparalelo) &&
                is_array($airtm) &&
                is_array($localbitcoins) &&
                is_array($reserve) &&
                is_array($dolartoday) &&
                is_array($skrill) &&
                is_array($amazon) &&
                is_array($paypal) &&
                is_array($zoom) &&
                is_array($yadio) &&
                is_array($petro) &&
                is_array($bcvTasa)
            ) {
                $tasatoday  = array(
                    'tasatoday' => array(
                        'name' => 'TasaToday',
                        'shortName' => 'tasatoday',
                        'rate' => FunctionTerror::cambiarComas_puntos($promedio['price']),
                        'percent' => $promedio['percent'],
                        'change' => $promedio['change'],
                        'color' => $promedio['color'],
                        'symbol' => $promedio['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'bcv' => array(
                        'name' => $bcv['name'],
                        'shortName' => 'bcv',
                        'rate' => FunctionTerror::cambiarComas_puntos($bcv['price']),
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'enparalelovzla' => array(
                        'name' => $enparalelo['name'],
                        'shortName' => 'enparalelovzla',
                        'rate' => FunctionTerror::cambiarComas_puntos($enparalelo['price']),
                        'percent' => $enparalelo['percent'],
                        'change' => $enparalelo['change'],
                        'color' => $enparalelo['color'],
                        'symbol' => $enparalelo['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'airtm' => array(
                        'name' => $airtm['name'],
                        'shortName' => 'airtm',
                        'rate' => FunctionTerror::cambiarComas_puntos($airtm['price']),
                        'percent' => $airtm['percent'],
                        'change' => $airtm['change'],
                        'color' => $airtm['color'],
                        'symbol' => $airtm['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'localbitcoins' => array(
                        'name' => $localbitcoins['name'],
                        'shortName' => 'localbitcoins',
                        'rate' => FunctionTerror::cambiarComas_puntos($localbitcoins['price']),
                        'percent' => $localbitcoins['percent'],
                        'change' => $localbitcoins['change'],
                        'color' => $localbitcoins['color'],
                        'symbol' => $localbitcoins['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'reserve' => array(
                        'name' => $reserve['name'],
                        'shortName' => 'reserve',
                        'rate' => FunctionTerror::cambiarComas_puntos($reserve['price']),
                        'percent' => $reserve['percent'],
                        'change' => $reserve['change'],
                        'color' => $reserve['color'],
                        'symbol' => $reserve['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'dolartoday' => array(
                        'name' => $dolartoday['name'],
                        'shortName' => 'dolartoday',
                        'rate' => FunctionTerror::cambiarComas_puntos($dolartoday['price']),
                        'percent' => $dolartoday['percent'],
                        'change' => $dolartoday['change'],
                        'color' => $dolartoday['color'],
                        'symbol' => $dolartoday['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'skrill' => array(
                        'name' => $skrill['name'],
                        'shortName' => 'skrill',
                        'rate' => FunctionTerror::cambiarComas_puntos($skrill['price']),
                        'percent' => $skrill['percent'],
                        'change' => $skrill['change'],
                        'color' => $skrill['color'],
                        'symbol' => $skrill['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'amazon' => array(
                        'name' => $amazon['name'],
                        'shortName' => 'amazon',
                        'rate' => FunctionTerror::cambiarComas_puntos($amazon['price']),
                        'percent' => $amazon['percent'],
                        'change' => $amazon['change'],
                        'color' => $amazon['color'],
                        'symbol' => $amazon['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'paypal' => array(
                        'name' => $paypal['name'],
                        'shortName' => 'paypal',
                        'rate' => FunctionTerror::cambiarComas_puntos($paypal['price']),
                        'percent' => $paypal['percent'],
                        'change' => $paypal['change'],
                        'color' => $paypal['color'],
                        'symbol' => $paypal['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'zoom' => array(
                        'name' => $zoom['name'],
                        'shortName' => 'zoom',
                        'rate' => FunctionTerror::cambiarComas_puntos($zoom['price']),
                        'percent' => $zoom['percent'],
                        'change' => $zoom['change'],
                        'color' => $zoom['color'],
                        'symbol' => $zoom['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'yadio' => array(
                        'name' => $yadio['name'],
                        'shortName' => 'yadio',
                        'rate' => FunctionTerror::cambiarComas_puntos($yadio['price']),
                        'percent' => $yadio['percent'],
                        'change' => $yadio['change'],
                        'color' => $yadio['color'],
                        'symbol' => $yadio['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'petro' => array(
                        'name' => $petro['name'],
                        'shortName' => 'petro',
                        'rate' => FunctionTerror::cambiarComas_puntos($petro['price']),
                        'percent' => $petro['percent'],
                        'change' => $petro['change'],
                        'color' => $petro['color'],
                        'symbol' => $petro['symbol'],
                        'to' => 'ves',
                        'iso' => 'petro',
                    ),
                    'zelle' => array(
                        'name' => 'ZELLE',
                        'shortName' => 'zelle',
                        'rate' => number_format(FunctionTerror::cambiarComas_puntos($enparalelo['price']) - (FunctionTerror::cambiarComas_puntos($enparalelo['price']) * 0.01), 2),
                        'percent' => $enparalelo['percent'],
                        'change' => $enparalelo['change'],
                        'color' => $enparalelo['color'],
                        'symbol' => $enparalelo['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
                    ),
                    'euro' => array(
                        'name' => $bcvTasa['euro']['name'],
                        'shortName' => 'euro',
                        'rate' => $bcvTasa['euro']['rate'],
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'eur',
                    ),
                    'yuan' => array(
                        'name' => $bcvTasa['yuan']['name'],
                        'shortName' => 'yuan',
                        'rate' => $bcvTasa['yuan']['rate'],
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'cny',
                    ),
                    'lira' => array(
                        'name' => $bcvTasa['lira']['name'],
                        'shortName' => 'lira',
                        'rate' => $bcvTasa['lira']['rate'],
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'try',
                    ),
                    'rublo' => array(
                        'name' => $bcvTasa['rublo']['name'],
                        'shortName' => 'rublo',
                        'rate' => $bcvTasa['rublo']['rate'],
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'rub',
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
        } else if ($get['rates'] === "tasatoday") {
            //Obtener tasa enparalelovzla
            $tasatoday = CurlTerror::get_simple(URL_CURL . 'promedio');

            if (is_array($tasatoday)) {
                $tasaDivisa  = array(
                    'tasatoday' => array(
                        'name' => 'TasaToday',
                        'shortName' => 'tasatoday',
                        'rate' => FunctionTerror::cambiarComas_puntos($tasatoday['price']),
                        'percent' => $tasatoday['percent'],
                        'change' => $tasatoday['change'],
                        'color' => $tasatoday['color'],
                        'symbol' => $tasatoday['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "bcv") {
            //Obtener tasa bcv
            $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');

            if (is_array($bcv)) {
                $tasaDivisa  = array(
                    'bcv' => array(
                        'name' => $bcv['name'],
                        'shortName' => 'bcv',
                        'rate' => FunctionTerror::cambiarComas_puntos($bcv['price']),
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
                        'shortName' => 'enparalelovzla',
                        'rate' => FunctionTerror::cambiarComas_puntos($enparalelo['price']),
                        'percent' => $enparalelo['percent'],
                        'change' => $enparalelo['change'],
                        'color' => $enparalelo['color'],
                        'symbol' => $enparalelo['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "airtm") {
            //Obtener tasa airtm
            $airtm = CurlTerror::get_simple(URL_CURL . 'airtm');

            if (is_array($airtm)) {
                $tasaDivisa  = array(
                    'airtm' => array(
                        'name' => $airtm['name'],
                        'shortName' => 'airtm',
                        'rate' => FunctionTerror::cambiarComas_puntos($airtm['price']),
                        'percent' => $airtm['percent'],
                        'change' => $airtm['change'],
                        'color' => $airtm['color'],
                        'symbol' => $airtm['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "localbitcoins") {
            //Obtener tasa localbitcoins
            $localbitcoins = CurlTerror::get_simple(URL_CURL . 'localbitcoins');

            if (is_array($localbitcoins)) {
                $tasaDivisa  = array(
                    'localbitcoins' => array(
                        'name' => $localbitcoins['name'],
                        'shortName' => 'localbitcoins',
                        'rate' => FunctionTerror::cambiarComas_puntos($localbitcoins['price']),
                        'percent' => $localbitcoins['percent'],
                        'change' => $localbitcoins['change'],
                        'color' => $localbitcoins['color'],
                        'symbol' => $localbitcoins['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "reserve") {
            //Obtener tasa reserve
            $reserve = CurlTerror::get_simple(URL_CURL . 'reserve');

            if (is_array($reserve)) {
                $tasaDivisa  = array(
                    'reserve' => array(
                        'name' => $reserve['name'],
                        'shortName' => 'reserve',
                        'rate' => FunctionTerror::cambiarComas_puntos($reserve['price']),
                        'percent' => $reserve['percent'],
                        'change' => $reserve['change'],
                        'color' => $reserve['color'],
                        'symbol' => $reserve['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "dolartoday") {
            //Obtener tasa dolartoday
            $dolartoday = CurlTerror::get_simple(URL_CURL . 'dolartoday');

            if (is_array($dolartoday)) {
                $tasaDivisa  = array(
                    'dolartoday' => array(
                        'name' => $dolartoday['name'],
                        'shortName' => 'dolartoday',
                        'rate' => FunctionTerror::cambiarComas_puntos($dolartoday['price']),
                        'percent' => $dolartoday['percent'],
                        'change' => $dolartoday['change'],
                        'color' => $dolartoday['color'],
                        'symbol' => $dolartoday['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "skrill") {
            //Obtener tasa skrill
            $skrill = CurlTerror::get_simple(URL_CURL . 'monedero-skrill');

            if (is_array($skrill)) {
                $tasaDivisa  = array(
                    'skrill' => array(
                        'name' => $skrill['name'],
                        'shortName' => 'skrill',
                        'rate' => FunctionTerror::cambiarComas_puntos($skrill['price']),
                        'percent' => $skrill['percent'],
                        'change' => $skrill['change'],
                        'color' => $skrill['color'],
                        'symbol' => $skrill['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "amazon") {
            //Obtener tasa amazon
            $amazon = CurlTerror::get_simple(URL_CURL . 'monedero-amazon');

            if (is_array($amazon)) {
                $tasaDivisa  = array(
                    'amazon' => array(
                        'name' => $amazon['name'],
                        'shortName' => 'amazon',
                        'rate' => FunctionTerror::cambiarComas_puntos($amazon['price']),
                        'percent' => $amazon['percent'],
                        'change' => $amazon['change'],
                        'color' => $amazon['color'],
                        'symbol' => $amazon['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "paypal") {
            //Obtener tasa paypal
            $paypal = CurlTerror::get_simple(URL_CURL . 'monedero-paypal');

            if (is_array($paypal)) {
                $tasaDivisa  = array(
                    'paypal' => array(
                        'name' => $paypal['name'],
                        'shortName' => 'paypal',
                        'rate' => FunctionTerror::cambiarComas_puntos($paypal['price']),
                        'percent' => $paypal['percent'],
                        'change' => $paypal['change'],
                        'color' => $paypal['color'],
                        'symbol' => $paypal['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "zoom") {
            //Obtener tasa zoom
            $zoom = CurlTerror::get_simple(URL_CURL . 'remesas-zoom');

            if (is_array($zoom)) {
                $tasaDivisa  = array(
                    'zoom' => array(
                        'name' => $zoom['name'],
                        'shortName' => 'zoom',
                        'rate' => FunctionTerror::cambiarComas_puntos($zoom['price']),
                        'percent' => $zoom['percent'],
                        'change' => $zoom['change'],
                        'color' => $zoom['color'],
                        'symbol' => $zoom['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "yadio") {
            //Obtener tasa yadio
            $yadio = CurlTerror::get_simple(URL_CURL . 'yadio');

            if (is_array($yadio)) {
                $tasaDivisa  = array(
                    'yadio' => array(
                        'name' => $yadio['name'],
                        'shortName' => 'yadio',
                        'rate' => FunctionTerror::cambiarComas_puntos($yadio['price']),
                        'percent' => $yadio['percent'],
                        'change' => $yadio['change'],
                        'color' => $yadio['color'],
                        'symbol' => $yadio['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "petro") {
            //Obtener tasa petro
            $petro = CurlTerror::get_simple(URL_CURL . 'petro');

            if (is_array($petro)) {
                $tasaDivisa  = array(
                    'petro' => array(
                        'name' => $petro['name'],
                        'shortName' => 'petro',
                        'rate' => FunctionTerror::cambiarComas_puntos($petro['price']),
                        'percent' => $petro['percent'],
                        'change' => $petro['change'],
                        'color' => $petro['color'],
                        'symbol' => $petro['symbol'],
                        'to' => 'ves',
                        'iso' => 'petro',
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
        } else if ($get['rates'] === "zelle") {
            //Obtener tasa zelle
            $zelle = CurlTerror::get_simple(URL_CURL . 'enparalelovzla');

            if (is_array($zelle)) {
                $tasaDivisa  = array(
                    'zelle' => array(
                        'name' => 'ZELLE',
                        'shortName' => 'zelle',
                        'rate' => number_format(FunctionTerror::cambiarComas_puntos($zelle['price']) - (FunctionTerror::cambiarComas_puntos($zelle['price']) * 0.01), 2),
                        'percent' => $zelle['percent'],
                        'change' => $zelle['change'],
                        'color' => $zelle['color'],
                        'symbol' => $zelle['symbol'],
                        'to' => 'ves',
                        'iso' => 'usd',
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
        } else if ($get['rates'] === "euro") {
            //Obtener tasa euro
            $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);
            $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
            if (is_array($bcvTasa) && is_array($bcv)) {
                $tasaDivisa  = array(
                    'euro' => array(
                        'name' => $bcvTasa['euro']['name'],
                        'shortName' => 'euro',
                        'rate' => $bcvTasa['euro']['rate'],
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'eur',
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
        } else if ($get['rates'] === "yuan") {
            //Obtener tasa yuan
            $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);
            $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
            if (is_array($bcvTasa) && is_array($bcv)) {
                $tasaDivisa  = array(
                    'yuan' => array(
                        'name' => $bcvTasa['yuan']['name'],
                        'shortName' => 'yuan',
                        'rate' => $bcvTasa['yuan']['rate'],
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'cny',
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
        } else if ($get['rates'] === "lira") {
            //Obtener tasa lira
            $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);
            $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
            if (is_array($bcvTasa) && is_array($bcv)) {
                $tasaDivisa  = array(
                    'lira' => array(
                        'name' => $bcvTasa['lira']['name'],
                        'shortName' => 'lira',
                        'rate' => $bcvTasa['lira']['rate'],
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'try',
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
        } else if ($get['rates'] === "rublo") {
            //Obtener tasa rublo
            $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);
            $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
            if (is_array($bcvTasa) && is_array($bcv)) {
                $tasaDivisa  = array(
                    'rublo' => array(
                        'name' => $bcvTasa['rublo']['name'],
                        'shortName' => 'rublo',
                        'rate' => $bcvTasa['rublo']['rate'],
                        'percent' => $bcv['percent'],
                        'change' => $bcv['change'],
                        'color' => $bcv['color'],
                        'symbol' => $bcv['symbol'],
                        'to' => 'ves',
                        'iso' => 'rub',
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
} else {
    $respuesta = array('error' => array(
        'message' => array(
            'lang' => array(
                'en' =>
                "Error: Empty url on ORIGIN",
                'es' =>
                "Error: Url vacío en ORIGIN"
            )
        ),
    ));
}
header('Content-Type: application/json'); # declarar documento como json
//Devolvemos la respuesta formato json
echo json_encode($respuesta);