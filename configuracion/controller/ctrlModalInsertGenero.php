<?php
require '../../tools/Modal.php';

$modal = new Modal();

$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='text' class='form-control' id='genero' placeholder='Genero'>";
$contenidoModal .= "  <label for='genero'>Genero</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_insert_genero_ok'>Insertar Genero</button>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Insertar Genero', 'text-primary', $contenidoModal);
