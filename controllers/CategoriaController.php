<?php
// controllers/CategoriaController.php

require_once 'models/Categoria.php';
require_once 'models/Database.php';

class CategoriaController {
    private $db;
    private $categoria;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->categoria = new Categoria($this->db);
    }

    // Listar todas las categorías
    public function index() {
        $stmt = $this->categoria->leer();
        include 'views/categoria/index.php';
    }

    // Mostrar formulario para crear nueva categoría
    public function crear() {
        include 'views/categoria/crear.php';
    }

    // Almacenar nueva categoría en la base de datos
    public function almacenar() {
        $this->categoria->Nombre = $_POST['Nombre'];               

        if ($this->categoria->crear()) {
            $mensaje = '<div class="alert alert-success">Categoría creada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo crear la categoría.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;

        header('Location: /categoria/crear');
    }

    // Mostrar formulario para editar categoría
    public function editar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);

        $this->categoria->CategoriaID = $id[2];
        $this->categoria->leerUno();
        
        include 'views/categoria/editar.php';
    }

    // Actualizar categoría en la base de datos
    public function actualizar() {  
        $id = $_POST['CategoriaID'];
        $nombre = $_POST['Nombre'];
        
        if (!is_numeric($id) || empty($nombre)) {
            echo "No se pudo actualizar la categoría";
            return;
        }

        $this->categoria->CategoriaID = $_POST['CategoriaID'];
        $this->categoria->Nombre = $_POST['Nombre'];

        if ($this->categoria->actualizar()) {
            $mensaje = '<div class="alert alert-success">Categoría actualizada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo actualizar la categoría.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /categoria/editar/" . $id);
    }

    // Eliminar categoría de la base de datos
    public function eliminar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);
        
        $this->categoria->CategoriaID = $id[2]; 

        if ($this->categoria->eliminar()) {
            $mensaje = '<div class="alert alert-success">Categoría eliminada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo eliminar la categoría.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /categoria");
    }
}
