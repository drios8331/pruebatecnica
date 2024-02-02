<?php
require '../../tools/Modal.php';

$modal = new Modal();

$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='text' class='form-control' id='rol' placeholder='Rol'>";
$contenidoModal .= "  <label for='rol'>Rol</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_insert_rol_ok'>Insertar Rol</button>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Insertar Rol', 'text-primary', $contenidoModal);
