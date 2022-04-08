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
    $departamento = '';
    $extencion = '';

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $centro = mysqli_real_escape_string($db, $_POST['centro']);
        $area = mysqli_real_escape_string($db, $_POST['area']);
        $departamento = mysqli_real_escape_string($db, $_POST['departamento']);
        $extencion = mysqli_real_escape_string($db, $_POST['extencion']);

        $query = "INSERT INTO ubicacion (centro, area, departamento, extencion) VALUES ('${centro}', '${area}', '${departamento}', '${extencion}')";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {            
            $centro = '';
            $area = '';
            $departamento = '';
            $extencion = '';
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
                <label for="">Departamento</label>
                <input type="text" placeholder="Departamento" name="departamento" id="departamento" value="<?php echo $departamento; ?>">
            </div> 
            <div class="orden">
                <label for="">Extencion</label>
                <input type="text" placeholder="Extencion" name="extencion" id="extencion" value="<?php echo $extencion; ?>">
            </div>         
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>