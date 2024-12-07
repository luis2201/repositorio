<?php
// models/Estadistica.php

class Estadisticas {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "Visita_Documentos";

    // Constructor con la base de datos como conexión
    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener visitas de tesis y libros en los últimos 12 meses
    public function all12() {       
        $query = "SELECT 
                    YEAR(V.Fecha) AS Anio,
                    MONTH(V.Fecha) AS Mes,
                    D.CategoriaID,
                    COUNT(*) AS Total
                FROM 
                    Visita_Documentos V
                INNER JOIN 
                    Documentos D ON V.DocumentoID = D.DocumentoID
                WHERE 
                    V.Fecha >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
                GROUP BY 
                    YEAR(V.Fecha), MONTH(V.Fecha), D.CategoriaID
                ORDER BY 
                    Anio, Mes, D.CategoriaID";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    
    // Obtener total visitas tesis
    public function totalvisitatesis() {       
        $query = "SELECT 
                    COUNT(*) AS Total
                  FROM 
                    Visita_Documentos V
                  INNER JOIN 
                    Documentos D ON V.DocumentoID = D.DocumentoID
                  WHERE D.CategoriaID = 2;";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener total visitas libros
    public function totalvisitalibros() {       
        $query = "SELECT 
                    COUNT(*) AS Total
                  FROM 
                    Visita_Documentos V
                  INNER JOIN 
                    Documentos D ON V.DocumentoID = D.DocumentoID
                  WHERE D.CategoriaID = 3;";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener el área más visitada
    public function areamasvisitada() {       
        $query = "SELECT COUNT(M.Nombre)AS Total, A.Nombre As Area
                  FROM Visita_Documentos V 
                    INNER JOIN Documentos D ON V.DocumentoID = D.DocumentoID
                    INNER JOIN Materias M ON D.MateriaID = M.MateriaID
                    INNER JOIN Areas A ON M.AreaID = A.AreaID
                  GROUP BY Area
                  ORDER BY Total DESC
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener el área más visitada
    public function areamenosvisitada() {       
        $query = "SELECT COUNT(M.Nombre)AS Total, A.Nombre As Area
                  FROM Visita_Documentos V 
                    INNER JOIN Documentos D ON V.DocumentoID = D.DocumentoID
                    INNER JOIN Materias M ON D.MateriaID = M.MateriaID
                    INNER JOIN Areas A ON M.AreaID = A.AreaID
                  GROUP BY Area
                  ORDER BY Total ASC
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    // Obtener visitas tesis
    public function visitatesis() {       
      $query = "SELECT D.Titulo, M.Nombre AS Materia, A.Nombre AS Area, COUNT(*)AS Visitas
                FROM Visita_Documentos V
                  INNER JOIN Documentos D ON V.DocumentoID = D.DocumentoID
                  INNER JOIN Materias M ON D.MateriaID = M.MateriaID
                  INNER JOIN Areas A ON M.AreaID = A.AreaID
                WHERE D.CategoriaID = 2
                GROUP BY D.DocumentoID";

      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt;
    }

    // Obtener visitas libros
    public function visitalibros() {       
      $query = "SELECT D.Titulo, M.Nombre AS Materia, A.Nombre AS Area, COUNT(*)AS Visitas
                FROM Visita_Documentos V
                  INNER JOIN Documentos D ON V.DocumentoID = D.DocumentoID
                  INNER JOIN Materias M ON D.MateriaID = M.MateriaID
                  INNER JOIN Areas A ON M.AreaID = A.AreaID
                WHERE D.CategoriaID = 3
                GROUP BY D.DocumentoID";

      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt;
    }

}

?>