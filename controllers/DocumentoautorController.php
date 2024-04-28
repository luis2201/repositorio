<?php
// controllers/DocumentoautorController.php

require_once 'models/Documentoautor.php';
require_once 'models/Database.php';

class DocumentoautorController {
    private $db;        
    private $documentoautor;    

    public function __construct() {
        $this->db = (new Database())->getConnection();    
        $this->documentoautor = new Documentoautor($this->db);        
    }    
    
    // Mostrar formulario para agregar autor a documento
    public function crear() {
        $url =  explode("/",$_GET['url']);                
        
        $this->documentoautor->DocumentoID = $url[2];
        $this->documentoautor->AutorID = $url[3];
                
        if ($this->documentoautor->crear()) {            
            $mensaje = '<div class="alert alert-success">Autor del documento agregado satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo agregar el autor del documento.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
 
        header("Location: /documento/autor/".$url[2]);
    }

    // Eliminar documento de la base de datos
    public function eliminar() {
        $url = explode("/", $_GET['url']);        
        $path = DOC;
        
        $this->documentoautor->DocumentoAutoresID = $url[3];         
        
        if ($this->documentoautor->eliminar()) {            
            $mensaje = '<div class="alert alert-success">Autor del documento eliminado satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo eliminar el autor del documento.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /documento/autor/".$url[2]);
    }
    
}
