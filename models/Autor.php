<?php
// models/Autor.php

class Autor {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "Autores";

    // Propiedades del objeto
    public $AutorID;
    public $Nombre;
    public $Apellido;
    public $Afiliacion;

    // Constructor con la base de datos como conexión
    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todas las autores
    public function leer() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener una única categoría por ID
    public function leerUno() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE AutorID = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->AutorID);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->Nombre = $row['Nombre'];
            $this->Apellido = $row['Apellido'];
            $this->Afiliacion = $row['Afiliacion'];
        }
    }

    // Añadir un nuevo Autor
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (Nombre, Apellido, Afiliacion) VALUES (:Nombre, :Apellido, :Afiliacion)";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->Apellido = htmlspecialchars(strip_tags($this->Apellido));
        $this->Afiliacion = htmlspecialchars(strip_tags($this->Afiliacion));

        // Enlazar los valores
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":Apellido", $this->Apellido);
        $stmt->bindParam(":Afiliacion", $this->Afiliacion);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Actualizar un autor
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET Nombre = :Nombre, Apellido = :Apellido, Afiliacion = :Afiliacion WHERE AutorID = :AutorID";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->Apellido = htmlspecialchars(strip_tags($this->Apellido));
        $this->Afiliacion = htmlspecialchars(strip_tags($this->Afiliacion));
        $this->AutorID = htmlspecialchars(strip_tags($this->AutorID));

        // Enlazar los valores
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":Apellido", $this->Apellido);
        $stmt->bindParam(":Afiliacion", $this->Afiliacion);
        $stmt->bindParam(":AutorID", $this->AutorID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una categoría
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE AutorID = ?";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->AutorID = htmlspecialchars(strip_tags($this->AutorID));

        // Enlazar el valor del ID
        $stmt->bindParam(1, $this->AutorID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
