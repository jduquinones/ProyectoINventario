<?php

    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }

    require 'includes/config/database.php';
    $db = connectDB();
        
    // Se crean los datos vacios para que al enviarse a la base de datos no se envie lo que esta en el place holder
    $tipo = '';
    $ip = '';
    $sistemaOperativo = '';
    $serial = '';
    $ofimatica = '';
    $marca = '';
    $modelo = '';
    $nombre = '';

    // convierte el value del input a una cadena legal para la base de datos, este dato lo captura de $_POST el cual es un metodo post

    // echo $_SERVER (Comparamos este metodo para cuando sea igual a post realice los pasos que estan en el if)
    
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $tipo = mysqli_real_escape_string($db, $_POST['tipo']);
        $ip = mysqli_real_escape_string($db, $_POST['ip']);
        $sistemaOperativo = mysqli_real_escape_string($db, $_POST['sistemaOperativo']);
        $serial = mysqli_real_escape_string($db, $_POST['serial']);
        $ofimatica = mysqli_real_escape_string($db, $_POST['ofimatica']);
        $marca = mysqli_real_escape_string($db, $_POST['marca']);    
        $modelo = mysqli_real_escape_string($db, $_POST['modelo']);    
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);    

        //Subir imagenes al servidor
        $imagen = $_FILES['imagen'];
    
        //Creamos la carpeta en donde se va a alojar las imagenes en el servidos
        $carpetaImagen = 'imagenesSubmit/';
        if (!is_dir($carpetaImagen) ) {
        mkdir($carpetaImagen);
        }

        // Generamos un nombre unico para las imagenes
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        
        // Subimos la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagen . $nombreImagen);

        

        $query = "INSERT INTO equipos (tipo, ip, sistemaOperativo, serial, ofimatica, imagen, marca, modelo, nombre) VALUES ('${tipo}','${ip}','${sistemaOperativo}','${serial}','${ofimatica}', '${nombreImagen}', '${marca}', '${modelo}', '${nombre}')";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            $tipo = '';
            $ip = '';
            $sistemaOperativo = '';
            $serial = '';
            $ofimatica = '';
            $imagen = '';
            $marca = '';
            $modelo = '';
            $nombre = '';
        } 
   }

   incluirTemplate('header');
?>

<main class="contenedor">
    <form class="formulario" action="crearEquipo.php" method="POST" enctype="multipart/form-data">
        <fieldset class="tabla__color">
            <legend>Creacion Equipos</legend>
            <div class="orden">
                <label for="">Tipo</label>
                <input type="text" placeholder="Tipo de Equipo" name="tipo" id="tipo" value="<?php echo $tipo; ?>">
            </div>
            <div class="orden">
                <label for="">Ip</label>
                <input type="text" placeholder="Numero de Ip" name="ip" id="ip" value="<?php echo $ip; ?>">
            </div>
            <div class="orden">
                <label for="">Sistema Operativo</label>
                <input type="text" placeholder="Sistema Operativo" name="sistemaOperativo" id="sistemaOperativo" value="<?php echo $sistemaOperativo; ?>">
            </div>
            <div class="orden">
                <label for="">Serial</label>
                <input type="text" placeholder="Serial" name="serial" id="serial" value="<?php echo $serial; ?>">
            </div>
            <div class="orden">
                <label for="">Ofimatica</label>
                <input type="text" placeholder="Ofimatica del Equipo" name="ofimatica" id="ofimatica" value="<?php echo $ofimatica; ?>">
            </div>
            <div class="orden">
                <label for="">Imagen</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpg, image/png">
            </div>
            <div class="orden">
                <label for="">Marca</label>
                <input name="marca" placeholder="Marca" id="marca" value="<?php echo $marca; ?>"></input>
            </div>
            <div class="orden">
                <label for="">Modelo</label>
                <input name="modelo" placeholder="Marca" id="modelo" value="<?php echo $modelo; ?>"></input>
            </div>
            <div class="orden">
                <label for="">Nombre</label>
                <input name="nombre" placeholder="Nombre" id="nombre" value="<?php echo $nombre; ?>"></input>
            </div>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>