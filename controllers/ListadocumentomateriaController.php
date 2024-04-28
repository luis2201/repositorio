<?php
// controllers/ListadocumentoautorController.php

require_once 'models/Materia.php';
require_once 'models/Listadocumentomateria.php';
require_once 'models/Database.php';

class ListadocumentomateriaController {
    private $db;        
    private $materia;    
    private $listadocumentomateria;    

    public function __construct() {
        $this->db = (new Database())->getConnection();    
        $this->materia = new Materia($this->db);        
        $this->listadocumentomateria = new Listadocumentomateria($this->db);        
    }    
    
    // Listar todos los documentos por materias
    public function index() {
        $stmt = $this->materia->leer();
        include 'views/listadocumentomateria/index.php';
    }

    // Obtener una único documento por ID
    public function leerDocumentoIDMateria() {
        $url =  explode("/",$_GET['url']);

        $this->materia->MateriaID = $url[2];
        $stmt = $this->materia->leerUno();

        $this->listadocumentomateria->MateriaID = $url[2];
        $stmt = $this->listadocumentomateria->leerDocumentoIDMateria();

        include 'views/listadocumentomateria/listadocumentos.php';
    }

    // Visualizar el documento
    public function ver() {        
        include 'views/listadocumentomateria/ver.php';
    }
    
}
 