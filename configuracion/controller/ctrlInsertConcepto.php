<?php
require '../Model/ModelConfiguracion.php';
require '../../tools/Modal.php';

$modal = new Modal();
$configuracion = new Configuracion();

$regexp = '/^[a-z\s]+$/i';
$concepto = $_POST['concepto'];
$comp_conceptos = preg_match($regexp, $concepto);
$Conceptos = $comp_conceptos ? trim($concepto) : "";

try {
    if (empty($Conceptos) != 1) {
        if ($configuracion->createConcepto($Conceptos)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Informacion insertada con exito.');
        }
    } else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al insertar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error con la conexion a la BD, error: ' . $e->getMessage();
}
