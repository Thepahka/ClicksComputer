$(document).ready( function () {
     $("#marcas").DataTable({
      "language":{
       "lengthMenu":"Registros por página: _MENU_",
       "zeroRecords": "No se encontraron registros.",
             "info": "Página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros aún.",
             "infoFiltered": "(filtrados de un total de _MAX_ registros)",
             "search" : "Buscar:",
             "LoadingRecords": "Cargando ...",
             "Processing": "Procesando...",
             "SearchPlaceholder": "Comience a teclear...",
             "previous": "Anterior",
             "paginate": {
             "previous": "Anterior",
             "next": "Siguiente",
     }
      }
     });
 } );// $("#dataFrm").DataForm();
