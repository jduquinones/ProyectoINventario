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
    $nombre = '';
    $apellido = '';
    $regional = '';
    
    $error = [];
    $mensaje = [];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $correo = mysqli_real_escape_string($db, $_POST['correo']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password1 = mysqli_real_escape_string($db, $_POST['password1']);
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
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

        if (!$nombre) {
            $error[] = 'Debe ingresar un nombre de usuario';
        }

        if (!$apellido) {
            $error[] = 'Debe ingresar un apellido de usuario';
        }

        if (empty($error)) {
            
            $query = "INSERT INTO usuarios (correo,password,nombre,apellido,regional) VALUES ('${correo}','${paswordHash}','${nombre}', '${apellido}','${regional}')";  
                        
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                $correo = '';
                $password = '';
                $nombre = '';
                $apellido = '';
                $regional = '';
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
                <input type="text" placeholder="Nombre" name="nombre" id="nombre" required >
            </div>
            <div class="orden">
                <label for="">Apellido</label>
                <input type="text" placeholder="Apellido" name="apellido" id="apellido" required >
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