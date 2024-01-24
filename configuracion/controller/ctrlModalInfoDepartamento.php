<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$id = $_POST['id'];
$departamento = $configuracion->listDepartamentosById($id);


$contenidoModal  = "<ul class='list-group list-group-flush'>";
$contenidoModal .= "  <li class='list-group-item'> Id: <span>" . $departamento[0]['idDepartamento'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Departamento: <span>" . $departamento[0]['nombre'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Estado: <span>" . $departamento[0]['estado'] . "</span></li>";
$contenidoModal .= "</ul>";

$modal->modalAlerta('Editar Departamento', 'test-primary', $contenidoModal);