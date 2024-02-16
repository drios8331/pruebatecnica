<?php
require '../Model/ModelUsuarios.php';
require '../../tools/Modal.php';
date_default_timezone_set('America/Bogota');

$usuarios = new Usuarios();
$modal = new Modal();

$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$usuario = $_POST['usuario'];
$clave = $_POST['password'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$vigPass = 60;
$fCPass = date("Y-m-d");
$estado = 1;

try {
    if (empty($usuario) != 1 && empty($clave) != 1 && empty($nombre) != 1 && empty($identificacion) != 1 && empty($email) != 1 && empty($rol) != 1) {
        if ($usuarios->createUsuarios($usuario, password_hash($clave, PASSWORD_DEFAULT), $nombre, $identificacion, $email, $rol,$vigPass, $fCPass, $estado)) {
            $modal->modalAlerta('Alerta', 'text-primary', 'Informacion Insertada de manera exitosa.');
        }
    } else {
        $modal->modalAlerta('Alerta', 'text-danger', 'La informacion no se pudo Insertar de manera exitosa.');
    }
    
} catch (\Throwable $e) {
    echo "Error con Base de Datos, error: ". $e->getMessage();
}