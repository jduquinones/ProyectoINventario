<?php
     require 'includes/funciones.php';
     $autenticacion = estaAutenticado();
     if(!$autenticacion){
         header('Location: login.php');
    }

    require 'includes/templates/header.php';
    require 'includes/config/database.php';

    $db = connectDB();

    $limpiarBuscar = '';

   
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

    $query = "SELECT * FROM responsables ";
    $resultado = mysqli_query($db, $query);
    $numeroFilas = $resultado->num_rows;
    $totalPaginas = ceil($numeroFilas / $tamañoPaginas);
    $anterior = $pagina - 1;
    $siguiente = $pagina + 1;

    $queryLimit = "SELECT * FROM responsables LIMIT $empezarDesde, $tamañoPaginas ";
    $resultadoLimit = mysqli_query($db, $queryLimit);
        
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            $query = "SELECT imagen FROM reponsables WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $dato = mysqli_fetch_assoc($resultado);

            $query = "DELETE FROM responsables WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            if ($resultado) {
               header('Location: index.php');
            }
        }
    }
?>

    <main class="contenedor">
        <div class="buscador">
           <form action="buscar.php" method="POST">
                <input type="text" name="buscar" placeholder="Ingrese Activo..." autocomplete="off" value="<?php echo $limpiarBuscar; ?>">
                <i class="fa-solid fa-magnifying-glass"></i> 
                <input class="buscar" type="submit" value="Buscar">          
           </form>
        </div>
        <table class="tabla tabla__color">
            <thead>
                <tr>
                    <th>Nombre Equipo</th>
                    <th>Area</th>
                    <th>Respoansable</th>
                    <th>Maquina</th>
                    <th>Ip</th>
                    <th>Sistema Operativo</th>
                    <th>serial</th>
                    <th>Extencion</th>
                    <th>Ofimatica</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($resultadoLimit)): ?>                                
               <tr> 
                    <td><?php echo $row['nombreEquipo']; ?></td>                    
                    <td><?php echo $row['area']; ?></td>
                    <td><?php echo $row['respoansable']; ?></td>
                    <td><?php echo $row['maquina']; ?></td>
                    <td><?php echo $row['ip']; ?></td>
                    <td><?php echo $row['sistemaOperativo']; ?></td>
                    <td><?php echo $row['serial']; ?></td>
                    <td><?php echo $row['extencion']; ?></td>
                    <td><?php echo $row['ofimatica']; ?></td>
                    <td class="accion">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="boton boton-eliminar" value="Eliminar">
                        </form>
                        <a class="boton boton-actualizar" href="actualizarEquipos.php?id=<?php echo $row['id']; ?>" >Actualizar</a>
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
    </main>      
    
<?php
    require 'includes/templates/footer.php';
?>