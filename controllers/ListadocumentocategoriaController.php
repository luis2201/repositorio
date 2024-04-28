<?php
// controllers/ListadocumentocategoriaController.php

require_once 'models/Categoria.php';
require_once 'models/Listadocumentocategoria.php';
require_once 'models/Database.php';

class ListadocumentocategoriaController {
    private $db;        
    private $categoria;    
    private $listadocumentocategoria;    

    public function __construct() {
        $this->db = (new Database())->getConnection();    
        $this->categoria = new Categoria($this->db);        
        $this->listadocumentocategoria = new Listadocumentocategoria($this->db);        
    }    
    
    // Listar todos los documentos por categorias
    public function index() {
        $stmt = $this->categoria->leer();
        include 'views/listadocumentocategoria/index.php';
    }

    // Obtener una único documento por ID
    public function leerDocumentoIDCategoria() {
        $url =  explode("/",$_GET['url']);

        $this->categoria->CategoriaID = $url[2];
        $stmt = $this->categoria->leerUno();

        $this->listadocumentocategoria->CategoriaID = $url[2];
        $stmt = $this->listadocumentocategoria->leerDocumentoIDCategoria();

        include 'views/listadocumentocategoria/listadocumentos.php';
    }

    // Visualizar el documento
    public function ver() {        
        include 'views/listadocumentocategoria/ver.php';
    }
    
}
 