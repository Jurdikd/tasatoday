<?php
include_once "libs/CurlTerror.libs.php";
include_once "libs/FunctionTerror.libs.php";
include_once "libs/UrlGetTerror.libs.php";
$rate = UrlGetTerror::Getquery("rate");
$currency = UrlGetTerror::Getquery("currency");
$to = UrlGetTerror::Getquery("to");
$name = UrlGetTerror::Getquery("name");

include_once "app/templates/app-inc-page/cabecera-header-inc.php";


echo $rate . "<br>";
echo $currency . "<br>";
echo $to . "<br>";
echo $name . "<br>"; ?>

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
    <div class="row">

        <div class="col-md-4 card-calculator mx-auto">

        </div>

    </div>
</div>
<?php
include_once "app/templates/components/cards/card-rates.comp.php";
include_once "app/templates/components/cards/card-calculator.comp.php";
include_once "app/templates/app-inc-page/cuerpo-body-close.inc.php";
?>
<script src="<?php echo RUTA_JS ?>custom.js" type="module">
</script>
<?php
include_once "app/templates/app-inc-page/pie-footer.inc.php";
?>