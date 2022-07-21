<?php
include_once "libs/CurlTerror.libs.php";
include_once "libs/FunctionTerror.libs.php";
include_once "libs/UrlGetTerror.libs.php";

$titulo = "Custom";
include_once "app/templates/app-inc-page/cabecera-header-inc.php";
?>
<div class="container">
    <div class="row m-2">

        <div class="col-md-4 card-calculator mx-auto">

        </div>

    </div>
    <div class="row m-2">
        <div class="col-md-10  mx-auto m-4">
            <div class="h-100 p-5 text-white bg-dark rounded-3 jumbotron">
                <h1>En construcción... TasaToday</h1>
                <p class="lead">Nuestra misión no es hacer una simple calculadora o ver las tasas al momento...</p>
                <br>
                <p class="lead">Para nosotros lo importante es que puedas analizar cuanto ganas o pierdes por tasas
                    ¡incluso hasta personalizadas por tí!
                    para ello estamos construyendo este sitio y puedas compartir tu tasa por whatsapp o agregarlo a tu
                    negocio y saber cuanto cotizas al instante solo espera y te sorprenderemos!!
                </p>
            </div>
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