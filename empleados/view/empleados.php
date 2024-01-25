<?php
require '../../configuracion/Model/ModelConfiguracion.php';
require '../Model/ModelEmpleados.php';

$configuracion = new Configuracion();
$empleados = new Empleados();

$listarDepartamentos = $configuracion->listDepartamentos();
$listarGeneros = $configuracion->listGeneros();
$listarEmpleados = $empleados->listarEmpleados();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../assets/images/logo.png" />
  <title>Empleados</title>

  <!-- JQuery -->
  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">

  <!-- DataTables -->
  <script type="text/javascript" src="../../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../node_modules/datatables.net-dt/css/jquery.dataTables.min.css">

  <!-- Animate CSS -->
  <link rel="stylesheet" href="../../node_modules/animate.css/animate.min.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body class="scrolly">
  <div id="respuesta"></div>

  <!-- sidebar -->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-secondary overflow-hidden" style="height: 10%;">
      <img src="../../assets/images/logo.png" class="rounded-5 float-start d-flex ms-3" width="60" alt="Logo">
      <p class="">
      <h3 class="offcanvas-title text-light" id="offcanvasExampleLabel"><b>Menu Lateral</b></h3>
      </p>
    </div>
    <div class="offcanvas-body p-0">
      <div id="menuLateral">
        <?php
        include '../../tools/spinner.php';
        ?>
      </div>
    </div>
  </div>

  <div class="content">
    <!-- navbar -->
    <div id="navbar"></div>

    <!-- inicio contenido -->
    <div class="row p-4">
      <div class="col-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card" style="height: 63vh; max-height: 63vh; overflow-y: auto;">
          <div class="card-header bg-primary">
            <span class="align-middle text-light fw-bold"><i class="bi bi-people"></i> Empleados</span>
          </div>
          <div class="card-body">
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input type="number" class="form-control" id="documento" placeholder="Documento de Identidad">
                  <label for="documento">Documento de Identidad</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input type="number" class="form-control" id="salario" placeholder="Salario">
                  <label for="salario">Salario</label>
                </div>
              </div>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input type="text" class="form-control" id="nombre" placeholder="Nombres">
                  <label for="nombre">Nombres</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input type="text" class="form-control" id="apellido" placeholder="Apellidos">
                  <label for="apellido">Apellidos</label>
                </div>
              </div>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <input type="number" class="form-control" id="edad" placeholder="Edad">
                  <label for="edad">Edad</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input type="date" class="form-control" id="fecha_ingreso" placeholder="Fecha de Ingreso">
                  <label for="fecha_ingreso">Fecha de Ingreso</label>
                </div>
              </div>
            </div>
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="genero" aria-label="genero">
                    <?php foreach ($listarGeneros as $key => $value) {
                      $id = $value['idGenero'];
                      $genero = $value['nombre'];
                    ?>
                      <option value="<?php echo $id ?>"><?php echo $genero ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="genero">Genero</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="departamento" aria-label="departamento">
                    <?php foreach ($listarDepartamentos as $key => $value) {
                      $id = $value['idDepartamento'];
                      $departamento = $value['nombre'];
                    ?>
                      <option value="<?php echo $id ?>"><?php echo $departamento ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="departamento">Departamento</label>
                </div>
              </div>
            </div>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Comentarios" id="comentarios"></textarea>
              <label for="comentarios">Comentarios</label>
            </div>
          </div>
          <div class="card-footer p-0 m-0">
            <div class="d-grid">
              <div class="btn btn-primary rounded-top-0" id="insert_empleado">Insertar Empleado</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-8 col-xl-8 h-100">
        <div class="card" style="height: 63vh; max-height: 63vh; overflow-y: auto;">
          <div class="card-header bg-primary">
            <span class="align-middle text-light fw-bold"><i class="bi bi-list-columns-reverse"></i> Lista de Empleados</span>
          </div>
          <div class="card-body">
            <table id="tableEmpleados" class="table table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th class="text-center">id</th>
                  <th class="text-center">Documento</th>
                  <th class="text-center">Nombres</th>
                  <th class="text-center">Apellidos</th>
                  <th class="text-center">Estado</th>
                  <th class="text-center">Accion</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  if ($listarEmpleados != null) {
                    foreach ($listarEmpleados as $key => $value) {
                  ?>
                      <td class="text-center"><?php echo $value['idEmpleados'] ?></td>
                      <td class="text-center"><?php echo $value['documento'] ?></td>
                      <td class="text-center"><?php echo $value['nombres'] ?></td>
                      <td class="text-center"><?php echo $value['apellidos'] ?></td>
                      <td class="text-center"><?php echo $value['estado'] ?></td>
                      <td class="text-center">
                        <button class="btn btn-outline-primary" id="btn_info_empleado" value="<?php echo $value['idEmpleados'] ?>">
                          <i class="bi bi-info-square" style="pointer-events: none;"></i>
                        </button>
                        <button class="btn btn-outline-primary" id="btn_edit_empleado" value="<?php echo $value['idEmpleados'] ?>">
                          <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
                        </button>
                      </td>
                </tr>
              <?php
                    }
                  } else {
              ?>
              <td class="text-center"></td>
              <td class="text-center"></td>
              <td class="text-center"></td>
              <td class="text-center"></td>
              <td class="text-center"></td>
              <td class="text-center"></td>
            <?php
                  }
            ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/menuLateral.js"></script>
  <script src="../../assets/js/navBar.js"></script>
  <script src="../app/script.js"></script>
  <script src="../app/tableEmpleados.js"></script>
</body>

</html>