<?php
// controllers/ListadocumentoautorController.php

require_once 'models/Autor.php';
require_once 'models/Listadocumentoautor.php';
require_once 'models/Database.php';

class ListadocumentoautorController {
    private $db;        
    private $autor;    
    private $listadocumentoautor;    

    public function __construct() {
        $this->db = (new Database())->getConnection();    
        $this->autor = new Autor($this->db);        
        $this->listadocumentoautor = new Listadocumentoautor($this->db);        
    }    
    
    // Listar todos los documentos por autores
    public function index() {
        $stmt = $this->autor->leer();
        include 'views/listadocumentoautor/index.php';
    }

    // Obtener una único documento por ID
    public function leerDocumentoIDAutor() {
        $url =  explode("/",$_GET['url']);

        $this->autor->AutorID = $url[2];
        $stmt = $this->autor->leerUno();

        $this->listadocumentoautor->AutorID = $url[2];
        $stmt = $this->listadocumentoautor->leerDocumentoIDAutor();

        include 'views/listadocumentoautor/listadocumentos.php';
    }

    // Visualizar el documento
    public function ver() {        
        include 'views/listadocumentoautor/ver.php';
    }
    
}
 