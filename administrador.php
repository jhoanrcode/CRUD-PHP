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
  </head>
  <body>
    <div class="bg-custom" style="background-image: url('images/bg-01.jpg');">
      <div class="container-custom">
        <div class="wrap-custom">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="mb-3">Administrador de Empleados</h2>
                  <p class="mb-2">Aquí podras crear, editar, eliminar y listar todos los empleados en el sistema. (Se validara el email no sea repetido).</p>
                  <p class="mb-4">Regresa a: <a target="_self" href="index.php"> Home</a></p>
              </div>
            </div>

            <div class="card panel-card">
              <div class="card-header">Listado de Empleados</div>
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered mb-0">
                  <thead>
                    <tr>
                      <td>Nombres</td>
                      <td>Apellidos</td>
                      <td>Salario ($)</td>
                      <td>Email</td>
                      <td>Fecha Creación</td>
                      <td with="200">Opciones</td>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <ul id="pagination" class="pagination-sm"></ul>

            <aside class="linkflotante ">
              <div class="btn-flotante ">
                <button data-toggle="modal" data-target="#create-item"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Producto</button>
              </div>
            </aside>


            <!--Modal create Empleado-->
            <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-id-card-o" aria-hidden="true"></i> Nuevo Empleado</h4>
                    <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                      <form data-toggle="validator" action="" method="POST">

                        <div class="form-group">
                          <label class="control-label" for="nombre">Nombres</label>
                          <input type="text" name="nombre" class="form-control" placeholder="Nombre de Empleado" data-error="Por favor ingrese el nombre" autocomplete="off" maxlength="40" required />
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="apellido">Apellidos</label>
                          <input type="text" name="apellido" class="form-control" placeholder="Apellidos de Empleado" data-error="Por favor ingrese el apellido" autocomplete="off" maxlength="40" required />
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="salario">Salario ($)</label>
                          <input type="number" name="salario" class="form-control" placeholder="1000000" data-error="Por favor ingrese el salario" autocomplete="off" max="999999999" required />
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="email">Email</label>
                          <input type="email" name="email" class="form-control" placeholder="email@dominio.com" data-error="Por favor ingrese el email" autocomplete="off" maxlength="40" required />
                          <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn crud-submit btn-success">Guardar</button>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>

            <!--Modal edit Productos-->
            <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-id-card-o" aria-hidden="true"></i> Editar Empleado</h4>
                    <button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                  <div class="modal-body mx-lg-3">
                    <form data-toggle="validator" action="" method="PUT">
                      <input type="hidden" name="id" class="edit-id">

                      <div class="form-group">
                        <label class="control-label" for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre de Producto" data-error="Por favor ingrese el nombre" autocomplete="off" required />
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="apellido">Apellidos</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apellidos de Empleado" data-error="Por favor ingrese el apellido" autocomplete="off" maxlength="40" required />
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="salario">Salario ($)</label>
                        <input type="number" name="salario" class="form-control" placeholder="1000000" data-error="Por favor ingrese el salario" autocomplete="off" max="999999999" required />
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email@dominio.com" data-error="Por favor ingrese el email" autocomplete="off" maxlength="40" required />
                        <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-success crud-submit-edit">Guardar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery.js "></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="js/administrador.js"></script>
  </body>
</html>