<?php
// controllers/MateriaController.php

require_once 'models/Area.php';
require_once 'models/Materia.php';
require_once 'models/Database.php';

class MateriaController {
    private $db;
    private $area;
    private $materia;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->area = new Area($this->db);
        $this->materia = new Materia($this->db);
    }

    // Listar todas las materia
    public function index() {
        $stmt = $this->materia->leer();
        include 'views/materia/index.php';
    }

    // Mostrar formulario para crear nueva materia
    public function crear() {
        $stmt = $this->area->leer();        
        include 'views/materia/crear.php';
    }

    // Almacenar nueva materia en la base de datos
    public function almacenar() {
        $this->materia->Nombre = $_POST['Nombre'];               
        $this->materia->AreaID = decryptID($_POST['AreaID']);

        if ($this->materia->crear()) {
            $mensaje = '<div class="alert alert-success">Materia creada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo crear la materia.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;

        header('Location: /materia/crear');
    }

    // Mostrar formulario para editar categoría
    public function editar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);

        $stmt = $this->area->leer();        

        $this->materia->MateriaID = $id[2];
        $this->materia->leerUno();
        
        include 'views/materia/editar.php';
    }

    // Actualizar materia en la base de datos
    public function actualizar() {  
        $id = $_POST['MateriaID'];
        
        $this->materia->Nombre = $_POST['Nombre'];
        $this->materia->AreaID = decryptID($_POST['AreaID']);
        $this->materia->MateriaID = $_POST['MateriaID'];

        if ($this->materia->actualizar()) {
            $mensaje = '<div class="alert alert-success">Materia actualizada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo actualizar la materia.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /materia/editar/" . $id);
    }

    // Eliminar materia de la base de datos
    public function eliminar() {
        $url = $_GET['url'];        
        $id = explode("/", $url);
        
        $this->materia->MateriaID = $id[2]; 

        if ($this->materia->eliminar()) {
            $mensaje = '<div class="alert alert-success">Materia eliminada satisfacoriamente.</div>';
        } else {
            $mensaje = '<div class="alert alert-danger">No se pudo eliminar la materia.</div>';
        }

        session_start();
        $_SESSION['mensaje'] = $mensaje;
        
        header("Location: /materia");
    }
}
