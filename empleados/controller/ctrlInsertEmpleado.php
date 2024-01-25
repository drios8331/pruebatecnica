<?php
require '../Model/ModelEmpleados.php';
require '../../tools/Modal.php';

$modal = new Modal();
$empleado = new Empleados();

$regexp = '/^[a-z\s]+$/i';
$documento = $_POST['documento'];
$listarEmpleados = $empleado->listarEmpleadosByDoc($documento);
// print_r($listarEmpleados[0]['documento']);
$Documento = isset($listarEmpleados[0]['documento']) === false ? trim($documento) : "";
$nombre = $_POST['nombre'];
$comp_nombres = preg_match($regexp, $nombre);
$Nombre = $comp_nombres ? trim($nombre) : "";
$apellido = $_POST['apellido'];
$comp_apellidos = preg_match($regexp, $apellido);
$Apellido = $comp_apellidos ? trim($apellido) : "";
$edad = $_POST['edad'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$genero = $_POST['genero'];
$departamento = $_POST['departamento'];
$comentarios = $_POST['comentarios'];
$Comentarios = trim($comentarios);
$estado = 1;
try {
        if (empty($Documento) != 1 && empty($Nombre) != 1 && empty($Apellido) != 1 && empty($edad) != 1 && empty($fecha_ingreso) != 1 && empty($genero) != 1 && empty($departamento) != 1) {
            if ($empleado->createEmpleados($Documento, $Nombre, $Apellido, $edad, $fecha_ingreso, $Comentarios, $genero, $departamento, $estado)) {
                $modal->modalAlerta('Informacion', 'text-primary', 'Informacion insertada con exito.');
            }
        } else {
            $modal->modalAlerta('Alerta', 'text-danger', 'Error al insertar la informacion, no se permiten espacios vacios o caracteres especiales.');
        }
} catch (\Throwable $e) {
    echo 'Error en BD, error: ' . $e->getMessage();
}
