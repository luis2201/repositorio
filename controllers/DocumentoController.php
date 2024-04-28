<?php
// controllers/DocumentoController.php

require_once 'models/Materia.php';
require_once 'models/Categoria.php';
require_once 'models/Documento.php';
require_once 'models/Autor.php';
require_once 'models/Documentoautor.php';
require_once 'models/Database.php';

class DocumentoController {
    private $db;
    private $materia;    
    private $categoria;    
    private $autor;    
    private $documento;    
    private $documentoautor;    

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->materia = new Materia($this->db);        
        $this->categoria = new Categoria($this->db);        
        $this->autor = new Autor($this->db);        
        $this->documento = new Documento($this->db);        
        $this->documentoautor = new Documentoautor($this->db);        
    }

    // Listar todos los documentos
    public function index() {
        $stmt = $this->documento->leer();
        include 'views/documento/index.php';
    }

    // Listar todos los documentos
    public function ver() {        
        include 'views/documento/ver.php';
    }

    // Mostrar formulario para crear nuevo documento
    public function crear() {          
        $stmt = $this->categoria->leer();
        $materias = $this->materia->leer();
        include 'views/documento/crear.php';
    }

    // Almacenar nuevo documento en la base de datos
    public function almacenar() {
        $file = $_FILES['ArchivoPDF']['name'];
        $path = DOC;
        $newnamedoc = strtotime("now");
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $pdf = $newnamedoc . '.' . $extension;

        $this->documento->Titulo = $_POST['Titulo'];
        $this->documento->Resumen = $_POST['Resumen'];
        $this->documento->FechaPublicacion = $_POST['FechaPublicacion'];
        $this->documento->ArchivoPDF = $pdf;
        // $this->documento->UsuarioID = decryptID($_SESSION['UsuarioID']);
        $this->documento->UsuarioID = 1;
        $this->documento->CategoriaID = decryptID($_POST['CategoriaID']);    
        $this->documento->MateriaID = decryptID($_POST['MateriaID']);    

        echo $this->documento->Titulo .'<br>';
        echo $this->documento->Resumen .'<br>';
        echo $this->documento->FechaPublicacion .'<br>';
        echo $this->documento->ArchivoPDF .'<br>';
        echo $this->documento->UsuarioID .'<br>';
        echo $this->documento->CategoriaID .'<br>';
        echo $this->documento->MateriaID;
        try {        
            // Intentar mover el archivo
            if (!move_uploaded_file($_FILES['ArchivoPDF']['tmp_name'], $path . $pdf)) {
                throw new Exception('Ocurrió un error al subir el archivo al servidor.');
            }

            if ($this->documento->crear()) {
                $mensaje = '<div class="alert alert-success">Documento registrado satisfacoriamente.</div>';
            } else {
                $mensaje = '<div class="alert alert-danger">No se pudo registrar el documento.</div>';
                unlink($path.$pdf);
            }                        
        } catch (Exception $e) {
            // Manejar la excepción
            $mensaje = '<div class="alert alert-danger">Ha ocurrido un error: '.$e->getMessage().'</div>';            
        }
        
        session_start();
        $_SESSION['mensaje'] = $mensaje;

        header('Location: /documento/crear');
    }

    // Mostrar formulario para editar categoría
    public function editar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);
        
        $stmt = $this->categoria->leer();
        $materias = $this->materia->leer();
        $this->documento->DocumentoID = $id[2];
        
        $this->documento->leerUno();
 
        include 'views/documento/editar.php';
    }

    // Actualizar documento en la base de datos
    public function actualizar() {  
        $id = $_POST['DocumentoID'];
                
        $file = $_FILES['ArchivoPDF']['name'];        
        if($file != ''){
            $path = DOC;
            $newnamedoc = strtotime("now");
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $pdf = $newnamedoc . '.' . $extension;               
        } else {
            $pdf = $_POST['PDF'];
        }        

        $this->documento->Titulo = $_POST['Titulo'];
        $this->documento->Resumen = $_POST['Resumen'];
        $this->documento->FechaPublicacion = $_POST['FechaPublicacion'];
        $this->documento->ArchivoPDF = $pdf;
        // $this->documento->UsuarioID = decryptID($_SESSION['UsuarioID']);
        $this->documento->UsuarioID = 1;
        $this->documento->CategoriaID = decryptID($_POST['CategoriaID']);   
        $this->documento->MateriaID = decryptID($_POST['MateriaID']);   
        $this->documento->DocumentoID = $id; 
        
        try {                 
            if($_POST['PDF'] != $pdf){                
                // Intentar mover el archivo                
                unlink($path.$_POST['PDF']);
                if (!move_uploaded_file($_FILES['ArchivoPDF']['tmp_name'], $path . $pdf)) {
                    throw new Exception('Ocurrió un error al subir el archivo al servidor.');
                }                
            } 

            if ($this->documento->actualizar()) {                
                $mensaje = '<div class="alert alert-success">Categoría actualizada satisfacoriamente.</div>';
            } else {
                $mensaje = '<div class="alert alert-danger">No se pudo actualizar la categoría.</div>';
                // unlink($path.$pdf);
            }
            
        } catch (Exception $e) {
            // Manejar la excepción
            $mensaje = '<div class="alert alert-danger">Ha ocurrido un error: '.$e->getMessage().'</div>';            
        }        

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /documento/editar/" . $id);
    }

    // Mostrar formulario para agregar autor a documento
    public function autor() {
        $url = $_GET['url'];
        $id = explode("/", $url);
        
        $stmt = $this->autor->leer();

        $this->documentoautor->DocumentoID = $id[2];         
        $stmtDA = $this->documentoautor->leer();

        $this->documento->DocumentoID = $id[2]; 
        $this->documento->leerUno();
 
        include 'views/documento/autor.php';
    } 

    // Eliminar documento de la base de datos
    public function eliminar() {
        $url = $_GET['url'];
        $id = explode("/", $url);
        $path = DOC;
        
        $this->documento->ArchivoPDF = $id[2]; 

        if ($this->documento->eliminar()) {
            unlink($path.$id[2]);
            $mensaje = '<div class="alert alert-success">Documento eliminada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo eliminar el documento.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /documento");
    }

    public function search()
    {
        $this->documento->Titulo = $_POST["txtBuscar"];

        $stnt = $this->documento->search();   
        $stmt = $this->documento->search();   
        
        include 'views/search/index.php';
    }

    
}
