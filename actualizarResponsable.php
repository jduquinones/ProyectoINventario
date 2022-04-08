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

    $query = "SELECT * FROM responsables WHERE id = ${id}";
    $resultadoConsulta = mysqli_query($db, $query);
    $dato = mysqli_fetch_assoc($resultadoConsulta);

    $queryEquipo = "SELECT * FROM equipos";
    $resultadoEquipo = mysqli_query($db, $queryEquipo);

    $queryUbicacion = "SELECT * FROM ubicacion";
    $resultadoUbicacion = mysqli_query($db, $queryUbicacion);

    $nombre = $dato['nombre'];
    $apellido = $dato['apellido'];
    $cargo = $dato['cargo'];  
    $equiposId = $dato['equiposId'];  
    $responsablesId = $dato['responsablesId'];  

    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
        $cargo = mysqli_real_escape_string($db, $_POST['cargo']);
        $equiposId = mysqli_real_escape_string($db, $_POST['equiposId']);
        $responsablesId = mysqli_real_escape_string($db, $_POST['responsablesId']);
        

        if (empty($error)) { 
            $query = "UPDATE responsables
            SET nombre = '${nombre}', apellido = '${apellido}', cargo = '${cargo}', equiposId = ${equiposId}, responsablesId = ${responsablesId} WHERE id = ${id}";    
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
                <label for="">cargo</label>
                <input type="text" placeholder="cargo" name="cargo" id="cargo" value="<?php echo $cargo; ?>">
            </div>
            <div class="orden">
                <label for="">Equipo Asignado</label>
                <select name="equiposId"">
                    <option disabled selected>-- Seleccion --</option>
                    <?php while( $row = mysqli_fetch_assoc($resultadoEquipo)) : ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['serial']; ?></option>
                    <?php endwhile;?>
                </select>               
            </div>
            <div class="orden">
                <label for="">Area Asignada</label>
                <select name="responsablesId"">
                    <option disabled selected>-- Seleccion --</option>
                    <div>
                        <?php while( $row = mysqli_fetch_assoc($resultadoUbicacion)) : ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['departamento']; ?></option>
                        <?php endwhile;?>
                    </div>
                </select>               
            </div>
            <input class="boton boton-eliminar" type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>