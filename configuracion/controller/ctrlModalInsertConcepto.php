<?php
require '../../tools/Modal.php';

$modal = new Modal();

$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='text' class='form-control' id='concepto' placeholder='Concepto'>";
$contenidoModal .= "  <label for='concepto'>Concepto</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_insert_concepto_ok'>Insertar Concepto</button>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Insertar Concepto', 'text-primary', $contenidoModal);
