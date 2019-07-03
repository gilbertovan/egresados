$(document).ready(function() {	
    $('#usuarioAdmin').on('blur', function(){
        $('#result-usuarioAdmin').fadeOut(50);

        var usuarioAdmin = $(this).val();		
        var dataString = 'usuarioAdmin='+usuarioAdmin;

        $.ajax({
            type: "POST",
            url: "disp/comprobar.php",
            data: dataString,
            success: function(data) {
                $('#result-usuarioAdmin').fadeIn(50).html(data);
            }
        });
    });

    $('#usuario').on('blur', function(){
        $('#result-usuario').fadeOut(50);

        var usuario = $(this).val();       
        var dataString = 'usuario='+usuario;

        $.ajax({
            type: "POST",
            url: "disp/comprobarE.php",
            data: dataString,
            success: function(data) {
                $('#result-usuario').fadeIn(50).html(data);
            }
        });
    });

     $('#email').on('blur', function(){
        $('#result-email').fadeOut(50);

        var email = $(this).val();       
        var dataString = 'email='+email;

        $.ajax({
            type: "POST",
            url: "disp/comprobarEmail.php",
            data: dataString,
            success: function(data) {
                $('#result-email').fadeIn(50).html(data);
            }
        });
    });


}); 