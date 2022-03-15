<?php
       
    require 'includes/config/database.php';
    $db = connectDB();

    // Crea usuario y contraseña
    $correo = '';
    $contraseña = '';       
    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $correo = mysqli_real_escape_string($db, $_POST['correo']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $correo = filter_var($correo, FILTER_VALIDATE_EMAIL); // Validamos correo
        $paswordHash = password_hash($password,PASSWORD_DEFAULT); // Validamos password    
           
        if (!$correo) {
            $error[] = 'Debe ingresar un Correo';
        }
        
        if (!$password) {
            $error[] = 'Debe ingresar una Contraseña';
        }

        if (empty($error)) {
            
            // Revisar si existe el usuario
            $query = "SELECT * FROM usuarios WHERE correo = '${correo}'";
            $resultado = mysqli_query($db, $query);

            if ($resultado->num_rows) {
                // Revisar si la password es correcta
                $usuario = mysqli_fetch_assoc($resultado);
                $autenticacion = password_verify($password, $usuario['password']);
                var_dump($autenticacion);
                var_dump($password);  

                var_dump($usuario['password']);                

                if ($autenticacion) {

                    // Ingreso del usuario y contraseña autenticado
                    session_start();

                    // Llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['correo'];
                    $_SESSION['login'] = true;
                    
                    header('Location: index.php');
                    $correo = '';
                    $contraseña = '';
                }else {
                    $error[] = 'Usuario o Contraseña incorrecta';
                }
            }else {
                $error[] = 'Usuario o Contraseña incorrecta';
            }
            
        }
    }  

?>

<!DOCTYPE html>
<html lang="es" class="background-color">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/build/css/app.css">   
</head>
<body class="contenido  background-color bg-login">
    <main class="contenido__login contenedor">
        <div class="contenido__imagen">
            <picture>
                <source srcset="build/img/inventory-management-system.webp" type="imagen/webp">
                <img  loadin="lazy" src="build/img/inventory-management-system.png" alt="Imagen login">
            </picture>
        </div>
        <div class="contenido__formulario">
            <form class="formulario" method="POST" enctype="multipart/form-data">
                <legend>Bienvenido</legend>
                <?php foreach($error as $er) :?>
                    <div class="error alerta">
                        <?php echo $er ;?>
                    </div>
                <?php endforeach; ?>
                <div class="formulario__border">  
                    <div class="formulario__input" >
                        <input id="correo" name="correo" class="formulario__input--no" type="text" placeholder="Usuario*">
                    </div>

                    <div class="formulario__input">
                        <input id="password" name="password" class="formulario__input--no" type="password" placeholder="Contraseña*">
                    </div>                
                </div>
                <div class="formulario__submit">
                    <input class="formulario__submit--cambio" type="submit" value="Ingresar">
                </div>             
            </form>
        </div>       
    </main> 
    <script src="ingreso.js"></script>
</body>
</html>