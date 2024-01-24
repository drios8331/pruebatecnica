<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$id = $_POST['id'];
$listDepartamentos = $configuracion->listDepartamentosById($id);
$estado = $listDepartamentos[0]['estado'];
$estadoText = $estado == 1 ? "Activo" : "Inactivo";
$estadoFalse = $estado == 1 ? 0 : 1;
$estadoFalseText = $estadoFalse == 1 ? "Activo" : "Inactivo";



$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='hidden' id='idDepartamento' value='$id'>";
$contenidoModal .= "  <input type='text' class='form-control' id='departamento' value='" . $listDepartamentos[0]['nombre'] . "' placeholder='Departamento'>";
$contenidoModal .= "  <label for='departamento'>Departamento</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='form-floating mb-3'>";
$contenidoModal .= "  <select class='form-select' id='estadoDepartamento' aria-label='Estado Departamento'>";
$contenidoModal .= "    <option value='$estado'> $estadoText </option>";
$contenidoModal .= "    <option value='$estadoFalse'> $estadoFalseText </option>";
$contenidoModal .= "  </select>";
$contenidoModal .= "  <label for='estadoDepartamento'>Estado Departamento</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_update_departamento'>Modificar Departamento</button>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Modificar Departamento', 'text-primary', $contenidoModal);