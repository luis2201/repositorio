<?php

class HomeController {
    
    public function index() {      
        // if(!isset($_SESSION['usuario_repo'])){  
        //     header('Location:login');
        // } else{
            include 'views/home/index.php'; // Asegúrate de que la ruta sea la correcta
        //}
    }
}
