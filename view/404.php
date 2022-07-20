<?php
header($_SERVER['SERVER_PROTOCOL'] . "404 Not Found", true, 404);
header("HTTP/1.0 404 Not Found");

include_once "app/templates/app-inc-page/cabecera-header-inc.php"; ?>

<div class="container">
    <div class="row p-5 m-4">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-tiitle">Error 404</h5>
                </div>
                <div class="card-body">
                    <p>Lo que buscas no ha sido encotrado...</p>
                </div>
                <div class="footer text-center">
                    <a class="btn btn-link btn-sm p-4" href="<?php echo SERVIDOR; ?>">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once "app/templates/app-inc-page/cuerpo-body-close.inc.php";
include_once "app/templates/app-inc-page/pie-footer.inc.php";
?>