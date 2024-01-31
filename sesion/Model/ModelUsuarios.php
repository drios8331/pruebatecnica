<?php
    require_once '../../conexion.php';

    class Usuarios extends Conexion{

        public function __construct()
        {
         $this->db = parent::__construct();   
        }

        public function listarUsuarios(){
            
        }

        public function listarUsuariosById(){
            
        }

        public function createUsuarios(){
            
        }

        public function updateUsuarios(){
            
        }
    }