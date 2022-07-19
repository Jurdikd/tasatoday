<!-- Template Calulator -->
<template id="card-calculator">
    <div class="card">
        <div class="card-header">
            <div class=" card-tittle text-dark">
                Para convertir coloca la cantidad a convertir
            </div>
            <div class="form-group">
                <label for="amountCalculator" class="text-success labelAmount ">Cantidad: <small
                        class="amountRate text-muted">BsD</small></label>
                <input id="amountCalculator" name="amount" class="form-control form-control-sm text-sm" type="number"
                    placeholder="Monto a convertir" aria-label="amountCalculator">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="resultCalculator" class="text-success labelResult">Resultado: <small
                        class="resultRate text-muted">USD</small></label>
                <input id="resultCalculator" name="result" class="form-control form-control-sm text-sm" type="number"
                    aria-label="resultCalculator" readonly>
            </div>
        </div>
        <div class="card-footer text-center">
            <div class="text-danger text-xs">

            </div>
            <button class="btn btn-primary btn-md" id="rateInverter" name="rateInverter" role="button" type="button"
                disabled>Invertir</button>
            <button class="btn btn-success btn-sm" name="shareRate" role="button" type="button"
                disabled>Compartir</button>
        </div>
    </div>
</template>