$(document).ready(function () {
    $('.sidebar-menu').tree()

     $('#registro').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'language':{
        paginate:{
          next: 'Siguiente',
          previous:'Anterior',
          last:'ultimo',
          first: 'primero'
        },
        info: '_START_ a _END_ de _TOTAL_ resultados',
        emptyTable: 'No hay registros',
        infoEmpty: '0 registros',
        search: 'Buscar:',
        show: 'Entradas'


      }
    });
 
      $('#crear_registro').attr('disabled', true);
    $('#repetir_password').on('input', function() {
      var password_nuevo = $('#password').val();

      if ($(this).val() == password_nuevo) {
        $('#resultado_password').text('Si coinciden');
        $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
       $('#crear_registro').attr('disabled', false);
     
      }else{
        $('#resultado_password').text('El password no coincide ');

        $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
           
        
      }
    });

     $('#repetir_clave').on('input', function() {
      var clave_nuevo = $('#clave').val();

      if ($(this).val() == clave_nuevo) {
        $('#resultado_clave').text('Si coinciden');
        $('#resultado_clave').parents('.form-group').addClass('has-success').removeClass('has-error');
        $('input#clave').parents('.form-group').addClass('has-success').removeClass('has-error');
       $('#crear_registro').attr('disabled', false);
     
      }else{
        $('#resultado_clave').text('El password no coincide ');

        $('#resultado_clave').parents('.form-group').addClass('has-error').removeClass('has-success');
        $('input#clave').parents('.form-group').addClass('has-error').removeClass('has-success');
           
        
      }



    });



  })

