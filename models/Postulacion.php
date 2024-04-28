<?php

    class Postulacion 
    {
        // Conexión a la base de datos y nombre de la tabla
        private $conn;
        private $table_name = "postulaciones";

        // Propiedades del objeto
        public $ID;
        public $Periodo_ID;
        public $Tipo_Postulacion_ID;
        public $Materia;
        public $Cedula;
        public $Nombres;
        public $Apellidos;
        public $Direccion;
        public $Telefono;
        public $Email;
        public $Curso;

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

        // // Obtener una única categoría por ID
        // public function leerUno() {
        //     $query = "SELECT * FROM " . $this->table_name . " WHERE CategoriaID = ? LIMIT 0,1";

        //     $stmt = $this->conn->prepare($query);
        //     $stmt->bindParam(1, $this->CategoriaID);
        //     $stmt->execute();

        //     $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //     if($row) {
        //         $this->Nombre = $row['Nombre'];
        //     }
        // }

        // // Añadir una nueva categoría
        // public function crear() {
        //     $query = "INSERT INTO " . $this->table_name . " (Nombre) VALUES (:Nombre)";

        //     $stmt = $this->conn->prepare($query);

        //     // Limpiar los datos
        //     $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));

        //     // Enlazar los valores
        //     $stmt->bindParam(":Nombre", $this->Nombre);

        //     if ($stmt->execute()) {
        //         return true;
        //     }

        //     return false;
        // }

        // // Actualizar una categoría
        // public function actualizar() {
        //     $query = "UPDATE " . $this->table_name . " SET Nombre = :Nombre WHERE CategoriaID = :CategoriaID";

        //     $stmt = $this->conn->prepare($query);

        //     // Limpiar los datos
        //     $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        //     $this->CategoriaID = htmlspecialchars(strip_tags($this->CategoriaID));

        //     // Enlazar los valores
        //     $stmt->bindParam(":Nombre", $this->Nombre);
        //     $stmt->bindParam(":CategoriaID", $this->CategoriaID);

        //     if ($stmt->execute()) {
        //         return true;
        //     }

        //     return false;
        // }

        // // Eliminar una categoría
        // public function eliminar() {
        //     $query = "DELETE FROM " . $this->table_name . " WHERE CategoriaID = ?";

        //     $stmt = $this->conn->prepare($query);

        //     // Limpiar los datos
        //     $this->CategoriaID = htmlspecialchars(strip_tags($this->CategoriaID));

        //     // Enlazar el valor del ID
        //     $stmt->bindParam(1, $this->CategoriaID);

        //     if ($stmt->execute()) {
        //         return true;
        //     }

        //     return false;
    // }
    }

?>