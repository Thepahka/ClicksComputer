function Cargar() {
var xmlhttp = new XMLHttpRequest();
var url = "Tiendas-<?php echo $row[0]; ?>";
xmlhttp.onreadystatechange=function() {
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 var array = JSON.parse(xmlhttp.responseText);
 var i;
 var out = "<table border='1'>";
 for(i = 0; i < array.length; i++) {
 out+=" <tr><td>"+
 array[i].id +
 "</td><td>"+
 array[i].nombres +
 "</td><td>" +
 array[i].apellidos+
 "</td><td>"+
 array[i].email+
 "</td><td>" +
 array[i].direccion +
 "</td><td>" +
 array[i].telefono +
 "</td></tr>";
 }
 out += "</table>";
 document.getElementById("resultado").innerHTML = out;
 }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();
}
