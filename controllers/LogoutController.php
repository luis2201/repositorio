<?php

    class LogoutController
    {
        public function destroysession()
        {
            session_start();

            session_unset();
            session_destroy();

            include 'views/login/index.php';
        }
    }

?>