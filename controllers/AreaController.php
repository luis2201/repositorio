<?php
// controllers/AreaController.php

require_once 'models/Area.php';
require_once 'models/Database.php';

class AreaController {
    private $db;
    private $area;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->area = new Area($this->db);
    }

    // Listar todas las áreas
    public function index() {
        $stmt = $this->area->leer();
        include 'views/area/index.php';
    }

    // Mostrar formulario para crear nueva área
    public function crear() {
        include 'views/area/crear.php';
    }

    // Almacenar nueva área en la base de datos
    public function almacenar() {
        $this->area->Nombre = $_POST['Nombre'];               

        if ($this->area->crear()) {
            $mensaje = '<div class="alert alert-success">Área creada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo crear el área.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;

        header('Location: /area/crear');
    }

    // Mostrar formulario para editar área
    public function editar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);

        $this->area->AreaID = $id[2];
        $this->area->leerUno();
        
        include 'views/area/editar.php';
    }

    // Actualizar área en la base de datos
    public function actualizar() {  
        $id = $_POST['AreaID'];
        $nombre = $_POST['Nombre'];
        
        if (!is_numeric($id) || empty($nombre)) {
            echo "No se pudo actualizar el área";
            return;
        }

        $this->area->AreaID = $_POST['AreaID'];
        $this->area->Nombre = $_POST['Nombre'];

        if ($this->area->actualizar()) {
            $mensaje = '<div class="alert alert-success">Área actualizada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo actualizar el área.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /area/editar/" . $id);
    }

    // Eliminar área de la base de datos
    public function eliminar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);
        
        $this->area->AreaID = $id[2]; 

        if ($this->area->eliminar()) {
            $mensaje = '<div class="alert alert-success">Área eliminada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo eliminar el área.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /area");
    }
}
