<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$regexp = '/^[a-z\s]+$/i';
$id = $_POST['id'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];
$comp_roles = preg_match($regexp, $rol);
$Rol = $comp_roles ? trim($rol) : "";

try {
    if (empty($id) != 1 && empty($Rol) != 1) {
        if ($configuracion->updateRol($id,$Rol,$estado)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Modificacion de informacion exitosa.');
        }
    }else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al modificar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error en BD, error: ' . $e->getMessage();
}