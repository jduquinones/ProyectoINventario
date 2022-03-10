<?php
    require 'includes/templates/header.php';
    require 'includes/config/database.php';

    $id = $_GET['id'];    
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: index.php');
    }

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


?>

<main class="contenedor">
    <form class="formulario" action="crearEquipo.php" method="POST" enctype="multipart/form-data">
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
            <div class="orden">
                <label for="">Imagen</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpg, image/png">
            </div>
            <div class="orden">
                <label for="">Observaciones</label>
                <textarea name="observaciones" id="observaciones" ><?php echo $observaciones ;?></textarea>
            </div>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>