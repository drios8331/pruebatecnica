<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$id = $_POST['id'];
$genero = $configuracion->listGeneroById($id);


$contenidoModal  = "<ul class='list-group list-group-flush'>";
$contenidoModal .= "  <li class='list-group-item'> Id: <span>" . $genero[0]['idGenero'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Genero: <span>" . $genero[0]['nombre'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Estado: <span>" . $genero[0]['estado'] . "</span></li>";
$contenidoModal .= "</ul>";

$modal->modalAlerta('Editar Genero', 'test-primary', $contenidoModal);