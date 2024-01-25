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
        $statement = $this->db->prepare("SELECT `idEmpleados`, `documento`, `nombres`, `apellidos`, `edad`, `fechaDeIngreso`, `comentarios`, `genero_id`, `departamento_id`, `estado` FROM `tblempleados`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEmpleados[] = $consulta;
        }
        return $listarEmpleados;
    }

    public function listarEmpleadosByDoc($documento)
    {
        $listarEmpleadosByDoc = null;
        $statement = $this->db->prepare("SELECT `documento`, `nombres`, `apellidos`, `edad`, `fechaDeIngreso`, `comentarios`, `genero_id`, `departamento_id`, `estado` FROM `tblempleados` WHERE `documento`=:documento");
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
        $statement = $this->db->prepare("SELECT idEmpleados, `documento`, `nombres`, `apellidos`, `edad`, `fechaDeIngreso`, `comentarios`, `genero_id`, `departamento_id`, `estado` FROM `tblempleados` WHERE `idEmpleados`=:id");
        $statement->bindparam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarEmpleadosById[] = $consulta;
        }
        return $listarEmpleadosById;
    }

    public function createEmpleados($documento, $nombre, $apellido, $edad, $fIngreso, $comentarios, $genero, $departamento, $estado)
    {
        $statement = $this->db->prepare("INSERT INTO `tblempleados`(documento, `nombres`, `apellidos`, edad,
        `fechaDeIngreso`, `comentarios`, `genero_id`, `departamento_id`, `estado`) 
        VALUES (:documento,:nombre,:apellido,:edad,:fIngreso,:comentarios,:genero,:departamento,:estado)");
        $statement->bindparam(':documento', $documento);
        $statement->bindparam(':nombre', $nombre);
        $statement->bindparam(':apellido', $apellido);
        $statement->bindparam(':edad', $edad);
        $statement->bindparam(':fIngreso', $fIngreso);
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
}
