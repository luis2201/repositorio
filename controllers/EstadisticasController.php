<?php 
// controllers/EstadisticasController.php

require_once 'models/Estadisticas.php';
require_once 'models/Database.php';

class EstadisticasController {
    private $db;
    private $estadisticas;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->estadisticas = new Estadisticas($this->db);        
    }

    public function visitatesis() {
        $stmt = $this->estadisticas->visitatesis();

        include 'views/estadisticas/visitatesis.php'; // Asegúrate de que la ruta sea la correcta
    }

    public function visitalibros() {
        $stmt = $this->estadisticas->visitalibros();

        include 'views/estadisticas/visitalibros.php'; // Asegúrate de que la ruta sea la correcta
    }


}
