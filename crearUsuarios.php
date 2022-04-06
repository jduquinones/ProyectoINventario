<?php

    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }

    require 'includes/config/database.php';
    $db = connectDB();

    // Crea usuario y contraseña
    $correo = '';
    $contraseña = '';
    $nombreUsuario = '';
    $regional = '';
    
    $error = [];
    $mensaje = [];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $correo = mysqli_real_escape_string($db, $_POST['correo']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password1 = mysqli_real_escape_string($db, $_POST['password1']);
        $nombreUsuario = mysqli_real_escape_string($db, $_POST['nombreUsuario']);
        $regional = mysqli_real_escape_string($db, $_POST['regional']);

        // Validacion para saber si el correo a registrar ya existe
        $query = "SELECT * FROM usuarios WHERE correo = '${correo}'";
        $resultado = mysqli_query($db, $query);        
        if ($resultado->num_rows) {
            $error[] = 'El correo que intenta registrar ya existe';
        }          

        // Validacion de contraseñas
        if ($password !==  $password1) {
            $error[] = 'Las contraseñas no coinciden';
        }
        $correo = filter_var($correo, FILTER_VALIDATE_EMAIL); // Validamos que sea un correo
        $paswordHash = password_hash($password,PASSWORD_DEFAULT); // hashamos el password    
       
        if (!$correo) {
            $error[] = 'Debe de ingresar un correo valido';
        }
        
        if (!$password) {
            $error[] = 'Debe de ingresar una contraseña';
        }

        if (!$password1) {
            $error[] = 'Debe de confirmar la contraseña ingresada';
        }

        if (!$nombreUsuario) {
            $error[] = 'Debe ingresar un nombre de usuario';
        }

        if (empty($error)) {
            
            $query = "INSERT INTO usuarios (correo,password,nombreUsuario,regional) VALUES ('${correo}','${paswordHash}','${nombreUsuario}','${regional}')";  
                        
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                $activo = '';
                $serie = '';
                $inventario = '';
                $descripcion = '';
                $imagen = '';
                $observaciones = '';
            } 

            $mensaje[] = 'Usuario creado correctamente';

        }
    }
    incluirTemplate('header');
?>
<main class="contenedor">
    <?php foreach($error as $e) : ?>
        <div class="error alerta">
            <?php echo $e; ?>
        </div>
     <?php endforeach; ?> 
     <?php foreach($mensaje as $e) : ?>
        <div class="error alerta">
            <?php echo $e; ?>
        </div>
     <?php endforeach; ?>
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset class="tabla__color">
            <legend>Creacion Usuarios</legend>
            <div class="orden">
                <label for="">Email</label>
                <input type="email" placeholder="E-mail" name="correo" id="correo" required>                
            </div>                            
            <div class="orden">
                <label for="">password</label>
                <input type="password" placeholder="password" name="password" id="password" required >
            </div>
            <div class="orden">
                <label for="">Confirmar password</label>
                <input type="password" placeholder="password" name="password1" id="password1" required >
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