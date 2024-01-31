<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$id = $_POST['id'];
$concepto = $configuracion->listConceptoById($id);


$contenidoModal  = "<ul class='list-group list-group-flush'>";
$contenidoModal .= "  <li class='list-group-item'> Id: <span>" . $concepto[0]['idConcepto'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Concepto: <span>" . $concepto[0]['nombre'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Estado: <span>" . $concepto[0]['estado'] . "</span></li>";
$contenidoModal .= "</ul>";

$modal->modalAlerta('Editar Concepto', 'test-primary', $contenidoModal);