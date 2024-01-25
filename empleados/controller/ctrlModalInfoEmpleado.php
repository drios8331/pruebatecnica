<?php
require '../../tools/Modal.php';
require '../Model/ModelEmpleados.php';

$modal = new Modal();
$empleados = new Empleados();

$id = $_POST['id'];
$empleado = $empleados->listarEmpleadosById($id);


$contenidoModal  = "<ul class='list-group list-group-flush'>";
$contenidoModal .= "  <li class='list-group-item'> Id: <span>" . $empleado[0]['idEmpleados'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Documento: <span>" . $empleado[0]['documento'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Nombre: <span>" . $empleado[0]['nombres'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Apellido: <span>" . $empleado[0]['apellidos'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Edad: <span>" . $empleado[0]['edad'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Fecha de Ingreso: <span>" . $empleado[0]['fechaDeIngreso'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Salario: <span>" . $empleado[0]['salario'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Comentarios: <span>" . $empleado[0]['comentarios'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Genero: <span>" . $empleado[0]['genero'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Departamento: <span>" . $empleado[0]['departamento'] . "</span></li>";
$contenidoModal .= "  <li class='list-group-item'> Estado: <span>" .  $empleado[0]['estado']  . " </span></li>";
$contenidoModal .= "</ul>";

$modal->modalAlerta('Editar Empleado', 'test-primary', $contenidoModal);