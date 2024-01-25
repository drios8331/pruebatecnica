<?php
require '../../empleados/Model/ModelEmpleados.php';
require '../../configuracion/Model/ModelConfiguracion.php';

$empleados = new Empleados();
$configuracion = new Configuracion();

$listarEmpleados = $empleados->listarEmpleadosByDpto();
$listarDepartamentosGasto = $configuracion->listDepartamentosGastos();
$empleadoMayorSalario = $empleados->listarEmpleadoMayorSalario();
$empleadosInferior = $empleados->listarEmpleadosInfSalario();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../assets/images/logo.png" />
  <title>Home</title>

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

<body class="scrolly" style="margin: 0;">
  <div id="respuesta"></div>

  <!-- sidebar -->
  <div class="offcanvas offcanvas-start bg-primary" style="width: 30vh;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-secondary overflow-hidden p-0 m-0" style="height: 5rem;">
      <div class="h-100 p-1 m-1 d-flex justify-content-center align-items-center" style="height: 100%;">
        <img src="../../assets/images/logo.png" class="rounded-5 float-start p-1" width="60" alt="Logo">
      </div>
      <div class="w-100">
        <h5 class="offcanvas-title text-light" id="offcanvasExampleLabel"><b>Menu Lateral</b></h5>
      </div>
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

    <!-- Inicio Contenido -->
    <div class="row p-4">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-3">
        <div class="card" style="height: 40vh; max-height: 40vh;">
          <div class="card-header bg-primary">
            <span class="align-middle text-light fw-bold"><i class="bi bi-filetype-sql"></i> Consulta SQL 1 - Listado de todos los datos de los empleados del departamento “Ti”</span>
          </div>
          <div class="card-body" style="height: 50vh; overflow-y: auto;">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">id</th>
                  <th class="text-center">documento</th>
                  <th class="text-center">nombre</th>
                  <th class="text-center">apellido</th>
                  <th class="text-center">edad</th>
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
                      <td class="text-center"><?php echo $value['edad'] ?></td>
                </tr>
            <?php
                    }
                  }
            ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer bg-primary" style="height: 20vh;">
            <div class="d-flex justify-content-center align-items-center h-100">
              <span class="card-text text-center text-light">SELECT `idEmpleados`, `documento`, `nombres`, `apellidos`, `edad`, `fechaDeIngreso`, `comentarios`, `genero_id`, `departamento_id`, E.estado as 'estado', D.nombre as 'departamento' FROM `tblempleados` as E INNER JOIN tbldepartamentos as D ON D.idDepartamento = E.departamento_id WHERE D.nombre = 'TI';</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-3">
        <div class="card" style="height: 40vh; max-height: 40vh; overflow-y: auto;">
          <div class="card-header bg-primary">
            <span class="align-middle text-light fw-bold"><i class="bi bi-filetype-sql"></i> Consulta SQL 2 - Listados de los 3 departamentos que más gastos producen</span>
          </div>
          <div class="card-body" style="height: 50vh; overflow-y: auto;">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">Numero</th>
                  <th class="text-center">Departamento</th>
                  <th class="text-center">valor</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  if ($listarDepartamentosGasto != null) {
                    foreach ($listarDepartamentosGasto as $key => $value) {
                  ?>
                      <td class="text-center"><?php echo $value['idGastos'] ?></td>
                      <td class="text-center"><?php echo $value['departamento'] ?></td>
                      <td class="text-center"><?php echo $value['Suma'] ?></td>
                </tr>
            <?php
                    }
                  }
            ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer bg-primary" style="height: 20vh;">
            <div class="d-flex justify-content-center align-items-center h-100">
              <span class="card-text text-center text-light">SELECT SUM(gastos) as 'Suma', D.nombre as 'departamento' FROM tblgastos as G INNER JOIN tbldepartamentos as D ON D.idDepartamento=G.departamento_id GROUP BY departamento_id ORDER BY SUM(gastos) DESC LIMIT 3</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-3">
        <div class="card" style="height: 40vh; max-height: 40vh; overflow-y: auto;">
          <div class="card-header bg-primary">
            <span class="align-middle text-light fw-bold"><i class="bi bi-filetype-sql"></i> Consulta SQL 3 - Listado de datos del empleado con mayor salario</span>
          </div>
          <div class="card-body" style="height: 50vh;">
            <div class="row">
              <div class="col-md">
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Id</div>
                    <span><?php echo $empleadoMayorSalario[0]['idEmpleados'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Documento</div>
                    <span><?php echo $empleadoMayorSalario[0]['documento'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Nombre</div>
                    <span><?php echo $empleadoMayorSalario[0]['nombres'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Apellido</div>
                    <span><?php echo $empleadoMayorSalario[0]['apellidos'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Edad</div>
                    <span><?php echo $empleadoMayorSalario[0]['edad'] ?></span>
                  </li>
                </ul>
              </div>
              <div class="col-md">
              <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Fecha de Ingreso</div>
                    <span><?php echo $empleadoMayorSalario[0]['fechaDeIngreso'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Genero</div>
                    <span><?php echo $empleadoMayorSalario[0]['genero_id'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Salario</div>
                    <span><?php echo $empleadoMayorSalario[0]['salario'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Departamento</div>
                    <span><?php echo $empleadoMayorSalario[0]['departamento_id'] ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="fw-bold">Comentarios</div>
                    <span><?php echo $empleadoMayorSalario[0]['comentarios'] ?></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-footer bg-primary" style="height: 20vh;">
            <div class="d-flex justify-content-center align-items-center h-100">
              <span class="card-text text-center text-light">SELECT `idEmpleados`, `documento`, `nombres`, `apellidos`, `edad`, `fechaDeIngreso`, MAX(salario), `comentarios`, `genero_id`, `departamento_id`, `estado` FROM `tblempleados` WHERE 1</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-3">
        <div class="card" style="height: 40vh; max-height: 40vh; overflow-y: auto;">
          <div class="card-header bg-primary">
            <span class="align-middle text-light fw-bold"><i class="bi bi-filetype-sql"></i> Consulta SQL 4 - Cantidad de empleados con salarios menor a 1,500.000</span>
          </div>
          <div class="card-body text-center" style="height: 50vh;">
            <div class="d-flex justify-content-center align-items-center h-100">
              <span class="bg-primary  px-5 pb-2 pt-0 rounded-circle text-center text-light" style="font-size: 100px;"><?php echo $empleadosInferior[0]['COUNT(idEmpleados)'] ?></span>
            </div>
          </div>
          <div class="card-footer bg-primary " style="height: 20vh;">
            <div class="d-flex justify-content-center align-items-center h-100">
              <span class="card-text text-light">SELECT COUNT(idEmpleados) FROM `tblempleados` WHERE salario < 1500000</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/menuLateral.js"></script>
  <script src="../../assets/js/navBar.js"></script>
</body>

</html>