<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$regexp = '/^[a-z\s]+$/i';
$id = $_POST['id'];
$departamento = $_POST['departamento'];
$estado = $_POST['estado'];
$comp_departamentos = preg_match($regexp, $departamento);
$Departamento = $comp_departamentos ? trim($departamento) : "";

try {
    if (empty($id) != 1 && empty($Departamento) != 1) {
        if ($configuracion->updateDepartamento($id,$Departamento,$estado)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Modificacion de informacion exitosa.');
        }
    }else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al modificar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error en BD, error: ' . $e->getMessage();
}