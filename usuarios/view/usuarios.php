<?php
require '../Model/ModelUsuarios.php';
require '../../configuracion/Model/ModelConfiguracion.php';

$usuarios = new Usuarios();
$configuracion = new Configuracion();

$listarUsuarios = $usuarios->listarUsuarios();
$listarRoles = $configuracion->listRoles();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/images/logo.png" />
    <title>Usuarios</title>

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
    <div class="offcanvas offcanvas-start" style="width: 30vh;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header bg-secondary overflow-hidden p-0 m-0" style="height: 5rem;">
            <div class="h-100 p-1 m-1 d-flex justify-content-center align-items-center" style="height: 100%;">
                <img src="../../assets/images/logo.png" class="rounded-5 float-start p-1" width="60" alt="Logo">
            </div>
            <div class="w-100 text-center">
                <h3 class="offcanvas-title text-light" id="offcanvasExampleLabel"><b>Menu Lateral</b></h3>
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

        <!-- inicio contenido -->
        <div class="row p-4">
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <span class="align-middle text-light fw-bold"><i class="bi bi-people"></i> Usuarios</span>
                    </div>
                    <div class="card-body" style="overflow-y: auto;">
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                                <label for="nombre">Nombre</label>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="identificacion" placeholder="Identificacion">
                                <label for="identificacion">Identificacion</label>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="usuario" placeholder="Usuario">
                                <label for="usuario">Usuario</label>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="password" placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="col-md mb-3">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="rol" aria-label="rol">
                                    <?php
                                    if ($listarRoles != null) {
                                        foreach ($listarRoles as $key => $value) {
                                            $id = $value['idRol'];
                                            $rol = $value['nombre'];
                                    ?>
                                            <option value="<?php echo $id ?>"><?php echo $rol ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="rol">Rol</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0 m-0">
                        <div class="d-grid">
                            <div class="btn btn-primary rounded-top-0" id="insert_usuario">Insertar Empleado</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8 col-xl-8 h-100">
                <div class="card" style="max-height: 75vh; overflow-y: auto;">
                    <div class="card-header bg-primary">
                        <span class="align-middle text-light fw-bold"><i class="bi bi-list-columns-reverse"></i> Lista de Empleados</span>
                    </div>
                    <div class="card-body">
                        <table id="tableUsuarios" class="table table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">Documento</th>
                                    <th class="text-center">Nombres</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Rol</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    if ($listarUsuarios != null) {
                                        foreach ($listarUsuarios as $key => $value) {
                                    ?>
                                            <td class="text-center"><?php echo $value['idUsuario'] ?></td>
                                            <td class="text-center"><?php echo $value['identificacion'] ?></td>
                                            <td class="text-center"><?php echo $value['nombre'] ?></td>
                                            <td class="text-center"><?php echo $value['usuario'] ?></td>
                                            <td class="text-center"><?php echo $value['email'] ?></td>
                                            <td class="text-center"><?php echo $value['rol_id'] ?></td>
                                            <td class="text-center"><?php echo $value['estado'] == 1 ? "Activo" : "Inactivo" ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-primary" id="btn_info_usuario" value="<?php echo $value['idUsuario'] ?>">
                                                    <i class="bi bi-info-square" style="pointer-events: none;"></i>
                                                </button>
                                                <button class="btn btn-outline-primary" id="btn_edit_usuario" value="<?php echo $value['idUsuario'] ?>">
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
    <script src="../app/tableUsuarios.js"></script>
</body>

</html>