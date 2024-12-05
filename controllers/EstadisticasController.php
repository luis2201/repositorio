<?php 

require_once 'models/Estadisticas.php';
require_once 'models/Database.php';

class EstadisticasController {
    private $db;
    private $estadisticas;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->estadisticas = new Estadisticas($this->db);        
    }

    public function index() {
        include 'views/estadisticas/index.php'; // Asegúrate de que la ruta sea la correcta
    }

    public function all12() {
        $stmt = $this->estadisticas->leer();
        
    }

}
