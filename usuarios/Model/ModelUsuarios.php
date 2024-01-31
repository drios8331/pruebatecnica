<?php
    require_once '../../conexion.php';

    class Usuarios extends Conexion{

        public function __construct()
        {
         $this->db = parent::__construct();   
        }

        public function listarUsuarios(){
            $listarUsuarios=null;
            $statement = $this->db->prepare("SELECT `idUsuario`, `usuario`, `password`, `nombre`, 
            `identificacion`, `email`, `rol_id`, `vigPassword`, `fcPassword`, `estado` FROM `tblusers`");
            $statement->execute();
            while ($consulta = $statement->fetch()) {
                $listarUsuarios[] = $consulta;
            }
            return $listarUsuarios;
        }

        public function listarUsuariosById(){
            
        }

        public function createUsuarios(){
            
        }

        public function updateUsuarios(){
            
        }
    }