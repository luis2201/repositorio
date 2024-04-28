<?php
// models/Documento.php

class Documento {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "Documentos";

    // Propiedades del objeto
    public $DocumentoID;
    public $Titulo;
    public $Resumen;
    public $FechaPublicacion;
    public $ArchivoPDF;
    public $MateriaID;
    public $UsuarioID;
    public $CategoriaID;

    // Constructor con la base de datos como conexión
    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los documentos
    public function leer() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener una único documento por ID
    public function leerUno() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE DocumentoID = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->DocumentoID);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->Titulo = $row['Titulo'];
            $this->Resumen = $row['Resumen'];
            $this->FechaPublicacion = $row['FechaPublicacion'];
            $this->ArchivoPDF = $row['ArchivoPDF'];
            $this->UsuarioID = $row['UsuarioID'];
            $this->CategoriaID = $row['CategoriaID'];
            $this->MateriaID = $row['MateriaID'];
        }
    }    

    // Obtener todas las categorías
    public function documentoCategoria() {
        $query = "WITH CategoriasTemp AS (
                    SELECT CategoriaID, Nombre FROM Categorias WHERE CategoriaID IN (1,2,3,4)
                )
                SELECT 
                    C.CategoriaID, 
                    C.Nombre as NombreCategoria,
                    COALESCE(COUNT(D.DocumentoID), 0) as CantidadDocumentos 
                FROM 
                    CategoriasTemp C
                LEFT JOIN 
                    Documentos D ON C.CategoriaID = D.CategoriaID
                GROUP BY 
                    C.CategoriaID, C.Nombre
                ORDER BY 
                    C.CategoriaID;";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Añadir una nueva categoría
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (Titulo, Resumen, FechaPublicacion, ArchivoPDF, UsuarioID, CategoriaID, MateriaID) VALUES (:Titulo, :Resumen, :FechaPublicacion, :ArchivoPDF, :UsuarioID, :CategoriaID, :MateriaID)";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Titulo = htmlspecialchars(strip_tags($this->Titulo));
        $this->Resumen = htmlspecialchars(strip_tags($this->Resumen));
        $this->FechaPublicacion = htmlspecialchars(strip_tags($this->FechaPublicacion));
        $this->ArchivoPDF = htmlspecialchars(strip_tags($this->ArchivoPDF));
        $this->UsuarioID = htmlspecialchars(strip_tags($this->UsuarioID));
        $this->CategoriaID = htmlspecialchars(strip_tags($this->CategoriaID));
        $this->MateriaID = htmlspecialchars(strip_tags($this->MateriaID));

        // Enlazar los valores
        $stmt->bindParam(":Titulo", $this->Titulo);
        $stmt->bindParam(":Resumen", $this->Resumen);
        $stmt->bindParam(":FechaPublicacion", $this->FechaPublicacion);
        $stmt->bindParam(":ArchivoPDF", $this->ArchivoPDF);
        $stmt->bindParam(":UsuarioID", $this->UsuarioID);
        $stmt->bindParam(":CategoriaID", $this->CategoriaID);
        $stmt->bindParam(":MateriaID", $this->MateriaID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Actualizar una documento
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET Titulo = :Titulo, 
                                                       Resumen = :Resumen, 
                                                       FechaPublicacion = :FechaPublicacion, 
                                                       ArchivoPDF = :ArchivoPDF, 
                                                       UsuarioID = :UsuarioID,
                                                       CategoriaID = :CategoriaID,
                                                       MateriaID = :MateriaID
                  WHERE DocumentoID = :DocumentoID";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Titulo = htmlspecialchars(strip_tags($this->Titulo));
        $this->Resumen = htmlspecialchars(strip_tags($this->Resumen));
        $this->FechaPublicacion = htmlspecialchars(strip_tags($this->FechaPublicacion));
        $this->ArchivoPDF = htmlspecialchars(strip_tags($this->ArchivoPDF));
        $this->UsuarioID = htmlspecialchars(strip_tags($this->UsuarioID));
        $this->CategoriaID = htmlspecialchars(strip_tags($this->CategoriaID));
        $this->DocumentoID = htmlspecialchars(strip_tags($this->DocumentoID));
        $this->MateriaID = htmlspecialchars(strip_tags($this->MateriaID));

        // Enlazar los valores
        $stmt->bindParam(":Titulo", $this->Titulo);
        $stmt->bindParam(":Resumen", $this->Resumen);
        $stmt->bindParam(":FechaPublicacion", $this->FechaPublicacion);
        $stmt->bindParam(":ArchivoPDF", $this->ArchivoPDF);
        $stmt->bindParam(":UsuarioID", $this->UsuarioID);
        $stmt->bindParam(":CategoriaID", $this->CategoriaID);
        $stmt->bindParam(":DocumentoID", $this->DocumentoID);
        $stmt->bindParam(":MateriaID", $this->MateriaID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar una categoría
    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ArchivoPDF = ?";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->ArchivoPDF = htmlspecialchars(strip_tags($this->ArchivoPDF));

        // Enlazar el valor del ID
        $stmt->bindParam(1, $this->ArchivoPDF);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    //Búsqueda de documentos
    public function search()
    {
        $this->Titulo = '%' . htmlspecialchars(strip_tags($this->Titulo)) . '%';

        $query = "SELECT * FROM " . $this->table_name . " WHERE Titulo LIKE :Titulo ORDER BY Titulo;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':Titulo', $this->Titulo, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt;
    }
}
