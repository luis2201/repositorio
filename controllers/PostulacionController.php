<?php

    require_once 'models/Postulacion.php';
    require_once 'models/Database.php';

    class PostulacionController {
        private $db;
        private $postulacion;
        private $periodo;

        public function __construct() {
            $this->db = (new Database())->getConnection();
            $this->postulacion = new Postulacion($this->db);
            $this->periodo = new Periodo($this->db);
        }

        public function index() {
            include 'views/postulacion/index.php';
        }

        public function catedra(){
            $stmt = $this->periodo->leer();            
            include_once 'views/postulacion/catedra.php';
        }
        
        public function investigacion(){
            include_once 'views/postulacion/investigacion.php';
        }

    }

?>