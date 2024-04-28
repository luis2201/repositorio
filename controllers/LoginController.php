<?php
    // controllers/MateriaController.php

    require_once 'models/Usuario.php';
    require_once 'models/Database.php';

    class LoginController
    {
        private $db;
        private $usuario;

        public function __construct() {
            $this->db = (new Database())->getConnection();
            $this->usuario = new Usuario($this->db);
        }

        public function index()
        {
            include 'views/login/index.php';
        }

        public function validar()
        {
            $this->usuario->Email = $_POST["Email"];
            $this->usuario->Contrasena = md5($_POST["Contrasena"]);

            session_start();

            if($this->usuario->login()){
                $_SESSION['usuario_repo'] = $this->usuario->Nombre.' '.$this->usuario->apellido;
                $_SESSION['usuarioid_repo'] = $this->usuario->UsuarioID;

                header('Location: /home');
            } else {
                $_SESSION['mensaje'] = "Usuario y/o contraseña inconrrecto. Vuelva a intentar.";

                header('Location: /login');
            }
        }
    }