<?php
require '../Model/ModelConfiguracion.php';
require '../../tools/Modal.php';

$modal = new Modal();
$configuracion = new Configuracion();

$regexp = '/^[a-z\s]+$/i';
$genero = $_POST['genero'];
$comp_generos = preg_match($regexp, $genero);
$Genero = $comp_generos ? trim($genero) : "";

try {
    if (empty($Genero) != 1) {
        if ($configuracion->createGenero($Genero)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Informacion insertada con exito.');
        }
    } else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al insertar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error con la conexion a la BD, error: ' . $e->getMessage();
}
