<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$id = $_POST['id'];
$rol = $configuracion->listRolesById($id);


$contenidoModal  = "<ul class='list-group list-group-flush'>";
$contenidoModal .= "  <li class='list-group-item'> Id: <span>" . $rol[0]['idRol'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Rol: <span>" . $rol[0]['nombre'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Estado: <span>" . $rol[0]['estado'] . "</span></li>";
$contenidoModal .= "</ul>";

$modal->modalAlerta('Editar Rol', 'test-primary', $contenidoModal);