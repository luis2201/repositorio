<?php
    // models/Listadocumentoautor.php

    class Listadocumentoautor
    {
        // Conexión a la base de datos y nombre de la tabla
        private $conn;
        private $table_name = "Documentos";

        // Propiedades del objeto  
        public $AutorID;
        
        // Constructor con la base de datos como conexión
        public function __construct($db) {
            $this->conn = $db;
        }

        // Obtener todos los documentos
        public function leerDocumentoIDAutor() {
            $query = "SELECT D.Titulo, D.Resumen, D.FechaPublicacion, D.ArchivoPDF, C.Nombre AS Categoria, M.Nombre AS Materia
                        FROM Documentos D 
                            INNER JOIN Documento_Autores DA ON D.DocumentoID = DA.DocumentoID
                            INNER JOIN Categorias C ON D.CategoriaID = C.CategoriaID
                            INNER JOIN Materias M ON D.MateriaID = M.MateriaID
                        WHERE DA.AutorID = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->AutorID);
            $stmt->execute();

            return $stmt;
        }
    }