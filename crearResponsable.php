<?php

    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }

    require 'includes/config/database.php';
    $db = connectDB();
        
    // Se crean los datos vacios para que al enviarse a la base de datos no se envie lo que esta en el place holder    
    $nombre = '';
    $apellido = '';
    $cargo = '';
    $equiposId = '';
    $responsablesId = '';

    $queryEquipo = "SELECT * FROM equipos";
    $resultadoEquipo = mysqli_query($db, $queryEquipo);

    $queryUbicacion = "SELECT * FROM ubicacion";
    $resultadoUbicacion = mysqli_query($db, $queryUbicacion);

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
        $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
        $cargo = mysqli_real_escape_string($db, $_POST['cargo']);
        $equiposId = mysqli_real_escape_string($db, $_POST['equiposId']);
        $responsablesId = mysqli_real_escape_string($db, $_POST['responsablesId']);

        $query = "INSERT INTO responsables (nombre, apellido, cargo, equiposId, responsablesId) VALUES ('${nombre}','${apellido}','${cargo}', ${equiposId}, ${responsablesId})";

        $resultado = mysqli_query($db, $query);        
        if ($resultado) {            
            $nombre = '';
            $apellido = '';
            $cargo = '';
            $equiposId = '';
            $responsablesId = '';
        } 
   }
   incluirTemplate('header');
?>

<main class="contenedor">
    <form class="formulario" method="POST">
        <fieldset class="tabla__color">
            <legend>Informacion General</legend>
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
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>