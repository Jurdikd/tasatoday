<?php
include_once "../libs/CurlTerror.inc.php";
//Recibimos los datos por json
$params = json_decode(file_get_contents('php://input'), true);

// verificamos si la verificación de la acción esta inciada y no esta vacia
if (!empty($params) && !empty($params['verify'])) {
    #guardamos la variable verify
    $verify = $params['verify'];
    #verificamos los datos entrando
    switch ($verify) {
        case 1:
            //Obtener datos
            $dolarToday = CurlTerror::get_simple('https://s3.amazonaws.com/dolartoday/data.json');

            if (is_array($dolarToday)) {
                $dolarHoy  = array(
                    'date' => array(
                        'dia' => $dolarToday['_timestamp']['dia'],
                        'fecha' => $dolarToday['_timestamp']['fecha']
                    ),
                    'eur' => array(
                        'tasa' => $dolarToday['EUR']['sicad2'],
                        'tasa2' => $dolarToday['EUR']['sicad1'],
                        'promedio' => $dolarToday['EUR']['promedio_real']
                    ),
                    'usd' => array(
                        'tasa' => $dolarToday['USD']['sicad2'],
                        'tasa2' => $dolarToday['USD']['sicad1'],
                        'promedio' => $dolarToday['USD']['promedio_real']
                    )
                );

                $respuesta = $dolarHoy; #Devolvemos datos en formato json
            } else {
                header($_SERVER['SERVER_PROTOCOL'] . $dolarToday . " Not Found Forbidden - Error: SERVIDOR", true, $dolarToday);
                header("HTTP/1.0 " . $dolarToday . " Not Found Forbidden - Error: SERVIDOR");
                $respuesta = http_response_code($dolarToday) . " Forbidden - Error: SERVIDOR";
            }
            break;
        case 2:
            //Obtener datos
            $dolarToday = CurlTerror::get_simple('https://s3.amazonaws.com/dolartoday/data.json');

            if (is_array($dolarToday)) {
                $dolarHoy  = array(
                    'date' => array(
                        'dia' => $dolarToday['_timestamp']['dia'],
                        'dia_corto' => $dolarToday['_timestamp']['dia_corta'],
                        'fecha' => $dolarToday['_timestamp']['fecha'],
                        'fecha_corta' => $dolarToday['_timestamp']['fecha_corta']
                    ),
                    'eur' => array(
                        'tasa' => $dolarToday['EUR']['transferencia'],
                        'tasa2' => $dolarToday['EUR']['sicad2'],
                        'promedio' => $dolarToday['EUR']['promedio_real']
                    ),
                    'usd' => array(
                        'tasa' => $dolarToday['USD']['transferencia'],
                        'tasa2' => $dolarToday['USD']['sicad2'],
                        'promedio' => $dolarToday['USD']['promedio_real']
                    )
                );

                $respuesta = $dolarHoy; #Devolvemos datos en formato json
            } else {
                header($_SERVER['SERVER_PROTOCOL'] . $dolarToday . " Not Found Forbidden - Error: SERVIDOR", true, $dolarToday);
                header("HTTP/1.0 " . $dolarToday . " Not Found Forbidden - Error: SERVIDOR");
                $respuesta = http_response_code($dolarToday) . " Forbidden - Error: SERVIDOR";
            }
            break;
        default:
            $respuesta = array('error' => array(
                'en' =>
                "Error: Verification no correct",
                'es' =>
                "Error: La verificación no esta correcta"

            ));
            break;
    }
} else {
    $respuesta = array('error' => array(
        'en' =>
        "Error: Empty data",
        'es' =>
        "Error: Datos vacíos"

    ));
}

header('Content-Type: application/json'); # declarar documento como json
//Devolvemos la respuesta
echo json_encode($respuesta);
