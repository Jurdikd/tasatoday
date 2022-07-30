<!doctype html>
<html dir="ltr" lang="es-VE" id="html5" xmlns="http://www.w3.org/1999/xhtml" lang="es-VE" xml:lang="es-VE" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-able-content" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="author" content="TasaTodayPro" />
    <meta name="description"
        content="TasaTodayPro es un sito para revisar las tasas y precios de diferentes divisas y criotomonedas como objetivo pricipal enfocado a venezuela solo como información y ayuda lo que se haga con la información es meramente resposabilidad de él o los usuarios que la utilicen">
    <noscript>
        <meta HTTP-EQUIV=" REFRESH" content="0; url=javascript-no-activo">
    </noscript>
    <?php
    if (!isset($titulo) || empty($titulo)) {
        $titulo = NOMBRE_PRINCIPAL;
    } else {
        $titulo =  $titulo . " | " . NOMBRE_PRINCIPAL;
    }
    echo "<title>$titulo</title>";

    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo RUTA_FAVICON; ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA_FAVICON; ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA_FAVICON; ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo RUTA_FAVICON; ?>site.webmanifest">
    <meta name="msapplication-config" content="<?php echo RUTA_FAVICON; ?>browserconfig.xml" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="<?php echo RUTA_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>style.css">
    <?php if (PUERTO === "80" || PUERTO === "443") {
        # mostramos analiticas
        include_once "libs/analitycs.google.php";
    } ?>


</head>

<body class="body-page">
    <div id="preloader" class="load crystal-effects">
        <div class="preloader"></div>
        <h5 id="msgPreloader" class="tittle-dark"></h5>
    </div>
    <button class="btn-offcanvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
        aria-controls="offcanvasScrolling">
        Haz tu propia tasa >
    </button>
    <!-- Page Content -->

    <div class="content-page">