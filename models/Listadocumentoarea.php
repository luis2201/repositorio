<?php
    // models/Listadocumentoarea.php

    class Listadocumentoarea
    {
        // Conexión a la base de datos y nombre de la tabla
        private $conn;
        private $table_name = "Documentos";

        // Propiedades del objeto  
        public $AreaID;
        
        // Constructor con la base de datos como conexión
        public function __construct($db) {
            $this->conn = $db;
        }

        // Obtener todos los documentos
        public function leerDocumentoIDArea() {
            // $query = "SELECT D.Titulo, D.Resumen, D.FechaPublicacion, D.ArchivoPDF, C.Nombre AS Categoria, M.Nombre AS Materia, CONCAT(A.Nombre, ' ', A.Apellido) AS Autor
            //             FROM Documentos D 
            //                 INNER JOIN Documento_Autores DA ON D.DocumentoID = DA.DocumentoID
            //                 INNER JOIN Categorias C ON D.CategoriaID = C.CategoriaID
            //                 INNER JOIN Materias M ON D.MateriaID = M.MateriaID
            //                 INNER JOIN Autores A ON DA.AutorID = A.AutorID
            //             WHERE M.AreaID = ?";
            $query = "SELECT D.Titulo, D.Resumen, D.FechaPublicacion, D.ArchivoPDF, C.Nombre AS Categoria, M.Nombre AS Materia
                        FROM Documentos D 
                            INNER JOIN Categorias C ON D.CategoriaID = C.CategoriaID
                            INNER JOIN Materias M ON D.MateriaID = M.MateriaID
                        WHERE M.AreaID = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->AreaID);
            $stmt->execute();

            return $stmt;
        }
    }