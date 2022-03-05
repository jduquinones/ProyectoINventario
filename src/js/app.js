document.addEventListener('DOMContentLoaded', function() {
    menuheader();
    ampliarImagen();

})

// Coloca una clase al dar clic en el menu, esto para hacer el efecto en el que aparace 'Registrar Equipo'
function menuheader(){
    menu = document.querySelector('.menu');
    menu.addEventListener('click', desplegar);

    function desplegar() {
        const verclase = document.querySelector('.navegacion');
        verclase.classList.toggle('mostrar');
    }
}

function ampliarImagen(id){


    var imagen = document.querySelectorAll('resultado-imagen');
    imagen = document.images;

    imagen.innerHTML = imagen[0].src;

    const overlay = document.createElement('DIV');
    overlay.appendChild(imagen[0]);
    overlay.classList.add('overlay');

    const body = document.querySelector('body');
    body.appendChild(overlay);
    
}