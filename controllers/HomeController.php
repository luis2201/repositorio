<?php
require_once 'models/Estadisticas.php';
require_once 'models/Database.php';

class HomeController {
    private $db;
    private $estadisticas;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->estadisticas = new Estadisticas($this->db);        
    }
    
    public function index() {   
        $tvtesis = $this->estadisticas->totalvisitatesis();
        $tvlibros = $this->estadisticas->totalvisitalibros();
        $areamasv = $this->estadisticas->areamasvisitada();
        $areamenosv = $this->estadisticas->areamenosvisitada();
           
        include 'views/home/index.php'; // Asegúrate de que la ruta sea la correcta
    }

    public function all12() {
        $stmt = $this->estadisticas->all12();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $response = [
            'labels' => [],
            'data1' => [],
            'data2' => []
        ];
    
        foreach ($data as $row) {
            // Formatear el mes y año como MM/YYYY
            $mes = str_pad($row['Mes'], 2, '0', STR_PAD_LEFT) . '/' . $row['Anio'];
        
            // Asegurarse de no duplicar etiquetas en labels
            if (!in_array($mes, $response['labels'])) {
                $response['labels'][] = $mes;
            }
        
            // Verificar el CategoriaID y asignar los datos a data1 o data2
            if ($row['CategoriaID'] == 2) {
                $response['data1'][] = (int)$row['Total'];
            } elseif ($row['CategoriaID'] == 3) {
                $response['data2'][] = (int)$row['Total'];
            }
        }
    
        echo json_encode($response);
    }
}
