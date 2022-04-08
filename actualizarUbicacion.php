<?php

    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: ubicacion.php');
    }

    $id = $_GET['id'];    
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: index.php');
    }

    require 'includes/config/database.php';   
    $db = connectDB(); 

    $query = "SELECT * FROM ubicacion WHERE id = ${id}";
    $resultadoConsulta = mysqli_query($db, $query);
    $dato = mysqli_fetch_assoc($resultadoConsulta);

    $centro = $dato['centro'];
    $area = $dato['area'];
    $departamento = $dato['departamento'];
    $extencion = $dato['extencion'];
    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $centro = mysqli_real_escape_string($db, $_POST['centro']);
        $area = mysqli_real_escape_string($db, $_POST['area']);
        $departamento = mysqli_real_escape_string($db, $_POST['departamento']);
        $extencion = mysqli_real_escape_string($db, $_POST['extencion']);
        if (empty($error)) { 
            $query = "UPDATE ubicacion SET centro = '${centro}', area = '${area}', departamento = '${departamento}', extencion = '${extencion}' WHERE id = ${id}";    
            $resultado = mysqli_query($db, $query);   
            
            if ($resultado) {
                header('Location: ubicacion.php');
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
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset class="tabla__color">
            <legend>Actualizar Ubicaciones</legend>
            <div class="orden">
                <label for="">Centro</label>
                <input type="text" name="centro" id="centro" value="<?php echo $centro ;?>" >
            </div>
            <div class="orden">
                <label for="">Area</label>
                <input type="text" name="area" id="area" value="<?php echo $area ;?>" >
            </div>
            <div class="orden">
                <label for="">Departamento</label>
                <input type="text" name="Departamento" id="departamento" value="<?php echo $departamento ;?>">
            </div>
            <div class="orden">
                <label for="">Extencion</label>
                <input type="text" name="extencion" id="extencion" value="<?php echo $extencion ;?>">
            </div>
            <input class="boton boton-eliminar" type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>