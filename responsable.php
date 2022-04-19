<?php
    
    require 'includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: login.php');
    }

    require 'includes/config/database.php';   
    $db = connectDB();

    $buscar = true;
    $error = [];
   
    //******Paginacion**********// 

    $tamañoPaginas = 10;
    
    if (isset($_GET['pagina'])) {
        if ($_GET['pagina'] === 1) {
            header('Location: index.php');        
        }else {
            $pagina = $_GET['pagina'];
        }
    }else {
        $pagina = 1;
    }
    $empezarDesde = ($pagina -1) * $tamañoPaginas;

    $query = "SELECT r.id, r.nombre, r.apellido, r.cargo, u.area, u.centro, u.departamento, e.ip, e.sistemaOperativo, e.serial, r.extencion, e.ofimatica, e.activo, e.marca, e.modelo, e.nombreEquipo, r.ubicacionResponsables_id  
    FROM responsables AS r 
    LEFT JOIN ubicacion AS u 
        ON r.ubicacionResponsables_id = u.id
    LEFT JOIN equipos AS e 
        ON r.ubicacionResponsables_id = e.idEquipos";
        
    $resultado = mysqli_query($db, $query);
    $numeroFilas = $resultado->num_rows;
    $totalPaginas = ceil($numeroFilas / $tamañoPaginas);
    $anterior = $pagina - 1;
    $siguiente = $pagina + 1;

    $queryLimit = "SELECT r.id, r.nombre, r.apellido, r.cargo, u.area, u.centro, u.departamento, e.ip, e.sistemaOperativo, e.serial, r.extencion, e.ofimatica, e.activo, e.marca, e.modelo, e.nombreEquipo, r.ubicacionResponsables_id  
    FROM responsables AS r 
    LEFT JOIN ubicacion AS u 
        ON r.ubicacionResponsables_id = u.id
    LEFT JOIN equipos AS e 
        ON r.ubicacionResponsables_id = e.idEquipos
    LIMIT $empezarDesde, $tamañoPaginas ";

    $resultado = mysqli_query($db, $queryLimit);
        
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {        

        if ( empty($_POST['buscar']) ) {
            $buscar = false;
            $error[] = 'Debe ingresar un dato';
        }elseif ($_POST['buscar']) {

            $buscar = $_POST['buscar'];
            
            if ($buscar) {
                $query = "SELECT r.id, r.nombre, r.apellido, r.cargo, u.area, u.centro, u.departamento, e.ip, e.sistemaOperativo, e.serial, r.extencion, e.ofimatica, e.activo, e.marca, e.modelo, e.nombreEquipo  
                FROM responsables AS r 
                LEFT JOIN ubicacion AS u 
                    ON r.ubicacionResponsables_id = u.id
                LEFT JOIN equipos AS e 
                    ON r.ubicacionResponsables_id = e.idEquipos
                WHERE nombre LIKE '%${buscar}%' OR apellido LIKE '%${buscar}%' OR cargo LIKE '%${buscar}%' OR area LIKE '%${buscar}%' OR centro LIKE '%${buscar}%' OR departamento LIKE '%${buscar}%' OR ip LIKE '%${buscar}%' OR sistemaOperativo LIKE '%${buscar}%' OR serial LIKE '%${buscar}%' OR extencion LIKE '%${buscar}%' OR ofimatica LIKE '%${buscar}%' OR activo LIKE '%${buscar}%' OR marca LIKE '%${buscar}%' OR modelo LIKE '%${buscar}%' OR extencion LIKE '%${buscar}%'";     

                $resultado = mysqli_query($db, $query);              

                if ($resultado->num_rows) {
                    $resultado;
                }else {

                    $buscar = false;
                    $error[] = 'No se encontraron datos';
                }
            }
        }

        if (  isset($_POST['id'])) {            
            $id = $_POST['id'];             
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $query = "DELETE FROM responsables WHERE id = ${id}";

                $resultado = mysqli_query($db, $query);
                if ($resultado) {
                header('Location: responsable.php');
                }
            }
        }
    }
    incluirTemplate('header');
?>

    <main class="contenedor">
        <div class="buscador">
           <form method="POST">
                <input type="text" name="buscar" placeholder="Ingrese Activo..." autocomplete="off" >
                <i class="fa-solid fa-magnifying-glass"></i> 
                <input class="buscar" type="submit" value="Buscar">          
           </form>
        </div>
        <?php foreach($error as $e) : ?>
        <p class="error"><?php echo $e; ?></p>
        <?php endforeach; ?>
        <?php if ($buscar) { ?>
        <table class="tabla tabla__color">
            <thead>
                <tr>
                    <th>Nombre Responsable</th>
                    <th>Cargo</th>                    
                    <th>Area</th>  
                    <th>Extencion</th>                  
                    <th>Centro</th>                    
                    <th>Departamento</th>                    
                    <th>Ip</th>                    
                    <th>Sistema Operativo</th>                    
                    <th>Serial</th>                    
                    <th>Extencion</th>                    
                    <th>Ofimatica</th>                    
                    <th>Activo</th>                    
                    <th>Marca</th>                    
                    <th>Modelo</th>                    
                    <th>Nombre Equipo</th>                    
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($resultado)): ?> 
               <tr> 
                    <td><?php echo $row['nombre'] . " " . $row['apellido']; ?></td>    
                    <td><?php echo $row['cargo']; ?></td>
                    <td><?php echo $row['area']; ?></td>
                    <td><?php echo $row['extencion']; ?></td>
                    <td><?php echo $row['centro']; ?></td>
                    <td><?php echo $row['departamento']; ?></td>
                    <td><?php echo $row['ip']; ?></td>
                    <td><?php echo $row['sistemaOperativo']; ?></td>
                    <td><?php echo $row['serial']; ?></td>
                    <td><?php echo $row['extencion']; ?></td>
                    <td><?php echo $row['ofimatica']; ?></td>
                    <td><?php echo $row['activo']; ?></td>
                    <td><?php echo $row['marca']; ?></td>
                    <td><?php echo $row['modelo']; ?></td>
                    <td><?php echo $row['nombreEquipo']; ?></td>
                    <td class="accion">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="boton boton-eliminar" value="Eliminar">
                        </form>
                        <a class="boton boton-actualizar" href="actualizarResponsable.php?id=<?php echo $row['id']; ?>" >Actualizar</a>
                    </td>                    
               </tr>               
               <?php endwhile; ?>
            </tbody>
        </table>
        <?php }?> 
        <table class="paginador">
            <tbody>
                <tr>
                    <td>
                        <span class="anterior"> <?php echo "<a href=' ?pagina=" . $anterior . "'>Anterior</a>" ?> </span>
                    </td>                
                    <?php for ($i=1; $i < $totalPaginas; $i++) : ?>                   
                    <td>
                        <span class="pagina"> <?php echo  "<a href='?pagina=" . $i ."'>" . $i . "</a>" ?></span>
                    </td>
                    <?php endfor ;?>  
                    <td>
                        <span class="siguiente"><?php echo "<a href=' ?pagina=" . $siguiente . "'>Siguiente</a>" ?></span>
                    </td>
                </tr>            
            </tbody>            
        </table>
        <div class="datos__registros">
            <p>Cantidad total de registros: <span> <?php echo $numeroFilas; ?> </span></p>
        </div>
    </main>      
    
<?php
    require 'includes/templates/footer.php';
?>