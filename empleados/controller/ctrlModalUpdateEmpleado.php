<?php
require '../../tools/Modal.php';
require '../Model/ModelEmpleados.php';
require '../../configuracion/Model/ModelConfiguracion.php';

$modal = new Modal();
$empleados = new Empleados();
$configuracion = new Configuracion();

$id = $_POST['id'];
$listarEmpleados = $empleados->listarEmpleadosById($id);
$listarGeneros = $configuracion->listGeneros();
$listarDepartamentos = $configuracion->listDepartamentos();
$estado = $listarEmpleados[0]['estado'];
$estadoText = $estado == 1 ? "Activo" : "Inactivo";
$estadoFalse = $estado == 1 ? 0 : 1;
$estadoFalseText = $estadoFalse == 1 ? "Activo" : "Inactivo";



$contenidoModal  = "<div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='hidden' id='idEmpleado' value='$id'>";
$contenidoModal .= "  <input type='text' class='form-control' id='documento' value='" . $listarEmpleados[0]['documento'] . "' placeholder='Documento'>";
$contenidoModal .= "  <label for='documento'>Documento</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "  <div class='row g-2 mb-3'>";
$contenidoModal .= "    <div class='col-md'>";
$contenidoModal .= "      <div class='form-floating'>";
$contenidoModal .= "        <input type='text' class='form-control' id='nombre' placeholder='Nombres' value='" . $listarEmpleados[0]['nombres'] . "'>";
$contenidoModal .= "        <label for='nombre'>Nombres</label>";
$contenidoModal .= "      </div>";
$contenidoModal .= "    </div>";
$contenidoModal .= "    <div class='col-md'>";
$contenidoModal .= "      <div class='form-floating'>";
$contenidoModal .= "        <input type='text' class='form-control' id='apellido' placeholder='Apellidos' value='" . $listarEmpleados[0]['apellidos'] . "'>";
$contenidoModal .= "        <label for='apellido'>Apellidos</label>";
$contenidoModal .= "      </div>";
$contenidoModal .= "    </div>";
$contenidoModal .= "  </div>";
$contenidoModal .= "  <div class='row g-2 mb-3'>";
$contenidoModal .= "    <div class='col-md'>";
$contenidoModal .= "      <div class='form-floating'>";
$contenidoModal .= "        <input type='number' class='form-control' id='edad' placeholder='Edad' value='" . $listarEmpleados[0]['edad'] . "'>";
$contenidoModal .= "        <label for='edad'>Edad</label>";
$contenidoModal .= "      </div>";
$contenidoModal .= "    </div>";
$contenidoModal .= "    <div class='col-md'>";
$contenidoModal .= "      <div class='form-floating'>";
$contenidoModal .= "        <input type='date' class='form-control' id='fecha_ingreso' placeholder='Fecha de Ingreso' value='" . $listarEmpleados[0]['fechaDeIngreso'] . "'>";
$contenidoModal .= "        <label for='fecha_ingreso'>Fecha de Ingreso</label>";
$contenidoModal .= "      </div>";
$contenidoModal .= "    </div>";
$contenidoModal .= "  </div>";
$contenidoModal .= "  <div class='row g-2 mb-3'>";
$contenidoModal .= "    <div class='col-md'>";
$contenidoModal .= "      <div class='form-floating'>";
$contenidoModal .= "        <select class='form-select' id='genero' aria-label='genero'>";
$contenidoModal .= "            <option value='" . $listarEmpleados[0]['genero_id'] . "'>" . $listarEmpleados[0]['genero'] . "</option>";
$idGeneroEmpleado = $listarEmpleados[0]['genero_id'];
if ($listarGeneros != null) {
    foreach ($listarGeneros as $key => $value) {
        $idGenero = $value['idGenero'];
        if ($idGenero != $idGeneroEmpleado) {
            $contenidoModal .= "    <option value='" . $value['idGenero'] . "'>" . $value['nombre'] . "</option>";
        }
    }
}
$contenidoModal .= "        </select>";
$contenidoModal .= "        <label for='genero'>Genero</label>";
$contenidoModal .= "      </div>";
$contenidoModal .= "    </div>";
$contenidoModal .= "    <div class='col-md'>";
$contenidoModal .= "      <div class='form-floating'>";
$contenidoModal .= "        <select class='form-select' id='departamento' aria-label='departamento'>";
$contenidoModal .= "            <option value='" . $listarEmpleados[0]['departamento_id'] . "'>" . $listarEmpleados[0]['departamento'] . "</option>";
$idDepartamentoEmpleado = $listarEmpleados[0]['departamento_id'];
if ($listarDepartamentos != null) {
    foreach ($listarDepartamentos as $key => $value) {
        $idDepartamento = $value['idDepartamento'];
        if ($idDepartamento != $idDepartamentoEmpleado) {
            $contenidoModal .= "    <option value='" . $value['idDepartamento'] . "'>" . $value['nombre'] . "</option>";
        }
    }
}
$contenidoModal .= "        </select>";
$contenidoModal .= "        <label for='departamento'>Departamento</label>";
$contenidoModal .= "      </div>";
$contenidoModal .= "    </div>";
$contenidoModal .= "  </div>";
$contenidoModal .= "  <div class='form-floating mb-3'>";
$contenidoModal .= "  <input type='text' class='form-control' id='comentarios' value='" . $listarEmpleados[0]['comentarios'] . "' placeholder='Comentarios'>";
$contenidoModal .= "  <label for='comentarios'>Comentarios</label>";
$contenidoModal .= "  </div>";
$contenidoModal .= "<div class='form-floating mb-3'>";
$contenidoModal .= "  <select class='form-select' id='estadoDepartamento' aria-label='Estado Departamento'>";
$contenidoModal .= "    <option value='$estado'> $estadoText </option>";
$contenidoModal .= "    <option value='$estadoFalse'> $estadoFalseText </option>";
$contenidoModal .= "  </select>";
$contenidoModal .= "  <label for='estadoDepartamento'>Estado Departamento</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "<button class='btn btn-primary' id='btn_update_empleado'>Modificar Empleado</button>";
$contenidoModal .= "</div>";
$contenidoModal .= "</div>";

$modal->modalAlerta('Modificar Empleados', 'text-primary', $contenidoModal);
