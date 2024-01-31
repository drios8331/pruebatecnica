<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$regexp = '/^[a-z\s]+$/i';
$id = $_POST['id'];
$concepto = $_POST['concepto'];
$estado = $_POST['estado'];
$comp_conceptos = preg_match($regexp, $concepto);
$Concepto = $comp_conceptos ? trim($concepto) : "";

try {
    if (empty($id) != 1 && empty($Concepto) != 1) {
        if ($configuracion->updateConcepto($id,$Concepto,$estado)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Modificacion de informacion exitosa.');
        }
    }else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al modificar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error en BD, error: ' . $e->getMessage();
}