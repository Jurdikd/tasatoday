<?php
include_once "app/config/config.inc.php";
$componentes_url = parse_url($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
$ruta = $componentes_url['path'];
$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

if ($partes_ruta[0] == DOMINIO) { #DOMINIO ES IGUAL A LA RUTA PREDFINIDA
    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'view/inicio.php';
    } else if (count($partes_ruta) == 2) {
        // Buscamos los casos comunes
        if ($partes_ruta[1] == 'javascript-no-activo') {
            # code...
            $ruta_elegida = 'view/sin-js.php';
        } else {
            //Error 404
            $ruta_elegida = 'view/404.php';
        }
    }
}
include_once $ruta_elegida;