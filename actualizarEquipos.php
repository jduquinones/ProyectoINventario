<?php

    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }
    
    $id = $_GET['id'];    
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: index.php');
    }

    require 'includes/config/database.php';
    $db = connectDB(); 

    $query = "SELECT e.id, e.tipo, e.ip, e.sistemaOperativo, e.serial, e.ofimatica, e.activo, e.imagen, e.marca, e.modelo, e.nombreEquipo, u.departamento FROM equipos e 
    JOIN ubicacion u 
        ON e.idUbicacion = u.id
    WHERE e.id = ${id}";        
    $resultadoConsulta = mysqli_query($db, $query);
    $dato = mysqli_fetch_assoc($resultadoConsulta);

    $depatamento = "SELECT u.id, u.departamento 
    FROM  ubicacion u
    LEFT JOIN equipos e 
    ON u.id = e.idUbicacion
    WHERE e.id = ${id}";
    $resultadoDepartamento = mysqli_query($db, $depatamento);
    $ubicacion = mysqli_fetch_assoc($resultadoDepartamento);

    $option = "SELECT * FROM  ubicacion ";
    $optionDepartamento = mysqli_query($db, $option);

    $tipo = $dato['tipo'];
    $ip = $dato['ip'];
    $sistemaOperativo = $dato['sistemaOperativo'];
    $serial = $dato['serial'];
    $ofimatica = $dato['ofimatica'];
    $activo = $dato['activo'];
    $marca = $dato['marca'];
    $modelo = $dato['modelo'];
    $nombreEquipo = $dato['nombreEquipo'];

    $error = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $tipo = mysqli_real_escape_string($db, $_POST['tipo']);
        $ip = mysqli_real_escape_string($db, $_POST['ip']);
        $sistemaOperativo = mysqli_real_escape_string($db, $_POST['sistemaOperativo']);
        $serial = mysqli_real_escape_string($db, $_POST['serial']);
        $ofimatica = mysqli_real_escape_string($db, $_POST['ofimatica']);
        $activo = mysqli_real_escape_string($db, $_POST['activo']);
        $marca = mysqli_real_escape_string($db, $_POST['marca']);    
        $modelo = mysqli_real_escape_string($db, $_POST['modelo']);    
        $nombreEquipo = mysqli_real_escape_string($db, $_POST['nombreEquipo']); 
        $idUbicacion = mysqli_real_escape_string($db, $_POST['idUbicacion']);    
       
        // Crear carpeta
        $carpetaImagen = 'imagenesSubmit/';
        if (!is_dir($carpetaImagen)) {
            mkdir($carpetaImagen);
        }

        $nombreImagen = '';
        $imagen = $_FILES['imagen'];

        // Elimina la imgaen que esta en el servidor en caso de que se actulice 
        if ($imagen['name']) {
            unlink($carpetaImagen . $dato['imagen']);

            //Generar nombre unico a la imagen
            $nombreImagen = md5(uniqid(rand(), true )) . ".jpg";

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagen . $nombreImagen);
        }else {
            $nombreImagen =  $dato['imagen'];
        }  
        
        // Maximo tamaño de la imagen
        $tamañoImagen = 100 * 5000;
        if ($imagen['size'] > $tamañoImagen) {
            $error[] = 'La imagen es muy pesada';
        }

        $query = "UPDATE equipos SET tipo = '${tipo}', ip = '${ip}', sistemaOperativo = '${sistemaOperativo}', serial = '${serial}', ofimatica = '${ofimatica}', activo = '${activo}', imagen = '${nombreImagen}', marca = '${marca}', modelo = '${modelo}', nombreEquipo = '${nombreEquipo}', idUbicacion = '${idUbicacion}' WHERE id = ${id}";    
       
        $resultado = mysqli_query($db, $query);   
        if ($resultado) {
            header('Location: index.php');
        }     
    }
    incluirTemplate('header');
?>

<main class="contenedor">
    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset class="tabla__color">
            <legend>Actualizar Equipos</legend>
            <div class="orden">
                <label for="">Tipo</label>
                <input type="text" placeholder="Tipo de Equipo" name="tipo" id="tipo" value="<?php echo $tipo; ?>">
            </div>
            <div class="orden">
                <label for="">Ip</label>
                <input type="text" placeholder="Numero de Ip" name="ip" id="ip" value="<?php echo $ip; ?>">
            </div>
            <div class="orden">
                <label for="">Sistema Operativo</label>
                <input type="text" placeholder="Sistema Operativo" name="sistemaOperativo" id="sistemaOperativo" value="<?php echo $sistemaOperativo; ?>">
            </div>
            <div class="orden">
                <label for="">Serial</label>
                <input type="text" placeholder="Serial" name="serial" id="serial" value="<?php echo $serial; ?>">
            </div>
            <div class="orden">
                <label for="">Ofimatica</label>
                <input type="text" placeholder="Ofimatica del Equipo" name="ofimatica" id="ofimatica" value="<?php echo $ofimatica; ?>">
            </div>
            <div class="orden">
                <label for="">Activo</label>
                <input type="text" placeholder="Activo del Equipo" name="activo" id="activo" value="<?php echo $activo; ?>">
            </div>
            <div class="orden bloque">
                <label for="">Imagen</label>
                <input class="ancho"  type="file" name="imagen" id="imagen" accept="image/jpg, image/png">
                <img src="imagenesSubmit/<?php echo $imagen ;?>" class="imagen-small" alt="">
            </div>
            <div class="orden">
                <label for="">Marca</label>
                <input name="marca" placeholder="Marca" id="marca" value="<?php echo $marca; ?>"></input>
            </div>
            <div class="orden">
                <label for="">Modelo</label>
                <input name="modelo" placeholder="Marca" id="modelo" value="<?php echo $modelo; ?>"></input>
            </div>
            <div class="orden">
                <label for="">Nombre Equipo</label>
                <input name="nombreEquipo" placeholder="Nombre Equipo" id="nombreEquipo" value="<?php echo $nombreEquipo; ?>"></input>
            </div>
            <div class="orden">
                <label for="">Departamento</label>
                <select name="idUbicacion"">
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