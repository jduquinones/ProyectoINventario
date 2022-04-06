<?php
     require 'includes/funciones.php';
     require 'includes/templates/header.php';
     require 'includes/config/database.php';   
 
     $auth = estaAutenticado();
     if (!$auth) {
        header('Location: login.php');
    }

    $db = connectDB();
        
    // Se crean los datos vacios para que al enviarse a la base de datos no se envie lo que esta en el place holder
    $activo = '';
    $serie = '';
    $inventario = '';
    $descripcion = '';
    $observaciones = '';

    // convierte el value del input a una cadena legal para la base de datos, este dato lo captura de $_POST el cual es un metodo post

    // echo $_SERVER (Comparamos este metodo para cuando sea igual a post realice los pasos que estan en el if)
    
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $activo = mysqli_real_escape_string($db, $_POST['activo']);
        $serie = mysqli_real_escape_string($db, $_POST['serie']);
        $inventario = mysqli_real_escape_string($db, $_POST['inventario']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $observaciones = mysqli_real_escape_string($db, $_POST['observaciones']);    

        // echo '<pre>';
        // var_dump($_SERVER);
        // echo '</pre>';

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

        

        $query = "INSERT INTO activos (activoFijo, serie, inventario, descripcion, imagen, observaciones) VALUES ('${activo}','${serie}','${inventario}','${descripcion}', '${nombreImagen}', '${observaciones}')";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            $activo = '';
            $serie = '';
            $inventario = '';
            $descripcion = '';
            $imagen = '';
            $observaciones = '';
        } 
   }

?>

<main class="contenedor">
    <form class="formulario" action="crearEquipo.php" method="POST" enctype="multipart/form-data">
        <fieldset class="tabla__color">
            <legend>Creacion Equipos</legend>
            <div class="orden">
                <label for="">Activo Fijo</label>
                <input type="text" placeholder="Numero Fijo" name="activo" id="activo" value="<?php echo $activo; ?>">
            </div>
            <div class="orden">
                <label for="">Número de serie</label>
                <input type="text" placeholder="Numero serie" name="serie" id="serie" value="<?php echo $serie; ?>">
            </div>
            <div class="orden">
                <label for="">Número de inventario</label>
                <input type="text" placeholder="Numero inventario" name="inventario" id="inventario" value="<?php echo $inventario; ?>">
            </div>
            <div class="orden">
                <label for="">Descripcion</label>
                <input type="text" placeholder="Descripcion del Equipo" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>">
            </div>
            <div class="orden">
                <label for="">Imagen</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpg, image/png">
            </div>
            <div class="orden">
                <label for="">Observaciones</label>
                <textarea name="observaciones" id="observaciones" value="<?php echo $observaciones; ?>"></textarea>
            </div>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>