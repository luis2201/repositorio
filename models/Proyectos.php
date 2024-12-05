<?php
//models/Proyectosinvestigacion.php

class Proyectos {
    // Conexión a la base de datos y nombre de la tabla
    private $conn;
    private $table_name = "Proyectos";

    // Propiedades del objeto
    public $ProyectoID;
    public $TipoProyecto;
    public $Nombre;
    public $FechaAprobacion;
    public $FechaInicio;
    public $FechaFin;
    public $AutorDocente;
    public $AutorEstudiante;
    public $ArchivoPDF;

    // Constructor con la base de datos como conexión
    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los documentos
    public function leer() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE TipoProyecto = ?";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->TipoProyecto = htmlspecialchars(strip_tags($this->TipoProyecto));

        // Enlazar los valores
        $stmt->bindParam(1, $this->TipoProyecto);

        $stmt->execute();

        return $stmt;
    }

    // Añadir un nuevo proyecto
    public function crearInvestigacion() {
        $query = "INSERT INTO " . $this->table_name . " (TipoProyecto, Nombre, FechaInicio, FechaFin, AutorDocente, AutorEstudiante, ArchivoPDF) VALUES (:TipoProyecto, :Nombre, :FechaInicio, :FechaFin, :AutorDocente, :AutorEstudiante, :ArchivoPDF)";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->TipoProyecto = htmlspecialchars(strip_tags($this->TipoProyecto));
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->FechaInicio = htmlspecialchars(strip_tags($this->FechaInicio));
        $this->FechaFin = htmlspecialchars(strip_tags($this->FechaFin));
        $this->AutorDocente = htmlspecialchars(strip_tags($this->AutorDocente));
        $this->AutorEstudiante = htmlspecialchars(strip_tags($this->AutorEstudiante));
        $this->ArchivoPDF = htmlspecialchars(strip_tags($this->ArchivoPDF));

        // Enlazar los valores
        $stmt->bindParam(":TipoProyecto", $this->TipoProyecto);
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":FechaInicio", $this->FechaInicio);
        $stmt->bindParam(":FechaFin", $this->FechaFin);
        $stmt->bindParam(":AutorDocente", $this->AutorDocente);
        $stmt->bindParam(":AutorEstudiante", $this->AutorEstudiante);
        $stmt->bindParam(":ArchivoPDF", $this->ArchivoPDF);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

     // Añadir un nuevo proyecto
     public function crearPatente() {
        $query = "INSERT INTO " . $this->table_name . " (TipoProyecto, Nombre, FechaAprobacion, AutorDocente, AutorEstudiante, ArchivoPDF) VALUES (:TipoProyecto, :Nombre, :FechaAprobacion, :AutorDocente, :AutorEstudiante, :ArchivoPDF)";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->TipoProyecto = htmlspecialchars(strip_tags($this->TipoProyecto));
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->FechaAprobacion = htmlspecialchars(strip_tags($this->FechaAprobacion));
        $this->AutorDocente = htmlspecialchars(strip_tags($this->AutorDocente));
        $this->AutorEstudiante = htmlspecialchars(strip_tags($this->AutorEstudiante));
        $this->ArchivoPDF = htmlspecialchars(strip_tags($this->ArchivoPDF));

        // Enlazar los valores
        $stmt->bindParam(":TipoProyecto", $this->TipoProyecto);
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":FechaAprobacion", $this->FechaAprobacion);
        $stmt->bindParam(":AutorDocente", $this->AutorDocente);
        $stmt->bindParam(":AutorEstudiante", $this->AutorEstudiante);
        $stmt->bindParam(":ArchivoPDF", $this->ArchivoPDF);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Obtener una único proyectos por ID
    public function leerUno() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ProyectoID = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->ProyectoID);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->Nombre = $row['Nombre'];
            $this->FechaAprobacion = $row['FechaAprobacion'];
            $this->FechaInicio = $row['FechaInicio'];
            $this->FechaFin = $row['FechaFin'];
            $this->AutorDocente = $row['AutorDocente'];
            $this->AutorEstudiante = $row['AutorEstudiante'];
            $this->ArchivoPDF = $row['ArchivoPDF'];
            $this->ProyectoID = $row['ProyectoID'];
        }
    }

    // Actualizar un proyecto
    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET Nombre = :Nombre, 
                                                       FechaInicio = :FechaInicio, 
                                                       FechaFin = :FechaFin, 
                                                       AutorDocente = :AutorDocente,
                                                       AutorEstudiante = :AutorEstudiante,
                                                       ArchivoPDF = :ArchivoPDF
                  WHERE ProyectoID = :ProyectoID";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->FechaInicio = htmlspecialchars(strip_tags($this->FechaInicio));
        $this->FechaFin = htmlspecialchars(strip_tags($this->FechaFin));
        $this->AutorDocente = htmlspecialchars(strip_tags($this->AutorDocente));
        $this->AutorEstudiante = htmlspecialchars(strip_tags($this->AutorEstudiante));
        $this->ArchivoPDF = htmlspecialchars(strip_tags($this->ArchivoPDF));
        $this->ProyectoID = htmlspecialchars(strip_tags($this->ProyectoID));

        // Enlazar los valores
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":FechaInicio", $this->FechaInicio);
        $stmt->bindParam(":FechaFin", $this->FechaFin);
        $stmt->bindParam(":AutorDocente", $this->AutorDocente);
        $stmt->bindParam(":AutorEstudiante", $this->AutorEstudiante);
        $stmt->bindParam(":ArchivoPDF", $this->ArchivoPDF);
        $stmt->bindParam(":ProyectoID", $this->ProyectoID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Actualizar un proyecto
    public function actualizarPatente() {
        $query = "UPDATE " . $this->table_name . " SET Nombre = :Nombre, 
                                                       FechaAprobacion = :FechaAprobacion, 
                                                       AutorDocente = :AutorDocente,
                                                       AutorEstudiante = :AutorEstudiante,
                                                       ArchivoPDF = :ArchivoPDF
                  WHERE ProyectoID = :ProyectoID";

        $stmt = $this->conn->prepare($query);

        // Limpiar los datos
        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->FechaAprobacion = htmlspecialchars(strip_tags($this->FechaAprobacion));
        $this->AutorDocente = htmlspecialchars(strip_tags($this->AutorDocente));
        $this->AutorEstudiante = htmlspecialchars(strip_tags($this->AutorEstudiante));
        $this->ArchivoPDF = htmlspecialchars(strip_tags($this->ArchivoPDF));
        $this->ProyectoID = htmlspecialchars(strip_tags($this->ProyectoID));

        // Enlazar los valores
        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":FechaAprobacion", $this->FechaAprobacion);
        $stmt->bindParam(":AutorDocente", $this->AutorDocente);
        $stmt->bindParam(":AutorEstudiante", $this->AutorEstudiante);
        $stmt->bindParam(":ArchivoPDF", $this->ArchivoPDF);
        $stmt->bindParam(":ProyectoID", $this->ProyectoID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Eliminar el proyecto
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
     public function searchInvestigacion()
     {
         $this->Nombre = '%' . htmlspecialchars(strip_tags($this->Nombre)) . '%';
 
         $query = "SELECT * FROM " . $this->table_name . " WHERE Nombre LIKE :Nombre ORDER BY Nombre;";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(':Nombre', $this->Nombre, PDO::PARAM_STR);
         $stmt->execute();
 
         return $stmt;
     }
    
}

?>