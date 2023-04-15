//Compruebo si las colixiones son true o false
if(typeof shock === 'undefined' || shock === null || shock === ''){
    var result = false
}else{
    var result = true;
}


var result_print = document.getElementById('result_print');
var msg_result = document.getElementById('msg_result');
var coordinates2 = document.getElementById('coordinates');
var coordinates3 = document.getElementById('coordinates_result');
//Transformo las cadenas en arrays
piece1Complete = piece1Complete.split(',');
piece2Complete = piece2Complete.split(',');
shock = shock.split(',');

//Pinto las casillas y mustro informacion de los resultados
drawDivs(piece1Complete, 'blue', 'white');
drawDivs(piece2Complete, 'green', 'white');
if(result){
   drawDivs(shock, 'red', 'white'); 
   result_print.textContent = true;
   msg_result.textContent = 'Los dos rectangulos colixionan en: ' + shock;
   coordinates2.textContent = 'Las coordenadas son: ';
   coordinates3.textContent =  coordinates;
}else{
    result_print.textContent = false;
    msg_result.textContent = 'Los dos rectangulos no colixionan';
    coordinates2.textContent = 'Las coordenadas son: ';
    coordinates3.textContent =  coordinates;
}

/** Función para pintar las cuadrículas */
function drawDivs(coordinates, backgroundColor, fontColor){
    for (let i = 0; i < coordinates.length; i++) {
        let id = 'c' + coordinates[i];
        let id_div = document.getElementById(id);
        if (id_div) {
            id_div.style.backgroundColor = backgroundColor;  
            id_div.style.color = fontColor;
        }
      }
}  //