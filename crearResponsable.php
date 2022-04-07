<?php

    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }

    require 'includes/config/database.php';
    $db = connectDB();
        
    // Se crean los datos vacios para que al enviarse a la base de datos no se envie lo que esta en el place holder    
    $nombreEquipo = '';
    $area = '';
    $responsable = '';
    $tipo = '';
    $ip = '';
    $sistemaOperativo = '';    
    $serial = '';    
    $extencion = '';   
    $ofimatica = '';

    // convierte el value del input a una cadena legal para la base de datos, este dato lo captura de $_POST el cual es un metodo post

    // echo $_SERVER (Comparamos este metodo para cuando sea igual a post realice los pasos que estan en el if)
    
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

        $query = "INSERT INTO responsables (nombreEquipo, area, responsable, tipo, ip, sistemaOperativo, serial, extencion, ofimatica  ) VALUES ('${nombreEquipo}','${area}','${responsable}', '${tipo}', '${ip}', '${sistemaOperativo}', '${serial}', '${extencion}', '${ofimatica}')";
        
        $resultado = mysqli_query($db, $query);
        if ($resultado) {            
            $nombreEquipo = '';
            $area = '';
            $respoansable = '';
            $tipo = '';
            $ip = '';
            $sistemaOperativo = '';
            $serial = '';
            $extencion = '';
            $ofimatica = '';
        } 
   }
   incluirTemplate('header');
?>

<main class="contenedor">
    <form class="formulario" method="POST">
        <fieldset class="tabla__color">
            <legend>Informacion General</legend>
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
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</main>

<?php
    require 'includes/templates/footer.php';
?>