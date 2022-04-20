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

    $query = "SELECT * FROM ubicacion ";
    $resultado = mysqli_query($db, $query);
    $numeroFilas = $resultado->num_rows;
    $totalPaginas = ceil($numeroFilas / $tamañoPaginas);
    $anterior = $pagina - 1;
    $siguiente = $pagina + 1;

    $queryLimit = "SELECT * FROM ubicacion LIMIT $empezarDesde, $tamañoPaginas ";
    $resultado = mysqli_query($db, $queryLimit);
        
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if ( empty($_POST['buscar']) ) {
            $buscar = false;
            $error[] = 'Debe ingresar un dato';
        }elseif ($_POST['buscar']) {

            $buscar = $_POST['buscar'];
            
            if ($buscar) {
                $query = "SELECT * FROM ubicacion WHERE centro LIKE '%${buscar}%' OR area LIKE '%${buscar}%' OR departamento LIKE '%${buscar}%'";                
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
            $error = [];
    
            if ($id) {

                $query = "SELECT serial FROM equipos WHERE idUbicacion = ${id}";
                $consulta = mysqli_query($db, $query);
                $dato = mysqli_fetch_assoc($consulta);                
                $serial = $dato['serial'];

                if (!$consulta -> num_rows) {  
                    $query = "DELETE FROM ubicacion WHERE id = ${id}";
                    $consulta = mysqli_query($db, $query);
                    if ($consulta) {
                    header('Location: ubicacion.php');
                    }
                }else {
                    $error[] = "No se puede eliminar ya que el serial: ${serial}  esta asignado a un equipo,  elimine el equipo y vuelva a intentarlo";
                }
            }
        }
    }
    incluirTemplate('header');
?>

    <main class="contenedor">
        <div class="buscador">
           <form method="POST">
                <input type="text" name="buscar" placeholder="Ingrese Activo..." autocomplete="off">
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
                    <th>Centro</th>
                    <th>Area</th>
                    <th>Departamento</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($resultado)): ?>                                
               <tr> 
                    <td><?php echo $row['centro']; ?></td>                    
                    <td><?php echo $row['area']; ?></td>
                    <td><?php echo $row['departamento']; ?></td>
                    <td class="accion">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="boton boton-eliminar" value="Eliminar">
                        </form>
                        <a class="boton boton-actualizar" href="actualizarUbicacion.php?id=<?php echo $row['id']; ?>" >Actualizar</a>
                    </td>                    
               </tr>               
               <?php endwhile; ?>
            </tbody>
        </table>
         
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
        <?php }?>
    </main>      
    
<?php
    require 'includes/templates/footer.php';
?>