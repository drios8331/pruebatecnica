<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$id = $_POST['id'];
$listConceptos = $configuracion->listConceptoById($id);
$estado = $listConceptos[0]['estado'];
$estadoText = $estado == 1 ? "Activo" : "Inactivo";
$estadoFalse = $estado == 1 ? 0 : 1;
$estadoFalseText = $estadoFalse == 1 ? "Activo" : "Inactivo";



$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='hidden' id='idConcepto' value='$id'>";
$contenidoModal .= "  <input type='text' class='form-control' id='concepto' value='" . $listConceptos[0]['nombre'] . "' placeholder='Concepto'>";
$contenidoModal .= "  <label for='concepto'>Concepto</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='form-floating mb-3'>";
$contenidoModal .= "  <select class='form-select' id='estadoConcepto' aria-label='Estado Concepto'>";
$contenidoModal .= "    <option value='$estado'> $estadoText </option>";
$contenidoModal .= "    <option value='$estadoFalse'> $estadoFalseText </option>";
$contenidoModal .= "  </select>";
$contenidoModal .= "  <label for='estadoConcepto'>Estado Concepto</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_update_concepto'>Modificar Concepto</button>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Modificar Concepto', 'text-primary', $contenidoModal);