<?php
    // models/Usuario.php

    class Usuario {
        // Conexión a la base de datos y nombre de la tabla
        private $conn;
        private $table_name = "Usuarios";

        // Propiedades del objeto
        public $UsuarioID;
        public $Nombre;
        public $Apellido;
        public $Email;
        public $Contrasena;

        // Constructor con la base de datos como conexión
        public function __construct($db) {
            $this->conn = $db;
        }   

        // Obtener uel usuario que ha iniciado sesión
        public function login() {
            $query = "SELECT * FROM " . $this->table_name . " WHERE Email = ? AND Contrasena = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->Email);
            $stmt->bindParam(2, $this->Contrasena);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row) {
                $this->Nombre = $row['Nombre'];
                $this->Apellido = $row['Apellido'];
                $this->UsuarioID = $row['UsuarioID'];

                return true;
            } else{
                return false;
            }
        }

    }

?>