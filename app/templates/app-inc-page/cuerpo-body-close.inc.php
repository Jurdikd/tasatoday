<!-- End content page-->
</div>
<!-- Footer-->
<footer class=" b-0 copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <p class="text-center mt-2">© 2022 - TODOS LOS DERECHOS RESERVADOS</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>TasaTodayPro es un sito para revisar las tasas y precios de diferentes divisas y criotomonedas como
                    objetivo pricipal enfocado a venezuela solo como información y ayuda lo que se haga con la
                    información es meramente resposabilidad de él o los usuarios que la utilicen</p>
            </div>
            <div class="col-md-6">
                <ul class="bottom_ul footer-ul">
                    <li><a href="#">Tasatodaypro</a></li>
                    <li><a
                            href="mailto:contact@tasatoday.pro?Subject=<?php echo RUTA_GENERAL; ?>%20Interesado%20en%20el%20servicio."><i
                                class="fa fa-envelope"></i>contact@tasatoday.pro</a></li>
                    <li><a href="https://www.instagram.com/tasatodaypro" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-instagram"></i>@tasatodaypro</a></a></li>
                </ul>
            </div>
        </div>
</footer>
<!-- End footer-->
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
            <input type="url" class="form-control CreateLinkRate" id="resultRateCreate" name="resultRateCreate"
                placeholder="url">
        </div>
    </div>
</div>
<?php include_once "app/templates/components/buttons/btn_donate.com.php" ?>

<!-- javascript-->
<script src="<?php echo RUTA_JS ?>bootstrap.min.js"></script>
<script src="<?php echo RUTA_JS ?>app.js" type="module">
</script>