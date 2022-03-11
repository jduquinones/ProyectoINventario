
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="/build/css/app.css">   
</head>
<body>
    <header class="header">
            <nav class="navegacion" >
                <ul>
                    <li class="lista activo">
                        <a class="activa" href="index.php"> <!--index.php-->
                            <span class="icono"><ion-icon name="eye-outline"></ion-icon></span>
                            <span class="titulo">Ver Equipos</span>
                        </a>
                    </li>

                    <li class="lista ">
                        <a class="activa" href="crearEquipo.php"> <!--crearEquipo.php-->
                            <span class="icono"><ion-icon name="server-outline"></ion-icon></span>
                            <span class="titulo">Registrar Equipo</span>
                        </a>  
                    </li>

                    <li class="cerrar-sesion">
                        <a href="">
                            <span class="icono"><ion-icon name="log-out-outline"></ion-icon></span>    
                            <span class="titulo">Cerra Sesión</span>    
                        </a>   
                    </li>
                    <div class="indicador"></div>  
                </ul>      
            </nav>
        <div class="header__info">
            <p>Bienvenido: <span>xxxxxxxx</span></p>
            <p>Dti <span>Acopi</span></p>
            <p><?php echo $fecha = date('d/m/Y'); ?></p>             
        </div>       
    </header>

    