<?php
// models/Documento.php

class Documentoautor {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "Documento_Autores";

    // Propiedades del objeto
    public $DocumentoAutoresID;
    public $DocumentoID;    
    public $AutorID;

    // Constructor con la base de datos como conexión
    public function __construct($db) {
        $this->conn = $db;
    }

     // Obtener todos los documentos
     public function leer() {        
        $query = "SELECT D.DocumentoAutoresID, CONCAT(A.Apellido, ' ', A.Apellido)AS NombreAutor
                  FROM " . $this->table_name . " D INNER JOIN Autores A ON D.AutorID = A.AutorID
                  WHERE D.DocumentoID = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->DocumentoID);
        $stmt->execute();

        return $stmt;
    }

    // Añadir una nueva categoría
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (DocumentoID, AutorID) VALUES (:DocumentoID, :AutorID)";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos        
        $this->DocumentoID = htmlspecialchars(strip_tags($this->DocumentoID));
        $this->AutorID = htmlspecialchars(strip_tags($this->AutorID));

        // Enlazar los valores        
        $stmt->bindParam(":DocumentoID", $this->DocumentoID);
        $stmt->bindParam(":AutorID", $this->AutorID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una categoría
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE DocumentoAutoresID = ?";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->DocumentoAutoresID = htmlspecialchars(strip_tags($this->DocumentoAutoresID));

        // Enlazar el valor del ID
        $stmt->bindParam(1, $this->DocumentoAutoresID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

