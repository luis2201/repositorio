<?php
// models/Area.php

class Area {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "Areas";

    // Propiedades del objeto
    public $AreaID;
    public $Nombre;

    // Constructor con la base de datos como conexión
    public function __construct($db) {
        $this->conn = $db;
    }   

    // Obtener todas las áreas
    public function leer() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener una única área por ID
    public function leerUno() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE AreaID = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->AreaID);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->Nombre = $row['Nombre'];
        }
    }

    // Añadir una nueva área
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (Nombre) VALUES (:Nombre)";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));

        // Enlazar los valores
        $stmt->bindParam(":Nombre", $this->Nombre);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Actualizar un área
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET Nombre = :Nombre WHERE AreaID = :AreaID";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->AreaID = htmlspecialchars(strip_tags($this->AreaID));

        // Enlazar los valores
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":AreaID", $this->AreaID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar un áreas
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE AreaID = ?";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->AreaID = htmlspecialchars(strip_tags($this->AreaID));

        // Enlazar el valor del ID
        $stmt->bindParam(1, $this->AreaID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
