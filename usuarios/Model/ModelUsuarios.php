<?php
require_once '../../conexion.php';

class Usuarios extends Conexion
{

    public function __construct()
    {
        $this->db = parent::__construct();
    }

    public function listarUsuarios()
    {
        $listarUsuarios = null;
        $statement = $this->db->prepare("SELECT `idUsuario`, `usuario`, `password`, `nombre`, 
            `identificacion`, `email`, `rol_id`, `vigPassword`, `fcPassword`, `estado` FROM `tblusers`");
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarUsuarios[] = $consulta;
        }
        return $listarUsuarios;
    }

    public function listarUsuariosById($id)
    {
        $listarUsuariosById = null;
        $statement = $this->db->prepare("SELECT `usuario`, `password`, `nombre`, 
            `identificacion`, `email`, `rol_id`, `vigPassword`, `fcPassword`, `estado` FROM `tblusers` WHERE `idUsuario`=:id");
        $statement->bindparam(':id', $id);
        $statement->execute();
        while ($consulta = $statement->fetch()) {
            $listarUsuariosById[] = $consulta;
        }
        return $listarUsuariosById;
    }

    public function createUsuarios($usuario, $clave, $nombre, $identificacion, $email, $rol, $vigPass, $fCPass, $estado)
    {
        $statement = $this->db->prepare("INSERT INTO `tblusers`(`usuario`, `password`, `nombre`, 
            `identificacion`, `email`, `rol_id`, `vigPassword`, `fcPassword`, `estado`) VALUES 
            (:usuario, :clave, :nombre, :identificacion, :email, :rol, :vigPass, :fCPass, :estado)");
        $statement->bindparam(':usuario', $usuario);
        $statement->bindparam(':clave', $clave);
        $statement->bindparam(':nombre', $nombre);
        $statement->bindparam(':identificacion', $identificacion);
        $statement->bindparam(':email', $email);
        $statement->bindparam(':rol', $rol);
        $statement->bindparam(':vigPass', $vigPass);
        $statement->bindparam(':fCPass', $fCPass);
        $statement->bindparam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUsuarios($id, $usuario, $clave, $nombre, $identificacion, $email, $rol, $vigPass, $fCPass, $estado)
    {
        $statement = $this->db->prepare("UPDATE `tblusers` SET
            `usuario`= :usuario,`password`= :clave,`nombre`= :nombre,`identificacion`= :identificacion,
            `email`= :email,`rol_id`= :rol,`vigPassword`= :vigPass,`fcPassword`= :fCPass,
            `estado`= :estado WHERE `idUsuario`= :id");
        $statement->bindparam(':id', $id);
        $statement->bindparam(':usuario', $usuario);
        $statement->bindparam(':clave', $clave);
        $statement->bindparam(':nombre', $nombre);
        $statement->bindparam(':identificacion', $identificacion);
        $statement->bindparam(':email', $email);
        $statement->bindparam(':rol', $rol);
        $statement->bindparam(':vigPass', $vigPass);
        $statement->bindparam(':fCPass', $fCPass);
        $statement->bindparam(':estado', $estado);
        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
