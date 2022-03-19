<?php     
    if (!isset($_SESSION)) {
        session_start();
    }
?>
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
                <li class="lista">
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

                <li class="lista">
                    <a class="activa "> <!--crearEquipo.php-->
                        <span class="icono"><ion-icon name="cog-outline"></ion-icon></span>
                        <span class="titulo">Configuracion</span>                            
                    </a> 
                    <ul>                            
                        <li class="lista desplegable-hijo">
                            <a href="gestionUsuario.php">
                                <span class="icono"><ion-icon name="people-circle-outline"></ion-icon></span>
                                <span class="titulo">Gestinar Usuario</span>
                            </a>
                        </li>
                            
                        <li class="lista desplegable-hijo">
                            <a href="crearUsuarios.php">
                                <span class="icono"><ion-icon name="person-add-outline"></ion-icon></span>
                                <span class="titulo">Crear Usuarios</span>
                                  
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="cerrar-sesion">
                    <a href="cerrar-sesion.php">
                        <span class="icono"><ion-icon name="log-out-outline"></ion-icon></span>    
                        <span class="titulo">Cerra Sesión</span>    
                    </a>   
                </li>
                <div class="indicador"></div>  
            </ul>      
        </nav>

        <div>
            <a href="">
                <picture>
                    <source srcset="build/img/logo.webp" type="image/webp">
                    <img loadin="lazy" src="build/img/logo.png" alt="Logo Macpollo">
                </picture>
            </a>
        </div>

        <div class="header__info">
            <p>Bienvenido: <span><?php echo $_SESSION['usuario']; ?></span></p>
            <p>Dti <span><?php echo $_SESSION['id']; ?></span></p>
            <p class="fecha-header" ><?php echo $fecha = date('d/m/Y'); ?></p>             
        </div>       
    </header>

    