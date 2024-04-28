<?php

    class Periodo 
    {
        // Conexión a la base de datos y nombre de la tabla
        private $conn;
        private $table_name = "periodos";

        // Propiedades del objeto
        public $ID;
        public $Periodo;
        
        // Constructor con la base de datos como conexión
        public function __construct($db) {
            $this->conn = $db;
        }

        // Obtener todas las categorías
        public function leer() {
            $query = "SELECT * FROM " . $this->table_name;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

    }