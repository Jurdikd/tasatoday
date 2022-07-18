<?php
include_once "app/config/config.inc.php";
echo SERVIDOR . "<br>" . $_SERVER['SERVER_PROTOCOL'] . "<br>" . $_SERVER['HTTP_HOST'] . "<br>";
$componentes_url = parse_url($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);
$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
echo $protocol . "<br>";
$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);
echo var_dump($partes_ruta);


$ruta_elegida = 'vistas/404.php';
//echo var_dump($partes_ruta);
if ($partes_ruta[0] == "tasatoday") { #DOMINIO ES IGUAL A LA RUTA PREDFINIDA

    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'vistas/inicio.php';
    } else if (count($partes_ruta) == 2) {
        // Buscamos los casos comunes
        switch ($partes_ruta[1]) {
                #area diplomados
            case 'javascript-no-activo':
                $ruta_elegida = 'vistas/sin-js.php';
                break;
            case 'login':
                $ruta_elegida = 'vistas/login.php';
                break;
        }
    }
}
//include_once $ruta_elegida;




include_once "app/templates/app-inc-page/cabecera-header-inc.php";
//include_once "libs/UrlGetTerror.libs.php";
//$get_query = UrlGetTerror::Getquery("rate");

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10  mx-auto m-4">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
                <h1>En construcción... TasaToday</h1>
                <p class="lead">Nuestra misión no es hacer una simple calculadora o ver las tasas al momento...</p>
                <br>
                <p class="lead">Para nosotros lo importante es que puedas analizar cuanto ganas o pierdes por tasas
                    ¡incluso hasta personalizadas por tí!
                    para ello estamos construyendo este sitio y puedas compartir tu tasa por whatsapp o agregarlo a tu
                    negocio y saber cuanto cotizas al instante solo espera y te sorprenderemos
                </p>
            </div>
        </div>
    </div>
    <div class="row rates">
        <div class="col-md-3">
            <div class="card m-2 skeeleton">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Name rate</h5>
                </div>
                <div class="card-body text-center">
                    <span class="card__rate-text">Loading...</span>
                    <button class="btn btn-sm">Elegir</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-2 skeeleton">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Name rate</h5>
                </div>
                <div class="card-body text-center">
                    <span class="card__rate-text">Loading...</span>
                    <button class="btn btn-sm">Elegir</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-2 skeeleton">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Name rate</h5>
                </div>
                <div class="card-body text-center">
                    <span class="card__rate-text">Loading...</span>
                    <button class="btn btn-sm">Elegir</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-2 skeeleton">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Name rate</h5>
                </div>
                <div class="card-body text-center">
                    <span class="card__rate-text">Loading...</span>
                    <button class="btn btn-sm">Elegir</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h4 class="h4 mx-auto p-5 text-white">Calculadoras de tasas</h4>
        <div class="col-md-6">
            <div class="card m-5">
                <div class="card-header">
                    <h3 class="card-tittle text-center">Caculadora</h3>
                </div>
                <div class="card-body text-center">
                    <button class="btn btn-success" disabled>USD a BsD</button>
                    <button class="btn btn-warning">EUR a BsD</button>
                </div>
                <div class="card-footer">
                    <p class="text-danger">Puedes escribir el valor de la tasa a la que deseas realizar el cambio.
                    </p>
                    <div class="form-group">
                        <label for="tasaOption" class="text-primary labelTasaOption text-left">Tasa
                            opcional:</label>
                        <input id="tasaOption" class="form-control form-control-sm text-sm" type="number"
                            placeholder="Tasa optional a convertir" aria-label="tasaOption">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card m-5">
                <div class="card-header">
                    <h4 class="card-tittle text-center">Caculadora de ganancias o gastos</h3>
                </div>
                <div class="card-body text-center">
                    <button class="btn btn-success" disabled>USD a BsD</button>
                    <button class="btn btn-warning">EUR a BsD</button>
                </div>
                <div class="card-footer">
                    <p class="text-danger">Puedes escribir el valor de la tasa a la que deseas realizar el cambio.
                    </p>
                    <div class="form-group">
                        <label for="tasaOption" class="text-primary labelTasaOption text-left">Tasa
                            opcional:</label>
                        <input id="tasaOption" class="form-control form-control-sm text-sm" type="number"
                            placeholder="Tasa optional a convertir" aria-label="tasaOption">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4 card-calculator">

        </div>

    </div>
</div>

<?php
include_once "app/templates/components/cards/card-rates.comp.php";
include_once "app/templates/components/cards/card-calculator.comp.php";
include_once "app/templates/app-inc-page/cuerpo-body-close.inc.php";
include_once "app/templates/app-inc-page/pie-footer.inc.php";
?>