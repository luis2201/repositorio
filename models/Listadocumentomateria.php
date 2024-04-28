<?php
    // models/Listadocumentomateria.php

    class Listadocumentomateria
    {
        // Conexión a la base de datos y nombre de la tabla
        private $conn;
        private $table_name = "Documentos";

        // Propiedades del objeto  
        public $MateriaID;
        
        // Constructor con la base de datos como conexión
        public function __construct($db) {
            $this->conn = $db;
        }

        // Obtener todos los documentos
        public function leerDocumentoIDMateria() {
            // $query = "SELECT D.Titulo, D.Resumen, D.FechaPublicacion, D.ArchivoPDF, C.Nombre AS Categoria, CONCAT(A.Nombre, ' ', A.Apellido) AS Autor
            //             FROM Documentos D 
            //                 INNER JOIN Documento_Autores DA ON D.DocumentoID = DA.DocumentoID
            //                 INNER JOIN Categorias C ON D.CategoriaID = C.CategoriaID
            //                 INNER JOIN Materias M ON D.MateriaID = M.MateriaID
            //                 INNER JOIN Autores A ON DA.AutorID = A.AutorID
            //             WHERE D.MateriaID = ?";

            $query = "SELECT D.Titulo, D.Resumen, D.FechaPublicacion, D.ArchivoPDF, C.Nombre AS Categoria
                        FROM Documentos D 
                            INNER JOIN Categorias C ON D.CategoriaID = C.CategoriaID
                            INNER JOIN Materias M ON D.MateriaID = M.MateriaID
                        WHERE D.MateriaID = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->MateriaID);
            $stmt->execute();

            return $stmt;
        }
    }