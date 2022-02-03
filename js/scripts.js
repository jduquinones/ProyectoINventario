// creando tabla 
let table = document.createElement('table');
let thead = document.createElement('thead');
let tbody =document.createElement('tbody');

table.appendChild(thead);
table.appendChild(tbody);

document.getElementById('contenido__table').appendChild(table);

// creando la fila del encabezado y los nombres de cada una de ellas

let fila_1 = document.createElement('tr');
let encabezado_1 = document.createElement('th');
encabezado_1.innerHTML = "Area";
let encabezado_2 = document.createElement('th');
encabezado_2.innerHTML = "Equipo";
let encabezado_3 = document.createElement('th');
encabezado_3.innerHTML = "Serial";
let encabezado_4 = document.createElement('th');
encabezado_4.innerHTML = "Activo Fijo";
let encabezado_5 = document.createElement('th');
encabezado_5.innerHTML = "imagen";

//se creo el texto del encabezado  y se coloco el encabezado en la fila
fila_1.append(encabezado_1);
fila_1.append(encabezado_2);
fila_1.append(encabezado_3);
fila_1.append(encabezado_4);
fila_1.append(encabezado_5);

// se coloco la fila del encabezado
thead.appendChild(fila_1);


// AGrego 10 filas y 4 columnas automaticamente
for (let j = 0; j < 10; j++) {
  let tbody_tr = document.createElement('tr');
  for (let i = 0; i <5; i++) {
    let dato_1 = document.createElement('td');
    dato_1.innerHTML = "q";
    tbody_tr.appendChild(dato_1);
    tbody.appendChild(tbody_tr);
  }
}

