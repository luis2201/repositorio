<?php
    // controllers/SearchController.php

    // require_once 'models/Search.php';
    require_once 'models/Database.php';

    class SearchinvestigacionController {
        private $db;
        private $search;

        public function __construct() {
            $this->db = (new Database())->getConnection();
        }

        // Listar todas las autores
        public function index() {
            include 'views/searchinvestigacion/index.php';
        }

    }

?>