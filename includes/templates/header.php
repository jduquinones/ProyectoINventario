
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
        <div class="menu-header">
            <svg class="menu" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="6" x2="20" y2="6" />
                <line x1="4" y1="12" x2="20" y2="12" />
                <line x1="4" y1="18" x2="20" y2="18" />
            </svg>
            <nav class="navegacion" >
                <a href="index.php">Ver Registros de Equipos</a>
                <a href="crearEquipo.php">Registrar Equipo</a>                
            </nav>
        </div>
        <div class="header__info">
            <p>Bienvenido: <span>xxxxxxxx</span></p>
            <p>Dti <span>Acopi</span></p>
            <p><?php echo $fecha = date('d/m/Y'); ?></p> 
            <div  class="cerrar-sesion">
                 <a href="">Cerra Sesión</a> 
            </div>
        </div>       
    </header>

    