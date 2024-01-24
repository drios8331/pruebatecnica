<?php
require_once '../../conexion.php';

class Configuracion extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listDepartamentos()
    {

        $listDepartamentos = null;
        $statement = $this->db->prepare("SELECT `idDepartamento`, `nombre`, estado FROM `tbldepartamentos`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listDepartamentos[] = $consulta;
        }
        return $listDepartamentos;
    }

    public function listDepartamentosById($id)
    {

        $listDepartamentos = null;
        $statement = $this->db->prepare("SELECT * FROM `tbldepartamentos` WHERE `idDepartamento`=:id");
        $statement->bindparam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listDepartamentos[] = $consulta;
        }
        return $listDepartamentos;
    }

    public function createDepartamento($departamento)
    {

        $statement = $this->db->prepare("INSERT INTO `tbldepartamentos`(`nombre`) VALUES (:departamento)");
        $statement->bindparam(':departamento', $departamento);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateDepartamento($id, $departamento, $estado)
    {

        $statement = $this->db->prepare("UPDATE `tbldepartamentos` SET `nombre`=:departamento, estado=:estado WHERE `idDepartamento`=:id");
        $statement->bindparam(':id', $id);
        $statement->bindparam(':departamento', $departamento);
        $statement->bindparam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listGeneros()
    {

        $listGeneros = null;
        $statement = $this->db->prepare("SELECT `idGenero`, `nombre`, estado FROM `tblGeneros`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listGeneros[] = $consulta;
        }
        return $listGeneros;
    }

    public function listGeneroById($id)
    {

        $listGeneros = null;
        $statement = $this->db->prepare("SELECT * FROM `tblGeneros` WHERE `idGenero`=:id");
        $statement->bindparam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listGeneros[] = $consulta;
        }
        return $listGeneros;
    }

    public function createGenero($genero)
    {

        $statement = $this->db->prepare("INSERT INTO `tblGeneros`(`nombre`) VALUES (:genero)");
        $statement->bindparam(':genero', $genero);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateGenero($id, $genero, $estado)
    {

        $statement = $this->db->prepare("UPDATE `tblgeneros` SET `nombre`=:genero, estado=:estado WHERE `idGenero`=:id");
        $statement->bindparam(':id', $id);
        $statement->bindparam(':genero', $genero);
        $statement->bindparam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
