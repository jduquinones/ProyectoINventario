<?php
    require 'includes/templates/header.php';
    require 'includes/config/database.php';

    $db = connectDB();

    $query = "SELECT * FROM activos";

    $resultado = mysqli_query($db, $query);

    // echo '<pre>';
    // var_dump($resultado);
    // echo '<pre>';   
?>

    <main class="contenedor">
        <table class="tabla">
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
            <?php while($row = mysqli_fetch_assoc($resultado)): ?>                                
               <tr> 
                    <td><?php echo $row['activoFijo']; ?></td>                    
                    <td><?php echo $row['serie']; ?></td>
                    <td><?php echo $row['inventario']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><img class="resultado-imagen" onclick="ampliarImagen('imagenesSubmit/<?php echo $row['imagen'];?>')"  src="imagenesSubmit/<?php echo $row['imagen']; ?>" > </td>
                    <td><?php echo $row['observaciones']; ?></td>                
                    <td class="accion">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="boton boton-eliminar" value="Eliminar">
                        </form>
                        <a class="boton boton-actualizar" href="actualizar.php?id=<?php echo $row['id']; ?>">Actualizar</a>
                    </td>                    
               </tr>               
               <?php endwhile; ?>
            </tbody>
        </table>
    </main>      
    
<?php
    require 'includes/templates/footer.php';
?>