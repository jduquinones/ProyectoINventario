<?php
    require 'includes/templates/header.php';
    require 'includes/config/database.php';

    $db = connectDB();

    $error = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';
        $buscar = $_POST['buscar'];
        $buscar = filter_var($buscar, FILTER_VALIDATE_INT);  
        $query = "SELECT * FROM activos WHERE activoFijo = '${buscar}'";           

        if(!$buscar || empty($buscar)){
            $error[] = 'Debe de ingresar datos numericos';
        }else{
            $resultado = mysqli_query($db,$query);
            $dato = mysqli_fetch_assoc($resultado);                
        }
    }

?>
<main class="contenedor">
    <?php foreach($error as $e) : ?>
    <p class="error"><?php echo $e; ?></p>
    <?php endforeach; ?>
    <table class="tabla tabla__color">
            <thead>
                <tr>
                    <th>Activo fijo</th>
                    <th>Número de serie</th>
                    <th>Número de inventario</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Observaciones</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
               <tr> 
                    <td><?php echo $dato['activoFijo']; ?></td>                    
                    <td><?php echo $dato['serie']; ?></td>
                    <td><?php echo $dato['inventario']; ?></td>
                    <td><?php echo $dato['descripcion']; ?></td>
                    <td><img class="resultado-imagen" onclick="ampliarImagen('<?php echo $dato['imagen'];?>')"  src="imagenesSubmit/<?php echo $dato['imagen']; ?>" > </td>
                    <td><?php echo $dato['observaciones']; ?></td>                
                    <td class="accion">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                            <input type="submit" class="boton boton-eliminar" value="Eliminar">
                        </form>
                        <a class="boton boton-actualizar" href="actualizarEquipos.php?id=<?php echo $dato['id']; ?>" >Actualizar</a>
                    </td>                    
               </tr>               
            </tbody>
        </table>
</main>
<?php
    require 'includes/templates/footer.php';
?>