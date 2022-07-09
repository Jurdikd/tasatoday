<?php

/** Libreria creada por Jurdikd
 * Alias Terror
 */
class CurlTerror
{
    public static function get_simple($url)
    {
        try {
            # Obtener valores simple
            $conexion = curl_init(); #Inicia la peticion - Inicia una nueva sesión cURL
            curl_setopt($conexion, CURLOPT_URL, $url); #curl_setopt – Define opciones para nuestra sesion cURL
            curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
            curl_setopt(
                $conexion,
                CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: application/json'
                )
            );
            curl_setopt($conexion, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
            curl_setopt($conexion, CURLOPT_RETURNTRANSFER, 1);
            //curl_setopt($conexion, CURLOPT_USERPWD, "usuario:pass");
            $respuesta = curl_exec($conexion); #curl_exec – Ejecuta la petición HTTP
            if (empty($respuesta)) {
                // si viene vacia matamos la conecion
                //  die(curl_error($conexion));
                curl_close($conexion); // close cURL handler
                return 404; #retornamos error 404
            } else {
                $info = curl_getinfo($conexion);
                $httpcode = curl_getinfo($conexion, CURLINFO_HTTP_CODE);
                curl_close($conexion); // close cURL handler
                if (empty($info['http_code'])) {
                    return $httpcode; #No HTTP code was returned
                } else  if ($httpcode >= 200 && $httpcode < 300) {
                    # retornamos los datos en json...
                    return json_decode($respuesta, true);
                } else {

                    return $httpcode; #retornamos el error
                }
            }
        } catch (Exception $e) {
            print_r($e->getTrace());
        }
    }
    public static function get_bcv($url)
    {
        try {
            $html = file_get_contents($url);
            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            $xpath = new DOMXpath($doc);
            $e = $xpath->query('//*[@id="euro"]/div')->item(0)->nodeValue;
            $y = $xpath->query('//*[@id="yuan"]/div')->item(0)->nodeValue;
            $l = $xpath->query('//*[@id="lira"]/div')->item(0)->nodeValue;
            $r = $xpath->query('//*[@id="rublo"]/div')->item(0)->nodeValue;
            $d = $xpath->query('//*[@id="dolar"]/div')->item(0)->nodeValue;
            // replace spaces
            $e = preg_replace("/\s+/", " ", $e);
            $y = preg_replace("/\s+/", " ", $y);
            $l = preg_replace("/\s+/", " ", $l);
            $r = preg_replace("/\s+/", " ", $r);
            $d = preg_replace("/\s+/", " ", $d);
            // Explode get
            $euro = explode(" ", $e);
            $euro[2] = number_format(str_replace(',', '.', $euro[2]), 2);
            $yuan = explode(" ", $y);
            $yuan[2] = number_format(str_replace(',', '.', $yuan[2]), 2);
            $lira = explode(" ", $l);
            $lira[2] = number_format(str_replace(',', '.', $lira[2]), 2);
            $rublo = explode(" ", $r);
            $rublo[2] = number_format(str_replace(',', '.', $rublo[2]), 2);
            $dolar = explode(" ", $d);
            $dolar[2] = number_format(str_replace(',', '.', $dolar[2]), 2);

            $data = array(
                'euro' => array(
                    'name' => $euro[1],
                    'rate' => $euro[2]
                ),
                'yuan' => array(
                    'name' => $yuan[1],
                    'rate' => $yuan[2]
                ),
                'lira' => array(
                    'name' => $lira[1],
                    'rate' => $lira[2]
                ),
                'rublo' => array(
                    'name' => $rublo[1],
                    'rate' => $rublo[2],
                ),
                'dolar' => array(
                    'name' => $dolar[1],
                    'rate' => $dolar[2]
                ),
            );
            return $data;
        } catch (Exception $e) {
            print_r($e->getTrace());
        }
    }
    public static function get_page($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);
        return $respuesta;
    }
}
