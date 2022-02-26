<?php
    require 'includes/templates/header.php';
?>

    <main class="contenedor">
        <table class="tabla">
            <thead>
                <tr>
                <th>Activo fijo</th>
                <th>Número de serie</th>
                <th>Número de inventario</th>
                <th>Denominación del activo fijo</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Accion</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                <td>110078</td>
                <td>523121</td>
                <td>5498</td>
                <td>INDICADOR USA GSE-350</td>
                <td></td>
                <td>Este es una pruebaa</td>
                <td class="accion">
                    <a class="boton boton-actualizar" href="#">Actualizar</a>
                    <a class="boton boton-eliminar" href="#">Eliminar</a>                    
                </td>
               </tr>
            </tbody>
        </table>
    </main>
        
    <script src="js/tabla.js"></script>
    
<?php
    require 'includes/templates/footer.php';
?>