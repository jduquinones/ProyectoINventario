document.addEventListener('DOMContentLoaded', function(){
    menuheader();
   
});

// Coloca una clase al dar clic en el menu, esto para hacer el efecto en el que aparace 'Registrar Equipo'
function menuheader(){
    menu = document.querySelector('.menu');
    menu.addEventListener('click', desplegar);

    function desplegar() {
        const verclase = document.querySelector('.navegacion');
        verclase.classList.toggle('mostrar');
    }
}

// Funcion que me realiza un overlay
function ampliarImagen(id){

    img = `${id}`;
    const contenedor = document.querySelectorAll('.resultado-imagen');   

    contenedor.onclick = trae()
}  

function trae(){
    const div = document.createElement('DIV');    
    const imagen = document.createElement('IMG');
    imagen.setAttribute('src', img);
    div.appendChild(imagen);   
    div.classList.add('overlay'); 
    // Boton para cerrar el Modal 
    const cerrarModal = document.createElement('P');
    cerrarModal.textContent = 'X';
    cerrarModal.classList.add('btn-cerrar');
    cerrarModal.onclick = function(){
        div.remove();
    }
    div.appendChild(cerrarModal);    

    const body = document.querySelector('body');
    body.appendChild(div);
   
}