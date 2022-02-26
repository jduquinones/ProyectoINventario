<!DOCTYPE html>
<html lang="es" class="background-color">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/build/css/app.css">   
</head>
<body class="contenido  background-color bg-login">
    <main class="contenido__login contenedor">
        <div class="contenido__imagen">
            <picture>
                <source srcset="build/img/inventory-management-system.webp" type="imagen/webp">
                <img  loadin="lazy" src="build/img/inventory-management-system.png" alt="Imagen login">
            </picture>
        </div>
        <div class="contenido__formulario">
            <form action="" class="formulario">
                <legend>
                    Bienvenido 
                </legend>
                <div class="formulario__border">  
                    <div class="formulario__input" >
                        <input id="correo" class="formulario__input--no" type="text" placeholder="Usuario*">
                    </div>

                    <div class="formulario__input">
                        <input id="contraseña" class="formulario__input--no" type="password" placeholder="Contraseña*">
                    </div>                
                </div>
                <div class="formulario__submit">
                    <input class="formulario__submit--cambio" type="submit" value="Ingresar">
                </div>             
            </form>
        </div>       
    </main> 
    <script src="ingreso.js"></script>
</body>
</html>