<?php
require '../Model/ModelConfiguracion.php';

$configuracion = new Configuracion();

$listarGeneros = $configuracion->listGeneros();
$listarDepartamentos = $configuracion->listDepartamentos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../assets/images/logo.png" />
  <title>Configuracion</title>

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

    <!-- Inicio contenido -->
    <div class="row p-4">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card">
          <div class="card-header">
            <span class="align-middle text-primary fw-bold"><i class="bi bi-flag"></i> Departamentos</span>
          </div>
          <div class="card-body" style="height: 41vh; max-height: 41vh; overflow-y: auto;">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">id</th>
                  <th class="text-center">Departamento</th>
                  <th class="text-center">Estado</th>
                  <th class="text-center">Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  if (empty($listarDepartamentos) != 1) {
                    foreach ($listarDepartamentos as $key => $value) {
                  ?>
                      <td class="text-center"><?php echo $value['idDepartamento'] ?></td>
                      <td class="text-center"><?php echo $value['nombre'] ?></td>
                      <td class="text-center"><?php echo $value['estado'] === 1 ? "Activo" : "Inactivo"?></td>
                      <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" id="btn_info_departamento" value="<?php echo $value['idDepartamento'] ?>">
                          <i class="bi bi-info-square" style="pointer-events: none;"></i>
                        </button>
                        <button class="btn btn-outline-primary btn-sm" id="btn_edit_departamento" value="<?php echo $value['idDepartamento'] ?>">
                          <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
                        </button>
                      </td>
                </tr>
            <?php
                    }
                  }
            ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer p-0 m-0">
            <div class="d-grid">
              <div class="btn btn-primary rounded-0" id="btn_insert_departamento">Insertar Departamento</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mh-50">
          <div class="card-header">
            <span class="align-middle text-primary fw-bold"><i class="bi bi-gender-ambiguous"></i> Generos</span>
          </div>
          <div class="card-body px-5" style="height: 41vh; max-height: 41vh; overflow-y: auto;">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">id</th>
                  <th class="text-center">Genero</th>
                  <th class="text-center">Estado</th>
                  <th class="text-center">Acción</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  if (empty($listarGeneros) != 1) {
                    foreach ($listarGeneros as $key => $value) {
                  ?>
                      <td class="text-center"><?php echo $value['idGenero'] ?></td>
                      <td class="text-center"><?php echo $value['nombre'] ?></td>
                      <td class="text-center"><?php echo $value['estado'] === 1 ? "Activo" : "Inactivo" ?></td>
                      <td class="text-center">
                        <button class="btn btn-outline-primary btn-sm" id="btn_info_genero" value="<?php echo $value['idGenero'] ?>">
                          <i class="bi bi-info-square" style="pointer-events: none;"></i>
                        </button>
                        <button class="btn btn-outline-primary btn-sm" id="btn_edit_genero" value="<?php echo $value['idGenero'] ?>">
                          <i class="bi bi-pencil-square" style="pointer-events: none;"></i>
                        </button>
                      </td>
                </tr>
            <?php
                    }
                  }
            ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer p-0 m-0">
            <div class="d-grid">
              <div class="btn btn-primary rounded-0" id="btn_insert_genero">Insertar Genero</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../assets/js/menuLateral.js"></script>
  <script src="../../assets/js/navBar.js"></script>
  <script src="../app/script.js"></script>
</body>

</html>