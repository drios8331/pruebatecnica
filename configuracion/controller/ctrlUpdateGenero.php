<?php
require '../../tools/Modal.php';
require '../Model/ModelConfiguracion.php';

$modal = new Modal();
$configuracion = new Configuracion();

$regexp = '/^[a-z\s]+$/i';
$id = $_POST['id'];
$genero = $_POST['genero'];
$estado = $_POST['estado'];
$comp_genero = preg_match($regexp, $genero);
$Genero = $comp_genero ? trim($genero) : "";

try {
    if (empty($id) != 1 && empty($Genero) != 1) {
        if ($configuracion->updateGenero($id,$Genero,$estado)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Modificacion de informacion exitosa.');
        }
    }else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al modificar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error en BD, error: ' . $e->getMessage();
}