<?php
    // controllers/ArticuloController.php

    // require_once 'models/Articulo.php';
    require_once 'models/Database.php';

    class ArticuloController {
        private $db;
        private $articulo;

        public function __construct() {
            $this->db = (new Database())->getConnection();
            //$this->articulo = new Articulo($this->db);
        }

        // Listar todas las autores
        public function index() {
            //$stmt = $this->autor->leer();

            include 'views/articulo/index.php';
        }

    }

?>