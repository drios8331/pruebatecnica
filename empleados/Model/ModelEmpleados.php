<?php
require_once '../../conexion.php';

class Empleados extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarEmpleados()
    {

        $listarEmpleados = null;
        $statement = $this->db->prepare("SELECT `idEmpleados`, `documento`, `nombres`, `apellidos`, `edad`, `fechaDeIngreso`, `salario`, `comentarios`, `genero_id`, `departamento_id`, `estado` FROM `tblempleados`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEmpleados[] = $consulta;
        }
        return $listarEmpleados;
    }

    public function listarEmpleadosByDoc($documento)
    {
        $listarEmpleadosByDoc = null;
        $statement = $this->db->prepare("SELECT `documento`, `nombres`, `apellidos`, `edad`, `fechaDeIngreso`, `salario`, `comentarios`, `genero_id`, `departamento_id`, `estado` FROM `tblempleados` WHERE `documento`=:documento");
        $statement->bindparam(':documento', $documento);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEmpleadosByDoc[] = $consulta;
        }
        return $listarEmpleadosByDoc;
    }

    public function listarEmpleadosById($id)
    {
        $listarEmpleadosById = null;
        $statement = $this->db->prepare("SELECT E.idEmpleados as 'idEmpleados', E.documento as 'documento', E.nombres as 'nombres', 
        E.apellidos as 'apellidos', E.edad as 'edad', E.fechaDeIngreso as 'fechaDeIngreso', E.salario as 'salario', E.comentarios as 'comentarios', 
        G.idGenero as 'genero_id', G.nombre as 'genero', D.idDepartamento as 'departamento_id', D.nombre as 'departamento', 
        E.estado as 'estado' FROM `tblempleados` as E INNER JOIN tblgeneros as G ON G.idGenero=E.genero_id 
        INNER JOIN tbldepartamentos as D ON D.idDepartamento=E.departamento_id WHERE `idEmpleados`=:id; ");
        $statement->bindparam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEmpleadosById[] = $consulta;
        }
        return $listarEmpleadosById;
    }

    public function createEmpleados($documento, $nombre, $apellido, $edad, $fIngreso, $salario, $comentarios, $genero, $departamento, $estado)
    {
        $statement = $this->db->prepare("INSERT INTO `tblempleados`(documento, `nombres`, `apellidos`, edad,
        `fechaDeIngreso`, `salario`, `comentarios`, `genero_id`, `departamento_id`, `estado`) 
        VALUES (:documento,:nombre,:apellido,:edad,:fIngreso,:salario,:comentarios,:genero,:departamento,:estado)");
        $statement->bindparam(':documento', $documento);
        $statement->bindparam(':nombre', $nombre);
        $statement->bindparam(':apellido', $apellido);
        $statement->bindparam(':edad', $edad);
        $statement->bindparam(':fIngreso', $fIngreso);
        $statement->bindparam(':salario', $salario);
        $statement->bindparam(':comentarios', $comentarios);
        $statement->bindparam(':genero', $genero);
        $statement->bindparam(':departamento', $departamento);
        $statement->bindparam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateEmpleados($id, $documento, $nombre, $apellido, $edad, $fIngreso, $salario, $comentarios, $genero, $departamento, $estado)
    {
        $statement = $this->db->prepare("UPDATE `tblempleados` SET `documento`=:documento,`nombres`=:nombre,`apellidos`=:apellido,
        `edad`=:edad,`fechaDeIngreso`=:fIngreso, salario=:salario,`comentarios`=:comentarios,`genero_id`=:genero,`departamento_id`=:departamento,`estado`=:estado 
        WHERE `idEmpleados`=:id");
        $statement->bindparam(':id', $id);
        $statement->bindparam(':documento', $documento);
        $statement->bindparam(':nombre', $nombre);
        $statement->bindparam(':apellido', $apellido);
        $statement->bindparam(':edad', $edad);
        $statement->bindparam(':fIngreso', $fIngreso);
        $statement->bindparam(':comentarios', $comentarios);
        $statement->bindparam(':salario', $salario);
        $statement->bindparam(':genero', $genero);
        $statement->bindparam(':departamento', $departamento);
        $statement->bindparam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
