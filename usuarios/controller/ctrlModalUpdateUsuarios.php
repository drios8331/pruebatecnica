<?php
require '../Model/ModelUsuarios.php';
require '../../configuracion/Model/ModelConfiguracion.php';
require '../../tools/Modal.php';

$modal = new Modal();
$usuarios = new Usuarios();
$configuracion = new Configuracion();

$id = $_POST['id'];

$listarUsuario = $usuarios->listarUsuariosById($id);

$estado = $listarUsuario[0]['estado'];
$rol = $listarUsuario[0]['rol_id'];
$listarRolesById = $configuracion->listRolesById($rol);
$listarRoles = $configuracion->listRoles();

$contenidoModal  = "      <div class='col-md mb-3'>";
$contenidoModal .= "          <div class='form-floating'>";
$contenidoModal .= "              <input type='number' class='form-control' id='idUsuario' value='$id' hidden>";
$contenidoModal .= "              <input type='number' class='form-control' id='identificacion' placeholder='Identificacion' value='" . $listarUsuario[0]['identificacion'] . "'>";
$contenidoModal .= "              <label for='identificacion'>Identificacion</label>";
$contenidoModal .= "          </div>";
$contenidoModal .= "      </div>";
$contenidoModal .= "      <div class='col-md mb-3'>";
$contenidoModal .= "          <div class='form-floating'>";
$contenidoModal .= "              <input type='text' class='form-control' id='usuario' placeholder='Nombre' value='" . $listarUsuario[0]['nombre'] . "'>";
$contenidoModal .= "              <label for='nombre'>Nombre</label>";
$contenidoModal .= "          </div>";
$contenidoModal .= "      </div>";
$contenidoModal .= "      <div class='col-md mb-3'>";
$contenidoModal .= "          <div class='form-floating'>";
$contenidoModal .= "              <input type='text' class='form-control' id='nombre' placeholder='Nombre' value='" . $listarUsuario[0]['usuario'] . "'>";
$contenidoModal .= "              <label for='usuario'>Usuario</label>";
$contenidoModal .= "          </div>";
$contenidoModal .= "      </div>";
$contenidoModal .= "      <div class='col-md mb-3'>";
$contenidoModal .= "          <div class='form-floating'>";
$contenidoModal .= "              <input type='email' class='form-control' id='email' placeholder='Email' value='" . $listarUsuario[0]['email'] . "'>";
$contenidoModal .= "              <label for='email'>Email</label>";
$contenidoModal .= "          </div>";
$contenidoModal .= "      </div>";
$contenidoModal .= "      <div class='col-md mb-3'>";
$contenidoModal .= "          <div class='form-floating'>";
$contenidoModal .= "              <select class='form-select' id='rol' aria-label='rol'>";
$contenidoModal .= "              <option value='$rol'>" . $listarRolesById[0]['nombre'] . "</option>";
foreach ($listarRoles as $key => $value) {
    if (empty($listarRoles) != 1) {
        if ($value['idRol'] != $rol) {
            $contenidoModal .= "              <option value='" . $value['idRol'] . "'>" . $value['nombre'] . "</option>";
        }
    }
}
$contenidoModal .= "              </select>";
$contenidoModal .= "              <label for='rol'>Rol</label>";
$contenidoModal .= "          </div>";
$contenidoModal .= "      </div>";
$contenidoModal .= "      <div class='col-md mb-3'>";
$contenidoModal .= "          <div class='form-floating'>";
$contenidoModal .= "              <input type='text' class='form-control' id='newPassword' placeholder='Password'>";
$contenidoModal .= "              <label for='password'>Password</label>";
$contenidoModal .= "          </div>";
$contenidoModal .= "      </div>";
$contenidoModal .= "  <div class='card-footer p-0 m-0'>";
$contenidoModal .= "      <div class='d-grid'>";
$contenidoModal .= "          <div class='btn btn-primary rounded-top-0' id='update_usuario'>Insertar Empleado</div>";
$contenidoModal .= "      </div>";
$contenidoModal .= "  </div>";

$modal->modalAlerta("Modificar Usuario", "text-primary", $contenidoModal);
