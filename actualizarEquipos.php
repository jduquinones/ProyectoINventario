<?php
    session_start();    
    var_dump($_SESSION);
    $autenticacion = $_SESSION['login'];
    if(!$autenticacion){
        header('Location: login.php');
    }

    $id = $_GET['id'];    
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: index.php');
    }

    require 'includes/templates/header.php';
    require 'includes/config/database.php';   

    $db = connectDB(); 
    $query = "SELECT * FROM activos WHERE id = ${id}";
    $resultadoConsulta = mysqli_query($db, $query);
    $dato = mysqli_fetch_assoc($resultadoConsulta);

    $activo = $dato['activoFijo'];
    $serie = $dato['serie'];
    $inventario = $dato['inventario'];
    $descripcion = $dato['descripcion'];
    $imagen = $dato['imagen'];
    $observaciones = $dato['observaciones'];

    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $activo = mysqli_real_escape_string($db, $_POST['activo']);
        $serie = mysqli_real_escape_string($db, $_POST['serie']);
        $inventario = mysqli_real_escape_string($db, $_POST['inventario']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $imagen = $_FILES['imagen'];
        $observaciones = mysqli_real_escape_string($db, $_POST['observaciones']);
       
        // Crear carpeta
        $carpetaImagen = 'imagenesSubmit/';
        if (!is_dir($carpetaImagen)) {
            mkdir($carpetaImagen);
        }

        $nombreImagen = '';

        // Elimina la imgaen que esta en el servidor en caso de que se actulice 
        if ($imagen['name']) {
            unlink($carpetaImagen . $dato['imagen']);

            //Generar nombre unico a la imagen
            $nombreImagen = md5(uniqid(rand(), true )) . ".jpg";

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagen . $nombreImagen);
        }else {
            $nombreImagen =  $dato['imagen'];
        }  
        
        // Maximo tamaño de la imagen
        $tamañoImagen = 100 * 5000;
        if ($imagen['size'] > $tamañoImagen) {
            $error[] = 'La imagen es muy pesada';
        }

        $query = "UPDATE activos SET activoFijo = '${activo}', serie = '${serie}', inventario = '${inventario}', descripcion = '${descripcion}', imagen = '${nombreImagen}', observaciones = '${observaciones}' WHERE id = ${id}";    

        $resultado = mysqli_query($db, $query);   
        if ($resultado) {
            header('Location: index.php');
        }     
    }
?>

<main class="contenedor">
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Actualizar Equipos</legend>
            <div class="orden">
                <label for="">Activo Fijo</label>
                <input type="text" placeholder="Numero Fijo" name="activo" id="activo" value="<?php echo $activo ;?>">
            </div>
            <div class="orden">
                <label for="">Número de serie</label>
                <input type="text" placeholder="Numero serie" name="serie" id="serie" value="<?php echo $serie ;?>">
            </div>
            <div class="orden">
                <label for="">Número de inventario</label>
                <input type="text" placeholder="Numero inventario" name="inventario" id="inventario" value="<?php echo $inventario ;?>">
            </div>
            <div class="orden">
                <label for="">Descripcion</label>
                <input type="text" placeholder="Descripcion del Equipo" name="descripcion" id="descripcion" value="<?php echo $descripcion ;?>">
            </div>
            <div class="orden bloque">
                <label for="">Imagen</label>
                <input class="ancho"  type="file" name="imagen" id="imagen" accept="image/jpg, image/png">
                <img src="imagenesSubmit/<?php echo $imagen ;?>" class="imagen-small" alt="">
            </div>
            <div class="orden">
                <label for="">Observaciones</label>
                <textarea name="observaciones" id="observaciones" ><?php echo $observaciones ;?></textarea>
            </div>
            <input class="boton boton-eliminar" type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>