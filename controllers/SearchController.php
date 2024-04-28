<?php
    // controllers/SearchController.php

    // require_once 'models/Search.php';
    require_once 'models/Database.php';

    class SearchController {
        private $db;
        private $search;

        public function __construct() {
            $this->db = (new Database())->getConnection();
        }

        // Listar todas las autores
        public function index() {
            include 'views/search/index.php';
        }

    }

?>