<?php

    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }

    require 'includes/config/database.php';  
    $db = connectDB();
        
    $centro = '';
    $area = '';
    $descripcion = '';

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $centro = mysqli_real_escape_string($db, $_POST['centro']);
        $area = mysqli_real_escape_string($db, $_POST['area']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);

        $query = "INSERT INTO ubicacion (centro, area, descripcion) VALUES ('${centro}', '${area}', '${descripcion}')";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {            
            $centro = '';
            $area = '';
            $descripcion = '';
        } 
   }
   incluirTemplate('header');
?>

<main class="contenedor">
    <form class="formulario" method="POST">
        <fieldset class="tabla__color">
            <legend>Informacion General</legend>
            <div class="orden">
                <label for="">Centro</label>
                <input type="text" placeholder="Centro" name="centro" id="centro" value="<?php echo $centro; ?>">
            </div>
            <div class="orden">
                <label for="">Area</label>
                <input type="text" placeholder="Area" name="area" id="area" value="<?php echo $area; ?>">
            </div>   
            <div class="orden">
                <label for="">Descripcion</label>
                <input type="text" placeholder="Descripcion" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>">
            </div>          
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>