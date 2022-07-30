<?php
include_once "app/config/config.inc.php";
$componentes_url = parse_url($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
$ruta = $componentes_url['path'];
$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

//Error 404
$ruta_elegida = 'view/sitemap.xml';
// Vistas seleccionadas
if (count($partes_ruta) == 1) {
    // ruta inicio
    $ruta_elegida = 'view/inicio.php';
} else if (count($partes_ruta) == 2) {
    if ($partes_ruta[1] == 'javascript-no-activo') {
        # redirección para informar que necesita js
        $ruta_elegida = 'view/sin-js.php';
    } else if ($partes_ruta[1] == 'robots.txt') {
        # muestra de archivo robot personalizada
        $ruta_elegida = 'view/robots.txt';
    } else if ($partes_ruta[1] == 'sitemap.xml') {
        # muestra de archivo sitemap personalizada
        $ruta_elegida = 'view/sitemap.xml';
    } else if ($partes_ruta[1] == 'custom') {
        # muestra de tasa personalizada
        $ruta_elegida = 'view/custom.php';
    } else if ($partes_ruta[1] == 'donates') {
        # mostra la vista de donaciones
        $ruta_elegida = 'view/donates.php';
    } else if ($partes_ruta[1] == 'prubs') {
        # mostra la vista de pruebas
        $ruta_elegida = 'view/prubs.php';
    }
}
// inculuir ruta
include_once $ruta_elegida;