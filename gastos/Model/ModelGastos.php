<?php
    require_once '../../conexion.php';

    class Gastos extends Conexion{

        public function __construct()
        {
         $this->db = parent::__construct();   
        }

        public function listarGastos() {
            $listarGastos=null;
            $statement = $this->db->prepare("SELECT `idGastos`, `año`, `mes`, `ingresos`, `gastos`, `departamento_id`, `idConcepto`, `estado` FROM `tblgastos`");
            $statement->execute();
            while ($consulta = $statement->fetch()) {
                $listarGastos[] = $consulta;
            }
            return $listarGastos;
        }
    }
