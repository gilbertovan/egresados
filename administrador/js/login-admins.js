$(document).ready(function(){
	$('#login-admin').on('submit',function(e){
		e.preventDefault();
		var datos =$(this).serializeArray();
		
		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType:'json',
			success: function(data){
					console.log(data);
					var resultado = data;
					 if (resultado.respuesta == 'exitoso') {
						setTimeout(function(){
					 	window.location.href='administrador/admin-area.php';

					}, 100);
					} else{
						Swal( 'Error',
							  'usuario o password incorrecto',
							  'error'
						)
					}
			}
		})
	});
});

