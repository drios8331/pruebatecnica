<?php
require '../Model/ModelConfiguracion.php';
require '../../tools/Modal.php';

$modal = new Modal();
$configuracion = new Configuracion();

$regexp = '/^[a-z\s]+$/i';
$rol = $_POST['rol'];
$comp_roles = preg_match($regexp, $rol);
$Rol = $comp_roles ? trim($rol) : "";

try {
    if (empty($Rol) != 1) {
        if ($configuracion->createRol($Rol)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Informacion insertada con exito.');
        }
    } else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al insertar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error con la conexion a la BD, error: ' . $e->getMessage();
}