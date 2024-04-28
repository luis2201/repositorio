<?php
// controllers/AutorController.php

require_once 'models/Autor.php';
require_once 'models/Database.php';

class AutorController {
    private $db;
    private $autor;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->autor = new Autor($this->db);
    }

    // Listar todas las autores
    public function index() {
        $stmt = $this->autor->leer();
        include 'views/autor/index.php';
    }

    // Mostrar formulario para crear nueva autor
    public function crear() {
        include 'views/autor/crear.php';
    }

    // Almacenar nueva autor en la base de datos
    public function almacenar() {
        $this->autor->Nombre = $_POST['Nombre'];               
        $this->autor->Apellido = $_POST['Apellido'];               
        $this->autor->Afiliacion = $_POST['Afiliacion'];   
        
        if ($this->autor->crear()) {
            $mensaje = '<div class="alert alert-success">Autor creado satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo crear el Autor.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;

        header('Location: /autor/crear');
    }

    // Mostrar formulario para editar autor
    public function editar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);
        $this->autor->AutorID = $id[2];
        $this->autor->leerUno();
        
        include 'views/autor/editar.php';        
    }

    // Actualizar autor en la base de datos
    public function actualizar() {  
        $id = $_POST['AutorID'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $afiliacion = $_POST['Afiliacion'];
        
        session_start();
        
        if (!is_numeric($id) || empty($nombre) || empty($apellido) || empty($afiliacion)) {
            $_SESSION['mensaje'] = "No es posible actualizar los datos del Autor";
            return;
        }

        $this->autor->AutorID = $_POST['AutorID'];
        $this->autor->Nombre = $_POST['Nombre'];
        $this->autor->Apellido = $_POST['Apellido'];
        $this->autor->Afiliacion = $_POST['Afiliacion'];

        if ($this->autor->actualizar()) {
            $mensaje = '<div class="alert alert-success">Datos del Autor actualizada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No es posible actualizar los datos del Autor.</div>';
        }

        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /autor/editar/" . $id);
    }

    // Eliminar categoría de la base de datos
    public function eliminar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);
        
        $this->autor->AutorID = $id[2]; 

        if ($this->autor->eliminar()) {
            $mensaje = '<div class="alert alert-success">Autor eliminado satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo eliminar el autor.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /autor");
    }
}
