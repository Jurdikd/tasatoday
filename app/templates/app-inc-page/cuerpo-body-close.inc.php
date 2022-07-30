<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Crear tu propia tasa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p>¡Puedes crear tasas con el nombre de tú negocio o el que quieras y el valor al cambio que prefieras!</p>
        <div class="row g-3">
            <div class="col-auto">
                <label for="nameCreate" class="visually-hidden">Nombre de negocio</label>
                <input type="text" class="form-control-plaintext" id="nameCreate" name="nameCreate"
                    placeholder="MiNegocio">
            </div>
            <div class="col-auto">
                <label for="rateCreate" class="visually-hidden">Precio de tasa en VES</label>
                <input type="number" class="form-control" id="rateCreate" name="rateCreate" placeholder="0.00" value="">
            </div>
            <div class="col-auto">
                <button type="BUTTON" class="btn btn-primary mb-3">Crear tasa</button>
            </div>
            <div class="col-auto">
                <span
                    class="text-info text-xs text-sm CreateLinkRate"><?php echo RUTA_CUSTOM;  ?>?currency=usd&to=ves&rate=0.00&name=MiNegocio</span>

            </div>
            <input type="text" class="form-control CreateLinkRate" id="resultRateCreate" name="resultRateCreate"
                placeholder="url">
        </div>
    </div>
</div>
<?php include_once "app/templates/components/buttons/btn_donate.com.php" ?>

<!-- javascript-->
<script src="<?php echo RUTA_CSS ?>bootstrap.min.js"></script>
<script src="<?php echo RUTA_JS ?>app.js" type="module">
</script>