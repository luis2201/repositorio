<?php
//controllers/ProyectosinvestigacionController.php

require_once 'models/Proyectos.php';
require_once 'models/Database.php';

class ProyectosinvestigacionController {
    private $db;
    private $proyectos;

    public function __construct() {
        $this->db = (new Database())->getConnection();     
        $this->proyectos = new Proyectos($this->db);        
    }

    // Listar todos los proyectos de investigacion
    public function index() {
        $this->proyectos->TipoProyecto = 'I';
        $stmt = $this->proyectos->leer();

        include 'views/proyectosinvestigacion/index.php';
    }

    // Visualizar el proyecto
    public function ver() {        
        include 'views/proyectosinvestigacion/ver.php';
    }

    // Mostrar formulario para crear nuevo documento
    public function crear() {          
        include 'views/proyectosinvestigacion/crear.php';
    }

    // Almacenar nuevo proyectos en la base de datos
    public function almacenar() {
        $file = $_FILES['ArchivoPDF']['name'];
        $path = DOC;
        $newnamedoc = strtotime("now");
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $pdf = $newnamedoc . '.' . $extension;

        $this->proyectos->TipoProyecto = $_POST['TipoProyecto'];
        $this->proyectos->Nombre = $_POST['Nombre'];
        $this->proyectos->FechaInicio = $_POST['FechaInicio'];
        $this->proyectos->FechaFin = $_POST['FechaFin'];
        $this->proyectos->AutorDocente = $_POST['AutorDocente'];
        $this->proyectos->AutorEstudiante = $_POST['AutorEstudiante'];
        $this->proyectos->ArchivoPDF = $pdf;

        try {        
            // Intentar mover el archivo
            if (!move_uploaded_file($_FILES['ArchivoPDF']['tmp_name'], $path . $pdf)) {
                throw new Exception('Ocurrió un error al subir el archivo al servidor.');
            }

            if ($this->proyectos->crearInvestigacion()) {
                $mensaje = '<div class="alert alert-success">Proyecto registrado satisfacoriamente.</div>';
            } else {
                $mensaje = '<div class="alert alert-danger">No se pudo registrar el proyecto.</div>';
                unlink($path.$pdf);
            }                        
        } catch (Exception $e) {
            // Manejar la excepción
            $mensaje = '<div class="alert alert-danger">Ha ocurrido un error: '.$e->getMessage().'</div>';            
        }
        
        session_start();
        $_SESSION['mensaje'] = $mensaje;

        header('Location: /proyectosinvestigacion/crear');
    }

    // Mostrar formulario para editar categoría
    public function editar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);
        
        $this->proyectos->ProyectoID = $id[2];
        $this->proyectos->leerUno();
 
        include 'views/proyectosinvestigacion/editar.php';
    }

    // Actualizar documento en la base de datos
    public function actualizar() {  
        $id = $_POST['ProyectoID'];
                
        $file = $_FILES['ArchivoPDF']['name'];        
        if($file != ''){
            $path = DOC;
            $newnamedoc = strtotime("now");
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $pdf = $newnamedoc . '.' . $extension;               
        } else {
            $pdf = $_POST['PDF'];
        }        

        $this->proyectos->Nombre = $_POST['Nombre'];
        $this->proyectos->FechaInicio = $_POST['FechaInicio'];
        $this->proyectos->FechaFin = $_POST['FechaFin'];
        $this->proyectos->AutorDocente = $_POST['AutorDocente'];   
        $this->proyectos->AutorEstudiante = $_POST['AutorEstudiante']; 
        $this->proyectos->ArchivoPDF = $pdf;
        $this->proyectos->ProyectoID = decryptID($id);
        
        try {                 
            if($_POST['PDF'] != $pdf){                
                // Intentar mover el archivo                
                unlink($path.$_POST['PDF']);
                if (!move_uploaded_file($_FILES['ArchivoPDF']['tmp_name'], $path . $pdf)) {
                    throw new Exception('Ocurrió un error al subir el archivo al servidor.');
                }                
            } 

            if ($this->proyectos->actualizar()) {                
                $mensaje = '<div class="alert alert-success">Proyecto actualizado satisfacoriamente.</div>';
            } else {
                $mensaje = '<div class="alert alert-danger">No se pudo actualizar el proyecto.</div>';
                // unlink($path.$pdf);
            }
            
        } catch (Exception $e) {
            // Manejar la excepción
            $mensaje = '<div class="alert alert-danger">Ha ocurrido un error: '.$e->getMessage().'</div>';            
        }        

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /proyectosinvestigacion/editar/" . $this->proyectos->ProyectoID);
    }

    // Eliminar proyecto de la base de datos
    public function eliminar() {
        $url = $_GET['url'];
        $id = explode("/", $url);
        $path = DOC;
        
        $this->proyectos->ArchivoPDF = $id[2]; 

        if ($this->proyectos->eliminar()) {
            unlink($path.$id[2]);
            $mensaje = '<div class="alert alert-success">Proyecto eliminada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo eliminar el proyecto.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /proyectosinvestigacion");
    }

    public function search()
    {
        $this->proyectos->Nombre = $_POST["txtBuscarInvestigacion"];

        $stmt = $this->proyectos->searchInvestigacion();    
        print_r($stmt);
        //include 'views/searchinvestigacion/index.php';
    }

}


?>