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
                    <td><?php echo $row['imagen']; ?></td>
                    <td><?php echo $row['observaciones']; ?></td>                
                    <td class="accion">
                        <a class="boton boton-actualizar" href="#">Actualizar</a>
                        <a class="boton boton-eliminar" href="#">Eliminar</a>                    
                    </td>                    
               </tr>               
               <?php endwhile; ?>
            </tbody>
        </table>
    </main>
        
    <script src="js/tabla.js"></script>
    
<?php
    require 'includes/templates/footer.php';
?>