<?php
require '../Model/ModelConfiguracion.php';
require '../../tools/Modal.php';

$modal = new Modal();
$configuracion = new Configuracion();

$regexp = '/^[a-z\s]+$/i';
$departamento = $_POST['departamento'];
$comp_departamentos = preg_match($regexp, $departamento);
$Departamento = $comp_departamentos ? trim($departamento) : "";

try {
    if (empty($Departamento) != 1) {
        if ($configuracion->createDepartamento($Departamento)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Informacion insertada con exito.');
        }
    } else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al insertar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error con la conexion a la BD, error: ' . $e->getMessage();
}
