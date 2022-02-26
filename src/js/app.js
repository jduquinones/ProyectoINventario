document.addEventListener('DOMContentLoaded', function() {
    menuheader();

})

// Coloca una clase al dar clic en el menu, esto para hacer el efecto en el que aparace 'Registrar Equipo'
function menuheader(){
    menu = document.querySelector('.menu');
    menu.addEventListener('click', desplegar);

    function desplegar() {
        console.log('si despliega')
        const verclase = document.querySelector('.navegacion');
        verclase.classList.toggle('mostrar');
    }
}