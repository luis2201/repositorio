<?php
// controllers/ListadocumentoautorController.php

require_once 'models/Area.php';
require_once 'models/Listadocumentoarea.php';
require_once 'models/Database.php';

class ListadocumentoareaController {
    private $db;        
    private $area;    
    private $listadocumentoarea;    

    public function __construct() {
        $this->db = (new Database())->getConnection();    
        $this->area = new Area($this->db);        
        $this->listadocumentoarea = new Listadocumentoarea($this->db);        
    }    
    
    // Listar todos los documentos por areas
    public function index() {
        $stmt = $this->area->leer();
        include 'views/listadocumentoarea/index.php';
    }

    // Obtener una único documento por ID
    public function leerDocumentoIDArea() {
        $url =  explode("/",$_GET['url']);

        $this->area->AreaID = $url[2];
        $stmt = $this->area->leerUno();

        $this->listadocumentoarea->AreaID = $url[2];
        $stmt = $this->listadocumentoarea->leerDocumentoIDArea();

        include 'views/listadocumentoarea/listadocumentos.php';
    }

    // Visualizar el documento
    public function ver() {        
        include 'views/listadocumentoarea/ver.php';
    }
    
}
 