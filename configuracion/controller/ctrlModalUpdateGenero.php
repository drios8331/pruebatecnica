<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$id = $_POST['id'];
$listGeneros = $configuracion->listGeneroById($id);
$estado = $listGeneros[0]['estado'];
$estadoText = $estado == 1 ? "Activo" : "Inactivo";
$estadoFalse = $estado == 1 ? 0 : 1;
$estadoFalseText = $estadoFalse == 1 ? "Activo" : "Inactivo";



$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='hidden' id='idGenero' value='$id'>";
$contenidoModal .= "  <input type='text' class='form-control' id='genero' value='" . $listGeneros[0]['nombre'] . "' placeholder='Genero'>";
$contenidoModal .= "  <label for='genero'>Genero</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='form-floating mb-3'>";
$contenidoModal .= "  <select class='form-select' id='estadoGenero' aria-label='Estado Genero'>";
$contenidoModal .= "    <option value='$estado'> $estadoText </option>";
$contenidoModal .= "    <option value='$estadoFalse'> $estadoFalseText </option>";
$contenidoModal .= "  </select>";
$contenidoModal .= "  <label for='estado'>Estado Genero</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_update_genero'>Modificar Genero</button>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Modificar Genero', 'text-primary', $contenidoModal);