<?php
$titulo = "Donates";
include_once "app/templates/app-inc-page/cabecera-header-inc.php"; ?>
<div class="container">
    <div class="row p-5 m-4">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Donaciones</h5>
                </div>
                <div class="card-body text-justify text-center">
                    <h4 class="card-tittle">BSC: BNB Smart Chain (BEP20)</h4>
                    <p>0x95189b530cc057fe2006f114705ac615db3410d4</p>
                    <img class="img-fluid" src="<?php echo RUTA_IMG; ?>usdt-qr-wallet-bsc20.png" alt="BSC BEP20"
                        lazy="loading">
                    <div class="m-4"></div>
                    <h4 class="card-tittle">TRX: Tron (TRC20)</h4>
                    <p>TUALrrSC2mZiGFHF9HUghvE3kZgMMStNgq</p>
                    <img class="img-fluid" src="<?php echo RUTA_IMG; ?>usdt-qr-wallet-trx.png" alt="TRX TRC20"
                        lazy="loading">
                </div>
                <div class=" footer text-center">
                    <a class="btn btn-link btn-sm p-4" href="<?php echo SERVIDOR; ?>">Volver al inicio</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "app/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>
<!-- Code Javascript-->
<?php include_once "app/templates/app-inc-page/pie-footer.inc.php"; ?>