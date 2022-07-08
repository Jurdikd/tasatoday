<!doctype html>
<html lang="es_VE">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TasaToday</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6  mx-auto m-4">
                <div class="h-100 p-5 text-white bg-dark rounded-3">
                    <h1>En construcción... TasaToday</h1>
                    <p>Nuestra misión no es hacer una simple calculadora o ver las tasas al momento...</p>
                    <p>Para nosotros lo importante es que puedas analizar cuanto ganas o pierdes por tasas ¡incluso hasta personalizadas por tí!
                        para ello estamos construyendo este sitio y puedas compartir tu tasa por whatsapp o agregarlo a tu negocio y saber cuanto cotizas al instante solo espera y te sorprenderemos
                    </p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-hedaer">
                        <h3 class="card-tittle text-center">Elije una tasa para convertir</h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-danger">EnPARALELO</button>
                            <button type="button" class="btn btn-warning">DOLARTODAY</button>
                            <button type="button" class="btn btn-success">PERSONALIZADA</button>
                        </div>

                    </div>
                </div>
            </div>
            <h4 class="h4 mx-auto p-5 text-white">Convertir a USD O EURO</h4>
            <div class="col-md-6">
                <div class="card m-5">
                    <div class="card-header">
                        <h3 class="card-tittle tittleDivisa text-center">Caculadora</h3>
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
                            <input id="tasaOption" class="form-control form-control-sm text-sm" type="number" placeholder="Tasa optional a convertir" aria-label="tasaOption">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card m-5">
                    <div class="card-header">
                        <h4 class="card-tittle tittleDivisa text-center">Caculadora de ganancias o gastos</h3>
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
                            <input id="tasaOption" class="form-control form-control-sm text-sm" type="number" placeholder="Tasa optional a convertir" aria-label="tasaOption">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class=" card-tittle text-dark">
                                Para convertir coloca la cantidad a converitir
                            </div>
                            <div class="form-group">
                                <label for="amount" class="text-success labelAmount">Cantidad:</label>
                                <input id="amount" class="form-control form-control-sm text-sm" type="number" placeholder="Monto a convertir" aria-label="amount">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="result" class="text-success labelResult">Resultado:</label>
                                <input id="result" class="form-control form-control-sm text-sm" type="number" aria-label="result" readonly>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="text-danger text-xs">

                            </div>
                            <button class="btn btn-primary btn-md" id="changeDivisa">Cambiar a EUR</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
        <script src="js/main.js" type="module"></script>
</body>

</html>