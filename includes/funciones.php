<?php
    require 'app.php';

    function incluirTamplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "/${nombre}.php";
    }

    function estaAutenticado() : bool {
        session_start();   
        $autenticacion = $_SESSION['login'];
        if ($autenticacion) {
            return true;
        } 
        return false;
    }

