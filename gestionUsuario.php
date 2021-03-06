<?php

    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }   

    require 'includes/config/database.php';
    $db = connectDB();

    $query = "SELECT * FROM usuarios";

    $resultado = mysqli_query($db, $query);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {            
            $query = "DELETE FROM usuarios WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            if ($resultado) {
               header('Location: gestionUsuario.php');
            }
        }
    }
    incluirTemplate('header');
?>

    <main class="contenedor">
        <table class="tabla tabla__color">
            <thead>
                <tr>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Regional</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($resultado)): ?>                                
               <tr> 
                    <td><?php echo $row['correo']; ?></td>                    
                    <td><?php echo $row['nombre'] . " " . $row['apellido'] ; ?></td>
                    <td><?php echo $row['regional']; ?></td>             
                    <td class="accion">
                        <form method="POST" action="gestionUsuario.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="boton boton-eliminar" value="Eliminar">
                        </form>
                        <a class="boton boton-actualizar" href="actualizarUsuario.php?id=<?php echo $row['id']; ?>" >Actualizar</a>
                    </td>                                
               </tr>               
               <?php endwhile; ?>
            </tbody>
        </table>
    </main>      
    
<?php
    require 'includes/templates/footer.php';
?>