<?php
// controllers/DocumentoController.php

require_once 'models/Documento.php';
require_once 'models/Database.php';

class IndexController {
    private $db;
    private $documento;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->documento = new Documento($this->db);
    }

    public function index() {        
        $stmt = $this->documento->documentoCategoria();        

        include 'views/index/index.php';         
    }

}
