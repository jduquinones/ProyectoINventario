
<?php

function connectDB() : mysqli  {
    $db = mysqli_connect('localhost','root','12345','inventario');

    if (!$db) {
        echo 'No conect';
       exit;
    }    
    return $db;    
}

