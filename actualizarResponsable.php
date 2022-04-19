<?php
    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }

    $id = $_GET['id'];    
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: responsable.php');
    }

    require 'includes/config/database.php';
    $db = connectDB(); 

    $query = "SELECT r.id, r.nombre, r.apellido, r.cargo, r.extencion, e.idEquipos, e.serial, u.departamento
    FROM responsables r 
    left JOIN equipos e 
        ON r.ubicacionResponsables_id = e.idEquipos       
    LEFT JOIN ubicacion u 
    	ON r.ubicacionResponsables_id = u.id
    Where r.id = ${id}";
    
    $resultadoConsulta = mysqli_query($db, $query);
    $dato = mysqli_fetch_assoc($resultadoConsulta);

    $depatamento = "SELECT u.id, u.departamento 
    FROM  responsables r 
    LEFT JOIN ubicacion u  
    ON u.id = r.ubicacionResponsables_id
    WHERE r.id = ${id}";
    $resultadoDepartamento = mysqli_query($db, $depatamento);
    $ubicacion = mysqli_fetch_assoc($resultadoDepartamento);

    $option = "SELECT * FROM  ubicacion ";
    $optionDepartamento = mysqli_query($db, $option);    

    $nombre = $dato['nombre'];
    $apellido = $dato['apellido'];
    $cargo = $dato['cargo'];  

    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
        $cargo = mysqli_real_escape_string($db, $_POST['cargo']);
        $extencion = mysqli_real_escape_string($db, $_POST['extencion']);
        $ubicacionResponsables_id = mysqli_real_escape_string($db, $_POST['ubicacionResponsables_id']);

        if (empty($error)) {             
            $query = "UPDATE responsables
            SET nombre = '${nombre}', apellido = '${apellido}', cargo = '${cargo}', extencion = '${extencion}, ubicacionResponsables_id = ${ubicacionResponsables_id} 
            WHERE id = ${id}";    
            $resultado = mysqli_query($db, $query);
            
            if ($resultado) {
                header('Location: /responsable.php');
            }             
        }            
    }
    incluirTemplate('header');
?>

<main class="contenedor">
    <?php foreach($error as $e) : ?>
        <div class="error alerta">
            <?php echo $e; ?>
        </div>
     <?php endforeach; ?> 
    <form class="formulario" method="POST">
        <fieldset class="tabla__color">
            <legend>Actualizar Responsable</legend>
            <div class="orden">
                <label for="">Nombre</label>
                <input type="text" placeholder="Nombre" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="orden">
                <label for="">Apellido</label>
                <input type="text" placeholder="Apellido" name="apellido" id="apellido" value="<?php echo $apellido; ?>">
            </div>
            <div class="orden">
                <label for="">Cargo</label>
                <input type="text" placeholder="Cargo" name="cargo" id="cargo" value="<?php echo $cargo; ?>">
            </div>
            <div class="orden">
                <label for="">Extencion</label>
                <input type="text" placeholder="Extencion" name="extencion" id="extencion" value="<?php echo $extencion; ?>">
            </div>
            <div class="orden">
                <label for="">Departamento</label>
                <select name="ubicacionResponsables_id">
                    <option  value="<?php echo $ubicacion['id']; ?>" ><?php echo $ubicacion['departamento']; ?></option> 
                        <?php while($dato = mysqli_fetch_assoc($optionDepartamento)) : ?>    
                            <option value="<?php echo $dato['id'];?>"> <?php echo $dato['departamento']; ?> </option>
                        <?php endwhile; ?>
                </select>               
            </div>            
            <input class="boton boton-eliminar" type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>