$(document).ready(function(){
   //Guardar
    $('#guardar-registro').on('submit',function (e){
        e.preventDefault();
        var datos = $(this).serializeArray();
        
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                console.log(data);

                var resultado = data;
                if(resultado.respuesta == 'exito'){
                    swal(
                        'Correcto',
                        'Se Guardo Correctamente',
                        'success'
                    )
                }
                else{
                    swal(
                         'Error!',
                         'Hubo un error',
                         'error'
                    )
                }
            }
        })

    });
   //Guardar Registro Archivo
     $('#guardar-registro-archivo').on('submit', function(e) {
            e.preventDefault();
             
            var datos = new FormData(this);
             
            $.ajax({
                type: $(this).attr('method'),
                data: datos,
                url: $(this).attr('action'),
                dataType: 'json',
                contentType: false,
                processData : false,
                async: true,
                cache: false,
                success: function(data) {
                    console.log(data);
                    var resultado = data;
                    if(resultado.respuesta == 'exito') {
                        swal(
                          'Correcto',
                          'Se guardó correctamente',
                          'success'
                        )
                    } else {
                        swal(
                          'Error!',
                          'Hubo un error',
                          'error'
                        )
                    }
                }
            })
    });
  //Eliminar
  $('.borrar_registro').on('click', function(e) {
          e.preventDefault();
           
          var id = $(this).attr('data-id');
          var tipo = $(this).attr('data-tipo');
           
        swal({
             title: 'Estás Seguro?',
        text: "Esto no se puede deshacer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!!',
        cancelButtonText: 'No, Cancelar',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger'
        }).then((result) => {
        if (result.value) {
            $.ajax({
                type:'post',
                 data: {
                            'id': id,
                            'registro': 'eliminar'
                        },
                        url: 'app/modelo-'+tipo+'.php',
                        success: function(data){
                            console.log(data);
                            var resultado = JSON.parse(data);
                            if(resultado.respuesta == 'exito'){
                                swal(
                                    'Eliminado!',
                                    'Se eliminó el registro de la dase de datos.',
                                    'success'
                                )
                                jQuery('[data-id="'+resultado.id_eliminado+'"]').parents('tr').remove();
                            }                       
                        }
                   })
        } else if (result.dismiss === 'cancel') {
          swal(
            'Cancelado',
            'No se eliminó el registro',
            'error'
          )
        }
      });
    });

});

