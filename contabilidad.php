<?php
   include_once("controllers/index.php");
  ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Prueba Uniminuto</title>
    <meta http-equiv="content-language" content="es-CO" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, IE=8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="Jhoan Avila - Prueba Maquetación">
    <meta name="keywords" content="Jhoan Avila - Prueba Maquetación">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="last-modified" content="0" />
    <meta name="robots" content="all | index | follow" />
    <meta http-equiv="cache-control" content="no-cache, must-revalidate" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
  </head>
  <body>
    <div class="bg-custom" style="background-image: url('images/bg-01.jpg');">
      <div class="container-custom">
        <div class="wrap-custom">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="mb-3">Contabilidad Empleados</h2>
                  <p class="mb-2">Aquí puedes calcular la suma, promedio de los empleados y estadisticas del sistema.</p>
                  <p class="mb-4">Regresa a: <a target="_self" href="index.php"> Home</a></p>
              </div>
              <div class="col-lg-12">

                <div class="card-deck px-lg-5">
                  <div class="card card-shopping bg-light border-0 rounded mx-lg-6 px-3 py-5">
                    <div class="card card-shopping border-0 shadow-lg p-3">
                      <h3 class="mb-2">Empleados</h3>
                      <p class="mb-3">Selecciona los empleados a los que deseas contabilzar.</p>

                      <form class="form-venta" action="" method="POST">
                        <div class="form-group">
                          <select id="empleados" name="empleados" multiple="multiple" class="form-control" placeholder="Empleados" tabindex="-1" aria-hidden="true" required>
                            <option value="0">No existen empleados</option>
                          </select>
                        </div>
                        <button class="btn btn-success btn-calcular"><i class="fa fa-money" aria-hidden="true"></i> Calcular</button>
                      </form>

                    </div>
                  </div>
                  <div class="card card-shopping bg-light border-0 rounded mx-lg-6 px-3 py-5">
                    <div class="card card-shopping border-0 shadow-lg p-3">
                      <h3 class="mb-4">Estadisticas</h3>
                      <h3 class="mb-2"><span class="badge badge-secondary">Suma de salarios:</span></h3>
                      <p class="mb-3" id="salarios_empleados">$0</p>
                      <h3 class="mb-2"><span class="badge badge-secondary">Promedio de salarios:</span></h3>
                      <p class="mb-3" id="promedio_empleados">$0</p>
                    </div>
                  </div>

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
    <script type="text/javascript" src="js/jquery.js "></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <script src="js/contabilidad.js"></script>
  </body>
</html>