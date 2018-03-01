var container = document.getElementById('container');
setTimeout(function() {
    container.classList.add('cerrar');
    document.body.style.overflowY= "visible";// despueés de cargar le devolvemos el scroll
}, 3000);
