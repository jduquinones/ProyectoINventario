document.addEventListener('DOMContentLoaded', function(){
    menuheader();
    ampliarImagen();
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

function ampliarImagen(id){

    img = `${id}`;
    var imagen = [document.querySelectorAll('.resultado-imagen')];
    
    imagen.onclick = trae(img);

    function trae(img) {

        imagen = document.images;
        imagen.innerHTML = imagen.src;   
        
        for (let i = 0; i < imagen.length; i++) {

            if (imagen.item(i).src.includes(img)) {
                const overlay = document.createElement('DIV');
                overlay.appendChild(imagen[i]);
                overlay.classList.add('overlay');   
                const body = document.querySelector('body');
                body.appendChild(overlay);

                const x = document.createElement('P');
                x.textContent = 'X';
                x.classList.add('cerrar');
                overlay.appendChild(x);
                x.onclick = function() {
                    x.classList.remove();
                    x.remove();

                    overlay.classList.remove();
                    overlay.remove();
                    
                }


            }            
        }        
    }
}     