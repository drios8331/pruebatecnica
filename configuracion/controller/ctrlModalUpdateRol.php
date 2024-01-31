<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$id = $_POST['id'];
$listRoles = $configuracion->listRolesById($id);
$estado = $listRoles[0]['estado'];
$estadoText = $estado == 1 ? "Activo" : "Inactivo";
$estadoFalse = $estado == 1 ? 0 : 1;
$estadoFalseText = $estadoFalse == 1 ? "Activo" : "Inactivo";



$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='hidden' id='idRol' value='$id'>";
$contenidoModal .= "  <input type='text' class='form-control' id='rol' value='" . $listRoles[0]['nombre'] . "' placeholder='Rol'>";
$contenidoModal .= "  <label for='rol'>Rol</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='form-floating mb-3'>";
$contenidoModal .= "  <select class='form-select' id='estadoRol' aria-label='Estado Rol'>";
$contenidoModal .= "    <option value='$estado'> $estadoText </option>";
$contenidoModal .= "    <option value='$estadoFalse'> $estadoFalseText </option>";
$contenidoModal .= "  </select>";
$contenidoModal .= "  <label for='estadoRol'>Estado Rol</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_update_rol'>Modificar Rol</button>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Modificar Rol', 'text-primary', $contenidoModal);