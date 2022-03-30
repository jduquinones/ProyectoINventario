<?php
    require 'includes/templates/header.php';
    require 'includes/config/database.php';

    $db = connectDB();    

    $dato['activoFijo'] = '';                    
    $dato['serie'] = '';
    $dato['inventario'] = '';
    $dato['descripcion'] = '';
    $dato['imagen'] = '';
    $dato['observaciones'] = '';

    $error = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $buscar = $_POST['buscar'];
        $buscar = filter_var($buscar, FILTER_VALIDATE_INT);
        if ($buscar) {
            $query = "SELECT * FROM activos WHERE activoFijo = '${buscar}'";    
            $resultado = mysqli_query($db,$query);

            if($resultado->num_rows === 0) { 
                $buscar = false;
                $error[] = 'No se encontro resultado con ese numero de activo';
            }
            else{
                $resultado = mysqli_query($db,$query);
                $dato = mysqli_fetch_assoc($resultado);                
            }    
        }else{
           $error[] = 'Debe de ingresar un activo fijo para poder realizar la busqueda'; 
        }   
    }         
?>
<main class="contenedor">
    <?php foreach($error as $e) : ?>
    <p class="error"><?php echo $e; ?></p>
    <?php endforeach; ?>
    <?php if ($buscar) { ?>
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
    <?php }?> 
</main>
<?php
    require 'includes/templates/footer.php';
?>