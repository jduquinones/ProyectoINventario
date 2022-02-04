function ingreso (correo, contraseña){
    if (correo == "correo@correo.com" && contraseña == "123..") {
       let ingreso = document.createElement(<a></a>);
       ingreso.ssetAttribute("src", "principal.html");

       let pagina = document.getElementsByClassName(formulario__border);
       ingreso.appenChild(pagina);
       
       console.log("bn")
    }else {
        console.log("Contraseña o Correo Incorrecto")
    }
}

