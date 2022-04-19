document.addEventListener('DOMContentLoaded', function(){
   
});

// Funcion que me realiza un overlay
function ampliarImagen(id){

    img = `${id}`;
    const contenedor = document.querySelectorAll('.resultado-imagen');   

    contenedor.onclick = trae()
}  

function trae(){
    const div = document.createElement('DIV');    
    const imagen = document.createElement('IMG');
    imagen.setAttribute('src',` imagenesSubmit/${img}`);
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