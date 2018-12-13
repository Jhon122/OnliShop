$(document).ready(function () {
   

   $('#registros').DataTable({
      'paging'      : true,
      'pageLength'  : 5,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language'    : {

        paginate    : {
            next    : 'siguiente',
            previous: 'Anterior',
            last    : 'Ultimo',
            first   : 'Primero'
        },
        info        : 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        emptyTable  : 'No hay registros',
        infoEmpty   : '0 Registros',
        search      : 'Buscar'

      }
    });

 })
//funcion mostrarImagen
	 function mostrarImagen() {
                var file = document.getElementById("imagen_agregar").files[0];
                var reader = new FileReader();
                 if (file) {
                 reader.readAsDataURL(file);
                reader.onloadend = function () {
                document.getElementById("img1").src=reader.result;
                }
            }
      }