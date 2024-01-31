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

    public function listDepartamentosGastos()
    {

        $listDepartamentosGastos = null;
        $statement = $this->db->prepare("SELECT idGastos, SUM(gastos) as 'Suma', D.nombre as 'departamento' 
        FROM tblgastos as G INNER JOIN tbldepartamentos as D ON D.idDepartamento=G.departamento_id 
        GROUP BY departamento_id ORDER BY SUM(gastos) DESC LIMIT 3");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listDepartamentosGastos[] = $consulta;
        }
        return $listDepartamentosGastos;
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

    public function listConceptos()
    {

        $listConceptos = null;
        $statement = $this->db->prepare("SELECT `idConcepto`, `nombre`, `estado` FROM `tblconceptos`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listConceptos[] = $consulta;
        }
        return $listConceptos;
    }

    public function listConceptoById($id)
    {

        $listConceptoById = null;
        $statement = $this->db->prepare("SELECT `idConcepto`, `nombre`, `estado` FROM `tblconceptos` WHERE `idConcepto`=:id");
        $statement->bindparam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listConceptoById[] = $consulta;
        }
        return $listConceptoById;
    }

    public function createConcepto($concepto)
    {

        $statement = $this->db->prepare("INSERT INTO `tblconceptos`(`nombre`) VALUES (:concepto)");
        $statement->bindparam(':concepto', $concepto);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateConcepto($id, $concepto, $estado)
    {

        $statement = $this->db->prepare("UPDATE `tblconceptos` SET `nombre`=:concepto, estado=:estado WHERE `idConcepto`=:id");
        $statement->bindparam(':id', $id);
        $statement->bindparam(':concepto', $concepto);
        $statement->bindparam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listRoles()
    {

        $listRoles = null;
        $statement = $this->db->prepare("SELECT `idRol`, `nombre`, `estado` FROM `tblroles`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listRoles[] = $consulta;
        }
        return $listRoles;
    }

    public function listRolesById($id)
    {

        $listRolesById = null;
        $statement = $this->db->prepare("SELECT `idRol`, `nombre`, `estado` FROM `tblroles` WHERE `idRol`=:id");
        $statement->bindparam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listRolesById[] = $consulta;
        }
        return $listRolesById;
    }

    public function createRol($rol)
    {

        $statement = $this->db->prepare("INSERT INTO `tblroles`(`nombre`) VALUES (:rol)");
        $statement->bindparam(':rol', $rol);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateRol($id, $rol, $estado)
    {

        $statement = $this->db->prepare("UPDATE `tblroles` SET `nombre`=:rol, estado=:estado WHERE `idRol`=:id");
        $statement->bindparam(':id', $id);
        $statement->bindparam(':rol', $rol);
        $statement->bindparam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
