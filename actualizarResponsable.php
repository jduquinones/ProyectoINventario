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

    $nombre = $dato['nombre'];
    $apellido = $dato['apellido'];
    $cargo = $dato['cargo']; 

    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
        $responsable = mysqli_real_escape_string($db, $_POST['responsable']);
        $cargo = mysqli_real_escape_string($db, $_POST['cargo']);

        if (empty($error)) { 
            $query = "UPDATE responsables SET nombre = '${nombre}', apellido = '${apellido}', cargo = '${cargo}' WHERE id = ${id}";    
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
            <input class="boton boton-eliminar" type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>