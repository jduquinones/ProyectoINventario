<?php

    require 'includes/config/database.php';
    require 'includes/templates/header.php';
    $db = connectDB();

    // Crea usuario y contraseña
    $correo = '';
    $contraseña = '';
    $nombreUsuario = '';
    $regional = '';
    
    $error = [];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $correo = mysqli_real_escape_string($db, $_POST['correo']);
        $contraseña = mysqli_real_escape_string($db, $_POST['contraseña']);
        $nombreUsuario = mysqli_real_escape_string($db, $_POST['nombreUsuario']);
        $regional = mysqli_real_escape_string($db, $_POST['regional']);

        $correo = filter_var($correo, FILTER_VALIDATE_EMAIL); // Validamos correo
        $paswordHash = password_hash($contraseña,PASSWORD_DEFAULT); // Validamos contraseña        

        if (!$error) {
            $error[] = 'Debe de ingresar un correo valido';
        }

        if (empty($error)) {
            
            // Revisar si existe el usuario
            $query = "SELECT * FROM usuarios WHERE correo = ${correo}";

            echo '<pre>';
            var_dump($query);
            echo '<pre>';
            
        }
        // $query = "INSERT INTO usuarios (correo,contraseña,nombreUsuario,regional) VALUES ('${correo}','${paswordHash}','${nombreUsuario}','${regional}')";  

        // $resultado = mysqli_query($db, $query);
        
        // if ($resultado) {
        //     $activo = '';
        //     $serie = '';
        //     $inventario = '';
        //     $descripcion = '';
        //     $imagen = '';
        //     $observaciones = '';
        // } 
        // echo '<pre>';
        // var_dump($resultado);
        // echo '<pre>'; 
    }

    

?>
<main class="contenedor">
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Creacion Usuarios</legend>
            <div class="orden">
                <label for="">Email</label>
                <input type="email" placeholder="E-mail" name="correo" id="correo" ">                
            </div>
                <!-- <?php foreach($error as $er) : ?>
                    <div class="error alerta">
                        <?php echo $er; ?>
                    </div>
                <?php endforeach; ?> -->
            <div class="orden">
                <label for="">contraseña</label>
                <input type="password" placeholder="Contraseña" name="contraseña" id="contraseña" required >
            </div>
            <div class="orden">
                <label for="">Nombre</label>
                <input type="text" placeholder="Nombre" name="nombreUsuario" id="nombreUsuario" required >
            </div>
            <div class="orden">
                <label for="">Regional</label>
                <input type="text" placeholder="Regional" name="regional" id="regional" required">
            </div>            
            <input class="boto boton-actualizar" type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>