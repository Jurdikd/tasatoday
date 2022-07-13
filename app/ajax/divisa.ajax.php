<?php
include_once "../../libs/CurlTerror.libs.php";
include_once "../../libs/FunctionTerror.libs.php";
include_once "../../libs/UrlGetTerror.libs.php";

#Definir variable para url de curl
define("URL_CURL", "https://exchangemonitor.net/ajax/widget-unique?country=ve&type=");
define("URL_CURL_BCV", "http://www.bcv.org.ve");
//Recibimos los datos por json
$get = UrlGetTerror::Getjson();

// verificamos si get es correcto y esta inciada y no vacia
if (!empty($get) && !empty($get['rates'])) {
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
        $zoom = CurlTerror::get_simple(URL_CURL . 'remesas-zoom');
        $yadio = CurlTerror::get_simple(URL_CURL . 'yadio');
        $citibank = CurlTerror::get_simple(URL_CURL . 'banco-citibank');
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
            is_array($zoom) &&
            is_array($yadio) &&
            is_array($citibank) &&
            is_array($petro) &&
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
                'localbitcoins' => array(
                    'name' => $localbitcoins['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($localbitcoins['price']),
                    'percent' => $localbitcoins['percent'],
                    'change' => $localbitcoins['change'],
                    'color' => $localbitcoins['color'],
                    'symbol' => $localbitcoins['symbol'],
                ),
                'reserve' => array(
                    'name' => $reserve['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($reserve['price']),
                    'percent' => $reserve['percent'],
                    'change' => $reserve['change'],
                    'color' => $reserve['color'],
                    'symbol' => $reserve['symbol'],
                ),
                'dolartoday' => array(
                    'name' => $dolartoday['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($dolartoday['price']),
                    'percent' => $dolartoday['percent'],
                    'change' => $dolartoday['change'],
                    'color' => $dolartoday['color'],
                    'symbol' => $dolartoday['symbol'],
                ),
                'skrill' => array(
                    'name' => $skrill['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($skrill['price']),
                    'percent' => $skrill['percent'],
                    'change' => $skrill['change'],
                    'color' => $skrill['color'],
                    'symbol' => $skrill['symbol'],
                ),
                'amazon' => array(
                    'name' => $amazon['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($amazon['price']),
                    'percent' => $amazon['percent'],
                    'change' => $amazon['change'],
                    'color' => $amazon['color'],
                    'symbol' => $amazon['symbol'],
                ),
                'zoom' => array(
                    'name' => $zoom['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($zoom['price']),
                    'percent' => $zoom['percent'],
                    'change' => $zoom['change'],
                    'color' => $zoom['color'],
                    'symbol' => $zoom['symbol'],
                ),
                'yadio' => array(
                    'name' => $yadio['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($yadio['price']),
                    'percent' => $yadio['percent'],
                    'change' => $yadio['change'],
                    'color' => $yadio['color'],
                    'symbol' => $yadio['symbol'],
                ),
                'citibank' => array(
                    'name' => $citibank['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($citibank['price']),
                    'percent' => $citibank['percent'],
                    'change' => $citibank['change'],
                    'color' => $citibank['color'],
                    'symbol' => $citibank['symbol'],
                ),
                'petro' => array(
                    'name' => $petro['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($petro['price']),
                    'percent' => $petro['percent'],
                    'change' => $petro['change'],
                    'color' => $petro['color'],
                    'symbol' => $petro['symbol'],
                ),
                'zelle' => array(
                    'name' => 'ZELLE',
                    'rate' => number_format(FunctionTerror::cambiarComas_puntos($enparalelo['price']) - (FunctionTerror::cambiarComas_puntos($enparalelo['price']) * 0.02), 2),
                    'percent' => $enparalelo['percent'],
                    'change' => $enparalelo['change'],
                    'color' => $enparalelo['color'],
                    'symbol' => $enparalelo['symbol'],
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
    }else if ($get['rates'] === "tasatoday") {
        //Obtener tasa enparalelovzla
        $tasatoday = CurlTerror::get_simple(URL_CURL . 'promedio');

        if (is_array($tasatoday)) {
            $tasaDivisa  = array(
                'tasatoday' => array(
                    'name' => 'TasaToday',
                    'rate' => FunctionTerror::cambiarComas_puntos($tasatoday['price']),
                    'percent' => $tasatoday['percent'],
                    'change' => $tasatoday['change'],
                    'color' => $tasatoday['color'],
                    'symbol' => $tasatoday['symbol'],
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
    }else if ($get['rates'] === "bcv") {
        //Obtener tasa bcv
        $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');

        if (is_array($bcv)) {
            $tasaDivisa  = array(
                'bcv' => array(
                    'name' => $bcv['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($bcv['price']),
                    'percent' => $bcv['percent'],
                    'change' => $bcv['change'],
                    'color' => $bcv['color'],
                    'symbol' => $bcv['symbol'],
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
    }else if ($get['rates'] === "enparalelovzla") {
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
    }else if ($get['rates'] === "airtm") {
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
    }else if ($get['rates'] === "localbitcoins") {
        //Obtener tasa localbitcoins
        $localbitcoins = CurlTerror::get_simple(URL_CURL . 'localbitcoins');

        if (is_array($localbitcoins)) {
            $tasaDivisa  = array(
                'localbitcoins' => array(
                    'name' => $localbitcoins['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($localbitcoins['price']),
                    'percent' => $localbitcoins['percent'],
                    'change' => $localbitcoins['change'],
                    'color' => $localbitcoins['color'],
                    'symbol' => $localbitcoins['symbol'],
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
    }else if ($get['rates'] === "reserve") {
        //Obtener tasa reserve
        $reserve = CurlTerror::get_simple(URL_CURL . 'reserve');

        if (is_array($reserve)) {
            $tasaDivisa  = array(
                'reserve' => array(
                    'name' => $reserve['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($reserve['price']),
                    'percent' => $reserve['percent'],
                    'change' => $reserve['change'],
                    'color' => $reserve['color'],
                    'symbol' => $reserve['symbol'],
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
    }else if ($get['rates'] === "dolartoday") {
        //Obtener tasa dolartoday
        $dolartoday = CurlTerror::get_simple(URL_CURL . 'dolartoday');

        if (is_array($dolartoday)) {
            $tasaDivisa  = array(
                'dolartoday' => array(
                    'name' => $dolartoday['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($dolartoday['price']),
                    'percent' => $dolartoday['percent'],
                    'change' => $dolartoday['change'],
                    'color' => $dolartoday['color'],
                    'symbol' => $dolartoday['symbol'],
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
    }else if ($get['rates'] === "skrill") {
        //Obtener tasa skrill
        $skrill = CurlTerror::get_simple(URL_CURL . 'skrill');

        if (is_array($skrill)) {
            $tasaDivisa  = array(
                'skrill' => array(
                    'name' => $skrill['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($skrill['price']),
                    'percent' => $skrill['percent'],
                    'change' => $skrill['change'],
                    'color' => $skrill['color'],
                    'symbol' => $skrill['symbol'],
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
    }else if ($get['rates'] === "amazon") {
        //Obtener tasa amazon
        $amazon = CurlTerror::get_simple(URL_CURL . 'amazon');

        if (is_array($amazon)) {
            $tasaDivisa  = array(
                'amazon' => array(
                    'name' => $amazon['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($amazon['price']),
                    'percent' => $amazon['percent'],
                    'change' => $amazon['change'],
                    'color' => $amazon['color'],
                    'symbol' => $amazon['symbol'],
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
    }else if ($get['rates'] === "zoom") {
        //Obtener tasa zoom
        $zoom = CurlTerror::get_simple(URL_CURL . 'zoom');

        if (is_array($zoom)) {
            $tasaDivisa  = array(
                'zoom' => array(
                    'name' => $zoom['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($zoom['price']),
                    'percent' => $zoom['percent'],
                    'change' => $zoom['change'],
                    'color' => $zoom['color'],
                    'symbol' => $zoom['symbol'],
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
    }else if ($get['rates'] === "yadio") {
        //Obtener tasa yadio
        $yadio = CurlTerror::get_simple(URL_CURL . 'yadio');

        if (is_array($yadio)) {
            $tasaDivisa  = array(
                'yadio' => array(
                    'name' => $yadio['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($yadio['price']),
                    'percent' => $yadio['percent'],
                    'change' => $yadio['change'],
                    'color' => $yadio['color'],
                    'symbol' => $yadio['symbol'],
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
    }else if ($get['rates'] === "citibank") {
        //Obtener tasa citibank
        $citibank = CurlTerror::get_simple(URL_CURL . 'citibank');

        if (is_array($citibank)) {
            $tasaDivisa  = array(
                'citibank' => array(
                    'name' => $citibank['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($citibank['price']),
                    'percent' => $citibank['percent'],
                    'change' => $citibank['change'],
                    'color' => $citibank['color'],
                    'symbol' => $citibank['symbol'],
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
    }else if ($get['rates'] === "petro") {
        //Obtener tasa petro
        $petro = CurlTerror::get_simple(URL_CURL . 'petro');

        if (is_array($petro)) {
            $tasaDivisa  = array(
                'petro' => array(
                    'name' => $petro['name'],
                    'rate' => FunctionTerror::cambiarComas_puntos($petro['price']),
                    'percent' => $petro['percent'],
                    'change' => $petro['change'],
                    'color' => $petro['color'],
                    'symbol' => $petro['symbol'],
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
    }else if ($get['rates'] === "zelle") {
        //Obtener tasa zelle
        $zelle = CurlTerror::get_simple(URL_CURL . 'enparalelovzla');

        if (is_array($zelle)) {
            $tasaDivisa  = array(
                'zelle' => array(
                    'name' => 'ZELLE',
                    'rate' => number_format(FunctionTerror::cambiarComas_puntos($zelle['price']) - (FunctionTerror::cambiarComas_puntos($enparalelo['price']) * 0.02), 2),
                    'percent' => $zelle['percent'],
                    'change' => $zelle['change'],
                    'color' => $zelle['color'],
                    'symbol' => $zelle['symbol'],
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
    }else if ($get['rates'] === "euro") {
        //Obtener tasa euro
        $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);
        $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
        if (is_array($bcvTasa) && is_array($bcv)) {
            $tasaDivisa  = array(
                'euro' => array(
                    'name' => $bcvTasa['euro']['name'],
                    'rate' => $bcvTasa['euro']['rate'],
                    'percent' => $bcv['percent'],
                    'change' => $bcv['change'],
                    'color' => $bcv['color'],
                    'symbol' => $bcv['symbol'],
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
    }else if ($get['rates'] === "yuan") {
      //Obtener tasa yuan
      $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);
      $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
      if (is_array($bcvTasa) && is_array($bcv)) {
          $tasaDivisa  = array(
            'yuan' => array(
                'name' => $bcvTasa['yuan']['name'],
                'rate' => $bcvTasa['yuan']['rate'],
                'percent' => $bcv['percent'],
                'change' => $bcv['change'],
                'color' => $bcv['color'],
                'symbol' => $bcv['symbol'],
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
    }else if ($get['rates'] === "lira") {
        //Obtener tasa lira
      $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);
      $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
      if (is_array($bcvTasa) && is_array($bcv)) {
          $tasaDivisa  = array(
            'lira' => array(
                'name' => $bcvTasa['lira']['name'],
                'rate' => $bcvTasa['lira']['rate'],
                'percent' => $bcv['percent'],
                'change' => $bcv['change'],
                'color' => $bcv['color'],
                'symbol' => $bcv['symbol'],
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
    }else if ($get['rates'] === "rublo") {
        //Obtener tasa rublo
      $bcvTasa = CurlTerror::get_bcv(URL_CURL_BCV);
      $bcv = CurlTerror::get_simple(URL_CURL . 'bcv');
      if (is_array($bcvTasa) && is_array($bcv)) {
          $tasaDivisa  = array(
            'rublo' => array(
                'name' => $bcvTasa['rublo']['name'],
                'rate' => $bcvTasa['rublo']['rate'],
                'percent' => $bcv['percent'],
                'change' => $bcv['change'],
                'color' => $bcv['color'],
                'symbol' => $bcv['symbol'],
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
    }else {
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
}else {
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
