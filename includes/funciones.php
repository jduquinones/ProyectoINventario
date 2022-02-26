<?php
    require 'app.php';

    function incluirTamplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "/${nombre}.php";
}