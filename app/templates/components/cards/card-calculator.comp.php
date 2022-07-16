<!-- Template Calulator -->
<template id="card-calculator">
    <div class="card">
    <div class="card-header">
        <div class=" card-tittle text-dark">
            Para convertir coloca la cantidad a converitir
        </div>
        <div class="form-group">
            <label for="amount" class="text-success labelAmount ">Cantidad: <small class="amountRate text-muted">BsD</small></label>
            <input id="amount" name="amount" class="form-control form-control-sm text-sm" type="number" placeholder="Monto a convertir" aria-label="amount">
        </div>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="result" class="text-success labelResult">Resultado: <small class="resultRate text-muted">USD</small></label>
            <input id="result" name="result" class="form-control form-control-sm text-sm" type="number" aria-label="result" readonly>
        </div>
    </div>
    <div class="card-footer text-center">
        <div class="text-danger text-xs">

        </div>
        <button class="btn btn-primary btn-md" id="rateInverter" name="rateInverter" role="button" type="button">Invertir</button>
    </div>
    </div>
</template>