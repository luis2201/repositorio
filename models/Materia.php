<?php
// models/Materia.php

class Materia {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "Materias";

    // Propiedades del objeto
    public $MateriaID;
    public $Nombre;
    public $AreaID;

    // Constructor con la base de datos como conexión
    public function __construct($db) {
        $this->conn = $db;
    }   

    // Obtener todas las materias
    public function leer() {
        $query = "SELECT M.MateriaID, M.Nombre, A.Nombre AS NombreArea FROM " . $this->table_name . " M INNER JOIN Areas A ON M.AreaID = A.AreaID;";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener una única materia por ID
    public function leerUno() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MateriaID = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->MateriaID);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->Nombre = $row['Nombre'];
            $this->AreaID = $row['AreaID'];
            $this->MateriaID = $row['MateriaID'];
        }
    }

    // Añadir una nueva materia
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (Nombre, AreaID) VALUES (:Nombre, :AreaID)";

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

    // Actualizar una materia
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET Nombre = :Nombre, AreaID = :AreaID WHERE MateriaID = :MateriaID";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->AreaID = htmlspecialchars(strip_tags($this->AreaID));
        $this->MateriaID = htmlspecialchars(strip_tags($this->MateriaID));

        // Enlazar los valores
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":AreaID", $this->AreaID);
        $stmt->bindParam(":MateriaID", $this->MateriaID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una materia
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE MateriaID = ?";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->MateriaID = htmlspecialchars(strip_tags($this->MateriaID));

        // Enlazar el valor del ID
        $stmt->bindParam(1, $this->MateriaID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
