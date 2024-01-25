<?php
require '../Model/ModelEmpleados.php';
require '../../tools/Modal.php';

$modal = new Modal();
$empleado = new Empleados();
// $listarEmpleado = $empleado->listarEmpleadosById($id);

$regexp = '/^[a-z\s]+$/i';
$id = $_POST['id'];
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$comp_nombres = preg_match($regexp, $nombre);
$apellido = $_POST['apellido'];
$comp_apellidos = preg_match($regexp, $apellido);
$edad = $_POST['edad'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$genero = $_POST['genero'];
$departamento = $_POST['departamento'];
$comentarios = $_POST['comentarios'];
$estado = $_POST['estado'];

$Documento = trim($documento);
$Nombre = $comp_nombres ? trim($nombre) : "";
$Apellido = $comp_apellidos ? trim($apellido) : "";
$Edad = trim($edad);
$Comentarios = trim($comentarios);

try {
    if (empty($Documento) != 1 && empty($Nombre) != 1 && empty($Apellido) != 1 && empty($edad) != 1 && empty($fecha_ingreso) != 1 && empty($genero) != 1 && empty($departamento) != 1) {
        if ($empleado->updateEmpleados($id,$Documento, $Nombre, $Apellido, $edad, $fecha_ingreso, $Comentarios, $genero, $departamento, $estado)) {
            $modal->modalAlerta('Informacion', 'text-primary', 'Informacion modificada con exito.');
        }
    } else {
        $modal->modalAlerta('Alerta', 'text-danger', 'Error al insertar la informacion, no se permiten espacios vacios o caracteres especiales.');
    }
} catch (\Throwable $e) {
    echo 'Error en BD, error: ' . $e->getMessage();
}
