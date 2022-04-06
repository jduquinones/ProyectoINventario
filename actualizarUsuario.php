<?php

    require 'includes/funciones.php';
    require 'includes/config/database.php';   

    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }

    $id = $_GET['id'];    
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: index.php');
    }
    
    $db = connectDB(); 
    $query = "SELECT * FROM usuarios WHERE id = ${id}";
    $resultadoConsulta = mysqli_query($db, $query);
    $dato = mysqli_fetch_assoc($resultadoConsulta);

    $correo = $dato['correo'];
    $nombreUsuario = $dato['nombreUsuario'];
    $regional = $dato['regional'];
    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $correo = mysqli_real_escape_string($db, $_POST['correo']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password1 = mysqli_real_escape_string($db, $_POST['password1']);
        $nombreUsuario = mysqli_real_escape_string($db, $_POST['nombreUsuario']);
        $regional = mysqli_real_escape_string($db, $_POST['regional']);

       if (empty($password) && empty($password1)){
            
           if (empty($error)) {
               $correo = filter_var($correo, FILTER_VALIDATE_EMAIL); //Validamos que sea un correo
               $query = "UPDATE usuarios SET correo = '${correo}', nombreUsuario = '${nombreUsuario}', regional = '${regional}'WHERE id = ${id}";    
               $resultado = mysqli_query($db, $query);   
               
               if ($resultado) {
                   header('Location: gestionUsuario.php');
               }    
           }
       }else {
        if ($password !==  $password1) {
            $error[] = 'Las contraseñas no coinciden';
        }else {
            if (empty($error)) {                
                $correo = filter_var($correo, FILTER_VALIDATE_EMAIL); //Validamos que sea un correo
                $passwordHash = password_hash($password,PASSWORD_DEFAULT); //hasheamos el password  
                $query = "UPDATE usuarios SET correo = '${correo}', password = '${passwordHash}', nombreUsuario = '${nombreUsuario}', regional = '${regional}'WHERE id = ${id}";    
                $resultado = mysqli_query($db, $query);   
                
                if ($resultado) {
                    header('Location: gestionUsuario.php');
                }             
            }   
        }    // Validacion de contraseñas
       }        
    }
?>

<main class="contenedor">
    <?php foreach($error as $e) : ?>
        <div class="error alerta">
            <?php echo $e; ?>
        </div>
     <?php endforeach; ?> 
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset class="tabla__color">
            <legend>Actualizar Equipos</legend>
            <div class="orden">
                <label for="">Correo</label>
                <input type="mail" name="correo" id="correo" value="<?php echo $correo ;?>" >
            </div>
            <div class="orden">
                <label for="">Nombre de Usuarior</label>
                <input type="text" name="nombreUsuario" id="nombreUsuario" value="<?php echo $nombreUsuario ;?>" >
            </div>
            <div class="orden">
                <label for="">Contraseña</label>
                <input type="password" name="password" id="password" >
            </div>
            <div class="orden">
                <label for="">Confirme la Contraseña</label>
                <input type="password" name="password1" id="password1">
            </div>
            <div class="orden">
                <label for="">Regional</label>
                <input type="text" name="regional" id="regional" value="<?php echo $regional ;?>">
            </div>
            <input class="boton boton-eliminar" type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>