
var modal = document.getElementById('myModal');

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

function abrir(nombre,id,otraId){
  var modal = document.getElementById('myModal2');
  var input = document.getElementById('nombreCat');
  input.value =nombre;
  $("#nombreCat").val(nombre);
    modal.style.display = "block";

}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
