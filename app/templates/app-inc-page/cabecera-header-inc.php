<!doctype html>
<html lang="es_VE" id="html5" xmlns="http://www.w3.org/1999/xhtml" lang="es_VE" xml:lang="es_VE" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="author" content="TasaTodayPro" />
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
    <meta name='keywords'
        content='TasaTodayPro, tasa, today, pro, rate, rates, currencys, currency, divisas, divisa, ve, ven, venezuela, dolar, euro, bolivares, ves, usd, eur, cripto, criptmonedas, cambio, calculadora de bolivares, calculadora, bs.d' />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo RUTA_FAVICON; ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA_FAVICON; ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA_FAVICON; ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo RUTA_FAVICON; ?>site.webmanifest">
    <meta name="msapplication-config" content="<?php echo RUTA_FAVICON; ?>browserconfig.xml" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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