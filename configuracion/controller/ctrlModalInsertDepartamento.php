<?php
    // require '../Model/ModelConfiguracion.php';
    require '../../tools/Modal.php';

    $modal = new Modal();
    // $configuracion = new Configuracion();

$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='text' class='form-control' id='departamento' placeholder='Departamento'>";
$contenidoModal .= "  <label for='departamento'>Departamento</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_insert_departamento_ok'>Insertar Departamento</button>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Insertar Departamento', 'text-primary', $contenidoModal);