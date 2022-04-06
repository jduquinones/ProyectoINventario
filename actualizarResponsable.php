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

    $nombreEquipo = $dato['nombreEquipo'];
    $area = $dato['area'];
    $responsable = $dato['responsable'];
    $tipo = $dato['tipo'];
    $ip = $dato['ip'];
    $sistemaOperativo = $dato['sistemaOperativo'];    
    $serial = $dato['serial'];    
    $extencion = $dato['extencion'];    
    $ofimatica = $dato['ofimatica'];    

    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombreEquipo = mysqli_real_escape_string($db, $_POST['nombreEquipo']);
        $area = mysqli_real_escape_string($db, $_POST['area']);
        $responsable = mysqli_real_escape_string($db, $_POST['responsable']);
        $tipo = mysqli_real_escape_string($db, $_POST['tipo']);
        $ip = mysqli_real_escape_string($db, $_POST['ip']);
        $sistemaOperativo = mysqli_real_escape_string($db, $_POST['sistemaOperativo']);    
        $serial = mysqli_real_escape_string($db, $_POST['serial']);    
        $extencion = mysqli_real_escape_string($db, $_POST['extencion']);    
        $ofimatica = mysqli_real_escape_string($db, $_POST['ofimatica']);  

        if (empty($error)) { 
            $query = "UPDATE responsables SET nombreEquipo = '${nombreEquipo}', area = '${area}', responsable = '${responsable}', tipo = '${tipo}', ip = '${ip}', sistemaOperativo = '${sistemaOperativo}', serial = '${serial}', extencion = '${extencion}', ofimatica = '${ofimatica}' WHERE id = ${id}";    
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
                <label for="">Nombre Equipo</label>
                <input type="text" placeholder="Nombre del Equipo" name="nombreEquipo" id="nombreEquipo" value="<?php echo $nombreEquipo; ?>">
            </div>
            <div class="orden">
                <label for="">Area</label>
                <input type="text" placeholder="Area" name="area" id="area" value="<?php echo $area; ?>">
            </div>
            <div class="orden">
                <label for="">Responsable</label>
                <input type="text" placeholder="Responsable" name="responsable" id="responsable" value="<?php echo $responsable; ?>">
            </div>
            <div class="orden">
                <label for="">Tipo</label>
                <input type="text" placeholder="Tipo" name="tipo" id="tipo" value="<?php echo $tipo; ?>">
            </div>
            <div class="orden">
                <label for="">Ip</label>
                <input type="tel" placeholder="Ip" name="ip" id="ip" value="<?php echo $ip; ?>">
            </div>
            <div class="orden">
                <label for="">Sistema Operativo</label>
                <input type="text" placeholder="sistemaOperativo" name="sistemaOperativo" id="sistemaOperativo" value="<?php echo $sistemaOperativo; ?>">
            </div>
            <div class="orden">
                <label for="">Serial</label>
                <input type="text" placeholder="serial" name="serial" id="serial" value="<?php echo $serial; ?>">
            </div>
            <div class="orden">
                <label for="">Extencion</label>
                <input type="text" placeholder="extencion" name="extencion" id="extencion" value="<?php echo $extencion; ?>">
            </div>
            <div class="orden">
                <label for="">Ofimatica</label>
                <input type="text" placeholder="ofimatica" name="ofimatica" id="ofimatica" value="<?php echo $ofimatica; ?>">
            </div>
            <input class="boton boton-eliminar" type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>