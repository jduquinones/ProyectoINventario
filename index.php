<?php
     require 'includes/funciones.php';
     $autenticacion = estaAutenticado();
     if(!$autenticacion){
         header('Location: login.php');
     }

    require 'includes/templates/header.php';
    require 'includes/config/database.php';

    $db = connectDB();

    $query = "SELECT * FROM activos";

    $resultado = mysqli_query($db, $query);

    $productosPorPagina = 2;
    // Por defecto es la página 1; pero si está presente en la URL, tomamos esa
        if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];
    }else{
        $pagina = 1;
    }
    var_dump($_GET);
    $query = "SELECT imagen FROM activos LIMIT" . (($pagina - 1 * $productosPorPagina) . "," . $productosPorPagina);
    $resultado = mysqli_query($db, $query);
    $resultado = "SELECT count(*) as num_personas FROM activos";
    var_dump($resultado);
    var_dump($query);
    exit;

    
        
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            $query = "SELECT imagen FROM activos WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $dato = mysqli_fetch_assoc($resultado);
            var_dump($dato);
            var_dump($query);
            exit;

            unlink('imagenesSubmit/' . $dato['imagen']);

            $query = "DELETE FROM activos WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            if ($resultado) {
               header('Location: index.php');
            }
        }
    }
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
                    <td><img class="resultado-imagen" onclick="ampliarImagen('<?php echo $row['imagen'];?>')"  src="imagenesSubmit/<?php echo $row['imagen']; ?>" > </td>
                    <td><?php echo $row['observaciones']; ?></td>                
                    <td class="accion">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="boton boton-eliminar" value="Eliminar">
                        </form>
                        <a class="boton boton-actualizar" href="actualizarEquipos.php?id=<?php echo $row['id']; ?>" >Actualizar</a>
                    </td>                    
               </tr>               
               <?php endwhile; ?>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td>
                        <span><a href="">Anterior</a></span>
                    </td>
                    <td>
                        <span><a href="">1</a></span>
                    </td>
                    <td>
                        <span><a href="">2</a></span>
                    </td>
                    <td>
                        <span><a href="">3</a></span>
                    </td>
                    <td>
                        <span><a href="">4</a></span>
                    </td>
                    <td>
                        <span><a href="">Siguiente</a></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>      
    
<?php
    require 'includes/templates/footer.php';
?>